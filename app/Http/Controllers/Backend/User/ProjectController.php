<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;

use App\Models\Project;
use App\Models\ProjectUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DataTables;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id) {
        $project = Project::with(
            'projectLeader',
            'projectUser.user',
            'task.taskUser.user',
            'task.addedBy',
            'task.taskAction',
            'task.taskNote',
            'groupConversation.user'
        )->whereId($id)->first();
        $page = $project->id;
        return view('backend.user.project.index', compact('page', 'project'));
    }

    public function projects() {
        $user = Auth::user();
        if ($user->hasRole('Boss')) {
            $page = 'Projects';
            $users = User::where('company_id', $user->company_id)->get();
            return view('backend.user.projects', compact('page', 'users'));
        } else {
            return back()->with('error', 'You are not authorized.');
        }
    }

    public function get(Request $request) {
        if ($request->ajax()) {
            $data = Project::with('projectLeader', 'projectUser')
                ->where('project_leader', Auth::user()->id)->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('boss_leader', function ($row) {
                    return $row->projectLeader->first_name . ' ' . $row->projectLeader->last_name;
                })
                ->addColumn('team_members', function ($row) {
                    $team_members = '';
                    foreach ($row->projectUser as $projectUser) {
                        if ($projectUser->user->hasRole('User'))
                            if ($projectUser->user->deleted_at == null)
                                $team_members .= '<span class="badge badge-' . ((auth()->user()->background) ? auth()->user()->background : 'primary') . ' mr-2">' . $projectUser->user->first_name . ' '
                                    . $projectUser->user->last_name . '</span>';
                    }
                    return $team_members;
                })
                ->addColumn('sponsors', function ($row) {
                    $sponsors = '';
                    foreach ($row->projectUser as $projectUser) {
                        if ($projectUser->user->hasRole('Sponsor'))
                            $sponsors .= '<span class="badge badge-' . ((auth()->user()->background) ? auth()->user()->background : 'primary') . ' mr-2">' . $projectUser->user->first_name . ' '
                                . $projectUser->user->last_name . '</span>';
                    }
                    return $sponsors;
                })
                ->addColumn('action', function ($row) {
                    return '<a href="javascript:;" class="edit btn btn-success btn-sm" data-id="' . $row->id . '"><i class="material-icons">edit</i></a>';
                })
                ->rawColumns(['action', 'boss_leader', 'team_members', 'sponsors'])
                ->make(true);
        }
    }

    public function edit($id) {
        $project = Project::with('projectUser')->where('id', $id)->first();
        return response($project);
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'strategic_goal' => ['required', 'string', 'max:255'],
            'purpose' => ['required', 'string', 'max:255'],
            'project_goal' => ['required', 'string', 'max:255'],
            'project_leader' => 'required',
            'team_members' => 'required',
            'sponsors' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'color' => 'required',
        ]);
        try {
            DB::beginTransaction();
            $project = Project::find($id);
            $data = $request->except('_token', 'team_members');
            $project->update($data);
            ProjectUser::where('project_id', $id)->delete();
            foreach ($request->team_members as $team_member) {
                $project_user = new ProjectUser();
                $project_user->project_id = $id;
                $project_user->user_id = $team_member;
                $project_user->save();
            }
            foreach ($request->sponsors as $sponsor) {
                $project_user = new ProjectUser();
                $project_user->project_id = $id;
                $project_user->user_id = $sponsor;
                $project_user->save();
            }
            DB::commit();
            return back()->with('success', 'Project updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong.');
        }
    }
}
