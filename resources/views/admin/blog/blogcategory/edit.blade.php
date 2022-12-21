@extends('layouts.master')
@section('title',__('Edit Blogcategory :bid -',['bid' => $blogcategory->title]))
@section('breadcum')
	<div class="breadcrumbbar breadcrumbbar-one">
        <div class="row align-items-center">
            <div class="col-md-5 col-lg-5">
                <h4 class="page-title">{{ __("Blog Category") }}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">{{ __('Dashboard') }}</a></li>
                        <li class="breadcrumb-item"><a href="">{{ __('Admin') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                        	{{ __('Edit Blog Category') }}
                        </li>
                    </ol>
                </div>
            </div>
            <div class="col-md-7 col-lg-7">
                <div class="top-btn-block text-right">
                    <a href="{{route('blogcategory.index')}}" class="btn btn-primary-rgba mr-2"><i
                    class="feather icon-arrow-left mr-2"></i>{{ __("Back") }}</a>
                </div>
            </div>  
        </div>          
    </div>
@endsection
@section('maincontent')
<!-- Start Contentbar -->
<div class="">
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h5 class="card-title mb-0">{{ __("Add Blog Category") }}</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="admin-form">
                                {!! Form::model($blogcategory, ['method' => 'PATCH', 'route' => ['blogcategory.update',
                                $blogcategory->id], 'files' => true ,'class' => 'form form-light' , 'novalidate']) !!}
                                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                    {!! Form::label('title', 'Category Title',['class'=>'required text-dark']) !!}
                                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                                    <small class="text-danger">{{ $errors->first('title') }}</small>
                                    <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>{{ __(" Create your Blog Category title") }}</small>
                                </div>
                                <div
                                    class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }} switch-main-block">
                                    <div class="custom-switch">
                                        {!! Form::checkbox('is_active', 1,$blogcategory->is_active==1 ? 1 :0, ['id' =>
                                        'switch1', 'class' => 'custom-control-input']) !!}
                                        <label class="custom-control-label text-dark" for="switch1"><span>{{ __("Status") }}</span></label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i> {{ __("Reset") }}</button>
                                    <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                                        {{ __("Update") }}</button>
                                </div>
                                <div class="clear-both"></div>

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!-- End Contentbar -->
