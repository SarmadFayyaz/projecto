<div class="row mb-2">
    <div class="col-4">
        <label> {{ __('header.project_name') }}: </label>
    </div>
    <div class="col-8">
        <label class="font-weight-bold text-dark"> {{ $event->project->name }} </label>
    </div>
</div>
<div class="row mb-2">
    <div class="col-4">
        <label> {{ __('header.event') }}: </label>
    </div>
    <div class="col-8">
        <label class="font-weight-bold text-dark"> {{ $event->title }} </label>
    </div>
</div>
<div class="row mb-2">
    <div class="col-4">
        <label> {{ __('header.user') }}: </label>
    </div>
    <div class="col-8">
        <ul class="list-group">
            @foreach($event->eventUser as $eventUser)
                <li class="list-group-item" >
                    <label class="font-weight-bold text-dark"> {{ $eventUser->user->first_name . ' ' . $eventUser->user->last_name }} </label>
                </li>
            @endforeach
        </ul>
    </div>
</div>
<div class="row mb-2">
    <div class="col-4">
        <label> {{ __('header.start') }}: </label>
    </div>
    <div class="col-8">
        <label class="font-weight-bold text-dark"> {{ $event->start }} </label>
    </div>
</div>
<div class="row mb-3">
    <div class="col-4">
        <label> {{ __('header.end') }}: </label>
    </div>
    <div class="col-8">
        <label class="font-weight-bold text-dark"> {{ $event->end }} </label>
    </div>
</div>

<div class="row text-center">
    <div class="col">
        <a href="{{ route('event.edit', $event->id) }}" data-toggle="modal" data-target="#editEventModal" class="btn btn-primary event_edit">{{ __('header.edit') }}</a>
        <a href="{{ route('event.destroy', $event->id) }}" class="btn btn-danger">{{ __('header.delete') }}</a>
    </div>
</div>
