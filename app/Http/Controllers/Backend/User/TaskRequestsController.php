<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;

use App\Models\Project;
use App\Models\Task;
use App\Models\TaskAction;
use App\Models\TaskNote;
use App\Models\TaskUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use DataTables;

class TaskRequestsController extends Controller {
    public function index() {
        $user = Auth::user();
        if ($user->hasRole('Boss')) {
            $page = 'Task Requests';
            $users = User::where('company_id', $user->company_id)->get();
            return view('backend.user.task-requests.index', compact('page', 'users'));
        } else {
            return back()->with('error', 'You are not authorized.');
        }
    }

    public function get(Request $request) {
        if ($request->ajax()) {
            $data = Task::with('project', 'addedBy')->whereHas('project', function ($query) {
                $query->where('project_leader', Auth::user()->id);
            })->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('project', function ($row) {
                    return $row->project->name;
                })
                ->addColumn('added_by', function ($row) {
                    if ($row->addedBy->deleted_at == null)
                        return $row->addedBy->first_name . ' ' . $row->addedBy->last_name;
                    else
                        return __('header.user_deleted');
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . route('task.requests.show',
                            $row->id) . '" data-toggle="modal" data-target="#showModal"  class="view btn btn-primary btn-sm"><i class="material-icons">visibility</i></a>';
                    $actionBtn .= '<a href="javascript:;" class="edit btn btn-success btn-sm" data-id="' . $row->id . '"><i class="material-icons">edit</i></a>';
                    $actionBtn .= '<a href="javascript:void(0)" class="delete remove btn btn-danger btn-sm" data-id="' . $row->id . '"><i class="material-icons">close</i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action', 'project', 'added_by'])
                ->make(true);
        }
    }

    public function edit($id) {
        try {
            $user = Auth::user();
            $task = Task::find($id);
            if ($user->hasRole('Boss')) {
                $task = Task::with('taskUser', 'taskAction')->where('id', $id)->first();
                return response($task);
            } else {
                return back()->with('error', 'You are not authorized to perform this action.');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong.');
        }
    }

    public function show($id) {
        $task = Task::whereId($id)->with('taskAction', 'addedBy', 'project', 'taskNote')->first();
        return view('backend.user.task-requests.show', compact('task'));
    }

    public function update(Request $request) {

        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'task_id' => 'required',
            'team_members' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'action.*' => 'required',
        ]);
        //        try {
        DB::beginTransaction();
        $data = $request->except('_token', 'team_members', 'action');
        $task = Task::find($data['task_id']);
        $task->update($data);
        foreach ($request->team_members as $key => $member) {
            $task_user['task_id'] = $data['task_id'];
            $task_user['user_id'] = $member;
            TaskUser::updateOrCreate($task_user);
        }
        $task_user_stored = TaskUser::where('task_id', $data['task_id'])->get()->pluck('user_id')->toArray();
        foreach ($task_user_stored as $row) {
            if (!in_array($row, $request->team_members))
                TaskUser::where('task_id', $data['task_id'])->where('user_id', $row)->delete();
        }
        //            foreach ($request->action as $action) {
        //                $task_user = new TaskAction();
        //                $task_user->task_id = $task_id;
        //                $task_user->name = $action;
        //                $task_user->status = 'pending';
        //                $task_user->save();
        //            }
        DB::commit();
        return back()->with('success', 'Task Updated successfully.');
        //        } catch (\Exception $e) {
        //            DB::rollBack();
        //            return back()->with('error', 'Something went wrong.');
        //        }
    }

    public function delete($id) {
        TaskUser::where('task_id', $id)->delete();
        TaskAction::where('task_id', $id)->delete();
        TaskNote::where('task_id', $id)->delete();
        Task::where('id', $id)->delete();
        return back()->with('success', 'Task Deleted successfully.');
    }
}
