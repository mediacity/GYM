@extends('layouts.master')
@section('title',__(' Key'))
@section('breadcum')
	<div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">{{ __("One Signal") }}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">{{ __('Dashboard') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                        	{{ __('One Signal') }}
                        </li>
                    </ol>
                </div>
            </div>
          
        </div>          
    </div>
@endsection
@section('maincontent')    
<!-- Start Card -->
    <div class="card m-b-30">
        <div class="col-md-12">
            <div class="card-header">
                <div class="box-header">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <h5 class="card-title mb-0">{{ __("One Signal") }}</h5>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="one-signal-key">
                                <a title="Get one signal keys" href="https://onesignal.com/" class="" target="__blank">
                                    <i class="fa fa-key"></i> {{ __("Get your keys from here") }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.onesignal.keys') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label for="ONESIGNAL_APP_ID">{{ __("ONESIGNAL APP ID: ") }}<span
                                        class="text-danger">*</span></label>
                                <input type="text" value="{{ env('ONESIGNAL_APP_ID') }}" name="ONESIGNAL_APP_ID"
                                    placeholder="{{ __("Enter ONESIGNAL APP ID " ) }}"id="ONESIGNAL_APP_ID" type=""
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label for="ONESIGNAL_REST_API_KEY">{{ __(" ONESIGNAL REST API KEY: ") }}<span
                                        class="text-danger">*</span></label>
                                <input type="text" value="{{ env('ONESIGNAL_REST_API_KEY') }}"
                                    name="ONESIGNAL_REST_API_KEY" placeholder="{{ __("Enter ONESIGNAL REST API KEY ") }}"
                                    id="ONESIGNAL_REST_API_KEY" type="" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-md">
                            <i class="fa fa-save"></i> {{ __("Save Keys") }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- End Card -->
@endsection
