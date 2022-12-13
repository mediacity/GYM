@extends('layouts.master')
@section('title',__('Edit Day :eid -',['eid' => $day->day]))
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
{{ __(' Edit Day') }}
@endslot
@slot('button')
<div class="col-md-6 col-lg-6">
    <a href="{{route('day.index')}}" class="float-right btn btn-primary-rgba mr-2"><i
            class="feather icon-arrow-left mr-2"></i>{{ __("Back") }}</a>
</div>
@endslot
@endcomponent
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
<div class="row">
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-12">
                        <h5 class="card-title mb-0">{{ __("Edit Day") }}</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="admin-form">
                            {!! Form::model($day, ['method' => 'PATCH', 'route' => ['day.update', $day->id], 'files' =>
                            true , 'class' => 'form form-light' , 'novalidate']) !!}
                            <div class="form-group{{ $errors->has('Day') ? ' has-error' : '' }}">
                                {!! Form::label('day', 'Day',['class'=>'required']) !!}
                                {!! Form::text('day', null, ['class' => 'form-control', 'required','placeholder' =>
                                'Please Enter Day']) !!}
                                <small class="text-danger">{{ $errors->first('day') }}</small>
                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i>{{ __("Add Day eg:Monday,Tuesday") }}</small>
                            </div>
                            <div
                                class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }} switch-main-block">
                                <div class="custom-switch">
                                    {!! Form::checkbox('is_active', 1,$day->is_active==1 ? 1 : 0, ['id' => 'switch1',
                                    'class' => 'custom-control-input']) !!}
                                    <label class="custom-control-label" for="switch1">{{ __("Is Active") }}</label>
                                </div>
                            </div>
                            <div class="form-group">
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
<!-- End Contentbar -->
@endsection