<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;

class ProfileController extends Controller {
    public function index() {
        $page = 'Profile';
        $admin = Admin::find(auth('admin')->user()->id);
        return view('backend.admin.profile.index', compact('page', 'admin'));
    }
}
