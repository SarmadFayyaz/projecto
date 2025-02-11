<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Form;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\DB;

class FormController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Form $form
     * @return \Illuminate\Http\Response
     */
    public function show(Form $form) {
        return view('backend.user.project.extras.method-o', compact('form'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Form $form
     * @return \Illuminate\Http\Response
     */
    public function edit(Form $form) {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Form $form
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Form $form) {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Form $form
     * @return \Illuminate\Http\Response
     */
    public function destroy(Form $form) {
        //
    }
}
