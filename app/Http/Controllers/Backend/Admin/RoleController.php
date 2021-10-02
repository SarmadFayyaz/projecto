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

class RoleController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $page = 'Roles';
        return view('backend.admin.role.index', compact('page'));
    }

    public function get(Request $request) {
        if ($request->ajax()) {
            $data = Role::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('permissions', function ($row) {
                    $permissions = '';
                    foreach ($row->permissions()->pluck('name') as $permission) {
                        $permissions .= '<span class="badge badge-info mr-2">' . $permission . '</span>';
                    }
                    return $permissions;
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . route('admin.role.edit',
                            $row->id) . '" class="edit btn btn-success btn-sm"><i class="material-icons">edit</i></a>';
                    $actionBtn .= '<a href="javascript:void(0)" class="delete remove btn btn-danger btn-sm" data-id="' . $row->id . '"><i class="material-icons">close</i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action', 'permissions'])
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $page = 'Roles';
        $permissions = Permission::all();
        return view('backend.admin.role.create', compact('page', 'permissions'));
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
            'permission' => ['required'],
        ]);
        try {
            DB::beginTransaction();
            $data = $request->except('permission');
            $role = Role::create($data);
            $permissions = $request->input('permission') ? $request->input('permission') : [];
            $role->givePermissionTo($permissions);
            DB::commit();
            return redirect(route('admin.role.index'))->with('success', 'Role added successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Role $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Role $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role) {
        $page = 'Roles';
        $permissions = Permission::all();
        return view('backend.admin.role.edit', compact('page', 'role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Role $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'permission' => ['required'],
        ]);
        try {
            DB::beginTransaction();
            $role = Role::find($id);
            $data = $request->except('permission');
            $role->update($data);
            $permissions = $request->input('permission') ? $request->input('permission') : [];
            $role->syncPermissions($permissions);
            DB::commit();
            return redirect(route('admin.role.index'))->with('success', 'Role updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Role $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role) {
        try {
            DB::beginTransaction();
            $role->delete();
            DB::commit();
            return back()->with('success', 'Role Deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong.');
        }
    }
}
