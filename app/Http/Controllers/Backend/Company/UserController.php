<?php

namespace App\Http\Controllers\Backend\Company;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use App\Models\User;
use DataTables;
use Auth;

class UserController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $page = 'users';
        return view('backend.company.user.index', compact('page'));
    }

    public function get(Request $request) {
        if ($request->ajax()) {
            $data = User::where('company_id', Auth::guard('company')->user()->id)->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('role', function ($row) {
                    $roles = '';
                    foreach ($row->roles->pluck('name') as $role) {
                        $roles .= '<span class="badge badge-' . ((Auth::guard('company')->user()->background) ? Auth::guard('company')->user()->background : 'primary') . ' mr-2">' . $role . '</span>';
                    }
                    return $roles;
                })
                ->addColumn('name', function ($row) {
                    return $row->first_name . ' ' . $row->last_name;
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . route('company.user.edit',
                            $row->id) . '" class="edit btn btn-success btn-sm"><i class="material-icons">edit</i></a>';
                    $actionBtn .= '<a href="javascript:void(0)" class="delete remove btn btn-danger btn-sm" data-id="' . $row->id . '"><i class="material-icons">close</i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action', 'role'])
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $page = 'users';
        $roles = Role::all();
        return view('backend.company.user.create', compact('page', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role' => 'required',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'image' => ['sometimes', 'image', 'max:2048'],
        ]);
        try {
            DB::beginTransaction();
            $data = $request->all();
            $data['image'] = null;
            if ($request->hasFile('image')) {
                $image = Storage::disk('public')->put('user/profile/', $request->image);
                $image = basename($image);
                $data['image'] = '/user/profile/' . $image;
            }
            $data['password'] = Hash::make($data['password']);
            $data['company_id'] = Auth::guard('company')->user()->id;
            $role = $request->input('role') ? $request->input('role') : [];
            $user = User::create($data);
            $user->assignRole($role);
            DB::commit();
            return redirect(route('company.user.index'))->with('success', 'User added successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user) {
        $page = 'users';
        $roles = Role::all();
        return view('backend.company.user.edit', compact('page', 'user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $id . ',id'],
            'role' => 'required',
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'image' => ['sometimes', 'image', 'max:2048'],
        ]);
        try {
            DB::beginTransaction();
            $user = User::find($id);
            $data = $request->all();
            $data['image'] = $user->image;
            if ($request->hasFile('image')) {
                Storage::disk('public')->delete($user->image);
                $image = Storage::disk('public')->put('user/profile/', $request->image);
                $image = basename($image);
                $data['image'] = '/user/profile/' . $image;
            }
            $data['password'] = ($data['password']) ? Hash::make($data['password']) : $user->password;
            $user->update($data);
            $role = $request->input('role') ? $request->input('role') : [];
            $user->syncRoles($role);
            DB::commit();
            return redirect(route('company.user.index'))->with('success', 'User updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user) {
        try {
            DB::beginTransaction();
            Storage::disk('public')->delete($user->image);
            $user->delete();
            DB::commit();
            return back()->with('success', 'User Deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong.');
        }
    }
}
