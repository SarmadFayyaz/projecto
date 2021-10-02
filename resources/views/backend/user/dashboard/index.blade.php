@extends('layouts.user')

@section('title',  __('header.welcome') . ' ' . auth()->user()->first_name . ' ' . auth()->user()->last_name)

@php
    $user_projects = getUserProjects();
@endphp
@section('style')
    <style>
        tr:first-child > td > .fc-day-grid-event {
            margin-top: 1px;
            width: 7px;
            height: 9px;
            border-radius: 9px;
            margin-left: 12px;
        }

        .accordion-button::after {
            display: none;
        }

        .fc-day-grid-container::-webkit-scrollbar {
            width: 10px;
        }

        .fc-day-grid-container::-webkit-scrollbar-track {
            background-color: #d4d0d0;
        }

        .fc-day-grid-container::-webkit-scrollbar-thumb {
            background-color: #36baaf;
            box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        }

        .activeproject .btn.btn-fab, .btn.btn-just-icon {
            margin: 0px;
            font-size: 16px;
            height: 24px;
            min-width: 20px;
            width: fit-content;
            padding: 0 6px;
            overflow: hidden;
            position: relative;
            line-height: 24px;
        }

        .accordion-body .list-group .list-group-item {
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }

        button.fc-button {
            padding: 0.20500rem 0.5rem !important;
            font-size: 0.3rem;
            line-height: 1.0;
            border-radius: 0.4rem;
        }
    </style>
@endsection

@include('backend.user.dashboard.calendar.create')@include('backend.user.dashboard.calendar.edit')

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 ">
                    <div class="card scroll-bar mb-0" style="height:87vh;">
                        <div class="card-body m-0 pb-0 activeproject">
                            <div class="row">
                                <div class="col-6">
                                    <h4 class="m-0 p-0 font-weight-bold ml-1 mb-1">{{ __('header.active_projects') }}</h4>
                                </div>
                                <div class="col-6 text-right">
                                    <button class="btn btn-primary btn-sm btn-round py-0" id="collapsall">Collapse All</button>
                                </div>
                                @foreach($user_projects as $project)
                                    <div class="col-md-6 pl-1 pr-1 mb-2">
                                        <div class="accordion" id="accordionPanelsStayOpenExample">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-6"><h6 class="mb-0">{{ $project->name }}</h6></div>
                                                                <div class="col-6 text-right">
                                                                    <span><i class="fas fa-clock mr-1"></i>
                                                                        @php
                                                                            $startTime = Carbon\Carbon::parse($project->start_date);
                                                                            $endTime = Carbon\Carbon::parse($project->end_date);
                                                                            echo $endTime->diffForHumans($startTime,true).' left';
                                                                        @endphp
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </button>
                                                </h2>

                                                <div id="panelsStayOpen-collapseOne" class="colla_ps accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                                                    <div class="accordion-body">
                                                        <div class="d-flex mb-3 justify-content-between align-items-center">
                                                            <div class="col-12">
                                                                @if(Auth::user()->id != $project->projectLeader->id)
                                                                    @if($project->projectLeader->deleted_at == null)
                                                                        <button class="btn btn-primary btn-fab" id="new-blue-bg" rel="tooltip" title="{{ $project->projectLeader->first_name . ' ' . $project->projectLeader->last_name }}">
                                                                            {{ucfirst(isset($project->projectLeader->first_name[0]) ? $project->projectLeader->first_name[0] : '') . ucfirst(isset($project->projectLeader->last_name[0]) ? $project->projectLeader->last_name[0] : '')}}
                                                                            <div class="ripple-container"></div>
                                                                        </button>
                                                                    @else
                                                                        <button class="btn btn-primary btn-fab" id="new-blue-bg" rel="tooltip" title="{{ __('header.user_deleted') }}">
                                                                            <i class="fas fa-user-slash"></i>
                                                                            <div class="ripple-container"></div>
                                                                        </button>
                                                                    @endif
                                                                @endif
                                                                @foreach($project->projectUser as $user)
                                                                    @if(Auth::user()->id != $user->user->id)
                                                                        @if($user->user->deleted_at == null)
                                                                            <button class="btn btn-primary btn-fab" id="new-blue-bg" rel="tooltip" title="{{ $user->user->first_name . ' ' . $user->user->last_name }}">
                                                                                {{ucfirst(isset($user->user->first_name[0]) ? $user->user->first_name[0] : '') . ucfirst(isset($user->user->last_name[0]) ? $user->user->last_name[0] : '')}}
                                                                                <div class="ripple-container"></div>
                                                                            </button>
                                                                        @else
                                                                            <button class="btn btn-primary btn-fab" id="new-blue-bg" rel="tooltip" title="{{ __('header.user_deleted') }}">
                                                                                <i class="fas fa-user-slash"></i>
                                                                                <div class="ripple-container"></div>
                                                                            </button>
                                                                        @endif
                                                                    @endif
                                                                @endforeach
                                                                <a href="{{ route('project', $project->id) }}"><i class="fas fa-info-circle ml-2 text-warning pull-right cursor-pointer" title="View Task Details"></i></a>
                                                                {{-- @if(Auth::user()->id != $project->projectLeader->id)
                                                                    <span class="bg-light rounded mr-2 position-relative" rel="tooltip"
                                                                          title="{{ $project->projectLeader->first_name . ' ' . $project->projectLeader->last_name }}">
                                                                        @if($project->projectLeader->image == null)
                                                                            <span
                                                                                class="p-1 rounded-circle bg-info"> {{ucfirst(isset($project->projectLeader->first_name[0]) ? $project->projectLeader->first_name[0] : '') . ucfirst(isset($project->projectLeader->last_name[0]) ? $project->projectLeader->last_name[0] : '')}} </span>
                                                                        @else
                                                                            <img width="25" height="25" class="rounded-circle"
                                                                                 src="{{ Storage::disk('public')->exists($project->projectLeader->image) ? Storage::disk('public')->url($project->projectLeader->image) : asset('assets/img/faces/avatar.jpg') }}"/>
                                                                        @endif
                                                                        <span class="logged-in">●</span>
                                                                    </span>
                                                                @endif
                                                                @foreach($project->projectUser as $user)
                                                                    @if(Auth::user()->id != $user->user->id)
                                                                        <span class="bg-light rounded mr-2 position-relative" rel="tooltip" title="{{ $user->user->first_name . ' ' . $user->user->last_name }}">
                                                                            @if($user->user->image == null)
                                                                                <span
                                                                                    class="p-1 rounded-circle bg-info"> {{ucfirst(isset($user->user->first_name[0]) ? $user->user->first_name[0] : '') . ucfirst(isset($user->user->last_name[0]) ? $user->user->last_name[0] : '')}} </span>
                                                                            @else
                                                                                <img width="25" height="25" class="rounded-circle"
                                                                                     src="{{ Storage::disk('public')->exists($user->user->image) ? Storage::disk('public')->url($user->user->image) : asset('assets/img/faces/avatar.jpg') }}"/>
                                                                            @endif
                                                                            <span class="logged-in">●</span>
                                                                        </span>
                                                                    @endif
                                                                @endforeach --}}
                                                            </div>
                                                        </div>

                                                        <div class="row ">
                                                            <div class="col-md-6 mb-2 pr-3 pl-3">
                                                                <div class="accordion" id="accordionPanelsStayOpenExample">
                                                                    <div class="accordion-item">
                                                                        <h6 class="accordion-header" id="panelsStayOpen-heading1">
                                                                            <button class="accordion-button no-arrow bg-primary text-white" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse1"
                                                                                    aria-expanded="true" aria-controls="panelsStayOpen-collapse1">
                                                                                Urgent Tasks
                                                                            </button>
                                                                        </h6>
                                                                        <div id="panelsStayOpen-collapse1" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-heading1">
                                                                            <div class="accordion-body">
                                                                                <ul class="list-group">
                                                                                    @php $counter = 1; @endphp
                                                                                    @if($project->task!=null && $project->task->count()>0)
                                                                                        @foreach($project->task as $task)
                                                                                            @if($task->added_by == Auth::user()->id)
                                                                                                <a href="{{ route('project', $project->id) }}">
                                                                                                    <li class="list-group-item">
                                                                                                        {{ $counter . '. '. $task->name }}
                                                                                                    </li>
                                                                                                </a>
                                                                                                @php $counter++; @endphp
                                                                                            @endif
                                                                                        @endforeach
                                                                                    @endif
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 mb-2 pr-3 pl-3">
                                                                <div class="accordion" id="accordionPanelsStayOpenExample">
                                                                    <div class="accordion-item">
                                                                        <h6 class="accordion-header" id="panelsStayOpen-heading2">
                                                                            <button class="accordion-button no-arrow bg-primary text-white" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse2"
                                                                                    aria-expanded="true" aria-controls="panelsStayOpen-collapse2">
                                                                                Cross Task
                                                                            </button>
                                                                        </h6>
                                                                        <div id="panelsStayOpen-collapse2" class="accordion-collapse collapse " aria-labelledby="panelsStayOpen-heading2">
                                                                            <div class="accordion-body">
                                                                                <ul class="list-group">
                                                                                    @php $counter = 1; @endphp
                                                                                    @if($project->task!=null && $project->task->count()>0)
                                                                                        @foreach($project->task as $task)
                                                                                            @if($task->added_by != Auth::user()->id)
                                                                                                <a href="{{ route('project', $project->id) }}">
                                                                                                    <li class="list-group-item">
                                                                                                        {{ $counter . '. '. $task->name }}
                                                                                                    </li>
                                                                                                </a>
                                                                                                @php $counter++; @endphp
                                                                                            @endif
                                                                                        @endforeach
                                                                                    @endif
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 mb-2 pr-3 pl-3">
                                                                <div class="accordion" id="accordionPanelsStayOpenExample">
                                                                    <div class="accordion-item">
                                                                        <h6 class="accordion-header" id="panelsStayOpen-heading3">
                                                                            <button class="accordion-button no-arrow bg-primary text-white" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse3"
                                                                                    aria-expanded="true" aria-controls="panelsStayOpen-collapse3">
                                                                                Pending Tasks
                                                                            </button>
                                                                        </h6>
                                                                        <div id="panelsStayOpen-collapse3" class="accordion-collapse collapse " aria-labelledby="panelsStayOpen-heading3">
                                                                            <div class="accordion-body">
                                                                                <ul class="list-group">
                                                                                    @php $counter = 1; @endphp
                                                                                    @if($project->task!=null && $project->task->count()>0)
                                                                                        @foreach($project->task as $task)
                                                                                            @if($task->progress < 100)
                                                                                                <a href="{{ route('project', $project->id) }}">
                                                                                                    <li class="list-group-item">
                                                                                                        {{ $counter . '. '. $task->name }}
                                                                                                    </li>
                                                                                                </a>
                                                                                                @php $counter++; @endphp
                                                                                            @endif
                                                                                        @endforeach
                                                                                    @endif
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 mb-2 pr-3 pl-3">
                                                                <div class="accordion" id="accordionPanelsStayOpenExample">
                                                                    <div class="accordion-item">
                                                                        <h6 class="accordion-header" id="panelsStayOpen-heading4">
                                                                            <button class="accordion-button no-arrow bg-primary text-white" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse4"
                                                                                    aria-expanded="true" aria-controls="panelsStayOpen-collapse4">
                                                                                Fullfillment Tasks
                                                                            </button>
                                                                        </h6>
                                                                        <div id="panelsStayOpen-collapse4" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-heading4">
                                                                            <div class="accordion-body ">
                                                                                <div class="row justify-content-center">
                                                                                    <div class="col-md-7 mt-2">
                                                                                        <div class="gauge{{$project->id}} collapse in show  demo1" rel="tooltip"
                                                                                             title="{{$project->task->where('progress',100)->count()}} tasks completed"></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-calendar mb-0 scroll-bar" style="max-height: 45vh;">
                        <div class="card-body ">
                            <div id="fullCalendarEvents"></div>
                        </div>
                    </div>

                    <div class="card mb-0 mt-2 scroll-bar" style="overflow: auto;max-height: 45vh;">
                        <div class="card-header mb-0 pb-0">

                            <h4 class="card-title mb-0 pb-0">Notes Finder</h4>
                        </div>
                        <div class="card-body pt-0 mt-0">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <select class="selectpicker project_note_finder" data-style="select-with-transition" title="{{ __('header.select_project') }}" data-size="4" data-container="body">
                                        <option disabled> {{ __('header.select_project') }} </option>
                                        @foreach($user_projects as $project)
                                            <option value="{{ $project->id }}">{{ $project->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <select class="selectpicker task_note_finder" data-style="select-with-transition" title="{{ __('header.select_task') }}" data-size="4" data-container="body">
                                        <option disabled> {{ __('header.select_task') }} </option>
                                        @foreach($user_projects as $project)
                                            @foreach($project->task as $task)
                                                <option value="{{ $task->id }}">{{ $task->name }}</option>
                                            @endforeach
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 mt-2">

                                    @foreach($user_projects as $project)
                                        @foreach($project->task as $task)
                                            @foreach($task->taskNote as $note)
                                                <div class="row m-0 border border-dark rounded mb-2 notes_finder project_note_{{$project->id}} task_note_{{$task->id}}">
                                                    <div class="col-12 text-primary pl-2 pr-2">
                                                        {{ $project->name .' / '. $task->name }}
                                                    </div>
                                                    <div class="col-12 pl-2 pr-2">
                                                        {{ $note->notes }}
                                                    </div>
                                                    <div class="col-12 text-right pl-2 pr-2">
                                                        @if($note->user->deleted_at == null)
                                                            {{ $note->user->first_name . ' ' .  $note->user->last_name }}
                                                        @else
                                                            {{ __('header.user_deleted') }}
                                                        @endif
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endforeach
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    {{--<!-- Show Event Modal -->--}}
    <div class="modal fade" id="showEventModal" tab index="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl mr-md-2">
            <div class="modal-content">

                <div class="card card-signup card-plain">
                    <div class="modal-header card-header card-header-primary" style="    width: 90%; left: 5%;">
                        <h4 class="modal-title">{{ __('header.event_details') }}</h4>
                        <a type="button" class="text-white" style="top:0" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></a>
                    </div>
                </div>

                <div class="modal-body card-body scroll-bar"></div>
            </div>
        </div>
    </div>
    {{--<!--  End Modal -->--}}

@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $(document).on('change', 'select.project_note_finder', function () {
                $('.notes_finder').attr('hidden', true);
                $('.project_note_' + $(this).val()).removeAttr('hidden');
            });

            $(document).on('change', 'select.task_note_finder', function () {
                $('.notes_finder').attr('hidden', true);
                $('.task_note_' + $(this).val()).removeAttr('hidden');
            });

            $('#collapsall').on('click', function () {
                if ($('.colla_ps').hasClass('show')) {
                    $(this).text('EXPAND ALL');
                    $('.colla_ps').removeClass("show");
                } else {
                    $(this).text('COLLAPSE ALL');
                    $('.colla_ps').addClass("show");
                }
            });

            @foreach($user_projects as $project)
            let gauge = new Gauge($('.gauge{{ $project->id  }}'), {
                value: '{{$project->task->where('progress',100)->count()*10}}'
            });
            @endforeach
        });
    </script>

    <script>
        $(document).ready(function () {

            $calendar = $('#fullCalendarEvents');

            today = new Date();
            y = today.getFullYear();
            m = today.getMonth();
            d = today.getDate();

            $calendar.fullCalendar({
                viewRender: function (view, element) {
                    // We make sure that we activate the perfect scrollbar when the view isn't on Month
                    if (view.name != 'month') {
                        $(element).find('.fc-scroller').perfectScrollbar();
                    }
                },
                header: {
                    left: 'title',
                    center: 'month,agendaWeek,agendaDay',
                    right: 'prev,next,today'
                },
                defaultDate: today,
                selectable: true,
                selectHelper: true,
                views: {
                    month: { // name of view
                        titleFormat: 'MMMM YYYY'
                        // other view-specific options here
                    },
                    week: {
                        titleFormat: " MMMM D YYYY"
                    },
                    day: {
                        titleFormat: 'D MMM, YYYY'
                    }
                },

                select: function (start, end) {
                    $('#createEventForm').find('.start').val($.fullCalendar.formatDate(start, "YYYY-MM-DD HH:mm:ss"));
                    $('#createEventForm').find('.end').val($.fullCalendar.formatDate(end, "YYYY-MM-DD HH:mm:ss"));
                    $('#createEventModal').modal('show');
                },
                eventClick: function (event) {
                    let id = event.id;
                    $('#showEventModal').modal('show');
                    $('#showEventModal').find('.modal-body').load(APP_URL + '/event/' + id);
                },
                editable: true,
                eventLimit: true, // allow "more" link when too many events


                // color classes: [ event-blue | event-azure | event-green | event-orange | event-red ]
                displayEventTime: true,
                events: [
                        @foreach($user_projects as $project)
                        @foreach($project->event as $event)
                    {
                        id: {{ $event->id }},
                        title: '{!! $event->title !!}',
                        start: '{{ $event->start }}',
                        end: '{{ $event->end }}',
                        allDay: false,
                    },
                    @endforeach
                    @endforeach
                ]
            });

            $("#createEventForm").submit(function (e) {
                e.preventDefault();
                form_data = new FormData(this);
                $.ajax({
                    url: '{{ route('event.store') }}',
                    type: "post",
                    data: form_data,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    success: function (result) {
                        eventData = {
                            id: result.event.id,
                            title: result.event.title,
                            start: result.event.start,
                            end: result.event.end
                        };
                        $calendar.fullCalendar('renderEvent', eventData, true); // stick? = true
                        toastr.success(result.success);
                        $('#createEventModal').modal('hide');
                    },
                    error: function (result) {
                        if (result.status == 422) { // when status code is 422, it's a validation issue
                            $.each(result.responseJSON.errors, function (i, error) {
                                toastr.error(error);
                            });
                        } else
                            toastr.error(result.error);
                        // toastr.error('in error');
                    }
                });
            });

            $(document).on('click', '.event_edit', function () {
                event.preventDefault();
                $('#showEventModal').modal('hide');
                let url = $(this).attr('href');
                $.ajax({
                    url: url,
                    type: "get",
                    success: function (result) {
                        $('#editEventForm').find('.id').val(result.event.id);
                        $('#editEventForm').find('.start').val(result.event.start);
                        $('#editEventForm').find('.end').val(result.event.end);
                        $('#editEventForm').find('.project_id').val(result.event.project_id).selectpicker('refresh');
                        $('#editEventForm').find('.user_id').attr('selected', false);
                        for (let i = 0; i < result.event.event_user.length; i++) {
                            $('#editEventForm .user_id option[value=' + result.event.event_user[i].user_id + ']').attr('selected', true);
                        }
                        $('#editEventForm').find('.user_id').selectpicker('refresh');
                        $('#editEventForm').find('.title').val(result.event.title).closest('.form-group').addClass('is-filled');
                    },
                    error: function (result) {
                        toastr.error(result.error);
                    }
                });
            });

            $("#editEventForm").submit(function (e) {
                e.preventDefault();
                let id = $(this).find('.id').val();
                form_data = new FormData(this);
                $.ajax({
                    url: APP_URL + '/event/' + id,
                    type: "POST",
                    data: form_data,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    success: function (result) {
                        // eventData = {
                        //     id: result.event.id,
                        //     title: result.event.title,
                        //     start: result.event.start,
                        //     end: result.event.end
                        // };
                        // $calendar.fullCalendar('renderEvent', eventData, true); // stick? = true
                        toastr.success(result.success);
                        $('#editEventModal').modal('hide');
                    },
                    error: function (result) {
                        if (result.status == 422) { // when status code is 422, it's a validation issue
                            $.each(result.responseJSON.errors, function (i, error) {
                                toastr.error(error);
                            });
                        } else
                            toastr.error(result.error);
                        // toastr.error('in error');
                    }
                });
            });
        });
    </script>
@endsection
