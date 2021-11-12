<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DataTables;
use Auth;

class PermissionController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $page = 'Permissions';
        return view('backend.admin.permission.index', compact('page'));
    }

    public function get(Request $request) {
        if ($request->ajax()) {
            $data = Permission::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . route('admin.permission.edit', $row->id) . '" class="edit btn btn-success btn-sm"><i class="material-icons">edit</i></a>';
                    $actionBtn .= '<a href="javascript:void(0)" class="delete remove btn btn-danger btn-sm" data-id="' . $row->id . '"><i class="material-icons">close</i></a>';
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
        $page = 'Permissions';
        return view('backend.admin.permission.create', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
        ]);
        try {
            DB::beginTransaction();
            $data = $request->all();
            Permission::create($data);
            DB::commit();
            return redirect(route('admin.permission.index'))->with('success', __('header.added_successfully', ['name' => __('header.permission')]));
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', __('header.something_went_wrong'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission) {
        $page = 'Permissions';
        return view('backend.admin.permission.edit', compact('page', 'permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
        ]);
        try {
            DB::beginTransaction();
            $permission = Permission::find($id);
            $data = $request->all();
            $permission->update($data);
            DB::commit();
            return redirect(route('admin.permission.index'))->with('success', __('header.updated_successfully', ['name' => __('header.permission')]));
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', __('header.something_went_wrong'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission) {
        try {
            DB::beginTransaction();
            $permission->delete();
            DB::commit();
            return back()->with('success', __('header.deleted_successfully', ['name' => __('header.permission')]));
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', __('header.something_went_wrong'));
        }
    }
}
