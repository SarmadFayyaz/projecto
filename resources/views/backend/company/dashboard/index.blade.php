@extends('layouts.company')

@section('title', __('header.dashboard'))

@section('style')
@endsection

@section('content')

    <div class="content mt-5">
        <div class="content mt-md-5">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-info card-header-icon">
                            <div class="card-icon mb-2">
                                <i class="fas fa-briefcase"></i>
                            </div>
                            <p class="card-category">{{__('header.total_projects')}}</p>
                            <h3 class="card-title">184</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-success card-header-icon">
                            <div class="card-icon mb-2">
                                <i class="fas fa-users"></i>
                            </div>
                            <p class="card-category">{{__('header.total_users')}}</p>
                            <h3 class="card-title">184</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-warning card-header-icon">
                            <div class="card-icon mb-2">
                                <i class="material-icons">work</i>
                            </div>
                            <p class="card-category">{{__('header.active_projects')}}</p>
                            <h3 class="card-title">184</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-danger card-header-icon">
                            <div class="card-icon mb-2">
                                <i class="material-icons">work_off</i>
                            </div>
                            <p class="card-category">{{__('header.pending_projects')}}</p>

                            <h3 class="card-title">184</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
