@extends('layouts.master')
@section('title',__(' Key'))
@section('maincontent')
<!-- Start Breadcrumbbar -->                    
@component('components.breadcumb',['secondaryactive' => 'active'])
@slot('heading')
{{ __('One Signal') }}
@endslot
@slot('menu1')
{{ __('One Signal') }}
@endslot
@endcomponent
<!-- End Breadcrumbbar -->      
<!-- Start Card -->
<div class="col-lg-12">
    <div class="card m-b-30">
        <div class="col-md-12">
            <div class="card-body">
                <div class="box-header">
                    <div class="col-6">
                        <h5 class="card-title mb-0">{{ __("One Signal") }}</h5>
                    </div>
                    <a title="Get one signal keys" href="https://onesignal.com/" class="pull-right" target="__blank">
                        <i class="fa fa-key"></i> {{ __("Get your keys from here") }}
                    </a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('admin.onesignal.keys') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="ONESIGNAL_APP_ID">{{ __("ONESIGNAL APP ID: ") }}<span
                                            class="text-danger">*</span></label>
                                    <input type="text" value="{{ env('ONESIGNAL_APP_ID') }}" name="ONESIGNAL_APP_ID"
                                        placeholder="{{ __("Enter ONESIGNAL APP ID " ) }}"id="ONESIGNAL_APP_ID" type=""
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="ONESIGNAL_REST_API_KEY">{{ __(" ONESIGNAL REST API KEY: ") }}<span
                                            class="text-danger">*</span></label>
                                    <input type="text" value="{{ env('ONESIGNAL_REST_API_KEY') }}"
                                        name="ONESIGNAL_REST_API_KEY" placeholder="{{ __("Enter ONESIGNAL REST API KEY ") }}"
                                        id="ONESIGNAL_REST_API_KEY" type="" class="form-control">
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
            </div>
        </div>
    </div>
    <!-- End Card -->
    @endsection
