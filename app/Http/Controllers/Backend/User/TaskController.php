<?php

namespace App\Http\Controllers\Backend\User;

use App\Events\LoadTask;
use App\Events\TaskActionEvent;
use App\Events\TaskNotification;
use App\Http\Controllers\Controller;

use App\Models\Notification;
use App\Models\NotificationUser;
use App\Models\Project;
use App\Models\Task;
use App\Models\TaskAction;
use App\Models\TaskUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use DataTables;

class TaskController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'project_id' => 'required',
//            'team_members' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'action.*' => 'required',
        ]);
        try {
            DB::beginTransaction();
            $data = $request->except('_token', 'team_members', 'action');
            $data['added_by'] = Auth::user()->id;
            $data['status'] = Auth::user()->hasRole('Boss') ? 'approved' : 'pending';
            $task = Task::create($data);
            foreach ($request->action as $key => $action) {
                $task_user = new TaskAction();
                $task_user->task_id = $task->id;
                $task_user->name = $action;
//            $task_user->note = (isset($data['action_notes'][$key])) ? $data['action_notes'][$key] : null;
                $task_user->status = 'pending';
                $task_user->save();
            }
            $notification_data['project_id'] = $data['project_id'];
            $notification_data['task_id'] = $task->id;
            $notification_data['user_id'] = auth()->user()->id;
            $notification_data['type'] = 'task added';
            $notification_data['notification'] = 'A new task added in ' . $task->project->name . ' by ' . auth()->user()->first_name . ' ' . auth()->user()->last_name;
            $notification = Notification::create($notification_data);

            if (auth()->user()->hasRole('User')) {
                $notification_user = new NotificationUser();
                $notification_user->user_id = $task->project->project_leader;
                $notification_user->notification_id = $notification->id;
                $notification_user->save();

                $task_user = new TaskUser();
                $task_user->task_id = $task->id;
                $task_user->user_id = $task->project->project_leader;
                $task_user->save();
            }
            if (isset($request->team_members)) {
                foreach ($request->team_members as $member) {
                    $task_user = new TaskUser();
                    $task_user->task_id = $task->id;
                    $task_user->user_id = $member;
                    $task_user->save();

                    $notification_user = new NotificationUser();
                    $notification_user->user_id = $member;
                    $notification_user->notification_id = $notification->id;
                    $notification_user->save();
                }
            }
            broadcast(new TaskNotification($task, $notification))->toOthers();
            broadcast(new LoadTask($task))->toOthers();
            DB::commit();
            return response()->json(['success' => __('header.added_successfully', ['name' => __('header.task')])]);
//        return back()->with('success', 'Task added successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => __('header.something_went_wrong')]);
//            return back()->with('error', __('header.something_went_wrong'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Task $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task) {
        $task = Task::whereId($task->id)->with('taskAction', 'addedBy', 'project', 'taskNote')->first();
        return view('backend.user.project.task.index', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Task $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task) {
        try {
            $user = Auth::user();
            if ($user->hasRole('Boss')) {
                DB::beginTransaction();
                $task->status = 'approved';
                $task->update();

                $notification_data['project_id'] = $task->project_id;
                $notification_data['task_id'] = $task->id;
                $notification_data['user_id'] = auth()->user()->id;
                $notification_data['type'] = 'task approved';
                $notification_data['notification'] = $task->name . ' approved by ' . auth()->user()->first_name . ' ' . auth()->user()->last_name . ' in ' . $task->project->name;
                $notification = Notification::create($notification_data);

                $notification_user = new NotificationUser();
                $notification_user->user_id = $task->added_by;
                $notification_user->notification_id = $notification->id;
                $notification_user->save();

                foreach ($task->taskUser as $taskUser) {
                    $notification_user = new NotificationUser();
                    $notification_user->user_id = $taskUser->user_id;
                    $notification_user->notification_id = $notification->id;
                    $notification_user->save();
                }

                broadcast(new TaskNotification($task, $notification))->toOthers();
                broadcast(new LoadTask($task))->toOthers();
                broadcast(new TaskActionEvent($task))->toOthers();

                DB::commit();
                return response()->json(['success' => __('header.approved_successfully', ['name' => __('header.task')]), 'task_id' => $task->id, 'project_id' => $task->project_id]);
            } else {
                return response()->json(['error' => __('header.you_are_not_authorized')]);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => __('header.something_went_wrong')]);
        }
    }

    public function completed($id) {
        try {
            $user = Auth::user();
            $task = Task::find($id);
            if ($user->hasRole('Boss')) {
                DB::beginTransaction();
                $task->status = 'completed';
                $task->update();

                $notification_data['project_id'] = $task->project_id;
                $notification_data['task_id'] = $task->id;
                $notification_data['user_id'] = auth()->user()->id;
                $notification_data['type'] = 'task completed';
                $notification_data['notification'] = $task->name . ' Completed by ' . auth()->user()->first_name . ' ' . auth()->user()->last_name . ' in ' . $task->project->name;
                $notification = Notification::create($notification_data);

                $notification_user = new NotificationUser();
                $notification_user->user_id = $task->added_by;
                $notification_user->notification_id = $notification->id;
                $notification_user->save();

                foreach ($task->taskUser as $taskUser) {
                    $notification_user = new NotificationUser();
                    $notification_user->user_id = $taskUser->user_id;
                    $notification_user->notification_id = $notification->id;
                    $notification_user->save();
                }
                broadcast(new TaskNotification($task, $notification))->toOthers();
                broadcast(new LoadTask($task))->toOthers();
                broadcast(new TaskActionEvent($task))->toOthers();
                DB::commit();
                return response()->json(['success' => __('header.completed_successfully', ['name' => __('header.task')]), 'task_id' => $task->id, 'project_id' => $task->project_id]);
//                return back()->with('success', 'Task completed successfully.');
            } else {
                return response()->json(['error' => __('header.you_are_not_authorised')]);
//                return back()->with('error', 'You are not authorized to perform this action.');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => __('header.something_went_wrong')]);
//            return back()->with('error', __('header.something_went_wrong'));
        }
    }

    public function pending($id) {
        try {
            $user = Auth::user();
            $task = Task::find($id);
            if ($user->hasRole('Boss')) {
                DB::beginTransaction();
                $task->status = 'pending_completion';
                $task->update();

                $notification_data['project_id'] = $task->project_id;
                $notification_data['task_id'] = $task->id;
                $notification_data['user_id'] = auth()->user()->id;
                $notification_data['type'] = 'task pending';
                $notification_data['notification'] = $task->name . ' marked as pending by ' . auth()->user()->first_name . ' ' . auth()->user()->last_name . ' in ' . $task->project->name;
                $notification = Notification::create($notification_data);

                $notification_user = new NotificationUser();
                $notification_user->user_id = $task->added_by;
                $notification_user->notification_id = $notification->id;
                $notification_user->save();

                foreach ($task->taskUser as $taskUser) {
                    $notification_user = new NotificationUser();
                    $notification_user->user_id = $taskUser->user_id;
                    $notification_user->notification_id = $notification->id;
                    $notification_user->save();
                }
                broadcast(new TaskNotification($task, $notification))->toOthers();
                broadcast(new LoadTask($task))->toOthers();
                broadcast(new TaskActionEvent($task))->toOthers();
                DB::commit();
                return response()->json(['success' => __('header.completed_successfully', ['name' => __('header.task')]), 'task_id' => $task->id, 'project_id' => $task->project_id]);
            } else {
                return response()->json(['error' => __('header.you_are_not_authorised')]);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => __('header.something_went_wrong')]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Task $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Task $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task) {
        //
    }

    public function load($project_id, $type) {
        $data = Task::with('project', 'taskUser', 'taskAction')->where('project_id', $project_id);
        if ($type == 1)
            $data->where(function ($query) {
                $query->orWhere('progress', 0)->orWhere('status', 'pending');
            });
        if ($type == 2)
            $data->whereBetween('progress', [1, 99])->where('status', 'approved');
        if ($type == 3)
            $data->where('progress', 100)->whereIn('status', ['approved', 'pending_completion']);;
        if ($type == 4)
            $data->where('progress', 100)->where('status', 'completed');
        $tasks = $data->get();
        $view = view('backend.user.project.task.load', compact('tasks'));
        $view = $view->render();
        return $view;
    }
}
