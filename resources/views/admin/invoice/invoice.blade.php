@extends('layouts.master')
@section('title',__('Invoice Setting'))
<!-- Start Breadcrumbbar -->
@section('breadcum')
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">{{ __("Invoice Settings") }}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ __('Site Settings') }}
                    </li>
                </ol>
            </div>
        </div>

    </div>
</div>
@endsection
<!-- Start Breadcrumbbar -->
<!-- Start Contentbar -->
@section('maincontent')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{ __('Invoice Settings') }}</h5>
            </div>
            <div class="card-body">
                <form class="form" action="{{ route('invoice.settings.update') }}" method="POST" novalidate
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="text-dark">{{ __('Terms And Condition:') }}</label>
                        <input name="term_condition" autofocus="" type="text" class="form-control"
                            placeholder="{{ __("enter terms and condition") }}" required=""
                            value="{{ $invoice ? $invoice->term_condition : "" }}">
                        <div class="invalid-feedback">
                            {{ __('Please enter site title !') }}.
                        </div>-
                    </div>

                    <div class="form-group">
                        <label class="text-dark">{{ __('Name:') }}</label>
                        <input name="name" autofocus="" type="text" class="form-control" placeholder="{{ __("enter your name") }}"
                            value="{{ $invoice ? $invoice->name : "" }}">
                    </div>


                    <div class="form-group">
                        <label class="text-dark">{{ __('Phone:') }}</label>
                        <input name="phone" autofocus="" type="number" pattern="[0-9]{10}" class="form-control"
                            placeholder="{{ __("enter your mobileno") }}" value="{{ $invoice ? $invoice->phone : "" }}">
                    </div>


                    <div class="form-group">
                        <label>{{ __("Add Signature:") }}</label><span class="text-danger">*</span>
                        <input required="" type="file" class="form-control" name="signature" id="signature" />
                    </div>


                    <div class="form-group">
                        <label class="text-dark">{{ __(' Email:') }}</label>
                        <input name="email" autofocus="" type="email" class="form-control"
                            placeholder="{{ __("enter your email") }}" required="" value="{{ $invoice ? $invoice->email : "" }}">
                        <div class="invalid-feedback">
                            {{ __('Please Enter support email !') }}.
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary-rgba"><i class="feather icon-save mr-2"></i>
                            {{ __('Save') }}</button>
                    </div>

                </form>

            </div>
        </div>


    </div>
</div>
<br>
@endsection
<!-- End Contentbar -->
@section('scripts')
<script>
    $("#signature").on('change', function () {
        readURL1(this);
    });
</script>
@endsection