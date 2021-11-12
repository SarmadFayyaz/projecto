<?php

namespace App\Http\Controllers\Backend\Admin;

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
        $page = 'Method O';
        $forms = Form::all();
        return view('backend.admin.form.index', compact('page', 'forms'));
    }

    public function get(Request $request) {
        if ($request->ajax()) {
            $data = Form::with('admin')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('type', function ($row) {
                    return getFormType($row->type);
                })
                ->addColumn('added_by', function ($row) {
                    return $row->admin->name;
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . route('admin.form.edit',
                            $row->id) . '" class="edit btn btn-success btn-sm"><i class="material-icons">edit</i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Form $form
     * @return \Illuminate\Http\Response
     */
    public function edit(Form $form) {
        $page = 'Method O';
        return view('backend.admin.form.edit', compact('page', 'form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Form $form
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Form $form) {
        $this->validate($request, [
            'form' => ['required'],
        ]);
        try {
            DB::beginTransaction();
            $data = $request->except('_token');
            $data['form'] = json_encode($data['form']);
            $form->update($data);
            DB::commit();
            return response()->json(['success' => __('header.updated_successfully', ['name' => __('header.company')])]);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', __('header.something_went_wrong'));
        }
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
