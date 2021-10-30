@extends('layouts.admin')

@section('title', __('header.method_o'))

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

        /* body {
  padding: 0;
  margin: 10px 0;
  background: #f2f2f2 url('https://formbuilder.online/assets/img/noise.png');
} */
    </style>
@endsection

@section('content')

    <div class="content mt-4">
        <div class="content mt-4">
            <div class="container-fluid mt-4">
                <div class="card">
                    <div class="card-body">
                        <div id="build-wrap"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
    <script src="https://formbuilder.online/assets/js/form-builder.min.js"></script>
    <script>

        jQuery($ => {
            let build_wrap = document.getElementById('build-wrap');
            var options = {
                defaultFields: {!! ($form->form != null) ? json_decode($form->form) : '[]' !!}
            }
            let form_builder = $(build_wrap).formBuilder(options);
            $(document).on('click', '.save-template', function () {
                const form = form_builder.actions.getData('json', true);
                if (form == null || form == '' || form == [] || form == '[]')
                    toastr.info('Please add fields first.');
                else {
                    $.ajax({
                        type: "PUT",
                        url: '{{ route('admin.form.update', $form->id) }}',
                        data: {
                            'form': form,
                            "_token": " {{ csrf_token()  }} ",
                        },
                        success: function (result) {
                            toastr.success(result.success);
                        },
                        error: function (result) {
                            if (result.status == 422) { // when status code is 422, it's a validation issue
                                $.each(result.responseJSON.errors, function (i, error) {
                                    toastr.error(error);
                                });
                            } else
                                toastr.error(result.error);
                        }
                    });
                }
            });
        });

    </script>
@endsection
