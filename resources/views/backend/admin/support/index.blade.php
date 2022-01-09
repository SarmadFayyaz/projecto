@extends('layouts.admin')

@section('title', __('header.support'))

@section('style')
    <style>
        iframe {
            display: block;
            width: 100%;
        }
    </style>
@endsection

@section('content')

    <div class="content mt-md-5">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header card-header-info card-header-icon">
                            <div class="row">
                                <div class="col">
                                    <div class="card-icon">
                                        <i class="far fa-comments"></i>
                                    </div>
                                    <h4 class="card-title">{{__('header.user_comments')}}</h4>
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
                                        <th>{{__('header.comment')}}</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>{{__('header.name')}}</th>
                                        <th>{{__('header.email')}}</th>
                                        <th>{{__('header.comment')}}</th>
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
                </div>
                <div class="col-sm-10 col-md-5">
                    <div class="card">
                        <div class="card-header card-header-info card-header-icon">
                            <div class="row">
                                <div class="col">
                                    <div class="card-icon">
                                        <i class="fas fa-video"></i>
                                    </div>
                                    <h4 class="card-title">{{__('header.video_repository')}}</h4>
                                </div>
                                <div class="col-3 text-right">
                                    <a class="btn btn-info btn-sm card-title text-white add_video" href="javascript:;">
                                        <i class="material-icons">add_box</i>
                                        {{__('header.add_new')}}
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="video_repository" role="tablist">
                                @foreach($videos as $video)
                                    <div class="card-collapse" id="video_div_{{ $video->id }}">
                                        <div class="card-header" role="tab" id="video_heading_{{ $video->id }}">
                                            <h5 class="mb-0">
                                                <a data-toggle="collapse" href="#video_{{ $video->id }}"
                                                   aria-expanded="false" aria-controls="video_{{ $video->id }}"
                                                   class="collapsed">
                                                    {{ $video->name }} <i class="material-icons">keyboard_arrow_down</i>
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="video_{{ $video->id }}" class="collapse" role="tabpanel"
                                             aria-labelledby="video_heading_{{ $video->id }}"
                                             data-parent="#video_repository" style="">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col text-right">
                                                        <a href="{{ route('admin.video.destroy', $video->id) }}"
                                                           class="btn btn-sm btn-danger" data-delete="delete">
                                                            {{ __('header.delete') }}
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        {{ $video->description }}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        {!! $video->link !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-10 col-md-5">
                    <div class="card">
                        <div class="card-header card-header-info card-header-icon">
                            <div class="row">
                                <div class="col">
                                    <div class="card-icon">
                                        <i class="far fa-question-circle"></i>
                                    </div>
                                    <h4 class="card-title">{{__('header.frequently_asked_questions')}}</h4>
                                </div>
                                <div class="col-3 text-right">
                                    <a class="btn btn-info btn-sm card-title text-white add_faq" href="javascript:;">
                                        <i class="material-icons">add_box</i>
                                        {{__('header.add_new')}}
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="faq" role="tablist">
                                @foreach($faqs as $faq)
                                    <div class="card-collapse" id="faq_div_{{ $faq->id }}">
                                        <div class="card-header" role="tab" id="faq_heading_{{ $faq->id }}">
                                            <h5 class="mb-0">
                                                <a data-toggle="collapse" href="#faq_{{ $faq->id }}"
                                                   aria-expanded="false" aria-controls="faq_{{ $faq->id }}"
                                                   class="collapsed">
                                                    {{ $faq->question }} <i
                                                        class="material-icons">keyboard_arrow_down</i>
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="faq_{{ $faq->id }}" class="collapse" role="tabpanel"
                                             aria-labelledby="faq_heading_{{ $faq->id }}" data-parent="#faq" style="">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col text-right">
                                                        <a href="{{ route('admin.faq.destroy', $faq->id) }}"
                                                           class="btn btn-sm btn-danger" data-delete="delete">
                                                            {{ __('header.delete') }}
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        {{ $faq->answer }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--        Modal to add Video--}}
        <div class="modal fade show" id="addVideoModal" tabindex="-1" role="">
            <div class="modal-dialog modal-custom" role="document">
                <div class="modal-content">
                    <div class="card card-signup card-plain">
                        <div class="modal-header">
                            <div class="card-header card-header-primary text-center" id="new-blue-bg">
                                <a type="button" class="text-white close" data-dismiss="modal" aria-hidden="true">
                                    <i class="material-icons">clear</i>
                                </a>

                                <h4 class="card-title">{{ __('header.add_new_video') }}</h4>

                            </div>
                        </div>
                        <form method="post" action="{{ route('admin.video.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        <input type="text" class="form-control" name="name"
                                               placeholder="{{ __('header.name') }}" required>
                                        <br>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        <input type="text" class="form-control" name="description"
                                               placeholder="{{ __('header.description') }}">
                                        <br>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        <input type="text" class="form-control" name="link"
                                               placeholder="{{ __('header.embedded_link') }}" required>
                                        <br>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        <select class="form-control" name="status" required>
                                            <option value="" selected disabled>{{ __('header.status') }}</option>
                                            <option value="0">{{ __('header.inactive') }}</option>
                                            <option value="1">{{ __('header.active') }}</option>
                                        </select>
                                        <br>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer justify-content-center">
                                <button type="submit" id="creat-pre-text-btn" class="btn btn-primary btn-wd"
                                        value="Save" style="background: #36baaf;">Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{--        Modal to add Faq--}}
        <div class="modal fade show" id="addFaqModal" tabindex="-1" role="">
            <div class="modal-dialog modal-custom" role="document">
                <div class="modal-content">
                    <div class="card card-signup card-plain">
                        <div class="modal-header">
                            <div class="card-header card-header-primary text-center" id="new-blue-bg">
                                <a type="button" class="text-white close" data-dismiss="modal" aria-hidden="true">
                                    <i class="material-icons">clear</i>
                                </a>

                                <h4 class="card-title">{{ __('header.add_new_question') }}</h4>

                            </div>
                        </div>
                        <form method="post" action="{{ route('admin.faq.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        <input type="text" class="form-control" name="question"
                                               placeholder="{{ __('header.question') }}" required>
                                        <br>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        <input type="text" class="form-control" name="answer"
                                               placeholder="{{ __('header.answer') }}">
                                        <br>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        <select class="form-control" name="status" required>
                                            <option value="" selected disabled>{{ __('header.status') }}</option>
                                            <option value="0">{{ __('header.inactive') }}</option>
                                            <option value="1">{{ __('header.active') }}</option>
                                        </select>
                                        <br>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer justify-content-center">
                                <button type="submit" id="creat-pre-text-btn" class="btn btn-primary btn-wd"
                                        value="Save" style="background: #36baaf;">Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $(document).on('click', '.add_video', function () {
                $('#addVideoModal').modal('show');
            });
            $(document).on('click', '.add_faq', function () {
                $('#addFaqModal').modal('show');
            });

            $(document).on('click', 'a[data-delete=delete]', function (e) {
                e.preventDefault();
                let $this = $(this);
                swal({
                    title: '{{ __('header.are_you_sure') }}',
                    type: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '{{ __('header.yes') }}',
                    cancelButtonText: '{{ __('header.cancel') }}',
                    confirmButtonClass: 'btn btn-success ml-1',
                    cancelButtonClass: 'btn btn-danger mr-1',
                    buttonsStyling: false,
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        $.post({
                            data: {
                                "_token": " {{ csrf_token()  }} ",
                            },
                            type: 'delete',
                            url: $this.attr('href')
                        }).done(function (data) {
                            $('#' + data.type + '_div_' + data.id).remove();
                            toastr.success(data.success);
                        });
                    }
                });
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            var table = $('.yajra_datatable').DataTable({
                processing: true,
                serverSide: true,
                order: [],

                destroy: true,

                ajax: "{{ route('admin.support.get') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'comment', name: 'comment'},
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
                    if (result.value) {
                        $('#delete_form').attr('action', APP_URL + '/admin/company/' + id);
                        $('#delete_form').submit();
                    }
                })
            });
        });
    </script>
@endsection
