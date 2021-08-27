<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\Admin;
use DataTables;
use Auth;

class AdminController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $page = 'Admins';
        return view('backend.admin.admin.index', compact('page'));
    }

    public function get(Request $request) {
        if ($request->ajax()) {
            $data = Admin::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . route('admin.edit', $row->id) . '" class="edit btn btn-success btn-sm"><i class="material-icons">edit</i></a>';
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
        $page = 'Admins';
        return view('backend.admin.admin.create', compact('page'));
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'image' => ['sometimes', 'image', 'max:2048'],
        ]);
        try {
            DB::beginTransaction();
            $data = $request->all();
            $data['image'] = null;
            if ($request->hasFile('image')) {
                $image = Storage::disk('public')->put('admin/profile/', $request->image);
                $image = basename($image);
                $data['image'] = '/admin/profile/' . $image;
            }
            $data['password'] = Hash::make($data['password']);
            Admin::create($data);
            DB::commit();
            return back()->with('success', 'Admin added successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin) {
        $page = 'Admins';
        return view('backend.admin.admin.edit', compact('page', 'admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins,email,' . $id . ',id'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'image' => ['sometimes', 'image', 'max:2048'],
        ]);
        try {
            DB::beginTransaction();
            $admin = Admin::find($id);
            $data = $request->all();
            $data['image'] = $admin->image;
            if ($request->hasFile('image')) {
                Storage::disk('public')->delete($admin->image);
                $image = Storage::disk('public')->put('admin/profile/', $request->image);
                $image = basename($image);
                $data['image'] = '/admin/profile/' . $image;
            }
            $data['password'] = ($data['password']) ? Hash::make($data['password']) : $admin->password;
            $admin->update($data);
            DB::commit();
            return back()->with('success', 'Admin updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin) {
        try {
            DB::beginTransaction();
            Storage::disk('public')->delete($admin->image);
            $admin->delete();
            DB::commit();
            return back()->with('success', 'Admin Deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong.');
        }
    }
}
