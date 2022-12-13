@section('title',__('Add Pages '))
@section('maincontent')
<!-- Start Breadcrumbbar -->
@component('components.breadcumb',['thirdactive' => 'active'])
@slot('heading')
{{ __('Page') }}
@endslot
@slot('menu1')
{{ __('Admin') }}
@endslot
@slot('menu2')
{{ __('Create') }}
@endslot
@slot('button')@extends('layouts.master')
<div class="col-md-6 col-lg-6">
    <a href="{{route('pages.index')}}" class="float-right btn btn-primary-rgba mr-2"><i
            class="feather icon-arrow-left mr-2"></i>{{ __("Back") }}</a>
</div>
@endslot
@endcomponent
<!-- End Breadcrumbbar -->
<!-- Start Row -->
<div class="row">
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-12">
                        <h5 class="card-title mb-0">{{ __("Add Pages") }}</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="admin-form">
                            {!! Form::open(['method' => 'POST', 'route' => 'pages.store','files' => true , 'class' =>
                            'form form-light' ,'novalidate']) !!}
                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                {!! Form::label('title', 'Page Title',['class'=>'required']) !!} <span
                                    class="text-danger">*</span>
                                {!! Form::text('title', null, ['class' => 'form-control', 'required','placeholder' =>
                                'Please Enter Page Title']) !!}
                                <small class="text-danger">{{ $errors->first('title') }}</small>
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>
                                  {{ __("  Enter page Title : Return Policy, Terms and Condition..") }}</small>
                            </div>
                            <div class="form-group{{ $errors->has('aboutus') ? ' has-error' : '' }}">
                                {!! Form::label('aboutus', 'Page Aboutus',['class'=>'required']) !!} <span
                                    class="text-danger">*</span>
                                {!! Form::text('aboutus', null, ['class' => 'form-control', 'required','placeholder' =>
                                'Please Enter Page Aboutus']) !!}
                                <small class="text-danger">{{ $errors->first('aboutus') }}</small>
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>
                                    {{ __("Enter page Aboutus : XYZ...") }}</small>
                            </div>
                            <div class="form-group{{ $errors->has('detail') ? ' has-error' : '' }}">
                                {!! Form::label('detail', 'Description',['class'=>'required']) !!} <span
                                    class="text-danger">*</span>
                                {!! Form::textarea('detail', null, ['id' => 'summernote','class' => 'form-control'
                                ,'required' ,'placeholder' => ' Please Enter Page Title']) !!}
                                <small class="text-danger">{{ $errors->first('detail') }}</small>
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>
                                   {{ __(" Enter Details according to Title") }}</small>
                            </div>
                            <div
                                class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }} switch-main-block">
                                <div class="custom-switch">
                                    {!! Form::checkbox('is_active', 1,1, ['id' => 'switch1', 'class' =>
                                    'custom-control-input']) !!}
                                    <label class="custom-control-label" for="switch1">{{ __("Is Active") }}</label>
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