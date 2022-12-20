@extends('layouts.master')
@section('title',__('Site Settings'))
<!-- Start Breadcrumbbar -->                    
@section('breadcum')
	<div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">{{ __("Site Settings") }}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">{{ __('Dashboard') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                        	{{ __('Site Settings') }}
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
	<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{ __('Site Settings') }}</h5>
                </div> 

                <div class="card-body">
                    <form class="form" action="{{ route('site.settings.update') }}" method="POST" novalidate enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label class="text-dark">{{ __('Site Title:') }}</label>
                                    <input name="site_title" autofocus="" type="text" class="form-control" placeholder="{{ __("enter your project/site title") }}" required="" value="{{ $setting ? $setting->site_title : "" }}">
                                    <div class="invalid-feedback">
                                        {{ __('Please enter site title !') }}.
                                    </div>-
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label class="text-dark">{{ __('Copyright Text:') }}</label>
                                    <input name="site_copyright" autofocus="" type="text" class="form-control" placeholder="{{ __("enter your copyright text" ) }}value="{{ $setting ? $setting->site_copyright : "" }}">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label class="text-dark">{{ __('Support Email:') }}</label>
                                    <input name="support_email" autofocus="" type="email" class="form-control" placeholder="{{ __("enter your email") }}" required="" value="{{ $setting ? $setting->support_email : "" }}">
                                    <div class="invalid-feedback">
                                        {{ __('Please Enter support email !') }}.
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">

                                <div class="form-group">
                                    <label class="text-dark">{{ __('Site Logo:') }}</label>
                                    <input type="file" class="form-control @error('site_logo') is-invalid @enderror" name="site_logo">
                                    @error('site_logo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label class="text-dark">{{ __('Site Favicon:') }}</label>
                                    <input type="file" class="form-control @error('site_favicon') is-invalid @enderror" name="site_favicon">
                                    @error('site_favicon')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label class="text-dark">{{ __('Login Side Image:') }}</label>
                                    <input type="file" class="form-control" name="login_side_image">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label class="text-dark">{{ __('Default Currency:') }}</label>
                                    <input type="text" class="form-control"  name="default_currency" value="{{ $setting ? $setting->default_currency : "" }}">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label class="text-dark">{{ __('Login Side Description:') }}</label>
                                    <textarea name="login_description" cols="30" rows="1" type="text" class="form-control" placeholder="{{ __("enter your description") }}">{{ $setting ? $setting->login_description : "" }}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label class="text-dark">{{ __('Site Keyword:') }}</label>
                                    <input type="text" id="tagsinput-typehead" class="form-control" data-role="tagsinput" name="site_keyword" value="{{ $setting ? $setting->site_keyword : "" }}">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-6">
                                <div class="form-group">
                                    <label class="text-dark">{{ __('Site Description:') }}</label>
                                    <textarea name="site_description" cols="30" rows="5" type="text" class="form-control" placeholder="{{ __("enter your project/site description") }}" name="site_description">{{ $setting ? $setting->site_description : "" }}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group ">
                                    <div class="custom-switch settings-switch">
                                        <div class="row">
                                            <div class="col-lg-6 col-10">
                                                <label for="exampleInputDetails">{{ __('Inspect Element Disabled') }} :</label><br>   
                                            </div>
                                            <div class="col-lg-6 col-2">
                                                <input type="checkbox" name="inspect_element" {{ $setting->inspect_element==1 ? 'checked' : '' }} id="switch1" for="switch1" class="custom-control-input">
                                                <label class="custom-control-label" for="switch1"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group ">
                                    <div class="custom-switch settings-switch">
                                        <div class="row">
                                            <div class="col-lg-6 col-10">
                                                <label for="exampleInputDetails">{{ __('Right Click Disabled') }} :</label><br> 
                                            </div>  
                                            <div class="col-lg-6 col-2">
                                                <input type="checkbox" name="right_click" {{ $setting->right_click==1 ? 'checked' : '' }} id="switch2" for="switch2" class="custom-control-input">
                                                <label class="custom-control-label" for="switch2"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <button type="submit" class="btn btn-primary-rgba"><i class="feather icon-save mr-2"></i> {{ __('Save') }}</button>
                        </div>
                     </form>
                </div> 
            </div>
        </div>
    </div>
    <br>
@endsection
<!-- End Contentbar -->

  