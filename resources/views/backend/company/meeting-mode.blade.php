@extends('layouts.admin')

@section('title', 'Meeeting Mode')

@section('style')
    <style>
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
        }
    </style>
@endsection

@section('content')

    <div class="content">
        <div class="content">
            <div class="container-fluid">
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
                                    <div class="col-md-3 col-sm-6">
                                        <div class="item">
                                            <img src="./assets/img/black.png" style="width:100%" alt="">
                                            <p class="text-center">lorem</p>
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-sm-6">
                                        <div class="item">
                                            <img src="./assets/img/black.png" style="width:100%" alt="">
                                            <p class="text-center">lorem</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="item">
                                            <img src="./assets/img/black.png" style="width:100%" alt="">
                                            <p class="text-center">lorem</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="item">
                                            <img src="./assets/img/black.png" style="width:100%" alt="">
                                            <p class="text-center">lorem</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="item">
                                            <img src="./assets/img/black.png" style="width:100%" alt="">
                                            <p class="text-center">lorem</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="item">
                                            <img src="./assets/img/black.png" style="width:100%" alt="">
                                            <p class="text-center">lorem</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="item">
                                            <img src="./assets/img/black.png" style="width:100%" alt="">
                                            <p class="text-center">lorem</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="item">
                                            <img src="./assets/img/black.png" style="width:100%" alt="">
                                            <p class="text-center">lorem</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="item">
                                            <img src="./assets/img/black.png" style="width:100%" alt="">
                                            <p class="text-center">lorem</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="item">
                                            <img src="./assets/img/black.png" style="width:100%" alt="">
                                            <p class="text-center">lorem</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-3 ">
                        <div class="card mb-0">
                            <!-- <div class="col-md-3 ">
                <button class="btn btn-secondary " type="button">
                    Simultaneous Room
                </button>
            </div> -->
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="text"placeholder="Method 0" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <input type="text"placeholder="Note" class="form-control"/>
                                </div>
                            </div>


                        </div>


                        <button class="btn btn-primary  btn-block">Simultaneous Room</button>
                        <button class="btn btn-primary  btn-block">Documentry Library</button>
                        <button class="btn btn-primary  btn-block">Binnacle</button>

                    </div>


                </div>


                <!-- Meetings Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Method O (Initial Project Meetings)</h4>
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
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Method O (Description of Meetings)</h4>
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
                <!-- Facilitator Rules Modal -->
                <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Method O (Facilitator)</h4>
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
                <!-- Add New TaskModal -->
                <div class="modal fade" id="addNewTaskModal" tabindex="-1" role="dialog"
                     aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Add New Task</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                    <i class="material-icons">clear</i>
                                </button>
                            </div>
                            <div class="modal-body scroll-bar" style="height: 60vh;overflow: auto;">
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
                                        <div class="col-md-12">
                                            <label for="exampleEmail" class="bmd-label-floating">
                                                Actions (max
                                                5)
                                            </label>
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
                                            </div>
                                            <div class="form-group">

                                                <input type="text" class="form-control">
                                            </div>
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



            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>

        $('#meeting').css("display", "block");
        $('#meeting a').css("color", "#36baaf");

        $('#general').css("display", "block");
        $('#general a').css("color", "black");


    </script>
@endsection
