<!-- Add New TaskModal -->
<div class="modal fade" id="addNewTaskModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md pb-0 mb-0">
        <div class="modal-content">

            <div class="card card-signup card-plain">
                <div class="modal-header card-header card-header-primary" style="    width: 90%; left: 5%;">
                    <h4 class="modal-title">{{ __('header.add_new_task') }}</h4>
                    <a type="button" class="text-white" style="top:0" data-dismiss="modal" aria-hidden="true"> <i class="material-icons">clear</i> </a>
                </div>
            </div>

            <form action="{{ route('task.store') }}" method="post">
                @csrf
                <input type="hidden" name="project_id" value="{{ $project->id }}">
                <div class="modal-body card-body scroll-bar" style="height: 63vh;overflow: auto;">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group @error('name') has-danger @enderror">
                                <label for="exampleEmail" class="bmd-label-floating">
                                    {{ __('header.task_name') }}
                                </label> <input type="text" class="form-control" name="name" required value="{{ old('name') }}">
                                @error('name')
                                <label class="error">
                                    {{ $message }}
                                </label>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group @error('team_members') has-danger @enderror">
                                <select class="selectpicker" name="team_members[]" id="team_members" multiple data-style="select-with-transition" data-size="4" required data-width="100%" title="{{ __('header.choose_members') }}">
                                    <option disabled> {{ __('header.choose_members') }} </option>
                                    @foreach($project->projectUser as $projectUser)
                                        @if($projectUser->user->hasRole('User') && $projectUser->user->id != Auth::user()->id)
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
                                </label> <input type="text" class="form-control date_picker" name="start_date" id="start_date" required value="{{ old('start_date') }}">
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
                                </label> <input type="text" class="form-control date_picker" name="end_date" id="end_date" required value="{{ old('end_date') }}">
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
                                <span>{{ __('header.actions_max') }}</span> <span class="pull-right"> <i class="fa fa-plus text-success cursor-pointer add_action"></i> </span>
                            </p>
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

