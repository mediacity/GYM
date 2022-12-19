 <!-- Start Topbar Mobile -->
 <div class="topbar-mobile">
     <div class="row align-items-center">
         <div class="col-md-12">
             <div class="mobile-logobar">
                 <a href="{{ url('/') }}" class="mobile-logo"><img src="{{ url('/media/logo/'.$setting->site_logo) }}"
                         class="img-fluid" alt="logo"></a>
             </div>
             <div class="mobile-togglebar">
                 <ul class="list-inline mb-0">
                     <li class="list-inline-item">
                         <div class="topbar-toggle-icon">
                             <a class="topbar-toggle-hamburger" href="javascript:void();">
                                 <img src="{{ url('assets/images/svg-icon/horizontal.svg') }}"
                                     class="img-fluid menu-hamburger-horizontal" alt="horizontal">
                                 <img src="{{ url('assets/images/svg-icon/verticle.svg') }}"
                                     class="img-fluid menu-hamburger-vertical" alt="verticle">
                             </a>
                         </div>
                     </li>
                     <li class="list-inline-item">
                         <div class="menubar">
                             <a class="menu-hamburger" href="javascript:void();">
                                 <img src="{{ url('assets/images/svg-icon/menu.svg') }}"
                                     class="img-fluid menu-hamburger-collapse" alt="collapse">
                                 <img src="{{ url('assets/images/svg-icon/close.svg') }}"
                                     class="img-fluid menu-hamburger-close" alt="close">
                             </a>
                         </div>
                     </li>
                 </ul>
             </div>
         </div>
     </div>
 </div>
 <!-- Start Topbar -->
<div class="topbar">
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-4 col-md-3">
            <div class="visit-btn">
                <a href="#" target="_blank">
                    <span class="live-icon">Visit Site</span>
                    <i class="feather icon-external-link" aria-hidden="true"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-8 col-md-9">
            <div class="infobar">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item mr-5 align-self-center">
                        <i class="fa fa-clock-o mr-1"></i>{{ __(' Your Time is') }} <span class="text-primary" id="timeyours"></span>
                    </li>
                    @inject('languages','JoeDixon\Translation\Language')
                   
                    <li class="list-inline-item">
                        <div class="languagebar">
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" id="languagelink"
                                     data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span
                                         class="live-icon">{{ ucfirst(session()->get('changed_language')) ?? ucfirst(app()->getLocale()) }}</span><span
                                         class="feather icon-chevron-down live-icon"></span></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="languagelink"
                                     x-placement="bottom-end">
                                     
                                    @foreach ($languages->get() as $key => $language)
                                    <a class="dropdown-item" href="{{ route('languageSwitch',$language->language) }}">
                                        <i class="feather icon-globe"></i>
                                        {{$language->name}} ({{$language->language}})</a>
                                    @endforeach
                                    
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-inline-item">
                        <div class="notifybar">
                            <div class="dropdown">
                                <a class="dropdown-toggle infobar-icon" href="#" role="button" id="notoficationlink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="{{ url('assets/images/svg-icon/notifications.svg') }}" class="img-fluid" alt="notifications">
                                    <span class="live-icon">{{ auth()->user()->unreadNotifications()->count() }}</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="notoficationlink">
                                    <div class="notification-dropdown-title">
                                        <h4>{{ __('Notifications') }}</h4>
                                    </div>
                                    <ul class="list-unstyled">
                                        <li class="media dropdown-item">
                                            <span class="mr-3 action-icon badge badge-warning-inverse"></span>
                                            <div class="media-body">
                                                @foreach (auth()->user()->unreadNotifications as $notification)
                                                <h5 class="action-title">{{($notification->data['id'])}}
                                                     {{($notification->data['data'])}} </h5>
                                                <p><span
                                                         class="timing">{{ ($notification->created_at->format('d-m-Y')) }}</span>
                                                </p>
                                                 @endforeach
                                            </div>
                                        </li>
                                    </ul>
                                    @if(isset($notification))
                                    <a class="color111 float-right"
                                         href="{{ route('markAsRead') }}">{{ __('MarkallasRead') }}</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-inline-item">
                        <div class="profilebar">
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="{{ route('profile.index')}}" role="button" id="profilelink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    @if(Auth::user()->photo != '' && file_exists(public_path().'/media/users/'.Auth::user()->photo))
                                    <img class="img-fluid" src="{{url('media/users/'.Auth::user()->photo)}}" title="{{ Auth::user()->name }}">
                                    @else
                                    <img class="img-fluid" title="{{ Auth::user()->name }}" src="{{ Avatar::create(Auth::user()->name)->toBase64() }}" />
                                    @endif
                                    
                                    <span class="live-icon">{{ Auth::user()->name }}</span>
                                    <span class="feather icon-chevron-down live-icon"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profilelink">
                                    <div class="dropdown-item">
                                        <div class="profilename">
                                            <h5>{{ Auth::user()->name}}</h5>
                                        </div>
                                    </div>
                                    <div class="userbox">
                                        <ul class="list-unstyled mb-0">
                                            <li class="media dropdown-item">
                                                <a href="{{ route('profile.index')}}" class="profile-icon">
                                                    <img src="{{ url('assets/images/svg-icon/crm.svg') }}" class="img-fluid" alt="user">{{ __('My Profile') }}
                                                </a>
                                            </li>
                                            <li class="media dropdown-item">
                                                <a href="{{ route('logout') }}" class="profile-icon" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    <img src="{{ url('assets/images/svg-icon/logout.svg') }}" class="img-fluid" alt="logout">{{ __('Logout') }}
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                     @csrf
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- End col -->
    </div>
    <!-- End row -->
 </div>
 <!-- End Topbar -->
 <!-- Start Breadcrumbbar -->
 @yield('breadcum')
 <!-- End Breadcrumbbar -->
 @yield('scripts')
 <script type="text/JavaScript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

<script>
      $( document ).ready(function() {
        
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    
    // m = checkTime(m);
    // s = checkTime(s);
   
    var date = today.getDate() + '/' + (today.getMonth() + 1) + '/' + today.getFullYear();
    
    var n = today.toLocaleString([], {
      hour: '2-digit',
      minute: '2-digit',
      second: '2-digit'
    });
    
    document.getElementById('timeyours').innerHTML = date + ' | ' + n;
    var t = setTimeout(startTime, 1000);
  });
</script>