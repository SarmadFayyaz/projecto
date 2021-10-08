<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;

use App\Models\ProjectUser;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller {
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $page = 'Dashboard';
        //        $user_projects = ProjectUser::with('project.projectUser.user')
        //            ->where('user_id', Auth::user()->id)->get();
        return view('backend.user.dashboard.index', compact('page'));
    }

    public function setting(Request $request) {
        $user = User::find(auth()->id());
        $user->background = $request->background;
        $user->sidebar_background = $request->sidebar_background;
        $user->sidebar_size = $request->sidebar_size;
        $user->save();
    }
}
