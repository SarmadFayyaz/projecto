@extends('layouts.app')

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
            width: 20px;
            padding: 0;
            overflow: hidden;
            position: relative;
            line-height: 24px;
        }
      .accordion-body .list-group  .list-group-item
        {
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

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 ">
                    <div class="card scroll-bar mb-0" style="height:87vh;">
                        <!-- <div class="card-header card-header-success card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons"></i>
                            </div>

                        </div> -->

                        <div class="card-body m-0 pb-0 activeproject">


                            <div class="row">
                                <div class="col-6">
                                    <h4 class="m-0 p-0 font-weight-bold ml-1 mb-1">Active Project</h4>
                                </div>
                                <div class="col-6 text-right">
                                    <button class="btn btn-primary btn-sm btn-round py-0" id="collapsall">Collapse All</button>
                                </div>
                                <div class="col-md-6 pr-0">
                                    <div class="accordion" id="accordionPanelsStayOpenExample">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                                <button class="accordion-button" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#panelsStayOpen-collapseOne"
                                                        aria-expanded="true"
                                                        aria-controls="panelsStayOpen-collapseOne">
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="col-6"><h6 class="mb-0">Test 1</h6></div>
                                                            <div class="col-6 text-right">
                                                                <span> <i class="fas fa-clock mr-1"></i>3 Weeks Left</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </button>

                                            </h2>
                                            <div id="panelsStayOpen-collapseOne"
                                                 class="colla_ps accordion-collapse collapse show"
                                                 aria-labelledby="panelsStayOpen-headingOne">
                                                <div class="accordion-body">


                                                    <div
                                                        class="d-flex mb-3 justify-content-between align-items-center">
                                                        <div class="col-12">
                                                            <button class="btn btn-primary btn-fab" id="new-blue-bg"
                                                                    title="Umer"> U
                                                                <div class="ripple-container"></div>
                                                            </button>
                                                            <button class="btn btn-primary btn-fab" id="new-blue-bg"
                                                                    title="Farhad"> F
                                                                <div class="ripple-container"></div>
                                                            </button>

                                                            <i class="fas fa-info-circle ml-2 text-warning pull-right"
                                                               title="View Task Details"></i>
                                                        </div>
                                                    </div>

                                                    <div class="row ">
                                                        <div class="col-md-6 mb-2 pr-0">
                                                            <div class="accordion"
                                                                 id="accordionPanelsStayOpenExample">
                                                                <div class="accordion-item">
                                                                    <h6 class="accordion-header"
                                                                        id="panelsStayOpen-heading1">
                                                                        <button
                                                                            class="accordion-button no-arrow bg-primary text-white"
                                                                            type="button"
                                                                            data-bs-toggle="collapse"
                                                                            data-bs-target="#panelsStayOpen-collapse1"
                                                                            aria-expanded="true"
                                                                            aria-controls="panelsStayOpen-collapse1">
                                                                            Urgent Tasks
                                                                        </button>
                                                                    </h6>
                                                                    <div id="panelsStayOpen-collapse1"
                                                                         class="accordion-collapse collapse show"
                                                                         aria-labelledby="panelsStayOpen-heading1">
                                                                        <div class="accordion-body">
                                                                            <ul class="list-group">
                                                                                <li class="list-group-item">
                                                                                   1. lorem lorem lorem lorem lorem lorem
                                                                                </li>
                                                                                </li>
                                                                                <li class="list-group-item">
                                                                                   2. lorem lorem lorem
                                                                                </li>
                                                                                <li class="list-group-item">
                                                                                   3. lorem lorem lorem
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mb-2 pl-1">
                                                            <div class="accordion"
                                                                 id="accordionPanelsStayOpenExample">
                                                                <div class="accordion-item">
                                                                    <h6 class="accordion-header"
                                                                        id="panelsStayOpen-heading2">
                                                                        <button
                                                                            class="accordion-button no-arrow bg-primary text-white"
                                                                            type="button"
                                                                            data-bs-toggle="collapse"
                                                                            data-bs-target="#panelsStayOpen-collapse2"
                                                                            aria-expanded="true"
                                                                            aria-controls="panelsStayOpen-collapse2">
                                                                            Cross Task
                                                                        </button>
                                                                    </h6>
                                                                    <div id="panelsStayOpen-collapse2"
                                                                         class="accordion-collapse collapse "
                                                                         aria-labelledby="panelsStayOpen-heading2">
                                                                        <div class="accordion-body">
                                                                        <ul class="list-group">
                                                                                <li class="list-group-item">
                                                                                   1. lorem lorem lorem lorem lorem lorem
                                                                                </li>
                                                                                </li>
                                                                                <li class="list-group-item">
                                                                                   2. lorem lorem lorem
                                                                                </li>
                                                                                <li class="list-group-item">
                                                                                   3. lorem lorem lorem
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 pr-0">
                                                            <div class="accordion"
                                                                 id="accordionPanelsStayOpenExample">
                                                                <div class="accordion-item">
                                                                    <h6 class="accordion-header"
                                                                        id="panelsStayOpen-heading3">
                                                                        <button
                                                                            class="accordion-button no-arrow bg-primary text-white"
                                                                            type="button"
                                                                            data-bs-toggle="collapse"
                                                                            data-bs-target="#panelsStayOpen-collapse3"
                                                                            aria-expanded="true"
                                                                            aria-controls="panelsStayOpen-collapse3">
                                                                            Pending Tasks
                                                                        </button>
                                                                    </h6>
                                                                    <div id="panelsStayOpen-collapse3"
                                                                         class="accordion-collapse collapse "
                                                                         aria-labelledby="panelsStayOpen-heading3">
                                                                        <div class="accordion-body">
                                                                        <ul class="list-group">
                                                                                <li class="list-group-item">
                                                                                   1. lorem lorem lorem lorem lorem lorem
                                                                                </li>
                                                                                </li>
                                                                                <li class="list-group-item">
                                                                                   2. lorem lorem lorem
                                                                                </li>
                                                                                <li class="list-group-item">
                                                                                   3. lorem lorem lorem
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 pl-1">
                                                            <div class="accordion"
                                                                 id="accordionPanelsStayOpenExample">
                                                                <div class="accordion-item">
                                                                    <h6 class="accordion-header"
                                                                        id="panelsStayOpen-heading4">
                                                                        <button
                                                                            class="accordion-button no-arrow bg-primary text-white"
                                                                            type="button"
                                                                            data-bs-toggle="collapse"
                                                                            data-bs-target="#panelsStayOpen-collapse4"
                                                                            aria-expanded="true"
                                                                            aria-controls="panelsStayOpen-collapse4">
                                                                            Fullfillment Tasks
                                                                        </button>
                                                                    </h6>
                                                                    <div id="panelsStayOpen-collapse4"
                                                                         class="accordion-collapse collapse show"
                                                                         aria-labelledby="panelsStayOpen-heading4">
                                                                        <div class="accordion-body ">
                                                                            <div class="row justify-content-center">
                                                                                <div class="col-md-7 mt-2">
                                                                                    <div id="gaugeID"
                                                                                         class="gauge_ID collapse in show  demo1"
                                                                                         title="10 tasks completed">
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

                                <div class="col-md-6 mb-3 pl-1">
                                    <div class="accordion" id="accordionPanelsStayOpenExample">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="panelsStayOpen-headingTwo">

                                                <button class="accordion-button" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#panelsStayOpen-collapseTwo"
                                                        aria-expanded="true"
                                                        aria-controls="panelsStayOpen-collapseTwo">
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="col-6"><h6 class="mb-0">Test 2</h6></div>
                                                            <div class="col-6 text-right">
                                                                <span> <i class="fas fa-clock mr-1"></i>3 Weeks Left</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </button>
                                            </h2>
                                            <div id="panelsStayOpen-collapseTwo"
                                                 class="colla_ps accordion-collapse collapse show"
                                                 aria-labelledby="panelsStayOpen-headingTwo">
                                                <div class="accordion-body">
                                                    <div
                                                        class="d-flex mb-3 justify-content-between align-items-center">
                                                        <div class="col-12">
                                                            <button class="btn btn-primary btn-fab" id="new-blue-bg"
                                                                    title="Umer"> U
                                                                <div class="ripple-container"></div>
                                                            </button>
                                                            <button class="btn btn-primary btn-fab" id="new-blue-bg"
                                                                    title="Farhad"> F
                                                                <div class="ripple-container"></div>
                                                            </button>

                                                            <i class="fas fa-info-circle ml-2 text-warning pull-right"
                                                               title="View Task Details"></i>
                                                        </div>
                                                    </div>
                                                    <div class="row ">
                                                        <div class="col-md-6 mb-2 pr-0">
                                                            <div class="accordion"
                                                                 id="accordionPanelsStayOpenExample">
                                                                <div class="accordion-item">
                                                                    <h6 class="accordion-header"
                                                                        id="panelsStayOpen-heading2-1">
                                                                        <button
                                                                            class="accordion-button no-arrow bg-primary text-white"
                                                                            type="button"
                                                                            data-bs-toggle="collapse"
                                                                            data-bs-target="#panelsStayOpen-collapse2-1"
                                                                            aria-expanded="true"
                                                                            aria-controls="panelsStayOpen-collapse2-1">
                                                                            Urgent Tasks
                                                                        </button>
                                                                    </h6>
                                                                    <div id="panelsStayOpen-collapse2-1"
                                                                         class="accordion-collapse collapse show"
                                                                         aria-labelledby="panelsStayOpen-heading2-1">
                                                                        <div class="accordion-body">
                                                                        <ul class="list-group">
                                                                                <li class="list-group-item">
                                                                                   1. lorem lorem lorem lorem lorem lorem
                                                                                </li>
                                                                                </li>
                                                                                <li class="list-group-item">
                                                                                   2. lorem lorem lorem
                                                                                </li>
                                                                                <li class="list-group-item">
                                                                                   3. lorem lorem lorem
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 pl-1">
                                                            <div class="accordion"
                                                                 id="accordionPanelsStayOpenExample">
                                                                <div class="accordion-item">
                                                                    <h6 class="accordion-header"
                                                                        id="panelsStayOpen-heading2-2">
                                                                        <button
                                                                            class="accordion-button no-arrow bg-primary text-white"
                                                                            type="button"
                                                                            data-bs-toggle="collapse"
                                                                            data-bs-target="#panelsStayOpen-collapse2-2"
                                                                            aria-expanded="true"
                                                                            aria-controls="panelsStayOpen-collapse2-2">
                                                                            Cross Task
                                                                        </button>
                                                                    </h6>
                                                                    <div id="panelsStayOpen-collapse2-2"
                                                                         class="accordion-collapse collapse "
                                                                         aria-labelledby="panelsStayOpen-heading2-2">
                                                                        <div class="accordion-body">
                                                                        <ul class="list-group">
                                                                                <li class="list-group-item">
                                                                                   1. lorem lorem lorem lorem lorem lorem
                                                                                </li>
                                                                                </li>
                                                                                <li class="list-group-item">
                                                                                   2. lorem lorem lorem
                                                                                </li>
                                                                                <li class="list-group-item">
                                                                                   3. lorem lorem lorem
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 pr-0">
                                                            <div class="accordion"
                                                                 id="accordionPanelsStayOpenExample">
                                                                <div class="accordion-item">
                                                                    <h6 class="accordion-header"
                                                                        id="panelsStayOpen-heading2-3">
                                                                        <button
                                                                            class="accordion-button no-arrow bg-primary text-white"
                                                                            type="button"
                                                                            data-bs-toggle="collapse"
                                                                            data-bs-target="#panelsStayOpen-collapse2-3"
                                                                            aria-expanded="true"
                                                                            aria-controls="panelsStayOpen-collapse2-3">
                                                                            Pending Tasks
                                                                        </button>
                                                                    </h6>
                                                                    <div id="panelsStayOpen-collapse2-3"
                                                                         class="accordion-collapse collapse "
                                                                         aria-labelledby="panelsStayOpen-heading2-3">
                                                                        <div class="accordion-body">
                                                                        <ul class="list-group">
                                                                                <li class="list-group-item">
                                                                                   1. lorem lorem lorem lorem lorem lorem
                                                                                </li>
                                                                                </li>
                                                                                <li class="list-group-item">
                                                                                   2. lorem lorem lorem
                                                                                </li>
                                                                                <li class="list-group-item">
                                                                                   3. lorem lorem lorem
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 pl-1">
                                                            <div class="accordion"
                                                                 id="accordionPanelsStayOpenExample">
                                                                <div class="accordion-item">
                                                                    <h6 class="accordion-header"
                                                                        id="panelsStayOpen-heading2-4">
                                                                        <button
                                                                            class="accordion-button no-arrow bg-primary text-white"
                                                                            type="button"
                                                                            data-bs-toggle="collapse"
                                                                            data-bs-target="#panelsStayOpen-collapse2-4"
                                                                            aria-expanded="true"
                                                                            aria-controls="panelsStayOpen-collapse2-4">
                                                                            Fullfillment Tasks
                                                                        </button>
                                                                    </h6>
                                                                    <div id="panelsStayOpen-collapse2-4"
                                                                         class="accordion-collapse collapse show "
                                                                         aria-labelledby="panelsStayOpen-heading2-4">
                                                                        <div class="accordion-body">


                                                                            <div class="row justify-content-center">
                                                                                <div class="col-md-7 mt-2">
                                                                                    <div id="gaugeID"
                                                                                         class="gauge_ID_1 collapse in show  demo1"
                                                                                         title="10 tasks completed">
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

                                <div class="col-md-6 pr-0">
                                    <div class="accordion" id="accordionPanelsStayOpenExample">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                                <button class="accordion-button" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#panelsStayOpen-collapseThree"
                                                        aria-expanded="true"
                                                        aria-controls="panelsStayOpen-collapseThree">
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="col-6"><h6 class="mb-0">Test 3</h6></div>
                                                            <div class="col-6 text-right">
                                                                <span> <i class="fas fa-clock mr-1"></i>3 Weeks Left</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </button>
                                            </h2>
                                            <div id="panelsStayOpen-collapseThree"
                                                 class="colla_ps accordion-collapse collapse show"
                                                 aria-labelledby="panelsStayOpen-headingThree">
                                                <div class="accordion-body">
                                                    <div
                                                        class="d-flex mb-3 justify-content-between align-items-center">
                                                        <div class="col-12">
                                                            <button class="btn btn-primary btn-fab" id="new-blue-bg"
                                                                    title="Umer"> U
                                                                <div class="ripple-container"></div>
                                                            </button>
                                                            <button class="btn btn-primary btn-fab" id="new-blue-bg"
                                                                    title="Farhad"> F
                                                                <div class="ripple-container"></div>
                                                            </button>

                                                            <i class="fas fa-info-circle ml-2 text-warning pull-right"
                                                               title="View Task Details"></i>
                                                        </div>
                                                    </div>
                                                    <div class="row ">
                                                        <div class="col-md-6 mb-2 pr-0">
                                                            <div class="accordion"
                                                                 id="accordionPanelsStayOpenExample">
                                                                <div class="accordion-item">
                                                                    <h6 class="accordion-header"
                                                                        id="panelsStayOpen-heading3-1">
                                                                        <button
                                                                            class="accordion-button no-arrow bg-primary text-white"
                                                                            type="button"
                                                                            data-bs-toggle="collapse"
                                                                            data-bs-target="#panelsStayOpen-collapse3-1"
                                                                            aria-expanded="true"
                                                                            aria-controls="panelsStayOpen-collapse3-1">
                                                                            Urgent Tasks
                                                                        </button>
                                                                    </h6>
                                                                    <div id="panelsStayOpen-collapse3-1"
                                                                         class="accordion-collapse collapse show"
                                                                         aria-labelledby="panelsStayOpen-heading3-1">
                                                                        <div class="accordion-body">
                                                                        <ul class="list-group">
                                                                                <li class="list-group-item">
                                                                                   1. lorem lorem lorem lorem lorem lorem
                                                                                </li>
                                                                                </li>
                                                                                <li class="list-group-item">
                                                                                   2. lorem lorem lorem
                                                                                </li>
                                                                                <li class="list-group-item">
                                                                                   3. lorem lorem lorem
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 pl-1">
                                                            <div class="accordion"
                                                                 id="accordionPanelsStayOpenExample">
                                                                <div class="accordion-item">
                                                                    <h6 class="accordion-header"
                                                                        id="panelsStayOpen-heading3-2">
                                                                        <button
                                                                            class="accordion-button no-arrow bg-primary text-white"
                                                                            type="button"
                                                                            data-bs-toggle="collapse"
                                                                            data-bs-target="#panelsStayOpen-collapse3-2"
                                                                            aria-expanded="true"
                                                                            aria-controls="panelsStayOpen-collapse3-2">
                                                                            Cross Task
                                                                        </button>
                                                                    </h6>
                                                                    <div id="panelsStayOpen-collapse3-2"
                                                                         class="accordion-collapse collapse "
                                                                         aria-labelledby="panelsStayOpen-heading3-2">
                                                                        <div class="accordion-body">
                                                                        <ul class="list-group">
                                                                                <li class="list-group-item">
                                                                                   1. lorem lorem lorem lorem lorem lorem
                                                                                </li>
                                                                                </li>
                                                                                <li class="list-group-item">
                                                                                   2. lorem lorem lorem
                                                                                </li>
                                                                                <li class="list-group-item">
                                                                                   3. lorem lorem lorem
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 pr-0">
                                                            <div class="accordion"
                                                                 id="accordionPanelsStayOpenExample">
                                                                <div class="accordion-item">
                                                                    <h6 class="accordion-header"
                                                                        id="panelsStayOpen-heading3-3">
                                                                        <button
                                                                            class="accordion-button no-arrow bg-primary text-white"
                                                                            type="button"
                                                                            data-bs-toggle="collapse"
                                                                            data-bs-target="#panelsStayOpen-collapse3-3"
                                                                            aria-expanded="true"
                                                                            aria-controls="panelsStayOpen-collapse3-3">
                                                                            Pending Tasks
                                                                        </button>
                                                                    </h6>
                                                                    <div id="panelsStayOpen-collapse3-3"
                                                                         class="accordion-collapse collapse "
                                                                         aria-labelledby="panelsStayOpen-heading3-3">
                                                                        <div class="accordion-body">
                                                                        <ul class="list-group">
                                                                                <li class="list-group-item">
                                                                                   1. lorem lorem lorem lorem lorem lorem
                                                                                </li>
                                                                                </li>
                                                                                <li class="list-group-item">
                                                                                   2. lorem lorem lorem
                                                                                </li>
                                                                                <li class="list-group-item">
                                                                                   3. lorem lorem lorem
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 pl-1">
                                                            <div class="accordion"
                                                                 id="accordionPanelsStayOpenExample">
                                                                <div class="accordion-item">
                                                                    <h6 class="accordion-header"
                                                                        id="panelsStayOpen-heading3-4">
                                                                        <button
                                                                            class="accordion-button no-arrow bg-primary text-white"
                                                                            type="button"
                                                                            data-bs-toggle="collapse"
                                                                            data-bs-target="#panelsStayOpen-collapse3-4"
                                                                            aria-expanded="true"
                                                                            aria-controls="panelsStayOpen-collapse3-4">
                                                                            Fullfillment Tasks
                                                                        </button>
                                                                    </h6>
                                                                    <div id="panelsStayOpen-collapse3-4"
                                                                         class="accordion-collapse collapse show"
                                                                         aria-labelledby="panelsStayOpen-heading3-4">
                                                                        <div class="accordion-body">


                                                                            <div class="row justify-content-center">
                                                                                <div class="col-md-7 mt-2">
                                                                                    <div id="gaugeID"
                                                                                         class="gauge_ID_2 collapse in show  demo1"
                                                                                         title="10 tasks completed">
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


                                <div class="col-md-6 pl-1">
                                    <div class="accordion" id="accordionPanelsStayOpenExample">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="panelsStayOpen-headingFour">
                                                <button class="accordion-button" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#panelsStayOpen-collapseFour"
                                                        aria-expanded="true"
                                                        aria-controls="panelsStayOpen-collapseFour">
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="col-6"><h6 class="mb-0">Test 4</h6></div>
                                                            <div class="col-6 text-right">
                                                                <span> <i class="fas fa-clock mr-1"></i>3 Weeks Left</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </button>
                                            </h2>
                                            <div id="panelsStayOpen-collapseFour"
                                                 class="colla_ps accordion-collapse collapse show"
                                                 aria-labelledby="panelsStayOpen-headingFour">
                                                <div class="accordion-body">
                                                    <div
                                                        class="d-flex mb-3 justify-content-between align-items-center">
                                                        <div class="col-12">
                                                            <button class="btn btn-primary btn-fab" id="new-blue-bg"
                                                                    title="Umer"> U
                                                                <div class="ripple-container"></div>
                                                            </button>
                                                            <button class="btn btn-primary btn-fab" id="new-blue-bg"
                                                                    title="Farhad"> F
                                                                <div class="ripple-container"></div>
                                                            </button>

                                                            <i class="fas fa-info-circle ml-2 text-warning pull-right"
                                                               title="View Task Details"></i>
                                                        </div>
                                                    </div>
                                                    <div class="row ">
                                                        <div class="col-md-6 mb-2 pr-0">
                                                            <div class="accordion"
                                                                 id="accordionPanelsStayOpenExample">
                                                                <div class="accordion-item">
                                                                    <h6 class="accordion-header"
                                                                        id="panelsStayOpen-heading4-1">
                                                                        <button
                                                                            class="accordion-button no-arrow bg-primary text-white"
                                                                            type="button"
                                                                            data-bs-toggle="collapse"
                                                                            data-bs-target="#panelsStayOpen-collapse4-1"
                                                                            aria-expanded="true"
                                                                            aria-controls="panelsStayOpen-collapse4-1">
                                                                            Urgent Tasks
                                                                        </button>
                                                                    </h6>
                                                                    <div id="panelsStayOpen-collapse4-1"
                                                                         class="accordion-collapse collapse show"
                                                                         aria-labelledby="panelsStayOpen-heading4-1">
                                                                        <div class="accordion-body">
                                                                        <ul class="list-group">
                                                                                <li class="list-group-item">
                                                                                   1. lorem lorem lorem lorem lorem lorem
                                                                                </li>
                                                                                </li>
                                                                                <li class="list-group-item">
                                                                                   2. lorem lorem lorem
                                                                                </li>
                                                                                <li class="list-group-item">
                                                                                   3. lorem lorem lorem
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 pl-1">
                                                            <div class="accordion"
                                                                 id="accordionPanelsStayOpenExample">
                                                                <div class="accordion-item">
                                                                    <h6 class="accordion-header"
                                                                        id="panelsStayOpen-heading4-2">
                                                                        <button
                                                                            class="accordion-button no-arrow bg-primary text-white"
                                                                            type="button"
                                                                            data-bs-toggle="collapse"
                                                                            data-bs-target="#panelsStayOpen-collapse4-2"
                                                                            aria-expanded="true"
                                                                            aria-controls="panelsStayOpen-collapse4-2">
                                                                            Cross Task
                                                                        </button>
                                                                    </h6>
                                                                    <div id="panelsStayOpen-collapse4-2"
                                                                         class="accordion-collapse collapse "
                                                                         aria-labelledby="panelsStayOpen-heading4-2">
                                                                        <div class="accordion-body">
                                                                        <ul class="list-group">
                                                                                <li class="list-group-item">
                                                                                   1. lorem lorem lorem lorem lorem lorem
                                                                                </li>
                                                                                </li>
                                                                                <li class="list-group-item">
                                                                                   2. lorem lorem lorem
                                                                                </li>
                                                                                <li class="list-group-item">
                                                                                   3. lorem lorem lorem
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 pr-0">
                                                            <div class="accordion"
                                                                 id="accordionPanelsStayOpenExample">
                                                                <div class="accordion-item">
                                                                    <h6 class="accordion-header"
                                                                        id="panelsStayOpen-heading4-3">
                                                                        <button
                                                                            class="accordion-button no-arrow bg-primary text-white"
                                                                            type="button"
                                                                            data-bs-toggle="collapse"
                                                                            data-bs-target="#panelsStayOpen-collapse4-3"
                                                                            aria-expanded="true"
                                                                            aria-controls="panelsStayOpen-collapse4-3">
                                                                            Pending Tasks
                                                                        </button>
                                                                    </h6>
                                                                    <div id="panelsStayOpen-collapse4-3"
                                                                         class="accordion-collapse collapse "
                                                                         aria-labelledby="panelsStayOpen-heading4-3">
                                                                        <div class="accordion-body">
                                                                        <ul class="list-group">
                                                                                <li class="list-group-item">
                                                                                   1. lorem lorem lorem lorem lorem lorem
                                                                                </li>
                                                                                </li>
                                                                                <li class="list-group-item">
                                                                                   2. lorem lorem lorem
                                                                                </li>
                                                                                <li class="list-group-item">
                                                                                   3. lorem lorem lorem
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 pl-1">
                                                            <div class="accordion"
                                                                 id="accordionPanelsStayOpenExample">
                                                                <div class="accordion-item">
                                                                    <h6 class="accordion-header"
                                                                        id="panelsStayOpen-heading4-4">
                                                                        <button
                                                                            class="accordion-button no-arrow bg-primary text-white"
                                                                            type="button"
                                                                            data-bs-toggle="collapse"
                                                                            data-bs-target="#panelsStayOpen-collapse4-4"
                                                                            aria-expanded="true"
                                                                            aria-controls="panelsStayOpen-collapse4-4">
                                                                            Fullfillment Tasks
                                                                        </button>
                                                                    </h6>
                                                                    <div id="panelsStayOpen-collapse4-4"
                                                                         class="accordion-collapse collapse show"
                                                                         aria-labelledby="panelsStayOpen-heading4-4">
                                                                        <div class="accordion-body">


                                                                            <div class="row justify-content-center">
                                                                                <div class="col-md-7 mt-2">
                                                                                    <div id="gaugeID"
                                                                                         class="gauge_ID_3 collapse in show  demo1"
                                                                                         title="10 tasks completed">
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


                                <!-- <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h4 class="card-title">Test 2</h4>
                                                <h6 class="card-title"><i class="fas fa-clock"></i>3
                                                    Weeks
                                                    Left</h6>
                                                <i class="fas fa-info-circle  text-warning"
                                                    title="View Task Details"></i>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="px-2">
                                                    <div class="dropdown">
                                                        <button
                                                            class="dropdown-toggle btn btn-info btn-block btn-sm btn-round "
                                                            type="button" id="dropdownMenuButton"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            Urgent Tasks
                                                        </button>
                                                        <div class="dropdown-menu  w-100 text-center"
                                                            aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="#">1</a>
                                                            <a class="dropdown-item" href="#">2 </a>
                                                        </div>
                                                    </div>
                                                </div>





                                            </div>

                                            <div class="col-md-12">
                                                <div class="px-2">
                                                    <div class="dropdown">
                                                        <button
                                                            class="dropdown-toggle btn btn-info btn-block  btn-sm btn-round "
                                                            type="button" id="dropdownMenuButton"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            Cross Tasks
                                                        </button>
                                                        <div class="dropdown-menu  w-100 text-center"
                                                            aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="#">1</a>
                                                            <a class="dropdown-item" href="#">2 </a>
                                                        </div>
                                                    </div>
                                                </div>





                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="px-2">
                                                    <div class="dropdown">
                                                        <button
                                                            class="dropdown-toggle btn btn-info  btn-block  btn-sm btn-round "
                                                            type="button" id="dropdownMenuButton"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            Pending Tasks
                                                        </button>
                                                        <div class="dropdown-menu  w-100 text-center"
                                                            aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="#">1</a>
                                                            <a class="dropdown-item" href="#">2 </a>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="px-2">
                                                    <div class="dropdown">
                                                        <button
                                                            class="dropdown-toggle btn btn-info btn-block  btn-sm btn-round "
                                                            type="button" id="dropdownMenuButton"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            Pedning Tasks
                                                        </button>
                                                        <div class="dropdown-menu w-100 text-center"
                                                            aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="#">1</a>
                                                            <a class="dropdown-item" href="#">2 </a>

                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>


                                </div> -->

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
                                    <select class="selectpicker" data-style="select-with-transition"
                                            title="Select Project" data-size="7">
                                        <option disabled> Select Project</option>
                                        <option value="2">1</option>
                                        <option value="3">2</option>

                                    </select>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <select class="selectpicker" data-style="select-with-transition"
                                            title=" Select Task" data-size="7">
                                        <option disabled> Select Task</option>
                                        <option value="2">1</option>
                                        <option value="3">2</option>

                                    </select>
                                </div>
                                <div class="col-12 mt-2">
                                        <textarea placeholder="Enter Here" class="form-control"
                                                  style="max-width: 100% !important;border: 1px solid #c1c1c1;  padding: 8px;    min-height: 165px !important;"></textarea>
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
        var gauge = new Gauge($('.gauge_ID'), {
            value: '10'
        });
    </script>
    <script>
        var gauge = new Gauge($('.gauge_ID_1'), {
            value: '10'
        });
    </script>
    <script>
        var gauge = new Gauge($('.gauge_ID_2'), {
            value: '10'
        });
    </script>
    <script>
        var gauge = new Gauge($('.gauge_ID_3'), {
            value: '10'
        });
    </script>
      <script>
        $('#collapsall').on('click',function(){
            $('.colla_ps').removeClass("show");

        });
       
    </script>
@endsection
