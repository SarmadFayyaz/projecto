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
        <label> {{ __('header.title') }}: </label>
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
                <li class="list-group-item">
                    <label class="font-weight-bold text-dark"> {{ $eventUser->user->first_name . ' ' . $eventUser->user->last_name }} </label>
                </li>
            @endforeach
        </ul>
    </div>
</div>
<div class="row mb-2">
    <div class="col-4">
        <label> {{ __('header.date') }}: </label>
    </div>
    <div class="col-8">
        <label class="font-weight-bold text-dark"> {{ $event->start_date . ' - ' . $event->end_date }} </label>
    </div>
</div>
<div class="row mb-3">
    <div class="col-4">
        <label> {{ __('header.time') }}: </label>
    </div>
    <div class="col-8">
        <label class="font-weight-bold text-dark"> {{ $event->start_time . ' - ' . $event->end_time }} </label>
    </div>
</div>
<div class="row mb-3">
    <div class="col-4">
        <label> {{ __('header.event_type') }}: </label>
    </div>
    <div class="col-8">
        <label class="font-weight-bold text-dark"> {{ ($event->type == 1) ? __('header.occurring_once') : __('header.recurring_event') }} </label>
    </div>
</div>
@if($event->type == 2)
    <div class="row mb-3">
        <div class="col-4">
            <label> {{ __('header.recurring_days') }}: </label>
        </div>
        <div class="col-8">
            <label class="font-weight-bold text-dark">
                @foreach(json_decode($event->days_of_week) as $day)
                    {{ getDay($day) }}
                @endforeach
            </label>
        </div>
    </div>
@endif
<div class="row text-center">
    <div class="col">
        <a href="{{ route('event.edit', $event->id) }}" data-modal-id="#editEventModal" class="btn btn-primary event_edit">{{ __('header.edit') }}</a>
        <a href="{{ route('event.destroy', $event->id) }}" data-event="delete" class="btn btn-danger">{{ __('header.delete') }}</a>
    </div>
</div>
