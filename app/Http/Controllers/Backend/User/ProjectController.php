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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id) {
        $project = $this->getProject($id);
        $page = $project->id;
        return view('backend.user.project.index', compact('page', 'project'));
    }

    public function show($id) {
        $project = $this->getProject($id);
        return view('backend.user.project.view', compact('project'));
    }

    function getProject($id) {
        $data = Project::with(
            'projectLeader',
            'projectUser.user',
            'task.taskUser.user',
            'task.addedBy',
            'task.taskAction',
            'task.taskNote',
            'groupConversation.user',
            'workRule'
        );
        if (auth()->user()->hasRole('User')) {
            $data->with(['task' => function ($query) {
                $query->where('added_by', auth()->user()->id)
                    ->orWhereHas('taskUser', function ($q) {
                        $q->where('user_id', auth()->user()->id);
                    });
            }]);
        }
        return $data->whereId($id)->first();
    }

    public function projects() {
        $user = Auth::user();
        if ($user->hasRole('Boss')) {
            $page = 'Projects';
            $users = User::where('company_id', $user->company_id)->get();
            return view('backend.user.projects', compact('page', 'users'));
        } else {
            return back()->with('error', __('header.you_are_not_authorized'));
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
                    $action = '<a href="javascript:;" class="edit btn btn-success btn-sm" data-id="' . $row->id . '"><i class="material-icons">edit</i></a>';
                    if ($row->status == 0)
                        $action .= '<a href="' . route('project.finish',
                                $row->id) . '" class="btn btn-primary btn-sm finish"><i class="material-icons">stop</i></a>';
                    return $action;
                })
                ->rawColumns(['action', 'boss_leader', 'team_members', 'sponsors'])
                ->make(true);
        }
    }

    public function edit($id) {
        $project = Project::with('projectUser')->where('id', $id)->first();
        return response($project);
    }

    public function finish($id) {
        $project = Project::find($id);
        $project->status = 1;
        $project->save();
        return back()->with('success', __('header.project_finished'));
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
            return back()->with('success', __('header.updated_successfully', ['name' => __('header.project')]));
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', __('header.something_went_wrong'));
        }
    }

    public function bossNotes(Request $request) {
        try {
            DB::beginTransaction();
            $project = Project::find($request->project_id);
            $project->boss_notes = $request->boss_notes;
            $project->save();
            DB::commit();
            return response()->json(['success' => __('header.notes_saved')]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => __('header.something_went_wrong')]);
        }
    }
}
