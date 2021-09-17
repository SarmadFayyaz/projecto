<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;

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
            $task = Task::find($task_action->task_id);
            $task->progress = $progress;
            $task->update();
            DB::commit();
            return back()->with('success', 'Task Action Updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong.');
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
        //
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
