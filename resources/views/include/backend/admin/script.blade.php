<script type="text/javascript">
    var APP_URL = {!! json_encode(url('/')) !!}
</script>

<!--   Core JS Files   -->
<script src="{{ asset('assets/js/core/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/core/bootstrap-material-design.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>

<!-- Plugin for the momentJs  -->
<script src="{{ asset('assets/js/plugins/moment.min.js') }}"></script><!--  Plugin for Sweet Alert -->
<script src="{{ asset('assets/js/plugins/sweetalert2.js') }}"></script><!-- Forms Validations Plugin -->
<script src="{{ asset('assets/js/plugins/jquery.validate.min.js') }}"></script>

<!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="{{ asset('assets/js/plugins/jquery.bootstrap-wizard.js') }}"></script><!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="{{ asset('assets/js/plugins/bootstrap-selectpicker.js') }}"></script><!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src="{{ asset('assets/js/plugins/bootstrap-datetimepicker.min.js') }}"></script><!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
<script src="{{ asset('assets/js/plugins/jquery.dataTables.min.js') }}"></script><!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="{{ asset('assets/js/plugins/bootstrap-tagsinput.js') }}"></script><!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{ asset('assets/js/plugins/jasny-bootstrap.min.js') }}"></script><!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="{{ asset('assets/js/plugins/fullcalendar.min.js') }}"></script><!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
<script src="{{ asset('assets/js/plugins/jquery-jvectormap.js') }}"></script><!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="{{ asset('assets/js/plugins/nouislider.min.js') }}"></script><!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script><!-- Library for adding dinamically elements -->
<script src="{{ asset('assets/js/plugins/arrive.min.js') }}"></script><!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script><!-- Chartist JS -->
<script src="{{ asset('assets/js/plugins/chartist.min.js') }}"></script><!--  Notifications Plugin    -->
<script src="{{ asset('assets/js/plugins/bootstrap-notify.js') }}"></script><!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('assets/js/material-dashboard.js?v=2.2.2') }}" type="text/javascript"></script>

<script src="{{ asset('assets/js/toastr.min.js') }}" type="text/javascript"></script>

<script type="text/javascript" src="{{ asset('assets/gauge_chart/jquery-gauge.min.js') }}"></script>

{{--<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"--}}{{--        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">--}}{{--</script>--}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"
        referrerpolicy="no-referrer"></script>

<script>
    $('.owl-carousel').owlCarousel({
        loop: false,
        margin: 10,
        nav: false,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    })
</script>

<script>
    $('body').tooltip({
        selector: '.appended_tooltip'
    });
    //  Activate the tooltips
    $('[rel="tooltip"]').tooltip();

    // Activate Popovers
    $('[data-toggle="popover"]').popover();
    $('[data-toggle="popover-click"]').popover({
        html: true,
        trigger: 'click',
        placement: 'bottom',
        content: function () {
            return $('#popover_content_wrapper').html();
        }
    });

    $(document).on('click', '#confirm', function () {
        $('[data-toggle="popover-click"]').popover("hide");
        toastr.info('You clicked "yes"!');
    });

    $(document).on('click', '#deny', function () {
        $('[data-toggle="popover-click"]').popover("hide");
        toastr.error('You clicked "no"!');
    });
</script>

<script>
    $(document).ready(function () {
        $().ready(function () {

            $sidebar = $('.sidebar');

            $sidebar_img_container = $sidebar.find('.sidebar-background');

            $full_page = $('.full-page');

            $sidebar_responsive = $('body > .navbar-collapse');

            window_width = $(window).width();

            fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

            if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
                if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
                    $('.fixed-plugin .dropdown').addClass('open');
                }

            }

            $('.fixed-plugin a').click(function (event) {
                // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
                if ($(this).hasClass('switch-trigger')) {
                    if (event.stopPropagation) {
                        event.stopPropagation();
                    } else if (window.event) {
                        window.event.cancelBubble = true;
                    }
                }
            });

            $('.fixed-plugin .active-color span').click(function () {
                $full_page_background = $('.full-page-background');

                $(this).siblings().removeClass('active');
                $(this).addClass('active');

                var new_color = $(this).data('color');


                if ($sidebar.length != 0) {
                    $sidebar.attr('data-color', new_color);
                }

                if ($full_page.length != 0) {
                    $full_page.attr('filter-color', new_color);
                }

                if ($sidebar_responsive.length != 0) {
                    $sidebar_responsive.attr('data-color', new_color);
                }
                userSetting();
            });

            $('.fixed-plugin .background-color .badge').click(function () {
                $(this).siblings().removeClass('active');
                $(this).addClass('active');

                var new_color = $(this).data('background-color');

                if ($sidebar.length != 0) {
                    $sidebar.attr('data-background-color', new_color);
                }
                userSetting();
            });

            $('.fixed-plugin .img-holder').click(function () {
                $full_page_background = $('.full-page-background');

                $(this).parent('li').siblings().removeClass('active');
                $(this).parent('li').addClass('active');


                var new_image = $(this).find("img").attr('src');

                if ($sidebar_img_container.length != 0 && $(
                    '.switch-sidebar-image input:checked').length != 0) {
                    $sidebar_img_container.fadeOut('fast', function () {
                        $sidebar_img_container.css('background-image', 'url("' +
                            new_image + '")');
                        $sidebar_img_container.fadeIn('fast');
                    });
                }

                if ($full_page_background.length != 0 && $(
                    '.switch-sidebar-image input:checked').length != 0) {
                    var new_image_full_page = $('.fixed-plugin li.active .img-holder').find(
                        'img').data('src');

                    $full_page_background.fadeOut('fast', function () {
                        $full_page_background.css('background-image', 'url("' +
                            new_image_full_page + '")');
                        $full_page_background.fadeIn('fast');
                    });
                }

                if ($('.switch-sidebar-image input:checked').length == 0) {
                    var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr(
                        'src');
                    var new_image_full_page = $('.fixed-plugin li.active .img-holder').find(
                        'img').data('src');

                    $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                    $full_page_background.css('background-image', 'url("' +
                        new_image_full_page + '")');
                }

                if ($sidebar_responsive.length != 0) {
                    $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
                }
            });

            $('.switch-sidebar-image input').change(function () {
                $full_page_background = $('.full-page-background');

                $input = $(this);

                if ($input.is(':checked')) {
                    if ($sidebar_img_container.length != 0) {
                        $sidebar_img_container.fadeIn('fast');
                        $sidebar.attr('data-image', '#');
                    }

                    if ($full_page_background.length != 0) {
                        $full_page_background.fadeIn('fast');
                        $full_page.attr('data-image', '#');
                    }

                    background_image = true;
                } else {
                    if ($sidebar_img_container.length != 0) {
                        $sidebar.removeAttr('data-image');
                        $sidebar_img_container.fadeOut('fast');
                    }

                    if ($full_page_background.length != 0) {
                        $full_page.removeAttr('data-image', '#');
                        $full_page_background.fadeOut('fast');
                    }

                    background_image = false;
                }
            });

            $('.switch-sidebar-mini input').change(function () {
                $body = $('body');

                $input = $(this);

                if (md.misc.sidebar_mini_active == true) {
                    $('body').removeClass('sidebar-mini');
                    md.misc.sidebar_mini_active = false;

                    if ($(".sidebar").length != 0) {
                        var ps = new PerfectScrollbar('.sidebar');
                    }
                    if ($(".sidebar-wrapper").length != 0) {
                        var ps1 = new PerfectScrollbar('.sidebar-wrapper');
                    }
                    if ($(".main-panel").length != 0) {
                        var ps2 = new PerfectScrollbar('.main-panel');
                    }
                    if ($(".main").length != 0) {
                        var ps3 = new PerfectScrollbar('main');
                    }

                } else {

                    if ($(".sidebar").length != 0) {
                        var ps = new PerfectScrollbar('.sidebar');
                        ps.destroy();
                    }
                    if ($(".sidebar-wrapper").length != 0) {
                        var ps1 = new PerfectScrollbar('.sidebar-wrapper');
                        ps1.destroy();
                    }
                    if ($(".main-panel").length != 0) {
                        var ps2 = new PerfectScrollbar('.main-panel');
                        ps2.destroy();
                    }
                    if ($(".main").length != 0) {
                        var ps3 = new PerfectScrollbar('main');
                        ps3.destroy();
                    }


                    setTimeout(function () {
                        $('body').addClass('sidebar-mini');

                        md.misc.sidebar_mini_active = true;
                    }, 300);
                    userSetting();
                }

                // we simulate the window Resize so the charts will get updated in realtime.
                var simulateWindowResize = setInterval(function () {
                    window.dispatchEvent(new Event('resize'));
                }, 180);

                // we stop the simulation of Window Resize after the animations are completed
                setTimeout(function () {
                    clearInterval(simulateWindowResize);
                }, 1000);

            });

            function userSetting() {
                let background = $('.active-color').find('.active').data('color');
                let sidebar_background = $('.background-color').find('.active').data('background-color');
                let sidebar_size = 0;
                if ($('.switch-sidebar-mini input').is(':checked'))
                    sidebar_size = 1;
                $.ajax({
                    url: APP_URL + "/admin/setting",
                    type: 'post',
                    data: {
                        background: background,
                        sidebar_background: sidebar_background,
                        sidebar_size: sidebar_size,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (result) {
                    },
                    error: function (result) {
                    }
                });
            }
        });
    });
</script>
<script>
    $(document).ready(function () {
        // Javascript method's body can be found in assets/js/demos.js
        md.initDashboardPageCharts();

        md.initVectorMap();

    });
</script>

<script>
    $(document).ready(function () {
        md.initFullCalendar();
    });
</script>
<script>
    $(document).ready(function () {
        $('#datatables').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "",
                searchPlaceholder: "Search... ",
            }
        });

        var table = $('#datatables').DataTable();

    });
</script>

<script>
    $('.scroll-bar').each(function () {
        const ps = new PerfectScrollbar($(this)[0]);
    });

    // var ps = new PerfectScrollbar('.scroll-bar');
    // var ps1 = new PerfectScrollbar('.campign-list-scroll-bar');
    // var ps2 = new PerfectScrollbar('.list2');
</script>

<script>
    function btnsearchs() {
        var attr = $('#search').attr('hidden');
        if (typeof attr == 'undefined') {
            $('#search').attr("hidden", "true");
        } else {
            $('#search').removeAttr("hidden");
        }
    }
</script>
<script>
    toastr.options =
        {
            "closeButton": true,
            "progressBar": true
        }
    @if (session('success'))
    toastr.success("{{ session('success') }}");
    @endif
    @if (session('error'))
    toastr.error("{{ session('error') }}");
    @endif
    @if (session('info'))
    toastr.info("{{ session('info') }}");
    @endif
    @if (session('warning'))
    toastr.warning("{{ session('warning') }}");
    @endif
    @if ($errors->any())
    @foreach ($errors->all() as $error)
    toastr.error("{{ $error }}");
    @endforeach
    @endif
</script>
