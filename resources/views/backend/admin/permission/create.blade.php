@extends('layouts.admin')

@section('title', __('header.add_permission'))

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
                                <i class="fas fa-user-shield"></i>
                            </div>
                            <h4 class="card-title">{{__('header.add_permissions')}}</h4>
                        </div>
                        <form method="post" action="{{ route('admin.permission.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body ">
                                <div class="row justify-content-center">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group @error('name') has-danger @enderror">
                                            <label for="name" class="bmd-label-floating">{{__('header.name')}}</label>
                                            <input type="text" class="form-control" name="name"
                                                   value="{{ old('name') }}">
                                            @error('name')
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
                                        class="btn btn-fill btn-info ml-auto">{{__('header.add')}}</button>
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
