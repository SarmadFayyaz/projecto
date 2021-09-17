<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;

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
            'team_members' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'action.*' => 'required',
        ]);
        try {
            DB::beginTransaction();
            $data = $request->except('_token', 'team_members', 'action');
            $data['added_by'] = Auth::user()->id;
            $data['status'] = Auth::user()->hasRole('Boss') ? 'approved' : 'pending';
            $task_id = Task::create($data)->id;
            foreach ($request->team_members as $member) {
                $task_user = new TaskUser();
                $task_user->task_id = $task_id;
                $task_user->user_id = $member;
                $task_user->save();
            }
            foreach ($request->action as $action) {
                $task_user = new TaskAction();
                $task_user->task_id = $task_id;
                $task_user->name = $action;
                $task_user->status = 'pending';
                $task_user->save();
            }
            DB::commit();
            return back()->with('success', 'Task added successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong.');
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
                DB::commit();
                return back()->with('success', 'Task approved successfully.');
            } else {
                return back()->with('error', 'You are not authorized to perform this action.');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong.');
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
                DB::commit();
                return back()->with('success', 'Task completed successfully.');
            } else {
                return back()->with('error', 'You are not authorized to perform this action.');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong.');
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
}
