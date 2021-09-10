<?php

namespace App\Http\Controllers\Language;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App;
use App\Models\Admin;
use App\Models\Company;
use App\Models\User;

class LanguageController extends Controller {
    public function language($lang) {
        Session::put('locale', $lang);
        App::setLocale($lang);
        if (Auth::guard('admin')->check()) {
            $admin = Admin::find(Auth::guard('admin')->user()->id);
            $admin->language = ($lang) ? $lang : null;
            $admin->update();
        } else if (Auth::guard('company')->check()) {
            $company = Company::find(Auth::guard('company')->user()->id);
            $company->language = ($lang) ? $lang : null;
            $company->update();
        } else if (Auth::check()) {
            $user = User::find(Auth::user()->id);
            $user->language = ($lang) ? $lang : null;
            $user->update();
        }
        return redirect()->back();
    }
}
