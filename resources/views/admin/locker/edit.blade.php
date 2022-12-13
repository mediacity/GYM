@extends('layouts.master')
@section('title',__('Edit Locker :eid -',['eid' => $locker->id]))
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
{{ __(' Edit Locker') }}
@endslot
@slot('button')
<div class="col-md-12 col-lg-6 text-right">
    <div class="top-btn-block">
        <a href="{{route('locker.index')}}" class="btn btn-primary-rgba mr-2"><i class="feather icon-arrow-left mr-2"></i>{{ __("Back") }}</a>
    </div>
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
                    <div class="col-6">
                        <h5 class="card-title mb-0">{{ __("Edit Locker") }}</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="admin-form">
                            {!! Form::model($locker, ['method' => 'PATCH', 'route' =>
                            ['locker.update', $locker->id], 'files' => true , 'class' => 'form
                            form-light','novalidate']) !!}
                            <div class="form-group{{ $errors->has('user id') ? ' has-error' : '' }}">
                                <label for="cars">{{ __("Choose a user :") }}<span class="text-danger">*</span></label>
                                <select data-placeholder="{{ __("Please select user") }}" class="form-control select2"
                                    name="user_id">
                                    <option value="">{{ __("Select one") }}</option>
                                    @foreach($users as $user)
                                    <option {{ $locker['userid'] == $user->id ? "selected" : "" }}
                                        value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>{{ __(" Selecting user id eg:  Admin, ...") }} </small>
                            </div>
                            <div class="text-dark" class="form-group{{ $errors->has('lockerno') ? ' has-error' : '' }}">
                                {!! Form::label('lockerno', 'Locker no.',['class'=>'required']) !!}
                                {!! Form::text('lockerno', null, ['class' => 'form-control',
                                'required','placeholder' => 'Please Enter Lockerno', 'pattern' => '[0-9]{1-100}']) !!}
                                <small class="text-danger">{{ $errors->first('lockerno') }}</small>
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> {{ __("Add a Unique Locker :98765566") }}</small>
                            </div>
                            <br>
                            <div class="form-group">
                                <label class="text-dark" for="calendar">{{ __("Date") }}<span class="text-danger">*</span></label>
                                 <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">

                                            <label class="text-dark" for="calendar">L{{ __("Locker Assigned") }}</label>
                                            <div class="input-group">

                                                <input value="{{$locker->from}}" class="form-control calendar"
                                                    type="text" id="calendar1" name="from">
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon2"><i
                                                            class="feather icon-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="col-md-6">
                                            <label class="text-dark" for="calendar">{{ __("Locker Expiration") }}</label>
                                            <div class="input-group">
                                                <input value="{{ $locker->to}}" class="form-control calendar"
                                                    type="text" id="calendar2" name="to">
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
                            <div class="form-group">
                                 <div class="text-dark"
                                    class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }} switch-main-block">
                                    <div class="custom-switch">
                                        {!! Form::checkbox('is_active', 1,$locker->is_active==1 ? 1
                                        : 0, ['id' => 'switch1', 'class' => 'custom-control-input'])
                                        !!}
                                        <label class="custom-control-label" for="switch1">Is
                                            {{ __("Active") }}</label>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i>
                                            {{ __("Reset") }}</button>
                                        <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                                            {{ __("Update") }}</button>
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
    <script>
            $('.calendar').each(function () {
                $(this).datepicker({
                    dateFormat: 'yy-mm-dd',
                    minDate: 0
                });
            });
              </script>
              @endsection
