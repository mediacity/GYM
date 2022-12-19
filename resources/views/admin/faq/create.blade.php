@extends('layouts.master')
@section('title',__('Add Faq'))
@section('breadcum')
	<div class="breadcrumbbar breadcrumbbar-one">
        <div class="row align-items-center">
            <div class="col-md-4 col-lg-5">
                <h4 class="page-title">{{ __("Faq") }}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">{{ __('Dashboard') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                        	{{ __('Add Faq') }}
                        </li>
                    </ol>
                </div>
            </div>
            <div class="col-md-8 col-lg-7">
                <div class="top-btn-block text-right">
                    <a href="{{route('faq.index')}}" class="btn btn-primary-rgba mr-2"><i
                    class="feather icon-arrow-left mr-2"></i>{{ __("Back") }}</a>
                </div>
            </div>  
        </div>          
    </div>
@endsection
@section('maincontent')
<!-- Start Row -->
<div class="row">
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-12">
                        <h5 class="card-title mb-0">{{ __("Add Faq") }}</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="admin-form">
                            {!! Form::open(['method' => 'POST', 'route' => 'faq.store','files' => true , 'class' =>
                            'form form-light' ,'novalidate']) !!}
                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                {!! Form::label('title', 'Question',['class'=>'required']) !!}<span
                                    class="text-danger">*</span>
                                {!! Form::text('title', null, ['class' => 'form-control', 'required','placeholder' =>
                                'Please Enter Question']) !!}
                                <small class="text-danger">{{ $errors->first('title') }}</small>
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>
                                    {{ __("Add questions related to Gym") }}</small>
                            </div>
                            <div class="form-group{{ $errors->has('details') ? ' has-error' : '' }}">
                                {!! Form::label('details', 'Answer',['class'=>'required']) !!}<span
                                    class="text-danger">*</span>
                                {!! Form::textarea('details', null, ['id' => 'summernote','class' => 'form-control'
                                ,'required','placeholder' => 'Please Enter Answer']) !!}
                                <small class="text-danger">{{ $errors->first('details') }}</small>
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>
                                    {{ __("Add Answer....") }}</small>
                            </div>
                            <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }} switch-main-block">
                                <div class="custom-switch">
                                    {!! Form::checkbox('status', 1,1, ['id' => 'switch1', 'class' =>
                                    'custom-control-input']) !!}
                                    <label class="custom-control-label" for="switch1"><span>{{ __("Status") }}</span></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i> {{ __("Reset") }}</button>
                                <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                                    {{ __("Create") }}</button>
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
<!-- End Row -->
@endsection