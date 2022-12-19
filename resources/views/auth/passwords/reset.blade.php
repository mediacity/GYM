<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="{{ $setting['site_description'] }}">
    <meta name="keywords" content="{{ $setting['site_keyword'] }}">
    <meta name="author" content="{{ config('app.name') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>{{ __('Reset Password') }}</title>
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
        <div class="container">
            <div class="auth-box forgot-password-box">
                <!-- Start row -->
                <div class="row no-gutters align-items-center justify-content-center">
                    <!-- Start col -->
                    <div class="col-md-4 col-lg-3 col-12">
                        <div class="auth-img-logo-box">
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
                    </div>
                    <div class="col-md-8 col-lg-9 col-12">
                        <!-- Start Auth Box -->
                        <div class="auth-box-right">
                            <div class="card">
                                <div class="card-body">
                                    <form method="POST" action="{{ route('password.update') }}">
                                        @csrf
                                        <input type="hidden" name="token" value="{{ $token }}">
                                        <div class="form-head">
                                            <a href="{{ url('/') }}" class="logo"><img src="{{ url('assets/images/logo.svg') }}" class="img-fluid" alt="logo"></a>
                                        </div> 
                                        <h4 class="text-primary my-4">{{ __('Reset Password') }}</h4>
                                        <p class="mb-4">{{ __('Enter the email address and new password to continue.') }}</p>
                                        <div class="form-group">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div> 

                                        <div class="form-group">
                                            <input placeholder="Enter new password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        
                                        <div class="form-group">
                                             <input placeholder="Confirm new password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required >
                                        </div>

                                      <button type="submit" class="btn btn-success btn-lg btn-block font-18">{{ __('Reset Password') }}</button>
                                    </form>
                                    <p class="mb-0 mt-3">{{ __('Remember Password?') }} <a href="{{ route('login') }}">
                                        {{ __('Log in') }}
                                    </a></p>
                                </div>
                            </div>
                        </div>
                        <!-- End Auth Box -->
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