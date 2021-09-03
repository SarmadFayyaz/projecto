@extends('layouts.admin')

@section('title', __('header.edit_role'))

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
                                <i class="fas fa-user-tag"></i>
                            </div>
                            <h4 class="card-title">{{__('header.edit_role')}}</h4>
                        </div>
                        <form method="post" action="{{ route('admin.role.update', $role->id) }}"
                              enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="card-body ">
                                @if (session('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                @if (session('error'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('error') }}
                                    </div>
                                @endif
                                @yield('message')
                                <div class="row mt-3">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group @error('name') has-danger @enderror">
                                            <label for="name" class="bmd-label-floating">{{__('header.name')}}</label>
                                            <input type="text" class="form-control" name="name"
                                                   value="{{ (old('name')) ? old('name') : $role->name }}">
                                            @error('name')
                                            <label class="error">
                                                {{ $message }}
                                            </label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group @error('permission') has-danger @enderror">
                                            <select class="selectpicker" name="permission[]" id="permission"
                                                    data-style="select-with-transition" multiple
                                                    title="{{ __('header.select_permissions') }}" data-size="4"
                                                    data-width="100%">
                                                <option disabled>{{ __('header.select_multiple_permissions') }}</option>
                                                @foreach($permissions as $permission)
                                                    <option value="{{ $permission->id }}"
                                                        {{ (in_array($permission->id, old('permission', [])) || isset($role) && $role->permissions->contains($permission->id)) ? 'selected' : '' }}>
                                                        {{ $permission->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('permission')
                                            <label class="error">
                                                {{ $message }}
                                            </label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group @error('name') has-danger @enderror">
                                            <label for="description"
                                                   class="bmd-label-floating">{{__('header.description')}}</label>
                                            <textarea class="form-control" name="description" id="description" cols="30"
                                                      rows="3">{{ old('description') ? old('description') : $role->description }}</textarea>
                                            @error('description')
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
