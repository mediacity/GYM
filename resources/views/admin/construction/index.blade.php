<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Soyuz is a bootstrap minimal & clean admin template">
    <meta name="keywords" content="admin, admin panel, admin template, admin dashboard, responsive, bootstrap 4, ui kits, ecommerce, web app, crm, cms, html, sass support, scss">
    <meta name="author" content="Themesbox">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>{{ __("This page is under construction") }}</title>
    <!-- Fevicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
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
                            <img src="{{ url('/media/logo/'.$setting->site_favicon) }}" class="img-fluid error-logo" alt="logo">
                            <img src="assets/images/error/maintenance.svg" class="img-fluid error-image" alt="maintenance">
                            <h4 class="error-subtitle mb-4">{{ __('This page is under construction') }}</h4>
                            <a href="{{ url()->previous() }}" class="btn btn-primary font-16"><i class="feather icon-home mr-2"></i> Go back to Dashboard</a>
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
    <link href="{{ url('assets/css/style.css') }}"rel="stylesheet" type="text/css">
        <link href="{{ url('assets/js/popper.min.js') }}"rel="stylesheet" type="text/css">
        <link href="{{ url('assets/js/bootstrap.min.js') }}"rel="stylesheet" type="text/css">
         <link href="{{ url('assets/js/modernizr.min.js') }}"rel="stylesheet" type="text/css">
               <link href="{{ url('assets/js/detect.js') }}"rel="stylesheet" type="text/css">
                <link href="{{ url('assets/js/jquery.slimscroll.js') }}"rel="stylesheet" type="text/css">
        <!-- Start js -->
</body>
</html>