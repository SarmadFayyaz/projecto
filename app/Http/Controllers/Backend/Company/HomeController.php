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
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        //        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        Session::put('locale', Auth::guard('company')->user()->language);
        App::setLocale(Auth::guard('company')->user()->language);
        $page = 'Dashboard';
        return view('backend.company.dashboard', compact('page'));
    }

    public function setting(Request $request) {
        $admin = Company::find(Auth::guard('company')->user()->id);
        $admin->background = $request->background;
        $admin->sidebar_background = $request->sidebar_background;
        $admin->sidebar_size = $request->sidebar_size;
        $admin->save();
    }
}
