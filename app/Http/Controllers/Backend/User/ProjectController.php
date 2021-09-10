<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;

use App\Models\Project;
use Illuminate\Http\Request;

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
        $project = Project::with('projectUser.user', 'task.taskUser.user', 'task.addedBy', 'task.taskAction', 'task.taskNote')
            ->whereId($id)->first();
        $page = $project->id;
        return view('backend.user.project.index', compact('page', 'project'));
    }
}
