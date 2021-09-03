@extends('layouts.app')

@section('title', 'Test')

@section('style')

    <style>

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
        &:hover {
             cursor: pointer;
         }
        &.active img {
             opacity: 1;
         }
        }

        img {
            height: 150px;
            margin-left: auto;
            margin-right: auto;
            display: block;
            opacity: .5;

        &:hover {
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
        @media (min-width: 1200px){
            #xlcustom .modal-xl {
                max-width: 1050px !important;
                left: 130px;
                top:170px
            }
        }
        @media (min-width: 1200px){
            #myModal6  .modal-xl {
                max-width: 1050px !important;
                left: 130px;
                top:170px
            }
        }
        @media (min-width: 1200px){
            #myModal2 .modal-xl {
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
            bottom: 0;
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
    </style>
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
                                    <!-- <div class="card-header card-header-success card-header-icon">
                                        <div class="card-icon">
                                            <i class="material-icons"></i>
                                        </div>
                                        <h4 class="card-title"></h4>
                                    </div> -->
                                    <div class="card-body ">

                                        <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel" data-interval="false">
                                            <div class="carousel-inner">
                                                <!-- <div class="carousel-item active">
                                                  <img class="d-block" src="https://s14.postimg.cc/bnwpgsqnl/pixel1.png" alt="First slide">
                                                </div> -->
                                                <div class="carousel-item">
                                                    <img class="d-block" src="{{ asset('assets/img/black.png') }}" width="150" height="125" alt="Second slide">
                                                    <p class="mb-0 pb-0 text-center">Lorem</p>

                                                </div>
                                                <div class="carousel-item">
                                                    <img class="d-block" src="{{ asset('assets/img/black.png') }}" width="150" height="125" alt="Third slide">
                                                    <p class="mb-0 pb-0 text-center">Lorem</p>

                                                </div>
                                                <div class="carousel-item">
                                                    <img class="d-block" src="{{ asset('assets/img/black.png') }}" width="150" height="125" alt="Fourth slide">
                                                    <p class="mb-0 pb-0 text-center">Lorem</p>

                                                </div>
                                                <div class="carousel-item">
                                                    <img class="d-block" src="{{ asset('assets/img/black.png') }}" width="150" height="125" alt="Fifth slide">
                                                    <p class="mb-0 pb-0 text-center">Lorem</p>

                                                </div>
                                            </div>
                                        </div>

                                        <!-- Main-Slider-Element ends -->
                                        <!-- Thumb-Slider-Element starts -->
                                        <div id="thumbSlider" class="carousel slide" data-interval="false">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <div class="row">
                                                        <div data-target="#myCarousel" data-slide-to="0" class="thumb col-sm-2 active">
                                                            <img src="{{ asset('assets/img/black.png') }}" width="150" height="125" alt="XZ">
                                                            <p class="mb-0 pb-0 text-center">Lorem</p>

                                                        </div>
                                                        <div data-target="#myCarousel" data-slide-to="1" class="thumb col-sm-2">
                                                            <img src="{{ asset('assets/img/black.png') }}" width="150" height="125" alt="XZ">
                                                            <p class="mb-0 pb-0 text-center">Lorem</p>

                                                        </div>
                                                        <div data-target="#myCarousel" data-slide-to="2" class="thumb col-sm-2">
                                                            <img src="{{ asset('assets/img/black.png') }}" width="150" height="125" alt="XZ">
                                                            <p class="mb-0 pb-0 text-center">Lorem</p>

                                                        </div>
                                                        <div data-target="#myCarousel" data-slide-to="0" class="thumb col-sm-2 active">
                                                            <img src="{{ asset('assets/img/black.png') }}" width="150" height="125" alt="XZ">
                                                            <p class="mb-0 pb-0 text-center">Lorem</p>

                                                        </div>
                                                        <div data-target="#myCarousel" data-slide-to="1" class="thumb col-sm-2">
                                                            <img src="{{ asset('assets/img/black.png') }}" width="150" height="125" alt="XZ">
                                                            <p class="mb-0 pb-0 text-center">Lorem</p>

                                                        </div>
                                                        <div data-target="#myCarousel" data-slide-to="2" class="thumb col-sm-2">
                                                            <img src="{{ asset('assets/img/black.png') }}" width="150" height="125" alt="XZ">
                                                            <p class="mb-0 pb-0 text-center">Lorem</p>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="carousel-item">
                                                    <div class="row">
                                                        <div data-target="#myCarousel" data-slide-to="3" class="thumb col-sm-2">
                                                            <img src="{{ asset('assets/img/black.png') }}" width="150" height="125" alt="XZ">
                                                            <p class="mb-0 pb-0 text-center">Lorem</p>
                                                        </div>
                                                        <div data-target="#myCarousel" data-slide-to="4" class="thumb col-sm-2">
                                                            <img src="{{ asset('assets/img/black.png') }}" width="150" height="125" alt="XZ">
                                                            <p class="mb-0 pb-0 text-center">Lorem</p>
                                                        </div>
                                                        <div data-target="#myCarousel" data-slide-to="5" class="thumb col-sm-2">
                                                            <img src="{{ asset('assets/img/black.png') }}" width="150" height="125" alt="XZ">
                                                            <p class="mb-0 pb-0 text-center">Lorem</p>
                                                        </div>
                                                        <div data-target="#myCarousel" data-slide-to="3" class="thumb col-sm-2">
                                                            <img src="{{ asset('assets/img/black.png') }}" width="150" height="125" alt="XZ">
                                                            <p class="mb-0 pb-0 text-center">Lorem</p>
                                                        </div>
                                                        <div data-target="#myCarousel" data-slide-to="4" class="thumb col-sm-2">
                                                            <img src="{{ asset('assets/img/black.png') }}" width="150" height="125" alt="XZ">
                                                            <p class="mb-0 pb-0 text-center">Lorem</p>
                                                        </div>
                                                        <div data-target="#myCarousel" data-slide-to="5" class="thumb col-sm-2">
                                                            <img src="{{ asset('assets/img/black.png') }}" width="150" height="125" alt="XZ">
                                                            <p class="mb-0 pb-0 text-center">Lorem</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a class="carousel-control-prev" href="#thumbSlider" role="button" data-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#thumbSlider" role="button" data-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </div>

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
                                                                <a href="javascript:void(0)" class="text-dark" title="Add New Task" style=" margin-right: 20px;margin-top: 5px;" data-toggle="modal" data-target="#addNewTaskModal">
                                                                    <i class="fa fa-plus" style="padding:0px !important;margin-top: 6px;font-size:12px !important"></i>
                                                                </a>
                                                            </li>
                                                            <li class="nav-item" style="line-height:0px">
                                                                <a class="nav-link active" style="padding: 5px !important; border-radius: 5px !important;" data-toggle="tab" href="#link22" role="tablist">
                                                                    Projects
                                                                </a>
                                                            </li>
                                                            <li class="nav-item" style="line-height:0px">
                                                                <a class="nav-link" style="padding: 5px !important; border-radius: 5px !important;" data-toggle="tab" href="#link22" role="tablist">
                                                                    My Tasks
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-3 text-right">
                                                        <a class="nav-link text-dark btn" style="padding:0px !important;background: #36baaf;color: white !important;box-shadow: none;" data-toggle="modal" data-target=".bd-example-modal-xl" role="tablist">
                                                            Completed Tasks
                                                        </a>
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
                                                                            <h2 class="accordion-header"
                                                                                id="panelsStayOpen-headingOne">
                                                                                <button class="accordion-button" type="button"
                                                                                        data-bs-toggle="collapse"
                                                                                        data-bs-target=""
                                                                                        aria-expanded="true"
                                                                                        aria-controls="panelsStayOpen-collapseOne">
                                                                                    To Perform
                                                                                </button>
                                                                            </h2>
                                                                            <div id="panelsStayOpen-collapseOne"
                                                                                 class="accordion-collapse collapse show"
                                                                                 aria-labelledby="panelsStayOpen-headingOne">
                                                                                <div class="accordion-body scroll-bar"
                                                                                     style="height:400px;">
                                                                                    <div class="bg-color p-2 rounded">
                                                                                        <!-- <h6 class="h6css" >Lorem</h6> -->
                                                                                        <div class="d-flex align-items-center justify-content-start flex-wrap mb-1" data-toggle="modal" data-target="#myModal6">
                                                                                            <span class="bg-light rounded mr-1 p-1 h6css" title="lorem"><b>Lorem</b></span>
                                                                                            <span class="bg-light rounded mr-1 p-1"><img width="15" src="{{ asset('assets/img/faces/avatar.jpg') }}" /></span>
                                                                                            <span class="bg-light rounded mr-1 p-1"><img width="15" src="{{ asset('assets/img/faces/avatar.jpg') }}" /></span>
                                                                                            <span class="bg-light rounded mr-1 p-1"><img width="15" src="{{ asset('assets/img/faces/avatar.jpg') }}" /></span>
                                                                                            <span class="bg-light rounded mr-1 p-1"><i class="fa fa-plus"></i></span>
                                                                                        </div>

                                                                                        <div class="card p-0 pt-1 m-0" style="border-radius: 0px;">
                                                                                            <div class="progress mb-1">
                                                                                                <div title="25%" class="progress-bar bg-success"
                                                                                                     role="progressbar"
                                                                                                     style="width: 25%"
                                                                                                     aria-valuenow="25"
                                                                                                     aria-valuemin="0"
                                                                                                     aria-valuemax="100">
                                                                                                </div>
                                                                                            </div>

                                                                                        </div>
                                                                                        <div class="d-flex align-items-center justify-content-between">
                                                                                            <span>Actions</span>
                                                                                            <span>0/1</span>
                                                                                            <span>
                                                                                                        <i class="fas fa-clock"></i>1 Semana
                                                                                                        left
                                                                                                    </span>
                                                                                            </p>
                                                                                        </div>


                                                                                    </div>
                                                                                    <div class="bg-color p-2 rounded">
                                                                                        <!-- <h6 class="h6css" >Lorem</h6> -->
                                                                                        <div class="d-flex align-items-center justify-content-start flex-wrap mb-1" data-toggle="modal" data-target="#myModal6">
                                                                                            <span class="bg-light rounded mr-1 p-1 h6css" title="lorem"><b>Lorem</b></span>
                                                                                            <span class="bg-light rounded mr-1 p-1"><img width="15" src="{{ asset('assets/img/faces/avatar.jpg') }}" /></span>
                                                                                            <span class="bg-light rounded mr-1 p-1"><img width="15" src="{{ asset('assets/img/faces/avatar.jpg') }}" /></span>
                                                                                            <span class="bg-light rounded mr-1 p-1"><img width="15" src="{{ asset('assets/img/faces/avatar.jpg') }}" /></span>
                                                                                            <span class="bg-light rounded mr-1 p-1"><i class="fa fa-plus"></i></span>
                                                                                        </div>

                                                                                        <div class="card p-0 pt-1 m-0" style="border-radius: 0px;">
                                                                                            <div class="progress mb-1">
                                                                                                <div title="25%" class="progress-bar bg-success"
                                                                                                     role="progressbar"
                                                                                                     style="width: 25%"
                                                                                                     aria-valuenow="25"
                                                                                                     aria-valuemin="0"
                                                                                                     aria-valuemax="100">
                                                                                                </div>
                                                                                            </div>

                                                                                        </div>
                                                                                        <div class="d-flex align-items-center justify-content-between">
                                                                                            <span>Actions</span>
                                                                                            <span>0/1</span>
                                                                                            <span>
                                                                                                        <i class="fas fa-clock"></i>1 Semana
                                                                                                        left
                                                                                                    </span>
                                                                                            </p>
                                                                                        </div>


                                                                                    </div>
                                                                                    <div class="bg-color p-2 rounded">
                                                                                        <!-- <h6 class="h6css" >Lorem</h6> -->
                                                                                        <div class="d-flex align-items-center justify-content-start flex-wrap mb-1" data-toggle="modal" data-target="#myModal6">
                                                                                            <span class="bg-light rounded mr-1 p-1 h6css" title="lorem"><b>Lorem</b></span>
                                                                                            <span class="bg-light rounded mr-1 p-1"><img width="15" src="{{ asset('assets/img/faces/avatar.jpg') }}" /></span>
                                                                                            <span class="bg-light rounded mr-1 p-1"><img width="15" src="{{ asset('assets/img/faces/avatar.jpg') }}" /></span>
                                                                                            <span class="bg-light rounded mr-1 p-1"><img width="15" src="{{ asset('assets/img/faces/avatar.jpg') }}" /></span>
                                                                                            <span class="bg-light rounded mr-1 p-1"><i class="fa fa-plus"></i></span>
                                                                                        </div>

                                                                                        <div class="card p-0 pt-1 m-0" style="border-radius: 0px;">
                                                                                            <div class="progress mb-1">
                                                                                                <div title="25%" class="progress-bar bg-success"
                                                                                                     role="progressbar"
                                                                                                     style="width: 25%"
                                                                                                     aria-valuenow="25"
                                                                                                     aria-valuemin="0"
                                                                                                     aria-valuemax="100">
                                                                                                </div>
                                                                                            </div>

                                                                                        </div>
                                                                                        <div class="d-flex align-items-center justify-content-between">
                                                                                            <span>Actions</span>
                                                                                            <span>0/1</span>
                                                                                            <span>
                                                                                                        <i class="fas fa-clock"></i>1 Semana
                                                                                                        left
                                                                                                    </span>
                                                                                            </p>
                                                                                        </div>


                                                                                    </div>

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
                                                                            <h2 class="accordion-header"
                                                                                id="panelsStayOpen-headingOne">
                                                                                <button class="accordion-button" type="button"
                                                                                        data-bs-toggle="collapse"
                                                                                        data-bs-target=""
                                                                                        aria-expanded="true"
                                                                                        aria-controls="panelsStayOpen-collapseOne">
                                                                                    In Progress
                                                                                </button>
                                                                            </h2>
                                                                            <div id="panelsStayOpen-collapseOne"
                                                                                 class="accordion-collapse collapse show"
                                                                                 aria-labelledby="panelsStayOpen-headingOne">
                                                                                <div class="accordion-body scroll-bar"
                                                                                     style="height:400px;">
                                                                                    <div class="bg-color p-2 rounded">
                                                                                        <!-- <h6 class="h6css" >Lorem</h6> -->
                                                                                        <div class="d-flex align-items-center justify-content-start flex-wrap mb-1" data-toggle="modal" data-target="#myModal6">
                                                                                            <span class="bg-light rounded mr-1 p-1 h6css" title="lorem"><b>Lorem</b></span>
                                                                                            <span class="bg-light rounded mr-1 p-1"><img width="15" src="{{ asset('assets/img/faces/avatar.jpg') }}" /></span>
                                                                                            <span class="bg-light rounded mr-1 p-1"><img width="15" src="{{ asset('assets/img/faces/avatar.jpg') }}" /></span>
                                                                                            <span class="bg-light rounded mr-1 p-1"><img width="15" src="{{ asset('assets/img/faces/avatar.jpg') }}" /></span>
                                                                                            <span class="bg-light rounded mr-1 p-1"><i class="fa fa-plus"></i></span>
                                                                                        </div>

                                                                                        <div class="card p-0 pt-1 m-0" style="border-radius: 0px;">
                                                                                            <div class="progress mb-1">
                                                                                                <div title="25%" class="progress-bar bg-success"
                                                                                                     role="progressbar"
                                                                                                     style="width: 25%"
                                                                                                     aria-valuenow="25"
                                                                                                     aria-valuemin="0"
                                                                                                     aria-valuemax="100">
                                                                                                </div>
                                                                                            </div>

                                                                                        </div>
                                                                                        <div class="d-flex align-items-center justify-content-between">
                                                                                            <span>Actions</span>
                                                                                            <span>0/1</span>
                                                                                            <span>
                                                                                                        <i class="fas fa-clock"></i>1 Semana
                                                                                                        left
                                                                                                    </span>
                                                                                            </p>
                                                                                        </div>


                                                                                    </div>
                                                                                    <div class="bg-color p-2 rounded">
                                                                                        <!-- <h6 class="h6css" >Lorem</h6> -->
                                                                                        <div class="d-flex align-items-center justify-content-start flex-wrap mb-1" data-toggle="modal" data-target="#myModal6">
                                                                                            <span class="bg-light rounded mr-1 p-1 h6css" title="lorem"><b>Lorem</b></span>
                                                                                            <span class="bg-light rounded mr-1 p-1"><img width="15" src="{{ asset('assets/img/faces/avatar.jpg') }}" /></span>
                                                                                            <span class="bg-light rounded mr-1 p-1"><img width="15" src="{{ asset('assets/img/faces/avatar.jpg') }}" /></span>
                                                                                            <span class="bg-light rounded mr-1 p-1"><img width="15" src="{{ asset('assets/img/faces/avatar.jpg') }}" /></span>
                                                                                            <span class="bg-light rounded mr-1 p-1"><i class="fa fa-plus"></i></span>
                                                                                        </div>

                                                                                        <div class="card p-0 pt-1 m-0" style="border-radius: 0px;">
                                                                                            <div class="progress mb-1">
                                                                                                <div title="25%" class="progress-bar bg-success"
                                                                                                     role="progressbar"
                                                                                                     style="width: 25%"
                                                                                                     aria-valuenow="25"
                                                                                                     aria-valuemin="0"
                                                                                                     aria-valuemax="100">
                                                                                                </div>
                                                                                            </div>

                                                                                        </div>
                                                                                        <div class="d-flex align-items-center justify-content-between">
                                                                                            <span>Actions</span>
                                                                                            <span>0/1</span>
                                                                                            <span>
                                                                                                        <i class="fas fa-clock"></i>1 Semana
                                                                                                        left
                                                                                                    </span>
                                                                                            </p>
                                                                                        </div>


                                                                                    </div>
                                                                                    <div class="bg-color p-2 rounded">
                                                                                        <!-- <h6 class="h6css" >Lorem</h6> -->
                                                                                        <div class="d-flex align-items-center justify-content-start flex-wrap mb-1" data-toggle="modal" data-target="#myModal6">
                                                                                            <span class="bg-light rounded mr-1 p-1 h6css" title="lorem"><b>Lorem</b></span>
                                                                                            <span class="bg-light rounded mr-1 p-1"><img width="15" src="{{ asset('assets/img/faces/avatar.jpg') }}" /></span>
                                                                                            <span class="bg-light rounded mr-1 p-1"><img width="15" src="{{ asset('assets/img/faces/avatar.jpg') }}" /></span>
                                                                                            <span class="bg-light rounded mr-1 p-1"><img width="15" src="{{ asset('assets/img/faces/avatar.jpg') }}" /></span>
                                                                                            <span class="bg-light rounded mr-1 p-1"><i class="fa fa-plus"></i></span>
                                                                                        </div>

                                                                                        <div class="card p-0 pt-1 m-0" style="border-radius: 0px;">
                                                                                            <div class="progress mb-1">
                                                                                                <div title="25%" class="progress-bar bg-success"
                                                                                                     role="progressbar"
                                                                                                     style="width: 25%"
                                                                                                     aria-valuenow="25"
                                                                                                     aria-valuemin="0"
                                                                                                     aria-valuemax="100">
                                                                                                </div>
                                                                                            </div>

                                                                                        </div>
                                                                                        <div class="d-flex align-items-center justify-content-between">
                                                                                            <span>Actions</span>
                                                                                            <span>0/1</span>
                                                                                            <span>
                                                                                                        <i class="fas fa-clock"></i>1 Semana
                                                                                                        left
                                                                                                    </span>
                                                                                            </p>
                                                                                        </div>


                                                                                    </div>


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
                                                                            <h2 class="accordion-header"
                                                                                id="panelsStayOpen-headingOne">
                                                                                <button class="accordion-button" type="button"
                                                                                        data-bs-toggle="collapse"
                                                                                        data-bs-target=""
                                                                                        aria-expanded="true"
                                                                                        aria-controls="panelsStayOpen-collapseOne">
                                                                                    Revision
                                                                                </button>
                                                                            </h2>
                                                                            <div id="panelsStayOpen-collapseOne"
                                                                                 class="accordion-collapse collapse show"
                                                                                 aria-labelledby="panelsStayOpen-headingOne">
                                                                                <div class="accordion-body scroll-bar"
                                                                                     style="height:400px;">
                                                                                    <div class="bg-color p-2 rounded">
                                                                                        <!-- <h6 class="h6css" >Lorem</h6> -->
                                                                                        <div class="d-flex align-items-center justify-content-start flex-wrap mb-1" data-toggle="modal" data-target="#myModal6">
                                                                                            <span class="bg-light rounded mr-1 p-1 h6css" title="lorem"><b>Lorem</b></span>
                                                                                            <span class="bg-light rounded mr-1 p-1"><img width="15" src="{{ asset('assets/img/faces/avatar.jpg') }}" /></span>
                                                                                            <span class="bg-light rounded mr-1 p-1"><img width="15" src="{{ asset('assets/img/faces/avatar.jpg') }}" /></span>
                                                                                            <span class="bg-light rounded mr-1 p-1"><img width="15" src="{{ asset('assets/img/faces/avatar.jpg') }}" /></span>
                                                                                            <span class="bg-light rounded mr-1 p-1"><i class="fa fa-plus"></i></span>
                                                                                        </div>

                                                                                        <div class="card p-0 pt-1 m-0" style="border-radius: 0px;">
                                                                                            <div class="progress mb-1">
                                                                                                <div title="25%" class="progress-bar bg-success"
                                                                                                     role="progressbar"
                                                                                                     style="width: 25%"
                                                                                                     aria-valuenow="25"
                                                                                                     aria-valuemin="0"
                                                                                                     aria-valuemax="100">
                                                                                                </div>
                                                                                            </div>

                                                                                        </div>
                                                                                        <div class="d-flex align-items-center justify-content-between">
                                                                                            <span>Actions</span>
                                                                                            <span>0/1</span>
                                                                                            <span>
                                                                                                        <i class="fas fa-clock"></i>1 Semana
                                                                                                        left
                                                                                                    </span>
                                                                                            </p>
                                                                                        </div>


                                                                                    </div>
                                                                                    <div class="bg-color p-2 rounded">
                                                                                        <!-- <h6 class="h6css" >Lorem</h6> -->
                                                                                        <div class="d-flex align-items-center justify-content-start flex-wrap mb-1" data-toggle="modal" data-target="#myModal6">
                                                                                            <span class="bg-light rounded mr-1 p-1 h6css" title="lorem"><b>Lorem</b></span>
                                                                                            <span class="bg-light rounded mr-1 p-1"><img width="15" src="{{ asset('assets/img/faces/avatar.jpg') }}" /></span>
                                                                                            <span class="bg-light rounded mr-1 p-1"><img width="15" src="{{ asset('assets/img/faces/avatar.jpg') }}" /></span>
                                                                                            <span class="bg-light rounded mr-1 p-1"><img width="15" src="{{ asset('assets/img/faces/avatar.jpg') }}" /></span>
                                                                                            <span class="bg-light rounded mr-1 p-1"><i class="fa fa-plus"></i></span>
                                                                                        </div>

                                                                                        <div class="card p-0 pt-1 m-0" style="border-radius: 0px;">
                                                                                            <div class="progress mb-1">
                                                                                                <div title="25%" class="progress-bar bg-success"
                                                                                                     role="progressbar"
                                                                                                     style="width: 25%"
                                                                                                     aria-valuenow="25"
                                                                                                     aria-valuemin="0"
                                                                                                     aria-valuemax="100">
                                                                                                </div>
                                                                                            </div>

                                                                                        </div>
                                                                                        <div class="d-flex align-items-center justify-content-between">
                                                                                            <span>Actions</span>
                                                                                            <span>0/1</span>
                                                                                            <span>
                                                                                                        <i class="fas fa-clock"></i>1 Semana
                                                                                                        left
                                                                                                    </span>
                                                                                            </p>
                                                                                        </div>


                                                                                    </div>
                                                                                    <div class="bg-color p-2 rounded">
                                                                                        <!-- <h6 class="h6css" >Lorem</h6> -->
                                                                                        <div class="d-flex align-items-center justify-content-start flex-wrap mb-1" data-toggle="modal" data-target="#myModal6">
                                                                                            <span class="bg-light rounded mr-1 p-1 h6css" title="lorem"><b>Lorem</b></span>
                                                                                            <span class="bg-light rounded mr-1 p-1"><img width="15" src="{{ asset('assets/img/faces/avatar.jpg') }}" /></span>
                                                                                            <span class="bg-light rounded mr-1 p-1"><img width="15" src="{{ asset('assets/img/faces/avatar.jpg') }}" /></span>
                                                                                            <span class="bg-light rounded mr-1 p-1"><img width="15" src="{{ asset('assets/img/faces/avatar.jpg') }}" /></span>
                                                                                            <span class="bg-light rounded mr-1 p-1"><i class="fa fa-plus"></i></span>
                                                                                        </div>

                                                                                        <div class="card p-0 pt-1 m-0" style="border-radius: 0px;">
                                                                                            <div class="progress mb-1">
                                                                                                <div title="25%" class="progress-bar bg-success"
                                                                                                     role="progressbar"
                                                                                                     style="width: 25%"
                                                                                                     aria-valuenow="25"
                                                                                                     aria-valuemin="0"
                                                                                                     aria-valuemax="100">
                                                                                                </div>
                                                                                            </div>

                                                                                        </div>
                                                                                        <div class="d-flex align-items-center justify-content-between">
                                                                                            <span>Actions</span>
                                                                                            <span>0/1</span>
                                                                                            <span>
                                                                                                        <i class="fas fa-clock"></i>1 Semana
                                                                                                        left
                                                                                                    </span>
                                                                                            </p>
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
                                                    <div class="tab-pane" id="link22">
                                                        Efficiently unleash cross-media information without
                                                        cross-media value. Quickly maximize timely deliverables
                                                        for real-time schemas.
                                                        <br />
                                                        <br />Dramatically maintain clicks-and-mortar solutions
                                                        without functional solutions.
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 p-1 ">
                                <div class="card mt-3 mb-0">
                                    <!-- <div class="col-md-3 ">
                                                <button class="btn btn-secondary " type="button">
                                                    Simultaneous Room
                                                </button>
                                            </div> -->
                                    <div class="card-body mt-0 pb-1 pt-0 pl-2 pr-2">
                                        <div class="accordion" id="accordionPanelsStayOpenExample1">
                                            <div class="accordion-item border-0">
                                                <h2 class="accordion-header text-center  mt-0" id="panelsStayOpen-headingFive">
                                                    <button href="javascript:void(0)" data-bs-toggle="collapse" class="btn btn-primary btn-block mt-2"
                                                            data-bs-target="#panelsStayOpen-collapsemethod" aria-expanded="true"
                                                            aria-controls="panelsStayOpen-collapsemethod">
                                                        Método Ö
                                                    </button>
                                                </h2>


                                                <div id="panelsStayOpen-collapsemethod" class="accordion-collapse  collapse"
                                                     aria-labelledby="panelsStayOpen-headingmethod">
                                                    <div class="accordion-body border">
                                                        <div class="p-2 text-left ">
                                                            <div class="row justify-content-center">
                                                                <div class="col-md-9">
                                                                    <p class="mb-1">
                                                                        <a href="javascript:vod(0);" class="text-dark" data-toggle="modal" data-target="#myModal">
                                                                            Initial
                                                                            Meeting
                                                                        </a>
                                                                    </p>
                                                                    <p class="mb-1">
                                                                        <a href="javascript:vod(0);" class="text-dark" data-toggle="modal" data-target="#myModal">
                                                                            Work
                                                                            Rules
                                                                        </a>
                                                                    </p>
                                                                    <p class="mb-1">
                                                                        <a href="javascript:vod(0);" class="text-dark" data-toggle="modal"
                                                                           data-target="#myModal">
                                                                            Description of
                                                                            Meetings
                                                                        </a>
                                                                    </p>
                                                                    <p class="mb-1">
                                                                        <a href="javascript:vod(0);" class="text-dark" data-toggle="modal"
                                                                           data-target="#myModal">Facilitator</a>
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
                                                    <button href="javascript:void(0)" data-bs-toggle="collapse" class="btn btn-primary btn-block text-center  mt-0"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="true"
                                                            aria-controls="panelsStayOpen-collapseFive">
                                                        Project Notes
                                                    </button>
                                                </h2>
                                                <div id="panelsStayOpen-collapseFive" class="accordion-collapse  collapse"
                                                     aria-labelledby="panelsStayOpen-headingFive">
                                                    <div class="accordion-body border">
                                                        <div class="p-2 text-left" style="border-top: 1px solid #f0f0f0;">
                                                            <p class="mb-1 ">
                                                                <select class="selectpicker col-10" data-size="7" data-style="select-with-transition" title="Select task">
                                                                    <option value="task2"> Task1 </option>
                                                                    <option value="task1"> Task2 </option>

                                                                </select>
                                                                <a href="javascript:vod(0);" class="text-dark pull-right mt-2" data-toggle="modal"
                                                                   data-target="#myModal3">
                                                                    <i class="fa fa-plus"></i>
                                                                </a>
                                                            </p>
                                                            <div class="card p-0 m-0">
                                                                <div class="card-body p-0 m-0 pl-3 pr-1">
                                                                    <span class="mb-0 pb-0">lorem lorem lorem</span><br>
                                                                    <span class="mb-0 pb-0"><small>12 12 2012  </small> </span>
                                                                </div>
                                                            </div>
                                                            <div class="card p-0 m-0 mt-1">
                                                                <div class="card-body p-0 m-0 pl-3 pr-1">
                                                                    <span class="mb-0 pb-0">lorem lorem lorem</span><br>
                                                                    <span class="mb-0 pb-0"><small>12 12 2012  </small> </span>
                                                                </div>
                                                            </div>
                                                            <div class="card p-0 m-0 mt-1">
                                                                <div class="card-body p-0 m-0 pl-3 pr-1">
                                                                    <span class="mb-0 pb-0">lorem lorem lorem</span><br>
                                                                    <span class="mb-0 pb-0"><small>12 12 2012  </small> </span>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                        <div class="accordion" id="accordionPanelsStayOpenExample2">
                                            <div class="accordion-item border-0">
                                                <h2 class="accordion-header text-center " id="panelsStayOpen-headingdoc">
                                                    <button href="javascript:void(0)" data-bs-toggle="collapse" class="btn btn-primary btn-block text-center mt-0"
                                                            data-bs-target="#panelsStayOpen-collapsedoc" aria-expanded="true"
                                                            aria-controls="panelsStayOpen-collapsedoc">
                                                        Documents
                                                    </button>
                                                </h2>
                                                <div id="panelsStayOpen-collapsedoc" class="accordion-collapse  collapse"
                                                     aria-labelledby="panelsStayOpen-headingdoc">
                                                    <div class="accordion-body border">
                                                        <div class="p-2 text-left" style="border-top: 1px solid #f0f0f0;">
                                                            <p class="mb-1 text-right">
                                                                <a href="javascript:vod(0);" class="text-dark" data-toggle="modal"
                                                                   data-target="#myModal2">
                                                                    <i class="fa fa-plus"></i>
                                                                </a>
                                                            </p>
                                                            <div class="card p-0 m-0">
                                                                <div class="card-body p-0 m-0 pl-3 pr-1">
                                                                    <span class="mb-0 pb-0">lorem lorem lorem</span><br>
                                                                    <span class="mb-0 pb-0"><small>12 12 2012  </small> </span>
                                                                </div>
                                                            </div>
                                                            <div class="card p-0 m-0 mt-1">
                                                                <div class="card-body p-0 m-0 pl-3 pr-1">
                                                                    <span class="mb-0 pb-0">lorem lorem lorem</span><br>
                                                                    <span class="mb-0 pb-0"><small>12 12 2012  </small> </span>
                                                                </div>
                                                            </div>
                                                            <div class="card p-0 m-0 mt-1">
                                                                <div class="card-body p-0 m-0 pl-3 pr-1">
                                                                    <span class="mb-0 pb-0">lorem lorem lorem</span><br>
                                                                    <span class="mb-0 pb-0"><small>12 12 2012  </small> </span>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                </div>
                                <div class="col-12 " style="position:fixed;top: 85vh;">
                                    <div class="row">
                                        <div class="col-12">
                                            <button class="btn btn-primary  btn-block mt-0 p-2" onclick="openForm()" style="width: 100px; top: 48px;">Chat</button>
                                            <button class="btn btn-primary btn-block mt-0 p-2" onclick="openForm1()" style="width: 100px; left: 135px;top: 10px;">Binnacle</button>
                                        </div>
                                    </div>
                                </div>
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

                                        <div class="row">
                                            <div class="col-md-4 col-sm-6 p-0 m-0 pl-1">
                                                <div class="item">
                                                    <img src="{{ asset('assets/img/black.png') }}" style="width:100%" alt="">
                                                    <p class="text-center mb-0">lorem</p>
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-sm-6 p-0 m-0 pl-1">
                                                <div class="item">
                                                    <img src="{{ asset('assets/img/black.png') }}" style="width:100%" alt="">
                                                    <p class="text-center mb-0">lorem</p>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-6 p-0 m-0 pl-1">
                                                <div class="item">
                                                    <img src="{{ asset('assets/img/black.png') }}" style="width:100%" alt="">
                                                    <p class="text-center mb-0">lorem</p>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-6 p-0 m-0 pl-1">
                                                <div class="item">
                                                    <img src="{{ asset('assets/img/black.png') }}" style="width:100%" alt="">
                                                    <p class="text-center mb-0">lorem</p>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-6 p-0 m-0 pl-1">
                                                <div class="item">
                                                    <img src="{{ asset('assets/img/black.png') }}" style="width:100%" alt="">
                                                    <p class="text-center mb-0">lorem</p>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-6 p-0 m-0 pl-1">
                                                <div class="item">
                                                    <img src="{{ asset('assets/img/black.png') }}" style="width:100%" alt="">
                                                    <p class="text-center mb-0">lorem</p>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-6 p-0 m-0 pl-1">
                                                <div class="item">
                                                    <img src="{{ asset('assets/img/black.png') }}" style="width:100%" alt="">
                                                    <p class="text-center mb-0">lorem</p>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-6 p-0 m-0 pl-1">
                                                <div class="item">
                                                    <img src="{{ asset('assets/img/black.png') }}" style="width:100%" alt="">
                                                    <p class="text-center mb-0">lorem</p>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-6 p-0 m-0 pl-1">
                                                <div class="item">
                                                    <img src="{{ asset('assets/img/black.png') }}" style="width:100%" alt="">
                                                    <p class="text-center mb-0">lorem</p>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-6 p-0 m-0 pl-1">
                                                <div class="item">
                                                    <img src="{{ asset('assets/img/black.png') }}" style="width:100%" alt="">
                                                    <p class="text-center mb-0">lorem</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-3  mt-1">
                                <div class="card mt-4 mb-0">
                                    <!-- <div class="col-md-3 ">
                                                <button class="btn btn-secondary " type="button">
                                                    Simultaneous Room
                                                </button>
                                            </div> -->
                                    <div class="card-body mt-0 pb-1 pt-0 pl-2 pr-2">
                                        <div class="accordion" id="accordionPanelsStayOpenExample1">
                                            <div class="accordion-item border-0">
                                                <h2 class="accordion-header text-center  mt-0" id="panelsStayOpen-headingFive">
                                                    <button href="javascript:void(0)" data-bs-toggle="collapse" class="btn btn-primary btn-block mt-2"
                                                            data-bs-target="#panelsStayOpen-collapsemethod" aria-expanded="true"
                                                            aria-controls="panelsStayOpen-collapsemethod">
                                                        Método Ö
                                                    </button>
                                                </h2>


                                                <div id="panelsStayOpen-collapsemethod" class="accordion-collapse  collapse"
                                                     aria-labelledby="panelsStayOpen-headingmethod">
                                                    <div class="accordion-body border">
                                                        <div class="p-2 text-left ">
                                                            <div class="row justify-content-center">
                                                                <div class="col-md-9">
                                                                    <p class="mb-1">
                                                                        <a href="javascript:vod(0);" class="text-dark" data-toggle="modal" data-target="#myModal">
                                                                            Initial
                                                                            Meeting
                                                                        </a>
                                                                    </p>
                                                                    <p class="mb-1">
                                                                        <a href="javascript:vod(0);" class="text-dark" data-toggle="modal" data-target="#myModal">
                                                                            Work
                                                                            Rules
                                                                        </a>
                                                                    </p>
                                                                    <p class="mb-1">
                                                                        <a href="javascript:vod(0);" class="text-dark" data-toggle="modal"
                                                                           data-target="#myModal">
                                                                            Description of
                                                                            Meetings
                                                                        </a>
                                                                    </p>
                                                                    <p class="mb-1">
                                                                        <a href="javascript:vod(0);" class="text-dark" data-toggle="modal"
                                                                           data-target="#myModal">Facilitator</a>
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
                                                    <button href="javascript:void(0)" data-bs-toggle="collapse" class="btn btn-primary btn-block text-center  mt-0"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="true"
                                                            aria-controls="panelsStayOpen-collapseFive">
                                                        Project Notes
                                                    </button>
                                                </h2>
                                                <div id="panelsStayOpen-collapseFive" class="accordion-collapse  collapse"
                                                     aria-labelledby="panelsStayOpen-headingFive">
                                                    <div class="accordion-body border">
                                                        <div class="p-2 text-left" style="border-top: 1px solid #f0f0f0;">
                                                            <p class="mb-1 ">
                                                                <select class="selectpicker col-10" data-size="7" data-style="select-with-transition" title="Select task">
                                                                    <option value="task2"> Task1 </option>
                                                                    <option value="task1"> Task2 </option>

                                                                </select>
                                                                <a href="javascript:vod(0);" class="text-dark pull-right mt-2" data-toggle="modal"
                                                                   data-target="#myModal3">
                                                                    <i class="fa fa-plus"></i>
                                                                </a>
                                                            </p>
                                                            <div class="card p-0 m-0">
                                                                <div class="card-body p-0 m-0 pl-3 pr-1">
                                                                    <span class="mb-0 pb-0">lorem lorem lorem</span><br>
                                                                    <span class="mb-0 pb-0"><small>12 12 2012  </small> </span>
                                                                </div>
                                                            </div>
                                                            <div class="card p-0 m-0 mt-1">
                                                                <div class="card-body p-0 m-0 pl-3 pr-1">
                                                                    <span class="mb-0 pb-0">lorem lorem lorem</span><br>
                                                                    <span class="mb-0 pb-0"><small>12 12 2012  </small> </span>
                                                                </div>
                                                            </div>
                                                            <div class="card p-0 m-0 mt-1">
                                                                <div class="card-body p-0 m-0 pl-3 pr-1">
                                                                    <span class="mb-0 pb-0">lorem lorem lorem</span><br>
                                                                    <span class="mb-0 pb-0"><small>12 12 2012  </small> </span>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                        <div class="accordion" id="accordionPanelsStayOpenExample2">
                                            <div class="accordion-item border-0">
                                                <h2 class="accordion-header text-center " id="panelsStayOpen-headingdoc">
                                                    <button href="javascript:void(0)" data-bs-toggle="collapse" class="btn btn-primary btn-block text-center mt-0"
                                                            data-bs-target="#panelsStayOpen-collapsedoc" aria-expanded="true"
                                                            aria-controls="panelsStayOpen-collapsedoc">
                                                        Documents
                                                    </button>
                                                </h2>
                                                <div id="panelsStayOpen-collapsedoc" class="accordion-collapse  collapse"
                                                     aria-labelledby="panelsStayOpen-headingdoc">
                                                    <div class="accordion-body border">
                                                        <div class="p-2 text-left" style="border-top: 1px solid #f0f0f0;">
                                                            <p class="mb-1 text-right">
                                                                <a href="javascript:vod(0);" class="text-dark" data-toggle="modal"
                                                                   data-target="#myModal2">
                                                                    <i class="fa fa-plus"></i>
                                                                </a>
                                                            </p>
                                                            <div class="card p-0 m-0">
                                                                <div class="card-body p-0 m-0 pl-3 pr-1">
                                                                    <span class="mb-0 pb-0">lorem lorem lorem</span><br>
                                                                    <span class="mb-0 pb-0"><small>12 12 2012  </small> </span>
                                                                </div>
                                                            </div>
                                                            <div class="card p-0 m-0 mt-1">
                                                                <div class="card-body p-0 m-0 pl-3 pr-1">
                                                                    <span class="mb-0 pb-0">lorem lorem lorem</span><br>
                                                                    <span class="mb-0 pb-0"><small>12 12 2012  </small> </span>
                                                                </div>
                                                            </div>
                                                            <div class="card p-0 m-0 mt-1">
                                                                <div class="card-body p-0 m-0 pl-3 pr-1">
                                                                    <span class="mb-0 pb-0">lorem lorem lorem</span><br>
                                                                    <span class="mb-0 pb-0"><small>12 12 2012  </small> </span>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                </div>

                                <div class="col-12 " style="position:fixed;top: 85vh;">
                                    <div class="row">
                                        <div class="col-12">
                                            <button class="btn btn-primary  btn-block mt-0 p-2" onclick="openForm()" style="width: 100px; top: 48px;">Chat</button>
                                            <button class="btn btn-primary btn-block mt-0 p-2" onclick="openForm1()" style="width: 100px; left: 135px;top: 10px;">Binnacle</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


                <!-- chat box -->

                <div class="chat-popup" id="myForm" style="border-radius:10px">
                    <form action="/action_page.php" class="form-container" style="height:58vh;border-radius:5px">
                        <div class="row">
                            <div class="col-8 text-right">
                                <h5><b>Chat Of The Project</b> </h5>
                            </div>
                            <div class="col-4 text-right">
                                <a href="javascript:void(0)" class="text-dark" onclick="closeForm()"><i class="fa fa-times"></i></a>
                            </div>
                        </div>
                        <div class="col-12">
                            <p style="border-radius: 5px; background: #eeeeee; padding-left: 5px; line-height: 20px;font-size: 12px;">Lorem lorem lorem lorem lorem lorem lorem lorem lorem<p>
                        </div>

                        <div class="box-footer" style="position: fixed;top: 90vh;width:290px;">
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
                                <h5><b>Binnacle Of The Project</b> </h5>
                            </div>
                            <div class="col-4 text-right">
                                <a href="javascript:void(0)" class="text-dark" onclick="closeForm1()"><i class="fa fa-times"></i></a>
                            </div>
                        </div>
                        <div class="col-12">
                            <p style="border-radius: 5px; background: #eeeeee; padding-left: 5px; line-height: 20px;font-size: 12px;">Lorem lorem lorem lorem lorem lorem lorem lorem lorem<p>
                        </div>

                        <div class="box-footer" style="position: fixed;top: 90vh;width:290px;">
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
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="card card-signup card-plain">
                                <div class="modal-header card-header card-header-primary" style="    width: 90%; left: 5%;">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-10">
                                                <h4 class="modal-title">
                                                    <span>Lorem Lorem Lorem</span>
                                                    <a href="{{ url('metodo') }}" class="close text-white pull-right" style="top:0" aria-hidden="true">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div class="col-2  text-right">
                                                <a type="button" class="close text-white pull-right" style="top:0" data-dismiss="modal" aria-hidden="true">
                                                    <i class="material-icons">clear</i>
                                                </a>

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
                                                                    <input class="form-check-input" type="checkbox" value=""> Lorem
                                                                    <span class="form-check-sign">
                                                                                <span class="check"></span>
                                                                            </span>
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input" type="checkbox" value=""> Lorem
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
                                                            <img class="pre-img" src="https://metodoo.com/public/storage/assets/images/project/pre_files/RPOinmykznl1ivKa2hzJ2WQ1rR94E204cFn6Zqqo.jpg" height="100" alt="diagrama-estrategia-social-media.jpeg">

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
                                <button type="button" class="btn btn-danger btn-link"
                                        data-dismiss="modal">
                                    Close
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--  End Modal -->
            <!-- Work Rules Modal -->
            <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">
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
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, atque.
                            </p>

                        </div>
                        <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-link">Nice Button</button> -->
                            <button type="button" class="btn btn-danger btn-link"
                                    data-dismiss="modal">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!--  End Modal -->
            <!-- Meetings Description Rules Modal -->
            <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content m-0 p-0">
                        <div class="modal-header">
                            <h4 class="modal-title">Lorem Lorem Lorem</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                <i class="material-icons">clear</i>
                            </button>
                        </div>
                        <div class="modal-body mb-0 pb-0 ">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card scroll-bar mb-0 pb-0" style="height:65vh">
                                        <div class="text-center card-header">
                                            <button class="btn btn-info">Upload Files</button>
                                        </div>
                                        <div class="card-body">
                                            <ul class="nav nav-pills nav-pills-rose nav-pills-icons flex-column" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-toggle="tab" href="#link110" role="tablist">
                                                        <i class="material-icons">dashboard</i> All Documents
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#link111" role="tablist">
                                                        <i class="material-icons">schedule</i> Important
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link " data-toggle="tab" href="#link112" role="tablist">
                                                        <i class="material-icons">dashboard</i> Recent
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#link113" role="tablist">
                                                        <i class="material-icons">schedule</i> Documents Received
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link " data-toggle="tab" href="#link114" role="tablist">
                                                        <i class="material-icons">dashboard</i> Documents Sent
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#link115" role="tablist">
                                                        <i class="material-icons">schedule</i> Documents
                                                    </a>
                                                </li>
                                            </ul>
                                            <!-- <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <i class="fas mr-2   fa-folder">
                                                            </i> All Documents
                                                        </td>
                                                        <td>45</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <i class="fas mr-2   fa-star">
                                                            </i>Important
                                                        </td>
                                                        <td>02</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <i class="fas mr-2   fa-download">
                                                            </i>Recent
                                                        </td>
                                                        <td>02</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <i class="fas mr-2   fa-download">
                                                            </i>Documents Received
                                                        </td>
                                                        <td>02</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <i class="fas mr-2   fa-share">
                                                            </i>Documents Sent
                                                        </td>
                                                        <td>02</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Documents </td>
                                                    </tr>
                                                </tbody>
                                            </table> -->
                                            <!-- <p class="mb-0 mt-10">
                                                <i class="fas fa-database mr-2">
                                                    </i>19.5GB used of 25GB</p> -->
                                            <!-- <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">
                                                    </div>
                                                </div> -->
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-9">
                                    <div class="card scroll-bar mb-0 pb-0" style="height:63vh">
                                        <div class="card-header">
                                            <nav aria-label="breadcrumb">
                                                <ol class="breadcrumb">
                                                    <li class="breadcrumb-item"><a href="#">lorem</a></li>
                                                    <li class="breadcrumb-item"><a href="#">lorem</a></li>
                                                    <li class="breadcrumb-item active" aria-current="page">lorem</li>
                                                </ol>
                                            </nav>
                                            <div class="row ">

                                                <div class="col-sm-6">
                                                    <select class="selectpicker" data-size="7" data-style="select-with-transition" title="Add">
                                                        <option value="Name"> Name </option>
                                                        <option value="Size"> Size </option>

                                                    </select>

                                                </div>
                                                <div class="col-sm-6">
                                                    <form class="form-horizontal full-right">
                                                        <div class="form-group">
                                                            <input placeholder="Search..." type="text" class="form-control ">
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body mt-0 pt-0">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="shadow card">
                                                        <div class="text-center card-body">
                                                            <i class="fas fa-file-pdf text-danger fa-3x">
                                                            </i>
                                                        </div>
                                                        <div class="card-footer">
                                                            <hr>
                                                            <div class="d-flex align-items-center justify-content-between">
                                                                <p>Document Name</p>
                                                                <div class="dropdown ">
                                                                    <button class=" bg-transparent text-dark hover-0 btn btn-" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                                        <i class="fas fa-ellipsis-v">
                                                                        </i>
                                                                        <div class="ripple-container"></div>
                                                                    </button>
                                                                    <div class="dropdown-menu " aria-labelledby="dropdownMenuButton" x-placement="top-start" style="position: absolute; top: -228px; left: 1px; will-change: top, left;" x-out-of-boundaries="">
                                                                        <h6 class="dropdown-item">View Details</h6>
                                                                        <a class="dropdown-item" href="#">Download</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="shadow card">
                                                        <div class="text-center card-body">
                                                            <i class="fas fa-file-pdf text-danger fa-3x">
                                                            </i>
                                                        </div>
                                                        <div class="card-footer">
                                                            <hr>
                                                            <div class="d-flex align-items-center justify-content-between">
                                                                <p>Document Name</p>
                                                                <div class="dropdown ">
                                                                    <button class=" bg-transparent text-dark hover-0 btn btn-" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                                        <i class="fas fa-ellipsis-v">
                                                                        </i>
                                                                        <div class="ripple-container"></div>
                                                                    </button>
                                                                    <div class="dropdown-menu " aria-labelledby="dropdownMenuButton" x-placement="top-start" style="position: absolute; top: -228px; left: 1px; will-change: top, left;" x-out-of-boundaries="">
                                                                        <h6 class="dropdown-item">View Details</h6>
                                                                        <a class="dropdown-item" href="#">Download</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="shadow card">
                                                        <div class="text-center card-body">
                                                            <i class="fas fa-file-pdf text-danger fa-3x">
                                                            </i>
                                                        </div>
                                                        <div class="card-footer">
                                                            <hr>
                                                            <div class="d-flex align-items-center justify-content-between">
                                                                <p>Document Name</p>
                                                                <div class="dropdown ">
                                                                    <button class=" bg-transparent text-dark hover-0 btn btn-" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                                        <i class="fas fa-ellipsis-v">
                                                                        </i>
                                                                        <div class="ripple-container"></div>
                                                                    </button>
                                                                    <div class="dropdown-menu " aria-labelledby="dropdownMenuButton" x-placement="top-start" style="position: absolute; top: -228px; left: 1px; will-change: top, left;" x-out-of-boundaries="">
                                                                        <h6 class="dropdown-item">View Details</h6>
                                                                        <a class="dropdown-item" href="#">Download</a>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="shadow card">
                                                        <div class="text-center card-body">
                                                            <i class="fas fa-file-pdf text-danger fa-3x">
                                                            </i>
                                                        </div>
                                                        <div class="card-footer">
                                                            <hr>
                                                            <div class="d-flex align-items-center justify-content-between">
                                                                <p>Document Name</p>
                                                                <div class="dropdown ">
                                                                    <button class=" bg-transparent text-dark hover-0 btn btn-" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                                        <i class="fas fa-ellipsis-v">
                                                                        </i>
                                                                        <div class="ripple-container"></div>
                                                                    </button>
                                                                    <div class="dropdown-menu " aria-labelledby="dropdownMenuButton" x-placement="top-start" style="position: absolute; top: -228px; left: 1px; will-change: top, left;" x-out-of-boundaries="">
                                                                        <h6 class="dropdown-item">View Details</h6>
                                                                        <a class="dropdown-item" href="#">Download</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ps__rail-x" style="width: 765px; left: 0px; bottom: 0px;">
                                            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 698px;">

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer mb-0 pb-0">
                            <!-- <button type="button" class="btn btn-link">Nice Button</button> -->
                            <button type="button" class="btn btn-danger btn-link"
                                    data-dismiss="modal">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!--  End Modal -->
            <!-- Facilitator Rules Modal -->
            <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add Note</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                <i class="material-icons">clear</i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <select class="selectpicker" data-size="7" data-style="select-with-transition" title="Select task">
                                <option value="task2"> Task1 </option>
                                <option value="task1"> Task2 </option>

                            </select>
                            <input type="text" placeholder="Add User Notes"
                                   class="form-control mt-3">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link">Submit</button>
                            <button type="button" class="btn btn-danger btn-link"
                                    data-dismiss="modal">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!--  End Modal -->
            <!-- Add New TaskModal -->
            <div class="modal fade" id="addNewTaskModal" tabindex="-1" role="dialog"
                 aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md pb-0 mb-0">
                    <div class="modal-content">
                        <div class="card card-signup card-plain">
                            <div class="modal-header card-header card-header-primary" style="    width: 90%; left: 5%;">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-8">
                                            <h4 class="modal-title">Add New Task</h4>
                                        </div>
                                        <div class="col-4 text-right">
                                            <a type="button" class="close text-white" style="top:0" data-dismiss="modal" aria-hidden="true">
                                                <i class="material-icons">clear</i>
                                            </a>

                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="modal-body card-body scroll-bar" style="height: 63vh;overflow: auto;">
                            <form action="">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleEmail" class="bmd-label-floating">
                                                Name of
                                                Homework
                                            </label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleEmail" class="bmd-label-floating">
                                                Choose
                                                Members
                                            </label>
                                            <select class="selectpicker" data-style="select-with-transition"
                                                    multiple title="Choose City" data-size="7">
                                                <option disabled> Select</option>
                                                <option value="2">A </option>
                                                <option value="3">B</option>
                                                <option value="3">C</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleEmail" class="bmd-label-floating">
                                                Start
                                                Date
                                            </label>
                                            <input type="text" class="form-control datepicker"
                                                   value="10/06/2018">

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleEmail" class="bmd-label-floating">
                                                End
                                                Date
                                            </label>
                                            <input type="text" class="form-control datepicker"
                                                   value="10/06/2018">

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleEmail" class="bmd-label-floating">
                                                Brief
                                                Description of Task
                                            </label>
                                            <textarea name="" id="" cols="30" rows="2"
                                                      class="form-control"></textarea>

                                        </div>
                                    </div>
                                    <div class="col-md-12" id="description">
                                        <p for="exampleEmail" class="bmd-label-floating">
                                            <span> Actions (max5)</span> <span class="pull-right"><i onclick="adddes()" class="fa fa-plus"></i></span>
                                        </p>

                                        <!-- <div class="form-group">

                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="form-group">

                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="form-group">

                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="form-group">

                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="form-group">

                                            <input type="text" class="form-control">
                                        </div> -->
                                    </div>
                                </div>
                            </form>

                        </div>
                        <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-link">Nice Button</button> -->
                            <button type="button" class="btn btn-danger btn-link"
                                    data-dismiss="modal">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!--  End Modal -->
            <!-- task Details Modal -->
            <div class="modal fade" id="myModal6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="card card-signup card-plain">
                            <div class="modal-header card-header card-header-primary p-2" style="    width: 70%; left: 15%;">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-4">
                                            <p class="pb-0 mb-0">
                                                <i class="fa fa-clock-o" aria-hidden="true" style="font-size: 20px;margin-top: -20px;"></i>&nbsp;
                                                1 Woche left
                                            </p>
                                        </div>
                                        <div class="col-4">
                                            <h4 class="modal-title text-center ">Lorem Lorem</h4>
                                        </div>
                                        <div class="col-4 text-right">
                                            <a type="button" class="close text-white" style="top:0" data-dismiss="modal" aria-hidden="true">
                                                <i class="material-icons">clear</i>
                                            </a>

                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="modal-body">
                            <input type="hidden" class="form-control" id="task_id" name="task_id" value="13">
                            <div class="row">
                                <div class="col-md-2">
                                    <p>
                                        Progress: <small>100%</small>
                                    </p><div class="progress">
                                        <div class="progress-bar progress-bar-striped" id="new-blue-bg" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <p class="pb-0 mb-0" style="font-size:12px;line-height:16px">
                                        Quisquam vel ut sint cum eos hic dolores aperiam. Sed deserunt et. Inventore et et dolor consequatur itaque ut voluptate sed et. Magnam nam ipsum ten.

                                    </p>
                                </div>
                                <div class="col-md-3">
                                    <div class="d-flex align-items-center justify-content-start flex-wrap mb-1" data-toggle="modal" data-target="#myModal6">
                                        <span class="bg-light rounded mr-1 p-1"><img width="30" src="{{ asset('assets/img/faces/avatar.jpg') }}" /></span>

                                        <span class="bg-light rounded mr-1 p-1"><img width="30" src="{{ asset('assets/img/faces/avatar.jpg') }}" /></span>
                                        <span class="bg-light rounded mr-1 p-1"><img width="30" src="{{ asset('assets/img/faces/avatar.jpg') }}" /></span>
                                        <span class="bg-light rounded mr-1 p-1"><img width="30" src="{{ asset('assets/img/faces/avatar.jpg') }}" /></span>
                                        <span class="bg-light rounded mr-1 p-1"><i class="fa fa-plus"></i></span>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <h4 class="text-center"><b>Action</b></h4>
                                    <div class="card m-0 p-0" style="background:#f5f3f3">
                                        <div class="card-body p-2 m-0">
                                            <p class="" style="line-height:16px">
                                                <span ><b>1.</b></span>
                                                <span class="">
                                                   Ut sint cum eos hic dolores aperiam sint cum eos hic dolores erunt et. Inventore et et.

                                                   </span>
                                            </p>
                                            <p class="" style="line-height:16px">
                                                <span ><b>2.</b></span>
                                                <span class="">
                                                   Ut sint cum eos hic dolores aperiam sint cum eos hic dolores erunt et. Inventore et et.

                                                   </span>
                                            </p>
                                            <p class="" style="line-height:16px">
                                                <span ><b>3.</b></span>
                                                <span class="">
                                                   Ut sint cum eos hic dolores aperiam sint cum eos hic dolores erunt et. Inventore et et.

                                                   </span>
                                            </p>
                                            <p  style="line-height:16px">
                                                <span ><b>4.</b></span>
                                                <span class="">
                                                   Ut sint cum eos hic dolores aperiam sint cum eos hic dolores erunt et. Inventore et et.

                                                   </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <h4 class="text-center"><b>Action Notes</b></h4>
                                    <div class="card m-0 p-0" style="background:#f5f3f3">
                                        <div class="card-body p-2 m-0">
                                            <p class="bg-white pl-2 pr-2" style="line-height:16px">
                                                <span ><b>1.</b></span>
                                                <span class="">
                                                   Ut sint cum eos hic dolores aperiam sint cum eos hic dolores erunt et. Inventore et et.

                                                   </span>
                                            </p>
                                            <p class="bg-white pl-2 pr-2" style="line-height:16px">
                                                <span ><b>2.</b></span>
                                                <span class="">
                                                   Ut sint cum eos hic dolores aperiam sint cum eos hic dolores erunt et. Inventore et et.

                                                   </span>
                                            </p>
                                            <p class="bg-white pl-2 pr-2" style="line-height:16px">
                                                <span ><b>3.</b></span>
                                                <span class="">
                                                   Ut sint cum eos hic dolores aperiam sint cum eos hic dolores erunt et. Inventore et et.

                                                   </span>
                                            </p>
                                            <p  class="bg-white pl-2 pr-2" style="line-height:16px">
                                                <span ><b>4.</b></span>
                                                <span class="">
                                                   Ut sint cum eos hic dolores aperiam sint cum eos hic dolores erunt et. Inventore et et.

                                                   </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <h4 class="text-center"><b>Task Notes</b></h4>
                                    <div class="card m-0 p-0" style="background:#f5f3f3">
                                        <div class="card-body p-2 m-0 bg-white">
                                            <p class="" style="line-height:16px">
                                                Quisquam vel ut sint cum eos hic dolores aperiam. Sed deserunt et. Inventore et et dolor consequatur itaque ut voluptate sed et. Magnam nam ipsum tenetur suscipit
                                                Quisquam vel ut sint cum eos hic dolores aperiam. Sed deserunt et. Inventore et et dolor consequatur itaque ut voluptate sed et. Magnam nam ipsum tenetur suscipit
                                                Quisquam vel ut sint cum eos hic dolores aperiam. Sed deserunt et. Inventore et et dolor consequatur itaque ut voluptate sed et. Magnam nam ipsum tenetur suscipit

                                            </p>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <!--  End Modal -->
            <!--  Completd Task Modal -->
            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl">Extra large modal</button> -->

            <div class="modal fade bd-example-modal-xl" id="xlcustom" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content scroll-bar" style="max-height: 58vh;">
                        <div class="card mt-0 mb-0 ">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="text-center"><b>Completed Tasks</b> </h4><hr>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="bg-color p-2 rounded">
                                            <!-- <h6 class="h6css" >Lorem</h6> -->
                                            <div class="d-flex align-items-center justify-content-start flex-wrap mb-1">
                                                <span class="bg-light rounded mr-1 p-1 h6css" title="lorem"><b>Lorem</b></span>

                                                <span class="bg-light rounded mr-1 p-1">A</span>
                                                <span class="bg-light rounded mr-1 p-1">B</span>
                                                <span class="bg-light rounded mr-1 p-1">C</span>
                                                <span class="bg-light rounded mr-1 p-1">D</span>
                                                <span class="bg-light rounded mr-1 p-1">E</span>
                                                <span class="bg-light rounded mr-1 p-1">F</span>
                                                <span class="bg-light rounded mr-1 p-1"><i class="fa fa-plus"></i></span>

                                            </div>
                                            <div class="col-12">
                                                <p> Lorem Lorem Lorem Lorem</p>
                                            </div>
                                            <div class="col-12">

                                                <div class="d-flex align-items-center justify-content-between">
                                                    <span>Actions</span>
                                                    <span>0/1</span>
                                                    <span>
                                                                <i class="fas fa-clock"></i>1 Semana
                                                                left
                                                            </span>
                                                    <p></p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="bg-color p-2 rounded">
                                            <!-- <h6 class="h6css" >Lorem</h6> -->
                                            <div class="d-flex align-items-center justify-content-start flex-wrap mb-1">
                                                <span class="bg-light rounded mr-1 p-1 h6css" title="lorem"><b>Lorem</b></span>

                                                <span class="bg-light rounded mr-1 p-1">A</span>
                                                <span class="bg-light rounded mr-1 p-1">B</span>
                                                <span class="bg-light rounded mr-1 p-1">C</span>
                                                <span class="bg-light rounded mr-1 p-1">D</span>
                                                <span class="bg-light rounded mr-1 p-1">E</span>
                                                <span class="bg-light rounded mr-1 p-1">F</span>
                                                <span class="bg-light rounded mr-1 p-1"><i class="fa fa-plus"></i></span>

                                            </div>
                                            <div class="col-12">
                                                <p> Lorem Lorem Lorem Lorem</p>
                                            </div>
                                            <div class="col-12">

                                                <div class="d-flex align-items-center justify-content-between">
                                                    <span>Actions</span>
                                                    <span>0/1</span>
                                                    <span>
                                                                <i class="fas fa-clock"></i>1 Semana
                                                                left
                                                            </span>
                                                    <p></p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="bg-color p-2 rounded">
                                            <!-- <h6 class="h6css" >Lorem</h6> -->
                                            <div class="d-flex align-items-center justify-content-start flex-wrap mb-1">
                                                <span class="bg-light rounded mr-1 p-1 h6css" title="lorem"><b>Lorem</b></span>

                                                <span class="bg-light rounded mr-1 p-1">A</span>
                                                <span class="bg-light rounded mr-1 p-1">B</span>
                                                <span class="bg-light rounded mr-1 p-1">C</span>
                                                <span class="bg-light rounded mr-1 p-1">D</span>
                                                <span class="bg-light rounded mr-1 p-1">E</span>
                                                <span class="bg-light rounded mr-1 p-1">F</span>
                                                <span class="bg-light rounded mr-1 p-1"><i class="fa fa-plus"></i></span>

                                            </div>
                                            <div class="col-12">
                                                <p> Lorem Lorem Lorem Lorem</p>
                                            </div>
                                            <div class="col-12">

                                                <div class="d-flex align-items-center justify-content-between">
                                                    <span>Actions</span>
                                                    <span>0/1</span>
                                                    <span>
                                                                <i class="fas fa-clock"></i>1 Semana
                                                                left
                                                            </span>
                                                    <p></p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="bg-color p-2 rounded">
                                            <!-- <h6 class="h6css" >Lorem</h6> -->
                                            <div class="d-flex align-items-center justify-content-start flex-wrap mb-1">
                                                <span class="bg-light rounded mr-1 p-1 h6css" title="lorem"><b>Lorem</b></span>

                                                <span class="bg-light rounded mr-1 p-1">A</span>
                                                <span class="bg-light rounded mr-1 p-1">B</span>
                                                <span class="bg-light rounded mr-1 p-1">C</span>
                                                <span class="bg-light rounded mr-1 p-1">D</span>
                                                <span class="bg-light rounded mr-1 p-1">E</span>
                                                <span class="bg-light rounded mr-1 p-1">F</span>
                                                <span class="bg-light rounded mr-1 p-1"><i class="fa fa-plus"></i></span>

                                            </div>
                                            <div class="col-12">
                                                <p> Lorem Lorem Lorem Lorem</p>
                                            </div>
                                            <div class="col-12">

                                                <div class="d-flex align-items-center justify-content-between">
                                                    <span>Actions</span>
                                                    <span>0/1</span>
                                                    <span>
                                                                <i class="fas fa-clock"></i>1 Semana
                                                                left
                                                            </span>
                                                    <p></p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="bg-color p-2 rounded">
                                            <!-- <h6 class="h6css" >Lorem</h6> -->
                                            <div class="d-flex align-items-center justify-content-start flex-wrap mb-1">
                                                <span class="bg-light rounded mr-1 p-1 h6css" title="lorem"><b>Lorem</b></span>

                                                <span class="bg-light rounded mr-1 p-1">A</span>
                                                <span class="bg-light rounded mr-1 p-1">B</span>
                                                <span class="bg-light rounded mr-1 p-1">C</span>
                                                <span class="bg-light rounded mr-1 p-1">D</span>
                                                <span class="bg-light rounded mr-1 p-1">E</span>
                                                <span class="bg-light rounded mr-1 p-1">F</span>
                                                <span class="bg-light rounded mr-1 p-1"><i class="fa fa-plus"></i></span>

                                            </div>
                                            <div class="col-12">
                                                <p> Lorem Lorem Lorem Lorem</p>
                                            </div>
                                            <div class="col-12">

                                                <div class="d-flex align-items-center justify-content-between">
                                                    <span>Actions</span>
                                                    <span>0/1</span>
                                                    <span>
                                                                <i class="fas fa-clock"></i>1 Semana
                                                                left
                                                            </span>
                                                    <p></p>
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
            <!--  End Modal -->

        </div>
    </div>

@endsection

@section('script')
    <script>

        $(document).ready(function () {
            // active thumbnail
            $("#thumbSlider .thumb").on("click", function () {
                $(this).addClass("active");
                $(this).siblings().removeClass("active");

            });
        })

        $('.ulitm').removeAttr("hidden");
        $('#ulitm').css("display", "block");
        $('#general').css("display", "block");
        function adddes() {
            $('#description').append('<div class="form-group"><input type="text" class="form-control"></div></div>');
        }
    </script>
    <script>
        function openForm() {
            document.getElementById("myForm").style.display = "block";
        }

        function closeForm() {
            document.getElementById("myForm").style.display = "none";
        }
        function openForm1() {
            document.getElementById("myForm1").style.display = "block";
        }

        function closeForm1() {
            document.getElementById("myForm1").style.display = "none";
        }
    </script>
@endsection
