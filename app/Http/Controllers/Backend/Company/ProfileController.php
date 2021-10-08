<?php

namespace App\Http\Controllers\Backend\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;

class ProfileController extends Controller {
    public function index() {
        $page = 'Profile';
        $company = Company::find(auth('company')->user()->id);
        return view('backend.company.profile.index', compact('page', 'company'));
    }
}
