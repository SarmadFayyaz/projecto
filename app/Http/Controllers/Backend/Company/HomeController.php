<?php

namespace App\Http\Controllers\Backend\Company;

use App\Http\Controllers\Controller;

use App\Models\Company;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App;

class HomeController extends Controller {

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        Session::put('locale', (Auth::guard('company')->user()->language) ? Auth::guard('company')->user()->language : 'en');
        App::setLocale((Auth::guard('company')->user()->language) ? Auth::guard('company')->user()->language : 'en');
        $page = 'Dashboard';
        $users = User::where('company_id', auth('company')->user()->id)->get()->count();
        $projects = Project::where('company_id', auth('company')->user()->id)->get();
        $total_projects = count($projects);
        $active_projects = count($projects->where('status', 0));
        $finished_projects = count($projects->where('status', 1));
        return view('backend.company.dashboard.index', compact('page', 'users', 'total_projects', 'active_projects', 'finished_projects'));
    }

    public function setting(Request $request) {
        $company = Company::find(Auth::guard('company')->user()->id);
        $company->background = $request->background;
        $company->sidebar_background = $request->sidebar_background;
        $company->sidebar_size = $request->sidebar_size;
        $company->save();
    }
}
