@extends('layouts.app')

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

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Name</label>
                                                <input type="text" class="form-control" value="Alec Thompson"
                                                       readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Email address</label>
                                                <input type="email" class="form-control" value="Alec@lorem.com"
                                                       readonly>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row mt-4">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Password</label>
                                                <input type="password" readonly value="password"
                                                       class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Area of Management</label>
                                                <input type="text" class="form-control" value="Me to do" readonly>
                                            </div>
                                        </div>

                                    </div>

{{--                                    <a href="update-profile.php" class="btn btn-rose pull-right">Update Profile</a>--}}
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-profile">
                            <div class="card-avatar">
                                <a href="#pablo">
                                    <img class="img" src="{{ asset('assets/img/faces/marc.jpg') }}"/>
                                </a>
                            </div>
                            <div class="card-body">
                                <h6 class="card-category text-gray">CEO / Co-Founder</h6>
                                <h4 class="card-title">Alec Thompson</h4>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection

@section('script')
@endsection
