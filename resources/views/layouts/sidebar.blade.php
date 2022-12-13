<div class="leftbar">
    <!-- Start Sidebar -->
    <div class="sidebar">
        <!-- Start Navigationbar -->
        <div class="vertical-menu-detail">
            <div class="logobar">
                <a href="{{ url('/') }}" class="logo logo-large">
                    <img src="{{ url('media/logo/'.$setting->site_logo) }}"
                        class="img-fluid" alt="logo">
                </a>
            </div>
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade active show" id="v-pills-dashboard" role="tabpanel" aria-labelledby="v-pills-dashboard">
                    <!-- DAshboard -->
                    <ul class="vertical-menu">                        
                        <li class="{{ Nav::isRoute('admin.dashboard.index') }} vertical-active">
                            <a class="nav-link" href="{{ route('admin.dashboard.index') }}">
                                <i class="fa fa-columns"></i>
                                <span>{{ __('Dashboard') }}</span>
                            </a>
                        </li>
                        <!--Enquiry-->
                        @can('enquiry.view')
                        <li class="{{ Nav::isResource('enquiry') }} vertical-active">
                            <a class="{{ Nav::isResource('enquiry') }}" href="{{ route('enquiry.index') }}">
                                <i class="feather icon-phone-call"></i>
                                <span>{{ __('Enquiry') }}</span>
                            </a>
                        </li>
                        @endcan
                         <!-- Users -->
                          <li class="{{ Nav::isResource('users') }} {{ Nav::isResource('roles') }}">
                            <a href="javaScript:void();">
                                <i class="feather icon-user-check"></i><span>{{ __('Users') }}</span><i class="feather icon-chevron-right"></i>
                            </a>
                            <ul class="vertical-submenu">
                                 @can('users.view')
                                <li>
                                    <a class="{{ Nav::isResource('users') }}" href="{{ route('users.index') }}">{{ __('All users') }}</a>
                                </li>
                                @endcan
                                @can('roles.view')
                                <li>
                                    <a class="{{ Nav::isResource('roles') }}" href="{{ route('roles.index') }}">{{ __('Roles & Permissions') }}</a>
                                </li>
                                @endcan
                                <li>
                                    <a class="nav-link" href="{{ route('user.affiliate.settings') }}"> {{ __('Referal Link') }} </a>
                                </li>
                                <li>
                                    <a class="{{ Nav::isResource('quotation') }}" href="{{ route('quotation.index')}}">{{ __('Quotation') }}</a>
                                </li>
                            </ul>
                        </li>
                        <!-- Gym Management -->
                        <li class="{{ Nav::isResource('exercise') }} {{ Nav::isResource('measurement') }}  {{ Nav::isResource('locker') }}  ">
                            <a href="javaScript:void();">
                                <i class="feather icon-voicemail"></i><span>{{ __('Gym Management') }}</span><i class="feather icon-chevron-right"></i>
                            </a>
                            <ul class="vertical-submenu">
                                @can('exercise.view')
                                 <li>
                                    <a class="{{ Nav::isResource('exercise') }}" href="{{ route('exercise.index') }}">
                                        {{ __('Exercise Package') }}
                                    </a>
                                </li>
                                @endcan
                                @can('exercise.add')
                                <li class="{{ Nav::isResource('exercisename') }} {{ Nav::isResource('type') }}">
                                    <a href="javaScript:void();">
                                        <span>{{ __('Exercisename') }}</span>
                                        <i class="feather icon-chevron-right"></i>
                                    </a>
                                    <ul class="vertical-submenu">
                                          <li>
                                            <a class="{{ Nav::isResource('exercisename') }}" href="{{ route('exercisename.index') }}">{{ __('Exercisename ') }}</a>
                                        </li>
                                         <li>
                                            <a class="{{ Nav::isResource('type') }}" href="{{ route('type.index') }}">{{ __('Type') }}</a>
                                        </li>
                                    </ul>
                                </li>
                                @endcan
                                <!-- Measurements -->
                                @can('measurements.view')
                                <li>
                                    <a class="{{ Nav::isResource('measurement') }}" href="{{ route('measurement.index') }}">
                                        {{ __('Measurements') }}
                                    </a>
                                </li>
                                @endcan
                                <li class="{{ Nav::isResource('packages') }} {{ Nav::isResource('fees') }}">
                                    <a href="javaScript:void();">
                                        </i><span>{{ __('Package & Plans') }}</span>
                                        <i class="feather icon-chevron-right"></i>
                                    </a>
                                    <ul class="vertical-submenu">
                                         <!--Packages-->
                                        @can('packages.view')
                                        <li>
                                            <a class="{{ Nav::isResource('packages') }}" href="{{ route('packages.index') }}">
                                                {{ __('Packages') }}
                                            </a>
                                        </li>
                                        @endcan
                                        @can('fees.view')
                                        <li>
                                            <a class="{{ Nav::isResource('fees') }}" href="{{ route('fees.index') }}">
                                                {{ __('Fees') }}
                                            </a>
                                        </li>
                                        @endcan
                                    </ul>
                                </li>
                                @can('supplement.view')
                                <li>
                                    <a class="{{ Nav::isResource('admin/supplement') }}" href="{{ route('supplement.index') }}">

                                        {{ __('Supplement') }}
                                    </a>
                                </li>
                                @endcan
                                <li class="{{ Nav::isResource('diet_session') }} {{ Nav::isResource('diet_content') }}">
                                    <a href="javaScript:void();">
                                        <span>{{ __('Diet Management') }}</span><i
                                            class="feather icon-chevron-right"></i>
                                        </a>
                                    <ul class="vertical-submenu">
                                         @can('diet.view')
                                        <li>
                                            <a class="{{ Nav::isResource('diet') }}" href="{{ route('diet.index') }}">{{ __('Diet Package') }}</a>
                                        </li>
                                        @endcan
                                         @can('diet_session.view')
                                        <li>
                                            <a class="{{ Nav::isResource('diet_session') }}"
                                                href="{{ route('dietid.index') }}">{{ __('Diet session') }}</a>
                                        </li>
                                        @endcan
                                        @can('diet_content.view')
                                        <li>
                                            <a class="{{ Nav::isResource('diet_content') }}"
                                                href="{{ route('dietcontent.index') }}">{{ __('Diet content') }}</a>
                                        </li>
                                         @endcan
                                         </ul>
                                        </li>
                                     </ul>
                        </li>
                        <!--Trainerpackages-->
                        @can('trainerpackages.view')
                        <li>
                            <a class="{{ Nav::isResource('trainerpackages') }}"
                                href="{{ route('trainerpackages.index') }}">
                                <i class="feather icon-message-square"></i>
                                <span>{{ __('Trainerpackages') }}</span>
                            </a>

                        </li>
                        @endcan
                        <li class="{{ Nav::isResource('trainer') }} {{ Nav::isResource('trainerlist') }}">
                            <a href="javaScript:void();">
                                <i class="feather icon-user-plus"></i><span>{{ __('Trainer') }}</span><i
                                    class="feather icon-chevron-right"></i>

                            </a>
                            <ul class="vertical-submenu">
                                 @can('trainer_list.view')
                                <li>
                                    <a class="{{ Nav::isResource('trainerlist') }}"
                                        href="{{ route('trainerlist.index') }}">{{ __('Trainer List') }}</a>
                                </li>
                                @endcan
                                 @can('trainer.view')
                                <li>
                                    <a class="{{ Nav::isResource('trainer') }}"
                                        href="{{ route('trainer.index') }}">{{ __('Trainer ') }}</a>
                                </li>
                                @endcan
                                <li class="{{ Nav::isResource('attendance') }}">
                                    <a href="javaScript:void();">
                                        <span>{{ __('Attendance') }}</span><i class="feather icon-chevron-right"></i>

                                    </a>
                                    <ul class="vertical-submenu">
                                        @can('member_attendance.view')
                                        <li>
                                            <a class="{{ Nav::isResource('attendance') }}"
                                                href="{{ route('memberattendance.index') }}">{{ __('Member Attendance') }}</a>
                                        </li>
                                        @endcan
                                        @can('staff_attendance.view')
                                        <li>
                                            <a class="{{ Nav::isResource('attendance') }}"
                                                href="{{ route('staffattendance.index') }}">{{ __('Staff Attendance') }}</a>
                                        </li>
                                        @endcan
                                    </ul>
                                    <li
                                    class="{{ Nav::isResource('appointment') }} {{ Nav::isResource('appointmentsetting') }}">
                                    <a href="javaScript:void();">
                                        </i><span>{{ __('Appointment') }}</span>
                                        <i class="feather icon-chevron-right"></i>
                                    </a>
                                    <ul class="vertical-submenu">
                                        <li>
                                            <a class="{{ Nav::isResource('appointment') }}"
                                                href="{{ route('appointment.index') }}">{{ __('Appointment ') }}</a>
                                        </li>
                                        <li>
                                            <a class="{{ Nav::isResource('appointmentsetting') }}"
                                                href="{{ route('appointmentsetting.index') }}">{{ __('Appointment setting') }}</a>
                                        </li>
                                        <li>
                                            <a class="{{ Nav::isResource('service') }}"
                                                href="{{ route('service.index')}}">
                                                {{ __('Service') }}
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="{{ Nav::isResource('todo') }} {{ Nav::isResource('group') }}">
                                    <a href="javaScript:void();">
                                        <span>{{ __('Todo') }}</span>
                                        <i class="feather icon-chevron-right"></i>
                                    </a>
                                    <ul class="vertical-submenu">
                                        <li>
                                            <a class="{{ Nav::isResource('todo') }}"
                                                href="{{ route('todo.index') }}">{{ __('Todo ') }}</a>
                                        </li>
                                        <li>
                                            <a class="{{ Nav::isResource('group') }}"
                                                href="{{ route('group.index') }}">{{ __('Group') }}</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                         <li>
                            <a href="javaScript:void();">
                                <i class="feather icon-file"></i><span>{{ __('Reports') }}</span><i
                                    class="feather icon-chevron-right"></i></a>
                            <ul class="vertical-submenu">
                                <li>
                                    <a href="{{ route('history') }}">{{ __('Payment Report ') }}</a>
                                </li>
                                 <li>
                                    <a href="{{ route('reports') }}">{{ __('Referal Report ') }}</a>
                                </li>
                                 <li>
                                    <a href="{{ route('demo') }}">{{ __('Demo Report ') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('join') }}">{{ __('Join Report ') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('device.logs') }}">{{ __('Device History ') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('user.image') }}">{{ __('Download Image ') }}</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ url('clear-cache') }}">
                                <i class="feather icon-loader"></i> <span>{{ __('Clear Cache') }}</span>
                            </a>
                        </li>
                        @can('ptsubscription.view')
                        <li>
                            <a href="{{ route('ptsubscription.index') }}">
                                <i class="feather icon-file-plus"></i> <span>{{ __('PT Subscription') }}</span>
                            </a>
                        </li>
                        @endcan
                        <!--Setting-->
                        <li>
                            <a href="javaScript:void();">
                                <i class="feather icon-settings"></i><span>{{ __('Settings') }}</span><i
                                    class="feather icon-chevron-right"></i>
                                </a>
                            <ul class="vertical-submenu">
                                 @can('settings.update')
                                 <li>
                                    <a href="{{ route('site.settings') }}">{{ __('Site Settings') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('mail.setting') }}">{{ __('Mail Settings') }}</a>
                                </li>
                                <li>
                                    <a class="{{ Nav::isResource('settings/razorpay') }}"
                                        href="{{ route('payment.settings') }}">{{ __('Payment Settings') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.push.noti.settings') }}">{{ __('Onesignal Settings') }}</a>
                                </li>
                                @endcan
                                 <li>
                                    <a class="{{ Nav::isResource('settings/invoice') }}"
                                        href="{{ route('invoice.settings') }}">{{ __('Invoice Settings') }}</a>
                                </li>
                                <li>
                                    <a class="nav-link" href="{{ route('save.affilates') }}">

                                        {{ __('Affilates') }}
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link" href="{{ route('multicurrency.index') }}">

                                        {{ __('MultiCurrency') }}
                                    </a>
                                </li>
                                <!-- Manual Payment settings-->
                                <li>
                                    <a class="nav-link" href="{{ route('manual.payment.gateway') }}">

                                        {{ __('Manual Payment') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('pwa.setting.index') }}">{{ __('PWA Settings') }}</a>
                                </li>
                            </ul>
                        </li>
                        <li class="{{ Nav::isResource('pages') }} {{ Nav::isResource('faq') }} {{ Nav::isResource('slider') }}
                            {{ Nav::isResource('blogs') }}">
                            <a href="#">
                                <i class="feather icon-settings"></i><span>{{ __('Front Settings') }}</span>
                                <i class="feather icon-chevron-right"></i>
                            </a>
                            <ul class="vertical-submenu">
                                <!----Sliders ------>
                                @can('slider.view')
                                <li>
                                    <a class="{{ Nav::isResource('slider') }}" href="{{ route('slider.index') }}">
                                        {{ __('Slider') }}
                                    </a>
                                </li>
                                @endcan
                                <!--FAQ-->
                                @can('faq.view')
                                <li>
                                    <a class="{{ Nav::isResource('faq') }}" href="{{ route('faq.index') }}">
                                        {{ __('Faq') }}
                                    </a>
                                </li>
                                @endcan
                                <!--Pages-->
                                @can('pages.view')
                                <li>
                                    <a class="{{ Nav::isResource('pages') }}" href="{{ route('pages.index') }}">
                                        {{ __('Pages') }}
                                    </a>
                                </li>
                                @endcan
                                <!-- Blogs -->
                                <li>
                                    <a class="{{ Nav::isResource('blog') }} {{ Nav::isResource('blogcategory') }}"
                                        href="#">
                                        {{ __('Blogs') }}<i class="feather icon-chevron-right"></i>
                                    </a>
                                    <ul class="vertical-submenu">
                                        @can('blogs.view')
                                        <li>
                                            <a class="{{ Nav::isResource('blog') }}"
                                                href="{{ route('blog.index') }}">{{ __('Blog') }}</a>
                                        </li>
                                        @endcan
                                         @can('blogs.view')
                                        <li>
                                            <a class="{{ Nav::isResource('blogcategory') }}"
                                                href="{{ route('blogcategory.index') }}">{{ __('Blog Category') }}</a>
                                        </li>
                                        @endcan
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
    <!-- End Navigationbar -->
</div>
<!-- End Sidebar -->
