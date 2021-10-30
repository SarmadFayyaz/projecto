<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;

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
            TaskNote::create($data);
            DB::commit();
            return back()->with('success', 'Note added successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong.');
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
            $data = $request->except('_token');
            $task_note->update($data);
            DB::commit();
            return back()->with('success', 'Note updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong.');
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
//            return redirect()->route('project', $project_id);
            return response()->json(['success' => 'Task Note deleted successfully', 'project_id' => $project_id, 'task_note_id' => $task_note_id]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Something went wrong.']);
        }
    }
}
