@extends('layouts.master')
@section('title',__('Edit Packages :eid -',['eid' => $packages->title]))
@section('breadcum')
<div class="breadcrumbbar breadcrumbbar-one">
    <div class="row align-items-center">
        <div class="col-lg-4 col-md-8">
            <h4 class="page-title">{{ __("Packages") }}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Dashboard') }}</a></li>
                    <li class="breadcrumb-item"><a href="">{{ __('Admin') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ __('Edit Packages') }}
                    </li>
                </ol>
            </div>
        </div>
        @if(auth()->user()->can('users.add'))
        <div class="col-lg-8 col-md-4">
            <div class="top-btn-block text-right">
                <a href="{{route('packages.index')}}" class="btn btn-primary-rgba mr-2"><i class="feather icon-arrow-left mr-2"></i>{{ __("Back") }}</a>
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
                    <div class="col-6">
                        <h5 class="card-title mb-0">{{ __("Edit Package") }}</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="admin-form">
                            {!! Form::model($packages, ['method' => 'PATCH', 'route' => ['packages.update',
                            $packages->id], 'files' => true ,'class' => 'form form-light' ,'novalidate']) !!}
                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                {!! Form::label('title', 'Package Title',['class'=>'required']) !!} <span
                                    class="text-danger">*</span>
                                {!! Form::text('title', null, ['class' => 'form-control', 'required','placeholder' => 'Please Enter Package Title']) !!}
                                <small class="text-danger">{{ $errors->first('title') }}</small>
                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> {{ __("Add a Package Title : Gold Bronze Card, Special Card..") }}</small>
                            </div>
                            <div class="form-group{{ $errors->has('detail') ? ' has-error' : '' }}">
                                {!! Form::label('detail', 'Description',['class'=>'required']) !!} <span
                                    class="text-danger">*</span>
                                {!! Form::textarea('detail', null, ['class' => 'form-control' ,'required', 'placeholder'
                                => 'Please Enter Package description']) !!}
                                <small class="text-danger">{{ $errors->first('detail') }}</small>
                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> {{ __("Add a Package Description:This is some basic description") }}</small>
                            </div>
                            <div class="form-group{{ $errors->has('duration') ? ' has-error' : '' }}">
                                <label class=" text-dark" for="cars">{{ __("Choose a Duration:") }}<span class="text-danger"
                                        class="text-dark">*</span></label>
                                <select data-placeholder="{{ __("Please select duration") }}" class="form-control select2"
                                    name="duration">
                                    <option selected>{{ __("Please select duration") }}</option>
                                    <option {{ $packages->duration =='1 Month' ? "selected" : "" }} value="1 Month">{{ __("1 Month") }}</option>
                                    <option {{ $packages->duration =='2 Month' ? "selected" : "" }} value="2 Month">{{ __("2 Month") }}</option>
                                    <option  {{ $packages->duration =='3 Month' ? "selected" : "" }} value="3 Month">{{ __("3 Month") }}</option>
                                    <option {{ $packages->duration =='4 Month' ? "selected" : "" }} value="4 Month">{{ __("4 Month") }}</option>
                                    <option {{ $packages->duration =='5 Month' ? "selected" : "" }} value="5 Month">{{ __("5 Month") }}</option>
                                    <option  {{ $packages->duration =='6 Month' ? "selected" : "" }} value="6 Month">{{ __("6 Month") }}</option>
                                    <option {{ $packages->duration =='7 Month' ? "selected" : "" }} value="7 Month">{{ __("7 Month") }}</option>
                                    <option {{ $packages->duration =='8 Month' ? "selected" : "" }} value="8 Month">{{ __("8 Month") }}</option>
                                    <option {{ $packages->duration =='9 Month' ? "selected" : "" }} value="9 Month">{{ __("9 Month") }}</option>
                                    <option  {{ $packages->duration =='10 Month' ? "selected" : "" }}value="10 Month">{{ __("10 Month") }}</option>
                                    <option {{ $packages->duration =='11 Month' ? "selected" : "" }} value="11Month">{{ __("11 Month") }}</option>
                                    <option {{ $packages->duration =='1 Year' ? "selected" : "" }} value="1 Year">{{ __("1 Year") }}</option>
                                    <option {{ $packages->duration =='2 Year' ? "selected" : "" }} value="2 Year">{{ __("2 Year") }}</option>

                                </select>
                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i>{{ __(" Enter the Package Duration For eg: 12 Months, 6Months") }}</small>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                    {!! Form::label('price', 'Package price',['class'=>'required']) !!}<span
                                        class="text-danger">*</span>
                                    {!! Form::number('price', null, ['class' => 'form-control', 'required','placeholder' =>'Please Enter Package price']) !!}
                                    <small class="text-danger">{{ $errors->first('price') }}</small>
                                    <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> {{ __("Enter the Package price For eg: 2400 ,2000...") }}</small>
                                </div>
                            </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <div class="form-group{{ $errors->has('offerprice') ? ' has-error' : '' }}">
                                    {!! Form::label('offerprice', 'OfferPrice') !!}
                                    {!! Form::number('offerprice', null, ['class' => 'form-control', 'placeholder' => 'Please Enter Package offerprice']) !!}
                                    <small class="text-danger">{{ $errors->first('offerprice') }}</small>
                                    <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i>{{ __(" Enter thePackage Offerprice For eg: 1800 ,2000...") }}</small>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div
                                class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }} switch-main-block">
                                <div class="custom-switch">
                                    {!! Form::checkbox('is_active', 1,$packages->is_active==1 ? 1 : 0, ['id' =>
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
</div>
<!-- End Row -->
@endsection
