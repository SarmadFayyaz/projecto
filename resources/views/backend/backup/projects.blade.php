
@extends('layouts.app')

@section('title', 'Projects')

@section('style')

@endsection

@section('content')
<div class="content mt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <p class="card-category">Total <br> Projects</p>
                        <h3 class="card-title">100</h3>
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <p class="card-category">Completed <br> Projects</p>
                        <h3 class="card-title">20</h3>
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon">
                        <div class="card-icon">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <p class="card-category">Pending <br> Projects</p>
                        <h3 class="card-title">5</h3>
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-danger card-header-icon">
                        <div class="card-icon">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <p class="card-category">Overdue <br> Projects</p>
                        <h3 class="card-title">10</h3>
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card-icon">
                                    <i class="material-icons"></i>
                                </div>
                                <h4 class="card-title"></h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <button class="btn btn-primary py-1 px-2" data-toggle="modal" data-target="#addNewTaskModal"><i class="fa fa-plus mr-2"></i>Add New Project</botton>
                            </div>

                        </div>

                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="material-datatables">
                                    <table id="datatables"
                                           class="table table-striped table-no-bordered table-hover"
                                           cellspacing="0" width="100%" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Project's name</th>
                                                <th>Project facilitator</th>
                                                <th>Team Collaborators</th>
                                                <th>Start date</th>
                                                <th>Finished</th>
                                                <th>Actions</th>
                                            </tr>

                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    1
                                                </td>
                                                <td>F1</td>
                                                <td>
                                                    FF1
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm btn-success">FF1</button>
                                                    <button class="btn btn-sm btn-success">FF1</button>
                                                </td>
                                                <td>22/02/2020</td>
                                                <td>22/02/2020</td>
                                                <td class="td-actions text-center">

                                                    <button type="button" rel="tooltip" title="Edit"
                                                            class="btn btn-success btn-round">
                                                        <i class="material-icons">edit</i>
                                                    </button>

                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addNewTaskModal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg pb-0 mb-0">
        <div class="modal-content">
            <div class="card card-signup card-plain">
                <div class="modal-header card-header card-header-primary" style="    width: 90%; left: 5%;">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-8">
                                <h4 class="modal-title">Add New Project</h4>
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
                <div class="row">
                    <div class="form-group  col-sm-3">
                        <label for="proj_name" class="bmd-label-floating">Project's Name</label>
                        <input type="text" class="form-control" id="proj_name" name="proj_name" required="">
                    </div>

                    <div class="form-group  col-sm-3">
                        <label for="proj_strat_goal" class="bmd-label-floating">Strategic Goal of the Project</label>
                        <input type="text" class="form-control" id="proj_strat_goal" name="proj_strat_goal" required="">
                    </div>

                    <div class="form-group col-sm-3">
                        <label for="proj_purpose" class="bmd-label-floating">Purpose </label>
                        <input type="text" class="form-control" id="proj_purpose" name="proj_purpose" required="">
                    </div>
                    <div class="form-group  col-sm-3">
                        <label for="user_area" class="bmd-label-floating">Project Goal</label>
                        <input type="text" class="form-control" id="proj_goal" name="proj_goal" required="">
                    </div>
                </div>


                <div class="row">
                    <div class=" col-sm-4">
                        <div class="form-group">
                            <label for="exampleEmail" class="bmd-label-floating">
                                Select
                                Boss/Leade
                            </label>
                            <select class="selectpicker" data-style="select-with-transition"
                                    multiple title="Choose Boss/Leade" data-size="7">
                                <option disabled> Boss/Leade</option>
                                <option value="2">A </option>
                                <option value="3">B</option>
                                <option value="3">C</option>

                            </select>
                        </div>

                    </div>
                    <div class=" col-sm-4">
                        <div class="form-group">
                            <label for="exampleEmail" class="bmd-label-floating">
                                Select
                                Members
                            </label>
                            <select class="selectpicker" data-style="select-with-transition"
                                    multiple title="Choose Members" data-size="7">
                                <option disabled> Team Members</option>
                                <option value="2">A </option>
                                <option value="3">B</option>
                                <option value="3">C</option>

                            </select>
                        </div>
                    </div>
                    <div class=" col-sm-4">
                        <div class="form-group">
                            <label for="exampleEmail" class="bmd-label-floating">
                                Select Sponsor
                            </label>
                            <select class="selectpicker" data-style="select-with-transition"
                                    multiple title="Choose Sponsor" data-size="7">
                                <option disabled>  Sponsor</option>
                                <option value="2">A </option>
                                <option value="3">B</option>
                                <option value="3">C</option>

                            </select>
                        </div>
                    </div>
                    <div class="  col-sm-4">
                        <label for="proj_st_date" class="bmd-label-floating">Start Date</label>
                        <div class="form-group">
                            <input type="date" class="form-control " id="proj_st_date" name="proj_st_date" required="">

                        </div>
                    </div>
                    <div class="  col-sm-4">
                        <label for="proj_ed_date" class="bmd-label-floating">End Date</label>
                        <div class="form-group">
                            <input type="date" class="form-control " id="proj_ed_date" name="proj_ed_date" onfocus="setEndDate()" required="">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group  col-sm-12">
                            <label for="proj_desc" class="bmd-label-floating">Project Descriptions</label>
                            <input type="text" class="form-control" id="proj_desc" name="proj_desc" required="">
                        </div>
                        <div class="form-group col-sm-12">
                            <div class="col-12">
                            <label for="proj_color" class="bmd-label-floating">Choose Color</label>
                            </div>
                            <div class="col-12 d-flex">
                            <p style="width: 50px; height: 20px; margin-right: 10px; background-color: red;"><p>
                            <p style="width: 50px; height: 20px; margin-right: 10px; background-color: black;"><p>
                            <p style="width: 50px; height: 20px; margin-right: 10px; background-color: yellow;"><p>
                            <p style="width: 50px; height: 20px; margin-right: 10px; background-color: green;"><p>
                            <p style="width: 50px; height: 20px; margin-right: 10px; background-color: blue;"><p>

                        </div>
                         <div class="col-12 text-right">
                         <button type="button" class="btn btn-primary py-1">Save</button>
                         <button type="button" class="btn btn-danger btn-link"
                        data-dismiss="modal">
                           Close
                            </button>
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
@endsection