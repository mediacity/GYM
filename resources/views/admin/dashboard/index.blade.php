@extends('layouts.master')
@section('title',__(' Dashboard'))
<!-- Start Breadcrumbbar -->
@section('breadcum')
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-12 col-lg-8">
            <h4 class="page-title">{{ __("Home") }}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('Dashboard') }}</li>

                </ol>
            </div>
        </div>

    </div>
</div>
@endsection
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
@section('maincontent')
<div class="">
    @can('dashboard.superadmin')
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12">
            <!-- Start row -->
            <div class="row">
                <!-- Start col -->
                <div class="col-lg-6 col-xl-3 col-sm-6">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h4>{{ $userss }}</h4>
                                    <p class="font-14 mb-0">{{ __('Users') }}</p>
                                </div>
                                <div class="col-6 text-right">
                                    <a href="{{ route('users.index') }}"><i
                                            class="text-info feather icon-users icondashboard"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End col -->
                <!-- Start col -->
                <div class="col-lg-6 col-xl-3 col-sm-6">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h4>{{ $blogs }}</h4>
                                    <p class="font-14 mb-0">{{ __("Blogs") }}</p>
                                </div>
                                <div class="col-6 text-right">
                                    <a href="{{ route('blog.index') }}"><i
                                            class="text-info feather icon-message-square icondashboard"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End col -->
                <!-- Start col -->
                <div class="col-lg-6 col-xl-3 col-sm-6">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h4>{{ $payments }}</h4>
                                    <p class="font-14 mb-0">{{ __("Payment") }}</p>
                                </div>
                                <div class="col-6 text-right">
                                    <a href="{{ route('history') }}"><i class="text-info feather icon-dollar-sign icondashboard"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3 col-sm-6">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h4>{{ $faqs }}</h4>
                                    <p class="font-14 mb-0">{{ __("Faqs") }}</p>
                                </div>
                                <div class="col-6 text-right">
                                    <a href="{{ route('faq.index') }}"><i
                                            class="text-info feather icon-help-circle icondashboard"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3 col-sm-6">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h4>{{$quotations }}</h4>
                                    <p class="font-14 mb-0">{{ __("Quotation") }}</p>
                                </div>
                                <div class="col-6 text-right">
                                    <a href="{{ route('quotation.index') }}"><i
                                            class="text-info feather icon-file icondashboard"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3 col-sm-6">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h4>{{ $referalusers }}</h4>
                                    <p class="font-14 mb-0">{{ __("AffilateHistory") }}</p>
                                </div>
                                <div class="col-6 text-right">
                                    <a href="{{ route('history') }}"><i
                                            class="text-info feather icon-user-check icondashboard"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3 col-sm-6">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h4>{{ $appointments }}</h4>
                                    <p class="font-14 mb-0">{{ __("Appointment") }}</p>
                                </div>
                                <div class="col-6 text-right">
                                    <a href="{{ route('appointment.index') }}"><i
                                            class="text-info feather icon-phone-call icondashboard"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3 col-sm-6">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h4>{{ $enquirys }}</h4>
                                    <p class="font-14 mb-0">{{ __("Enquiry") }}</p>
                                </div>
                                <div class="col-6 text-right">
                                    <a href="{{ route('enquiry.index') }}"><i
                                            class="text-info feather icon-plus-square icondashboard"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if(count($todayuser)>0)
                <div class="col-lg-6 col-xl-3 col-sm-6">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <h5 class="card-title mb-0">{{ __("Top Users") }}</h5>
                                </div>
                                <div class="col-3">
                                    <div class="dropdown">
                                        <button class="btn btn-link p-0 font-18 float-right" type="button"
                                            id="widgetRevenue" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false"><i class="feather icon-more-horizontal-"></i></button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="widgetRevenue">
                                            <a class="dropdown-item font-13" href="#">{{ __("Refresh") }}</a>
                                            <a class="dropdown-item font-13" href="#">{{ __("Export") }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="user-slider">
                            @foreach($todayuser as $todayusers)
                            <div class="user-slider">
                                <div class="user-slider-item">
                                    <div class="card-body text-center">
                                        <span class="action-icon badge badge-primary-inverse">
                                            <img src="{{ Avatar::create($todayusers->name)->toBase64() }}"
                                                class="dashboard-imgs" alt=""></span>
                                        <h5>{{ $todayusers->name }}</h5>
                                        <p>{{ $todayusers->email }}</p>
                                        <p><span
                                                class="badge badge-primary-inverse">{{ __("Membership:") }}{{ $todayusers->membership }}</span>
                                        </p>
                                        <div class="button-list mt-4">
                                            <button type="button" class="btn btn-round btn-secondary-rgba"><i
                                                    class="feather icon-phone"></i></button>
                                            <button type="button" class="btn btn-round btn-secondary-rgba"><i
                                                    class="feather icon-mail"></i></button>
                                        </div>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="row">
                                            <div class="col-12">
                                                <h4 class="user-phone-no border-right">{{ $todayusers->phone }}</h4>
                                                <p class="user-contact-no my-2">{{ __("Contact No") }}</p>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                @endif
                <div class="col-lg-6 col-xl-3 col-sm-6 d-none">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <h5 class="card-title mb-0">{{ __("Top Measurement") }}</h5>
                                </div>
                                <div class="col-3">
                                    <div class="dropdown">
                                        <button class="btn btn-link p-0 font-18 float-right" type="button"
                                            id="widgetRevenue" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false"><i class="feather icon-more-horizontal-"></i></button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="widgetRevenue">
                                            <a class="dropdown-item font-13" href="#">{{ __("Refresh") }}</a>
                                            <a class="dropdown-item font-13" href="#">{{ __("Export") }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="user-slider">
                            @foreach($todaymeasurements as $todaymeasurement)
                            <div class="user-slider">
                                <div class="user-slider-item">
                                    <div class="card-body text-center">
                                        <span class="action-icon badge badge-primary-inverse"><img
                                                src="{{ Avatar::create($todaymeasurement->user->name )->toBase64() }}"
                                                class="dashboard-imgs" alt=""></span>
                                        <h5>{{ $todaymeasurement->user->name }}</h5>
                                        <p>{{ $todaymeasurement->user->email }}</p>
                                        <p><span
                                                class="badge badge-primary-inverse">{{ __("Date:") }}{{ $todaymeasurement->created_at }}</span>
                                        </p>
                                        <div class="button-list mt-4">
                                            <button type="button" class="btn btn-round btn-secondary-rgba"><i
                                                    class="feather icon-phone"></i></button>
                                            <button type="button" class="btn btn-round btn-secondary-rgba"><i
                                                    class="feather icon-mail"></i></button>
                                        </div>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="row">
                                            <div class="col-12">
                                                <h4 class="user-phone-no border-right">{{ $todaymeasurement->description }}</h4>
                                                <p class="user-contact-no my-2">{{ __("Description") }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3 col-sm-6 d-none">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <h5 class="card-title mb-0">{{ __("Top Enquiry") }}</h5>
                                </div>
                                <div class="col-3">
                                    <div class="dropdown">
                                        <button class="btn btn-link p-0 font-18 float-right" type="button"
                                            id="widgetRevenue" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false"><i class="feather icon-more-horizontal-"></i></button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="widgetRevenue">
                                            <a class="dropdown-item font-13" href="#">{{ __("Refresh") }}</a>
                                            <a class="dropdown-item font-13" href="#">{{ __("Export") }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="user-slider">
                            @foreach($todayenquiry as $todayenquirys)
                            <div class="user-slider">
                                <div class="user-slider-item">
                                    <div class="card-body text-center">
                                        <span class="action-icon badge badge-primary-inverse"><img
                                                src="{{ Avatar::create($todayenquirys->name )->toBase64() }}"
                                                class="dashboard-imgs" alt=""></span>
                                        <h5>{{ $todayenquirys->name }}</h5>
                                        <p>{{ $todayenquirys->email }}</p>
                                        <p><span
                                                class="badge badge-primary-inverse">{{ __("Status:") }}{{ $todayenquirys->status }}</span>
                                        </p>
                                        <div class="button-list mt-4">
                                            <button type="button" class="btn btn-round btn-secondary-rgba"><i
                                                    class="feather icon-phone"></i></button>
                                            <button type="button" class="btn btn-round btn-secondary-rgba"><i
                                                    class="feather icon-mail"></i></button>
                                        </div>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="row">
                                            <div class="col-12">
                                                <h4  class="user-phone-no border-right">{{date_format($todayenquirys->created_at,'d-m-Y')}}</h4>
                                                <p class="user-contact-no my-2">{{ __("Enquiry Date") }}</p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @if(count($todayappointment)>0)
                <div class="col-lg-6 col-xl-3 col-sm-6">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <h5 class="card-title mb-0">{{ __("Top Appointment") }}</h5>
                                </div>
                                <div class="col-3">
                                    <div class="dropdown">
                                        <button class="btn btn-link p-0 font-18 float-right" type="button"
                                            id="widgetRevenue" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false"><i class="feather icon-more-horizontal-"></i></button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="widgetRevenue">
                                            <a class="dropdown-item font-13" href="#">{{ __("Refresh") }}</a>
                                            <a class="dropdown-item font-13" href="#">{{ __("Export") }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="user-slider">
                            @foreach($todayappointment as $todayappointments)
                            <div class="user-slider">
                                <div class="user-slider-item">
                                    <div class="card-body text-center">
                                        <span class="action-icon badge badge-primary-inverse"><img
                                                src="{{ Avatar::create($todayappointments->user->name)->toBase64() }}"
                                                class="dashboard-imgs" alt=""></span>
                                        <h5>{{ $todayappointments->user->name }}</h5>
                                        <p>{{ $todayappointments->user->email }}</p>
                                        <p><span
                                                class="badge badge-primary-inverse">Service:{{ $todayappointments->service->name}}</span>
                                        </p>
                                        <div class="button-list mt-4">
                                            <button type="button" class="btn btn-round btn-secondary-rgba"><i
                                                    class="feather icon-phone"></i></button>
                                            <button type="button" class="btn btn-round btn-secondary-rgba"><i
                                                    class="feather icon-mail"></i></button>
                                        </div>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="row">
                                            <div class="col-12">
                                                <h4  class="user-phone-no border-right">{{date_format($todayappointments->created_at,'d-m-Y')}}</h4>
                                                <p class="user-contact-no my-2">{{ __("Appointment Date") }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif

                @if(count($todayreferal)>0)
                <div class="col-lg-6 col-xl-3 col-sm-6">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <h5 class="card-title mb-0">{{ __("Top Referal User") }}</h5>
                                </div>
                                <div class="col-3">
                                    <div class="dropdown">
                                        <button class="btn btn-link p-0 font-18 float-right" type="button"
                                            id="widgetRevenue" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false"><i class="feather icon-more-horizontal-"></i></button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="widgetRevenue">
                                            <a class="dropdown-item font-13" href="#">{{ __("Refresh") }}</a>
                                            <a class="dropdown-item font-13" href="#">{{ __("Export") }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="user-slider">
                            @foreach($todayreferal as $todayreferals)
                           
                            <div class="user-slider">
                                <div class="user-slider-item">
                                    <div class="card-body text-center">
                                        <span class="action-icon badge badge-primary-inverse"><img
                                                src="{{ Avatar::create($todayreferals->user->name)->toBase64() }}"
                                                class="dashboard-imgs" alt=""></span>
                                        <h5>{{ $todayreferals->user->name }}</h5>
                                        <p>{{ $todayreferals->amount }}</p>
                                        <p><span class="badge badge-primary-inverse">{{ $todayreferals->log}}</span></p>
                                        <div class="button-list mt-4">
                                            <button type="button" class="btn btn-round btn-secondary-rgba"><i
                                                    class="feather icon-phone"></i></button>
                                            <button type="button" class="btn btn-round btn-secondary-rgba"><i
                                                    class="feather icon-mail"></i></button>
                                        </div>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="row">
                                            <div class="col-12">
                                                <h4 class="user-phone-no border-right">{{date_format($todayreferals->created_at,'d-m-Y')}}
                                                </h4>
                                                <p class="user-contact-no my-2">{{ __("Referal Date") }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif
                
                @if(count($userbirthday)>0)
                <div class="col-lg-6 col-xl-3 col-sm-6">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <h5 class="card-title mb-0">{{ __("Top User Birthday") }}</h5>
                                </div>
                                <div class="col-3">
                                    <div class="dropdown">
                                        <button class="btn btn-link p-0 font-18 float-right" type="button"
                                            id="widgetRevenue" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false"><i class="feather icon-more-horizontal-"></i></button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="widgetRevenue">
                                            <a class="dropdown-item font-13" href="#">{{ __("Refresh") }}</a>
                                            <a class="dropdown-item font-13" href="#">{{ __("Export") }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="user-slider">
                            @foreach($userbirthday as $userbirthdays)
                            <div class="user-slider">
                                <div class="user-slider-item">
                                    <div class="card-body text-center">
                                        <span class="action-icon badge badge-primary-inverse"><img
                                                src="{{ Avatar::create($userbirthdays->name)->toBase64() }}"
                                                class="dashboard-imgs" alt=""></span>
                                        <h5>{{ $userbirthdays->dob }}</h5>
                                        <p>{{ $userbirthdays->name }}</p>
                                        <p><span class="badge badge-primary-inverse">{{ $userbirthdays->log}}</span></p>
                                        <div class="button-list mt-4">
                                            <button type="button" class="btn btn-round btn-secondary-rgba"><i
                                                    class="feather icon-phone"></i></button>
                                            <button type="button" class="btn btn-round btn-secondary-rgba"><i
                                                    class="feather icon-mail"></i></button>
                                        </div>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="row">
                                            <div class="col-12">
                                                <h4 class="user-phone-no border-right">{{date_format($userbirthdays->created_at,'d-m-Y')}}</h4>
                                                <p class="user-contact-no my-2">{{ __("User Register") }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif

                <div class="col-lg-6 col-xl-3 col-sm-6 d-none">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <h5 class="card-title mb-0">{{ __("Top Exercise") }}</h5>
                                </div>
                                <div class="col-3">
                                    <div class="dropdown">
                                        <button class="btn btn-link p-0 font-18 float-right" type="button"
                                            id="widgetRevenue" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false"><i class="feather icon-more-horizontal-"></i></button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="widgetRevenue">
                                            <a class="dropdown-item font-13" href="#">{{ __("Refresh") }}</a>
                                            <a class="dropdown-item font-13" href="#">{{ __("Export") }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="user-slider">
                            @foreach($todayexercise as $todayexercises)
                            <div class="user-slider">
                                <div class="user-slider-item">
                                    <div class="card-body text-center">
                                        <span class="action-icon badge badge-primary-inverse"><img
                                                src="{{ Avatar::create($todayexercises->user->name)->toBase64() }}"
                                                class="dashboard-imgs" alt=""></span>
                                        <h5>{{ $todayexercises->user->name }}</h5>
                                        <p>{{ $todayexercises->user->email }}</p>
                                        <p><span
                                                class="badge badge-primary-inverse">{{ $todayexercises->exercise?$todayexercises->exercise->exercise_package:''}}</span>
                                        </p>
                                        <div class="button-list mt-4">
                                            <button type="button" class="btn btn-round btn-secondary-rgba"><i
                                                    class="feather icon-phone"></i></button>
                                            <button type="button" class="btn btn-round btn-secondary-rgba"><i
                                                    class="feather icon-mail"></i></button>
                                        </div>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="row">
                                            <div class="col-12">
                                                <h4 class="user-phone-no border-right">{{date_format($todayexercises->created_at,'d-m-Y')}}</h4>
                                                <p class="user-contact-no my-2">{{ __("Exercise Created") }}</p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3 col-sm-6 d-none">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <h5 class="card-title mb-0">{{ __("Top Diet") }}</h5>
                                </div>
                                <div class="col-3">
                                    <div class="dropdown">
                                        <button class="btn btn-link p-0 font-18 float-right" type="button"
                                            id="widgetRevenue" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false"><i class="feather icon-more-horizontal-"></i></button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="widgetRevenue">
                                            <a class="dropdown-item font-13" href="#">{{ __("Refresh") }}</a>
                                            <a class="dropdown-item font-13" href="#">{{ __("Export") }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="user-slider">
                            @foreach($todaydiet as $todaydiets)
                            <div class="user-slider">
                                <div class="user-slider-item">
                                    <div class="card-body text-center">
                                        <span class="action-icon badge badge-primary-inverse"><img
                                                src="{{ Avatar::create($todaydiets->user->name)->toBase64() }}"
                                                class="dashboard-imgs" alt=""></span>
                                        <h5>{{ $todaydiets->user->name }}</h5>
                                        <p>{{ $todaydiets->user->email }}</p>
                                        <p><span class="badge badge-primary-inverse">{{ $todaydiets->status}}</span></p>
                                        <div class="button-list mt-4">
                                            <button type="button" class="btn btn-round btn-secondary-rgba"><i
                                                    class="feather icon-phone"></i></button>
                                            <button type="button" class="btn btn-round btn-secondary-rgba"><i
                                                    class="feather icon-mail"></i></button>
                                        </div>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="row">
                                            <div class="col-12">
                                                <h4 class="user-phone-no border-right">{{date_format($todaydiets->created_at,'d-m-Y')}}</h4>
                                                <p class="user-contact-no my-2">{{ __("Diet Created") }}</p>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h5 class="card-title">{{ __("Users") }}</h5>
                        </div>
                        <div class="card-body">
                            <div id="apex-column-chart"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h5 class="card-title">{{ __("Payment Report") }}</h5>
                        </div>
                        <div class="card-body">
                            <div id="apex-line-chart"></div>
                        </div>
                    </div>
                </div>
                  <div class="col-lg-6">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h5 class="card-title">{{ __("User Distribution") }}</h5>
                        </div>
                        <div class="card-body">
                            <div id="apex-circle-chart-custom-angel-chart"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 mb-5">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <h5 class="card-title mb-0">{{ __("Latest Payment") }}</h5>
                                </div>
                                <div class="col-3">
                                    <div class="dropdown">
                                        <button class="btn btn-link p-0 font-18 float-right" type="button"
                                            id="upcomingTask" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false"><i class="feather icon-more-horizontal-"></i></button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="upcomingTask">
                                            <a class="dropdown-item font-13" href="#">{{ __("Refresh") }}</a>
                                            <a class="dropdown-item font-13" href="#">{{ __("Export") }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <tr>
                                        <th>{{ __("Payment Id") }}</th>
                                        <th>{{ __("Name") }}</th>
                                        <th>{{ __("Email") }}</th>
                                        <th>{{ __("Method") }}</th>
                                        <th>{{ __("Amount") }}</th>
                                    </tr>
                                    <tbody>
                                        @foreach($paymentlist as $paymentlist)
                                        <tr>
                                            <td>{{ $paymentlist->payment_id }}</td>
                                            <td>{{ $paymentlist->name }}</td>
                                            <td>{{ $paymentlist->email }}</td>
                                            <td>{{ $paymentlist->payment_method }}</td>
                                            <td>{{ $paymentlist->amount }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endcan
    @can('dashboard.users')
    <div class="row">
        <div class="col-lg-6 col-xl-3 col-sm-6">
            <div class="card m-b-30  shadow-sm">

                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-7">
                            <h2>{{$refer}}</h2>
                            <p>{{ __("Total referal user") }}</p>
                        </div>
                        <div class="col-5 text-right">
                            <a href="{{ route('users.index') }}"><i
                                    class="text-success feather icon-user-check icondashboard"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-lg-6 col-xl-3 col-sm-6">
            <div class="card m-b-30 shadow-sm">

                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-7">
                            <h2>{{$packageplan}}</h2>
                            <p>{{ __("Purchased Plan") }}</p>
                        </div>
                        <div class="col-5 text-right">
                            <a href="{{ route('users.index') }}"><i
                                    class="text-info feather icon-shopping-bag icondashboard"></i></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-12 mb-5">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">{{ __("Referal Report") }}</h5>
                </div>
                <div class="card-body">
                    <div id="apex-area-chart"></div>
                </div>
            </div>
        </div>
    </div>
    @endcan
    @can('dashboard.trainer')
    <div class="row">
        <div class="col-lg-6 col-xl-3 col-sm-6">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h2>{{$trainers}}</h2>
                            <p class="font-14 mb-0">{{ __("User") }}</p>
                        </div>
                        <div class="col-6 text-right">
                            <div><a href="{{ route('users.index') }}"><i
                                        class="feather icon-user-check icondashboard"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endcan
    @can('dashboard.other')
    <div class="row">
        <div class="col-md-12">
            <div class="card-body">
                <div class="card bg-primary-rgba m-b-30">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h5 class="card-title text-primary mb-1">{{$day}}, {{ Auth::user()->name }}</h5>
                                <p class="mb-0 text-primary font-14">{{ $quote   }}</p>
                            </div>
                            <div class="col-4 text-right">
                                <img src="assets/images/general/sun.svg" class="img-fluid sun-img" alt="sun">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endcan
    @endsection
    <!-- End Contentbar -->
    @section('script')
    <script>
        var user = @json($usercard);
        var blog = @json($blogcard);
        var userscount = @json($userscount);
        var admincharts = @json($admincharts);
        var purchased = @json($purchased);
        var purchasecard = @json($purchasecard);
        var faqcard = @json($faqcard);
        var quotationcard = @json($quotationcard);
        var referalusercard = @json($referalusercard);
        var appointmentcard = @json($appointmentcard);
        var enquirycard = @json($enquirycard);
        var referallist = @json($referallist);
    </script>
    @endsection