@extends('layouts.master')
@section('title',__('Edit Products :eid -',['eid' => $supplement->id]))
@section('breadcum')
<div class="breadcrumbbar breadcrumbbar-one">
    <div class="row align-items-center">
        <div class="col-lg-4 col-md-8">
            <h4 class="page-title">{{ __("Products") }}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Dashboard') }}</a></li>
                    <li class="breadcrumb-item"><a href="">{{ __('Admin') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ __('Edit Products') }}
                    </li>
                </ol>
            </div>
        </div>
        @if(auth()->user()->can('users.add'))
        <div class="col-lg-8 col-md-4">
            <div class="top-btn-block text-right">
                <a href="{{route('supplement.index')}}" class="btn btn-primary-rgba mr-2"><i
                class="feather icon-arrow-left mr-2"></i>{{ __("Back") }}</a>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
@section('maincontent')
<!-- Start row -->
<div class="row">
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-6">
                        <h5 class="card-title mb-0">{{ __("Edit Products") }}</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="admin-form">
                    {!! Form::model($supplement, ['method' => 'PATCH', 'route' => ['supplement.update',
                    $supplement->id], 'files' => true , 'class' => 'form form-light' ,'novalidate']) !!}
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                {!! Form::label('name', 'Name') !!}<span class="text-danger">*</span></label>
                                {!! Form::text('name', null, ['class' => 'form-control', 'required','placeholder' =>'Please Enter Products Name']) !!}
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> {{ __("Enter Products Name : Protien Drink... ") }}</small>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
                                {!! Form::label('link', 'Products Link',['class'=>'required']) !!}<span
                                    class="text-danger">*</span></label>
                                {!! Form::text('link', null, ['class' => 'form-control','required' , 'pattern' =>
                                "https?://.+"]) !!}
                                <small class="text-danger">{{ $errors->first('link') }}</small>
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> {{ __("Enter External Link Also") }}</small>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group{{ $errors->has('detail') ? ' has-error' : '' }}">
                                {!! Form::label('detail', 'Description',['class'=>'required']) !!}<span
                                    class="text-danger">*</span></label>
                                {!! Form::textarea('detail', null, ['id' => 'summernote','class' => 'form-control'
                                ,'required','placeholder' => 'Please Enter Products Detail']) !!}
                                <small class="text-danger">{{ $errors->first('detail') }}</small>
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>{{ __(" Enter Detail About Products") }}</small>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                {!! Form::label('price', 'Products price',['class'=>'required']) !!} <span
                                    class="text-danger">*</span></label>
                                {!! Form::number('price', null, ['class' => 'form-control', 'required','placeholder' =>
                                'Please Enter Products price']) !!}
                                <small class="text-danger">{{ $errors->first('price') }}</small>
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>{{ __("Enter  Package price: 2400 ,2000...") }}</small>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group{{ $errors->has('offerprice') ? ' has-error' : '' }}">
                                {!! Form::label('offerprice', 'Offerprice') !!}
                                {!! Form::number('offerprice', null, ['class' => 'form-control', 'placeholder' =>
                                'Please Enter Package offerprice']) !!}
                                <small class="text-danger">{{ $errors->first('offerprice') }}</small>
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> {{ __("Enter a Package Offerprice: 1800 ,2000...") }}}</small>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }} input-file-block">
                                {!! Form::label('image', 'Image',['class'=>'text-dark']) !!}<br>
                                {!! Form::file('image', ['class' => 'input-file', 'id'=>'image']) !!}
                                 <small class="text-danger">{{ $errors->first('image') }}</small>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }} switch-main-block">
                                <div class="custom-switch">
                                    {!! Form::checkbox('is_active', 1,$supplement->is_active==1 ? 1 : 0, ['id' =>
                                    'switch1', 'class' => 'custom-control-input']) !!}
                                    <label class="custom-control-label" for="switch1"><span>{{ __("Status") }}</span></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i> {{ __("Reset") }}</button>
                                <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                                    {{ __("Update") }}</button>
                            </div>
                        </div>
                    </div>
                    <div class="clear-both"></div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End row -->
@endsection