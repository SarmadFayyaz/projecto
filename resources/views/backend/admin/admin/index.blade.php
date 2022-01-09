@extends('layouts.admin')

@section('title', __('header.admins'))

@section('style')

@endsection

@section('content')

    <div class="content mt-md-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-success card-header-icon">
                            <div class="row">
                                <div class="col">
                                    <div class="card-icon">
                                        <i class="fas fa-user-cog"></i>
                                    </div>
                                    <h4 class="card-title">{{__('header.admins')}}</h4>
                                </div>
                                <div class="col text-right">
                                    <a class="btn btn-success btn-sm card-title text-white"
                                       href="{{ route('admin.admins.create') }}">
                                        <i class="material-icons">add_box</i>
                                        {{__('header.add_admins')}}
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
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
                                        <th>{{__('header.action')}}</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>{{__('header.name')}}</th>
                                        <th>{{__('header.email')}}</th>
                                        <th>{{__('header.action')}}</th>
                                    </tr>
                                    </tfoot>
                                </table>
                                <form action="#" method="POST" id="delete_form">
                                    @csrf
                                    @method('DELETE')
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
                order: [[0, "desc"]],

                destroy: true,

                ajax: "{{ route('admin.admins.get') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
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
                    title: '{{ __('header.are_you_sure') }}',
                    text: "{!! __('header.you_wont_be_able_to_revert_this_action') !!}",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: '{{ __('header.cancel') }}',
                    confirmButtonText: '{{ __('header.yes') }}'
                }).then((result) => {
                    console.log(result);
                    if (result.value) {
                        $('#delete_form').attr('action', APP_URL + '/admin/admins/' + id);
                        $('#delete_form').submit();
                    }
                })
            });
        });
    </script>
@endsection
