@extends('layouts.master')
@section('title',__('Edit Faq :eid -',['eid' => $faq->title]))
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
{{ __(' Edit Faq') }}
@endslot
@slot('button')
<div class="col-md-6 col-lg-6">
    <a href="{{route('faq.index')}}" class="float-right btn btn-primary-rgba mr-2"><i
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
                        <h5 class="card-title mb-0">{{ __("Edit Faq") }}</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="admin-form">
                            {!! Form::model($faq, ['method' => 'PATCH', 'route' => ['faq.update', $faq->id], 'files' =>
                            true , 'class' => 'form form-light' ,'novalidate']) !!}
                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                {!! Form::label('title', 'Question',['class'=>'required']) !!}<span
                                    class="text-danger">*</span>
                                {!! Form::text('title', null, ['class' => 'form-control', 'required','placeholder' =>
                                'Please Enter Title']) !!}
                                <small class="text-danger">{{ $errors->first('title') }}</small>
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> {{ __("Add related to Question") }}</small>
                            </div>
                            <div class="form-group{{ $errors->has('details') ? ' has-error' : '' }}">
                                {!! Form::label('details', 'Answer',['class'=>'required']) !!}<span
                                    class="text-danger">*</span>
                                {!! Form::textarea('details', null, ['id' => 'summernote','class' => 'form-control'
                                ,'required','placeholder' => 'Please Enter Detail']) !!}
                                <small class="text-danger">{{ $errors->first('details') }}</small>
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> {{ __("Add Answer....") }}</small>
                            </div>
                            <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }} switch-main-block">
                                <div class="custom-switch">
                                    {!! Form::checkbox('status', 1,$faq->status==1 ? 1 : 0, ['id' => 'switch1', 'class'
                                    => 'custom-control-input']) !!}
                                    <label class="custom-control-label" for="switch1">{{ __("Status") }}</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i>
                                    {{ __("Reset") }}</button>
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
</div>
<!-- End Row -->
@endsection