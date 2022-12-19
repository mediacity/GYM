@extends('layouts.master')
@section('title',__('Edit Language :eid -',['eid' => $language->id]))
@section('breadcum')
	<div class="breadcrumbbar breadcrumbbar-one">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">{{ __("Language") }}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">{{ __('Dashboard') }}</a></li>
                        <li class="breadcrumb-item"><a href="">{{ __('Admin') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                        	{{ __('Edit Language') }}
                        </li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="top-btn-block text-right">
                    <a href="{{route('language.index')}}" class="float-right btn btn-primary-rgba mr-2"><i
                    class="feather icon-arrow-left mr-2"></i>{{ __("Back") }}</a>
                </div>
            </div>
        </div>          
    </div>
@endsection
@section('maincontent')
<div class="row">
     <!-- row started -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <!-- Card header will display you the heading -->
            <div class="card-header">
                <h5 class="card-box">{{ __(' Edit Language') }}</h5>
            </div>

            <!-- card body started -->
            <div class="card-body">
                <!-- form start -->
                <form id="demo-form2" method="post" action="{{route('language.update',$language->id)}}"
                    data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @method('put')
                    <div class="row">
                        <!-- Name -->
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label class="text-dark" for="name">{{ __('Name') }} : <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    value="{{$language->name }}" name="name" id="sub_heading"
                                    placeholder="{{ __("Please enter language name eg:English" ) }}"required>
                            </div>
                        </div>
                        <!-- Local -->
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label class="text-dark" for="language">{{ __('Local') }} : <span
                                        class="text-danger">*</span></label>
                                <input class="form-control @error('language') is-invalid @enderror"
                                    value="{{$language->language  }}" type="text" name="language"
                                    placeholder="{{ __("Please enter language local name") }}" required>
                            </div>
                        </div>
                        <!-- SetDefault -->
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <label for="exampleInputDetails">{{ __('SetDefault') }} :</label><br>   
                                <div class="custom-switch">
                                    <input type="checkbox" name="def" id="switch1" for="switch1" class="custom-control-input">
                                    <label class="custom-control-label" for="switch1"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <button type="reset" class="btn btn-danger-rgba mr-1"><i class="fa fa-ban"></i>
                                    {{ __("Reset")}}</button>
                                <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                                    {{ __("Update")}}</button>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- form end -->
            </div>
            <!-- card body end -->
        </div><!-- col end -->
    </div>
</div>
@endsection