<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Video;

class SupportController extends Controller {
    public function index() {
        $page = 'Support';
        $videos = Video::where('status', 1)->get();
        $faqs = Faq::where('status', 1)->get();
        return view('backend.user.support.index', compact('page','videos', 'faqs'));
    }

    public function leaveComment(){
        return back()->with('success', __('header.sent'));
    }

}
