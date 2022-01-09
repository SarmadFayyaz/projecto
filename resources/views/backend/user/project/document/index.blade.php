<!-- Document Modal -->
<div class="modal fade" id="documentModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content m-0 p-0">
            <div class="card card-signup card-plain">
                <div class="modal-header card-header card-header-{{ $theme }} rounded" style="    width: 90%; left: 5%;">
                    <h4 class="modal-title font-weight-bold">{{ __('header.documents_library') }}</h4>
                    <a type="button" class="text-white" style="top:0" data-dismiss="modal" aria-hidden="true"> <i class="material-icons">clear</i> </a>
                </div>
            </div>
{{--            <div class="modal-header">--}}
{{--                <h4 class="modal-title">Lorem Lorem Lorem</h4>--}}
{{--                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">--}}
{{--                    <i class="material-icons">clear</i>--}}
{{--                </button>--}}
{{--            </div>--}}
            <div class="modal-body mb-0 pb-0 pt-0">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card mb-0 pb-0" style="height:65vh">
                            <div class="text-center card-header">
                                <label for="document_upload" class="m-0 btn btn-{{ $theme }}"> {{ __('header.upload_files') }}
                                    <input type="file" id="document_upload" name="file" style="display:none">
                                </label>
                            </div>
                            <div class="card-body">
                                <ul class="nav nav-pills nav-pills-{{ $theme }} nav-pills-icons flex-column" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active get_documents doc_all_nav" data-toggle="tab" href="{{ route('get-document', ['all' , $project->id]) }}" role="tablist"><i class="material-icons">dns</i>{{ __('header.all_documents') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link get_documents doc_imp_nav" data-toggle="tab" href="{{ route('get-document', [3 , $project->id]) }}" role="tablist"><i class="material-icons">label_important</i>{{ __('header.important') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link get_documents" data-toggle="tab" href="{{ route('get-document', [2 , $project->id]) }}" role="tablist"><i class="material-icons">schedule</i>{{ __('header.recent') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link get_documents" data-toggle="tab" href="{{ route('get-document', [1 , $project->id]) }}" role="tablist"><i class="material-icons">textsms</i>{{ __('header.binnacle') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link get_documents" data-toggle="tab" href="{{ route('get-document', [0 , $project->id]) }}" role="tablist"><i class="material-icons">chat</i>{{ __('header.chat') }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-9">
                        <div class="card scroll-bar mb-0 pb-0" style="height:63vh">
                            {{--                            <div class="card-header">--}}
                            {{--                                <nav aria-label="breadcrumb">--}}
                            {{--                                    <ol class="breadcrumb">--}}
                            {{--                                        <li class="breadcrumb-item"><a href="#">lorem</a></li>--}}
                            {{--                                        <li class="breadcrumb-item"><a href="#">lorem</a></li>--}}
                            {{--                                        <li class="breadcrumb-item active" aria-current="page">lorem</li>--}}
                            {{--                                    </ol>--}}
                            {{--                                </nav>--}}
                            {{--                                <div class="row ">--}}

                            {{--                                    <div class="col-sm-6">--}}
                            {{--                                        <select class="selectpicker" data-size="7" data-style="select-with-transition" title="Add">--}}
                            {{--                                            <option value="Name"> Name</option>--}}
                            {{--                                            <option value="Size"> Size</option>--}}

                            {{--                                        </select>--}}

                            {{--                                    </div>--}}
                            {{--                                    <div class="col-sm-6">--}}
                            {{--                                        <form class="form-horizontal full-right">--}}
                            {{--                                            <div class="form-group">--}}
                            {{--                                                <input placeholder="Search..." type="text" class="form-control ">--}}
                            {{--                                            </div>--}}
                            {{--                                        </form>--}}

                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            <div class="card-body mt-0 pt-0 doc_div"></div>
                            <div class="ps__rail-x" style="width: 765px; left: 0px; bottom: 0px;">
                                <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 698px;">

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer mb-0 pb-0">
                <!-- <button type="button" class="btn btn-link">Nice Button</button> -->
                <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">
                    {{ __('header.close') }}
                </button>
            </div>
        </div>
    </div>
</div><!--  End Modal -->
