<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FaqController extends Controller {
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
            'question' => ['required', 'string', 'max:255'],
            'answer' => ['required', 'string',],
            'status' => ['required'],
        ]);
        try {
            DB::beginTransaction();
            $data = $request->except('_token');
            $data['admin_id'] = auth()->guard('admin')->user()->id;
            Faq::create($data);
            DB::commit();
            return back()->with('success', __('header.added_successfully', ['name' => __('header.faq')]));
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', __('header.something_went_wrong'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Faq $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Faq $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Faq $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faq $faq) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Faq $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq) {
        try {
            DB::beginTransaction();
            $id = $faq->id;
            $faq->delete();
            DB::commit();
            return response()->json(['success' => __('header.deleted_successfully', ['name' => __('header.faq')]), 'type' => 'faq', 'id' => $id]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => __('header.something_went_wrong')]);
        }
    }
}
