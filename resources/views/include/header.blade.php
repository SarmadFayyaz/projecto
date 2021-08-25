
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <div class="navbar-minimize">
                <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round btn-sm">
                    <i class="fas fa-arrow-left text_align-center visible-on-sidebar-regular"></i>
                    <i class="fas fa-arrow-left design_bullet-list-67 visible-on-sidebar-mini"></i>
                </button>
            </div>
            <a class="navbar-brand small-text" href="javascript:;">
                <?php if ($page === 'Dashboard'): ?>
                Welcome Francisco
                <?php elseif ($page === 'Test 2'): ?>
                Project Title <i class="fas fa-info-circle"></i>
                <?php else: ?>
                Default Content
                <?php endif; ?>


            </a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
        </button>


        <div class="collapse navbar-collapse justify-content-end d-none d-md-block d-lg-block d-xl-block">
            <div class="navbar-btn">
                <button class="btn btn-primary btn-sm btn-round mr-md-4">Platform Information</button>


            </div>

            <div class="navbar-nav-btns">
                <button class="btn btn-primary btn-sm mr-md-1" title="Mute Mic"><i
                        class="fas fa-microphone text-white"></i></button>
                <button class="btn btn-primary btn-sm mr-md-1" title="Turn Off Camera"><i
                        class="fas fa-video text-white"></i></button>
                <button class="btn btn-primary btn-sm mr-md-1" title="Share Screen"><i
                        class="fab fa-slideshare text-white"></i></button>
                <button class="btn btn-primary btn-sm mr-md-1"><i class="fas fa-volume-up text-white"></i>
                </button>

            </div>
        </div>

        <div class="collapse navbar-collapse justify-content-end ">
            <div class="navbar-btn d-none d-sm-block d-md-none d-lg-none d-xl-none">
                <button class="btn btn-primary btn-sm btn-round mr-md-1 ">Platform Information</button>
            </div>

            <div class="navbar-nav-btns d-none d-sm-block d-md-none d-lg-none d-xl-none">
                <button class="btn btn-primary btn-sm mr-md-1 " title="Mute Mic"><i
                        class="fas fa-microphone text-white"></i></button>
                <button class="btn btn-primary btn-sm mr-md-1" title="Turn Off Camera"><i
                        class="fas fa-video text-white"></i></button>
                <button class="btn btn-primary btn-sm mr-md-1" title="Share Screen"><i
                        class="fab fa-slideshare text-white"></i></button>
                <button class="btn btn-primary btn-sm mr-md-1"><i class="fas fa-volume-up text-white"></i>
                </button>

            </div>
            <ul class="nav nav-pills nav-pills-warning ulitm" role="tablist" hidden>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" id="meeting" href="#link2" role="tablist">
                        <i class="material-icons" style="padding:0px;font-size:22px">videocam</i><br> Meeting

                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active show" id="general" data-toggle="tab" href="#link1" role="tablist">
                        <i class="material-icons" style="padding:0px;font-size:22px">supervisor_account</i><br>
                        General

                    </a>
                </li>

            </ul>
            <!-- <li class="nav-item text-center" id="meeting" style="list-style:none;display:none">
                        <a class="nav-link " style="color:black" href="/projectO/meetingmode.php">
                <i class="material-icons">videocam</i><br> Meeting
            </a>
        </li>
            <li class="nav-item text-center" id="general" style="list-style:none;display:none">
                        <a class="nav-link " style="color:#36baaf" href="/projectO/test2.php">
                <i class="material-icons">supervisor_account</i><br> General
            </a>
        </li> -->
            <form class="navbar-form ml-3">
                <div class="input-group no-border">
                    <input type="text" value="" id="search" hidden class="form-control form-control-sm"
                           placeholder="Search...">
                    <button type="button" id="btnsearch"
                            style="min-width: 23px !important;width: 23px;margin-bottom: 3px; height: 23px !important;"
                            onclick="btnsearchs()" class="btn btn-white btn-sm btn-round btn-just-icon">
                        <i class="material-icons" style="line-height:25px !important;">search</i>
                        <div class="ripple-container"></div>
                    </button>
                </div>
            </form>

            <ul class="navbar-nav ">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink"
                       data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">notifications</i>
                        <span class="notification">5</span>
                        <p class="d-lg-none d-md-block">
                            Some Actions
                        </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Mike John responded to your email</a>
                        <a class="dropdown-item" href="#">You have 5 new tasks</a>
                        <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                        <a class="dropdown-item" href="#">Another Notification</a>
                        <a class="dropdown-item" href="#">Another One</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">person</i>
                        <p class="d-lg-none d-md-block">
                            Account
                        </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                        <a class="dropdown-item" href="#">Profile</a>
                        <a class="dropdown-item" href="#">Settings</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Log out</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- <link href="{{ asset('assets/gauge_chart/jquery-gauge.css') }}" type="text/css" rel="stylesheet"> -->
<!-- <script type="text/javascript" src="{{ asset('assets/gauge_chart/jquery-gauge.min.js') }}"> -->

<script>
    // var gauge = new Gauge($('.gauge_ID'), {
    //     value: '10'
    // });
    function btnsearchs() {
        var attr = $('#search').attr('hidden');
        if (typeof attr == 'undefined') {
            $('#search').attr("hidden", "true");
        } else {
            $('#search').removeAttr("hidden");

        }

    }


</script>
