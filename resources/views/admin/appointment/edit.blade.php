@extends('layouts.master')
@section('title',__('Edit Appointment :aid -',['aid' => $appointment->id]))
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
                        {{ __('Edit Appointment') }}
                    </li>
                </ol>
            </div>
        </div>
        <div class="col-lg-8 col-md-4">
            <div class="top-btn-block text-right">
                <a href="{{route('appointment.index')}}" class="btn btn-primary-rgba mr-2"><i
                class="feather icon-arrow-left mr-2"></i>{{ __("Back") }}</a>
            </div>
        </div>
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
                        <h5 class="card-title mb-0">{{ __('Edit Appointment') }}</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="admin-form">
                    {!! Form::model($appointment, ['method' => 'PATCH', 'route' =>
                    ['appointment.update', $appointment->id], 'files' => true , 'class' => 'form form-light',
                    'novalidate']) !!}                   
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group{{ $errors->has('user id') ? ' has-error' : '' }}">
                                    <label for="cars">{{ __('Choose a user id') }}<span class="text-danger">*</span></label>
                                    <select data-placeholder="{{ __("Please select user") }}" class="form-control select2"
                                        name="user_id">
                                        <option value="">{{ __('Select one') }}</option>
                                        @foreach($users as $user)
                                        <option {{ $appointment['userid'] == $user->id ? "selected" : "" }}
                                            value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                    <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> {{ __('Select userid: Admin,Mrx') }} </small>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group{{ $errors->has('service id') ? ' has-error' : '' }}">
                                    <label for="cars">{{ __("Choose a service id:") }}<span class="text-danger">*</span></label>
                                    <select data-placeholder="{{ __("Please select group") }}" class="form-control select2"
                                        name="service">
                                        <option value="">{{ __("Select one") }}</option>
                                        @foreach($service as $service)

                                        <option {{ $appointment['serviceid'] == $service->id ? "selected" : "" }}
                                            value="{{ $service->id}}">{{ $service->name }}</option>
                                        @endforeach
                                    </select>
                                    <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>{{ __(" Select the service") }}
                                    </small>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                    <label class=" text-dark" for="status">{{ __("Choose a select status:") }}<span class="text-danger"
                                            class="text-dark">*</span></label>
                                    <select data-placeholder="{{ __("Please select status") }}" class="form-control select2"
                                        name="appointment_status">
                                        <option selected> {{ __("Please select status ") }}</option>
                                        <option {{ $appointment->appointment_status =='No Action' ? "selected" : "" }}
                                            value="No Action">{{ __("No Action") }}</option>
                                        <option {{ $appointment->appointment_status =='Attended' ? "selected" : "" }}
                                            value="Attended "> {{ __("Attended") }}</option>
                                        <option {{ $appointment->appointment_status =='No show' ? "selected" : "" }}
                                            value="Measurement">{{ __("No show") }}</option>
                                        <option {{ $appointment->appointment_status =='Open' ? "selected" : "" }}
                                            value="Lockers">{{ __("Open") }}</option>
                                        <option {{ $appointment->appointment_status =='Cancelled' ? "selected" : "" }}
                                            value="Exercises">{{ __("Cancelled") }}</option>
                                    </select>
                                </div>
                            </div>      
                            <div class="col-lg-12 col-md-12">   
                                <div class="form-group{{ $errors->has('detail') ? ' has-error' : '' }}">
                                    {!! Form::label('detail', 'Description',['class'=>'required']) !!}
                                    {!! Form::textarea('detail', null, ['id' => 'summernote','class' => 'form-control'
                                    ,'required','placeholder' => 'Please Enter Package Detail']) !!}
                                    <small class="text-danger">{{ $errors->first('detail') }}</small>
                                    <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> {{ __("Add a  Package Description:This is some basic description") }}</small>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="text-dark" for="calendar">{{ __("Appointment Assigned") }}</label>
                                    <input value="{{filter_var($appointment->from)}}" class="form-control calendar" type="text"
                                    id="calendar1" name="from">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="text-dark" for="calendar">{{ __("Appointment Expiration") }}</label>
                                    <input value="{{ $appointment->to}}" class="form-control calendar" type="text"
                                            id="calendar2" name="to">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 mt-4">
                                <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                                    {!! Form::label('comment', 'Comment',['class'=>'required']) !!}
                                    {!! Form::text('comment', null, ['id' => 'summernote','class' => 'form-control'
                                    ,'required','placeholder' => 'Please Enter Comment']) !!}
                                    <small class="text-danger">{{ $errors->first('comment') }}</small>
                                    <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> 8</small>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }} switch-main-block">
                                    <label class="text-dark" >{{ __("Status") }}</label>
                                    <div class="custom-switch">
                                        {!! Form::checkbox('is_active', 1,$appointment->is_active==1 ? 1
                                        : 0, ['id' => 'switch1', 'class' => 'custom-control-input'])
                                        !!}
                                        <label class="custom-control-label" for="switch1"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i>
                                        {{ __("Reset") }}</button>
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
</div>
<!-- End Row -->
@endsection
@section('scripts')

@endsection