<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ in_array(app()->getLocale(),array('ar','he','ur', 'arc', 'az', 'dv', 'ku', 'fa')) ? "rtl" : "ltr" }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="{{ $setting['site_description'] }}">
    <meta name="keywords" content="{{ $setting['site_keyword'] }}">
    <meta name="author" content="{{ config('app.name') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>@yield('title') | {{ __('Admin') }}</title>
     @include('layouts.head')
     @if(env('PWA_ENABLE') == 1)
        @laravelPWA
      @endif
 
      <style>
.box {
  position: relative;
  max-width: 60 0px;
  width: 100%;
  height: 400px;
  background: #fff;
  box-shadow: 0 0 15px rgba(0,0,0,.1);
}
/* .vertical-menu {
    height: 100% !important;
} */
.slimScrollDiv {
    height: 700px !important;
}
.vertical-menu-detail {
    height: 800px !important;
}
.navigationbar {
  height: calc(100vh - 0px);
    background: #f2f3f7;
}
.slimScrollRail {
    opacity: 0.98;
}
.pay-btn {
  font-size: 13px !important;
}
.pricing  {
  padding-bottom: 30px; 
}
.contentbar {
  padding: 0 30px 0 0;
}
.mrg-btm-30 {
  margin-bottom: 30px;
}
.feather {
  color: #8A98AC;
}
/* common */
.ribbon {
  width: 150px;
  height: 150px;
  overflow: hidden;
  position: absolute;
}
.ribbon::before,
.ribbon::after {
  position: absolute;
  z-index: -1;
  content: '';
  display: block;
  border: 5px solid #43d187;
}
.ribbon span {
  position: absolute;
  display: block;
  width: 229px;
  padding: 5px 0;
  background-color: #43d187;
  box-shadow: 0 5px 10px rgba(0,0,0,.1);
  color: #fff;
  font: 700 18px/1 'Lato', sans-serif;
  text-shadow: 0 1px 1px rgba(0,0,0,.2);
  text-transform: uppercase;
  text-align: center;
}

/* top left*/
.ribbon-top-left {
  top: 0px;
  left: 0px;
}
.ribbon-top-left::before,
.ribbon-top-left::after {
  border-top-color: transparent;
  border-left-color: transparent;
}
.ribbon-top-left::before {
  top: 0;
  right: 0;
}
.ribbon-top-left::after {
  bottom: 0;
  left: 0;
}
.ribbon-top-left span {
  right: -25px;
  top: 30px;
  transform: rotate(-45deg);
}

/* top right*/
.ribbon-top-right {
  top: 0px;
  right: 0px;
}
.ribbon-top-right::before,
.ribbon-top-right::after {
  border-top-color: transparent;
  border-right-color: transparent;
}
.ribbon-top-right::before {
  top: 0;
  left: 0;
}
.ribbon-top-right::after {
  bottom: 0;
  right: 0;
}
.ribbon-top-right span {
  left: -5px;
  top: 17px;
  transform: rotate(45deg);
}

/* bottom left*/
.ribbon-bottom-left {
  bottom: -10px;
  left: -10px;
}
.ribbon-bottom-left::before,
.ribbon-bottom-left::after {
  border-bottom-color: transparent;
  border-left-color: transparent;
}
.ribbon-bottom-left::before {
  bottom: 0;
  right: 0;
}
.ribbon-bottom-left::after {
  top: 0;
  left: 0;
}
.ribbon-bottom-left span {
  right: -25px;
  bottom: 30px;
  transform: rotate(225deg);
}

/* bottom right*/
.ribbon-bottom-right {
  bottom: -10px;
  right: -10px;
}
.ribbon-bottom-right::before,
.ribbon-bottom-right::after {
  border-bottom-color: #008000;
  border-right-color: #008000;
}
.ribbon-bottom-right::before {
  bottom: 0;
  left: 0;
}
.ribbon-bottom-right::after {
  top: 0;
  right: 0;
}
.ribbon-bottom-right span {
  left: -25px;
  bottom: 30px;
  transform: rotate(-225deg);
}
.purple{
  background-color: #c3afd6;
}
.green{
  background-color: #78e6bc;
}
.yellow{
  background-color: #f1fa78;
}
.pink{
  background-color: #cca0bd;
}
.red{
  background-color: #e48f8f;
}
.blue{
  background-color: #a8e1f3;
}
.bluish{
  background-color: #a0c1d4;
}
.pinkish{
  background-color: #ee88bb;
}
.black{
  background-color: #0e0d0d;
}
</head>
   


<body onload="startTime()" class="vertical-layout"> 
<div id="containerbar">
   @include('layouts.sidebar')
   

<div class="rightbar">
     @include('layouts.topbar')
     <!-- Start Contentbar -->    
    <div class="contentbar">                
        @include('message')
        @yield('maincontent')
    </div>


    <div class="contentbar">                
      @yield('rightbar-content')
    </div>
    
         <!-- Start Footerbar -->
    <div class="footerbar">
        <footer class="footer">
            <p class="mb-0">© {{ date('Y') }} {{ config('app.name') }} - {{ $setting['site_copyright'] }}.</p>
        </footer>
    </div>
       
  
  
    
    <!-- End Footerbar -->
</div>

</div>
 @include('layouts.scripts')
 @yield('scripts')
</body>
</html>