@extends('layouts.master')
@section('title',__('Edit Enquiry Heath Question :eid -',['eid' => $enquiryhealth->id]))
@section('maincontent')
<!-- Start Breadcrumbbar -->                    
@component('components.breadcumb',['thirdactive' => 'active'])
@slot('heading')
{{ __('Enquiry') }}
@endslot
@slot('menu1')
{{ __('Admin') }}
@endslot
@slot('menu2')
{{ __('Edit Enquiry Heath Question') }}
@endslot
@slot('button')
<div class="col-md-6 col-lg-6">
    <a href="{{route('enquiryhealth.index')}}" class="float-right btn btn-primary-rgba mr-2"><i
            class="feather icon-arrow-left mr-2"></i>{{ __("Back") }}</a>
</div>
@endslot
@endcomponent
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
<form class="form-light" action="{{route('enquiryhealth.update' , $enquiryhealth->id)}}" method="POST">
    {{ csrf_field() }}
    @method('PUT')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">{{ __('Enquiry Health Details:') }}</h1>
                </div>
                <br>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="text-dark">{{ __("Health Issue:") }} <span class="text-danger">*</span></label>
                                <input type="text" value="{{ $enquiryhealth->issue }}"
                                    class="form-control @error('issue') is-invalid @enderror"
                                    placeholder="{{ __('"Your Health issue"') }}" name="issue" required="">
                                @error('issue')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> {{ __("Enter  your health issue") }}</small>
                                  </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="text-dark"
                                            class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }} switch-main-block">
                                            <div class="custom-switch">
                                                {!! Form::checkbox('is_active', 1,$enquiryhealth->is_active==1 ? 1 : 0,
                                                ['id' => 'switch1', 'class' =>
                                                'custom-control-input'])
                                                !!}
                                                <label class="custom-control-label" for="switch1">{{ __("Is Active") }}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i> {{ __("Reset") }}</button>
                                <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                                    {{ __("Update") }}</button>
                            </div>
                        </div>
                        <div class="clear-both"></div>

                    </div>
                </div>
            </div>
        </div>
        <!-- End Contentbar -->
        @endsection
