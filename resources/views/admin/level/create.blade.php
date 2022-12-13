@extends('layouts.master')
@section('title',__('Add Level'))
@section('maincontent')
<!-- Start Breadcrumbbar -->                    
@component('components.breadcumb',['thirdactive' => 'active'])
@slot('heading')
{{ __('Level') }}
@endslot
@slot('menu1')
{{ __('Admin') }}
@endslot
@slot('menu2')
{{ __('Add Level') }}
@endslot
@slot('button')
<div class="col-md-6 col-lg-6">
    <a href="{{route('level.index')}}" class="float-right btn btn-primary-rgba mr-2"><i
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
                        <h5 class="card-title mb-0">{{ __("Add Level") }}</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::open(['method' => 'POST', 'route' => 'level.store','files' => true , 'class' =>
                        'form-light form' , 'novalidate']) !!}
                        <div class="admin-form">
                            {{ $errors->has('Level') ? ' has-error' : '' }}
                            {!! Form::label('level', 'Level',['class'=>'required']) !!}<span
                                class="text-danger">*</span>
                            {!! Form::text('level', null, ['class' => 'form-control', 'required','placeholder' =>
                            'Please Enter Level']) !!}
                            <small class="text-danger">{{ $errors->first('level') }}</small>
                            <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i>{{ __(" Enter Level eg: Intermediate,Beginner") }}</small>
                        </div>
                        <br>
                        <div class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }} switch-main-block">
                            <div class="custom-switch">
                                {!! Form::checkbox('is_active', 1,1, ['id' => 'switch1', 'class'
                                =>'custom-control-input']) !!}
                                <label class="custom-control-label" for="switch1">{{ __("Status") }}</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i> {{ __("Reset") }}</button>
                            <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                                {{ _("Create") }}}</button>
                        </div>
                        <div class="clear-both"></div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <!-- End Row -->                    
        @endsection