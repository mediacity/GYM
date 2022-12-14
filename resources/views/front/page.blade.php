<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>{{config('app.name')}}</title>
     <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('css/font_awesome/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('css/owl.carousel.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('css/owl.theme.default.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('css/theme.css') }}" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

    </style>
</head>
<body>
    <section id="navbar" class="navbar-main-block">
        <div class="container-xl">
            <div class="row">
                <div class="col-lg-5">
                    <div class="navbar-logo">
                        <img src="{{ url('media/logo/1670406124GYMX 1 (1).png') }}" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="navbar-login-signup-btn">
                        @if (Route::has('login'))
                        <div class="links">
                            @auth
                            @hasrole('Super Admin')
                                <a href="{{ route('admin.dashboard.index') }}">{{ __("Admin") }}</a>
                            @endhasrole
                            @hasrole('Trainer')
                            <a href="{{ route('admin.dashboard.index') }}">{{ __("Trainer") }}</a>
                            @endhasrole
                            @else
                            <a href="{{ route('login') }}" class="btn btn-primary mr-2"><i class="fa-solid fa-right-to-bracket mr-1"></i> {{ __("Login") }}</a>

                            @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-primary"><i class="fa-solid fa-user-plus mr-1"></i> {{ __("Register") }}</a>
                            @endif
                            @endauth
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="breadcumb" class="breadcumb-main-block">
        <div class="breadcumb-img">
            <img src="{{ url('image/blog/breadcrum.jpg') }}" class="img-fluid" alt="">
            <div class="overlay-bg"></div>
        </div>
        <div class="container-xl">
            <div class="breadcumb-dtl">
                <h4 class="breadcumb-heading">{{$page?$page->title:''}}</h4>
            </div>
        </div>
    </section>
    <section id="terms-dtl" class="terms-dtl-main-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="terms-dtl-block">
                        <p>{!! $page?$page->detail:'' !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer-main-block">
        <div class="container-xl">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="footer-logo">
                        <a href="{{url('/')}}" title=""><img src="{{ url('media/logo/1670406124GYMX 1 (1).png') }}" class="img-fluid" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="footer-block">
                    <p>All rights reserved<br><span><a href="{{ route('front-terms-condition' ) }}" title="">Terms &amp; Condition</a> and <a href="{{ route('front-privacy-policy') }}" title="">Privacy Policy</a></span></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="{{ url('assets/js/jquery.min.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ url('js/theme.js') }}"></script>
</body>
</html>