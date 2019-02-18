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
</head>

<body class="animsition">
    <div class="page-wrapper">
        <aside class="menu-sidebar2">
            <div class="logo">
                <a href="#">
                    <img src="{{ asset('bootstrap/images/icon/logo-white.png')}}" alt="JPICT-JPN Perak" />
                </a>
            </div>
            <div class="menu-sidebar2__content js-scrollbar1">
                <div class="account2">
                    <div class="image img-cir img-120">
                        <img src="{{ asset('bootstrap/images/icon/avatar-big-01.jpg')}}" />
                    </div>
                    <h4 class="name" align="center">{{ Auth::user()->kodsekolah }}<br> {{ Auth::user()->name }}</h4>
                    <a class="" href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Keluar</a>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a  href="/sekolah">
                                <i class="fas fa-tachometer-alt"></i>Utama</a>
                        </li>
                    </ul>

                    @if(Auth::user()->hasRole == 'Sekolah')
                    <ul class="list-unstyled navbar__list">
                        <li class="has-sub">
                            <a href="/sekolah/permohonan/{{ Auth::User()->kodsekolah }}">
                                <i class="fas fa-copy"></i>Permohonan
                            </a>
                        </li>
                    </ul>

                    @elseif(Auth::user()->hasRole == 'SuperAdmin')
                    <ul class="list-unstyled navbar__list">
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Permohonan
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="/permohonan-baru">
                                        <i class="fas fa-book"></i>Senarai Permohonan</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="list-unstyled navbar__list">
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Kelulusan
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="/permohonan-baru">
                                        <i class="fas fa-book"></i>Senarai Permohonan</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    @endif

                </nav>
            </div>
        </aside>
    </div>

        <div class="page-container2">
            <header class="header-desktop2">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap2">
                            <div class="logo d-block d-lg-none">
                                <a href="#">
                                    <img src="{{ asset('bootstrap/images/icon/logo-white.png') }}" alt="JPICT JPN Perak" />
                                </a>
                            </div>
                            <div class="header-button2">
                                <div class="header-button-item js-item-menu">
                                    <i class="zmdi zmdi-search"></i>
                                    <div class="search-dropdown js-dropdown">
                                        <form action="">
                                            <input class="au-input au-input--full au-input--h65" type="text" placeholder="Search for datas &amp; reports..." />
                                            <span class="search-dropdown__icon">
                                                <i class="zmdi zmdi-search"></i>
                                            </span>
                                        </form>
                                    </div>
                                </div>
                                <div class="header-button-item has-noti js-item-menu">
                                    <i class="zmdi zmdi-notifications"></i>
                                    <div class="notifi-dropdown js-dropdown">
                                        <div class="notifi__title">
                                            <p>You have 3 Notifications</p>
                                        </div>
                                        <div class="notifi__item">
                                            <div class="bg-c1 img-cir img-40">
                                                <i class="zmdi zmdi-email-open"></i>
                                            </div>
                                            <div class="content">
                                                <p>You got a email notification</p>
                                                <span class="date">April 12, 2018 06:50</span>
                                            </div>
                                        </div>
                                        <div class="notifi__item">
                                            <div class="bg-c2 img-cir img-40">
                                                <i class="zmdi zmdi-account-box"></i>
                                            </div>
                                            <div class="content">
                                                <p>Your account has been blocked</p>
                                                <span class="date">April 12, 2018 06:50</span>
                                            </div>
                                        </div>
                                        <div class="notifi__item">
                                            <div class="bg-c3 img-cir img-40">
                                                <i class="zmdi zmdi-file-text"></i>
                                            </div>
                                            <div class="content">
                                                <p>You got a new file</p>
                                                <span class="date">April 12, 2018 06:50</span>
                                            </div>
                                        </div>
                                        <div class="notifi__footer">
                                            <a href="#">All notifications</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="header-button-item mr-0 js-sidebar-btn">
                                    <i class="zmdi zmdi-menu"></i>
                                </div>
                                <div class="setting-menu js-right-sidebar d-none d-lg-block">
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-account"></i>Account</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-settings"></i>Setting</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-money-box"></i>Billing</a>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-globe"></i>Language</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-pin"></i>Location</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-email"></i>Email</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-notifications"></i>Notifications</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <section class="au-breadcrumb m-t-75">
                @yield('breadcrumb')
            </section>
    
            <section class="statistic">
                @yield('statistic')
            </section>

            <section class="statistic">
                @yield('content')
            </section>

            <section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p> © 2018 Sektor Pengurusan Maklumat ICT, Jabatan Pendidikan Negeri Perak.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>


    <script src="{{ asset('bootstrap/vendor/jquery-3.2.1.min.js') }}"></script>
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

        });
    </script>
</body>
</html>
<!-- end document-->>