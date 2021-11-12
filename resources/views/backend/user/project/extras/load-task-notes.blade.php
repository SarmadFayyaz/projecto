
@foreach($tasks as $task)
    @foreach($task->taskNote as $note)
        <div class="card p-0 m-0 mb-2 task_note task_note_{{$task->id}}">
            <div class="card-body p-0 m-0 pl-3 pr-1">
                <a class="task_note_edit text-dark" id="task_note_{{$note->id}}" href="{{ route('task-note.edit', $note->id)}}">
                    <span class="mb-0 pb-0">{{ $note->notes }}</span>
                    <br>
                    <span class="mb-0 pb-0 pull-right"><small> {{ $note->created_at }} </small></span>
                </a>
            </div>
        </div>
    @endforeach
@endforeach
