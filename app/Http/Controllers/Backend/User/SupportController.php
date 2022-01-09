<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Faq;
use App\Models\Video;
use Illuminate\Http\Request;

class SupportController extends Controller {
    public function index() {
        $page = 'Support';
        $videos = Video::where('status', 1)->get();
        $faqs = Faq::where('status', 1)->get();
        return view('backend.user.support.index', compact('page','videos', 'faqs'));
    }

    public function leaveComment(Request $request){
        $this->validate($request, [
            'comment' => 'required',
        ]);
        Comment::create(['user_id'=> auth()->user()->id, 'comment'=>$request->comment]);
        return back()->with('success', __('header.sent'));
    }

}
