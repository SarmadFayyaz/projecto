<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use App\Events\IndividualMessage;
use App\Models\Document;
use App\Models\IndividualConversation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use DataTables;
use Illuminate\Support\Facades\Storage;

class IndividualConversationController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, [
            'message' => ['required_without:file', 'nullable', 'string', 'max:255'],
            'file' => 'required_without:message',
            'message_type' => 'required',
            'project_id' => 'required',
            'receiver_id' => 'required',
        ]);
        try {
            DB::beginTransaction();
            $data = $request->except('_token');
            $data['user_id'] = Auth::user()->id;
            if ($request->hasFile('file')) {
                $doc_data['project_id'] = $data['project_id'];
                $doc_data['user_id'] = $data['user_id'];
                $doc_data['section'] = 1;
                $doc_data['name'] = ($request->file)->getClientOriginalName();
                $doc_data['name'] = pathinfo($doc_data['name'], PATHINFO_FILENAME);
                $doc_data['type'] = ($request->file)->getClientOriginalExtension();
                $file = Storage::disk('public')->put('project/' . $data['project_id'] . '/documents/', $request->file);
                $file = basename($file);
                $doc_data['file'] = '/project/' . $data['project_id'] . '/documents/' . $file;
                $doc_id = Document::create($doc_data)->id;
                $data['document_id'] = $doc_id;
            }
            $id = IndividualConversation::create($data)->id;
            DB::commit();
            broadcast(new IndividualMessage(Auth::user()->id, $data['receiver_id'], $data['message']))->toOthers();
            return response()->json('success');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong.');
        }
    }

    public function show($id) {
        $individual_messages = IndividualConversation::with('user', 'document')
            ->where('user_id', Auth::user()->id)
            ->where('receiver_id', $id)
            ->orwhere('user_id', $id)
            ->where('receiver_id', Auth::user()->id)
            ->orderBy('id', 'asc')
            ->get();
        return response()->json($individual_messages);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\IndividualConversation $individual_conversation
     * @return \Illuminate\Http\Response
     */
    public function edit(IndividualConversation $individual_conversation) {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\IndividualConversation $individual_conversation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IndividualConversation $individual_conversation) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\IndividualConversation $individual_conversation
     * @return \Illuminate\Http\Response
     */
    public function destroy(IndividualConversation $individual_conversation) {
        //
    }
}
