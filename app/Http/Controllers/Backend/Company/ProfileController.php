<?php

namespace App\Http\Controllers\Backend\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller {
    public function index() {
        $page = 'Profile';
        $company = Company::find(auth('company')->user()->id);
        return view('backend.company.profile.index', compact('page', 'company'));
    }

    public function update(Request $request) {
        $company = Company::find(auth()->guard('company')->user()->id);
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:companies,email,' . $company->id . ',id'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'image' => ['sometimes', 'image', 'max:2048'],
            'logo' => ['sometimes', 'image', 'max:2048'],
        ]);
        try {
            DB::beginTransaction();
            $data = $request->except('_token');
            $data['image'] = $company->image;
            if ($request->hasFile('image')) {
                Storage::disk('public')->delete($company->image);
                $image = Storage::disk('public')->put('company/profile/', $request->image);
                $image = basename($image);
                $data['image'] = '/company/profile/' . $image;
            }
            $data['logo'] = $company->logo;
            if ($request->hasFile('logo')) {
                Storage::disk('public')->delete($company->logo);
                $image = Storage::disk('public')->put('company/logo/', $request->logo);
                $image = basename($image);
                $data['logo'] = '/company/logo/' . $image;
            }
            $data['password'] = ($data['password']) ? Hash::make($data['password']) : $company->password;
            $company->update($data);
            DB::commit();
            return back()->with('success', 'Profile updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong.');
        }
    }
}
