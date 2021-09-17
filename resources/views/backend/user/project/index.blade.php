@extends('layouts.user')

@section('title', $project->name)

@section('style')
    <style>
        .share_screen {
            width: 100px;
        }
        .bootstrap-datetimepicker-widget.dropdown-menu {
            width: auto;
        }

        .logged-in {
            font-size: 20px;
            position: absolute;
            color: #4caf50;
            bottom: -6px;
            right: -5px;
        }

        .logged-out {
            font-size: 20px;
            position: absolute;
            color: #dc3545;
            bottom: -6px;
            right: -5px;
        }

        #myCarousel {

        img {
            height: 50%;
            width: auto;
            margin-left: auto;
            margin-right: auto;
            display: block;
        }

        }

        #thumbSlider {

        .carousel-inner {
            padding-left: 3rem;
            padding-right: 3rem;

        .row {
            overflow: hidden;
        }

        .thumb {

        &
        :hover {
            cursor: pointer;
        }

        &
        .active img {
            opacity: 1;
        }

        }

        img {
            height: 150px;
            margin-left: auto;
            margin-right: auto;
            display: block;
            opacity: .5;

        &
        :hover {
            opacity: 1;
        }

        }

        .carousel-control-prev-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20fill='%23000'%20viewBox='0%200%208%208'%3E%3Cpath%20d='M5.25%200l-4%204%204%204%201.5-1.5-2.5-2.5%202.5-2.5-1.5-1.5z'/%3E%3C/svg%3E");
        }

        .carousel-control-next-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20fill='%23000'%20viewBox='0%200%208%208'%3E%3Cpath%20d='M2.75%200l-1.5%201.5%202.5%202.5-2.5%202.5%201.5%201.5%204-4-4-4z'/%3E%3C/svg%3E");
        }

        }
        }


        .main-panel > .content {
            padding-bottom: 0px !important;
            margin-bottom: 0px !important
        }

        .fc-button-group button {
            font-size: 11px !important;
        }

        .h6css {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            width: 95px;
        }

        .accordion-button::after {
            display: none;
        }

        .nav-pills .nav-item .nav-link {
            line-height: 10px;
            text-transform: uppercase;
            font-size: 12px;
            font-weight: 500;
            min-width: 73px !important;
            text-align: center;
            color: #555;
            transition: all .3s;
            border-radius: 0px !important;
            padding: 10px 15px;
        }

        .nav-pills.nav-pills-warning .nav-item .nav-link.active, .nav-pills.nav-pills-warning .nav-item .nav-link.active:focus, .nav-pills.nav-pills-warning .nav-item .nav-link.active:hover {
            background-color: #36baaf;
            box-shadow: 0 4px 20px 0px rgb(0 0 0 / 14%), 0 7px 10px -5px rgb(255 152 0 / 40%);
            color: #fff;
        }

        @media (min-width: 1200px) {
            #completedTaskModal .modal-xl {
                max-width: 1050px !important;
                top: 190px
            }
        }

        @media (min-width: 1200px) {
            #taskDetailsModal .modal-xl {
                max-width: 1050px !important;
                /*left: 130px;*/
                top: 190px
            }
        }

        @media (min-width: 1200px) {
            #documentModal .modal-xl {
                max-width: 1000px !important;
                /* left: 130px; */
            }
        }

        /* Button used to open the chat form - fixed at the bottom of the page */
        .open-button {
            background-color: #555;
            color: white;
            padding: 16px 20px;
            border: none;
            cursor: pointer;
            opacity: 0.8;
            position: fixed;
            bottom: 23px;
            right: 28px;
            width: 280px;
        }

        /* The popup chat - hidden by default */
        .chat-popup {
            display: none;
            position: fixed;
            bottom: 50px;
            right: 15px;
            border: 3px solid #f1f1f1;
            z-index: 9;
        }

        /* Add styles to the form container */
        .form-container {
            max-width: 300px;
            padding: 10px;
            background-color: white;
        }

        /* Full-width textarea */
        .form-container textarea {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            border: none;
            background: #f1f1f1;
            resize: none;
            min-height: 200px;
        }

        /* When the textarea gets focus, do something */
        .form-container textarea:focus {
            background-color: #ddd;
            outline: none;
        }

        /* Set a style for the submit/send button */
        .form-container .btn {
            background-color: #04AA6D;
            color: white;
            padding: 16px 20px;
            border: none;
            cursor: pointer;
            width: 100%;
            margin-bottom: 10px;
            opacity: 0.8;
        }

        /* Add a red background color to the cancel button */
        .form-container .cancel {
            background-color: red;
        }

        /* Add some hover effects to buttons */
        .form-container .btn:hover, .open-button:hover {
            opacity: 1;
        }


        .MultiCarousel {
            float: left;
            overflow: hidden;
            padding: 0 20px;
            width: 100%;
            position: relative;
        }

        .MultiCarousel .MultiCarousel-inner {
            transition: 1s ease all;
            float: left;
        }

        .MultiCarousel .MultiCarousel-inner .item {
            float: left;
            text-align: center;
        }

        .MultiCarousel .MultiCarousel-inner .item > div {
            text-align: center;
            padding: 5px;
            margin: 1px;
            background: #000000;
            color: #ffffff;
            height: auto;
            min-height: 170px;
        }

        .MultiCarousel .leftLst, .MultiCarousel .rightLst {
            position: absolute;
            border-radius: 50%;
            top: calc(50% - 38px);
            padding: 33px 20px 12px;
        }

        .MultiCarousel .leftLst {
            left: 0;
        }

        .MultiCarousel .rightLst {
            right: 0;
        }

        .MultiCarousel .leftLst.over, .MultiCarousel .rightLst.over {
            pointer-events: none;
            background: #cccccc;
        }

        .meeting_mode .item {
            text-align: center;
            padding: 5px;
            margin: 1px;
            background: #000000;
            color: #ffffff;
            height: auto;
            min-height: 250px;
        }
    </style>
@endsection

@include('backend.user.project.task.add')@include('backend.user.project.task.completed')@include('backend.user.project.extras.video-control')@include('backend.user.project.extras.add-task-notes')@include('backend.user.project.document.index')

@section('right-panel')
    <div class="card mt-3 mb-0 table-responsive">
        <div class="card-body mt-0 pb-1 pt-0 pl-2 pr-2">
            <div class="accordion" id="accordionPanelsStayOpenExample1">
                <div class="accordion-item border-0">
                    <h2 class="accordion-header text-center  mt-0" id="panelsStayOpen-headingFive">
                        <button href="javascript:void(0)" data-bs-toggle="collapse" class="btn btn-primary btn-block mt-2" data-bs-target="#panelsStayOpen-collapsemethod" aria-expanded="true" aria-controls="panelsStayOpen-collapsemethod">
                            Método Ö
                        </button>
                    </h2>

                    <div id="panelsStayOpen-collapsemethod" class="accordion-collapse  collapse" aria-labelledby="panelsStayOpen-headingmethod">
                        <div class="accordion-body border">
                            <div class="p-2 text-left ">
                                <div class="row justify-content-center">
                                    <div class="col-md-9">
                                        <p class="mb-1">
                                            <a href="javascript:vod(0);" class="text-dark" data-toggle="modal" data-target="#myModal"> Initial Meeting</a>
                                        </p>
                                        <p class="mb-1">
                                            <a href="javascript:vod(0);" class="text-dark" data-toggle="modal" data-target="#myModal"> Work Rules</a>
                                        </p>
                                        <p class="mb-1">
                                            <a href="javascript:vod(0);" class="text-dark" data-toggle="modal" data-target="#myModal"> Description of Meetings</a>
                                        </p>
                                        <p class="mb-1">
                                            <a href="javascript:vod(0);" class="text-dark" data-toggle="modal" data-target="#myModal">Facilitator</a>
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion" id="accordionPanelsStayOpenExample">
                <div class="accordion-item border-0">
                    <h2 class="accordion-header text-center " id="panelsStayOpen-headingFive">
                        <button href="javascript:void(0)" data-bs-toggle="collapse" class="btn btn-primary btn-block text-center  mt-0" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="true"
                                aria-controls="panelsStayOpen-collapseFive">
                            Project Notes
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseFive" class="accordion-collapse  collapse" aria-labelledby="panelsStayOpen-headingFive">
                        <div class="accordion-body border">
                            <div class="p-2 text-left" style="border-top: 1px solid #f0f0f0;">
                                <p class="mb-1 ">
                                    <select class="selectpicker col-10 task_note_finder" data-size="7" data-style="select-with-transition" title="{{ __('header.select_task') }}">
                                        @foreach($project->task as $task)
                                            <option value="{{ $task->id }}"> {{ $task->name }} </option>
                                        @endforeach
                                    </select>
                                    <a href="javascript:vod(0);" class="text-dark pull-right mt-2" data-toggle="modal" data-target="#taskNotesModal"><i class="fa fa-plus"></i></a>
                                </p>
                                @foreach($project->task as $task)
                                    @foreach($task->taskNote as $note)
                                        <div class="card p-0 m-0 mb-2 task_note task_note_{{$task->id}}">
                                            <div class="card-body p-0 m-0 pl-3 pr-1">
                                                <span class="mb-0 pb-0">{{ $note->notes }}</span>
                                                <br>
                                                <span class="mb-0 pb-0 pull-right"><small> {{ $note->created_at }} </small></span>
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="accordion" id="accordionPanelsStayOpenExample2">
                <div class="accordion-item border-0">
                    <h2 class="accordion-header text-center " id="panelsStayOpen-headingdoc">
                        <button href="javascript:void(0)" class="btn btn-primary btn-block text-center mt-0" data-toggle="modal" data-target="#documentModal">
                            Documents
                        </button>
                    </h2>
                </div>
            </div>

        </div>

    </div>

    <div class="col-12 position-absolute" style="bottom: 0">
        <div class="row">
            <div class="col-12 text-center mt-2">
                <button class="btn btn-primary p-2 w-25" onclick="openForm()"> Chat</button>
                <button class="btn btn-primary p-2 w-25" onclick="openForm1()"> Binance</button>

            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="content">
        <div class="content">
            <div class="container-fluid">

                <div class="tab-content tab-space mt-4">
                    <div class="tab-pane active show" id="link1">
                        <div class="row">
                            <div class="col-12 ">
                                <div class="card scroll-bar mb-0" style="height:26vh;">
                                    <div class="card-body ">

                                        <div class="MultiCarousel" data-items="1,3,5,6" data-slide="5" id="MultiCarousel" data-interval="1000">
                                            <div class="MultiCarousel-inner">
                                                <div class="item">
                                                    <div id="" class="vide_mirror div{{$project->project_leader}}" data-user-name="{{$project->projectLeader->first_name . ' ' . $project->projectLeader->last_name}}"></div>
                                                    <a href="javascript:void(0)" style="color: black;">
                                                        {{ $project->projectLeader->first_name . ' ' . $project->projectLeader->last_name }}
                                                    </a>
                                                </div>
                                                @foreach($project->projectUser as $user)
                                                    <div class="item">
                                                        <div id="" class="vide_mirror div{{$user->user->id}}" data-user-name="{{ $user->user->first_name . ' ' . $user->user->last_name }}"></div>
                                                        <a href="javascript:void(0)" style="color: black;">
                                                            {{ $user->user->first_name . ' ' . $user->user->last_name }}
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <button class="btn btn-primary leftLst" id="new-blue-bg">
                                                <span class="material-icons">arrow_back</span>
                                            </button>
                                            <button class="btn btn-primary rightLst" id="new-blue-bg">
                                                <span class="material-icons">arrow_forward</span>
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-9">

                                <div class="row">

                                    <div class="col-12">

                                        <div class="card scroll-bar mb-0 mt-3" style="height:55vh;">
                                            <!-- <div class="card-header card-header-success card-header-icon">
                                                <div class="card-icon">
                                                    <i class="material-icons"></i>
                                                </div>
                                                <h4 class="card-title"></h4>
                                            </div> -->
                                            <div class="card-body  card-body mb-0 pb-0 ">
                                                <div class="row">
                                                    <div class="col-9">
                                                        <ul class="nav nav-pills nav-pills-success" role="tablist">
                                                            <li class="nav-item" style="line-height:0px">
                                                                <a href="javascript:void(0)" class="btn btn-primary btn-sm text-white" rel="tooltip" title="{{ __('header.add_new_task') }}" style=" margin-right: 20px;margin-top: 5px;"
                                                                   data-toggle="modal" data-target="#addNewTaskModal"><i class="fa fa-plus mr-2" style="font-size:12px !important"></i> {{ __('header.add_task') }}
                                                                </a>
                                                            </li>
                                                            {{--                                                            <li class="nav-item" style="line-height:0px">--}}
                                                            {{--                                                                <a class="nav-link active" style="padding: 5px !important; border-radius: 5px !important;" data-toggle="tab" href="#link22" role="tablist"> Projects </a>--}}
                                                            {{--                                                            </li>--}}
                                                            {{--                                                            <li class="nav-item" style="line-height:0px">--}}
                                                            {{--                                                                <a class="nav-link" style="padding: 5px !important; border-radius: 5px !important;" data-toggle="tab" href="#link22" role="tablist"> My Tasks </a>--}}
                                                            {{--                                                            </li>--}}
                                                        </ul>
                                                    </div>
                                                    <div class="col-3 text-right">
                                                        <a class="btn btn-primary btn-sm text-white" data-toggle="modal" data-target="#completedTaskModal" role="tablist"> {{ __('header.completed_tasks') }} </a>
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="card-body card-body mt-0 pt-0 ">
                                                <div class="tab-content tab-space">
                                                    <div class="tab-pane active" id="link22">
                                                        <div class="row">
                                                            <div class="col-md-4 p-1">
                                                                <div class="card mt-3">
                                                                    <div class="accordion" id="accordionPanelsStayOpenExample">
                                                                        <div class="accordion-item">
                                                                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                                                                    To Perform
                                                                                </button>
                                                                            </h2>
                                                                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                                                                                <div class="accordion-body scroll-bar" style="height:400px;">
                                                                                    @foreach($project->task as $task)
                                                                                        @if($task->progress == 0 || $task->status == 'pending')
                                                                                            <div class="bg-color p-2 rounded {{($task->status == 'pending') ? 'bg-pending' : ''}}">
                                                                                                <!-- <h6 class="h6css" >Lorem</h6> -->
                                                                                                <a class="task_details" data-toggle="modal" data-target="#taskDetailsModal" href="{{ route('task.show',$task->id) }}">
                                                                                                    <div class="d-flex align-items-center justify-content-start flex-wrap mb-1">
                                                                                                        <span class="bg-light rounded mr-1 p-1 h6css mr-auto" title="lorem"><b>{{ $task->name  }}</b></span>
                                                                                                        @php $counter = 0; @endphp
                                                                                                        @if(Auth::user()->id != $task->addedBy->id)
                                                                                                            @php $counter++; @endphp
                                                                                                            <span class="bg-light rounded mr-2 position-relative" rel="tooltip"
                                                                                                                  title="{{ $task->addedBy->first_name . ' ' . $task->addedBy->last_name }}">
                                                                                                                @if($task->addedBy->image == null)
                                                                                                                    <span class="p-1 rounded-circle bg-info">
                                                                                                                        {{ucfirst(isset($task->addedBy->first_name[0]) ? $task->addedBy->first_name[0] : '') . ucfirst(isset($task->addedBy->last_name[0]) ? $task->addedBy->last_name[0] : '')}}
                                                                                                                    </span>
                                                                                                                @else
                                                                                                                    <img width="25" height="25" class="rounded-circle"
                                                                                                                         src="{{ Storage::disk('public')->exists($task->addedBy->image) ? Storage::disk('public')->url($task->addedBy->image) : asset('assets/img/faces/avatar.jpg') }}"/>
                                                                                                                @endif
                                                                                                                <span class="logged-in">●</span>
                                                                                                            </span>
                                                                                                        @endif
                                                                                                        @foreach($task->taskUser as $user)
                                                                                                            @if(Auth::user()->id != $user->user->id)
                                                                                                                @php $counter++; @endphp
                                                                                                                @if($counter <= 3)
                                                                                                                    <span class="bg-light rounded mr-2 position-relative" rel="tooltip"
                                                                                                                          title="{{ $user->user->first_name . ' ' . $user->user->last_name }}">
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
                                                                                                            @endif
                                                                                                        @endforeach
                                                                                                        @if($counter > 3)
                                                                                                            <span class="bg-light rounded mr-1 p-1"><i class="fa fa-plus"></i></span>
                                                                                                        @endif
                                                                                                    </div>
                                                                                                </a>

                                                                                                <div class="card p-0 pt-1 m-0 rounded-0" rel="tooltip" title="Progress {{ (int)$task->progress }}%">
                                                                                                    <div class="progress mb-1">
                                                                                                        <div class="progress-bar bg-success" role="progressbar" style="width: {{ (int)$task->progress }}%"
                                                                                                             aria-valuenow="{{ (int)$task->progress }}" aria-valuemin="0" aria-valuemax="100"></div>
                                                                                                    </div>
                                                                                                </div>

                                                                                                <div class="d-flex align-items-center justify-content-between">
                                                                                                    <span>Actions</span>
                                                                                                    <span>
                                                                                                        @if($task->taskAction!=null && $task->taskAction->count()>0)
                                                                                                            {{$task->taskAction->where('status','completed')->count()}}
                                                                                                            / {{$task->taskAction->count()}}
                                                                                                        @else 0/0
                                                                                                        @endif
                                                                                                    </span>
                                                                                                    <span><i class="fas fa-clock"></i>
                                                                                                        @php
                                                                                                            $startTime = Carbon\Carbon::parse($task->start_date);
                                                                                                            $endTime = Carbon\Carbon::parse($task->end_date);
                                                                                                            echo   $endTime->diffForHumans($startTime,true).' left';
                                                                                                        @endphp
                                                                                                    </span>
                                                                                                </div>

                                                                                            </div>
                                                                                        @endif
                                                                                    @endforeach
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 p-1">
                                                                <div class="card  mt-3">
                                                                    <div class="accordion" id="accordionPanelsStayOpenExample">
                                                                        <div class="accordion-item">
                                                                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                                                                    In Progress
                                                                                </button>
                                                                            </h2>
                                                                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                                                                                <div class="accordion-body scroll-bar" style="height:400px;">
                                                                                    @foreach($project->task as $task)
                                                                                        @if($task->progress > 0 && $task->progress < 100 && $task->status == 'approved')
                                                                                            <div class="bg-color p-2 rounded {{($task->status == 'pending') ? 'bg-pending' : ''}}">
                                                                                                <!-- <h6 class="h6css" >Lorem</h6> -->
                                                                                                <a class="task_details" data-toggle="modal" data-target="#taskDetailsModal" href="{{ route('task.show',$task->id) }}">
                                                                                                    <div class="d-flex align-items-center justify-content-start flex-wrap mb-1">
                                                                                                        <span class="bg-light rounded mr-1 p-1 h6css mr-auto" title="lorem"><b>{{ $task->name  }}</b></span>
                                                                                                        @php $counter = 0; @endphp
                                                                                                        @if(Auth::user()->id != $task->addedBy->id)
                                                                                                            @php $counter++; @endphp
                                                                                                            <span class="bg-light rounded mr-2 position-relative" rel="tooltip"
                                                                                                                  title="{{ $task->addedBy->first_name . ' ' . $task->addedBy->last_name }}">
                                                                                                                @if($task->addedBy->image == null)
                                                                                                                    <span class="p-1 rounded-circle bg-info">
                                                                                                                        {{ucfirst(isset($task->addedBy->first_name[0]) ? $task->addedBy->first_name[0] : '') . ucfirst(isset($task->addedBy->last_name[0]) ? $task->addedBy->last_name[0] : '')}}
                                                                                                                    </span>
                                                                                                                @else
                                                                                                                    <img width="25" height="25" class="rounded-circle"
                                                                                                                         src="{{ Storage::disk('public')->exists($task->addedBy->image) ? Storage::disk('public')->url($task->addedBy->image) : asset('assets/img/faces/avatar.jpg') }}"/>
                                                                                                                @endif
                                                                                                                <span class="logged-in">●</span>
                                                                                                            </span>
                                                                                                        @endif
                                                                                                        @foreach($task->taskUser as $user)
                                                                                                            @if(Auth::user()->id != $user->user->id)
                                                                                                                @php $counter++; @endphp
                                                                                                                @if($counter <= 3)
                                                                                                                    <span class="bg-light rounded mr-2 position-relative" rel="tooltip"
                                                                                                                          title="{{ $user->user->first_name . ' ' . $user->user->last_name }}">
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
                                                                                                            @endif
                                                                                                        @endforeach
                                                                                                        @if($counter > 3)
                                                                                                            <span class="bg-light rounded mr-1 p-1"><i class="fa fa-plus"></i></span>
                                                                                                        @endif
                                                                                                    </div>
                                                                                                </a>

                                                                                                <div class="card p-0 pt-1 m-0 rounded-0" rel="tooltip" title="Progress {{ (int)$task->progress }}%">
                                                                                                    <div class="progress mb-1">
                                                                                                        <div class="progress-bar bg-success" role="progressbar" style="width: {{ (int)$task->progress }}%"
                                                                                                             aria-valuenow="{{ (int)$task->progress }}" aria-valuemin="0" aria-valuemax="100"></div>
                                                                                                    </div>
                                                                                                </div>

                                                                                                <div class="d-flex align-items-center justify-content-between">
                                                                                                    <span>Actions</span>
                                                                                                    <span>
                                                                                                        @if($task->taskAction!=null && $task->taskAction->count()>0)
                                                                                                            {{$task->taskAction->where('status','completed')->count()}}
                                                                                                            / {{$task->taskAction->count()}}
                                                                                                        @else 0/0
                                                                                                        @endif
                                                                                                    </span>
                                                                                                    <span><i class="fas fa-clock"></i>
                                                                                                        @php
                                                                                                            $startTime = Carbon\Carbon::parse($task->start_date);
                                                                                                            $endTime = Carbon\Carbon::parse($task->end_date);
                                                                                                            echo   $endTime->diffForHumans($startTime,true).' left';
                                                                                                        @endphp
                                                                                                    </span>
                                                                                                </div>

                                                                                            </div>
                                                                                        @endif
                                                                                    @endforeach
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 p-1">
                                                                <div class="card  mt-3">
                                                                    <div class="accordion" id="accordionPanelsStayOpenExample">
                                                                        <div class="accordion-item">
                                                                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                                                                    Revision
                                                                                </button>
                                                                            </h2>
                                                                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                                                                                <div class="accordion-body scroll-bar" style="height:400px;">
                                                                                    @foreach($project->task as $task)
                                                                                        @if($task->progress == 100 && $task->status == 'approved')
                                                                                            <div class="bg-color p-2 rounded {{($task->status == 'pending') ? 'bg-pending' : ''}}">
                                                                                                <!-- <h6 class="h6css" >Lorem</h6> -->
                                                                                                <a class="task_details" data-toggle="modal" data-target="#taskDetailsModal" href="{{ route('task.show',$task->id) }}">
                                                                                                    <div class="d-flex align-items-center justify-content-start flex-wrap mb-1">
                                                                                                        <span class="bg-light rounded mr-1 p-1 h6css mr-auto" title="lorem"><b>{{ $task->name  }}</b></span>
                                                                                                        @php $counter = 0; @endphp
                                                                                                        @if(Auth::user()->id != $task->addedBy->id)
                                                                                                            @php $counter++; @endphp
                                                                                                            <span class="bg-light rounded mr-2 position-relative" rel="tooltip"
                                                                                                                  title="{{ $task->addedBy->first_name . ' ' . $task->addedBy->last_name }}">
                                                                                                                @if($task->addedBy->image == null)
                                                                                                                    <span class="p-1 rounded-circle bg-info">
                                                                                                                        {{ucfirst(isset($task->addedBy->first_name[0]) ? $task->addedBy->first_name[0] : '') . ucfirst(isset($task->addedBy->last_name[0]) ? $task->addedBy->last_name[0] : '')}}
                                                                                                                    </span>
                                                                                                                @else
                                                                                                                    <img width="25" height="25" class="rounded-circle"
                                                                                                                         src="{{ Storage::disk('public')->exists($task->addedBy->image) ? Storage::disk('public')->url($task->addedBy->image) : asset('assets/img/faces/avatar.jpg') }}"/>
                                                                                                                @endif
                                                                                                                <span class="logged-in">●</span>
                                                                                                            </span>
                                                                                                        @endif
                                                                                                        @foreach($task->taskUser as $user)
                                                                                                            @if(Auth::user()->id != $user->user->id)
                                                                                                                @php $counter++; @endphp
                                                                                                                @if($counter <= 3)
                                                                                                                    <span class="bg-light rounded mr-2 position-relative" rel="tooltip"
                                                                                                                          title="{{ $user->user->first_name . ' ' . $user->user->last_name }}">
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
                                                                                                            @endif
                                                                                                        @endforeach
                                                                                                        @if($counter > 3)
                                                                                                            <span class="bg-light rounded mr-1 p-1"><i class="fa fa-plus"></i></span>
                                                                                                        @endif
                                                                                                    </div>
                                                                                                </a>

                                                                                                <div class="card p-0 pt-1 m-0 rounded-0" rel="tooltip" title="Progress {{ (int)$task->progress }}%">
                                                                                                    <div class="progress mb-1">
                                                                                                        <div class="progress-bar bg-success" role="progressbar" style="width: {{ (int)$task->progress }}%"
                                                                                                             aria-valuenow="{{ (int)$task->progress }}" aria-valuemin="0" aria-valuemax="100"></div>
                                                                                                    </div>
                                                                                                </div>

                                                                                                <div class="d-flex align-items-center justify-content-between">
                                                                                                    <span>Actions</span>
                                                                                                    <span>
                                                                                                        @if($task->taskAction!=null && $task->taskAction->count()>0)
                                                                                                            {{$task->taskAction->where('status','completed')->count()}}
                                                                                                            / {{$task->taskAction->count()}}
                                                                                                        @else 0/0
                                                                                                        @endif
                                                                                                    </span>
                                                                                                    <span><i class="fas fa-clock"></i>
                                                                                                        @php
                                                                                                            $startTime = Carbon\Carbon::parse($task->start_date);
                                                                                                            $endTime = Carbon\Carbon::parse($task->end_date);
                                                                                                            echo   $endTime->diffForHumans($startTime,true).' left';
                                                                                                        @endphp
                                                                                                    </span>
                                                                                                </div>

                                                                                            </div>
                                                                                        @endif
                                                                                    @endforeach
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>
                                                    <div class="tab-pane" id="link22">
                                                        Efficiently unleash cross-media information without cross-media value. Quickly maximize timely deliverables for real-time schemas. <br/> <br/>Dramatically maintain clicks-and-mortar
                                                        solutions without functional solutions.
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 p-1 ">
                                @yield('right-panel')
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane " id="link2">
                        <div class="row mt-5">

                            <div class="col-md-9 ">
                                <div class="card scroll-bar mb-0" style="height:80vh;">
                                    <!-- <div class="card-header card-header-success card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons"></i>
                                         </div>
                                        <h4 class="card-title"></h4>
                                             </div> -->
                                    <div class="card-body ">

                                        <div class="row meeting_mode">
                                            <div class="col-md-4 col-sm-6 p-0 m-0 pl-1 pr-1 text-center">
                                                <div class="item">
                                                    <div id="" class="vide_mirror meeting_video div{{$project->project_leader}}" data-user-name="{{$project->projectLeader->first_name . ' ' . $project->projectLeader->last_name}}"></div>
                                                </div>
                                                <a href="javascript:void(0)" style="color: black;">
                                                    {{ $project->projectLeader->first_name . ' ' . $project->projectLeader->last_name }}
                                                </a>
                                            </div>
                                            @foreach($project->projectUser as $user)
                                                <div class="col-md-4 col-sm-6 p-0 m-0 pl-1 pr-1 text-center">
                                                    <div class="item">
                                                        <div id="" class="vide_mirror div{{$user->user->id}}" data-user-name="{{ $user->user->first_name . ' ' . $user->user->last_name }}"></div>
                                                    </div>
                                                    <a href="javascript:void(0)" style="color: black;">
                                                        {{ $user->user->first_name . ' ' . $user->user->last_name }}
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-3  mt-1">
                                @yield('right-panel')
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- chat box -->
            <div class="chat-popup" id="myForm" style="border-radius:10px">
                <form action="/#" class="form-container" style="height:58vh;border-radius:5px">
                    <div class="row">
                        <div class="col-8 text-right">
                            <h5><b>Chat Of The Project</b></h5>
                        </div>
                        <div class="col-4 text-right">
                            <a href="javascript:void(0)" class="text-dark" onclick="closeForm()"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-2 px-1">
                                <img style="border-radius:50%;width:100%" src="{{ asset('assets/img/faces/avatar.jpg') }}"/>
                            </div>
                            <div class="col-10" style="background: #eeeeee;border-radius: 10px; ">
                                <p class="mb-0 pb-0">
                                    <span style="font-size: 14px;"><b>Test Name</b></span>
                                    <span style="float:right;font-size: 14px;"><b>12:45</b></span>
                                </p>
                                <p class="mb-0 pb-0 mt-0 pt-0" style="line-height: 20px;margin-top:5px;font-size: 12px;">Lorem lorem lorem lorem lorem lorem lorem lorem lorem
                                <p>
                            </div>
                        </div>
                    </div>

                    <div class="box-footer" style="position: fixed;top: 85vh;width:290px;">
                        <form action="#" method="post">
                            <div class="input-group" style="border: 1px solid #bbb2b2; border-radius: 10px;padding:3px;background: #eeeeee;">
                                <input type="text" name="message" placeholder="Type Message ..." class="form-control" style="background-image:none;">
                                <span class="input-group-btn mt-2">
                                    <a href="javascript:void(0)" class="text-dark"><i class="fa fa-send"></i></a>
                                </span>
                            </div>
                        </form>
                    </div>
                </form>
            </div>

            <!-- binnecle box -->
            <div class="chat-popup" id="myForm1" style="border-radius:10px">
                <form action="/action_page.php" class="form-container" style="height:58vh;border-radius:5px">
                    <div class="row">
                        <div class="col-8 text-right">
                            <h5><b>Binnacle Of The Project</b></h5>
                        </div>
                        <div class="col-4 text-right">
                            <a href="javascript:void(0)" class="text-dark" onclick="closeForm1()"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-2 px-1">
                                <img style="border-radius:50%;width:100%" src="{{ asset('assets/img/faces/avatar.jpg') }}"/>
                            </div>
                            <div class="col-10" style="background: #eeeeee;border-radius: 10px; ">
                                <p class="mb-0 pb-0">
                                    <span style="font-size: 14px;"><b>Test Name</b></span>
                                    <span style="float:right;font-size: 14px;"><b>12:45</b></span>
                                </p>
                                <p class="mb-0 pb-0 mt-0 pt-0" style="line-height: 20px;margin-top:5px;font-size: 12px;">Lorem lorem lorem lorem lorem lorem lorem lorem lorem
                                <p>
                            </div>
                        </div>
                    </div>

                    <div class="box-footer" style="position: fixed;top: 85vh;width:290px;">
                        <form action="#" method="post">
                            <div class="input-group" style="border: 1px solid #bbb2b2; border-radius: 10px;padding:3px;background: #eeeeee;">
                                <input type="text" name="message" placeholder="Type Message ..." class="form-control" style="background-image:none;">
                                <span class="input-group-btn mt-2">
                                    <a href="javascript:void(0)" class="text-dark"><i class="fa fa-send"></i></a>
                                </span>
                            </div>
                        </form>
                    </div>
                </form>
            </div>

            <!-- Meetings Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="card card-signup card-plain">
                            <div class="modal-header card-header card-header-primary" style="    width: 90%; left: 5%;">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-10">
                                            <h4 class="modal-title">
                                                <span>Lorem Lorem Lorem</span>
                                                <a href="{{ url('metodo') }}" class="close text-white pull-right" style="top:0" aria-hidden="true"><i class="fa fa-edit"></i></a>
                                            </h4>
                                        </div>
                                        <div class="col-2  text-right">
                                            <a type="button" class="close text-white pull-right" style="top:0" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></a>

                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-body">
                            <div id="accordion">
                                <div class="card mb-0 mt-0 pb-0 pt-0">

                                    <div class="card-body">
                                        <div class="card-body">
                                            <div id="free_text_body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h4>Heading lorem</h4>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="Description">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <h4>Select Lorem</h4>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="checkbox" value="">
                                                                Lorem
                                                                <span class="form-check-sign">
                                                                    <span class="check"></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="checkbox" value="">
                                                                Lorem
                                                                <span class="form-check-sign">
                                                                    <span class="check"></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="note">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <h4>Images</h4>
                                                        <img class="pre-img" src="https://metodoo.com/public/storage/assets/images/project/pre_files/RPOinmykznl1ivKa2hzJ2WQ1rR94E204cFn6Zqqo.jpg" height="100"
                                                             alt="diagrama-estrategia-social-media.jpeg">

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer mb-0 mt-0 pb-0 pt-0">
                            <!-- <button type="button" class="btn btn-link">Nice Button</button> -->
                            <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">
                                Close
                            </button>
                        </div>
                    </div>

                </div>
            </div>
            <!--  End Modal -->

            <!-- Work Rules Modal -->
            <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Method O (Work Rules)</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                <i class="material-icons">clear</i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, atque. </p>

                        </div>
                        <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-link">Nice Button</button> -->
                            <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!--  End Modal -->

            <!-- Task Details Modal -->
            <div class="modal fade" id="taskDetailsModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content"></div>
                </div>
            </div>
            <!--  End Modal -->

        </div>
    </div>

@endsection

@section('script')
    <script src="//media.twiliocdn.com/sdk/js/video/v1/twilio-video.min.js"></script>
    <script>
        $(document).ready(function () {

            $(document).on('click', '.done_task', function (event) {
                event.preventDefault();
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
                        window.location.href = $(this).attr('href');
                    }
                });
            });

            $(document).on('change', 'select.task_note_finder', function () {
                $('.task_note').attr('hidden', true);
                $('.task_note_' + $(this).val()).removeAttr('hidden');
            });

            $(document).on('click', '.task_details', function () {
                event.preventDefault();
                $('#taskDetailsModal').find('.modal-content').load($(this).attr('href'));
            });

            $(document).on('click', '.add_action', function () {
                let count = $('#actions .added_action').length;
                if (count < 5) {
                    let content = '';
                    content += '<div class="input-group added_action mb-3">';
                    content += '<div class="input-group-prepend">';
                    content += '<span class="input-group-text action_counter"></span>';
                    content += '</div>';
                    content += '<input type="text" class="form-control" required name="action[]" placeholder="Add Action">';
                    content += '<div class="input-group-append">';
                    content += '<span class="input-group-text" ><i class="fa fa-minus text-danger cursor-pointer remove_action"></i></span>';
                    content += '</div>';
                    content += '</div>';
                    $('#actions').append(content);
                    actionCounter();
                }
            });

            $(document).on('click', '.remove_action', function () {
                $(this).closest('.added_action').remove();
                actionCounter();
            });

            function actionCounter() {
                $('.added_action').each(function (i) {
                    $(this).closest('.added_action').find('.action_counter').text(i + 1);
                });
            }

            // active thumbnail
            $("#thumbSlider .thumb").on("click", function () {
                $(this).addClass("active");
                $(this).siblings().removeClass("active");

            });

            $('.start_date').on('dp.change', function (e) {
                $('.end_date').data('DateTimePicker').minDate($('#start_date').val());
                $(this).data("DateTimePicker").hide();
            });
            $('.end_date').on('dp.change', function (e) {
                $('.start_date').data('DateTimePicker').maxDate($('#end_date').val());
                $(this).data("DateTimePicker").hide();
            });
            $('.date_picker').click(function () {
                $(this).closest('.form-group').addClass('is-filled');
            });
            $('.date_picker').datetimepicker({
                format: 'YYYY-MM-DD',
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

            $('.ulitm').removeAttr("hidden");
            $('#ulitm').css("display", "block");
            $('#general').css("display", "block");

            function openForm() {
                $('#myForm1').hide();
                if ($('#myForm').is(':visible')) {
                    $('#myForm').hide();
                } else {
                    $('#myForm').show();
                }
            }

            function closeForm() {
                document.getElementById("myForm").style.display = "none";
            }

            function openForm1() {
                $('#myForm').hide();
                if ($('#myForm1').is(':visible')) {
                    $('#myForm1').hide();
                } else {
                    $('#myForm1').show();
                }
            }

            function closeForm1() {
                document.getElementById("myForm1").style.display = "none";
            }

            // MultiCarousel JS Start
            var itemsMainDiv = ('.MultiCarousel');
            var itemsDiv = ('.MultiCarousel-inner');
            var itemWidth = "";

            $('.leftLst, .rightLst').click(function () {
                var condition = $(this).hasClass("leftLst");
                if (condition)
                    click(0, this);
                else
                    click(1, this)
            });

            ResCarouselSize();

            $(window).resize(function () {
                ResCarouselSize();
            });

            //this function define the size of the items
            function ResCarouselSize() {
                var incno = 0;
                var dataItems = ("data-items");
                var itemClass = ('.item');
                var id = 0;
                var btnParentSb = '';
                var itemsSplit = '';
                var sampwidth = $(itemsMainDiv).width();
                var bodyWidth = $('body').width();
                $(itemsDiv).each(function () {
                    id = id + 1;
                    var itemNumbers = $(this).find(itemClass).length;
                    btnParentSb = $(this).parent().attr(dataItems);
                    itemsSplit = btnParentSb.split(',');
                    $(this).parent().attr("id", "MultiCarousel" + id);
                    if (bodyWidth >= 1200) {
                        incno = itemsSplit[3];
                        itemWidth = sampwidth / incno;
                        $(this).parent().attr("data-slide", 4);
                        $(this).parent().a
                    } else if (bodyWidth >= 992) {
                        incno = itemsSplit[2];
                        itemWidth = sampwidth / incno;
                        $(this).parent().attr("data-slide", 3);
                    } else if (bodyWidth >= 768) {
                        incno = itemsSplit[1];
                        itemWidth = sampwidth / incno;
                        $(this).parent().attr("data-slide", 2);
                    } else {
                        incno = itemsSplit[0];
                        itemWidth = sampwidth / incno;
                        $(this).parent().attr("data-slide", 1);
                    }
                    $(this).css({'transform': 'translateX(0px)', 'width': itemWidth * itemNumbers});
                    $(this).find(itemClass).each(function () {
                        $(this).outerWidth(itemWidth);
                        $(this).find('.vide_mirror').css('min-height', ($(this).closest('.card').height() - 50) + 'px');
                    });

                    $(".leftLst").addClass("over");
                    $(".rightLst").removeClass("over");

                });
            }

            //this function used to move the items
            function ResCarousel(e, el, s) {
                var leftBtn = ('.leftLst');
                var rightBtn = ('.rightLst');
                var translateXval = '';
                var divStyle = $(el + ' ' + itemsDiv).css('transform');
                var values = divStyle.match(/-?[\d\.]+/g);
                var xds = Math.abs(values[4]);
                if (e == 0) {
                    translateXval = parseInt(xds) - parseInt(itemWidth * s);
                    $(el + ' ' + rightBtn).removeClass("over");

                    if (translateXval <= itemWidth / 2) {
                        translateXval = 0;
                        $(el + ' ' + leftBtn).addClass("over");
                    }
                } else if (e == 1) {
                    var itemsCondition = $(el).find(itemsDiv).width() - $(el).width();
                    translateXval = parseInt(xds) + parseInt(itemWidth * s);
                    $(el + ' ' + leftBtn).removeClass("over");

                    if (translateXval >= itemsCondition - itemWidth / 2) {
                        translateXval = itemsCondition;
                        $(el + ' ' + rightBtn).addClass("over");
                    }
                }
                $(el + ' ' + itemsDiv).css('transform', 'translateX(' + -translateXval + 'px)');
            }

            //It is used to get some elements from btn
            function click(ell, ee) {
                var Parent = "#" + $(ee).parent().attr("id");
                var slide = $(Parent).attr("data-slide");
                ResCarousel(ell, Parent, slide);
            }

            // MultiCarousel JS End
        });

        // Video Call JS Start
        var room;
        $(document).on('click', 'a.call_to_user', function (event) {
            event.preventDefault();
            $.ajax({
                url: APP_URL + "/join-call",
                type: "POST",
                data: {roomName: '{{'_meeting'.$project->id}}', "_token": "{{ csrf_token() }}"},
                success: function (result) {
                    Twilio.Video.createLocalTracks({
                        audio: true,
                        video: {width: 640, zoom: true}
                    }).then(function (localTracks) {
                        return Twilio.Video.connect(result.accessToken, {
                            name: result.roomName,
                            tracks: localTracks,
                        });
                    }).then(function (room) {
                        window.room = room

                        //local participants
                        participantConnected(room.localParticipant);
                        //connectected participants
                        room.participants.forEach(participant => {
                            participantConnected(participant)
                        });
                        room.on('participantConnected', function (participant) {
                            console.log("Joining: ");
                            participantConnected(participant);
                        });

                        room.on('participantDisconnected', function (participant) {
                            console.log("Disconnected: ");
                            participantDisconnected(participant);
                        });
                    });
                },
                error: function () {
                    toastr.error('in error');
                }
            });
        });

        function participantConnected(participant) {
            console.log('Participant "%s" connected', participant.identity);
            $('a.call_to_user').each(function () {
                $(this).text('Leave Call').removeClass('call_to_user').addClass('leave_call');
            });

            if ({{ Auth::user()->id }} != participant.identity)
                toastr.info($('.div' + participant.identity).data('user-name') + ' has joined session');
            // else
            //     toastr.info('You joined session');
            const div = document.getElementsByClassName('div' + participant.identity);
            participant.tracks.forEach(function (track) {
                for (let i = 0; i < div.length; i++) {
                    div[i].innerHTML = "<div style='clear:both'></div>";
                    trackAdded(div[i], track)
                }
            });

            participant.on('trackAdded', function (track) {
                for (let i = 0; i < div.length; i++) {
                    trackAdded(div[i], track)
                }
            });
            participant.on('trackRemoved', trackRemoved);
        }

        function trackAdded(div, track) {
            console.log('trake_added');
            div.append(track.attach());
            var video = div.getElementsByTagName("video")[0];
            if (video) {
                // if (div.classList.contains('meeting_video')) {
                video.setAttribute("style", "max-width: 90%");
                // } else {
                //     video.setAttribute("style", "max-width: " + ($(video).parent().parent().width() - 40) + "px;");
                // }
            }
            var video1 = div.getElementsByTagName("video")[1];
            console.log(video + '===============' + video1);
            if (video1) {
                video1.setAttribute("data-type", "screen_share");
                let share_screen = ($('video').data('type', 'share_screen'));
                share_screen.addClass('share_screen');
            }
        }

        $(document).on('click', 'a.leave_call', function () {
            room.on('disconnected', room => {
                participantDisconnected(room.localParticipant);
            });
            room.disconnect();
            $('.vide_mirror').html('');
            $('a.leave_call').each(function () {
                $(this).text('Join Call').removeClass('leave_call').addClass('call_to_user');
            });
        });

        function participantDisconnected(participant) {
            console.log('Participant "%s" disconnected', participant.identity);
            participant.tracks.forEach(trackRemoved);
            if ({{ Auth::user()->id }} != participant.identity)
                toastr.info($('.div' + participant.identity).data('user-name') + ' has left session');
            // else
            //     toastr.info('You left session');
        }

        function trackRemoved(track) {
            track.detach().forEach(function (element) {
                element.remove()
            });
        }


        // mute & unmute mic
        function muteMic() {
            room.localParticipant.audioTracks.forEach((publication) => {
                if (publication.isEnabled) {
                    publication.disable();
                    $('.btnMic').html('<i class="fas fa-microphone-slash"></i>')
                    $('.btnMic').attr('title', 'Unmute Mic');
                } else {
                    publication.enable();
                    $('.btnMic').html('<i class="fas fa-microphone"></i>')
                    $('.btnMic').attr('title', 'Mute Mic');
                }

            });


        }

        function muteVideo() {
            if (typeof room === 'undefined') {
                $.ajax({
                    url: APP_URL + "/join-call",
                    type: "POST",
                    data: {roomName: '{{'_meeting'.$project->id}}', "_token": "{{ csrf_token() }}"},
                    success: function (result) {
                        Twilio.Video.createLocalTracks({
                            audio: true,
                            video: {width: 240, zoom: true}
                        }).then(function (localTracks) {
                            return Twilio.Video.connect(result.accessToken, {
                                name: result.roomName,
                                tracks: localTracks
                            });
                        }).then(function (room) {
                            console.log('Successfully joined a Room: ', room.name);
                            window.room = room
                            //local participants
                            participantConnected(room.localParticipant);

                            //connectected participants
                            room.participants.forEach(participant => {
                                participantConnected(participant)
                            });
                            room.on('participantConnected', function (participant) {
                                console.log("Joining: ");
                                participantConnected(participant);
                            });

                            room.on('participantDisconnected', function (participant) {
                                console.log("Disconnected: ");
                                participantDisconnected(participant);
                            });
                        });
                    },
                    error: function () {
                        toastr.error('in error');
                    }
                });
            } else {
                room.localParticipant.videoTracks.forEach(publication => {
                    console.log(publication);
                    if (publication.isEnabled) {
                        publication.disable();
                        $('.btnCam').html('<i class="fas fa-video-slash"></i>')
                        $('.btnCam').attr('title', 'Turn On Camera');
                    } else {
                        publication.enable();
                        $('.btnCam').html('<i class="fas fa-video"></i>')
                        $('.btnCam').attr('title', 'Turn Off Camera');
                    }

                });
            }

        }

        function ChangeVolume() {
            $('audio,video').each(function () {
                $(this).volume = 0.0;
            });
            $(this).pause();
        }

        // screen share
        var screenTrack;

        function shareScreen() {
            event.preventDefault();
            if (!screenTrack) {
                navigator.mediaDevices.getDisplayMedia().then(stream => {
                    screenTrack = new Twilio.Video.LocalVideoTrack(stream.getTracks()[0]);
                    room.localParticipant.publishTrack(screenTrack);
                    screenTrack.mediaStreamTrack.onended = () => {
                        shareScreen()
                    };
                    console.log(screenTrack);

                    $('.btnScreen').html('<i class="fas fa-slash text-white"></i>')
                    $('.btnScreen').attr('title', 'Stop Screen');
                    $.ajax({
                        url: APP_URL + '/screen-shared',
                        type: 'post',
                        data: {
                            "_token": " {{ csrf_token()  }} ",
                            'projectID': "{{$project->id}}",
                            'status': true
                        },
                        dataType: 'json',
                        success: function (result) {
                        },
                        error: function () {
                            toastr.error('in error..')
                        }
                    })
                }).catch(() => {
                    toastr.warning('Could not share the screen.');
                });
            } else {
                room.localParticipant.unpublishTrack(screenTrack);
                screenTrack.stop();
                screenTrack = null
                $('.btnScreen').html('<i class="fab fa-slideshare"></i>')
                $('.btnScreen').attr('title', 'Share Screen');
                $.ajax({
                    url: APP_URL + '/screen-shared',
                    type: 'post',
                    data: {
                        "_token": " {{ csrf_token()  }} ",
                        'projectID': "{{$project->id}}",
                        'status': false
                    },
                    dataType: 'json',
                    success: function (result) {
                    },
                    error: function () {
                        toastr.error('in error..')
                    }
                })
            }
        };

        // Video Call JS End

    </script>
@endsection
