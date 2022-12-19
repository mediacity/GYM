@extends('layouts.master')
@section('title',__("Add Appointment"))
@section('breadcum')
<div class="breadcrumbbar breadcrumbbar-one">
    <div class="row align-items-center">
        <div class="col-lg-4 col-md-8">
            <h4 class="page-title">{{ __("Appointment") }}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Dashboard') }}</a></li>
                    <li class="breadcrumb-item"><a href="">{{ __('Admin') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ __('Add Appointment') }}
                    </li>
                </ol>
            </div>
        </div>
        <div class="col-lg-8 col-md-4">
            <div class="top-btn-block text-right">
                <a href="{{route('appointment.index')}}" class="btn btn-primary-rgba mr-2"><i
                class="feather icon-arrow-left mr-2"></i>{{__("Back")}}</a>
            </div>
        </div>
    </div>
</div>
@endsection
@section('maincontent')
<!-- Start Contentbar -->
<div class="row">
    <!-- Start col -->
    <div class="col-lg-12">
        @foreach ($errors->all() as $message)
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
        @endforeach
        <div class="card m-b-30">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-12">
                        <h5 class="card-title mb-0">{{__("Add Appointment")}}</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="admin-form">
                            {!! Form::open(['method' => 'POST', 'route' => 'appointment.store','files' => true , 'class'
                            => 'form form-light', 'novalidate']) !!}
                            <div class="form-group{{ $errors->has('user id') ? ' has-error' : '' }}">
                                <label class="text-dark" for="cars">{{__("Choose a User Name:")}}<span
                                        class="text-danger">*</span></label>
                                <select data-placeholder="{{ __('Please select user') }}" class="form-control select2"
                                    name="userid">
                                    <option value="">{{__("Select One")}}</option>
                                    @foreach($users as $user)
                                    <option value="{{ $user->id}}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> {{__("Select the user:Admin, Mr.X")}}</small>
                            </div>
                            <div class="form-group{{ $errors->has('service id') ? ' has-error' : '' }}">
                                <label class="text-dark" for="cars">{{__("Choose a Service")}}<span
                                        class="text-danger">*</span></label>
                                <select data-placeholder="{{ __('Please select group') }}" class="form-control select2"
                                    name="serviceid">
                                    <option value="">{{__("Select One")}}</option>
                                    @foreach($service as $service)
                                    <option value="{{ $service->id}}">{{ $service->name }}</option>
                                    @endforeach
                                </select>
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> {{__("Select the Service")}}
                                </small>
                            </div>
                            <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                <label class=" text-dark" for="status">{{__("Choose a Select Status")}}<span class="text-danger"
                                        class="text-dark">*</span></label>
                                <select data-placeholder="{{ __("Please select status") }}" class="form-control select2"
                                    name="appointment_status">
                                    <option  selected>{{__("Please Select Status")}}</option>
                                    <option value="No Action">{{__("No Action")}}</option>
                                    <option value="Attended"> {{__("Attended")}}</option>
                                    <option value="No show">{{__("No Show")}}</option>
                                    <option value="Open">{{__("Open")}}</option>
                                    <option value="Cancelled">{{__("Cancelled")}}</option>
                                </select>
                               </div>
                               <div class="form-group{{ $errors->has('detail') ? ' has-error' : '' }}">
                                {!! Form::label('detail', 'Description',['class'=>'required']) !!}<span
                                    class="text-danger">*</span>
                                {!! Form::textarea('detail', null, ['id' => 'summernote','class' => 'form-control'
                                ,'required','placeholder' => 'Please Enter Package Detail']) !!}
                                <small class="text-danger">{{ $errors->first('detail') }}</small>
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>{{__("Enter Description")}}</small>
                                    <div class="col-md-4">
                                    <label for="">{{ __("Text Color:") }}</label>
                                    <input class="form-control" type="color" value=" name="detailcolor">
                                    </div>
                                </div>
                            <div class="form-group">
                                <label class="text-dark" for="calendar">{{__("Appointment Date")}}<span
                                        class="text-danger">*</span></label>
                                        <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                             <label class="text-dark" for="calendar">{{__("Appointment Assigned")}}</label>
                                            <div class="input-group">
                                                <input value="{{ old('from') }}"
                                                    class="form-control calendar @error('from') is-invalid @enderror"
                                                    type="text" id="calendar1" name="from">
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon2"><i
                                                            class="feather icon-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="text-dark" for="calendar">{{__("Appointment Experiation")}}</label>
                                            <div class="input-group">
                                                <input value="{{ old('to') }}" class="form-control calendar" type="text"
                                                    id="calendar2" name="to">
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon2"><i
                                                            class="feather icon-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                                {!! Form::label('comment', 'Comment') !!}
                                {!! Form::text('comment', null, ['id' => 'summernote','class' => 'form-control'
                                ,'placeholder' => 'Please Enter Comment']) !!}
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> 
                                    {{__("Enter Comment")}}</small>
                            </div>
                            <div class="form-group">
                                 <div class="text-dark"
                                    class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }} switch-main-block">
                                    <div class="custom-switch">
                                        {!! Form::checkbox('is_active', 1,1, ['id' => 'switch1', 'class' =>
                                        'custom-control-input']) !!}
                                        <label class="custom-control-label" for="switch1"><span>{{__("Status")}}</span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i>{{__("Reset")}}</button>
                                <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                                    {{__("Create")}}</button>
                            </div>
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
    </div>
</div>
@endsection
<!-- End Contentbar -->
@section('scripts')

@endsection
