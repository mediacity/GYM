@extends('layouts.master')
@section('title',__('Add SecondLanguage'))
@section('maincontent')
@component('components.breadcumb',['thirdactive' => 'active'])
@slot('heading')
{{ __('SecondLanguage') }}
@endslot
@slot('menu1')
{{ __('Admin') }}
@endslot
@slot('menu2')
{{ __('Add SecondLanguage') }}
@endslot
@slot('button')
<div class="col-md-6 col-lg-6">
    <a href="{{route('secondlanguage.index')}}" class="float-right btn btn-primary-rgba mr-2"><i
            class="feather icon-arrow-left mr-2"></i>{{ __("Back") }}</a>
</div>
@endslot
@endcomponent
<div class="row">
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-12">
                        <h5 class="card-title mb-0">{{ __("Add SecondLanguage") }}</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::open(['method' => 'POST', 'route' => 'secondlanguage.store','files' => true , 'class'
                        =>
                        'form-light form' , 'novalidate']) !!}
                        <div class="admin-form">
                            {{ $errors->has('secondLanguage') ? ' has-error' : '' }}
                            {!! Form::label('secondlanguage', 'SecondLanguage',['class'=>'required']) !!}<span
                                class="text-danger">*</span>
                            {!! Form::text('secondlanguage', null, ['class' => 'form-control', 'required','placeholder'
                            =>
                            'Please Enter SecondLanguage']) !!}
                            <small class="text-danger">{{ $errors->first('secondLanguage') }}</small>
                            <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i>{{ __(" Enter  SecondLanguage eg: Marathi,Gujrati") }} </small>
                        </div>
                        <br>
                        <div class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }} switch-main-block">
                            <div class="custom-switch">
                                {!! Form::checkbox('is_active', 1,1, ['id' => 'switch1', 'class'
                                =>'custom-control-input']) !!}
                                <label class="custom-control-label" for="switch1">{{ __("Status") }}</label>
                            </div>
                        </div>
                        <br>
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
        @endsection
