<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistem Jawatankuasa Pemandu ICT JPN Perak">
    <meta name="author" content="Sektor Pengurusan Maklumat ICT">
    <meta name="keywords" content="jpict jpnperak sict">

    @yield('title')

    <title>Sistem Jawatankuasa Pemandu ICT - Jabatan Pendidikan Negeri Perak</title>

    @yield('css')

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link href="{{ asset('bootstrap/css/font-face.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/vendor/animsition/animsition.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/vendor/wow/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/vendor/slick/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/vendor/select2/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/vendor/vector-map/jqvmap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/sweetalert/dist/sweetalert2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/theme.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/vendor/dropzone/dropzone.min.css') }}" rel="stylesheet">
    <link href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="{{ asset('bootstrap/vendor/datepicker/themes/classic.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/vendor/datepicker/themes/classic.date.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/vendor/datepicker/themes/classic.time.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/vendor/datepicker/themes/default.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/vendor/datepicker/themes/default.date.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/vendor/datepicker/themes/default.time.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/vendor/datepicker/themes/rtl.css') }}" rel="stylesheet">

</head>

<body class="animsition">
    
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="{{ asset('avatar/default.png')}}"/>
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="/dashboard">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        @if( Auth::User()->hasRole == "Sekolah")
                        <li>
                            <a href="/sekolah/permohonan/{{ Auth::User()->kodsekolah }}">
                                <i class="fas fa-copy"></i>Permohonan</a>
                        </li>
                    @endif

                    @if( Auth::User()->hasRole == "SuperAdmin")
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Permohonan &nbsp;
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span></a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="/superadmin/permohonan"><i class="fas fa-list-alt"></i>Senarai</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-watch"></i>Mesyuarat &nbsp;
                                <span class="arrow"><i class="fas fa-angle-down"></i></span></a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="/superadmin/senarai">Senarai</a>
                                </li>
                            </ul>
                        </li>
                    @endif
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="/dashboard">
                    <img src="{{ asset('bootstrap/images/icon/logos.png')}}"/>
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar3">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="/dashboard">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                    @if( Auth::User()->hasRole == "Sekolah")
                        <li>
                            <a href="/sekolah/permohonan/{{ Auth::User()->kodsekolah }}">
                                <i class="fas fa-copy"></i>Permohonan</a>
                        </li>
                    @endif

                    @if( Auth::User()->hasRole == "SuperAdmin")
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Permohonan &nbsp;
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span></a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="/superadmin/permohonan"><i class="fas fa-list-alt"></i>Senarai</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="/superadmin/mesyuarat">
                                <i class="fas fa-suitcase"></i>Mesyuarat &nbsp;</a>
                        </li>
                    @endif    
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="header-wrap">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                        <div class="header-button">
                            <div class="account-wrap">
                                <div class="account-item clearfix js-item-menu">
                                    <div class="image">
                                        <img class="img-avatar" src="/avtr" />
                                    </div>
                                    <div class="content">
                                        <a class="js-acc-btn" href="#">{{ ucwords(strtolower(Auth::User()->name)) }}</a>
                                    </div>
                                    <div class="account-dropdown js-dropdown">
                                        <div class="info clearfix">
                                            <button id="avatar_user" type="button">
                                            <div class="image">
                                                <img class="img-avatar" src="/avtr" />
                                            </div>
                                            <div class="content">
                                                <h5 class="name">
                                                    {{ Auth::User()->name }}
                                                </h5>
                                                <span class="email">{{ Auth::User()->email }}</span>
                                            </div>
                                        </button>
                                        </div>
                                        <div class="account-dropdown__body">
                                            <div class="account-dropdown__item">
                                                <a href="/sekolah/profil/{{ Auth::User()->kodsekolah }}">
                                                    <i class="zmdi zmdi-account"></i>Profil Sekolah</a>
                                            </div>
                                        <div class="account-dropdown__footer">
                                            <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <i class="zmdi zmdi-power"></i>Log Keluar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">

                     @yield('content')
                    <br/>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    


    <script src="{{ asset('bootstrap/vendor/jquery-3.2.1.min.js') }}"></script>
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('bootstrap/vendor/bootstrap-4.1/popper.min.js') }}"></script>
    <script src="{{ asset('bootstrap/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
    <script src="{{ asset('bootstrap/vendor/slick/slick.min.js') }}"></script>
    <script src="{{ asset('bootstrap/vendor/wow/wow.min.js') }}"></script>
    <script src="{{ asset('bootstrap/vendor/animsition/animsition.min.js') }}"></script>
    <script src="{{ asset('bootstrap/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <script src="{{ asset('bootstrap/vendor/counter-up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('bootstrap/vendor/counter-up/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('bootstrap/vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('bootstrap/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('bootstrap/vendor/chartjs/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('bootstrap/vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('bootstrap/vendor/vector-map/jquery.vmap.js') }}"></script>
    <script src="{{ asset('bootstrap/vendor/vector-map/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('bootstrap/vendor/vector-map/jquery.vmap.sampledata.js') }}"></script>
    <script src="{{ asset('bootstrap/vendor/vector-map/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('bootstrap/sweetalert/dist/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/main.js') }}"></script>
    <script src="{{ asset('bootstrap/js/ajax.js') }}"></script>
    <script src="{{ asset('bootstrap/vendor/dropzone/dropzone.min.js') }}"></script>
    <script src="{{ asset('bootstrap/vendor/datepicker/legacy.js') }}"></script>
    <script src="{{ asset('bootstrap/vendor/datepicker/picker.js') }}"></script>
    <script src="{{ asset('js/datatables.js') }}"></script>


    @yield('js')
        
    <script>
        window.Laravel = <?php echo json_encode([
           'csrfToken' => csrf_token(),
            ]); ?>

        jQuery(document).ready(function() {
            @yield('jquery')
            jQuery('#sumberp').select2();
            jQuery('#statbli').select2();
            jQuery('#pralatn').select2();

            $('#mohon').dataTable();
        });
    </script>
</body>
</html>
<!-- end document-->>