<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistem Jawatankuasa Pemandu ICT Maklumat Negeri Perak">
    <meta name="author" content="Sektor Pengurusan Maklumat ICT JPN Perak">
    <meta name="keywords" content="jpictmn jpict">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title Page-->
    <title>Sistem Jawatankuasa Pemandu ICT Maklumat Negeri Perak - Log Masuk</title>

    <!-- Fontfaces CSS-->
    <link href="{{ asset('bootstrap/css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('bootstrap/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('bootstrap/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('bootstrap/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('bootstrap/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{ asset('bootstrap/vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('bootstrap/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('bootstrap/vendor/wow/animate.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('bootstrap/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('bootstrap/vendor/slick/slick.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('bootstrap/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('bootstrap/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ asset('bootstrap/css/theme.css') }}" rel="stylesheet" media="all">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                                <img src="bootstrap/images/icon/logos.png" alt="JPICTMN Perak">
                        </div>
                        <div class="row text-center">
                            <h4>Sistem Jawatankuasa Pemandu ICT Maklumat Negeri Perak</h4>
                            <br/><br/>
                        </div>
                        <div class="login-form">
                            <form action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Emel MyGovUC</label>
                                    <input class="au-input au-input--full {{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" name="email" id="email" placeholder="kodsekolah@moe.edu.my" value="{{ old('email') }}" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label>Katalaluan</label>
                                    <input class="au-input au-input--full {{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password" id="password" placeholder="******">
                                </div>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">log masuk</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="{{ asset('bootstrap/vendor/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap JS-->
    <script src="{{ asset('bootstrap/vendor/bootstrap-4.1/popper.min.js') }}"></script>
    <script src="{{ asset('bootstrap/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
    <!-- Vendor JS       -->
    <script src="{{ asset('bootstrap/vendor/slick/slick.min.js') }}">
    </script>
    <script src="{{ asset('bootstrap/vendor/wow/wow.min.js') }}"></script>
    <script src="{{ asset('bootstrap/vendor/animsition/animsition.min.js') }}"></script>
    <script src="{{ asset('bootstrap/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}">
    </script>
    <script src="{{ asset('bootstrap/vendor/counter-up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('bootstrap/vendor/counter-up/jquery.counterup.min.js') }}">
    </script>
    <script src="{{ asset('bootstrap/vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('bootstrap/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('bootstrap/vendor/chartjs/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('bootstrap/vendor/select2/select2.min.js') }}">
    </script>

    <!-- Main JS-->
    <script src="{{ asset('bootstrap/js/main.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

</body>

</html>
<!-- end document-->
