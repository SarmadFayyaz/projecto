{{--<!--  Create Event Modal -->--}}
<div class="modal fade" id="createEventModal" tab index="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl mr-md-2">
        <div class="modal-content">

            <div class="card card-signup card-plain">
                <div class="modal-header card-header card-header-primary" style="    width: 90%; left: 5%;">
                    <h4 class="modal-title">{{ __('header.create_event') }}</h4>
                    <a type="button" class="text-white" style="top:0" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></a>
                </div>
            </div>

            <div class="modal-body card-body scroll-bar">
                <form method="POST" id="createEventForm">
                    @csrf
                    <input type="hidden" name="start" class="start">
                    <input type="hidden" name="end" class="end">
                    <div class="row justify-content-center">
                        <div class="col-8 mb-3">
                            <select class="selectpicker project_id" data-style="select-with-transition" name="project_id" required title="{{ __('header.select_project') }}" data-size="4" data-container="body">
                                <option disabled> {{ __('header.select_project') }} </option>
                                @foreach($user_projects as $project)
                                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-8 mb-3">
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
                        <div class="col-8 mb-3">
                            <div class="form-group @error('title') has-danger @enderror">
                                <label for="description" class="bmd-label-floating">{{__('header.title')}}</label>
                                <input type="text" class="form-control title" name="title" required>
                                @error('title')
                                <label class="error">
                                    {{ $message }}
                                </label>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary">{{ __('header.add') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>{{--<!--  End Modal -->--}}

