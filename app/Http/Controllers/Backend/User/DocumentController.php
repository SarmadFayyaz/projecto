<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use App\Events\IndividualMessage;
use App\Models\Document;
use App\Models\IndividualConversation;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use DataTables;
use Illuminate\Support\Facades\Storage;
use Response;

class DocumentController extends Controller {
    public function index($section, $project_id) {
        $data = Document::with('user', 'project')
            ->where('project_id', $project_id);
        if ($section != 'all') {
            if ($section == 3)
                $data->where('important', 1);
            else if ($section == 2)
                $data->orderBy('created_at', 'desc');
            else
                $data->where('section', $section);
        }
        $documents = $data->get();
        return view('backend.user.project.document.load', compact('documents', 'section'));
    }

    public function important(Request $request) {
        $document = Document::find($request->id);
        if ($document->important == 0)
            $document->important = 1;
        else
            $document->important = 0;
        $document->update();
        return response()->json(['success' => 'Document marked important.']);
    }

    public function upload(Request $request) {
        if ($request->hasFile('file')) {
            $data['project_id'] = $request->project_id;
            $data['user_id'] = Auth::user()->id;
            $data['name'] = ($request->file)->getClientOriginalName();
            $data['name'] = pathinfo($data['name'], PATHINFO_FILENAME);
            $data['type'] = ($request->file)->getClientOriginalExtension();
            $file = Storage::disk('public')->put('project/' . $data['project_id'] . '/documents/', $request->file);
            $file = basename($file);
            $data['file'] = '/project/' . $data['project_id'] . '/documents/' . $file;
            $doc_id = Document::create($data)->id;
            $data['document_id'] = $doc_id;
            return response()->json(['success' => 'Document uploaded.']);
        }

    }
    //    public function download($id) {
    //        $document = Document::find($id);
    //        $file = Storage::disk('public')->get(Storage::disk('public')->url($document->file));
    //        return response()->download($document->file);
    ////            return response()->download(Storage::disk('public')->url($document->file));
    //    }
}
