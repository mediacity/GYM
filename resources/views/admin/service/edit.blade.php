@extends('layouts.master')
@section('title',__('Edit Service :eid -',['eid' => $service->name]))
@section('breadcum')
<div class="breadcrumbbar breadcrumbbar-one">
    <div class="row align-items-center">
        <div class="col-lg-4 col-md-8">
            <h4 class="page-title">{{ __("Service") }}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Dashboard') }}</a></li>
                    <li class="breadcrumb-item"><a href="">{{ __('Admin') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ __('Edit Service') }}
                    </li>
                </ol>
            </div>
        </div>
        <div class="col-lg-8 col-md-4">
            <div class="top-btn-block text-right">
                <a href="{{route('service.index')}}" class="btn btn-primary-rgba mr-2"><i
                class="feather icon-arrow-left mr-2"></i>{{ __("Back") }}</a>
            </div>
        </div>
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
                    <div class="col-12">
                        <h5 class="card-title mb-0">{{ __("Edit Service") }}</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="admin-form">
                            {!! Form::model($service, ['method' => 'PATCH', 'route' => ['service.update', $service->id],
                            'files' =>
                            true , 'class' => 'form form-light' ,'novalidate']) !!}
                            <div class="form-group {{ $errors->has('Name') ? ' has-error' : '' }}">
                                {!! Form::label('name', 'Name',['class'=>'required']) !!}<span
                                    class="text-danger">*</span></label>
                                {!! Form::text('name', null, ['class' => 'form-control', 'required','placeholder' =>
                                'Please Enter Name']) !!}
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>{{ __(" Enter service name") }}} </small>
                            </div>
                            <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                {!! Form::label('price', 'Service price',['class'=>'required']) !!}<span
                                    class="text-danger">*</span></label>
                                {!! Form::number('price', null, ['class' => 'form-control', 'required','placeholder' =>
                                'Please Enter Service price']) !!}
                                <small class="text-danger">{{ $errors->first('price') }}</small>
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>{{ __(" Enter a  Service price: 2400 ,2000...") }}</small>
                            </div>
                            <div
                                class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }} switch-main-block">
                                <div class="custom-switch">
                                    {!! Form::checkbox('is_active', 1,$service->is_active==1 ? 1 : 0, ['id' =>
                                    'switch1', 'class' => 'custom-control-input']) !!}
                                    <label class="custom-control-label" for="switch1"><span>{{ __("Status") }}</span></label>
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
<!-- End row -->
@endsection
