<?php

namespace App\Http\Controllers\Language;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App;

class LanguageController extends Controller {
    public function language($lang) {
        Session::put('locale', $lang);
        App::setLocale($lang);
        return redirect()->back();
    }
}
