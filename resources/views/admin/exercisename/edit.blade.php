@extends('layouts.master')
@section('title',__('Edit Exercisename :eid -',['eid' => $exercisename->exercisename]))
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
{{ __(' Edit Exercisename') }}
@endslot
@slot('button')
<div class="col-md-6 col-lg-6">
    <a href="{{route('exercisename.index')}}" class="float-right btn btn-primary-rgba mr-2"><i
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
                        <h5 class="card-title mb-0">{{ __("Edit Exercisename") }}</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="admin-form">
                            {!! Form::model($exercisename, ['method' => 'PATCH', 'route' => ['exercisename.update',
                            $exercisename->id], 'files' =>
                            true , 'class' => 'form form-light' ,'novalidate']) !!}
                            <div class="form-group{{ $errors->has('Exercisename') ? ' has-error' : '' }}">
                                {!! Form::label('exercisename', 'Exercisename',['class'=>'required']) !!}<span
                                    class="text-danger">*</span></label>

                                {!! Form::text('exercisename', null, ['class' => 'form-control',
                                'required','placeholder' =>
                                'Please Enter Exercisename']) !!}
                                <small class="text-danger">{{ $errors->first('exercisename') }}</small>
                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> {{ __("Enter Exercise name eg: push-up,pull-up") }}</small>
                            </div>
                            <div class="form-group{{ $errors->has('body_part') ? ' has-error' : '' }}">
                                {!! Form::label('body_part', 'Bodypart',['class'=>'required']) !!}<span
                                    class="text-danger">*</span></label>

                                {!! Form::text('body_part', null, ['class' => 'form-control', 'required','placeholder'
                                =>
                                'Please Enter Bodypart']) !!}
                                <small class="text-danger">{{ $errors->first('body_part') }}</small>
                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> {{ __("Enter Bodypart for which exercise is assigned eg: Arm , hips..") }}</small>
                            </div>
                            <div class="form-group">
                                <label class="text-dark">{{ __("Exercise Type: ") }}<span class="text-danger">*</span></label>
                                <select data-placeholder="{{ __("Please select day") }}" name="type[]"
                                    class="mdb-select md-form form-control select2" multiple>
                                    <option value="">{{ __("Select Day") }}</option>
                                    @foreach(App\type::all() as $type)

                                    <option @if($exercisename->type != '') @foreach($exercisename->type as $typeid)
                                        {{ $typeid == $type->id ? "selected" : "" }} @endforeach @endif
                                        value="{{ $type->id }}"> {{ $type['name'] }} </option>

                                    @endforeach
                                </select>
                                @error('type')
                                <span class="invalid-feedback" role="alert">

                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i>{{ __(" Select the Exercise Type : Traditional Pushups, Clap Pushups ") }}</small>
                            </div>
                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                {!! Form::label('description', 'Description',['class'=>'required']) !!}<span
                                    class="text-danger">*</span></label>

                                {!! Form::textarea('detail', null, ['id' => 'summernote','class' => 'form-control'
                                ,'required','placeholder' => 'Please Enter Exercise Detail']) !!}
                                <small class="text-danger">{{ $errors->first('description') }}</small>
                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i>{{ __(" Enter the Exercise Description ") }}</small>
                            </div>
                            <div
                                class="text-dark form-group{{ $errors->has('is_active') ? 'has-error' : '' }} switch-main-block">
                                <div class="custom-switch">
                                    {!! Form::checkbox('is_active', 1,$exercisename->is_active==1 ? 1 :0, ['id' => 'switch1', 'class'
                                    =>'custom-control-input'])
                                    !!} <label class="custom-control-label" for="switch1"><span>{{ __("Status") }}</span></label>
                                </div>
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
<!-- End Row -->
@endsection
