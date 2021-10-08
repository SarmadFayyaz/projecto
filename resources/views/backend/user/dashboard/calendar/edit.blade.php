
{{--<!-- Edit Event Modal -->--}}
<div class="modal fade" id="editEventModal" tab index="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl mr-md-2">
        <div class="modal-content">

            <div class="card card-signup card-plain">
                <div class="modal-header card-header card-header-primary" style="    width: 90%; left: 5%;">
                    <h4 class="modal-title">{{ __('header.event_edit') }}</h4>
                    <a type="button" class="text-white" style="top:0" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></a>
                </div>
            </div>

            <div class="modal-body card-body scroll-bar">
                <form method="POST" id="editEventForm">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" class="id" >
                    <div class="row justify-content-center">
                        <div class="col-8 mb-3">
                            <select class="selectpicker project_id" data-style="select-with-transition" name="project_id" required title="{{ __('header.select_project') }}" data-size="4" data-container="body">
                                <option disabled> {{ __('header.select_project') }} </option>
                                @foreach($user_projects as $project)
                                    <option value="{{ $project->id }}" >{{ $project->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-8 mb-3">
                            <select class="selectpicker user_id" data-style="select-with-transition" name="user_id[]" required multiple title="{{ __('header.choose_members') }}" data-size="4" data-container="body">
                                <option disabled> {{ __('header.choose_members') }} </option>
                                @php
                                    $user_array = [];
                                @endphp
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
                        <div class="col-8 mb-3">
                            <div class="form-group @error('title') has-danger @enderror">
                                <label for="title" class="bmd-label-floating">{{__('header.title')}}</label>
                                <input type="text" class="form-control title" name="title" required value="">
                                @error('title')
                                <label class="error">
                                    {{ $message }}
                                </label>
                                @enderror
                            </div>
                        </div>
                        <div class="col-8 mb-3">
                            <div class="form-group @error('start') has-danger @enderror">
                                <label for="start" class="bmd-label-floating">{{__('header.start')}}</label>
                                <input type="text" name="start" class="form-control start date_time_picker">
                                @error('start')
                                <label class="error">
                                    {{ $message }}
                                </label>
                                @enderror
                            </div>
                        </div>
                        <div class="col-8 mb-3">
                            <div class="form-group @error('end') has-danger @enderror">
                                <label for="end" class="bmd-label-floating">{{__('header.end')}}</label>
                                <input type="text" name="end" class="form-control end date_time_picker">
                                @error('end')
                                <label class="error">
                                    {{ $message }}
                                </label>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary">{{ __('header.update') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{--<!--  End Modal -->--}}
