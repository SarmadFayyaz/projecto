@extends('layouts.user')

@section('title', 'Video')

@section('style')
    <link rel="stylesheet" type="text/css" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/cupertino/jquery-ui.css"/>
    <style>
        .modal-xxl {
            max-width: 80%;
        }

        .vide_mirror_name {

            color: #ffffff;
            position: relative;
            background: #00000088;
            bottom: 3vh;
            padding: 2px;
            border-radius: 6px;
        }

        .share_screen {
            width: 100px;
            position: relative;
            margin-top: -100px;
        }

        .bootstrap-datetimepicker-widget.dropdown-menu {
            width: auto;
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

        #myCarousel {

        img {
            height: 50%;
            width: auto;
            margin-left: auto;
            margin-right: auto;
            display: block;
        }

        }

        #thumbSlider {

        .carousel-inner {
            padding-left: 3rem;
            padding-right: 3rem;

        .row {
            overflow: hidden;
        }

        .thumb {

        &
        :hover {
            cursor: pointer;
        }

        &
        .active img {
            opacity: 1;
        }

        }

        img {
            height: 150px;
            margin-left: auto;
            margin-right: auto;
            display: block;
            opacity: .5;

        &
        :hover {
            opacity: 1;
        }

        }

        .carousel-control-prev-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20fill='%23000'%20viewBox='0%200%208%208'%3E%3Cpath%20d='M5.25%200l-4%204%204%204%201.5-1.5-2.5-2.5%202.5-2.5-1.5-1.5z'/%3E%3C/svg%3E");
        }

        .carousel-control-next-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20fill='%23000'%20viewBox='0%200%208%208'%3E%3Cpath%20d='M2.75%200l-1.5%201.5%202.5%202.5-2.5%202.5%201.5%201.5%204-4-4-4z'/%3E%3C/svg%3E");
        }

        }
        }

        .h6css {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            /*width: 95px;*/
            width: auto;
        }

        .doc_name {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            width: 100%;
        }

        .accordion-button::after {
            display: none;
        }

        .nav-pills .nav-item .nav-link {
            line-height: 10px;
            text-transform: uppercase;
            font-size: 12px;
            font-weight: 500;
            min-width: 73px !important;
            text-align: center;
            color: #555;
            transition: all .3s;
            border-radius: 0.2rem !important;
            padding: 10px 15px;
        }

        /*.nav-pills.nav-pills-warning .nav-item .nav-link.active, .nav-pills.nav-pills-warning .nav-item .nav-link.active:focus, .nav-pills.nav-pills-warning .nav-item .nav-link.active:hover {*/
        /*    background-color: #36baaf;*/
        /*    box-shadow: 0 4px 20px 0px rgb(0 0 0 / 14%), 0 7px 10px -5px rgb(255 152 0 / 40%);*/
        /*    color: #fff;*/
        /*}*/

        @media (min-width: 1200px) {
            #shareScreenModal .modal-xl {
                max-width: 1050px !important;
            }

            #completedTaskModal .modal-lg {
                top: 250px
            }
        }

        @media (min-width: 1200px) {
            #taskDetailsModal .modal-xl {
                max-width: 1050px !important;
                /*left: 130px;*/
                top: 250px
            }
        }

        @media (min-width: 1200px) {
            #documentModal .modal-xl {
                max-width: 1000px !important;
                /* left: 130px; */
            }
        }

        /* Button used to open the chat form - fixed at the bottom of the page */
        .open-button {
            background-color: #555;
            color: white;
            padding: 16px 20px;
            border: none;
            cursor: pointer;
            opacity: 0.8;
            position: fixed;
            bottom: 23px;
            right: 28px;
            width: 280px;
        }

        /* Add styles to the form container */
        .form-container {
            max-width: 300px;
            padding: 10px;
            background-color: white;
        }

        /* Full-width textarea */
        .form-container textarea {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            border: none;
            background: #f1f1f1;
            resize: none;
            min-height: 200px;
        }

        /* When the textarea gets focus, do something */
        .form-container textarea:focus {
            background-color: #ddd;
            outline: none;
        }

        /* Set a style for the submit/send button */
        .form-container .btn {
            background-color: #04AA6D;
            color: white;
            padding: 16px 20px;
            border: none;
            cursor: pointer;
            width: 100%;
            margin-bottom: 10px;
            opacity: 0.8;
        }

        /* Add a red background color to the cancel button */
        .form-container .cancel {
            background-color: red;
        }

        /* Add some hover effects to buttons */
        .form-container .btn:hover, .open-button:hover {
            opacity: 1;
        }


        .MultiCarousel {
            float: left;
            overflow: hidden;
            padding: 0px 50px;
            width: 100%;
            position: relative;
        }

        .MultiCarousel .MultiCarousel-inner {
            transition: 1s ease all;
            float: left;
        }

        .MultiCarousel .MultiCarousel-inner .item {
            float: left;
            text-align: center;
            /*max-height: 21vh;*/
        }

        .MultiCarousel .MultiCarousel-inner .item > div {
            text-align: center;
            /*padding: 5px;*/
            margin: 1px 2px;
            background: #000000;
            color: #ffffff;
            height: 21vh;
            min-height: 21vh;
        }

        .MultiCarousel .leftLst, .MultiCarousel .rightLst {
            position: absolute;
            border-radius: 50%;
            top: calc(50% - 23px);
            padding: 7px 7px;
        }

        .MultiCarousel .leftLst {
            left: 0;
        }

        .MultiCarousel .rightLst {
            right: 0;
        }

        .MultiCarousel .leftLst.over, .MultiCarousel .rightLst.over {
            pointer-events: none;
            background: #cccccc;
        }

        .meeting_mode .item {
            text-align: center;
            /*padding: 5px;*/
            margin: 1px;
            background: #000000;
            color: #ffffff;
            height: 32.7vh;
            min-height: 32.7vh;
        }
    </style>
@endsection
@section('content')

    <div class="content">
        <div class="container-fluid">
            <a href="javascript:;" class="btn btn-primary call_to_user">Call</a>
            <div class="row">
                <div class="col-12 ">
                    <div class="MultiCarousel" data-items="1,3,5,6" data-slide="5" id="MultiCarousel" data-interval="1000">
                        <div class="MultiCarousel-inner">
                            <div class="item">
                                <div id="" class="vide_mirror div{{$project->project_leader}} rounded" data-user-name="{{$project->projectLeader->first_name . ' ' . $project->projectLeader->last_name}}"></div>
                                <a href="javascript:void(0)" class="vide_mirror_name">
                                    {{ $project->projectLeader->first_name . ' ' . $project->projectLeader->last_name }}
                                </a>
                            </div>
                            @foreach($project->projectUser as $user)
                                @if($user->user->deleted_at == null)
                                    <div class="item">
                                        <div id="" class="vide_mirror div{{$user->user->id}} rounded" data-user-name="{{ $user->user->first_name . ' ' . $user->user->last_name }}"></div>
                                        <a href="javascript:void(0)" class="vide_mirror_name">
                                            {{ $user->user->first_name . ' ' . $user->user->last_name }}
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <button class="btn btn-{{ $theme }} leftLst" id="new-blue-bg">
                            <span class="material-icons m-0">arrow_back</span>
                        </button>
                        <button class="btn btn-{{ $theme }} rightLst" id="new-blue-bg">
                            <span class="material-icons m-0">arrow_forward</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="//sdk.twilio.com/js/video/releases/2.17.1/twilio-video.min.js"></script>
    <script>

        $(document).ready(function () {

            // MultiCarousel JS Start
            var itemsMainDiv = ('.MultiCarousel');
            var itemsDiv = ('.MultiCarousel-inner');
            var itemWidth = "";
            $('.leftLst, .rightLst').click(function () {
                var condition = $(this).hasClass("leftLst");
                if (condition)
                    click(0, this);
                else
                    click(1, this)
            });
            ResCarouselSize();
            $(window).resize(function () {
                ResCarouselSize();
            });

            //this function define the size of the items
            function ResCarouselSize() {
                var incno = 0;
                var dataItems = ("data-items");
                var itemClass = ('.item');
                var id = 0;
                var btnParentSb = '';
                var itemsSplit = '';
                var sampwidth = $(itemsMainDiv).width();
                var bodyWidth = $('body').width();
                $(itemsDiv).each(function () {
                    id = id + 1;
                    var itemNumbers = $(this).find(itemClass).length;
                    btnParentSb = $(this).parent().attr(dataItems);
                    itemsSplit = btnParentSb.split(',');
                    $(this).parent().attr("id", "MultiCarousel" + id);
                    if (bodyWidth >= 1200) {
                        incno = itemsSplit[3];
                        itemWidth = sampwidth / incno;
                        $(this).parent().attr("data-slide", 4);
                        $(this).parent().a
                    } else if (bodyWidth >= 992) {
                        incno = itemsSplit[2];
                        itemWidth = sampwidth / incno;
                        $(this).parent().attr("data-slide", 3);
                    } else if (bodyWidth >= 768) {
                        incno = itemsSplit[1];
                        itemWidth = sampwidth / incno;
                        $(this).parent().attr("data-slide", 2);
                    } else {
                        incno = itemsSplit[0];
                        itemWidth = sampwidth / incno;
                        $(this).parent().attr("data-slide", 1);
                    }
                    $(this).css({'transform': 'translateX(0px)', 'width': itemWidth * itemNumbers});
                    $(this).find(itemClass).each(function () {
                        $(this).outerWidth(itemWidth);
                        $(this).find('.vide_mirror').css('min-height', ($(this).closest('.card').height() - 50) + 'px');
                    });

                    $(".leftLst").addClass("over");
                    $(".rightLst").removeClass("over");

                });
            }

            //this function used to move the items
            function ResCarousel(e, el, s) {
                var leftBtn = ('.leftLst');
                var rightBtn = ('.rightLst');
                var translateXval = '';
                var divStyle = $(el + ' ' + itemsDiv).css('transform');
                var values = divStyle.match(/-?[\d\.]+/g);
                var xds = Math.abs(values[4]);
                if (e == 0) {
                    translateXval = parseInt(xds) - parseInt(itemWidth * s);
                    $(el + ' ' + rightBtn).removeClass("over");

                    if (translateXval <= itemWidth / 2) {
                        translateXval = 0;
                        $(el + ' ' + leftBtn).addClass("over");
                    }
                } else if (e == 1) {
                    var itemsCondition = $(el).find(itemsDiv).width() - $(el).width();
                    translateXval = parseInt(xds) + parseInt(itemWidth * s);
                    $(el + ' ' + leftBtn).removeClass("over");

                    if (translateXval >= itemsCondition - itemWidth / 2) {
                        translateXval = itemsCondition;
                        $(el + ' ' + rightBtn).addClass("over");
                    }
                }
                $(el + ' ' + itemsDiv).css('transform', 'translateX(' + -translateXval + 'px)');
            }

            //It is used to get some elements from btn
            function click(ell, ee) {
                var Parent = "#" + $(ee).parent().attr("id");
                var slide = $(Parent).attr("data-slide");
                ResCarousel(ell, Parent, slide);
            }

            // MultiCarousel JS End
        })

    </script>
@endsection
