<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Video;

class MethodOController extends Controller {
    public function index($project_id, $type) {
        if ($type == 1)
            return view('backend.user.project.method-o.initial-meeting', compact('project_id'));
        if ($type == 2)
            return view('backend.user.project.method-o.work-rules');
        if ($type == 3)
            return view('backend.user.project.method-o.description-of-meetings');
        if ($type == 4)
            return view('backend.user.project.method-o.platform-roles');
        if ($type == 5)
            return view('backend.user.project.method-o.boss-view');
    }

}
