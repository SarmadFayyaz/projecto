@extends('layouts.user')

@section('title', 'Support')

@section('style')
    <style>
        iframe {
            display:block;
            width:100%;
        }
    </style>
@endsection

@section('content')

    <div class="content mt-md-5">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-sm-10 col-md-5">
                    <div class="card">
                        <div class="card-header card-header-{{ $theme }} card-header-icon">
                            <div class="row">
                                <div class="col">
                                    <div class="card-icon">
                                        <i class="fas fa-video"></i>
                                    </div>
                                    <h4 class="card-title">{{__('header.video_repository')}}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="video_repository" role="tablist">
                                @foreach($videos as $video)
                                    <div class="card-collapse" id="video_div_{{ $video->id }}">
                                        <div class="card-header" role="tab" id="video_heading_{{ $video->id }}">
                                            <h5 class="mb-0">
                                                <a data-toggle="collapse" href="#video_{{ $video->id }}" aria-expanded="false" aria-controls="video_{{ $video->id }}" class="collapsed">
                                                    {{ $video->name }} <i class="material-icons">keyboard_arrow_down</i>
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="video_{{ $video->id }}" class="collapse" role="tabpanel" aria-labelledby="video_heading_{{ $video->id }}" data-parent="#video_repository" style="">
                                            <div class="card-body">
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
                        <div class="card-header card-header-{{ $theme }} card-header-icon">
                            <div class="row">
                                <div class="col">
                                    <div class="card-icon">
                                        <i class="far fa-question-circle"></i>
                                    </div>
                                    <h4 class="card-title">{{__('header.frequently_asked_questions')}}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="faq" role="tablist">
                                @foreach($faqs as $faq)
                                    <div class="card-collapse" id="faq_div_{{ $faq->id }}">
                                        <div class="card-header" role="tab" id="faq_heading_{{ $faq->id }}">
                                            <h5 class="mb-0">
                                                <a data-toggle="collapse" href="#faq_{{ $faq->id }}" aria-expanded="false" aria-controls="faq_{{ $faq->id }}" class="collapsed">
                                                    {{ $faq->question }} <i class="material-icons">keyboard_arrow_down</i>
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="faq_{{ $faq->id }}" class="collapse" role="tabpanel" aria-labelledby="faq_heading_{{ $faq->id }}" data-parent="#faq" style="">
                                            <div class="card-body">
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
    </div>

@endsection

@section('script')
@endsection
