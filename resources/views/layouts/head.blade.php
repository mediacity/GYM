<!-- Fevicon -->
<link rel="shortcut icon" href="{{ url('/media/logo/'.$setting->site_favicon ?? '') }}">
<!-- Start css -->
<!-- Switchery css -->
<link href="{{ url('assets/plugins/switchery/switchery.min.css') }}" rel="stylesheet">
<!-- Select2 css -->
<link href="{{ url('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css">
<!-- Slick css -->

<link href="{{ url('assets/plugins/slick/slick.css') }}" rel="stylesheet">
<link href="{{ url('assets/plugins/slick/slick-theme.css') }}" rel="stylesheet">
 <!-- Chartist Chart css -->
 <link rel="stylesheet" href="{{ url('assets/plugins/chartist-js/chartist.min.css') }}">
 <link href="{{ url('assets/plugins/apexcharts/apexcharts.css') }}" rel="stylesheet">
<!-- Dragula css -->
<link href="{{ url('assets/plugins/dragula/dragula.min.css') }}" rel="stylesheet">
<link href="{{ url('assets/plugins/fullcalendar/css/fullcalendar.min.css') }}" rel="stylesheet" />
<link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ url('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" rel="stylesheet" type="text/css">
<link href="{{ url('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.css') }}" rel="stylesheet" type="text/css">
<link href="{{ url('assets/plugins/pnotify/css/pnotify.custom.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ url('assets/css/icons.css') }}" rel="stylesheet" type="text/css">
<link href="{{ url('assets/css/flag-icon.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ url('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ url('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
 <!-- Responsive Datatable css -->
<link href="{{ url('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

@if(in_array(app()->getLocale(),array('ar','he','ur', 'arc', 'az', 'dv', 'ku', 'fa')))
<link href="{{ url('assets/css/style_rtl.css') }}" rel="stylesheet" type="text/css">
@else 
<link href="{{ url('assets/css/style.css') }}" rel="stylesheet" type="text/css"> <!-- LTR -->
<link rel="stylesheet" href="{{ url('css/theme.css') }}" type="text/css">
@endif
<link href="{{ url('assets/css/custom.css') }}" rel="stylesheet" type="text/css">
<link href="{{ url('assets/plugins/apexcharts/apexcharts.css') }}" rel="stylesheet">
    <!-- jvectormap css -->
<link href="{{ url('assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet">
<link href="{{ url('assets/plugins/slick/slick-theme.css') }}" rel="stylesheet">
<!-- jQuery ui css -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<link rel="stylesheet" href="{{asset('assets/css/jquery.rateyo.css')}}">
<link href={{ url('assets/plugins/toolbar/jquery.toolbar.css') }} rel="stylesheet" type="text/css">
<!-- Tags Input -->
<link href="{{url('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.css')}}" rel="stylesheet" type="text/css">
<link  href="{{url('https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css')}}"rel="stylesheet" type="text/css" />
<!-- include libraries(jQuery, bootstrap) -->

@toastr_css
<!-- End css -->

@yield('stylesheet')