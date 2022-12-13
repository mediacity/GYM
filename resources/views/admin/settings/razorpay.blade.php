@extends('layouts.master')
@section('title',__('Payment Settings'))
<!-- Start Breadcrumbbar -->                    
@section('breadcum')
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">

            <h4 class="page-title">{{ __('Payment Settings') }}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ __('Payment Settings') }}
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
@section('maincontent')
<div class="contentbar">
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-5 col-xl-3">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title mb-0"><i class="feather icon-credit-card"></i>{{ __(" Payment Method") }}</h5>
                </div>
                <div class="card-body">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link mb-2 active" data-toggle="pill" href="#rpaytab" role="tab"
                            aria-selected="true">{{ __("RazorPay") }}</a>
                        <a class="nav-link mb-2" data-toggle="pill" href="#paytmtab" role="tab"
                            aria-selected="false">{{ __("Paytm") }}</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-7 col-xl-9">
            <div class="tab-content" id="v-pills-tabContent">
                <!-- Dashboard Start -->
                <div class="tab-pane fade show active payment-setting" id="rpaytab" role="tabpanel">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h5 class="card-title mb-0">{{ __("RazorPay") }}</h5>
                        </div>
                        <div class="card-body">
                            <form class="form" action="{{ route('payment.settings.save',['type' => 'razorpay']) }}"
                                method="POST" novalidate>
                                @csrf
                                <div class="form-group">
                                    <label class="text-dark">{{ __('Razorpay Key:') }}</label>
                                    <input name="RAZOR_PAY_KEY" autofocus="" type="text" class="form-control"
                                        placeholder="{{ __("Enter razorpay key") }}" required=""
                                        value="{{ env('RAZOR_PAY_KEY') ? env('RAZOR_PAY_KEY') : 'no' }}">
                                    <div class="invalid-feedback">
                                        {{ __('Please provide Razorpay api key !') }}.
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark">{{ __('Razorpay Secret Key:') }} </label>
                                    <input name="RAZOR_PAY_SECRET" autofocus="" type="text" class="form-control"
                                        placeholder="{{ __("Enter razorpay secret key") }}" value="{{ env('RAZOR_PAY_SECRET') }}">
                                </div>
                                <div class="form-group">
                                    <label class="switch"><input type="checkbox" id="togBtn" name="ENABLE_RAZOR_PAY"
                                            {{ env('ENABLE_RAZOR_PAY') == 1 ? "checked" : ""}}>
                                        <div class="slider round">
                                            <!--ADDED HTML -->
                                            <span class="on" value="1">{{ __("Active") }}</span><span class="off"
                                                value="0">{{ __("Deactive") }}</span>
                                            <!--END-->
                                        </div>
                                    </label>
                                </div>
                                <div class="card-footer razorpay-btn">
                                    <button type="submit" class="btn btn-primary-rgba"><i class="feather icon-save mr-2"></i> {{ __('Save') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade payment-setting" id="paytmtab" role="tabpanel">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h5 class="card-title mb-0">{{ __("Paytm") }}</h5>
                        </div>
                        <div class="card-body">
                            <form class="form" action="{{ route('payment.settings.save',['type' => 'paytm']) }}"
                                method="POST" novalidate>
                                @csrf
                                <div class="form-group">
                                    <label class="text-dark">{{ __('Paytm Merchant Id:') }}</label>
                                    <input name="PAYTM_MERCHANT_ID" autofocus="" type="text" class="form-control"
                                        placeholder="{{ __("Enter Paytm Id") }}" required="" value="{{ env('PAYTM_MERCHANT_ID') }}">
                                    <div class="invalid-feedback">
                                        {{ __('Please provide Paytm api key !') }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark">{{ __('Paytm Merchant Key:') }} </label>
                                    <input name="PAYTM_MERCHANT_KEY" autofocus="" type="text" class="form-control"
                                        placeholder="{{ __("Enter Paytm Merchant key") }}" value="{{ env('PAYTM_MERCHANT_KEY') }}">
                                </div>
                                <div class="form-group">
                                    <label class="text-dark">{{ __('Paytm Merchant Website:') }} </label>
                                    <input name="PAYTM_MERCHANT_WEBSITE" autofocus="" type="text" class="form-control"
                                        placeholder="{{ __("Enter Paytm Secret key") }}"
                                        value="{{ env('PAYTM_MERCHANT_WEBSITE') }}">
                                </div>
                                <div class="form-group">
                                    <label class="text-dark">{{ __('PAYTM ENVIROMENT:') }} </label><br>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioInline3" name="ENVIRONMENT"
                                            class="custom-control-input" value="local"
                                            {{ (env('ENVIRONMENT') == 'local' ? "checked" : "") }}>
                                        <label class="custom-control-label" for="customRadioInline3">{{ __("Local") }}</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioInline4" name="ENVIRONMENT"
                                            class="custom-control-input" value="production"
                                            {{ (env('ENVIRONMENT') == 'production' ? "checked" : "") }}>
                                        <label class="custom-control-label" for="customRadioInline4">{{ __("Production") }}</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="switch"><input type="checkbox" id="togBtn" name="ENABLE_PAYTM_PAY"
                                            {{ env('ENABLE_PAYTM_PAY')==1 ? "checked" : ""}}>
                                        <div class="slider round">
                                            <!--ADDED HTML -->
                                            <span class="on" value="1">{{ __("Active") }}</span><span class="off"
                                                value="0">{{ __("Deactive") }}</span>
                                            <!--END-->
                                        </div>
                                    </label>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary-rgba"><i class="feather icon-save mr-2"></i>
                                        {{ __('Save') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End col -->
            </div>
            <!-- End row -->
        </div>
        <!-- End Contentbar -->
        @endsection
