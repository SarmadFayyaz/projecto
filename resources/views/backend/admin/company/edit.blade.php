@extends('layouts.admin')

@section('title', __('header.edit_company'))

@section('style')

@endsection

@section('content')

    <div class="content mt-md-5">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card ">
                        <div class="card-header card-header-info card-header-icon">
                            <div class="card-icon">
                                <i class="fas fa-briefcase"></i>
                            </div>
                            <h4 class="card-title">{{__('header.edit_company')}}</h4>
                        </div>
                        <form method="post" action="{{ route('admin.company.update', $company->id) }}"
                              enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="card-body ">
                                    @yield('message')
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group @error('name') has-danger @enderror">
                                            <label for="name" class="bmd-label-floating">{{__('header.name')}}</label>
                                            <input type="text" class="form-control" name="name"
                                                   value="{{ (old('name')) ? old('name') : $company->name }}">
                                            @error('name')
                                            <label class="error">
                                                {{ $message }}
                                            </label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group @error('email') has-danger @enderror">
                                            <label for="email" class="bmd-label-floating">{{__('header.email')}}</label>
                                            <input type="email" class="form-control" name="email"
                                                   value="{{ (old('email')) ? old('email') : $company->email }}">
                                            @error('email')
                                            <label class="error">
                                                {{ $message }}
                                            </label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group @error('password') has-danger @enderror">
                                            <label for="password" class="bmd-label-floating">
                                                {{__('header.password')}}
                                            </label>
                                            <input type="password" class="form-control" name="password">
                                            @error('password')
                                            <label class="error">
                                                {{ $message }}
                                            </label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="password_confirmation"
                                                   class="bmd-label-floating">{{__('header.confirm_password')}}</label>
                                            <input type="password" class="form-control" name="password_confirmation">
                                        </div>
                                    </div>
                                    <div class="col-12 text-center mt-3">
                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail img-circle">
                                                <img src="{{Storage::disk('public')->exists($company->image) ? Storage::disk('public')->url($company->image) : asset('assets/img/placeholder.jpg')}}">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                                            <div>
                                              <span class="btn btn-info btn-file">
                                                <span class="fileinput-exists" style="display: block">{{__('header.change')}}</span>
                                                <input type="file" name="image" accept="image/*"/>
                                              </span>
                                            </div>
                                            @error('image')
                                            <label class="error">
                                                {{ $message }}
                                            </label>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <button type="submit"
                                        class="btn btn-fill btn-info ml-auto">{{__('header.update')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
@endsection
