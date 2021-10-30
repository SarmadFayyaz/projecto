@extends('layouts.admin')

@section('title', __('header.profile'))

@section('style')
@endsection

@section('content')

    <div class="content mt-md-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-header-icon card-header-{{ $theme }}">
                            <div class="card-icon">
                                <i class="material-icons">perm_identity</i>
                            </div>

                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group @error('name') has-danger @enderror">
                                            <label class="bmd-label-floating">{{ __('header.name') }}</label>
                                            <input type="text" name="name" class="form-control" value="{{ (old('name')) ? old('name') : $admin->name }}" readonly required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group @error('email') has-danger @enderror">
                                            <label class="bmd-label-floating">{{ __('header.email') }}</label>
                                            <input type="email" name="email" class="form-control" value="{{ (old('email')) ? old('email') : $admin->email }}" readonly required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4 password_pic_div" hidden>
                                    <div class="col-md-6">
                                        <div class="form-group @error('password') has-danger @enderror">
                                            <label class="bmd-label-floating">{{ __('header.password') }}</label>
                                            <input type="password" name="password" readonly value="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">{{ __('header.confirm_password') }}</label>
                                            <input type="password" name="password_confirmation" readonly value="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <div class="form-group">
                                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail img-circle">
                                                    <img src="{{( asset('assets/img/placeholder.jpg') )}}" alt="{{ __('header.profile_pic') }}">
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                                                <div>
                                                    <span class="btn btn-success btn-file">
                                                        <span class="fileinput-new">{{ __('header.profile_pic') }}</span>
                                                        <span class="fileinput-exists">{{ __('header.change') }}</span>
                                                        <input type="file" name="image" accept="image/*">
                                                        <div class="ripple-container"></div>
                                                    </span>
                                                    <a href="#pablo" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> {{ __('header.remove') }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col text-center">
                                        <button type="button" class="btn btn-success edit_profile"> {{ __('edit') }} </button>
                                        <button class="btn btn-success update_profile" hidden> {{ __('update') }} </button>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-profile">
                        <div class="card-avatar">
                            <a href="javascript:;">
                                <img class="img" src="{{ Storage::disk('public')->exists($admin->image) ? Storage::disk('public')->url($admin->image) : asset('assets/img/faces/avatar.jpg') }}" width="50" height="50"/>
                            </a>
                        </div>
                        <div class="card-body">
                            <h6 class="card-category text-gray"> Role </h6>
                            <h4 class="card-title">Admin</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $(document).on('click', '.edit_profile', function () {
                $('.form-control').removeAttr('readonly');
                $('.update_profile').removeAttr('hidden');
                $('.password_pic_div').removeAttr('hidden');
                $('.edit_profile').attr('hidden', true);
            });
        });
    </script>
@endsection
