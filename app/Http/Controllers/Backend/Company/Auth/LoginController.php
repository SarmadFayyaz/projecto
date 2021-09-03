<?php

namespace App\Http\Controllers\Backend\Company\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;


class LoginController extends Controller {
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::COMPANYDASHBOARD;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest:company')->except('logout');
    }

    public function showLoginForm() {
        return view('backend.company.auth.login');
    }

    protected function guard() {
        return Auth::guard('company');
    }

    public function username() {
        return 'email';
    }

    public function logout(Request $request) {
        Auth::guard('company')->logout();

        return $this->loggedOut($request) ?: redirect('/company/login');
    }
}
