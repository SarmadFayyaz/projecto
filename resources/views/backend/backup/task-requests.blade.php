@extends('layouts.admin')

@section('title', 'Tasks Requests')

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
                            <p class="card-category">Total Projects</p>
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
                            <p class="card-category">Total Tasks</p>
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
                            <p class="card-category">Delivered Tasks</p>
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
                            <p class="card-category">Tasks Requests</p>
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
                            <div class="card-icon">
                                <i class="material-icons"></i>
                            </div>
                            <h4 class="card-title"></h4>
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
                                                <th> Task Name
                                                </th>
                                                <th>Project </th>
                                                <th>Responsible User</th>
                                                <th>Start date</th>
                                                <th>Finished</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>

                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    1
                                                </td>
                                                <td><i class="fas fa-circle text-warning"></i> F1</td>
                                                <td>
                                                    FF1
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm btn-success">FF1</button>
                                                </td>
                                                <td>22/02/2020</td>
                                                <td>22/02/2020</td>
                                                <td>Pending for approval</td>
                                                <td class="td-actions text-center">
                                                    <button type="button"  title="View"
                                                            class="btn btn-info">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                    <button type="button"  title="Edit"
                                                            class="btn btn-success ">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                    <button type="button"  title="Delete"
                                                            class="btn btn-danger">
                                                        <i class="material-icons">close</i>
                                                    </button>

                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    1
                                                </td>
                                                <td><i class="fas fa-circle text-danger"></i> F1</td>
                                                <td>
                                                    FF1
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm btn-success">FF1</button>
                                                </td>
                                                <td>22/02/2020</td>
                                                <td>22/02/2020</td>
                                                <td>Incomplete</td>
                                                <td class="td-actions text-center">
                                                    <button type="button"  title="View"
                                                            class="btn btn-info">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                    <button type="button"  title="Edit"
                                                            class="btn btn-success ">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                    <button type="button"  title="Delete"
                                                            class="btn btn-danger">
                                                        <i class="material-icons">close</i>
                                                    </button>

                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    1
                                                </td>
                                                <td><i class="fas fa-circle text-success"></i> F1</td>
                                                <td>
                                                    FF1
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm btn-success">FF1</button>
                                                </td>
                                                <td>22/02/2020</td>
                                                <td>22/02/2020</td>
                                                <td>Completed</td>
                                                <td class="td-actions text-center">
                                                    <button type="button"  title="View"
                                                            class="btn btn-info">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                    <button type="button"  title="Edit"
                                                            class="btn btn-success ">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                    <button type="button"  title="Delete"
                                                            class="btn btn-danger">
                                                        <i class="material-icons">close</i>
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

@endsection

@section('script')
@endsection
