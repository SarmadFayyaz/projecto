<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller {
    public function index() {
        $page = 'Profile';
        $admin = Admin::find(auth('admin')->user()->id);
        return view('backend.admin.profile.index', compact('page', 'admin'));
    }

    public function update(Request $request) {
        $admin = Admin::find(auth()->guard('admin')->user()->id);
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins,email,' . $admin->id . ',id'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'image' => ['sometimes', 'image', 'max:2048'],
        ]);
        try {
            DB::beginTransaction();
            $data = $request->except('_token');
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
            return back()->with('success', __('header.updated_successfully', ['name' => __('header.profile')]));
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', __('header.something_went_wrong'));
        }
    }
}
