@extends('layouts.user')

@section('title', $project->name)

@section('style')
    <link rel="stylesheet" type="text/css" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/cupertino/jquery-ui.css"/>
    <style>
        .modal-xxl {
            max-width: 80%;
        }

        .vide_mirror_name {

            color: #ffffff;
            position: relative;
            background: #00000088;
            bottom: 3vh;
            padding: 2px;
            border-radius: 6px;
        }

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
            /*width: 95px;*/
            width: auto;
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

        /*.nav-pills.nav-pills-warning .nav-item .nav-link.active, .nav-pills.nav-pills-warning .nav-item .nav-link.active:focus, .nav-pills.nav-pills-warning .nav-item .nav-link.active:hover {*/
        /*    background-color: #36baaf;*/
        /*    box-shadow: 0 4px 20px 0px rgb(0 0 0 / 14%), 0 7px 10px -5px rgb(255 152 0 / 40%);*/
        /*    color: #fff;*/
        /*}*/

        @media (min-width: 1200px) {
            #shareScreenModal .modal-xl {
                max-width: 1050px !important;
            }

            #completedTaskModal .modal-lg {
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
            padding: 0px 50px;
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
            /*max-height: 21vh;*/
        }

        .MultiCarousel .MultiCarousel-inner .item > div {
            text-align: center;
            /*padding: 5px;*/
            margin: 1px 2px;
            background: #000000;
            color: #ffffff;
            height: 21vh;
            min-height: 21vh;
        }

        .MultiCarousel .leftLst, .MultiCarousel .rightLst {
            position: absolute;
            border-radius: 50%;
            top: calc(50% - 23px);
            padding: 7px 7px;
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
            /*padding: 5px;*/
            margin: 1px;
            background: #000000;
            color: #ffffff;
            height: 32.7vh;
            min-height: 32.7vh;
        }
    </style>
@endsection

@section('right-panel')
    <div class="card m-0 table-responsive h-100">
        <div class="card-body mt-0 pb-1 pt-0 pl-2 pr-2">
            <div id="right_panel" role="tablist">
                <div class="accordion">
                    <div class="accordion-item border-0">
                        <h2 class="accordion-header text-center mt-0" role="tab" id="method_o_heading">
                            <button href="javascript:void(0)" data-bs-toggle="collapse" class="btn btn-{{ $theme }} btn-block mt-2" data-bs-target="#method_o_div" aria-controls="method_o_div" aria-expanded="false"
                                    aria-controls="panelsStayOpen-collapsemethod">
                                {{ __('header.method_o') }}
                            </button>
                        </h2>

                        <div id="method_o_div" class="accordion-collapse collapse" role="tabpanel" data-parent="#right_panel" aria-labelledby="method_o_heading">
                            <div class="accordion-body border">
                                <div class="p-2 text-left ">
                                    <div class="r justify-content-center">
                                        <div class="col-md-9">
                                            <p class="mb-1">
                                                <a href="{{ route('method_o', [$project->id, 1]) }}" class="text-dark method_o"> {{ __('header.initial_project_meeting') }} </a>
                                            </p>
                                            <p class="mb-1">
                                                <a href="{{ route('method_o', [$project->id, 2]) }}" class="text-dark method_o"> {{ __('header.work_rules') }} </a>
                                            </p>
                                            <p class="mb-1">
                                                <a href="{{ route('method_o', [$project->id, 3]) }}" class="text-dark method_o"> {{ __('header.description_of_meeting') }} </a>
                                            </p>
                                            <p class="mb-1">
                                                <a href="{{ route('method_o', [$project->id, 4]) }}" class="text-dark method_o"> {{ __('header.platform_roles') }} </a>
                                            </p>
                                            <p class="mb-1">
                                                <a href="{{ route('method_o', [$project->id, 5]) }}" class="text-dark method_o"> {{ __('header.boss_view') }} </a>
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
                            <button href="javascript:void(0)" data-bs-toggle="collapse" class="btn btn-{{ $theme }} btn-block text-center  mt-0" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="true"
                                    aria-controls="panelsStayOpen-collapseFive">
                                {{ __('header.project_notes') }}
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse table-responsive" role="tabpanel" data-parent="#right_panel" aria-labelledby="panelsStayOpen-headingFive" style="max-height: 30vh;">
                            <div class="accordion-body border">
                                <div class="p-2 text-left" style="border-top: 1px solid #f0f0f0;">
                                    <p class="mb-1 ">
                                        <select class="selectpicker col-10 task_note_finder" data-size="7" data-style="select-with-transition" data-container="body" title="{{ __('header.select_task') }}">
                                            @foreach($project->task as $task)
                                                <option value="{{ $task->id }}"> {{ $task->name }} </option>
                                            @endforeach
                                        </select>
                                        <a href="javascript:;" class="text-dark pull-right mt-2 open_modal" data-modal-id="#taskNotesModal"><i class="fa fa-plus"></i></a>
                                    </p>
                                    <div class="task_note_div">
                                        @foreach($project->task as $task)
                                            @foreach($task->taskNote as $note)
                                                <div class="card p-0 m-0 mb-2 task_note task_note_{{$task->id}}" hidden>
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
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <div class="accordion mb-5" id="accordionPanelsStayOpenExample2">
                <div class="accordion-item border-0">
                    <h2 class="accordion-header text-center " id="panelsStayOpen-headingdoc">
                        <a href="{{ route('get-document', ['all' , $project->id]) }}" class="btn btn-{{ $theme }} btn-block text-center mt-0 get_documents" data-toggle="modal" data-target="#documentModal">
                            {{ __('header.documents') }}
                        </a>
                    </h2>
                </div>
            </div>
            <div class="col-12 text-center position-absolute bottom-0" style="left: 0">
                <button class="btn btn-{{ $theme }} p-2 pull-left" onclick="openChat()" style="width: 40%"><i class="material-icons">chat</i> {{ __('header.chat') }}</button>
                <button class="btn btn-{{ $theme }} p-2 pull-right" onclick="openBinance()" style="width: 40%"><i class="material-icons">textsms</i> {{ __('header.binnacle') }}</button>
            </div>
        </div>
    </div>
@endsection

@section('content')

    @include('backend.user.project.task.add')@include('backend.user.project.task.completed')@include('backend.user.project.extras.video-control')@include('backend.user.project.extras.add-task-notes')@include('backend.user.project.document.index')@include('backend.user.project.extras.share-screen')@include('backend.user.project.calendar.create')@include('backend.user.project.chat.index')

    <div class="content">
        <div class="container-fluid">
            <div class="tab-content tab-space mt-4">
                <div class="tab-pane active show" id="link1">
                    <div class="row">
                        <div class="col-12 ">

                            <div class="MultiCarousel" data-items="1,3,5,6" data-slide="5" id="MultiCarousel" data-interval="1000">
                                <div class="MultiCarousel-inner">
                                    <div class="item">
                                        <div id="" class="vide_mirror div{{$project->project_leader}} rounded" data-user-name="{{$project->projectLeader->first_name . ' ' . $project->projectLeader->last_name}}"></div>
                                        <a href="javascript:void(0)" class="vide_mirror_name">
                                            {{ $project->projectLeader->first_name . ' ' . $project->projectLeader->last_name }}
                                        </a>
                                    </div>
                                    @foreach($project->projectUser as $user)
                                        @if($user->user->deleted_at == null)
                                            <div class="item">
                                                <div id="" class="vide_mirror div{{$user->user->id}} rounded" data-user-name="{{ $user->user->first_name . ' ' . $user->user->last_name }}"></div>
                                                <a href="javascript:void(0)" class="vide_mirror_name">
                                                    {{ $user->user->first_name . ' ' . $user->user->last_name }}
                                                </a>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                <button class="btn btn-{{ $theme }} leftLst" id="new-blue-bg">
                                    <span class="material-icons m-0">arrow_back</span>
                                </button>
                                <button class="btn btn-{{ $theme }} rightLst" id="new-blue-bg">
                                    <span class="material-icons m-0">arrow_forward</span>
                                </button>
                            </div>

                        </div>

                        <div class="col-md-9 pr-md-1">

                            <div class="row">

                                <div class="col-12">

                                    <div class="card scroll-bar m-0" style="height:61vh;">
                                        <!-- <div class="card-header card-header-success card-header-icon">
                                            <div class="card-icon">
                                                <i class="material-icons"></i>
                                            </div>
                                            <h4 class="card-title"></h4>
                                        </div> -->
                                        <div class="card-body mb-0 pb-0 ">
                                            <div class="row">
                                                <div class="col-4 pl-2 pr-2">
                                                    <a href="javascript:void(0)" class="btn btn-{{ $theme }} btn-sm text-white open_modal" rel="tooltip" title="{{ __('header.add_new_task') }}" style=" margin-right: 20px;margin-top: 5px;"
                                                       data-modal-id="#addNewTaskModal"><i class="fa fa-plus mr-2" style="font-size:12px !important"></i> {{ __('header.add_new_task') }}
                                                    </a>
                                                </div>
                                                <div class="col-4 pl-2 pr-2 text-center">
                                                    <h4 class="m-0 font-weight-bold">{{ __('header.task_dashboard') }}</h4>
                                                </div>
                                                <div class="col-4 text-right pl-2 pr-2">
                                                    <select id="" class="task_filter" data-style="btn-{{ $theme }}" data-width="fit" data-title="{{ __('header.task_filter') }}">
                                                        <option value="all_tasks">{{ __('header.all_tasks') }}</option>
                                                        <option value="my_tasks">{{ __('header.my_tasks') }}</option>
                                                    </select>
                                                    <a href="javascript:void(0)" data-url="{{ route('project.show', $project->id) }}" class="project_details btn p-0 bg-transparent btn-link">
                                                        <i class="fas fa-info-circle text-warning cursor-pointer" rel="tooltip" title="{{ __('header.view_project_details') }}" style="font-size: 1.624vw;"></i>
                                                    </a>
                                                    <a class="btn btn-{{ $theme }} btn-sm text-white" data-toggle="modal" data-target="#completedTaskModal" role="tablist"> {{ __('header.completed_tasks') }} </a>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="card-body mt-0 pt-0 pb-0">
                                            <div class="tab-content tab-space">
                                                <div class="tab-pane active" id="link22">
                                                    <div class="row">
                                                        <div class="col-md-4 pl-2 pr-2">
                                                            <div class="card m-0">
                                                                <h5 class="task_header font-weight-bold p-2">
                                                                    {{ __('header.to_do') }}
                                                                </h5>
                                                                <div class="card-body scroll-bar p-0 " id="to_do_task_div" style="height:45vh;"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 pl-2 pr-2">
                                                            <div class="card m-0 ">
                                                                <h5 class="task_header font-weight-bold p-2">
                                                                    {{ __('header.in_progress') }}
                                                                </h5>
                                                                <div class="card-body scroll-bar p-0" id="in_progress_task_div" style="height:45vh;">
                                                                    @foreach($project->task as $task)
                                                                        @if($task->progress > 0 && $task->progress < 100 && $task->status == 'approved')
                                                                        @endif
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 pl-2 pr-2">
                                                            <div class="card m-0 ">
                                                                <h5 class="task_header font-weight-bold p-2">
                                                                    {{ __('header.review') }}
                                                                </h5>
                                                                <div class="card-body scroll-bar p-0" id="review_task_div" style="height:45vh;">
                                                                    @foreach($project->task as $task)
                                                                        @if($task->progress == 100 && $task->status == 'approved')
                                                                        @endif
                                                                    @endforeach
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
                        <div class="col-md-3 pl-md-1">
                            @yield('right-panel')
                        </div>
                    </div>
                </div>
                <div class="tab-pane " id="link2">
                    <div class="row mt-5">

                        <div class="col-md-9 pr-md-1">
                            <div class="card scroll-bar mb-0 mt-3" style="height:86vh;">
                                <!-- <div class="card-header card-header-success card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons"></i>
                                     </div>
                                    <h4 class="card-title"></h4>
                                         </div> -->
                                <div class="card-body ">

                                    <div class="row meeting_mode">
                                        <div class="col-md-4 col-sm-6 p-0 m-0 pl-1 pr-1 text-center">
                                            <div class="item rounded">
                                                <div id="" class="vide_mirror meeting_video div{{$project->project_leader}}" data-user-name="{{$project->projectLeader->first_name . ' ' . $project->projectLeader->last_name}}"></div>
                                            </div>
                                            <a href="javascript:void(0)" class="vide_mirror_name">
                                                {{ $project->projectLeader->first_name . ' ' . $project->projectLeader->last_name }}
                                            </a>
                                        </div>
                                        @foreach($project->projectUser as $user)
                                            @if($user->user->deleted_at == null)
                                                <div class="col-md-4 col-sm-6 p-0 m-0 pl-1 pr-1 text-center">
                                                    <div class="item rounded">
                                                        <div id="" class="vide_mirror div{{$user->user->id}}" data-user-name="{{ $user->user->first_name . ' ' . $user->user->last_name }}"></div>
                                                    </div>
                                                    <a href="javascript:void(0)" class="vide_mirror_name">
                                                        {{ $user->user->first_name . ' ' . $user->user->last_name }}
                                                    </a>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-3 mt-3 pl-md-1">
                            @yield('right-panel')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Method O Modal -->
        <div class="modal fade" id="methodOModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-xxl">
                <div class="modal-content"></div>
            </div>
        </div><!--  End Modal -->

        <!-- Task Details Modal -->
        <div class="modal fade" id="taskDetailsModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content"></div>
            </div>
        </div>
        <!--  End Modal -->

        <!-- Edit Task Notes Modal -->
        <div class="modal" id="editTaskNotesModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content"></div>
            </div>
        </div>
        <!--  End Modal -->

        <!-- Platform Information Modal -->
        <div class="modal text-transform-none" id="platformInformationModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="card card-signup card-plain">
                        <div class="modal-header card-header card-header-{{ $theme }} rounded" style="    width: 90%; left: 5%;">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-10">
                                        <h4 class="modal-title font-weight-bold">
                                            <span> {{__('header.platform_information')}} </span>
                                        </h4>
                                    </div>
                                    <div class="col-2  text-right">
                                        <a type="button" class="text-white pull-right" style="top:0" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="modal-body">
                        <div class="card mb-0 mt-0 pb-0 pt-0">
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="col-10">
                                        <h4 class="font-weight-bold">
                                            {{ __('header.what_is_method_o')  }}
                                        </h4>
                                        <p>
                                            {{ __('header.what_is_method_o_ans')  }}
                                        </p>

                                        <h4 class="font-weight-bold">
                                            {{ __('header.what_is_it_for')  }}
                                        </h4>
                                        <p>
                                            {{ __('header.what_is_it_for_ans')  }}
                                        </p>

                                        <h4 class="font-weight-bold">
                                            {{ __('header.how_is_it_different')  }}
                                        </h4>
                                        <p>
                                            {{ __('header.how_is_it_different_ans_1')  }}
                                            <br>
                                            {{ __('header.how_is_it_different_ans_2')  }}
                                        </p>

                                        <h4 class="font-weight-bold">
                                            {{ __('header.all_in_one')  }}
                                        </h4>
                                        <p>
                                            {{ __('header.all_in_one_ans')  }}
                                        </p>
                                        <ul>
                                            <li> {{ __('header.all_in_one_ans_1') }} </li>
                                            <li> {{ __('header.all_in_one_ans_2') }} </li>
                                            <li> {{ __('header.all_in_one_ans_3') }} </li>
                                            <li> {{ __('header.all_in_one_ans_4') }} </li>
                                        </ul>

                                        <h4 class="font-weight-bold">
                                            {{ __('header.some_tips')  }}
                                        </h4>
                                        <ul>
                                            <li> {{ __('header.some_tips_1') }} </li>
                                            <li> {{ __('header.some_tips_2') }} </li>
                                            <li> {{ __('header.some_tips_3') }} </li>
                                            <li> {{ __('header.some_tips_4') }} </li>
                                        </ul>

                                        <h4 class="font-weight-bold">
                                            {{ __('header.security_of_information')  }}
                                        </h4>
                                        <p>
                                            {{ __('header.security_of_information_ans_1')  }}
                                            <br>
                                            {{ __('header.security_of_information_ans_2')  }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer mb-0 mt-0 pb-0 pt-0">
                        <button type="button" class="btn btn-danger btn-link ml-auto mr-auto" data-dismiss="modal">
                            Close
                        </button>
                    </div>

                </div>
            </div>
        </div>
        <!--  End Modal -->

        {{-- Show Project Details Modal --}}
        <div class="modal fade" id="showProjectDetailModal" tab index="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content"></div>
            </div>
        </div>
        {{--  End Modal --}}
    </div>

@endsection

@section('script')
    <script src="//media.twiliocdn.com/sdk/js/video/v1/twilio-video.min.js"></script>
    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>--}}
    {{--    <script src="https://formbuilder.online/assets/js/form-builder.min.js"></script>--}}
    {{--    <script src="https://formbuilder.online/assets/js/form-render.min.js"></script>--}}
    <script>
        var task_id = null;
        $(document).ready(function () {

            var timer = null;
            loadTasks({{ $project->id }});
            $(".task_filter").selectpicker({
                style: "btn-{{ $theme }} btn-sm"
            });
            $(document).on('change', 'select.task_filter', function () {
                $('.other_tasks').removeAttr('hidden');
                if ($(this).val() == 'my_tasks')
                    $('.other_tasks').attr('hidden', true);
            });
            $(document).on('click', '.project_details', function () {
                $('.spinner-overlay').removeAttr('hidden');
                $('#showProjectDetailModal').find('.modal-content').load($(this).data('url'), function () {
                    $('#showProjectDetailModal').modal('show');
                    $('.spinner-overlay').attr('hidden', true);
                    // new PerfectScrollbar('.scroll-bar-appended');
                });
            });
            $(document).on('click', '.done_task, .complete_task, .approve_task', function (e) {
                e.preventDefault();
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
                        $('.spinner-overlay').removeAttr('hidden');
                        $.ajax({
                            url: $(this).attr('href'),
                            type: "get",
                            success: function (result) {
                                $('#taskDetailsModal').find('.modal-content').load(APP_URL + '/task/' + result.task_id, function () {
                                    loadTasks(result.project_id);
                                });
                            },
                            error: function (result) {
                                toastr.error(result.error);
                                $('.spinner-overlay').attr('hidden', true);
                            }
                        });
                    }
                });
            });
            $(document).on('change', 'select.task_note_finder', function () {
                $('.task_note').attr('hidden', true);
                $('.task_note_' + $(this).val()).removeAttr('hidden');
            });
            $(document).on('click', '.task_details', function (e) {
                e.preventDefault();
                task_id = $(this).data('id');
                $('.spinner-overlay').removeAttr('hidden');
                $('#editTaskNotesModal').modal('hide');
                $('#taskDetailsModal').find('.modal-content').load($(this).attr('href'), function () {
                    $('#taskDetailsModal').modal('show');
                    update_member_status();
                    $('.spinner-overlay').attr('hidden', true);
                });
            });
            $(document).on('click', '.method_o', function (e) {
                e.preventDefault();
                $('#methodOModal').find('.modal-content').load($(this).attr('href'), function () {
                    $('#methodOModal').modal('show');
                });
            });
            $(document).on('click', '.task_note_edit', function (e) {
                e.preventDefault();
                $('.spinner-overlay').removeAttr('hidden');
                $('#editTaskNotesModal').find('.modal-content').load($(this).attr('href'), function () {
                    $('#editTaskNotesModal').find('.selectpicker').selectpicker('refresh');
                    $('#editTaskNotesModal').modal('show');
                    $('.spinner-overlay').attr('hidden', true);
                });
            });
            $(document).on('click', 'a[data-task-note=delete]', function (e) {
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
                        $('.spinner-overlay').removeAttr('hidden');
                        $.post({
                            data: {
                                "_token": " {{ csrf_token()  }} ",
                            },
                            type: 'delete',
                            url: $this.attr('href')
                        }).done(function (data) {
                            toastr.success(data.success);
                            $('.task_note_div').load(APP_URL + '/task-note/load/' + data.project_id, function () {
                                $('#editTaskNotesModal').modal('hide');
                                $('.spinner-overlay').attr('hidden', true);
                            });
                        });
                    }
                });
            });
            $(document).on('click', '.add_action', function () {
                let count = $('#actions .added_action').length;
                if (count < 5) {
                    let content = '';
                    content += '<div class="added_action mb-3">';
                    content += '<div class="input-group">';
                    content += '<div class="input-group-prepend">';
                    content += '<span class="input-group-text action_counter"></span>';
                    content += '</div>';
                    content += '<input type="text" class="form-control text-capitalize" required name="action[]" placeholder="{{ __('header.add_action') }}">';
                    content += '<div class="input-group-append">';
                    content += '<span class="input-group-text" ><i class="fa fa-minus text-danger cursor-pointer remove_action"></i></span>';
                    content += '</div>';
                    content += '</div>';
                    {{--content += '<div class="input-group">';--}}
                        {{--content += '<div class="input-group-prepend pr-2">';--}}
                        {{--content += '<span class="input-group-text"></span>';--}}
                        {{--content += '</div>';--}}
                        {{--content += '<input type="text" class="form-control text-capitalize" name="action_notes[]" placeholder="{{ __('header.add_action_note') }}">';--}}
                        {{--content += '</div>';--}}
                        content += '</div>';
                    $('#actions').append(content);
                    actionCounter();
                }
            });
            $(document).on('click', '.remove_action', function () {
                $(this).closest('.added_action').remove();
                actionCounter();
            });
            $(document).on('submit', '#addNewTaskForm', function (e) {
                e.preventDefault();
                $('.spinner-overlay').removeAttr('hidden');
                $.ajax({
                    url: '{{ route('task.store') }}',
                    type: "post",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    success: function (result) {
                        $('#to_do_task_div').load('{{ route('task.load', [$project->id, 1]) }}', function () {
                            update_member_status();
                            $('#addNewTaskForm')[0].reset();
                            $('#addNewTaskModal').modal('hide');
                            $('.spinner-overlay').attr('hidden', true);
                        });
                    },
                    error: function (result) {
                        if (result.status == 422) { // when status code is 422, it's a validation issue
                            $.each(result.responseJSON.errors, function (i, error) {
                                toastr.error(error);
                            });
                        } else
                            toastr.error(result.error);
                        $('.spinner-overlay').attr('hidden', true);
                    }
                });
            });
            $(document).on('submit', '#taskNotesForm, #editTaskNotesForm', function (e) {
                e.preventDefault();
                $('.spinner-overlay').removeAttr('hidden');
                let url = $(this).data('action');
                let name = $(this).data('name');
                $.ajax({
                    url: url,
                    type: "post",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    success: function (result) {
                        toastr.success(result.success);
                        $('.task_note_div').load('{{ route('task-note.load', $project->id) }}', function () {
                            $('#' + name + 'Form')[0].reset();
                            $('#' + name + 'Modal').modal('hide');
                            $('.spinner-overlay').attr('hidden', true);
                        });
                    },
                    error: function (result) {
                        if (result.status == 422) { // when status code is 422, it's a validation issue
                            $.each(result.responseJSON.errors, function (i, error) {
                                toastr.error(error);
                            });
                        } else
                            toastr.error(result.error);
                        $('.spinner-overlay').attr('hidden', true);
                    }
                });
            });
            $(document).on('keyup', '.action_note', function () {
                let id = $(this).data('id');
                let note = $(this).val();
                clearTimeout(timer);
                timer = setTimeout(function () {
                    updateActionNote(id, note);
                }, 1000); //Waits for 1 seconds after last keypress to execute the above lines of code
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
                    }
                });
            });

            // Document JS Start
            $(document).on('click', '.get_documents', function (e) {
                e.preventDefault();
                $('.spinner-overlay').removeAttr('hidden');
                $('#documentModal').find('.doc_div').load($(this).attr('href'), function () {
                    $('.spinner-overlay').attr('hidden', true);
                });
                $('.doc_div').animate({
                    scrollTop: $(".doc_div").offset().top
                }, 2000);
            });
            $(document).on('click', '.important_document', function (e) {
                e.preventDefault();
                $('.spinner-overlay').removeAttr('hidden');
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
                        $('.spinner-overlay').attr('hidden', true);
                    },
                    error: function () {
                        toastr.error('in error');
                        $('.spinner-overlay').attr('hidden', true);
                    }
                });
            });
            $(document).on('click', '.delete_document', function (e) {
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
                        $('.spinner-overlay').removeAttr('hidden');
                        let id = $(this).data('id');
                        $.ajax({
                            url: APP_URL + '/delete-document',
                            type: "post",
                            data: {'id': id, "_token": "{{ csrf_token() }}"},
                            success: function (result) {
                                toastr.success(result.success);
                                $('#document_' + id).remove();
                                $('.spinner-overlay').attr('hidden', true);
                            },
                            error: function () {
                                toastr.error('in error');
                                $('.spinner-overlay').attr('hidden', true);
                            }
                        });
                    }
                });
            });
            $(document).on('change', '#document_upload', function (e) {
                e.preventDefault();
                $('.spinner-overlay').removeAttr('hidden');
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
                        $('.spinner-overlay').attr('hidden', true);
                    },
                    error: function () {
                        toastr.error('in error');
                        $('.spinner-overlay').attr('hidden', true);
                    }
                });
            });
            // Document JS End
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
            $('.date_picker,.time_picker').click(function () {
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
            $('.time_picker').datetimepicker({
                format: 'HH:mm',
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

            @php
                $days = 15;
                $today = strtotime(date('Y-m-d'));
                $end_date = strtotime($project->end_date);
                if($end_date > $today){
                    $secs = $end_date - $today;
                    $days = $secs / 86400;
                }
            @endphp
            @if ($days <= 14)
            let message = 'Project end date is ' + '{{ $project->end_date }}';
            toastr.warning(message);
            @endif
        });

        // Video Call JS Start
        var room;
        $(document).on('click', 'a.call_to_user', function (e) {
            e.preventDefault();
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
        $(document).on('click', 'a.leave_call', function () {
            room.on('disconnected', room => {
                participantDisconnected(room.localParticipant);
            });
            room.disconnect();
            $('.vide_mirror').html('');
            $('a.leave_call').each(function () {
                $(this).text('{{ __('header.join_call') }}').removeClass('leave_call').addClass('call_to_user');
            });
        });

        function participantConnected(participant) {
            console.log('Participant "%s" connected', participant.identity);
            $('a.call_to_user').each(function () {
                $(this).text('{{ __('header.leave_call') }}').removeClass('call_to_user').addClass('leave_call');
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
                video.setAttribute("style", "max-width: 100%; border-radius:5px;");
                // } else {
                //     video.setAttribute("style", "max-width: " + ($(video).parent().parent().width() - 40) + "px;");
                // }
            }
            var video1 = div.getElementsByTagName("video")[1];
            if (video1) {
                video1.classList.add("share_screen", "cursor-pointer");
            }
        }

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

        // mute mic
        function muteMic() {
            room.localParticipant.audioTracks.forEach((publication) => {
                if (publication.isEnabled) {
                    publication.disable();
                    $('.btnMic').html('<i class="fas fa-microphone-slash"></i>').attr('title', '{{ __('header.unmute_mic') }}').attr('data-original-title', '{{ __('header.unmute_mic') }}');
                } else {
                    publication.enable();
                    $('.btnMic').html('<i class="fas fa-microphone"></i>').attr('title', '{{ __('header.mute_mic') }}').attr('data-original-title', '{{ __('header.mute_mic') }}');
                }
            });
        }

        // unmute mic
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
                        $('.btnCam').html('<i class="fas fa-video-slash"></i>').attr('title', '{{ __('header.turn_on_camera') }}').attr('data-original-title', '{{ __('header.turn_on_camera') }}');
                    } else {
                        publication.enable();
                        $('.btnCam').html('<i class="fas fa-video"></i>').attr('title', '{{ __('header.turn_off_camera') }}').attr('data-original-title', '{{ __('header.turn_off_camera') }}');
                    }
                });
            }

        }

        // change volume
        function ChangeVolume() {
            $('audio,video').each(function () {
                $(this).volume = 0.0;
            });
            $(this).pause();
        }

        // screen share
        var screenTrack;
        let share_screen_div = null;

        function shareScreen() {
            event.preventDefault();
            if (!screenTrack) {
                navigator.mediaDevices.getDisplayMedia().then(stream => {
                    screenTrack = new Twilio.Video.LocalVideoTrack(stream.getTracks()[0]);
                    room.localParticipant.publishTrack(screenTrack);
                    screenTrack.mediaStreamTrack.onended = () => {
                        shareScreen()
                    };
                    $('.btnScreen').html('<i class="fas fa-slash text-white"></i>').attr('title', '{{ __('header.stop_sharing') }}').attr('data-original-title', '{{ __('header.stop_sharing') }}');
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
                $('.btnScreen').html('<i class="fab fa-slideshare"></i>').attr('title', '{{ __('header.share_screen') }}').attr('data-original-title', '{{ __('header.share_screen') }}');
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

        // group message event
        var channel1 = pusher.subscribe('groups.{{ $project->id }}');
        channel1.bind('GroupMessage', function (data) {
            let content = '';
            content += '<div class="row mb-2">';
            if ({{Auth::user()->id}} == data.group_conversation.user_id) {
                @if(Auth::user()->image == null)
                    content += '<div class="col-2 mt-2 p-1 order-10">';
                content += '<span class="p-2 rounded-circle bg-{{ $theme }} text-white">';
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
                    content += '<span class="p-2 rounded-circle bg-{{ $theme }} text-white">';
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
        var channel2 = pusher.subscribe('receiver.{{Auth::user()->id}}');
        channel2.bind('IndividualMessage', function (data) {
            let content = '';
            content += '<div class="row mb-2">';
            if ({{Auth::user()->id}} == data.individual_conversation.user_id) {
                @if(Auth::user()->image == null)
                    content += '<div class="col-2 mt-2 p-1 order-10">';
                content += '<span class="p-2 rounded-circle bg-{{ $theme }} text-white">';
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
                    content += '<span class="p-2 rounded-circle bg-{{ $theme }} text-white">';
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
        var channel3 = pusher.subscribe('screen-shared.{{Auth::user()->id}}');
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
                                    content += '<span class="p-2 rounded-circle bg-{{ $theme }} text-white">';
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
                                        content += '<span class="p-2 rounded-circle bg-{{ $theme }} text-white">';
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
                                content += '<span class="p-2 rounded-circle bg-{{ $theme }} text-white">';
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
                                if (message.document.deleted_at == null) {
                                    content += '<a href="' + APP_URL + '/storage' + message.document.file + '" class="btn btn-link bg-transparent text-dark p-1 mt-0 mb-0 0 ml-0 mr-0 w-auto appended_tooltip"';
                                    content += ' target="_blank" rel="tooltip" title="' + message.document.name + '" data-original-title="' + message.document.name + '" >' + icon + '</a>'
                                } else {
                                    content += '{{ __('header.file_deleted') }}';
                                }
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

        channel.bind('TaskActionEvent', function (data) {
            if (data.task.project_id == {{ $project->id }}) {
                if (task_id == data.task.id)
                    $('#taskDetailsModal').find('.modal-content').load(APP_URL + '/task/' + data.task.id, function () {
                        loadTasks(data.task.project_id);
                    });
                else
                    loadTasks(data.task.project_id);
            }
        });
        channel.bind('LoadTask', function (data) {
            if (data.task.project_id == {{ $project->id }})
                loadTasks({{ $project->id }});
        });
        channel.bind('TaskNoteEvent', function (data) {
            if (data.project.id == {{ $project->id }}) {
                $('.spinner-overlay').removeAttr('hidden');
                $('.task_note_div').load(APP_URL + '/task-note/load/' + data.project.id, function () {
                    $('.spinner-overlay').attr('hidden', true);
                });
            }
        });
        channel.bind('TaskActionNoteEvent', function (data) {
            if (data.task.project_id == {{ $project->id }}) {
                if (task_id == data.task.id)
                    $('#taskDetailsModal').find('.modal-content').load(APP_URL + '/task/' + data.task.id,);
            }
        });

        function loadTasks() {
            $('.spinner-overlay').removeAttr('hidden');
            $('#to_do_task_div').load('{{ route('task.load', [$project->id, 1]) }}', function () {
                $('#in_progress_task_div').load('{{ route('task.load', [$project->id, 2]) }}', function () {
                    $('#review_task_div').load('{{ route('task.load', [$project->id, 3]) }}', function () {
                        $('#complete_task_div').load('{{ route('task.load', [$project->id, 4]) }}', function () {
                            update_member_status();
                            $('.spinner-overlay').attr('hidden', true);
                        });
                    });
                });
            });
        }

        function actionCounter() {
            $('.added_action').each(function (i) {
                $(this).closest('.added_action').find('.action_counter').text(i + 1);
            });
        }

        function updateActionNote(id, note) {
            $.ajax({
                url: APP_URL + '/task-action/' + id,
                type: "PUT",
                data: {'note': note, "_token": "{{ csrf_token() }}"},
                success: function (result) {
                },
                error: function () {
                    toastr.error('in error');
                }
            });
        }
    </script>
@endsection
