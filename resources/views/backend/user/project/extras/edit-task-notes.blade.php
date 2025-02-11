<div class="card card-signup card-plain">
    <div class="modal-header card-header card-header-{{ $theme }} rounded" style="    width: 90%; left: 5%;">
        <h4 class="modal-title font-weight-bold">{{ __('header.edit_note') }}</h4>
        <a type="button" class="text-white" style="top:0" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></a>
    </div>
</div>

<form method="POST" id="editTaskNotesForm" data-action="{{ route('task-note.update', $task_note->id) }}" data-name="editTaskNotes">
    @csrf
    @method('PUT')
    <input type="hidden" name="project_id" value="{{ $task_note->task->project_id }}">
    <input type="hidden" name="task_id"  value="{{ $task_note->task_id }}">
    <div class="modal-body card-body scroll-bar">
{{--        <select class="selectpicker" data-size="7" data-style="select-with-transition" title="{{ __('header.select_task') }}" data-container="body" name="task_id" required>--}}
{{--            <option disabled>{{ __('header.select_task') }}}</option>--}}
{{--            @foreach($tasks as $task)--}}
{{--                <option value="{{ $task->id }}" {{ ($task_note->task_id == $task->id) ? 'selected' : '' }}> {{ $task->name }} </option>--}}
{{--            @endforeach--}}
{{--        </select>--}}
        <textarea class="form-control mt-3" name="notes" cols="30" rows="3" aria-placeholder="{{ __('header.add_notes') }}" required>{{ $task_note->notes }}</textarea>
{{--        <input type="text" name="notes" placeholder="{{ __('header.edit_note') }}" required class="form-control mt-3" value="{{ $task_note->notes }}">--}}
    </div>
    <div class="modal-footer">
        <a href="{{ route('task.show',$task_note->task->id) }}" class="btn btn-info ml-auto task_details">{{ __('header.view_task') }}</a>
        <button type="submit" class="btn btn-success">
            {{ __('header.update') }}
        </button>
        <a href="{{ route('task-note.destroy', $task_note->id) }}" data-task-note="delete" class="btn btn-danger mr-auto">{{ __('header.delete') }}</a>
    </div>
</form>
