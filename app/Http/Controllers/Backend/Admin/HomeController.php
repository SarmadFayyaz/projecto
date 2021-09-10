<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;

use App\Models\Admin;
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
        Session::put('locale', Auth::guard('admin')->user()->language);
        App::setLocale(Auth::guard('admin')->user()->language);
        $page = 'Dashboard';
        return view('backend.admin.dashboard', compact('page'));
    }

    public function setting(Request $request) {
        $admin = Admin::find(Auth::guard('admin')->user()->id);
        $admin->background = $request->background;
        $admin->sidebar_background = $request->sidebar_background;
        $admin->sidebar_size = $request->sidebar_size;
        $admin->save();
    }
}
