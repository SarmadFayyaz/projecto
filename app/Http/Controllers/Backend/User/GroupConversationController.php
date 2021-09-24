<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use App\Events\GroupMessage;
use App\Models\Document;
use App\Models\GroupConversation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use DataTables;
use Illuminate\Support\Facades\Storage;

class GroupConversationController extends Controller {
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
        ]);
        try {
            DB::beginTransaction();
            $data = $request->except('_token');
            $data['user_id'] = Auth::user()->id;
            if ($request->hasFile('file')) {
                $doc_data['project_id'] = $data['project_id'];
                $doc_data['user_id'] = $data['user_id'];
                $doc_data['section'] = $data['message_type'];
                $doc_data['name'] = ($request->file)->getClientOriginalName();
                $doc_data['name'] = pathinfo($doc_data['name'], PATHINFO_FILENAME);
                $doc_data['type'] = ($request->file)->getClientOriginalExtension();
                $file = Storage::disk('public')->put('project/' . $data['project_id'] . '/documents/', $request->file);
                $file = basename($file);
                $doc_data['file'] = '/project/' . $data['project_id'] . '/documents/' . $file;
                $doc_id = Document::create($doc_data)->id;
                $data['document_id'] = $doc_id;
            }
            $id = GroupConversation::create($data)->id;
            $group_conversation = GroupConversation::with('user', 'document')->where('id', $id)->first();
            DB::commit();
            broadcast(new GroupMessage($group_conversation))->toOthers();
            return response()->json($group_conversation);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\GroupConversation $group_conversation
     * @return \Illuminate\Http\Response
     */
    public function show(GroupConversation $group_conversation) {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\GroupConversation $group_conversation
     * @return \Illuminate\Http\Response
     */
    public function edit(GroupConversation $group_conversation) {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\GroupConversation $group_conversation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GroupConversation $group_conversation) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\GroupConversation $group_conversation
     * @return \Illuminate\Http\Response
     */
    public function destroy(GroupConversation $group_conversation) {
        //
    }
}
