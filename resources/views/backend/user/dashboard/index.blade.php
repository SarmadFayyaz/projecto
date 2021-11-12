@extends('layouts.user')

@section('title',  __('header.welcome') . ' ' . auth()->user()->first_name . ' ' . auth()->user()->last_name)

@php
    $user_projects = getUserProjects();
@endphp
@section('style')
    <style>
        /*tr:first-child > td > .fc-day-grid-event {*/
        /*    margin-top: 1px;*/
        /*    width: 7px;*/
        /*    height: 9px;*/
        /*    border-radius: 9px;*/
        /*    margin-left: 12px;*/
        /*}*/
        .rounded-top {
            border-top-left-radius: 0.5rem !important;
            border-top-right-radius: 0.5rem !important;
        }

        .accordion-button:not(.collapsed) {
            color: #000000;
            background-color: #eeeeee;
            box-shadow: inset 0 -1px 0 rgb(0 0 0 / 8%);
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
            font-size: 12px;
            height: 3vh;
            min-width: 2vw;
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
            border-radius: 0.2rem;
            background-color: {{ '#' . getThemeColor($theme) }};
        }
    </style>
@endsection

@include('backend.user.dashboard.calendar.create')@include('backend.user.dashboard.calendar.edit')

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 ">
                    <div class="card scroll-bar mb-0" style="height:84vh;">
                        <div class="card-body m-0 pb-0 activeproject">
                            <div class="row">
                                <div class="col-6 pl-2 pr-2 mb-2 mb-md-3">
                                    <h4 class="m-0 p-0 font-weight-bold ml-1 mb-1">{{ __('header.active_projects') }}</h4>
                                </div>
                                <div class="col-6 text-right pl-2 pr-2 mb-2 mb-md-3">
                                    <button class="btn btn-{{ $theme }} btn-sm py-0" id="collapsall">{{ __('header.collapse_all') }}</button>
                                </div>
                                @foreach($user_projects as $project)
                                    <div class="col-md-6 pl-2 pr-2 mb-2">
                                        <div class="accordion rounded">
                                            <div class="accordion-item rounded card m-0 mb-4">
                                                <h2 class="accordion-header">
                                                    {{--                                                    <button class="accordion-button rounded-top" type="button" data-bs-toggle="collapse" data-bs-target="#project_{{ $project->id }}" aria-expanded="true">--}}
                                                    <a href="{{ route('project', $project->id) }}" class="accordion-button rounded-top" type="button" aria-expanded="true">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-6 pl-2 pr-2"><h5 class="mb-0 font-weight-bold text-truncate">{{ $project->name }}</h5></div>
                                                                <div class="col-6 text-right pl-2 pr-2 pt-1">
                                                                    <span><i class="fas fa-clock mr-1"></i>
                                                                        @php
                                                                            $startTime = Carbon\Carbon::parse($project->start_date);
                                                                            $endTime = Carbon\Carbon::parse($project->end_date);
                                                                            echo $endTime->diffForHumans($startTime,true).' ' . __('header.left');
                                                                        @endphp
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </h2>

                                                <div id="project_{{ $project->id }}" class="collapse accordion-collapse collapse show colla_ps">
                                                    <div class="accordion-body">
                                                        <div class="col-12">
                                                            <div class="row mb-2 mt-2 justify-content-between align-items-center pb-1">
                                                                <div class="col-12 pl-2 pr-2">
                                                                    @if(Auth::user()->id != $project->projectLeader->id)
                                                                        @if($project->projectLeader->deleted_at == null)
                                                                            <button class="btn btn-{{ $theme }} btn-fab" id="new-blue-bg" rel="tooltip"
                                                                                    title="{{ $project->projectLeader->first_name . ' ' . $project->projectLeader->last_name }}">
                                                                                {{ucfirst(isset($project->projectLeader->first_name[0]) ? $project->projectLeader->first_name[0] : '') . ucfirst(isset($project->projectLeader->last_name[0]) ? $project->projectLeader->last_name[0] : '')}}
                                                                                <div class="ripple-container"></div>
                                                                            </button>
                                                                        @else
                                                                            <button class="btn btn-{{ $theme }} btn-fab" id="new-blue-bg" rel="tooltip" title="{{ __('header.user_deleted') }}">
                                                                                <i class="fas fa-user-slash"></i>
                                                                                <div class="ripple-container"></div>
                                                                            </button>
                                                                        @endif
                                                                    @endif
                                                                    @foreach($project->projectUser as $user)
                                                                        @if(Auth::user()->id != $user->user->id)
                                                                            @if($user->user->deleted_at == null)
                                                                                <button class="btn btn-{{ $theme }} btn-fab" id="new-blue-bg" rel="tooltip" title="{{ $user->user->first_name . ' ' . $user->user->last_name }}">
                                                                                    {{ucfirst(isset($user->user->first_name[0]) ? $user->user->first_name[0] : '') . ucfirst(isset($user->user->last_name[0]) ? $user->user->last_name[0] : '')}}
                                                                                    <div class="ripple-container"></div>
                                                                                </button>
                                                                            @else
                                                                                <button class="btn btn-{{ $theme }} btn-fab" id="new-blue-bg" rel="tooltip" title="{{ __('header.user_deleted') }}">
                                                                                    <i class="fas fa-user-slash"></i>
                                                                                    <div class="ripple-container"></div>
                                                                                </button>
                                                                            @endif
                                                                        @endif
                                                                    @endforeach
                                                                    <a href="javascript:void(0)" data-url="{{ route('project.show', $project->id) }}" class="project_details">
                                                                        <i class="fas fa-info-circle ml-2 text-warning pull-right cursor-pointer" rel="tooltip" title="{{ __('header.view_project_details') }}" style="font-size: 1.624vw;"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="row ">
                                                                <div class="col-md-6 mb-2 pr-2 pl-2">
                                                                    <div class="accordion">
                                                                        <div class="accordion-item rounded card m-0">
                                                                            <h6 class="accordion-header">
                                                                                <button class="accordion-button no-arrow bg-{{ $theme }} text-white text-center d-block text-center d-block rounded-top" type="button" data-bs-toggle="collapse"
                                                                                         aria-expanded="true">
                                                                                    {{ __('header.urgent_task') }}
                                                                                </button>
                                                                            </h6>
                                                                            <div id="project_urgent_{{ $project->id }}" class="accordion-collapse collapse show table-responsive scroll-bar" style="max-height: 10vh; min-height: 10vh">
                                                                                <div class="accordion-body">
                                                                                    <ul class="list-group pl-2 pr-2 pt-2">
                                                                                        @php $counter = 1; @endphp
                                                                                        @if($project->task!=null && $project->task->count()>0)
                                                                                            @foreach($project->task as $task)
                                                                                                @if($task->added_by == Auth::user()->id)
                                                                                                    <a href="{{ route('project', $project->id) }}">
                                                                                                        <li class="list-group-item mb-1">
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
                                                                <div class="col-md-6 mb-2 pr-2 pl-2">
                                                                    <div class="accordion">
                                                                        <div class="accordion-item rounded card m-0">
                                                                            <h6 class="accordion-header">
                                                                                <button class="accordion-button no-arrow bg-{{ $theme }} text-white text-center d-block text-center d-block rounded-top" type="button" data-bs-toggle="collapse"
                                                                                        aria-expanded="true">
                                                                                    {{ __('header.cross_task') }}
                                                                                </button>
                                                                            </h6>
                                                                            <div id="project_cross_{{ $project->id }}" class="accordion-collapse collapse table-responsive scroll-bar show" style="max-height: 10vh;">
                                                                                <div class="accordion-body">
                                                                                    <ul class="list-group pl-2 pr-2 pt-2">
                                                                                        @php $counter = 1; @endphp
                                                                                        @if($project->task!=null && $project->task->count()>0)
                                                                                            @foreach($project->task as $task)
                                                                                                @if($task->added_by != Auth::user()->id)
                                                                                                    <a href="{{ route('project', $project->id) }}">
                                                                                                        <li class="list-group-item mb-1">
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
                                                                <div class="col-md-6 mb-2 pr-2 pl-2">
                                                                    <div class="accordion">
                                                                        <div class="accordion-item rounded card m-0">
                                                                            <h6 class="accordion-header">
                                                                                <button class="accordion-button no-arrow bg-{{ $theme }} text-white text-center d-block text-center d-block rounded-top" type="button" data-bs-toggle="collapse"
                                                                                        aria-expanded="true">
                                                                                    {{ __('header.pending_task') }}
                                                                                </button>
                                                                            </h6>
                                                                            <div id="project_pending_{{ $project->id }}" class="accordion-collapse collapse table-responsive scroll-bar show" style="max-height: 10vh;">
                                                                                <div class="accordion-body">
                                                                                    <ul class="list-group pl-2 pr-2 pt-2">
                                                                                        @php $counter = 1; @endphp
                                                                                        @if($project->task!=null && $project->task->count()>0)
                                                                                            @foreach($project->task as $task)
                                                                                                @if($task->progress < 100)
                                                                                                    <a href="{{ route('project', $project->id) }}">
                                                                                                        <li class="list-group-item mb-1">
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
                                                                <div class="col-md-6 mb-2 pr-2 pl-2">
                                                                    <div class="accordion">
                                                                        <div class="accordion-item rounded card m-0">
                                                                            <h6 class="accordion-header">
                                                                                <button class="accordion-button no-arrow bg-{{ $theme }} text-white text-center d-block text-center d-block rounded-top" type="button" data-bs-toggle="collapse"
                                                                                        aria-expanded="true" style="max-height: 10vh;">
                                                                                    {{ __('header.fulfillment_task') }}
                                                                                </button>
                                                                            </h6>
                                                                            <div id="project_fulfillment_{{ $project->id }}" class="accordion-collapse collapse show" style="max-height: 10vh;">
                                                                                <div class="accordion-body ">
                                                                                    <div class="row justify-content-center">
                                                                                        <div class="col-md-12 text-center">
                                                                                            @php
                                                                                                $completed_tasks = $project->task->where('progress',100)->count();
                                                                                                $completed_tasks = (isset($completed_tasks) && $completed_tasks > 0) ? $completed_tasks : 0;
                                                                                                $total_tasks = $project->task->count();
                                                                                                $total_tasks = ((isset($total_tasks) && $total_tasks > 0) ? $total_tasks : 0);
                                                                                                $percentage = ( $completed_tasks / (($total_tasks > 0) ? $total_tasks : 1) ) * 100;
                                                                                            @endphp
                                                                                            <div class="gauge gauge-small gauge-yellow mt-2" rel="tooltip" title="{{ $completed_tasks . '/' . $total_tasks }} tasks completed">
                                                                                                <div class="gauge-arrow" data-percentage="{{ $percentage }}" style="transform: rotate(0deg);"></div>
                                                                                            </div>

                                                                                            {{--                                                                                        <div class="gauge{{$project->id}} collapse in show  demo1" rel="tooltip"--}}
                                                                                            {{--                                                                                             title="{{$project->task->where('progress',100)->count()}} tasks completed"></div>--}}
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

                    <div class="card mb-0 mt-2 scroll-bar" style="overflow: auto;max-height: 38vh; min-height: 38vh;">
                        <div class="card-header mb-0 pb-0">

                            <h4 class="card-title mb-0 pb-0 font-weight-bold">{{ __('header.notes_finder') }}</h4>
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
                                                <div class="card m-0 mb-3 mb-2">
                                                    <div class="row m-0 text-secondary notes_finder project_note_{{$project->id}} task_note_{{$task->id}}">
                                                        <div class="col-12 font-weight-bold pl-2 pr-2">
                                                            {{ $project->name .' / '. $task->name }}
                                                        </div>
                                                        <div class="col-12 pl-2 pr-2">
                                                            <span style="font-size: 13px;">{{ $note->notes }}</span>
                                                        </div>
                                                        <div class="col-12 text-right pl-2 pr-2">
                                                            @if($note->user->deleted_at == null)
                                                                {{ $note->user->first_name . ' ' .  $note->user->last_name }}
                                                            @else
                                                                {{ __('header.user_deleted') }}
                                                            @endif
                                                        </div>
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
                    <div class="modal-header card-header card-header-{{ $theme }} rounded" style="    width: 90%; left: 5%;">
                        <h4 class="modal-title font-weight-bold">{{ __('header.event_details') }}</h4>
                        <a type="button" class="text-white" style="top:0" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></a>
                    </div>
                </div>

                <div class="modal-body card-body scroll-bar"></div>
            </div>
        </div>
    </div>
    {{--<!--  End Modal -->--}}

    {{--<!-- Show Project Details Modal -->--}}
    <div class="modal fade" id="showProjectDetailModal" tab index="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content"></div>
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
                    $(this).text('{{ __('header.expand_all') }}');
                    $('.colla_ps').removeClass("show");
                } else {
                    $(this).text('{{ __('header.collapse_all') }}');
                    $('.colla_ps').addClass("show");
                }
            });

            $('.gauge .gauge-arrow').cmGauge();


            {{--let gauge;--}}
            {{--@foreach($user_projects as $project)--}}
            {{--    gauge = new Gauge($('.gauge{{ $project->id  }}'), {--}}
            {{--    value: '{{$project->task->where('progress',100)->count()*10}}'--}}
            {{--});--}}
            {{--@endforeach--}}
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
                    // if (view.name != 'month') {
                    //     $(element).find('.fc-scroller').perfectScrollbar();
                    // }
                },
                header: {
                    left: 'title',
                    center: 'month,agendaWeek,agendaDay',
                    right: 'prev,next,today'
                },
                defaultDate: today,
                defaultView: "month",
                navLinks: true, // can click day/week names to navigate views
                selectable: true,
                selectHelper: true,
                editable: true,
                eventLimit: true, // allow "more" link when too many events
                locale: '{{ (isset(auth()->user()->language) && auth()->user()->language != null ) ? auth()->user()->language : 'en' }}',
                // views: {
                //     month: { // name of view
                //         titleFormat: 'MMMM YYYY'
                //         // other view-specific options here
                //     },
                //     week: {
                //         titleFormat: " MMMM D YYYY"
                //     },
                //     day: {
                //         titleFormat: 'D MMM, YYYY'
                //     }
                // },

                events: 'calendarEvents',
                select: function (start, end) {
                    $('#createEventForm').find('.start').val($.fullCalendar.formatDate(start, "YYYY-MM-DD HH:mm:ss")).closest('.form-group').addClass('is-filled');
                    $('#createEventForm').find('.end').val($.fullCalendar.formatDate(end, "YYYY-MM-DD HH:mm:ss")).closest('.form-group').addClass('is-filled');
                    $('#createEventModal').modal('show');
                },
                eventClick: function (event) {
                    let id = event.id;
                    $('#showEventModal').modal('show');
                    $('#showEventModal').find('.modal-body').load(APP_URL + '/event/' + id);
                },
                eventDrop: function (event) {
                    updateEvent(event);
                },
                eventResize: function (event) {
                    updateEvent(event);
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
                        daysOfWeek: ['4'],
                        className: 'text-center',
                        backgroundColor: '{{getProjectBackground($project->color)}}',
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
                            end: result.event.end,
                            className: 'text-center',
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
                        $('#editEventForm').find('.start').val(result.event.start).closest('.form-group').addClass('is-filled');
                        $('#editEventForm').find('.end').val(result.event.end).closest('.form-group').addClass('is-filled');
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
                let form_data = new FormData(this);
                $.ajax({
                    url: APP_URL + '/event/' + id,
                    type: "POST",
                    data: form_data,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    success: function (result) {
                        $calendar.fullCalendar('removeEvents', result.event.id);
                        let eventData = {
                            id: result.event.id,
                            title: result.event.title,
                            start: result.event.start,
                            end: result.event.end
                        };
                        $calendar.fullCalendar('renderEvent', eventData, true); // stick? = true
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

            function updateEvent(event) {
                toastr.info('Please wait!');
                let start = $.fullCalendar.formatDate(event.start, "YYYY-MM-DD HH:mm:ss");
                let end = $.fullCalendar.formatDate(event.end, "YYYY-MM-DD HH:mm:ss");
                let id = event.id;
                let form_data = new FormData();
                form_data.append('id', id);
                form_data.append('start', start);
                form_data.append('end', end);
                form_data.append('_token', '{{ csrf_token() }}');
                $.ajax({
                    url: APP_URL + '/event-update',
                    type: "POST",
                    data: form_data,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    success: function (result) {
                        toastr.success(result.success);
                    },
                    error: function (result) {
                        if (result.status == 422) { // when status code is 422, it's a validation issue
                            $.each(result.responseJSON.errors, function (i, error) {
                                toastr.error(error);
                            });
                        } else
                            toastr.error(result.error);
                    }
                });
            }

            $(document).on('click', 'a[data-event=delete]', function (e) {
                e.preventDefault();
                let $this = $(this);
                swal({
                    title: 'Are you sure?',
                    type: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'Cancel',
                    confirmButtonClass: 'btn btn-success ml-1',
                    cancelButtonClass: 'btn btn-danger mr-1',
                    buttonsStyling: false,
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        $.post({
                            data: {
                                "_token": " {{ csrf_token()  }} ",
                            },
                            type: 'delete',
                            url: $this.attr('href')
                        }).done(function (data) {
                            $calendar.fullCalendar('removeEvents', data.id);
                            toastr.success(data.success);
                            $this.closest('.modal').modal('hide');
                        });
                    }
                });
            });


        });
    </script>
    <script>
        $(document).ready(function () {
            $('.date_time_picker').datetimepicker({
                format: 'YYYY-MM-DD HH:mm:ss',
                icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-chevron-up",
                    down: "fa fa-chevron-down",
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right',
                    today: 'fa fa-screenshot',
                    clear: 'fa fa-trash',
                    close: 'fa fa-remove'
                }
            });
            $(document).on('click', '.project_details', function () {
                $('#showProjectDetailModal').find('.modal-content').load($(this).data('url'), function () {
                    $('#showProjectDetailModal').modal('show');
                    // new PerfectScrollbar('.scroll-bar-appended');
                });
            });
        });
    </script>
@endsection
