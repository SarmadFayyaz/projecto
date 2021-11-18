<?php

namespace App\Http\Controllers\Backend\User;

use App\Events\TaskNoteEvent;
use App\Http\Controllers\Controller;

use App\Models\Project;
use App\Models\Task;
use App\Models\TaskAction;
use App\Models\TaskNote;
use App\Models\TaskUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TaskNoteController extends Controller {
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
            'task_id' => 'required',
            'notes' => ['required', 'string', 'max:255'],
        ]);
        try {
            DB::beginTransaction();
            $data = $request->except('_token');
            $data['user_id'] = Auth::user()->id;
            $task_note = TaskNote::create($data);
            $project = Project::find($task_note->task->project_id);
            broadcast(new TaskNoteEvent($project))->toOthers();
            DB::commit();
            return response()->json(['success' => __('header.added_successfully', ['name' => __('header.note')])]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => __('header.something_went_wrong')]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\TaskNote $task_note
     * @return \Illuminate\Http\Response
     */
    public function show(TaskNote $task_note) {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\TaskNote $task_note
     * @return \Illuminate\Http\Response
     */
    public function edit(TaskNote $task_note) {
        $tasks = Task::where('project_id', $task_note->task->project_id)->get();
        return view('backend.user.project.extras.edit-task-notes', compact('task_note', 'tasks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TaskNote $task_note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TaskNote $task_note) {
        $this->validate($request, [
            'task_id' => 'required',
            'notes' => ['required', 'string', 'max:255'],
        ]);
        try {
            DB::beginTransaction();
            $project_id = $task_note->task->project_id;
            $data = $request->except('_token');
            $task_note->update($data);
            DB::commit();
            $project = Project::find($task_note->task->project_id);
            broadcast(new TaskNoteEvent($project))->toOthers();
            return response()->json(
                [
                    'success' => __('header.updated_successfully', ['name' => __('header.note')]),
                    'project_id' => $project_id
                ]
            );
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => __('header.something_went_wrong')]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\TaskNote $task_note
     * @return \Illuminate\Http\Response
     */
    public function destroy(TaskNote $task_note) {
        try {
            $project_id = $task_note->task->project_id;
            $task_note_id = $task_note->id;
            DB::beginTransaction();
            $task_note->delete();
            DB::commit();
            $project = Project::find($task_note->task->project_id);
            broadcast(new TaskNoteEvent($project))->toOthers();
//            return redirect()->route('project', $project_id);
            return response()->json(
                [
                    'success' => __('header.deleted_successfully', ['name' => __('header.note')]),
                    'project_id' => $project_id,
                    'task_note_id' => $task_note_id
                ]
            );
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => __('header.something_went_wrong')]);
        }
    }

    public function load($project_id) {
        $data = Task::with('project', 'taskUser', 'taskAction')->where('project_id', $project_id);
        if (auth()->user()->hasRole('User')) {
            $data->where(function ($query) {
                $query->where('added_by', auth()->user()->id)
                    ->orWhereHas('taskUser', function ($q) {
                        $q->where('user_id', auth()->user()->id);
                    });
            });
        }
        $tasks = $data->get();
        $view = view('backend.user.project.extras.load-task-notes', compact('tasks'));
        $view = $view->render();
        return $view;
    }
}
