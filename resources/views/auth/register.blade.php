<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="{{ $setting['site_description'] }}">
    <meta name="keywords" content="{{ $setting['site_keyword'] }}">
    <meta name="author" content="{{ config('app.name') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>{{  __('Register').' | '.config('app.name') }}</title>
    <!-- Fevicon -->
    <link rel="shortcut icon" href="{{ url('assets/images/favicon.ico') }}">
    <!-- Select2 css -->
    <link href="{{ url('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css">
    <!-- Switchery css -->
    <link href="{{ url('assets/plugins/switchery/switchery.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('assets/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('assets/css/style.css') }}" rel="stylesheet" type="text/css">
    <!-- End css -->
</head>
<body class="vertical-layout">
    <div id="containerbar" class="containerbar authenticate-bg">
        <!-- Start Container -->
        <div class="container-fluid">
            <div class="auth-box login-box">
                <div class="row no-gutters align-items-center justify-content-center">
                    <div class="col-md-4 col-lg-3 col-12">
                        <div class="auth-box-img">
                            <img src="{{ url('image/login.jpg') }}" class="img-fluid" alt="">
                        </div>
                        <div class="auth-logo form-head">
                            @if($setting->site_logo !='' && file_exists(public_path().'/media/logo/'.$setting->site_logo))
                                <a href="{{ url('/') }}" class="logo"><img src="{{ url('/media/logo/'.$setting->site_logo) }}" class="img-fluid" alt="logo"></a>
                            @else
                                <a href="{{ url('/') }}" class="logo"><img src="{{ Avatar::create(config('app.name'))->toBase64() }}" class="img-fluid" alt="logo"></a>
                            @endif
                            <p>Gym - Gym is laravel project currently.</p>
                        </div>  
                    </div>
                    <div class="col-md-8 col-lg-9 col-12">
                        <div class="auth-box-right sign-up-block">
                            <div class="card">
                                <div class="card-body">
                                    <form id="basic-form-wizard" action="{{ route('register') }}" method="POST"
                                        class="needs-validation" novalidate>
                                        {{ csrf_field() }}
                                        <h4 class="font-22 mb-3">{{ __("Create an Account !!!") }}</h4>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="text-dark" for="name">{{ __("Name: ") }}<span
                                                                class="text-danger">*</span></label>
                                                        <input value="{{ old('name') }}" name="name" type="text"
                                                            class="form-control @error('name') is-invalid @enderror"
                                                            id="name" placeholder="{{ __('Enter name here') }}" required>
                                                        @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="text-dark" for="address">{{ __("Email:") }} <span
                                                                class="text-danger">*</span></label>
                                                        <input name="email" type="email"
                                                            class="form-control @error('email') is-invalid @enderror"
                                                            value="{{ old('email') }}" required autocomplete="email"
                                                            id="email" placeholder="{{ __('Enter your email here') }}" />

                                                        @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="text-dark" for="address">{{ __("Password: ") }}<span
                                                                class="text-danger">*</span></label>
                                                        <input name="password" type="password"
                                                            class="form-control @error('password') is-invalid @enderror"
                                                            id="password" placeholder="Enter Password here" required>

                                                        @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="text-dark" for="address">{{ __("Confirm Password:") }} <span
                                                                class="text-danger">*</span></label>
                                                        <input type="password" class="form-control" id="re-password"
                                                            placeholder="Re-Type Password" name="password_confirmation"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="text-dark">{{ __("Mobile:") }}<span
                                                                class="text-danger">*</span></label>
                                                        <input value="{{ old('mobile') }}" title="enter valid no."
                                                            pattern="[0-9]+" type="text" class="form-control"
                                                            placeholder="Enter valid mobile no." name="mobile" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        @if($af_system->status == 1)
                                                        
                                                            <label class="info-title" for="exampleInputEmail1">{{ __('ReferCode') }}
                                                            </label>
                                                            <input value="{{ app('request')->input('refercode') ?? old('refercode') }}" type="text" name="refer_code" class="{{ $errors->has('refercode') ? ' is-invalid' : '' }} form-control unicase-form-control text-input" required />
                                    
                                                            @if ($errors->has('refercode'))
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('refercode') }}</strong>
                                                                </span> 
                                                            @endif
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="custom-checkbox-button">
                                                    <div class="form-check-inline checkbox-success">
                                                        <input class="@error('term') is-invalid @enderror terms"
                                                            type="checkbox" id="term" name="term">
                                                        <label
                                                            for="term">&nbsp;{{ __('I agree with terms and conditions') }}
                                                        </label>
                                                        @error('term')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                
                                            </div> 
                                        </div>  
                                        <div class="col-md-12">
                                            <div class="justify-content-center">
                                                <button type="submit"
                                                    class="btn btn-success btn-lg btn-block font-18">{{ __("Register") }}</button>
                                                    <p class="mb-0 mt-3">{{ __('Already have an account?') }} <a
                                                            href="{{ route('login') }}">{{ __('Log in') }}
                                                        </a>
                                                    </p>
                                                <div class="tiny-footer">
                                                    <p>All rights reserved<br><span><a href="#" title="">Terms & Condition</a> and <a href="#" title="">Privacy Policy</a></span></p>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </form>   
                                </div>
                            </div>
                                        <!-- End Auth Box -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                

    <!-- Start js -->
    <script src="{{ url('assets/js/jquery.min.js') }}"></script>
    <script src="{{ url('assets/js/popper.min.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('assets/js/custom/custom-form-validation.js') }}"></script>
    <!-- Switchery js -->
    <script src="{{ url('assets/plugins/switchery/switchery.min.js') }}"></script>
    <script src="{{ url('assets/js/modernizr.min.js') }}"></script>
    <script src="{{ url('assets/js/detect.js') }}"></script>
    <script src="{{ url('assets/js/jquery.slimscroll.js') }}"></script>
    <!-- Select2 js -->
    <script src="{{ url('assets/plugins/select2/select2.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('.select2').select2();
        });
        var stateurl = @json(route('list.state'));
        var cityurl = @json(route('list.cities'));

                </script>
                <script src="{{ url('assets/js/admin.js') }}"></script>

</body>
</html>
