@extends('layouts.master')
@section('title',__('Add Appointmentsetting'))
@section('breadcum')
<div class="breadcrumbbar breadcrumbbar-one">
    <div class="row align-items-center">
        <div class="col-lg-4 col-md-8">
            <h4 class="page-title">{{ __("Appointment Setting") }}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Dashboard') }}</a></li>
                    <li class="breadcrumb-item"><a href="">{{ __('Admin') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ __('Add Appointment Setting') }}
                    </li>
                </ol>
            </div>
        </div>
        <div class="col-lg-8 col-md-4">
            <div class="top-btn-block text-right">
                <a href="{{route('appointmentsetting.index')}}" class="btn btn-primary-rgba mr-2"><i
                class="feather icon-arrow-left mr-2"></i>{{ __("Back") }}</a>
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
                        <h5 class="card-title mb-0">{{ __("Create Appointmentsetting") }}</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="admin-form">
                            {!! Form::open(['method' => 'POST', 'route' => 'appointmentsetting.store','files' => true])
                            !!}
                            <div class="form-group{{ $errors->has('slot') ? ' has-error' : '' }}">
                                <label class="text-dark" for="cars">{{ __("Choose a Slot time:") }}<span class="text-danger"
                                        class="text-dark">*</span></label>
                                <select data-placeholder={{ __('Please select slot time') }} class="form-control select2"
                                    multiple="multiple" name="slot[]">
                                    <option>{{ __("Please select slot") }}</option>
                                    <option value="5.00am">{{ __("5.00am") }}</option>
                                    <option value="6.00am">{{ __("6.00am") }}</option>
                                    <option value="7.00am">{{ __("7.00am") }}</option>
                                    <option value="8.00am">{{ __("8.00am") }}</option>
                                    <option value="9.00am">{{ __("9.00am") }}</option>
                                    <option value="10.00am">{{ __("10.00am") }}</option>
                                    <option value="11.00am">{{ __("11.00am") }}</option>
                                    <option value="12.00am">{{ __("12.00am") }}</option>
                                    <option value="1.00pm">{{ __("1.00pm") }}</option>
                                    <option value="2.00pm">{{ __("2.00pm") }}</option>
                                    <option value="3.00pm">{{ __("3.00pm") }}</option>
                                    <option value="4.00pm">{{ __("4.00pm") }}</option>
                                    <option value="5.00pm">{{ __("5.00pm") }}</option>
                                    <option value="6.00pm">{{ __("6.00pm") }}</option>
                                    <option value="7.00pm">{{ __("7.00pm") }}</option>
                                    <option value="8.00pm">{{ __("8.00pm") }}</option>
                                    <option value="9.00pm">{{ __("9.00pm") }}</option>
                                    <option value="10.00pm">{{ __("10.00pm") }}</option>
                                    <option value="11.00pm">{{ __("11.00pm") }}</option>
                                    <option value="12.00pm">{{ __("12.00pm") }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="admin-form">
                            <div class="text-dark"
                                class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }} switch-main-block">
                                <div class="custom-switch">
                                    {!! Form::checkbox('is_active', 1,1, ['id' => 'switch1', 'class' =>
                                    'custom-control-input']) !!}
                                    <label class="custom-control-label" for="switch1"><span>{{ __("Status") }}</span></label>
                                </div>
                            </div>
                        </div><br>
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
</div>
</div>
<!-- End Contentbar -->
@endsection