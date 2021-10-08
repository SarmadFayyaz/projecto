<?php

namespace App\Http\Controllers\Backend\Company;

use App\Http\Controllers\Controller;

use App\Models\Company;
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
        Session::put('locale', Auth::guard('company')->user()->language);
        App::setLocale(Auth::guard('company')->user()->language);
        $page = 'Dashboard';
        return view('backend.company.dashboard.index', compact('page'));
    }

    public function setting(Request $request) {
        $company = Company::find(Auth::guard('company')->user()->id);
        $company->background = $request->background;
        $company->sidebar_background = $request->sidebar_background;
        $company->sidebar_size = $request->sidebar_size;
        $company->save();
    }
}
