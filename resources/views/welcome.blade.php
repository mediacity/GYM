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
    @if(in_array(app()->getLocale(),array('ar','he','ur', 'arc', 'az', 'dv', 'ku', 'fa')))
    <link href="{{ url('assets/css/style_rtl.css') }}" rel="stylesheet" type="text/css">
    @else 
    <link href="{{ url('css/theme.css') }}" rel="stylesheet" type="text/css">
    @endif
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
    <div id="navbar" class="navbar-main-block">
        <div class="container-xl">
            <div class="row">
                <div class="col-lg-5 col-md-5">
                    <div class="navbar-logo">
                        <img src="{{ url('media/logo/1670406124GYMX 1 (1).png') }}" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="col-lg-7 col-md-7">
                    <div class="navbar-login-signup-btn">
                        @if (Route::has('login'))
                        <div class="links">
                            @auth
                            @hasrole('Super Admin')
                                <a href="{{ route('admin.dashboard.index') }}" class="btn btn-primary mr-2">{{ __("Admin") }}</a>
                            @endhasrole
                            @hasrole('Trainer')
                            <a href="{{ route('admin.dashboard.index') }}" class="btn btn-primary mr-2">{{ __("Trainer") }}</a>
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
    </div>
    <div id="home-slider" class="home-slider-main-block owl-carousel">
        
        @if($sliders)
        @foreach($sliders as $key => $slider)
        <div class="item">
            <div class="home-slider-block">
                <div class="home-slider-image">
                    @if($slider->image !='' && file_exists(public_path().'/image/slider/'.$slider->image))
                    <img src="{{ url('/image/slider/'.$slider->image) }}" class="img-fluid" alt="">
                    @else 
                    <img src="{{ Avatar::create(config('app.name'))->toBase64() }}" class="img-fluid" alt="">
                    @endif                   
                    <div class="overlay-bg"></div>
                </div>
                <div class="home-slider-dtl">
                    <h1 class="home-slider-heading">{{$slider->heading}}</h1>
                    <h4 class="home-slider-sub-heading">{{$slider->subheading}}</h4>
                </div>
            </div>
        </div>
        @endforeach
       @endif 
    </div>
    
    @if($faq)
    <div id="faq" class="faq-main-block">
        <div class="container-xl">
            <h3 class="faq-heading">Frequently Asked Question</h3>
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="faq-block">
                        <div class="accordion" id="accordionExample">
                            @foreach($faq as $key => $value)
                            <div class="card">
                                <div class="card-header" id="headingOne{{$key}}">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            {{$value->title}}<span><i class="fa-solid fa-angle-down"></i></span>
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseOne" class="collapse {{$key=='0'?'show':''}}" aria-labelledby="headingOne{{$key}}" data-parent="#accordionExample">
                                    <div class="card-body">{{$value->details}}</div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    @if($blogs)

    <section id="blog" class="blog-main-block">
        <div class="container-xl">
            <h3 class="blog-heading">Blog</h3>
            <div id="blog-slider" class="blog-slider-main-block owl-carousel">
                @foreach($blogs as $key => $blog)
                <div class="item">
                    <div class="blog-block">
                        <div class="blog-image">
                            <a href="{{ route('blog.detail',$blog->id ) }}" title="{{$blog->title}}">
                                @if($blog->image !='' && file_exists(public_path().'/image/blog/'.$blog->image))
                                <img src="{{ url('/image/blog/'.$blog->image) }}" class="img-fluid" alt="">
                                @else 
                                <img src="{{ Avatar::create(config('app.name'))->toBase64() }}" class="img-fluid" alt="">
                                @endif 
                            </a>
                        </div>
                        <div class="blog-cat">
                            <span class="badge badge-primary">{{$blog->category?$blog->category->title:''}}</span>
                        </div>
                        <div class="blog-dtl">
                            <h4 class="blog-dtl-heading"><a href="{{ route('blog.detail',$blog->id ) }}" title="{{$blog->title}}">{{$blog->title}}</a></h4>
                            <!-- <p>{{substr($blog->detail, 0, 100);}}</p> -->
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-5">
                                <div class="blog-user-dtl">
                                    <ul>
                                        <li>
                                            @if($blog->user)
                                                @if($blog->user->photo !='' && file_exists(public_path().'/media/users/'.$blog->user->photo))
                                                <img src="{{ url('/media/users/'.$blog->user->photo) }}" class="img-fluid" alt="">
                                                @else 
                                                <img src="{{ url('image/blog/blog-user.png') }}" class="img-fluid" alt="">
                                                @endif
                                            @else
                                            <img src="{{ url('image/blog/blog-user.png') }}" class="img-fluid" alt="">
                                            @endif
                                        </li>
                                        <li class="user-name">{{$blog->user?$blog->user->name:''}}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7 col-7">
                                <div class="blog-date">{{date('F,d Y', strtotime($blog->created_at))}}</div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
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
                    <p>All rights reserved<br><span><a href="{{ route('front-terms-condition' ) }}" title="">Terms &amp; Condition</a> and <a href="{{ route('front-privacy-policy') }}" title="">Privacy Policy</a></span></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="{{ url('assets/js/jquery.min.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ url('assets/js/theme.js') }}"></script>
    @endif
</body>
</html>