<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="{{ $setting['site_description'] }}">
    <meta name="keywords" content="{{ $setting['site_keyword'] }}">
    <meta name="author" content="{{ config('app.name') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>{{  __('Login').' | '.config('app.name') }}</title>
    <!-- Fevicon -->
    <link rel="shortcut icon" href="{{ url('assets/images/favicon.ico') }}">
    <!-- Start css -->
    <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('assets/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('assets/css/style.css') }}" rel="stylesheet" type="text/css">
    <!-- End css -->
</head>
<body class="vertical-layout">
    <!-- Start Containerbar -->
    <div id="containerbar" class="containerbar authenticate-bg">
        <!-- Start Container -->
        <div class="container-fluid">
            <div class="auth-box login-box">
                <!-- Start row -->
                <div class="row no-gutters align-items-center justify-content-center">
                    <!-- Start col -->
                    <div class="col-md-4 col-lg-3 col-12">
                        <div class="auth-box-img">
                            @if($setting->login_side_image !='' && file_exists(public_path().'/media/login/'.$setting->login_side_image))
                            <img src="{{ url('/media/login/'.$setting->login_side_image) }}" class="img-fluid" alt="">
                            @else 
                            <img src="{{ Avatar::create(config('app.name'))->toBase64() }}" class="img-fluid" alt="">
                            @endif
                        </div>
                        <div class="auth-logo form-head">
                            @if($setting->site_logo !='' && file_exists(public_path().'/media/logo/'.$setting->site_logo))
                                <a href="{{ url('/') }}" class="logo"><img src="{{ url('/media/logo/'.$setting->site_logo) }}" class="img-fluid" alt="logo"></a>
                            @else
                                <a href="{{ url('/') }}" class="logo"><img src="{{ Avatar::create(config('app.name'))->toBase64() }}" class="img-fluid" alt="logo"></a>
                            @endif
                            <p>{{$setting?$setting->login_description:''}}</p>
                        </div>  
                    </div>
                    <div class="col-md-8 col-lg-9 col-12">
                        <div class="auth-box-right">
                            <div class="card">
                                <div class="card-body">
                                    @if(session()->has('blocked'))
                                        <div class="alert alert-danger">
                                           <i class="feather icon-alert-octagon"></i> {{ session()->get('blocked') }}
                                        </div>
                                    @endif
                                    <form action="{{ route('login.custom') }}" method="POST">
                                        @csrf
                                                                             
                                        <h2 class="text-primary my-4">{{ __('Login') }}</h2>
                                        <div class="form-group">
                                            <input name="email" type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter email here" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                             @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter Password here" required>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-row mb-3">
                                            <div class="col-sm-6">
                                                <div class="custom-control custom-checkbox text-left">
                                                  <input {{ old('remember') ? 'checked' : '' }} type="checkbox" class="custom-control-input" id="rememberme" name="remember">
                                                  <label class="custom-control-label font-14" for="rememberme">{{ __('Remember Me') }}</label>
                                                </div>                                
                                            </div>
                                            @if (Route::has('password.request'))
                                                <div class="col-sm-6">
                                                  <div class="forgot-psw"> 
                                                    <a id="forgot-psw" href="{{ route('password.request') }}" class="font-14">{{ __('Forgot Your Password?') }}</a>
                                                  </div>
                                                </div>
                                            @endif
                                        </div>                          
                                      <button type="submit" class="btn btn-success btn-lg btn-block font-18">Log in</button>
                                    </form>
                                    <div class="login-or">
                                        <h6 class="text-muted">{{ __('OR') }}</h6>
                                    </div>
                                    <div class="button-list">
                                        <a href="{{ route('social.login','facebook') }}" class="btn btn-primary-rgba font-18 facebook-icon"><i class="mdi mdi-facebook mr-2"></i>{{ __('Facebook') }}</a>
                                        <a href="{{ route('social.login','facebook') }}" class="btn btn-danger-rgba font-18 google-icon"><i class="mdi mdi-google mr-2"></i>{{ __('Google') }}</a>
                                    </div>
                                    <p class="mb-0 mt-3">{{ __("Don't have a account?") }} <a href="{{ route('register') }}">{{ __('Sign up') }}</a></p>
                                    <div class="tiny-footer">
                                        <p>All rights reserved<br><span><a href="#" title="">Terms & Condition</a> and <a href="#" title="">Privacy Policy</a></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End col -->
                </div>
                <!-- End row -->
            </div>
        </div>
        <!-- End Container -->
    </div>
    <!-- End Containerbar -->
    <!-- Start js -->        
    <script src="{{ url('assets/js/jquery.min.js') }}"></script>
    <script src="{{ url('assets/js/popper.min.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('assets/js/modernizr.min.js') }}"></script>
    <script src="{{ url('assets/js/detect.js') }}"></script>
    <script src="{{ url('assets/js/jquery.slimscroll.js') }}"></script>
    <!-- End js -->
</body>
</html>