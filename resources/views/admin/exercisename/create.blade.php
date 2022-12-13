@extends('layouts.master')
@section('title',__('Add Exercises'))
@section('maincontent')
<!-- Start Breadcrumbbar -->                    
@component('components.breadcumb',['thirdactive' => 'active'])
@slot('heading')
{{ __('Exercise Name') }}
@endslot
@slot('menu1')
{{ __('Admin') }}
@endslot
@slot('menu2')
{{ __('Add Exercise Name') }}
@endslot
@slot('button')
<div class="col-md-12 col-lg-6 text-right">
    <div class="top-btn-block">
        <a href="{{route('exercisename.index')}}" class="btn btn-primary-rgba mr-2"><i class="feather icon-arrow-left mr-2"></i>{{ __("Back") }}</a>
    </div>
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
                        <h5 class="card-title mb-0">{{ __("Add Exercise") }}</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="admin-form">
                            {!! Form::open(['method' => 'POST', 'route' => 'exercisename.store','files' => true ,
                            'class' => 'form-light form' ,'novalidate']) !!}
                            <div class="form-group{{ $errors->has('Exercisename') ? ' has-error' : '' }}">
                                {!! Form::label('exercisename', 'Exercisename',['class'=>'required']) !!}<span
                                    class="text-danger">*</span></label>

                                {!! Form::text('exercisename', null, ['class' => 'form-control',
                                'required','placeholder' =>
                                'Please Enter Exercisename']) !!}
                                <small class="text-danger">{{ $errors->first('exercisename') }}</small>
                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> {{ __("Enter Exercise name eg: push-up,pull-up") }}</small>
                            </div>
                            <div class="form-group{{ $errors->has('body_part') ? ' has-error' : '' }}">
                                {!! Form::label('body_part', 'Bodypart',['class'=>'required']) !!}<span
                                    class="text-danger">*</span></label>

                                {!! Form::text('body_part', null, ['class' => 'form-control', 'required','placeholder' =>'Please Enter Bodypart']) !!}
                                <small class="text-danger">{{ $errors->first('body_part') }}</small>
                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i>{{ __(" Enter Bodypart for which exercise is assigned eg: Arm , hips..") }}</small>
                            </div>

                            <div class="form-group">
                                <label class="text-dark">{{ __('Exercise Type: ') }}<span class="text-danger">*</span></label>
                                <select data-placeholder="{{ __("Please select exercise type") }}" name="type[]"
                                    class="select2 md-form form-control   @error('type[]') is-invalid @enderror"
                                    multiple>
                                    <option value="">{{ __("Select Exercise Type") }}</option>
                                    @if (isset($types))
                                    @foreach($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                                @error('type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> {{ __("Select the Exercise Type : Traditional Pushups, Clap Pushups ") }}</small>
                            </div>
                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                {!! Form::label('detail', 'Description',['class'=>'required']) !!}<span
                                    class="text-danger">*</span></label>

                                {!! Form::textarea('detail', null, ['id' => 'summernote','class' => 'form-control'
                                ,'required','placeholder' => 'Please Enter Exercise Detail']) !!}
                                <small class="text-danger">{{ $errors->first('description') }}</small>
                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> {{ __("Enter Exercise Description ") }}</small>
                            </div>
                           <div class="form-group">
                                            <div
                                                class="text-dark form-group{{ $errors->has('is_active') ? 'has-error' : '' }} switch-main-block">
                                                <div class="custom-switch">
                                                    {!! Form::checkbox('is_active', 1,1, ['id' => 'switch1', 'class' =>
                                                    'custom-control-input'])
                                                    !!}
                                                    <label class="custom-control-label" for="switch1">{{ __("Is Active") }}</label>
                                                </div>
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
        <!-- End Row -->
        @endsection
        