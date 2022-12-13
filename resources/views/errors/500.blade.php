<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="{{ $setting['site_description'] }}">
    <meta name="keywords" content="{{ $setting['site_keyword'] }}">
    <meta name="author" content="{{ config('app.name') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>{{ __('500 | Internal Server Error') }}</title>
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
            <div class="auth-box error-box">
                <!-- Start row -->
                 <div class="row no-gutters align-items-center justify-content-center">
                    <!-- Start col -->
                    <div class="col-md-8 col-lg-6">
                        <div class="text-center">
                            <img src="{{ url('assets/images/logo.svg') }}" class="img-fluid error-logo" alt="logo">
                            <img src="{{ url('assets/images/error/internal-server.svg') }}" class="img-fluid error-image" alt="500">
                            <h4 class="error-subtitle mb-4">{{ __('500 Internal Server Error') }}</h4>
                            <p class="mb-4">{{ __('The server encountered an internal error or misconfiguration and was unable to complete your request.') }}</p>                           
                            <a href="{{ url('/') }}" class="btn btn-primary font-16"><i class="feather icon-home mr-2"></i> Go back to Dashboard</a>
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
