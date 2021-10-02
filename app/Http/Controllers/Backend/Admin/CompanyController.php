<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\Company;
use DataTables;
use Auth;

class CompanyController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $page = 'Companies';
        return view('backend.admin.company.index', compact('page'));
    }

    public function get(Request $request) {
        if ($request->ajax()) {
            $data = Company::with('admin')->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . route('admin.company.edit', $row->id) . '" class="edit btn btn-success btn-sm"><i class="material-icons">edit</i></a>';
                    $actionBtn .= '<a href="javascript:void(0)" class="delete remove btn btn-danger btn-sm" data-id="' . $row->id . '"><i class="material-icons">close</i></a>';
                    return $actionBtn;
                })
                ->editColumn('admin_id', function ($data) {
                    $admin_name = $data->admin->name;
                    return $admin_name;
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
        $page = 'Companies';
        return view('backend.admin.company.create', compact('page'));
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:companies'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'image' => ['sometimes', 'image', 'max:2048'],
        ]);
        try {
            DB::beginTransaction();
            $data = $request->all();
            $data['image'] = null;
            if ($request->hasFile('image')) {
                $image = Storage::disk('public')->put('company/profile/', $request->image);
                $image = basename($image);
                $data['image'] = '/company/profile/' . $image;
            }
            $data['password'] = Hash::make($data['password']);
            $data['admin_id'] = Auth::guard('admin')->user()->id;
            Company::create($data);
            DB::commit();
            return redirect(route('admin.company.index'))->with('success', 'Company added successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Company $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Company $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company) {
        $page = 'Companies';
        return view('backend.admin.company.edit', compact('page', 'company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Company $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:companies,email,' . $id . ',id'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'image' => ['sometimes', 'image', 'max:2048'],
        ]);
        try {
            DB::beginTransaction();
            $company = Company::find($id);
            $data = $request->all();
            $data['image'] = $company->image;
            if ($request->hasFile('image')) {
                Storage::disk('public')->delete($company->image);
                $image = Storage::disk('public')->put('company/profile/', $request->image);
                $image = basename($image);
                $data['image'] = '/company/profile/' . $image;
            }
            $data['password'] = ($data['password']) ? Hash::make($data['password']) : $company->password;
            $company->update($data);
            DB::commit();
            return redirect(route('admin.company.index'))->with('success', 'Company Updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Company $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company) {
        try {
            DB::beginTransaction();
            Storage::disk('public')->delete($company->image);
            $company->delete();
            DB::commit();
            return back()->with('success', 'Company Deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong.');
        }
    }
}
