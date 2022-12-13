@extends('layouts.master')
@section('title',__('Add TrainerPackages'))
@section('maincontent')
<!-- Start Breadcrumbbar -->                    
@component('components.breadcumb',['thirdactive' => 'active'])
@slot('heading')
{{ __('TrainerPackage') }}
@endslot
@slot('menu1')
{{ __('Admin') }}
@endslot
@slot('menu2')
{{ __('Add TrainerPackage') }}
@endslot
@slot('button')
<div class="col-md-6 col-lg-6">
    <a href="{{route('trainerpackages.index')}}" class="float-right btn btn-primary-rgba mr-2"><i
            class="feather icon-arrow-left mr-2"></i>{{ __("Back") }}</a>
   </div>
@endslot
@endcomponent
<!-- End Breadcrumbbar -->
<!-- Start row -->
<div class="row">
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-6">
                        <h5 class="card-title mb-0">{{ __("Create Trainerpackage") }}</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="admin-form">
                            {!! Form::open(['method' => 'POST', 'route' => 'trainerpackages.store','files' => true ,'class' =>
                            'form form-light' ,'novalidate']) !!}
                            <div class="form-group{{ $errors->has('trainer id') ? ' has-error' : '' }}">
                                <label class="text-dark" for="cars">{{ __("Choose a trainer:") }}<span
                                        class="text-danger">*</span></label>
                                <select data-placeholder="{{ __("Please select group") }}" class="form-control select2"
                                    name="trainer_name">
                                    <option value="">{{ __("Select one") }}</option>
                                    @foreach($trainers as $trainer)
                                    <option {{ old('trainer_name') == $trainer->id  ? "selected" : "" }}
                                        value="{{ $trainer->id }}">{{ $trainer->name}}</option>
                                    @endforeach
                                </select>
                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i>
                                  {{ __("  Select the trainer name") }}
                                </small>
                            </div>
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                {!! Form::label('name', 'Package Name',['class'=>'required']) !!}<span
                                    class="text-danger">*</span>
                                {!! Form::text('name', null, ['class' => 'form-control', 'required','placeholder' =>
                                'Please Enter Package Name']) !!}
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> {{ __("Add a Package Name For eg: Gold Bronze Card, Special Card..") }}</small>
                            </div>
                            <div class="form-group{{ $errors->has('detail') ? ' has-error' : '' }}">
                                {!! Form::label('detail', 'Description',['class'=>'required']) !!}<span
                                    class="text-danger">*</span>
                                {!! Form::textarea('detail', null, ['id' => 'summernote','class' => 'form-control'
                                ,'required','placeholder' => 'Please Enter Package Detail']) !!}
                                <small class="text-danger">{{ $errors->first('detail') }}</small>
                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> {{ __("Enter the  Package Description") }} </small>
                            </div>
                            <div class="form-group{{ $errors->has('duration') ? ' has-error' : '' }}">
                                {!! Form::label('duration', 'Package Duration',['class'=>'required']) !!}
                                <span class="text-danger">*</span>
                                {!! Form::text('duration', null, ['class' => 'form-control', 'required','placeholder' =>
                                'Please Enter Package Duration']) !!}
                                <small class="text-danger">{{ $errors->first('duration') }}</small>
                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> {{ __("Enter the  Package Duration For eg: 12 Months, 6Months") }}</small>
                            </div>
                            <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                            <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                {!! Form::label('price', 'Package price',['class'=>'required']) !!}<span
                                    class="text-danger">*</span>
                                {!! Form::number('price', null, ['class' => 'form-control', 'required','placeholder' =>
                                'Please Enter Package price']) !!}
                                <small class="text-danger">{{ $errors->first('price') }}</small>
                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> {{ __("Enter the Package price For eg: 2400 ,2000...") }}</small>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <div class="form-group{{ $errors->has('offerprice') ? ' has-error' : '' }}">
                                {!! Form::label('offerprice', 'OfferPrice') !!}
                                {!! Form::number('offerprice', null, ['class' => 'form-control', 'placeholder' =>
                                'Please Enter Package offerprice']) !!}
                                <small class="text-danger">{{ $errors->first('offerprice') }}</small>
                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> {{ __("Enter the  Package Offerprice For eg: 1800 ,2000...") }}</small>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('stripe_id') ? ' has-error' : '' }}">
                        {!! Form::label('stripe_id', 'stripe_id') !!}
                        <span class="text-danger">*</span>
                        {!! Form::number('stripe_id', null, ['class' => 'form-control', 'placeholder' =>
                        'Please Enter stripe_id']) !!}
                        <small class="text-danger">{{ $errors->first('slstripe_idug') }}</small>
                        <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> {{ __("Enter the Stripe_id") }}</small>
                    </div>
                            <div
                                class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }} switch-main-block">
                                <div class="custom-switch">
                                    {!! Form::checkbox('is_active', 1,1, ['id' => 'switch1', 'class' =>
                                    'custom-control-input']) !!}
                                    <label class="custom-control-label" for="switch1">{{ __("Is Active") }}</label>
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
            </div>
        </div>
    </div>
    <!-- End row -->
    @endsection
