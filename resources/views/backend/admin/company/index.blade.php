@extends('layouts.admin')

@section('title', __('header.companies'))

@section('style')

@endsection

@section('content')

    <div class="content mt-md-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-info card-header-icon">
                            <div class="row">
                                <div class="col">
                                    <div class="card-icon">
                                        <i class="fas fa-briefcase"></i>
                                    </div>
                                    <h4 class="card-title">{{__('header.companies')}}</h4>
                                </div>
                                <div class="col text-right">
                                    <a class="btn btn-round btn-info btn-sm card-title text-white"
                                       href="{{ route('admin.company.create') }}">
                                        <i class="material-icons">add_box</i>
                                        {{__('header.add_companies')}}
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <div class="toolbar">
                                <!--        Here you can write extra buttons/actions for the toolbar              -->
                            </div>
                            <div class="material-datatables">
                                <table id="datatables"
                                       class="table table-striped table-no-bordered table-hover yajra_datatable"
                                       cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{__('header.name')}}</th>
                                        <th>{{__('header.email')}}</th>
                                        <th>{{__('header.added_by')}}</th>
                                        <th>{{__('header.action')}}</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>{{__('header.name')}}</th>
                                        <th>{{__('header.email')}}</th>
                                        <th>{{__('header.added_by')}}</th>
                                        <th>{{__('header.action')}}</th>
                                    </tr>
                                    </tfoot>
                                </table>
                                <form action="#" method="post" id="delete_form">
                                    @csrf
                                    @method('delete')
                                </form>
                            </div>
                        </div>
                        <!-- end content-->
                    </div>
                    <!--  end card  -->
                </div>
                <!-- end col-md-12 -->
            </div>
            <!-- end row -->
        </div>
    </div>

@endsection

@section('script')
    <script type="text/javascript">


        $(document).ready(function () {
            var table = $('.yajra_datatable').DataTable({
                processing: true,
                serverSide: true,
                order: [],

                destroy: true,

                ajax: "{{ route('admin.company.get') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'admin_id', name: 'admin_id'},
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: true
                    },
                ]
            });

            $(document).on('click', '.remove', function () {
                let id = $(this).data('id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        $('#delete_form').attr('action', APP_URL + '/admin/company/' + id);
                        $('#delete_form').submit();
                    }
                })
            });
        });
    </script>
@endsection
