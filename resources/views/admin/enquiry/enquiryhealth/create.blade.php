@extends('layouts.master')
@section('title',__('Add Health Issue'))
@section('breadcum')
	<div class="breadcrumbbar breadcrumbbar-one">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-5">
                <h4 class="page-title">{{ __("Health Enquiry") }}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">{{ __('Dashboard') }}</a></li>
                        <li class="breadcrumb-item"><a href="">{{ __('Admin') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                        	{{ __('Add Health Issue') }}
                        </li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-7">
                <div class="top-btn-block text-right">
                    <a href="{{route('enquiryhealth.index')}}" class="btn btn-primary-rgba mr-2"><i class="feather icon-arrow-left mr-2"></i>{{ __("Back") }}</a>
                </div>
            </div>  
        </div>          
    </div>
@endsection
@section('maincontent')
<!-- Start Form -->
<form autocomplete="off" class="form-light" action="{{route('enquiryhealth.store')}}" method="POST">
    {{ csrf_field() }}
     <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">{{ __('Health Details:') }}</h1>
                </div>
                <br>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="text-dark">{{ __("Health Isuue:") }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('issue') is-invalid @enderror"
                                    placeholder="{{ __("Your Health issue") }}" name="issue" required="">
                                @error('issue')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> {{ __("Enter your health issue:For eg: BP,Sugar") }}</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                                <div class="text-dark"
                                    class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }} switch-main-block">
                                    <div class="custom-switch">
                                        {!! Form::checkbox('is_active', 1,1,
                                        ['id' => 'switch1', 'class' =>
                                        'custom-control-input'])
                                        !!}
                                        <label class="custom-control-label" for="switch1"><span>{{ __("Status") }}</span></label>
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
                            {{ __("Create") }}</button>
                    </div>
                </div>
                <div class="clear-both"></div>
             </div>
        </div>
    </div>
    </div>
</form>
<!-- End Form -->
@endsection
