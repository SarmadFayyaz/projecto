<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Project;
use App\Models\Video;
use App\Models\WorkRule;

class MethodOController extends Controller {
    public function index($project_id, $type) {
        if ($type == 1) {
            $boss_notes = Project::find($project_id)->boss_notes;
            return view('backend.user.project.method-o.initial-meeting', compact('project_id', 'boss_notes'));
        }
        if ($type == 2) {
            $work_rules = WorkRule::where('project_id', $project_id)->where('status', 1)->get();
            return view('backend.user.project.method-o.work-rules', compact('work_rules'));
        }
        if ($type == 3)
            return view('backend.user.project.method-o.description-of-meetings');
        if ($type == 4)
            return view('backend.user.project.method-o.platform-roles');
        if ($type == 5)
            return view('backend.user.project.method-o.boss-view');
    }

}
