@extends('layouts.master')
@section('title',__('Add Exercises'))
@section('breadcum')
<div class="breadcrumbbar breadcrumbbar-one">
    <div class="row align-items-center">
        <div class="col-lg-4 col-md-8">
            <h4 class="page-title">{{ __("Exercise Name") }}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Dashboard') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ __('Add Exercise Name') }}
                    </li>
                </ol>
            </div>
        </div>
        @if(auth()->user()->can('users.add'))
        <div class="col-lg-8 col-md-4">
            <div class="top-btn-block  text-right">
                <a href="{{route('exercisename.index')}}" class="btn btn-primary-rgba mr-2"><i class="feather icon-arrow-left mr-2"></i>{{ __("Back") }}</a>
            </div>
        </div>
        @endif
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
                        <h5 class="card-title mb-0">{{ __("Add Exercise") }}</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="admin-form">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            {!! Form::open(['method' => 'POST', 'route' => 'exercisename.store','files' => true ,
                            'class' => 'form-light form' ,'novalidate']) !!}
                            <div class="form-group{{ $errors->has('Exercisename') ? ' has-error' : '' }}">
                                {!! Form::label('exercisename', 'Exercisename',['class'=>'required']) !!}<span
                                    class="text-danger">*</span></label>

                                {!! Form::text('exercisename', null, ['class' => 'form-control',
                                'required','placeholder' =>
                                'Please Enter Exercisename']) !!}
                                <small class="text-danger">{{ $errors->first('exercisename') }}</small>
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> {{ __("Enter Exercise name eg: push-up,pull-up") }}</small>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group{{ $errors->has('body_part') ? ' has-error' : '' }}">
                                {!! Form::label('body_part', 'Bodypart',['class'=>'required']) !!}<span
                                    class="text-danger">*</span></label>

                                {!! Form::text('body_part', null, ['class' => 'form-control', 'required','placeholder' =>'Please Enter Bodypart']) !!}
                                <small class="text-danger">{{ $errors->first('body_part') }}</small>
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>{{ __(" Enter Bodypart for which exercise is assigned eg: Arm , hips..") }}</small>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
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
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> {{ __("Select the Exercise Type : Traditional Pushups, Clap Pushups ") }}</small>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                {!! Form::label('detail', 'Description',['class'=>'required']) !!}<span
                                    class="text-danger">*</span></label>

                                {!! Form::textarea('detail', null, ['id' => 'summernote','class' => 'form-control'
                                ,'required','placeholder' => 'Please Enter Exercise Detail']) !!}
                                <small class="text-danger">{{ $errors->first('description') }}</small>
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> {{ __("Enter Exercise Description ") }}</small>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                           <div class="form-group">
                                <div class="text-dark form-group{{ $errors->has('is_active') ? 'has-error' : '' }} switch-main-block">
                                    <div class="custom-switch">
                                        {!! Form::checkbox('is_active', 1,1, ['id' => 'switch1', 'class' =>
                                        'custom-control-input'])
                                        !!}
                                        <label class="custom-control-label" for="switch1"><span>{{ __("Status") }}</<span></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i> {{ __("Reset") }}</button>
                                <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                                    {{ __("Create") }}</button>
                            </div>
                        </div>
                        <div class="clear-both"></div>
                        {!! Form::close() !!}
                    </div>
                 </div>
            </div>
        </div>
    </div>
</div>
        <!-- End Row -->
        @endsection
        