@extends('layouts.master')
@section('title',__('Add Diet Session'))
@section('maincontent')
<!-- Start Breadcrumbbar -->
@component('components.breadcumb',['thirdactive' => 'active'])
@slot('heading')
{{ __('Diet Session') }}
@endslot
@slot('menu1')
{{ __('Admin') }}
@endslot
@slot('menu2')
{{ __('Add diet session') }}
@endslot
@slot('button')
<div class="col-md-12 col-lg-6 text-right">
    <div class="top-btn-block">
        <a href="{{route('dietid.index')}}" class="btn btn-primary-rgba mr-2"><i
            class="feather icon-arrow-left mr-2"></i>{{ __("Back") }}</a>
    </div>
</div>
@endslot
@endcomponent
<!-- End Breadcrumbbar -->
<form class="form-light form" action="{{route('dietid.store')}}" novalidate method="POST">
    {{ (csrf_field()) }}
    <!--Form without header-->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">{{ __('Add a session for Diet:') }}</h1>
                </div>
                <br>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="text-dark">{{ __("Diet Session: ") }}<span class="text-danger">*</span></label>
                                <input value="{{ old('session_id') }}" autofocus="" type="text"
                                    class="form-control @error('session_id') is-invalid @enderror"
                                    placeholder="{{ __('Enter Diet Session') }}" name="session_id" required="">

                                @error('session_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> {{ __("Enter the session for diet eg: Morning, Evening")}}</small>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Is Active-->
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div
                                    class="text-dark form-group{{ $errors->has('is_active') ? 'has-error' : '' }} switch-main-block">
                                    <div class="custom-switch">
                                        {!! Form::checkbox('is_active', 1,1, ['id' => 'switch1', 'class' =>'custom-control-input'])
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
                            {{ __("Create") }}</button>
                    </div>
                </div>
                <div class="clear-both"></div>
</form>
</div>
<!--Form -->
@endsection
