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
                <h4 class="breadcumb-heading">Blog Detail</h4>
            </div>
        </div>
    </section>
    <section id="terms-dtl" class="terms-dtl-main-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="terms-dtl-block">
                        <p></p><div>
                        <h2>What is Lorem Ipsum?</h2>
                        <p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        </div>
                        <div>
                        <h2>Why do we use it?</h2>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                        </div>
                        <p>&nbsp;</p>
                        <div>
                        <h2>Where does it come from?</h2>
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
                        <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>
                        </div><p></p>
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
                        <a href="#" title=""><img src="{{ url('media/logo/1670406124GYMX 1 (1).png') }}" class="img-fluid" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="footer-block">
                        <p>All rights reserved<br><span><a href="#" title="">Terms &amp; Condition</a> and <a href="#" title="">Privacy Policy</a></span></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="{{ url('assets/js/jquery.min.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('js/owl.carousel.min.js') }}"></script>
    <script src="{{ url('js/theme.js') }}"></script>
</body>
</html>