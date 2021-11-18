@extends('layouts.user')

@section('title', __('header.projects'))

@section('style')

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
                                    <h4 class="card-title">{{__('header.projects')}}</h4>
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
                                            <th>{{__('header.boss_leader')}}</th>
                                            <th>{{__('header.team_members')}}</th>
                                            <th>{{__('header.sponsors')}}</th>
                                            <th>{{__('header.start_date')}}</th>
                                            <th>{{__('header.end_date')}}</th>
                                            <th>{{__('header.action')}}</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>{{__('header.name')}}</th>
                                            <th>{{__('header.boss_leader')}}</th>
                                            <th>{{__('header.team_members')}}</th>
                                            <th>{{__('header.sponsors')}}</th>
                                            <th>{{__('header.start_date')}}</th>
                                            <th>{{__('header.end_date')}}</th>
                                            <th>{{__('header.action')}}</th>
                                        </tr>
                                    </tfoot>
                                </table>
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

    {{-- Edit Project Modal --}}
    <div class="modal fade" id="edit_project_modal" tabindex="-1" role="">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="card card-signup card-plain">
                    <div class="modal-header card-header card-header-{{ $theme }} p-2 w-75 ml-auto mr-auto rounded">
                        <h4 class="text-center w-100 mb-1 mt-1 font-weight-bold">
                            {{__('header.edit_project')}}
                        </h4>
                        <a type="button" class="text-white" data-dismiss="modal" aria-hidden="true"> <i class="material-icons">clear</i> </a>
                    </div>

                </div>

                <form method="post" action="#" enctype="multipart/form-data" id="update_project_form">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-6 mt-2">
                                <div class="form-group @error('name') has-danger @enderror">
                                    <label for="name" class="bmd-label-floating">{{__('header.name')}}</label> <input type="text" class="form-control" name="name" id="name" required value="{{ old('name') }}">
                                    @error('name')
                                    <label class="error">
                                        {{ $message }}
                                    </label>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 mt-2">
                                <div class="form-group @error('strategic_goal') has-danger @enderror">
                                    <label for="strategic_goal" class="bmd-label-floating">{{__('header.strategic_goal')}}</label> <input type="text" class="form-control" name="strategic_goal" id="strategic_goal" required
                                                                                                                                          value="{{ old('strategic_goal') }}">
                                    @error('strategic_goal')
                                    <label class="error">
                                        {{ $message }}
                                    </label>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 mt-2">
                                <div class="form-group @error('purpose') has-danger @enderror">
                                    <label for="purpose" class="bmd-label-floating">{{__('header.purpose')}}</label> <input type="text" class="form-control" name="purpose" id="purpose" required value="{{ old('purpose') }}">
                                    @error('purpose')
                                    <label class="error">
                                        {{ $message }}
                                    </label>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 mt-2">
                                <div class="form-group @error('project_goal') has-danger @enderror">
                                    <label for="project_goal" class="bmd-label-floating">{{__('header.project_goal')}}</label> <input type="text" class="form-control" name="project_goal" id="project_goal" required
                                                                                                                                      value="{{ old('project_goal') }}">
                                    @error('project_goal')
                                    <label class="error">
                                        {{ $message }}
                                    </label>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 mt-2">
                                <div class="form-group @error('project_leader') has-danger @enderror">
                                    <select class="selectpicker" name="project_leader" id="project_leader" required data-style="select-with-transition" data-size="4" data-width="100%" title="{{ __('header.select_boss_leader') }}">
                                        <option disabled> {{ __('header.select_boss_leader') }} </option>
                                        @foreach($users as $user)
                                            @if($user->hasRole('Boss'))
                                                <option value="{{ $user->id }}" {{ ($user->id == old('project_leader')) ? 'selected' : '' }}>
                                                    {{ $user->first_name . ' ' . $user->last_name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('project_leader')
                                    <label class="error">
                                        {{ $message }}
                                    </label>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 mt-2">
                                <div class="form-group @error('team_members') has-danger @enderror">
                                    <select class="selectpicker" name="team_members[]" id="team_members" multiple data-style="select-with-transition" data-size="4" required data-width="100%" title="{{ __('header.select_team_members') }}">
                                        <option disabled> {{ __('header.select_team_members') }} </option>
                                        @foreach($users as $user)
                                            @if($user->hasRole('User'))
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
                            <div class="col-sm-12 col-md-4 mt-2">
                                <div class="form-group @error('sponsors') has-danger @enderror">
                                    <select class="selectpicker" name="sponsors[]" id="sponsors" multiple required data-style="select-with-transition" data-size="4" data-width="100%" title="{{ __('header.select_sponsors') }}">
                                        <option disabled> {{ __('header.select_sponsors') }} </option>
                                        @foreach($users as $user)
                                            @if($user->hasRole('Sponsor'))
                                                <option value="{{ $user->id }}" {{ (in_array($user->id, old('sponsors', []))) ? 'selected' : '' }}>
                                                    {{ $user->first_name . ' ' . $user->last_name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('sponsors')
                                    <label class="error">
                                        {{ $message }}
                                    </label>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 mt-2">
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
                            <div class="col-sm-12 col-md-6 mt-2">
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
                            <div class="col-12 p-0">
                                <div class="row form-group color-div">
                                    <div class="col-12">
                                        <label for="color" class="bmd-label-floating">
                                            {{__('header.select_color')}}
                                        </label>
                                    </div>
                                    <div class="col center">
                                        <label class="btn btn-sm btn-info rounded w-100">
                                            {{ __('header.blue') }}
                                            <input type="radio" name="color" id="blue" value="blue"> </label>
                                    </div>
                                    <div class="col center">
                                        <label class="btn btn-sm btn-secondary rounded w-100 active">
                                            {{ __('header.gray') }}
                                            <input type="radio" name="color" id="gray" value="gray"> </label>
                                    </div>
                                    <div class="col center">
                                        <label class="btn btn-sm btn-success rounded w-100">
                                            {{ __('header.green') }}
                                            <input type="radio" name="color" id="green" value="green"> </label>
                                    </div>
                                    <div class="col center">
                                        <label class="btn btn-sm btn-warning rounded w-100">
                                            {{ __('header.yellow') }}
                                            <input type="radio" name="color" id="yellow" value="yellow"> </label>
                                    </div>
                                    <div class="col center">
                                        <label class="btn btn-sm btn-danger rounded w-100">
                                            {{ __('header.red') }}
                                            <input type="radio" name="color" id="red" value="red"> </label>
                                    </div>
                                    <div class="col center">
                                        <label class="btn btn-sm btn-dark rounded w-100 active">
                                            {{ __('header.black') }}
                                            <input type="radio" name="color" id="black" value="black"> </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-2">
                                <div class="form-group @error('description') has-danger @enderror">
                                    <label for="description" class="bmd-label-floating">{{__('header.description')}}</label> <textarea class="form-control" name="description" id="description" cols="30"
                                                                                                                                       rows="3">{{ old('description') }}</textarea>
                                    @error('description')
                                    <label class="error">
                                        {{ $message }}
                                    </label>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer ">
                        <button type="submit" class="btn btn-fill btn-succes ml-auto">{{__('header.update')}}</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            let _token = $('meta[name="csrf-token"]').attr('content');
            var table = $('.yajra_datatable').DataTable({
                processing: true,
                serverSide: true,
                order: [[0, "desc"]],

                destroy: true,

                ajax: "{{ route('projects.get') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false},
                    {data: 'name', name: 'name'},
                    {data: 'boss_leader', name: 'boss_leader'},
                    {data: 'team_members', name: 'team_members'},
                    {data: 'sponsors', name: 'sponsors'},
                    {data: 'start_date', name: 'start_date'},
                    {data: 'end_date', name: 'end_date'},
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
                    url: APP_URL + '/project/' + id + '/edit',
                    type: 'get',
                    data: {
                        id: id,
                        _token: _token
                    },
                    success: function (result) {
                        $('#name').val(result.name).closest('.form-group').addClass('is-filled');
                        $('#strategic_goal').val(result.strategic_goal).closest('.form-group').addClass('is-filled');
                        $('#purpose').val(result.purpose).closest('.form-group').addClass('is-filled');
                        $('#project_goal').val(result.project_goal).closest('.form-group').addClass('is-filled');
                        $('#project_leader').val(result.project_leader).selectpicker('refresh');
                        for (let i = 0; i < result.project_user.length; i++) {
                            $('#team_members option[value=' + result.project_user[i].user_id + ']').attr('selected', true);
                            $('#sponsors option[value=' + result.project_user[i].user_id + ']').attr('selected', true);
                        }
                        $('#team_members').selectpicker('refresh');
                        $('#sponsors').selectpicker('refresh');
                        $('#start_date').val(result.start_date).closest('.form-group').addClass('is-filled');
                        $('#start_date').data('DateTimePicker').maxDate(result.end_date);
                        $('#end_date').val(result.end_date).closest('.form-group').addClass('is-filled');
                        $('#end_date').data('DateTimePicker').minDate(result.start_date);
                        $('.color-div #' + result.color).prop('checked', true);
                        $('#description').val(result.description).closest('.form-group').addClass('is-filled');
                        $('#update_project_form').attr('action', 'project/' + result.id);
                        $('#edit_project_modal').modal('show');
                    },
                    error: function (result) {
                    }
                });
            });

            $(document).on('click', '.finish', function (e) {
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
                        window.location = $(this).attr('href');
                    }
                });
            });
        });
    </script>
@endsection
