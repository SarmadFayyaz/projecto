@extends('layouts.user')

@section('title', $project->name)

@section('style')
    <link rel="stylesheet" type="text/css" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/cupertino/jquery-ui.css"/>
    <style>
        .share_screen {
            width: 100px;
            position: relative;
            margin-top: -100px;
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

        .h6css {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            width: 95px;
        }

        .doc_name {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            width: 100%;
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
            border-radius: 0.2rem !important;
            padding: 10px 15px;
        }

        .nav-pills.nav-pills-warning .nav-item .nav-link.active, .nav-pills.nav-pills-warning .nav-item .nav-link.active:focus, .nav-pills.nav-pills-warning .nav-item .nav-link.active:hover {
            background-color: #36baaf;
            box-shadow: 0 4px 20px 0px rgb(0 0 0 / 14%), 0 7px 10px -5px rgb(255 152 0 / 40%);
            color: #fff;
        }

        @media (min-width: 1200px) {
            #shareScreenModal .modal-xl {
                max-width: 1050px !important;
            }

            #completedTaskModal .modal-xl {
                max-width: 1050px !important;
                top: 250px
            }
        }

        @media (min-width: 1200px) {
            #taskDetailsModal .modal-xl {
                max-width: 1050px !important;
                /*left: 130px;*/
                top: 250px
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
            bottom: 5vw;
            right: 1.5vw;
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
            padding: 0px 28px;
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
            max-height: 21vh;
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
            top: calc(50% - 19px);
            padding: 2px 5px;
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

@include('backend.user.project.task.add')@include('backend.user.project.task.completed')@include('backend.user.project.extras.video-control')@include('backend.user.project.extras.add-task-notes')@include('backend.user.project.document.index')@include('backend.user.project.extras.share-screen')@include('backend.user.project.chat.index')

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
                    <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse table-responsive" aria-labelledby="panelsStayOpen-headingFive" style="max-height: 30vh;">
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
                                                <a class="task_note_edit text-dark" data-toggle="modal" data-target="#editTaskNotesModal" href="{{ route('task-note.edit', $note->id)}}">
                                                    <span class="mb-0 pb-0">{{ $note->notes }}</span>
                                                    <br>
                                                    <span class="mb-0 pb-0 pull-right"><small> {{ $note->created_at }} </small></span>
                                                </a>
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
                        <a href="{{ route('get-document', ['all' , $project->id]) }}" class="btn btn-primary btn-block text-center mt-0 get_documents" data-toggle="modal" data-target="#documentModal">
                            {{ __('header.documents') }}
                        </a>
                    </h2>
                </div>
            </div>

        </div>

    </div>

    <div class="col-12 position-absolute" style="bottom: 0">
        <div class="row">
            <div class="col-12 text-center mt-2">
                <button class="btn btn-primary p-2 w-25" onclick="openChat()">{{ __('header.chat') }}</button>
                <button class="btn btn-primary p-2 w-25" onclick="openBinance()">{{ __('header.binnacle') }}</button>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="tab-content tab-space mt-4">
                <div class="tab-pane active show" id="link1">
                    <div class="row">
                        <div class="col-12 ">
                            <div class="card scroll-bar mb-0" style="height:27vh;">
                                <div class="card-body pt-4" style="max-height: 27vh">

                                    <div class="MultiCarousel" data-items="1,3,5,6" data-slide="5" id="MultiCarousel" data-interval="1000">
                                        <div class="MultiCarousel-inner">
                                            <div class="item">
                                                <div id="" class="vide_mirror div{{$project->project_leader}}" data-user-name="{{$project->projectLeader->first_name . ' ' . $project->projectLeader->last_name}}"></div>
                                                <a href="javascript:void(0)" style="color: #ffffff; position: relative; bottom: 3vh;">
                                                    {{ $project->projectLeader->first_name . ' ' . $project->projectLeader->last_name }}
                                                </a>
                                            </div>
                                            @foreach($project->projectUser as $user)
                                                @if($user->user->deleted_at == null)
                                                    <div class="item">
                                                        <div id="" class="vide_mirror div{{$user->user->id}}" data-user-name="{{ $user->user->first_name . ' ' . $user->user->last_name }}"></div>
                                                        <a href="javascript:void(0)" style="color: #ffffff; position: relative; bottom: 3vh;">
                                                            {{ $user->user->first_name . ' ' . $user->user->last_name }}
                                                        </a>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <button class="btn btn-primary leftLst" id="new-blue-bg">
                                            <span class="material-icons m-0">arrow_back</span>
                                        </button>
                                        <button class="btn btn-primary rightLst" id="new-blue-bg">
                                            <span class="material-icons m-0">arrow_forward</span>
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
                                                            <div class="card mt-3 mb-0">
                                                                <div class="accordion" id="accordionPanelsStayOpenExample">
                                                                    <div class="accordion-item">
                                                                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                                                                To Perform
                                                                            </button>
                                                                        </h2>
                                                                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                                                                            <div class="accordion-body scroll-bar" style="height:39vh;">
                                                                                @foreach($project->task as $task)
                                                                                    @if($task->progress == 0 || $task->status == 'pending')
                                                                                        <div class="bg-color p-2 rounded {{($task->status == 'pending') ? 'bg-pending' : ''}}">
                                                                                            <!-- <h6 class="h6css" >Lorem</h6> -->
                                                                                            <a class="task_details" data-toggle="modal" data-target="#taskDetailsModal" href="{{ route('task.show',$task->id) }}">
                                                                                                <div class="d-flex align-items-center justify-content-start flex-wrap mb-1">
                                                                                                    <span class="bg-light rounded mr-1 p-1 h6css mr-auto text-dark" title="lorem"><b>{{ $task->name  }}</b></span>
                                                                                                    @php $counter = 0; @endphp
                                                                                                    @if(Auth::user()->id != $task->addedBy->id)
                                                                                                        @php $counter++; @endphp
                                                                                                        @if($task->addedBy->deleted_at == null)
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
                                                                                                        @else
                                                                                                            <span class="bg-light rounded mr-2 position-relative" rel="tooltip" title="{{ __('header.user_deleted') }}">
                                                                                                                <span class="p-1 rounded-circle bg-info">
                                                                                                                    <i class="fas fa-user-slash"></i>
                                                                                                                </span>
                                                                                                                <span class="logged-out">●</span>
                                                                                                            </span>
                                                                                                        @endif
                                                                                                    @endif
                                                                                                    @foreach($task->taskUser as $user)
                                                                                                        @if(Auth::user()->id != $user->user->id)
                                                                                                            @php $counter++; @endphp
                                                                                                            @if($user->user->deleted_at == null)
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
                                                                                                            @else
                                                                                                                <span class="bg-light rounded mr-2 position-relative" rel="tooltip" title="{{ __('header.user_deleted') }}">
                                                                                                                    <span class="p-1 rounded-circle bg-info">
                                                                                                                        <i class="fas fa-user-slash"></i>
                                                                                                                    </span>
                                                                                                                    <span class="logged-out">●</span>
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
                                                            <div class="card mt-3 mb-0 ">
                                                                <div class="accordion" id="accordionPanelsStayOpenExample">
                                                                    <div class="accordion-item">
                                                                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                                                                In Progress
                                                                            </button>
                                                                        </h2>
                                                                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                                                                            <div class="accordion-body scroll-bar" style="height:39vh;">
                                                                                @foreach($project->task as $task)
                                                                                    @if($task->progress > 0 && $task->progress < 100 && $task->status == 'approved')
                                                                                        <div class="bg-color p-2 rounded {{($task->status == 'pending') ? 'bg-pending' : ''}}">
                                                                                            <!-- <h6 class="h6css" >Lorem</h6> -->
                                                                                            <a class="task_details" data-toggle="modal" data-target="#taskDetailsModal" href="{{ route('task.show',$task->id) }}">
                                                                                                <div class="d-flex align-items-center justify-content-start flex-wrap mb-1">
                                                                                                    <span class="bg-light rounded mr-1 p-1 h6css mr-auto text-dark" title="lorem"><b>{{ $task->name  }}</b></span>
                                                                                                    @php $counter = 0; @endphp
                                                                                                    @if(Auth::user()->id != $task->addedBy->id)
                                                                                                        @php $counter++; @endphp
                                                                                                        @if($task->addedBy->deleted_at == null)
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
                                                                                                        @else
                                                                                                            <span class="bg-light rounded mr-2 position-relative" rel="tooltip" title="{{ __('header.user_deleted') }}">
                                                                                                                <span class="p-1 rounded-circle bg-info">
                                                                                                                    <i class="fas fa-user-slash"></i>
                                                                                                                </span>
                                                                                                                <span class="logged-out">●</span>
                                                                                                            </span>
                                                                                                        @endif
                                                                                                    @endif
                                                                                                    @foreach($task->taskUser as $user)
                                                                                                        @if(Auth::user()->id != $user->user->id)
                                                                                                            @php $counter++; @endphp
                                                                                                            @if($user->user->deleted_at == null)
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
                                                                                                            @else
                                                                                                                <span class="bg-light rounded mr-2 position-relative" rel="tooltip" title="{{ __('header.user_deleted') }}">
                                                                                                                    <span class="p-1 rounded-circle bg-info">
                                                                                                                        <i class="fas fa-user-slash"></i>
                                                                                                                    </span>
                                                                                                                    <span class="logged-out">●</span>
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
                                                            <div class="card mt-3 mb-0 ">
                                                                <div class="accordion" id="accordionPanelsStayOpenExample">
                                                                    <div class="accordion-item">
                                                                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                                                                Revision
                                                                            </button>
                                                                        </h2>
                                                                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                                                                            <div class="accordion-body scroll-bar" style="height:39vh;">
                                                                                @foreach($project->task as $task)
                                                                                    @if($task->progress == 100 && $task->status == 'approved')
                                                                                        <div class="bg-color p-2 rounded {{($task->status == 'pending') ? 'bg-pending' : ''}}">
                                                                                            <!-- <h6 class="h6css" >Lorem</h6> -->
                                                                                            <a class="task_details" data-toggle="modal" data-target="#taskDetailsModal" href="{{ route('task.show',$task->id) }}">
                                                                                                <div class="d-flex align-items-center justify-content-start flex-wrap mb-1">
                                                                                                    <span class="bg-light rounded mr-1 p-1 h6css mr-auto text-dark" title="lorem"><b>{{ $task->name  }}</b></span>
                                                                                                    @php $counter = 0; @endphp
                                                                                                    @if(Auth::user()->id != $task->addedBy->id)
                                                                                                        @php $counter++; @endphp
                                                                                                        @if($task->addedBy->deleted_at == null)
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
                                                                                                        @else
                                                                                                            <span class="bg-light rounded mr-2 position-relative" rel="tooltip" title="{{ __('header.user_deleted') }}">
                                                                                                                <span class="p-1 rounded-circle bg-info">
                                                                                                                    <i class="fas fa-user-slash"></i>
                                                                                                                </span>
                                                                                                                <span class="logged-out">●</span>
                                                                                                            </span>
                                                                                                        @endif
                                                                                                    @endif
                                                                                                    @foreach($task->taskUser as $user)
                                                                                                        @if(Auth::user()->id != $user->user->id)
                                                                                                            @php $counter++; @endphp
                                                                                                            @if($user->user->deleted_at == null)
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
                                                                                                            @else
                                                                                                                <span class="bg-light rounded mr-2 position-relative" rel="tooltip" title="{{ __('header.user_deleted') }}">
                                                                                                                    <span class="p-1 rounded-circle bg-info">
                                                                                                                        <i class="fas fa-user-slash"></i>
                                                                                                                    </span>
                                                                                                                    <span class="logged-out">●</span>
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
                        <div class="col-md-3">
                            @yield('right-panel')
                        </div>
                    </div>
                </div>
                <div class="tab-pane " id="link2">
                    <div class="row mt-5">

                        <div class="col-md-9 mt-3">
                            <div class="card scroll-bar mb-0 mt-3" style="height:80vh;">
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
                                            <a href="javascript:void(0)" style="color: #ffffff; position: relative; bottom: 3vh;">
                                                {{ $project->projectLeader->first_name . ' ' . $project->projectLeader->last_name }}
                                            </a>
                                        </div>
                                        @foreach($project->projectUser as $user)
                                            @if($user->user->deleted_at == null)
                                                <div class="col-md-4 col-sm-6 p-0 m-0 pl-1 pr-1 text-center">
                                                    <div class="item">
                                                        <div id="" class="vide_mirror div{{$user->user->id}}" data-user-name="{{ $user->user->first_name . ' ' . $user->user->last_name }}"></div>
                                                    </div>
                                                    <a href="javascript:void(0)" style="color: #ffffff; position: relative; bottom: 3vh;">
                                                        {{ $user->user->first_name . ' ' . $user->user->last_name }}
                                                    </a>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-3 mt-3">
                            @yield('right-panel')
                        </div>
                    </div>
                </div>
            </div>
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

        <!-- Edit Task Notes Modal -->
        <div class="modal fade" id="editTaskNotesModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content"></div>
            </div>
        </div>
        <!--  End Modal -->

    </div>

@endsection

@section('script')
    <script src="//media.twiliocdn.com/sdk/js/video/v1/twilio-video.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
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

            $(document).on('click', '.task_note_edit', function () {
                event.preventDefault();
                $('#editTaskNotesModal').find('.modal-content').load($(this).attr('href'), function() {
                    $('#editTaskNotesModal').find('.selectpicker').selectpicker('refresh');
                });
            });

            $(document).on('click', 'a[data-task-note=delete]', function (e) {
                alert(123);
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
                            toastr.success(data.success);
                            $('#editTaskNotesModal').modal('hide');
                        });
                    }
                });
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
            $('.ulitm').removeAttr("hidden");
            $('#ulitm').css("display", "block");
            $('#general').css("display", "block");

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
        });
    </script>
    <script>
        $(document).ready(function () {
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
        })
    </script>
    <script>
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
            if (video1) {
                console.log(video1);
                video1.classList.add("share_screen", "cursor-pointer");
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
                    $('.btnMic').html('<i class="fas fa-microphone-slash"></i>').attr('title', 'Unmute mic').attr('data-original-title', 'Unmute mic');
                } else {
                    publication.enable();
                    $('.btnMic').html('<i class="fas fa-microphone"></i>').attr('title', 'Mute mic').attr('data-original-title', 'Mute mic');
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
                        $('.btnCam').html('<i class="fas fa-video-slash"></i>').attr('title', 'Turn on camera').attr('data-original-title', 'Turn on camera');
                    } else {
                        publication.enable();
                        $('.btnCam').html('<i class="fas fa-video"></i>').attr('title', 'Turn off camera').attr('data-original-title', 'Turn off camera');
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
                    $('.btnScreen').html('<i class="fas fa-slash text-white"></i>').attr('title', 'Stop sharing screen').attr('data-original-title', 'Stop sharing screen');
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
                $('.btnScreen').html('<i class="fab fa-slideshare"></i>').attr('title', 'Share screen').attr('data-original-title', 'Share screen');
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

        let share_screen_div = null;
        $(document).on('click', '.share_screen', function () {
            share_screen_div = $(this).parent();
            $('#shareScreenModal .modal-body').append($(this).removeClass('share_screen cursor-pointer').css({'width': '100%', 'margin-top': 0}));
            $('#shareScreenModal').modal('show');
            $('#shareScreenModal').find('.modal-content').resizable({
                minWidth: 625,
                minHeight: 175,
                handles: 'n, e, s, w, ne, sw, se, nw',
            });
            $('#shareScreenModal').find('.modal-content').draggable({
                handle: '.modal-header'
            });
        });
        $('#shareScreenModal').on('hidden.bs.modal', function () {
            share_screen_div.append($('#shareScreenModal video').addClass('share_screen cursor-pointer').removeAttr("style"));
        });
        // Video Call JS End
    </script>
    <script>
        //Chat JS Start
        function openChat() {
            $('#binancePopupModal').hide();
            if ($('#chatPopupModal').is(':visible')) {
                $('#chatPopupModal').hide();
            } else {
                $('#chatPopupModal').show();
                let messageBody = document.querySelector('#chat_body');
                messageBody.scrollTop = messageBody.scrollHeight - messageBody.clientHeight;
            }
        }

        function closeChat() {
            document.getElementById("chatPopupModal").style.display = "none";
        }

        function openBinance() {
            $('#chatPopupModal').hide();
            if ($('#binancePopupModal').is(':visible')) {
                $('#binancePopupModal').hide();
            } else {
                $('#binancePopupModal').show();
                let messageBody = document.querySelector('#binance_body');
                messageBody.scrollTop = messageBody.scrollHeight - messageBody.clientHeight;
            }
        }

        function closeBinance() {
            document.getElementById("binancePopupModal").style.display = "none";
        }

        Pusher.logToConsole = true;

        var pusher1 = new Pusher('452e3e06689718ba121f', {
            cluster: 'ap2',
            useTLS: true
        });

        // group message event
        var channel1 = pusher1.subscribe('groups.{{ $project->id }}');
        channel1.bind('GroupMessage', function (data) {
            let content = '';
            content += '<div class="row mb-2">';
            if ({{Auth::user()->id}} == data.group_conversation.user_id) {
                @if(Auth::user()->image == null)
                    content += '<div class="col-2 mt-2 p-1 order-10">';
                content += '<span class="p-2 rounded-circle bg-info">';
                content += '{{ucfirst(isset(Auth::user()->first_name[0]) ? Auth::user()->first_name[0] : '') . ucfirst(isset(Auth::user()->last_name[0]) ? Auth::user()->last_name[0] : '')}}';
                content += '</span>';
                content += '</div>';
                @else
                    content += '<div class="col-2 p-1 order-10">';
                content += '<img width="40" height="40" class="rounded-circle"';
                content += 'src="' + APP_URL + '/storage{{ Auth::user()->image }}"/>';
                content += '</div>';
                @endif
                    content += '<div class="col-10 order-2" style="background: #eeeeee;border-radius: 10px; ">';
                content += '<p class="mb-0 pb-0">';
                content += '<span style="font-size: 14px;"><b>{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</b></span>';
            } else {
                if (data.group_conversation.user.image == null) {
                    content += '<div class="col-2 mt-2 p-1">';
                    content += '<span class="p-2 rounded-circle bg-info">';
                    content += (data.group_conversation.user.first_name).charAt(0) + (data.group_conversation.user.last_name).charAt(0);
                    content += '</span>';
                    content += '</div>';
                } else {
                    content += '<div class="col-2 p-1">';
                    content += '<img width="40" height="40" class="rounded-circle"';
                    content += 'src="' + APP_URL + '/storage' + data.group_conversation.user.image + '"/>';
                    content += '</div>';
                }
                content += '<div class="col-10" style="background: #eeeeee;border-radius: 10px; ">';
                content += '<p class="mb-0 pb-0">';
                content += '<span style="font-size: 14px;"><b>' + data.group_conversation.user.first_name + data.group_conversation.user.last_name + '</b></span>';
            }
            content += '<span class="text-lowercase" style="float:right;font-size: 14px;"><b>' + getTime(data.group_conversation.created_at) + '</b></span>';
            content += '</p>';
            content += '<p class="mb-0 pb-0 mt-0 pt-0" style="line-height: 20px;margin-top:5px;font-size: 12px;">';
            if (data.group_conversation.message != null && data.group_conversation.message != '')
                content += data.group_conversation.message;
            if (data.group_conversation.document_id != null && data.group_conversation.document_id != '') {
                let icon = '';
                switch (data.group_conversation.document.type) {
                    case 'docx':
                        icon = '<i class="far fa-file-word" style="font-size: 50px;"></i>';
                        break;
                    case 'pdf' :
                        icon = '<i class="far fa-file-pdf" style="font-size: 50px;"></i>';
                        break;
                    default :
                        icon = '<i class="far fa-file" style="font-size: 50px;"></i>';
                        break;
                }

                if (data.group_conversation.message != null && data.group_conversation.message != '')
                    content += '<br>'
                content += '<a href="' + APP_URL + '/storage' + data.group_conversation.document.file + '" class="btn btn-link bg-transparent text-dark p-1 mt-0 mb-0 0 ml-0 mr-0 w-auto appended_tooltip"';
                content += ' target="_blank" rel="tooltip" title="' + data.group_conversation.document.name + '" data-original-title="' + data.group_conversation.document.name + '" >' + icon + '</a>'
            }
            content += '<p>';
            content += '</div>';
            content += '</div>';

            if (data.group_conversation.message_type == 0) {
                $("#chat_body").append(content);
                var messageBody = document.querySelector('#chat_body');
                messageBody.scrollTop = messageBody.scrollHeight - messageBody.clientHeight;
            } else if (data.group_conversation.message_type == 1) {
                $("#binance_body").append(content);
                var messageBody = document.querySelector('#binance_body');
                messageBody.scrollTop = messageBody.scrollHeight - messageBody.clientHeight;
            }
        });

        // single message event
        var channel2 = pusher1.subscribe('receiver.{{Auth::user()->id}}');
        channel2.bind('IndividualMessage', function (data) {
            let content = '';
            content += '<div class="row mb-2">';
            if ({{Auth::user()->id}} == data.individual_conversation.user_id) {
                @if(Auth::user()->image == null)
                    content += '<div class="col-2 mt-2 p-1 order-10">';
                content += '<span class="p-2 rounded-circle bg-info">';
                content += '{{ucfirst(isset(Auth::user()->first_name[0]) ? Auth::user()->first_name[0] : '') . ucfirst(isset(Auth::user()->last_name[0]) ? Auth::user()->last_name[0] : '')}}';
                content += '</span>';
                content += '</div>';
                @else
                    content += '<div class="col-2 p-1 order-10">';
                content += '<img width="40" height="40" class="rounded-circle"';
                content += 'src="' + APP_URL + '/storage{{ Auth::user()->image }}"/>';
                content += '</div>';
                @endif
                    content += '<div class="col-10 order-2" style="background: #eeeeee;border-radius: 10px; ">';
                content += '<p class="mb-0 pb-0">';
                content += '<span style="font-size: 14px;"><b>{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</b></span>';
            } else {
                if (data.individual_conversation.user.image == null) {
                    content += '<div class="col-2 mt-2 p-1">';
                    content += '<span class="p-2 rounded-circle bg-info">';
                    content += (data.individual_conversation.user.first_name).charAt(0) + (data.individual_conversation.user.last_name).charAt(0);
                    content += '</span>';
                    content += '</div>';
                } else {
                    content += '<div class="col-2 p-1">';
                    content += '<img width="40" height="40" class="rounded-circle"';
                    content += 'src="' + APP_URL + '/storage' + data.individual_conversation.user.image + '"/>';
                    content += '</div>';
                }
                content += '<div class="col-10" style="background: #eeeeee;border-radius: 10px; ">';
                content += '<p class="mb-0 pb-0">';
                content += '<span style="font-size: 14px;"><b>' + data.individual_conversation.user.first_name + data.individual_conversation.user.last_name + '</b></span>';
            }
            content += '<span class="text-lowercase" style="float:right;font-size: 14px;"><b>' + getTime(data.individual_conversation.created_at) + '</b></span>';
            content += '</p>';
            content += '<p class="mb-0 pb-0 mt-0 pt-0" style="line-height: 20px;margin-top:5px;font-size: 12px;">';
            if (data.individual_conversation.message != null && data.individual_conversation.message != '')
                content += data.individual_conversation.message;
            if (data.individual_conversation.document_id != null && data.individual_conversation.document_id != '') {
                let icon = '';
                switch (data.individual_conversation.document.type) {
                    case 'docx':
                        icon = '<i class="far fa-file-word" style="font-size: 50px;"></i>';
                        break;
                    case 'pdf' :
                        icon = '<i class="far fa-file-pdf" style="font-size: 50px;"></i>';
                        break;
                    default :
                        icon = '<i class="far fa-file" style="font-size: 50px;"></i>';
                        break;
                }

                if (data.individual_conversation.message != null && data.individual_conversation.message != '')
                    content += '<br>'
                content += '<a href="' + APP_URL + '/storage' + data.individual_conversation.document.file + '" class="btn btn-link bg-transparent text-dark p-1 mt-0 mb-0 0 ml-0 mr-0 w-auto appended_tooltip"';
                content += ' target="_blank" rel="tooltip" title="' + data.individual_conversation.document.name + '" data-original-title="' + data.individual_conversation.document.name + '" >' + icon + '</a>'
            }
            content += '<p>';
            content += '</div>';
            content += '</div>';

            $("#individual_chat_body").append(content);
            var messageBody = document.querySelector('#individual_chat_body');
            messageBody.scrollTop = messageBody.scrollHeight - messageBody.clientHeight;
        });
        // screen shared event
        var channel3 = pusher1.subscribe('screen-shared.{{Auth::user()->id}}');
        channel3.bind('ScreenShared', function (data) {
                if (data.status == "true") {
                    $('#btnScreen').prop('disabled', true)
                } else {
                    $('#btnScreen').prop('disabled', false)
                }

                console.log(data)
            }
        )
        $(function () {
                $("#upload_link").on('click', function (e) {
                    e.preventDefault();
                    $("#upload:hidden").trigger('click');
                });
            }
        );

        $("#chat_form, #binance_form").submit(function (e) {
            e.preventDefault();
            let chat_type = $(this).find('.receiver_id').val();
            let url = APP_URL + "/group-conversation";
            if (chat_type != 0) {
                url = APP_URL + "/individual-conversation";
            }
            $('#chat_btn').attr('disabled', true);
            $('#binance_btn').attr('disabled', true);
            $.ajax({
                url: url,
                type: "post",
                data: new FormData(this),
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function (result) {
                    $('#chat_btn').prop('disabled', false);
                    $("#chat_message").val("");
                    $('#chat_file').val('').closest('label').attr('data-original-title', 'Attach file').attr('title', 'Attach file');

                    $('#binance_btn').prop('disabled', false);
                    $("#binance_message").val("");
                    $('#binance_file').val('').closest('label').attr('data-original-title', 'Attach file').attr('title', 'Attach file');
                },
                error: function (result) {
                    $('#chat_btn').prop('disabled', false);
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

        $('#chat_file, #binance_file').on('change', function (e) {
            var filename = e.target.files[0].name;
            $(this).closest('label').attr('data-original-title', filename).attr('title', filename);
        });

        $(document).on('change', '#chat_type', function () {
            let chat_type = $(this).val();
            $('#chatPopupModal .receiver_id').val(chat_type);
            $('#chat_form').css('display', 'block');
            if (chat_type != 0) {
                $.ajax({
                    url: APP_URL + "/individual-conversation/" + chat_type,
                    type: "get",
                    dataType: 'json',
                    success: function (result) {
                        $('#individual_chat_body').empty();
                        let content = '';
                        $.each(result, function (i, message) {
                            content += '<div class="row mb-2">';
                            if (message.user.deleted_at == null) {
                                if ({{Auth::user()->id}} == message.user_id) {
                                    @if(Auth::user()->image == null)
                                        content += '<div class="col-2 mt-2 p-1 order-10">';
                                    content += '<span class="p-2 rounded-circle bg-info">';
                                    content += '{{ucfirst(isset(Auth::user()->first_name[0]) ? Auth::user()->first_name[0] : '') . ucfirst(isset(Auth::user()->last_name[0]) ? Auth::user()->last_name[0] : '')}}';
                                    content += '</span>';
                                    content += '</div>';
                                    @else
                                        content += '<div class="col-2 p-1 order-10">';
                                    content += '<img width="40" height="40" class="rounded-circle"';
                                    content += 'src="' + APP_URL + '/storage{{ Auth::user()->image }}"/>';
                                    content += '</div>';
                                    @endif
                                        content += '<div class="col-10 order-2" style="background: #eeeeee;border-radius: 10px; ">';
                                    content += '<p class="mb-0 pb-0">';
                                    content += '<span style="font-size: 14px;"><b>{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</b></span>';
                                } else {
                                    if (message.user.image == null) {
                                        content += '<div class="col-2 mt-2 p-1">';
                                        content += '<span class="p-2 rounded-circle bg-info">';
                                        content += (message.user.first_name).charAt(0) + (message.user.last_name).charAt(0);
                                        content += '</span>';
                                        content += '</div>';
                                    } else {
                                        content += '<div class="col-2 p-1">';
                                        content += '<img width="40" height="40" class="rounded-circle"';
                                        content += 'src="' + APP_URL + '/storage' + message.user.image + '"/>';
                                        content += '</div>';
                                    }
                                    content += '<div class="col-10" style="background: #eeeeee;border-radius: 10px; ">';
                                    content += '<p class="mb-0 pb-0">';
                                    content += '<span style="font-size: 14px;"><b>' + message.user.first_name + message.user.last_name + '</b></span>';
                                }
                            } else {
                                content += '<div class="col-2 mt-2 p-1">';
                                content += '<span class="p-2 rounded-circle bg-info">';
                                content += '<i class="fas fa-user-slash"></i>';
                                content += '</span>';
                                content += '</div>';
                                content += '<div class="col-10" style="background: #eeeeee;border-radius: 10px; ">';
                                content += '<p class="mb-0 pb-0">';
                                content += '<span style="font-size: 14px;"><b>{{ __('header.user_deleted') }}</b></span>';
                                $('#chat_form').css('display', 'none');
                            }
                            content += '<span class="text-lowercase" style="float:right;font-size: 14px;"><b>' + getTime(message.created_at) + '</b></span>';
                            content += '</p>';
                            content += '<p class="mb-0 pb-0 mt-0 pt-0" style="line-height: 20px;margin-top:5px;font-size: 12px;">';
                            if (message.message != null && message.message != '')
                                content += message.message;
                            if (message.document_id != null && message.document_id != '') {
                                let icon = '';
                                switch (message.document.type) {
                                    case 'docx':
                                        icon = '<i class="far fa-file-word" style="font-size: 50px;"></i>';
                                        break;
                                    case 'pdf' :
                                        icon = '<i class="far fa-file-pdf" style="font-size: 50px;"></i>';
                                        break;
                                    default :
                                        icon = '<i class="far fa-file" style="font-size: 50px;"></i>';
                                        break;
                                }

                                if (message.message != null && message.message != '')
                                    content += '<br>'
                                content += '<a href="' + APP_URL + '/storage' + message.document.file + '" class="btn btn-link bg-transparent text-dark p-1 mt-0 mb-0 0 ml-0 mr-0 w-auto appended_tooltip"';
                                content += ' target="_blank" rel="tooltip" title="' + message.document.name + '" data-original-title="' + message.document.name + '" >' + icon + '</a>'
                            }
                            content += '<p>';
                            content += '</div>';
                            content += '</div>';
                        });
                        $("#individual_chat_body").append(content);
                        $('#individual_chat_body').css('display', 'block');
                        $('#chat_body').css('display', 'none');
                        var messageBody = document.querySelector('#individual_chat_body');
                        messageBody.scrollTop = messageBody.scrollHeight - messageBody.clientHeight;
                    },
                    error: function (result) {
                        toastr.error(result.error);
                    }
                })
            } else {
                $('#individual_chat_body').css('display', 'none');
                $('#chat_body').css('display', 'block');
                var messageBody = document.querySelector('#chat_body');
                messageBody.scrollTop = messageBody.scrollHeight - messageBody.clientHeight;
            }
        });

        function getTime(date_time) {
            date_time = new Date(date_time);
            return date_time.toLocaleString('en-US', {hour: 'numeric', minute: 'numeric', hour12: true})
        }

        // Chat Js End
    </script>
    <script>
        // Document JS Start
        $(document).on('click', '.get_documents', function () {
            event.preventDefault();
            $('#documentModal').find('.doc_div').load($(this).attr('href'));
            $('.doc_div').animate({
                scrollTop: $(".doc_div").offset().top
            }, 2000);
        });

        $(document).on('click', '.important_document', function () {
            event.preventDefault();
            let id = $(this).data('id');
            $.ajax({
                url: APP_URL + '/important-document',
                type: "post",
                data: {'id': id, "_token": "{{ csrf_token() }}"},
                success: function (result) {
                    toastr.success(result.success);
                    $('.get_documents').removeClass('active');
                    $('.doc_imp_nav').addClass('active');
                    $('#documentModal').find('.doc_div').load(APP_URL + '/get-document/3/' + {{ $project->id }});
                },
                error: function () {
                    toastr.error('in error');
                }
            });
        });

        $(document).on('change', '#document_upload', function (e) {
            alert(123);
            event.preventDefault();
            let upload_file = this;
            let file = e.target.files;
            let form_data = new FormData();
            form_data.append('file', file[0]);
            form_data.append('project_id', '{{ $project->id }}');
            form_data.append('_token', '{{ csrf_token() }}');
            $.ajax({
                url: APP_URL + '/upload-document',
                type: "post",
                data: form_data,
                cache: false,
                contentType: false,
                processData: false,
                success: function (result) {
                    toastr.success(result.success);
                    $('.get_documents').removeClass('active');
                    $('.doc_all_nav').addClass('active');
                    $('#documentModal').find('.doc_div').load(APP_URL + '/get-document/all/' + {{ $project->id }});
                },
                error: function () {
                    toastr.error('in error');
                }
            });
        });
        // Document JS End
    </script>
@endsection
