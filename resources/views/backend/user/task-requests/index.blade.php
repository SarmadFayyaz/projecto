@extends('layouts.user')

@section('title', __('header.task_requests'))

@section('style')
    <style>
        @media (min-width: 1200px) {
            .modal-xl {
                max-width: 1050px !important;
                /*left: 130px;*/
                top: 190px
            }
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

        .bootstrap-datetimepicker-widget.dropdown-menu {
            width: auto;
        }

    </style>
@endsection

@section('content')

    <div class="content mt-md-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-{{ $theme }} card-header-icon">
                            <div class="row">
                                <div class="col">
                                    <div class="card-icon">
                                        <i class="fas fa-briefcase"></i>
                                    </div>
                                    <h4 class="card-title">{{__('header.task_requests')}}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="toolbar">
                                <!--        Here you can write extra buttons/actions for the toolbar              -->
                            </div>
                            <div class="material-datatables">
                                <table id="datatables" class="table table-striped table-no-bordered table-hover yajra_datatable" cellspacing="0" width="100%" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{__('header.name')}}</th>
                                            <th>{{__('header.project')}}</th>
                                            <th>{{__('header.added_by')}}</th>
                                            <th>{{__('header.start_date')}}</th>
                                            <th>{{__('header.end_date')}}</th>
                                            <th>{{__('header.status')}}</th>
                                            <th>{{__('header.action')}}</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>{{__('header.name')}}</th>
                                            <th>{{__('header.project')}}</th>
                                            <th>{{__('header.added_by')}}</th>
                                            <th>{{__('header.start_date')}}</th>
                                            <th>{{__('header.end_date')}}</th>
                                            <th>{{__('header.status')}}</th>
                                            <th>{{__('header.action')}}</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                <form action="#" method="get" id="delete_form">
                                    @csrf
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

    {{-- Edit Task Modal --}}
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md pb-0 mb-0">
            <div class="modal-content">

                <div class="card card-signup card-plain">
                    <div class="modal-header card-header card-header-{{ $theme }} rounded" style="    width: 90%; left: 5%;">
                        <h4 class="modal-title font-weight-bold">{{ __('header.edit_task') }}</h4>
                        <a type="button" class="text-white" style="top:0" data-dismiss="modal" aria-hidden="true"> <i class="material-icons">clear</i> </a>
                    </div>
                </div>

                <form action="#" method="post" id="edit_task_form">
                    @csrf
                    <input type="hidden" name="task_id" id="task_id">
                    <div class="modal-body card-body scroll-bar" style="height: 63vh;overflow: auto;">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group @error('name') has-danger @enderror">
                                    <label for="exampleEmail" class="bmd-label-floating">
                                        {{ __('header.task_name') }}
                                    </label> <input type="text" class="form-control" name="name" id="name" required value="{{ old('name') }}">
                                    @error('name')
                                    <label class="error">
                                        {{ $message }}
                                    </label>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group @error('team_members') has-danger @enderror">
                                    <select class="selectpicker" name="team_members[]" id="team_members" multiple data-style="select-with-transition" data-size="4" data-width="100%" title="{{ __('header.choose_members') }}">
                                        <option disabled> {{ __('header.choose_members') }} </option>
                                        @foreach($users as $user)
                                            @if($user->hasRole('User') && $user->id != Auth::user()->id)
                                                <option value="{{ $user->id }}" {{ (in_array($user->id, old('team_members', []))) ? 'selected' : '' }}>
                                                    {{ $user->first_name . ' ' . $user->last_name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('team_members')
                                    <label class="error">
                                        {{ $message }}
                                    </label>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group @error('start_date') has-danger @enderror">
                                    <label for="start_date" class="bmd-label-floating">
                                        {{__('header.start_date')}}
                                    </label> <input type="text" class="form-control date_picker start_date" name="start_date" id="start_date" required value="{{ old('start_date') }}">
                                    @error('start_date')
                                    <label class="error">
                                        {{ $message }}
                                    </label>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group @error('end_date') has-danger @enderror">
                                    <label for="end_date" class="bmd-label-floating">
                                        {{__('header.end_date')}}
                                    </label> <input type="text" class="form-control date_picker end_date" name="end_date" id="end_date" required value="{{ old('end_date') }}">
                                    @error('end_date')
                                    <label class="error">
                                        {{ $message }}
                                    </label>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group @error('description') has-danger @enderror">
                                    <label for="exampleEmail" class="bmd-label-floating">
                                        {{ __('header.brief_description_of_task') }}
                                    </label> <textarea name="description" id="description" cols="30" rows="2" class="form-control">{{ old('description') }}</textarea>
                                    @error('description')
                                    <label class="error">
                                        {{ $message }}
                                    </label>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12" id="actions">
                                <p for="actions" class="bmd-label-floating">
                                    <span>{{ __('header.actions_max') }}</span>
                                    <span class="pull-right"><i class="fa fa-plus text-success cursor-pointer add_action"></i></span>
                                </p>
                                @error('action')
                                <label class="error">
                                    {{ $message }}
                                </label>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success ml-auto mr-auto">
                            {{ __('header.update') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{--    End Edit Modal--}}

    {{--    <!-- Task Details Modal -->--}}
    <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content"></div>
        </div>
    </div>
    {{--    <!--  End Modal -->--}}


@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function () {

            $(document).on('click', '.view', function () {
                event.preventDefault();
                $('#showModal').find('.modal-content').load($(this).attr('href'));
            });

            let _token = $('meta[name="csrf-token"]').attr('content');
            var table = $('.yajra_datatable').DataTable({
                processing: true,
                serverSide: true,
                order: [[0, "desc"]],

                destroy: true,

                ajax: "{{ route('task.requests.get') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false},
                    {data: 'name', name: 'name'},
                    {data: 'project', name: 'project'},
                    {data: 'added_by', name: 'added_by'},
                    {data: 'start_date', name: 'start_date'},
                    {data: 'end_date', name: 'end_date'},
                    {data: 'status', name: 'status'},
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: true
                    },
                ]
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

            $(document).on('click', '.edit', function () {
                let id = $(this).data('id');
                $.ajax({
                    url: APP_URL + '/task/requests/' + id + '/edit',
                    type: 'get',
                    data: {
                        id: id,
                        _token: _token
                    },
                    success: function (result) {
                        $('#task_id').val(result.id);
                        $('#name').val(result.name).closest('.form-group').addClass('is-filled');
                        $('#team_members option').attr('selected', false).attr('disabled', false);
                        $('#team_members option[value=' + result.added_by + ']').attr('disabled', true);
                        for (let i = 0; i < result.task_user.length; i++) {
                            $('#team_members option[value=' + result.task_user[i].user_id + ']').attr('selected', true);
                        }
                        $('#team_members').selectpicker('refresh');
                        $('#start_date').val(result.start_date).closest('.form-group').addClass('is-filled');
                        $('#start_date').data('DateTimePicker').maxDate(result.end_date);
                        $('#end_date').val(result.end_date).closest('.form-group').addClass('is-filled');
                        $('#end_date').data('DateTimePicker').minDate(result.start_date);
                        $('#description').val(result.description).closest('.form-group').addClass('is-filled');

                        $('.added_action').remove();
                        let content = '';
                        for (let i = 0; i < result.task_action.length; i++) {
                            content += '<div class="input-group added_action mb-3">';
                            content += '<div class="input-group-prepend">';
                            content += '<span class="input-group-text action_counter"></span>';
                            content += '</div>';
                            content += '<input type="text" class="form-control" required name="action[]" placeholder="Add Action" value="' + result.task_action[i].name + '">';
                            content += '<div class="input-group-append">';
                            if(i != 0)
                                content += '<span class="input-group-text" ><i class="fa fa-minus text-danger cursor-pointer remove_action"></i></span>';
                            content += '</div>';
                            content += '</div>';
                        }
                        $('#actions').append(content);

                        $('#edit_task_form').attr('action', APP_URL + '/task/requests/update');
                        actionCounter();
                        $('#editModal').modal('show');
                    },
                    error: function (result) {
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
                        $('#delete_form').attr('action', APP_URL + '/task/requests/' + id + '/delete');
                        $('#delete_form').submit();
                    }
                })
            });
        });
    </script>
@endsection
