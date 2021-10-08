@extends('layouts.user')

@section('title', 'Profile')

@section('style')
@endsection

@section('content')

    <div class="content mt-md-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-header-icon card-header-rose">
                            <div class="card-icon">
                                <i class="material-icons">perm_identity</i>
                            </div>

                        </div>
                        <div class="card-body">
                            <form>
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">First Name</label>
                                            <input type="text" class="form-control" value="{{ $user->first_name }}"
                                                   readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">First Name</label>
                                            <input type="text" class="form-control" value="{{ $user->last_name }}"
                                                   readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Email address</label>
                                            <input type="email" class="form-control" value="{{ $user->email }}"
                                                   readonly>
                                        </div>
                                    </div>
                                </div>


{{--                                <div class="row mt-4">--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label class="bmd-label-floating">Password</label>--}}
{{--                                            <input type="password" readonly value="" class="form-control">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label class="bmd-label-floating">Confirm Password</label>--}}
{{--                                            <input type="password" readonly value="" class="form-control">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label class="bmd-label-floating">Area of Management</label>--}}
{{--                                            <input type="text" class="form-control" value="Me to do" readonly>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                </div>--}}
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-profile">
                        <div class="card-avatar">
                            <a href="javascript:;">
                                <img class="img" src="{{ Storage::disk('public')->exists($user->image) ? Storage::disk('public')->url($user->image) : asset('assets/img/faces/avatar.jpg') }}" width="50" height="50"/>
                            </a>
                        </div>
                        <div class="card-body">
                            <h6 class="card-category text-gray"> Role </h6>
                            <h4 class="card-title">{{ $user->getRoleNames()[0] }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
@endsection
