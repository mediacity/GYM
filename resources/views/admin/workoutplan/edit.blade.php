@extends('layouts.master')
@section('title',__('Edit Workoutplan :eid -',['eid' => $workoutplan->name]))
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
{{ __(' Edit Workoutplan') }}
@endslot
@slot('button')
<div class="col-md-6 col-lg-6">
    <a href="{{route('workoutplan.index')}}" class="float-right btn btn-primary-rgba mr-2"><i
            class="feather icon-arrow-left mr-2"></i>{{ __("Back") }}</a>
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
                    <div class="col-12">
                        <h5 class="card-title mb-0">{{ __("Edit Workoutplan") }}</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="admin-form">
                            {!! Form::model($workoutplan, ['method' => 'PATCH', 'route' => ['workoutplan.update',
                            $workoutplan->id], 'files' =>
                            true , 'class' => 'form form-light' , 'novalidate']) !!}
                            <div class="admin-form">
                                {{ $errors->has('Name') ? ' has-error' : '' }}
                                {!! Form::label('name', 'Name',['class'=>'required']) !!}<span
                                    class="text-danger">*</span>
                                {!! Form::text('name', null, ['class' => 'form-control', 'required','placeholder' =>
                                'Please Enter Name']) !!}
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> {{ __("Enter Name eg:Xyz") }}</small>
                            </div>
                            <div class="form-group">
                                <label class="text-dark">{{ __("Goal:") }} <span class="text-danger">*</span></label>

                                <select autofocus="" class="form-control select2" name="goal_name">
                                    <option value="">{{ __("Select Goal") }}</option>
                                    @foreach($goals as $goal)

                                    <option {{ $workoutplan['goal_name'] == $goal->id ? "selected" : "" }}
                                        value="{{ $goal->id }}">{{ $goal->goal }}</option>
                                    @endforeach
                                </select>

                                @error('goal')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> {{ __("Select your goal eg: weightloss , weightgain") }}</small>
                            </div>
                            <div class="form-group">
                                <label class="text-dark">{{ __("Level:") }} <span class="text-danger">*</span></label>

                                <select autofocus="" class="form-control select2" name="level_name">
                                    <option value="">{{ __("Select Level") }}</option>
                                    @foreach($levels as $level)

                                    <option {{ $workoutplan['level_name'] == $level->id ? "selected" : "" }}
                                        value="{{ $level->id }}">{{ $level->level }}</option>
                                    @endforeach
                                </select>

                                @error('level')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i>{{ __(" Select your level eg: advanced , beginner") }}</small>

                            </div>
                            <div class="form-group{{ $errors->has('duration') ? ' has-error' : '' }}">
                                <label class=" text-dark" for="duration">{{ __("Choose a Duration:") }}<span class="text-danger"
                                        class="text-dark">*</span></label>
                                <select data-placeholder="{{ __("Please select duration") }}" class="form-control select2"
                                    name="duration">
                                    <option selected>{{ __("Please select duration") }}</option>
                                    <option {{ $workoutplan->duration =='1 day in week' ? "selected" : "" }}
                                        value="1 day in week">{{ __("1 day in week") }}</option>
                                    <option {{ $workoutplan->duration =='2 day in week' ? "selected" : "" }}
                                        value="2 day in week">{{ __("2 day in week") }}</option>
                                    <option {{ $workoutplan->duration =='3 day in week' ? "selected" : "" }}
                                        value="3 day in week">{{ __("3 day in week") }}</option>
                                    <option {{ $workoutplan->duration =='4 day in week' ? "selected" : "" }}
                                        value="4 day in week">{{ __("4 day in week") }}</option>
                                    <option {{ $workoutplan->duration =='5 day in week' ? "selected" : "" }}
                                        value="5 day in week">{{ __("5 day in week") }}</option>
                                    <option {{ $workoutplan->duration =='6 day in week' ? "selected" : "" }}
                                        value="6 day in week">{{ __("6 day in week") }}</option>
                                    <option {{ $workoutplan->duration =='7 day in week' ? "selected" : "" }}
                                        value="7 day in week">{{ __("7 day in week") }}</option>
                                </select>
                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i>{{ __(" Enter Duration eg: 1 day in week,") }}</small>
                            </div>
                            <div class="admin-form">
                                {{ $errors->has('Days') ? ' has-error' : '' }}
                                {!! Form::label('days', 'Level',['class'=>'required']) !!}<span
                                    class="text-danger">*</span>
                                {!! Form::text('days', null, ['class' => 'form-control', 'required','placeholder' =>
                                'Please Enter Days']) !!}
                                <small class="text-danger">{{ $errors->first('days') }}</small>
                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> {{ __("Enter Day eg: 10 days, 12 days,") }}</small>
                            </div>
                            <div class="admin-form">
                                {{ $errors->has('Note') ? ' has-error' : '' }}
                                {!! Form::label('note', 'Note',['class'=>'required']) !!}<span
                                    class="text-danger">*</span>
                                {!! Form::text('note', null, ['class' => 'form-control', 'required','placeholder' =>
                                'Please Enter Note']) !!}
                                <small class="text-danger">{{ $errors->first('note') }}</small>
                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> {{ __("Enter Note") }}</small>
                            </div>
                            <div
                                class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }} switch-main-block">
                                <div class="custom-switch">
                                    {!! Form::checkbox('is_active', 1,$workoutplan->is_active==1 ? 1 : 0, ['id' =>
                                    'switch1',
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
<!-- End row -->
@endsection
