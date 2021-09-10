@extends('layouts.user')

@section('title', 'Dashboard')

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

@section('content')
    @php
        $user_projects = getUserProjects();
    @endphp

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 ">
                    <div class="card scroll-bar mb-0" style="height:87vh;">
                        <div class="card-body m-0 pb-0 activeproject">
                            <div class="row">
                                <div class="col-6">
                                    <h4 class="m-0 p-0 font-weight-bold ml-1 mb-1">Active Project</h4>
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
                                                                    <button class="btn btn-primary btn-fab" id="new-blue-bg" rel="tooltip" title="{{ $project->projectLeader->first_name . ' ' . $project->projectLeader->last_name }}">
                                                                        {{ucfirst(isset($project->projectLeader->first_name[0]) ? $project->projectLeader->first_name[0] : '') . ucfirst(isset($project->projectLeader->last_name[0]) ? $project->projectLeader->last_name[0] : '')}}
                                                                        <div class="ripple-container"></div>
                                                                    </button>
                                                                @endif
                                                                @foreach($project->projectUser as $user)
                                                                    @if(Auth::user()->id != $user->user->id)
                                                                        <button class="btn btn-primary btn-fab" id="new-blue-bg" rel="tooltip" title="{{ $user->user->first_name . ' ' . $user->user->last_name }}">
                                                                            {{ucfirst(isset($user->user->first_name[0]) ? $user->user->first_name[0] : '') . ucfirst(isset($user->user->last_name[0]) ? $user->user->last_name[0] : '')}}
                                                                            <div class="ripple-container"></div>
                                                                        </button>
                                                                    @endif
                                                                @endforeach
                                                                <a href="{{ route('project', $project->id) }}"> <i class="fas fa-info-circle ml-2 text-warning pull-right cursor-pointer" title="View Task Details"></i> </a>
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
                            <div id="fullCalendar"></div>
                        </div>
                    </div>

                    <div class="card mb-0 mt-2 scroll-bar" style="overflow: auto;max-height: 45vh;">
                        <div class="card-header mb-0 pb-0">

                            <h4 class="card-title mb-0 pb-0">Notes Finder</h4>
                        </div>
                        <div class="card-body pt-0 mt-0">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <select class="selectpicker" data-style="select-with-transition" title="Select Project" data-size="7">
                                        <option disabled> Select Project</option>
                                        @foreach($user_projects as $project)
                                            <option value="{{ $project->id }}">{{ $project->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <select class="selectpicker" data-style="select-with-transition" title=" Select Task" data-size="7">
                                        <option disabled> Select Task</option>
                                        @foreach($user_projects as $project)
                                            @foreach($project->task as $task)
                                                <option value="{{ $task->id }}">{{ $task->name }}</option>
                                            @endforeach
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 mt-2">
                                    <textarea placeholder="Enter Here" class="form-control" style="max-width: 100% !important;border: 1px solid #c1c1c1;  padding: 8px;    min-height: 165px !important;"></textarea>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection

@section('script')
    <script>
        $(document).ready(function () {
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
@endsection
