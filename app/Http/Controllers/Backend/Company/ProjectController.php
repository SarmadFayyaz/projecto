<?php

namespace App\Http\Controllers\Backend\Company;

use App\Events\ProjectNotification;
use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\NotificationUser;
use App\Models\ProjectUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use App\Models\Project;
use DataTables;
use Auth;

class ProjectController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $page = 'projects';
        $users = User::where('company_id', Auth::guard('company')->user()->id)->get();
        return view('backend.company.project.index', compact('page', 'users'));
    }

    public function get(Request $request) {
        if ($request->ajax()) {
            $data = Project::with('projectLeader', 'projectUser')
                ->where('company_id', Auth::guard('company')->user()->id)->latest()->get();
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
                                $team_members .= '<span class="badge badge-' . ((Auth::guard('company')->user()->background) ? Auth::guard('company')->user()->background : 'primary') . ' mr-2">' . $projectUser->user->first_name . ' '
                                    . $projectUser->user->last_name . '</span>';
                    }
                    return $team_members;
                })
                ->addColumn('sponsors', function ($row) {
                    $sponsors = '';
                    foreach ($row->projectUser as $projectUser) {
                        if ($projectUser->user->hasRole('Sponsor'))
                            $sponsors .= '<span class="badge badge-' . ((Auth::guard('company')->user()->background) ? Auth::guard('company')->user()->background : 'primary') . ' mr-2">' . $projectUser->user->first_name . ' '
                                . $projectUser->user->last_name . '</span>';
                    }
                    return $sponsors;
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="javascript:;" class="edit btn btn-success btn-sm" data-id="' . $row->id . '"><i class="material-icons">edit</i></a>';
                    $actionBtn .= '<a href="javascript:void(0)" class="delete remove btn btn-danger btn-sm" data-id="' . $row->id . '"><i class="material-icons">close</i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action', 'boss_leader', 'team_members', 'sponsors'])
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $page = 'projects';
        $users = User::where('company_id', Auth::guard('company')->user()->id)->get();
        return view('backend.company.project.create', compact('page', 'users'));
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
            $data = $request->except('_token', 'team_members');
            $data['company_id'] = Auth::guard('company')->user()->id;
            $project = Project::create($data);

            $notification_data['project_id'] = $project->id;
            $notification_data['user_id'] = auth('company')->user()->id;
            $notification_data['type'] = 'project added';
            $notification_data['notification'] = 'You are added to new project "'.$project->name.'"';
            $notification = Notification::create($notification_data);

            $notification_user = new NotificationUser();
            $notification_user->user_id = $project->project_leader;
            $notification_user->notification_id = $notification->id;
            $notification_user->save();

            foreach ($request->team_members as $team_member) {
                $project_user = new ProjectUser();
                $project_user->project_id = $project->id;
                $project_user->user_id = $team_member;
                $project_user->save();

                $notification_user = new NotificationUser();
                $notification_user->user_id = $team_member;
                $notification_user->notification_id = $notification->id;
                $notification_user->save();

            }
            foreach ($request->sponsors as $sponsor) {
                $project_user = new ProjectUser();
                $project_user->project_id = $project->id;
                $project_user->user_id = $sponsor;
                $project_user->save();

                $notification_user = new NotificationUser();
                $notification_user->user_id = $sponsor;
                $notification_user->notification_id = $notification->id;
                $notification_user->save();
            }

            broadcast(new ProjectNotification($project, $notification))->toOthers();

            DB::commit();
            return back()->with('success', __('header.added_successfully', ['name' => __('header.project')]));
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', __('header.something_went_wrong'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Project $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Project $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project) {
        $project = Project::with('projectUser')->where('id', $project->id)->first();
        return response($project);
        //        $page = 'projects';
        //        $users = User::where('company_id', Auth::guard('company')->user()->id)->get();
        //        return view('backend.company.project.edit', compact('page', 'project', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Project $project
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Project $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project) {
        try {
            DB::beginTransaction();
            ProjectUser::where('project_id', $project->id)->delete();
            $project->delete();
            DB::commit();
            return back()->with('success', __('header.deleted_successfully', ['name' => __('header.project')]));
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', __('header.something_went_wrong'));
        }
    }
}
