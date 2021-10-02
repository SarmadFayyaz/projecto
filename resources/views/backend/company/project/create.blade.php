@extends('layouts.company')

@section('title', __('header.add_project'))

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
                            <h4 class="card-title">{{__('header.add_project')}}</h4>
                        </div>
                        <form method="post" action="{{ route('company.project.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-sm-12 col-md-4 mt-2">
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
                                    <div class="col-sm-12 col-md-4 mt-2">
                                        <div class="form-group @error('strategic_goal') has-danger @enderror">
                                            <label for="strategic_goal"
                                                   class="bmd-label-floating">{{__('header.strategic_goal')}}</label>
                                            <input type="text" class="form-control" name="strategic_goal"
                                                   value="{{ old('strategic_goal') }}">
                                            @error('strategic_goal')
                                            <label class="error">
                                                {{ $message }}
                                            </label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 mt-2">
                                        <div class="form-group @error('purpose') has-danger @enderror">
                                            <label for="purpose"
                                                   class="bmd-label-floating">{{__('header.purpose')}}</label>
                                            <input type="text" class="form-control" name="purpose"
                                                   value="{{ old('purpose') }}">
                                            @error('purpose')
                                            <label class="error">
                                                {{ $message }}
                                            </label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 mt-2">
                                        <div class="form-group @error('project_goal') has-danger @enderror">
                                            <label for="project_goal"
                                                   class="bmd-label-floating">{{__('header.project_goal')}}</label>
                                            <input type="text" class="form-control" name="project_goal"
                                                   value="{{ old('project_goal') }}">
                                            @error('project_goal')
                                            <label class="error">
                                                {{ $message }}
                                            </label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 mt-2">
                                        <div class="form-group @error('project_leader') has-danger @enderror">
                                            <select class="selectpicker" name="project_leader" id="project_leader"
                                                    data-style="select-with-transition" data-size="4" data-width="100%"
                                                    title="{{ __('header.select_boss_leader') }}">
                                                <option disabled> {{ __('header.select_boss_leader') }} </option>
                                                @foreach($users as $user)
                                                    @if($user->hasRole('Boss'))
                                                    <option
                                                        value="{{ $user->id }}" {{ ($user->id == old('project_leader')) ? 'selected' : '' }}>
                                                        {{ $user->name }}
                                                    </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @error('project_leader')
                                            <label class="error">
                                                {{ $message }}
                                            </label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 mt-2">
                                        <div class="form-group @error('user') has-danger @enderror">
                                            <select class="selectpicker" name="team_members[]" id="team_members"
                                                    multiple data-style="select-with-transition" data-size="4"
                                                    data-width="100%" title="{{ __('header.select_team_members') }}">
                                                <option disabled> {{ __('header.select_team_members') }} </option>
                                                @foreach($users as $user)
                                                    @if($user->hasRole(['User', 'Sponsor']))
                                                    <option
                                                        value="{{ $user->id }}" {{ ($user->id == old('user')) ? 'selected' : '' }}>
                                                        {{ $user->name }}
                                                    </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @error('team_members')
                                            <label class="error">
                                                {{ $message }}
                                            </label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 mt-2">
                                        <div class="form-group @error('start_date') has-danger @enderror">
                                            <label for="start_date" class="bmd-label-floating">
                                                {{__('header.start_date')}}
                                            </label>
                                            <input type="text" class="form-control date_picker" name="start_date"
                                                   value="{{ old('start_date') }}">
                                            @error('start_date')
                                            <label class="error">
                                                {{ $message }}
                                            </label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 mt-2">
                                        <div class="form-group @error('end_date') has-danger @enderror">
                                            <label for="end_date" class="bmd-label-floating">
                                                {{__('header.end_date')}}
                                            </label>
                                            <input type="text" class="form-control date_picker" name="end_date"
                                                   value="{{ old('end_date') }}">
                                            @error('end_date')
                                            <label class="error">
                                                {{ $message }}
                                            </label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 mt-2">
                                        <div class="form-group @error('color') has-danger @enderror">
                                            <select class="selectpicker" name="color" id="color"
                                                    data-style="select-with-transition" data-size="4"
                                                    data-width="100%" title="{{ __('header.select_color') }}">
                                                <option disabled> {{ __('header.select_color') }} </option>
                                                <option value="red" {{ ('red' == old('color')) ? 'selected' : '' }}>
                                                    {{ __('header.red') }}
                                                </option>
                                                <option value="yellow" {{ ('yellow' == old('color')) ? 'selected' : '' }}>
                                                    {{ __('header.yellow') }}
                                                </option>
                                                <option value="blue" {{ ('blue' == old('color')) ? 'selected' : '' }}>
                                                    {{ __('header.blue') }}
                                                </option>
                                                <option value="green" {{ ('green' == old('color')) ? 'selected' : '' }}>
                                                    {{ __('header.green') }}
                                                </option>
                                                <option value="orange" {{ ('orange' == old('color')) ? 'selected' : '' }}>
                                                    {{ __('header.orange') }}
                                                </option>
                                            </select>
                                            @error('color')
                                            <label class="error">
                                                {{ $message }}
                                            </label>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 mt-2">
                                        <div class="form-group @error('description') has-danger @enderror">
                                            <label for="description"
                                                   class="bmd-label-floating">{{__('header.description')}}</label>
                                            <textarea class="form-control" name="description" id="description" cols="30"
                                                      rows="3">{{ old('description') }}</textarea>
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
    <script>
        $(document).ready(function () {
            $('.date_picker').click(function (){
                $(this).closest('.form-group').addClass('is-filled');
            });
            $('.date_picker').datetimepicker({
                format: 'YYYY-MM-DD',
                icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down",
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right',
                    today: 'fa fa-screenshot',
                    clear: 'fa fa-trash',
                    close: 'fa fa-remove'
                }
            });
        });
    </script>
@endsection
