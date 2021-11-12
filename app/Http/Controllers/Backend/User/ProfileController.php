<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller {
    public function index() {
        $page = 'Profile';
        $user = User::find(auth()->id());
        return view('backend.user.profile.index', compact('page', 'user'));
    }

    public function update(Request $request) {
        $user = User::find(auth()->user()->id);
        $this->validate($request, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id . ',id'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'image' => ['sometimes', 'image', 'max:2048'],
        ]);
        try {
            DB::beginTransaction();
            $data = $request->except('_token');
            $data['image'] = $user->image;
            if ($request->hasFile('image')) {
                Storage::disk('public')->delete($user->image);
                $image = Storage::disk('public')->put('user/profile/', $request->image);
                $image = basename($image);
                $data['image'] = '/user/profile/' . $image;
            }
            $data['password'] = ($data['password']) ? Hash::make($data['password']) : $user->password;
            $user->update($data);
            DB::commit();
            return back()->with('success', __('header.updated_successfully', ['name' => __('header.profile')]));
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', __('header.something_went_wrong'));
        }
    }
}
