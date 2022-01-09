<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Faq;
use App\Models\Video;
use Illuminate\Http\Request;
use DataTables;

class SupportController extends Controller {
    public function index() {
        $page = 'Support';
        $videos = Video::all();
        $faqs = Faq::all();
        return view('backend.admin.support.index', compact('page','videos', 'faqs'));
    }
    public function get(Request $request) {
        if ($request->ajax()) {
            $data = Comment::with('user')->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('name', function ($data) {
                    $name = $data->user->first_name . ' ' . $data->user->last_name;
                    return $name;
                })
                ->addColumn('email', function ($data) {
                    $email = $data->user->email;
                    return $email;
                })
                ->make(true);
        }
    }

}
