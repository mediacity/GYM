@extends('layouts.master')
@section('title',__('Edit Products :eid -',['eid' => $supplement->id]))
@section('maincontent')
<!-- Start Breadcrumbbar -->
@component('components.breadcumb',['thirdactive' => 'active'])
@slot('heading')
{{ __('Home') }}
@endslot
@slot('menu1')
{{ __('Admin') }}
@endslot
@slot('menu2')
{{ __(' Edit Products') }}
@endslot
@slot('button')
<div class="col-md-12 col-lg-6 text-right">
    <div class="top-btn-block">
        <a href="{{route('supplement.index')}}" class="btn btn-primary-rgba mr-2"><i
            class="feather icon-arrow-left mr-2"></i>{{ __("Back") }}</a>
    </div>
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
                        <h5 class="card-title mb-0">{{ __("Edit Products") }}</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="admin-form">
                            {!! Form::model($supplement, ['method' => 'PATCH', 'route' => ['supplement.update',
                            $supplement->id], 'files' => true , 'class' => 'form form-light' ,'novalidate']) !!}
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                {!! Form::label('name', 'Name') !!}<span class="text-danger">*</span></label>
                                {!! Form::text('name', null, ['class' => 'form-control', 'required','placeholder' =>'Please Enter Products Name']) !!}
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> {{ __("Enter Products Name : Protien Drink... ") }}</small>
                            </div>
                            <div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
                                {!! Form::label('link', 'Products Link',['class'=>'required']) !!}<span
                                    class="text-danger">*</span></label>
                                {!! Form::text('link', null, ['class' => 'form-control','required' , 'pattern' =>
                                "https?://.+"]) !!}
                                <small class="text-danger">{{ $errors->first('link') }}</small>
                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> {{ __("Enter External Link Also") }}</small>
                            </div>
                            <div class="form-group{{ $errors->has('detail') ? ' has-error' : '' }}">
                                {!! Form::label('detail', 'Description',['class'=>'required']) !!}<span
                                    class="text-danger">*</span></label>
                                {!! Form::textarea('detail', null, ['id' => 'summernote','class' => 'form-control'
                                ,'required','placeholder' => 'Please Enter Products Detail']) !!}
                                <small class="text-danger">{{ $errors->first('detail') }}</small>
                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i>{{ __(" Enter Detail About Products") }}</small>
                            </div>
                            <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                {!! Form::label('price', 'Products price',['class'=>'required']) !!} <span
                                    class="text-danger">*</span></label>
                                {!! Form::number('price', null, ['class' => 'form-control', 'required','placeholder' =>
                                'Please Enter Products price']) !!}
                                <small class="text-danger">{{ $errors->first('price') }}</small>
                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i>{{ __("Enter  Package price: 2400 ,2000...") }}</small>
                            </div>
                            <div class="form-group{{ $errors->has('offerprice') ? ' has-error' : '' }}">
                                {!! Form::label('offerprice', 'Offerprice') !!}
                                {!! Form::number('offerprice', null, ['class' => 'form-control', 'placeholder' =>
                                'Please Enter Package offerprice']) !!}
                                <small class="text-danger">{{ $errors->first('offerprice') }}</small>
                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> {{ __("Enter a Package Offerprice: 1800 ,2000...") }}}</small>

                            </div>
                            <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }} input-file-block">
                                {!! Form::label('image', 'Image',['class'=>'text-dark']) !!}<br>
                                {!! Form::file('image', ['class' => 'input-file', 'id'=>'image']) !!}
                                 <small class="text-danger">{{ $errors->first('image') }}</small>
                            </div>
                            <div
                                class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }} switch-main-block">
                                <div class="custom-switch">
                                    {!! Form::checkbox('is_active', 1,$supplement->is_active==1 ? 1 : 0, ['id' =>
                                    'switch1', 'class' => 'custom-control-input']) !!}
                                    <label class="custom-control-label" for="switch1">{{ __("Is Actives") }}</label>
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