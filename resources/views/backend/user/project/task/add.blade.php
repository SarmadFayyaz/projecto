<!-- Add New TaskModal -->
<div class="modal fade" id="addNewTaskModal" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: 11111111111111111;">
    <div class="modal-dialog modal-md pb-0 mb-0">
        <div class="modal-content">

            <div class="card card-signup card-plain">
                <div class="modal-header card-header card-header-{{ $theme }} rounded" style="    width: 90%; left: 5%;">
                    <h4 class="modal-title font-weight-bold">{{ __('header.add_new_task') }}</h4>
                    <a type="button" class="text-white" style="top:0" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></a>
                </div>
            </div>

            <form action="" method="post" id="addNewTaskForm">
                @csrf
                <input type="hidden" name="project_id" value="{{ $project->id }}">
                <div class="modal-body card-body scroll-bar" style="height: 63vh;overflow: auto;">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group @error('name') has-danger @enderror">
                                <label for="exampleEmail" class="bmd-label-floating">
                                    {{ __('header.task_name') }}
                                </label>
                                <input type="text" class="form-control" name="name" required value="{{ old('name') }}">
                                @error('name')
                                <label class="error">
                                    {{ $message }}
                                </label>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group @error('team_members') has-danger @enderror">
                                <select class="selectpicker" name="team_members[]" id="team_members" multiple data-style="select-with-transition" data-size="4" data-width="100%" title="{{ __('header.choose_members') }}">
                                    <option disabled> {{ __('header.choose_members') }} </option>
                                    @foreach($project->projectUser as $projectUser)
                                        @if($projectUser->user->hasRole('User') && $projectUser->user->id != Auth::user()->id && $projectUser->user->deleted_at == null)
                                            <option value="{{ $projectUser->user->id }}" {{ (in_array($projectUser->user->id, old('team_members', []))) ? 'selected' : '' }}>
                                                {{ $projectUser->user->first_name . ' ' . $projectUser->user->last_name }}
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
                        <div class="col-md-6">
                            <div class="form-group @error('start_date') has-danger @enderror">
                                <label for="start_date" class="bmd-label-floating">
                                    {{__('header.start_date')}}
                                </label>
                                <input type="text" class="form-control date_picker start_date" name="start_date" id="start_date" required value="{{ old('start_date') }}">
                                @error('start_date')
                                <label class="error">
                                    {{ $message }}
                                </label>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group @error('end_date') has-danger @enderror">
                                <label for="end_date" class="bmd-label-floating">
                                    {{__('header.end_date')}}
                                </label>
                                <input type="text" class="form-control date_picker end_date" name="end_date" id="end_date" required value="{{ old('end_date') }}">
                                @error('end_date')
                                <label class="error">
                                    {{ $message }}
                                </label>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group @error('description') has-danger @enderror">
                                <label for="exampleEmail" class="bmd-label-floating">
                                    {{ __('header.brief_description_of_task') }}
                                </label> <textarea name="description" cols="30" rows="2" class="form-control">{{ old('description') }}</textarea>
                                @error('description')
                                <label class="error">
                                    {{ $message }}
                                </label>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12" id="actions">
                            <p for="actions" class="bmd-label-floating">
                                <span>{{ __('header.actions_max') }}</span>
                                <span class="pull-right"><i class="fa fa-plus text-success cursor-pointer add_action"></i></span>
                            </p>

                            <div class="added_action mb-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text action_counter">1</span>
                                    </div>
                                    <input type="text" class="form-control text-capitalize" required name="action[]" placeholder="{{ __('header.add_action') }}">
                                </div>
{{--                                <div class="input-group">--}}
{{--                                    <div class="input-group-prepend pr-2">--}}
{{--                                        <span class="input-group-text"></span>--}}
{{--                                    </div>--}}
{{--                                    <input type="text" class="form-control text-capitalize" name="action_notes[]" placeholder="{{ __('header.add_action_note') }}">--}}
{{--                                </div>--}}
                            </div>
                            @error('action')
                            <label class="error">
                                {{ $message }}
                            </label>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success ml-auto mr-auto">
                        {{ __('header.add') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div><!--  End Modal -->

