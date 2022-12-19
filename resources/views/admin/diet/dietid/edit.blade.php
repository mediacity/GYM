@extends('layouts.master')
@section('title',__('Edit Diet Session :eid -',['eid' => $dietid->id]))
@section('breadcum')
<div class="breadcrumbbar breadcrumbbar-one">
    <div class="row align-items-center">
        <div class="col-lg-4 col-md-8">
            <h4 class="page-title">{{ __("Diet Session") }}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Dashboard') }}</a></li>
                    <li class="breadcrumb-item"><a href="">{{ __('Admin') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ __('Edit Diet Session') }}
                    </li>
                </ol>
            </div>
        </div>
        @if(auth()->user()->can('users.add'))
        <div class="col-lg-8 col-md-4">
            <div class="top-btn-block text-right">
                <a href="{{route('dietid.index')}}" class="btn btn-primary-rgba mr-2"><i
                class="feather icon-arrow-left mr-2"></i>{{ __("Back") }}</a>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
@section('maincontent')
<!--Form without header-->
<form action="{{route('dietid.update',$dietid->id)}}" method="POST" class="form-light form" novalidate>
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                 <div class="card-header">
                    <h1 class="card-title" >{{ __('Edit your session for Diet:') }}</h1>
                </div>
                <br>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="text-dark">{{ __("Diet Session:") }} <span class="text-danger">*</span></label>
                                <input value="{{ $dietid->session_id }}" autofocus="" type="text"
                                    class="form-control @error('session_id') is-invalid @enderror"
                                    placeholder="{{ __('Enter Diet Session') }}" name="session_id" required="">
                                @error('session_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> {{ __("Enter the session for diet eg: Morning, Evening") }}</small>
                            </div>
                        </div>
                    </div>
                    <!--Is Active-->
                    <div class="text-dark"
                        class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }} switch-main-block">
                        <div class="custom-switch">
                            {!! Form::checkbox('is_active', 1,$dietid->is_active==1 ? 1 : 0,
                            ['id' => 'switch1', 'class' => 'custom-control-input']) !!}
                            <label class="custom-control-label" for="switch1"><span>{{ __("Status") }}</span></label>
                        </div>
                    </div>
                </div>
                <br>
                <div class="col-md-6">
                    <div class="form-group">
                        <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i> {{ __("Reset") }}</button>
                        <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i> {{ __("Update") }}</button>
                    </div>
                </div>
                <div class="clear-both"></div>
        </form>
</div>
<!--End-->
@endsection
