<?php

namespace App\Http\Controllers\Backend\User;

use App\Events\TaskActionEvent;
use App\Events\TaskActionNoteEvent;
use App\Events\TaskActionNotification;
use App\Http\Controllers\Controller;

use App\Models\Notification;
use App\Models\NotificationUser;
use App\Models\Task;
use App\Models\TaskAction;
use App\Models\TaskUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TaskActionController extends Controller {
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
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\TaskAction $task_action
     * @return \Illuminate\Http\Response
     */
    public function show(TaskAction $task_action) {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\TaskAction $task_action
     * @return \Illuminate\Http\Response
     */
    public function edit(TaskAction $task_action) {
        try {
            DB::beginTransaction();
            $task_action->status = 'completed';
            $task_action->completed_by = Auth::user()->id;
            $task_action->update();

            $task_actions = TaskAction::where('task_id', $task_action->task_id)->get();
            $progress = (count($task_actions->where('status', 'completed')) / count($task_actions)) * 100;
            $task_action = TaskAction::with('task.project')->where('id', $task_action->id)->first();

            $task = Task::with('taskUser')->where('id', $task_action->task_id)->first();
            $task->progress = $progress;
            $task->update();

            $notification_data['project_id'] = $task->project_id;
            $notification_data['user_id'] = auth()->user()->id;
            $notification_data['type'] = 'action done';
            $notification_data['notification'] = 'An action has been marked as done in ' . $task->name . ' Task';
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

            broadcast(new TaskActionNotification($task, $notification))->toOthers();
            broadcast(new TaskActionEvent($task))->toOthers();

            DB::commit();
            return response()
                ->json(
                    [
                        'success' => __('header.updated_successfully',
                            ['name' => (__('header.task') . ' ' . __('header.action'))]),
                        'task_id' => $task_action->task_id
                    ]
                );
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => __('header.something_went_wrong')]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TaskAction $task_action
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TaskAction $task_action) {
        $data = $request->except('_token');
        $task_action->update($data);
        $task = Task::find($task_action->task_id);
        broadcast(new TaskActionNoteEvent($task))->toOthers();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\TaskAction $task_action
     * @return \Illuminate\Http\Response
     */
    public function destroy(TaskAction $task_action) {
        //
    }
}
