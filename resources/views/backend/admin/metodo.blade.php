@extends('layouts.admin')

@section('title', 'Me Todo')

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
                        <div class="row">
                            <div class="col-md-9"></div>
                            <div class="col-md-3"><h4> <b>Canvas</b></h4></div>

                        </div>
                        <div id="build-wrap"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('script')
{{--    <script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-8216c69d01441f36c0ea791ae2d4469f0f8ff5326f00ae2d00e4bb7d20e24edb.js"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
    <script src="https://formbuilder.online/assets/js/form-builder.min.js"></script>
    <script>


        jQuery($ => {
            const fbTemplate = document.getElementById('build-wrap');
            $(fbTemplate).formBuilder();
        });
    </script>
@endsection
