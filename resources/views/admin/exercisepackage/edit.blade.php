@extends('layouts.master')
@section('title',__('Edit Exercisepakage :eid -',['eid' => $exercisepackage->id]))
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
{{ __(' Edit Exercisepakage') }}
@endslot
@slot('button')
<div class="col-md-6 col-lg-6">
    <a href="{{route('exercisepackage.index')}}" class="float-right btn btn-primary-rgba mr-2"><i
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
                        <h5 class="card-title mb-0">{{ __("Edit Exercisepakage") }}</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="admin-form">
                            {!! Form::model($exercisepackage, ['method' => 'PATCH', 'route' =>
                            ['exercisepackage.update',
                            $exercisepackage->id], 'files' =>
                            true , 'class' => 'form form-light' ,'novalidate']) !!}
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="text-dark" for="address">{{ __("Name: ") }}<span
                                                    class="text-danger">*</span></label>
                                            <select required="" name="user_id" id="user_id"
                                                class="@error('user_id') is-invalid @enderror form-control select2">
                                                <option value="">{{ __("Select one") }}</option>
                                                @foreach($users as $user)
                                                <option {{ $exercisepackage['user_id'] == $user->id ? "selected" : "" }}
                                                    value="{{ $user->id }}">
                                                    {{ $user->name }} </option>
                                                @endforeach
                                            </select>
                                            @error('user_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            <small class="text-muted"> <i
                                                    class="text-dark feather icon-help-circle"></i>{{ __("Select the user name ") }}</small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>{{ __("Exercise Package: ") }}<span
                                                            class="redstar">*</span></label>
                                                    <select class="mdb-select md-form form-control select2"
                                                        name="exercise_package[]" size="5" row="5"
                                                        placeholder="{{ __('Select Exercise package') }}" multiple>
                                                        <option value="">{{ __("Select Package") }}</option>
                                                        @foreach(App\exercise::all() as $day)
                                                        <option @if($exercisepackage->exercise_package != '')
                                                            @foreach($exercisepackage->exercise_package as $exerciseday)
                                                            {{ $exerciseday == $day->id ? "selected" : "" }} @endforeach
                                                            @endif
                                                            value="{{ $day->id }}"> {{ $day['exercise_package'] }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="text-dark form-group{{ $errors->has('is_active') ? 'has-error' : '' }} switch-main-block">
                                            <div class="custom-switch">
                                                {!! Form::checkbox('is_active', 1,$exercisepackage->is_active==1 ? 1 :0,
                                                ['id' => 'switch1', 'class'
                                                =>'custom-control-input'])
                                                !!}
                                                <label class="custom-control-label"
                                                    for="switch1">{{ __("Is Active") }}</label>
                                            </div>
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
        <!-- End Row -->
        @endsection