{{--<!--  Create Event Modal -->--}}
<div class="modal fade" id="createEventModal" tab index="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <div class="card card-signup card-plain">
                <div class="modal-header card-header card-header-{{ $theme }} rounded" style="    width: 90%; left: 5%;">
                    <h4 class="modal-title font-weight-bold">{{ __('header.create_event') }}</h4>
                    <a type="button" class="text-white" style="top:0" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></a>
                </div>
            </div>

            <div class="modal-body card-body scroll-bar">
                <form method="POST" id="createEventForm">
                    @csrf
                    <div class="row justify-content-center">

                        <div class="col-5">
                            <select class="selectpicker project_id" data-style="select-with-transition" name="project_id" required title="{{ __('header.select_project') }}" data-size="4" data-container="body">
                                <option disabled> {{ __('header.select_project') }} </option>
                                @foreach($user_projects as $project)
                                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-5">
                            <select class="selectpicker user_id" data-style="select-with-transition" name="user_id[]" required multiple title="{{ __('header.choose_members') }}" data-size="4" data-container="body">
                                <option disabled> {{ __('header.choose_members') }} </option>
                                @php $user_array = []; @endphp
                                @foreach($user_projects as $project)
                                    @foreach($project->projectUser as $project_user)
                                        @if(!in_array($project_user->user_id, $user_array) && $project_user->user->deleted_at == null)
                                            @php array_push($user_array, $project_user->user_id) @endphp
                                            <option value="{{ $project_user->user_id }}">{{ $project_user->user->first_name . ' '  .$project_user->user->last_name }}</option>
                                        @endif
                                    @endforeach
                                @endforeach
                            </select>
                        </div>

                        <div class="col-10 mb-3">
                            <div class="form-group @error('title') has-danger @enderror">
                                <label for="title" class="bmd-label-floating">{{__('header.title')}}</label>
                                <input type="text" class="form-control title m-0" name="title" required>
                                @error('title')
                                <label class="error">
                                    {{ $message }}
                                </label>
                                @enderror
                            </div>
                        </div>

                        <div class="col-5">
                            <div class="form-group @error('start_date') has-danger @enderror">
                                <label for="start_date" class="bmd-label-floating">{{__('header.start_date')}}</label>
                                <input type="text" name="start_date" class="form-control start_date date_picker" required>
                                @error('start_date')
                                <label class="error">
                                    {{ $message }}
                                </label>
                                @enderror
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group @error('end_date') has-danger @enderror">
                                <label for="end_date" class="bmd-label-floating">{{__('header.end_date')}}</label>
                                <input type="text" name="end_date" class="form-control end_date date_picker" required>
                                @error('end_date')
                                <label class="error">
                                    {{ $message }}
                                </label>
                                @enderror
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group @error('start_time') has-danger @enderror">
                                <label for="start_time" class="bmd-label-floating">{{__('header.start_time')}}</label>
                                <input type="text" name="start_time" class="form-control start_time time_picker" required autocomplete="off">
                                @error('start_time')
                                <label class="error">
                                    {{ $message }}
                                </label>
                                @enderror
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group @error('end_time') has-danger @enderror">
                                <label for="end_time" class="bmd-label-floating">{{__('header.end_time')}}</label>
                                <input type="text" name="end_time" class="form-control end_time time_picker" required autocomplete="off">
                                @error('end_time')
                                <label class="error">
                                    {{ $message }}
                                </label>
                                @enderror
                            </div>
                        </div>

                        <div class="col-5">
                            <div class="form-group @error('type') has-danger @enderror">
                                <select class="selectpicker event_type" data-style="select-with-transition" name="type" required title="{{ __('header.select_event_type') }}" data-size="4" data-container="body">
                                    <option value="1"> {{ __('header.occurring_once') }} </option>
                                    <option value="2"> {{ __('header.recurring_event') }} </option>
                                </select>
                                @error('type')
                                <label class="error">
                                    {{ $message }}
                                </label>
                                @enderror
                            </div>
                        </div>
                        <div class="col-5 recur_event_div" hidden>
                            <div class="form-group @error('days_of_week') has-danger @enderror">
                                <select class="selectpicker days_of_week" data-style="select-with-transition" name="days_of_week[]" multiple title="{{ __('header.select_days') }}" data-size="4" data-container="body">
                                    <option value="0"> {{ __('header.sunday') }} </option>
                                    <option value="1"> {{ __('header.monday') }} </option>
                                    <option value="2"> {{ __('header.tuesday') }} </option>
                                    <option value="3"> {{ __('header.wednesday') }} </option>
                                    <option value="4"> {{ __('header.thursday') }} </option>
                                    <option value="5"> {{ __('header.friday') }} </option>
                                    <option value="6"> {{ __('header.saturday') }} </option>
                                </select>
                                @error('days_of_week')
                                <label class="error">
                                    {{ $message }}
                                </label>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-success">{{ __('header.add') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>{{--<!--  End Modal -->--}}

