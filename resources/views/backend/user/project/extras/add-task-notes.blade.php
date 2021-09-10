
<!-- Task Notes Modal -->
<div class="modal fade" id="taskNotesModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md pb-0 mb-0">
        <div class="modal-content">

            <div class="card card-signup card-plain">
                <div class="modal-header card-header card-header-primary" style="    width: 90%; left: 5%;">
                    <h4 class="modal-title">{{ __('header.add_note') }}</h4>
                    <a type="button" class="text-white" style="top:0" data-dismiss="modal" aria-hidden="true"> <i class="material-icons">clear</i> </a>
                </div>
            </div>

            <form action="{{ route('task-note.store') }}" method="post">
                @csrf
                <input type="hidden" name="project_id" value="{{ $project->id }}">
                <div class="modal-body card-body scroll-bar">
                    <select class="selectpicker" data-size="7" data-style="select-with-transition" title="{{ __('header.select_task') }}" data-container="body" name="task_id" required>
                        <option disabled>{{ __('header.select_task') }}}</option>
                        @foreach($project->task as $task)
                            <option value="{{ $task->id }}"> {{ $task->name }} </option>
                        @endforeach
                    </select>
                    <input type="text" name="notes" placeholder="{{ __('header.add_note') }}" required class="form-control mt-3">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success ml-auto">
                        {{ __('header.add') }}
                    </button>
                    <button type="button" class="btn btn-danger btn-link mr-auto" data-dismiss="modal">
                        {{ __('header.close') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div><!--  End Modal -->

