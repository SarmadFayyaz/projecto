@extends('layouts.company')

@section('title', __('header.add_user'))

@section('style')

@endsection

@section('content')

    <div class="content mt-md-5">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card ">
                        <div class="card-header card-header-{{ $theme }} card-header-icon">
                            <div class="card-icon">
                                <i class="fas fa-user"></i>
                            </div>
                            <h4 class="card-title">{{__('header.add_user')}}</h4>
                        </div>
                        <form method="post" action="{{ route('company.user.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-sm-12 col-md-3">
                                        <div class="form-group @error('first_name') has-danger @enderror">
                                            <label for="first_name" class="bmd-label-floating">{{__('header.first_name')}}</label>
                                            <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}">
                                            @error('first_name')
                                            <label class="error">
                                                {{ $message }}
                                            </label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <div class="form-group @error('last_name') has-danger @enderror">
                                            <label for="last_name" class="bmd-label-floating">{{__('header.last_name')}}</label>
                                            <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}">
                                            @error('last_name')
                                            <label class="error">
                                                {{ $message }}
                                            </label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <div class="form-group @error('email') has-danger @enderror">
                                            <label for="email" class="bmd-label-floating">{{__('header.email')}}</label>
                                            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                            @error('email')
                                            <label class="error">
                                                {{ $message }}
                                            </label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <div class="form-group @error('role') has-danger @enderror">
                                            <select class="selectpicker" name="role" id="role" data-style="select-with-transition" data-size="4" data-width="100%" title="{{ __('header.choose_role') }}">
                                                <option disabled> {{ __('header.select_role') }} </option>
                                                @foreach($roles as $role)
                                                    <option value="{{ $role->id }}" {{ ($role->id == old('role')) ? 'selected' : '' }}>
                                                        {{ $role->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('role')
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
                                            <label for="password_confirmation" class="bmd-label-floating">{{__('header.confirm_password')}}</label>
                                            <input type="password" class="form-control" name="password_confirmation">
                                        </div>
                                    </div>
                                    <div class="col-12 text-center mt-3">
                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail img-circle">
                                                <img src="{{ asset('assets/img/placeholder.jpg') }}">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                                            <div>
                                                <span class="btn btn-success btn-file">
                                                    <span class="fileinput-new">{{__('header.add_photo')}}</span>
                                                    <span class="fileinput-exists">{{__('header.change')}}</span>
                                                    <input type="file" name="image" accept="image/*"/>
                                                </span>
                                                <a href="#pablo" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> {{__('header.remove')}}</a>
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
                                <button type="submit" class="btn btn-fill btn-success ml-auto">{{__('header.add')}}</button>
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
