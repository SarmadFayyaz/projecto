<?php

namespace App\Http\Controllers\Backend\Company;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Video;

class SupportController extends Controller {
    public function index() {
        $page = 'Support';
        $videos = Video::where('status', 1)->get();
        $faqs = Faq::where('status', 1)->get();
        return view('backend.company.support.index', compact('page','videos', 'faqs'));
    }

}
