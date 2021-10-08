<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class ProfileController extends Controller {
    public function index() {
        $page = 'Profile';
        $user = User::find(auth()->id());
        return view('backend.user.profile.index', compact('page', 'user'));
    }
}
