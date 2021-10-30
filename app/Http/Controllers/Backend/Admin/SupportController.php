<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Video;

class SupportController extends Controller {
    public function index() {
        $page = 'Support';
        $videos = Video::all();
        $faqs = Faq::all();
        return view('backend.admin.support.index', compact('page','videos', 'faqs'));
    }

}
