@extends('layouts.app')

@section('title', 'Help')

@section('style')
@endsection

@section('content')

    <div class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Videos Repository</h4>
                        </div>
                        <div class="card-body">
                            <div id="accordion" role="tablist">
                                <div class="card-collapse">
                                    <div class="card-header" role="tab" id="headingOne">
                                        <h5 class="mb-0">
                                            <a data-toggle="collapse" href="#collapseOne"
                                               aria-expanded="true" aria-controls="collapseOne"
                                               class="collapsed">
                                                Testing Link
                                                <i class="material-icons">keyboard_arrow_down</i>
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseOne" class="collapse show" role="tabpanel"
                                         aria-labelledby="headingOne" data-parent="#accordion" style="">
                                        <div class="card-body">
                                            <iframe width="100%"
                                                    src="https://www.youtube.com/embed/rGMfjv4te48"
                                                    title="YouTube video player" frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-collapse">
                                    <div class="card-header" role="tab" id="headingTwo">
                                        <h5 class="mb-0">
                                            <a class="collapsed" data-toggle="collapse" href="#collapseTwo"
                                               aria-expanded="false" aria-controls="collapseTwo">
                                                Explanation of Purpose
                                                <i class="material-icons">keyboard_arrow_down</i>
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse" role="tabpanel"
                                         aria-labelledby="headingTwo" data-parent="#accordion">
                                        <div class="card-body">
                                            <iframe width="100%"
                                                    src="https://www.youtube.com/embed/rGMfjv4te48"
                                                    title="YouTube video player" frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Frequently Asked Questions</h4>
                        </div>
                        <div class="card-body">
                            <div id="accordion" role="tablist">


                                <div class="card-collapse">
                                    <div class="card-header" role="tab" id="headingThree">
                                        <h5 class="mb-0">
                                            <a class="collapsed" data-toggle="collapse"
                                               href="#collapseThree" aria-expanded="false"
                                               aria-controls="collapseThree">
                                                How does platform work ?
                                                <i class="material-icons">keyboard_arrow_down</i>
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseThree" class="collapse" role="tabpanel"
                                         aria-labelledby="headingThree" data-parent="#accordion">
                                        <div class="card-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life
                                            accusamus
                                            terry richardson ad squid. 3 wolf moon officia aute, non
                                            cupidatat
                                            skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                            eiusmod.
                                            Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                                            single-origin coffee nulla assumenda shoreditch et. Nihil anim
                                            keffiyeh helvetica, craft beer labore wes anderson cred nesciunt
                                            sapiente ea proident. Ad vegan excepteur butcher vice lomo.
                                            Leggings
                                            occaecat craft beer farm-to-table, raw denim aesthetic synth
                                            nesciunt you probably haven't heard of them accusamus labore
                                            sustainable VHS.
                                        </div>
                                    </div>
                                </div>

                                <div class="card-collapse">
                                    <div class="card-header" role="tab" id="heading4">
                                        <h5 class="mb-0">
                                            <a class="collapsed" data-toggle="collapse" href="#collapse4"
                                               aria-expanded="false" aria-controls="collapse4">
                                                Where do I do new projects ?
                                                <i class="material-icons">keyboard_arrow_down</i>
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapse4" class="collapse" role="tabpanel"
                                         aria-labelledby="heading4" data-parent="#accordion">
                                        <div class="card-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life
                                            accusamus
                                            terry richardson ad squid. 3 wolf moon officia aute, non
                                            cupidatat
                                            skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                            eiusmod.
                                            Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                                            single-origin coffee nulla assumenda shoreditch et. Nihil anim
                                            keffiyeh helvetica, craft beer labore wes anderson cred nesciunt
                                            sapiente ea proident. Ad vegan excepteur butcher vice lomo.
                                            Leggings
                                            occaecat craft beer farm-to-table, raw denim aesthetic synth
                                            nesciunt you probably haven't heard of them accusamus labore
                                            sustainable VHS.
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <button type="button" class="btn btn-default dropdown-toggle btn-link" data-toggle="dropdown">
7 days
</button> -->

    </div>
@endsection

@section('script')
@endsection
