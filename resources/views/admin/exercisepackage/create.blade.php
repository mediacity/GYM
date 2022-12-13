@extends('layouts.master')
@section('title',__('Add Exercise'))
@section('maincontent')
<!-- Start Breadcrumbbar -->                    
@component('components.breadcumb',['thirdactive' => 'active'])
@slot('heading')
{{ __('Exercise') }}
@endslot
@slot('menu1')
{{ __('Admin') }}
@endslot
@slot('menu2')
{{ __('Add Exercise') }}
@endslot
@slot('button')
<div class="col-md-12 col-lg-6 text-right">
    <div class="top-btn-block">
        <a href="{{route('exercisepackage.index')}}" class="btn btn-primary-rgba mr-2"><i class="feather icon-arrow-left mr-2"></i>{{ __("Back") }}</a>
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
                    <div class="col-12">
                        <h5 class="card-title mb-0">{{ __("Add Exercise") }}</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="admin-form">
                            {!! Form::open(['method' => 'POST', 'route' => 'exercisepackage.store','files' => true ,
                            'class' => 'form-light form' ,'novalidate']) !!}
                            <div class="form-group{{ $errors->has('user id') ? ' has-error' : '' }}">
                                <label class="text-dark" for="users id">{{ __("Choose a user ") }}<span
                                        class="text-danger">*</span></label>
                                <select data-placeholder= "{{ __('Please select user') }}" class="form-control select2"
                                    name="user_id">
                                    <option value="">{{ __("Select one") }}</option>
                                    @foreach($users as $user)
                                     <option {{ base64_decode(app('request')->input('id')) == $user->id ? "selected" : "" }}
                                        value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> {{ __("Select the  user : Admin , Mr.x") }}</small>
                            </div>
                            <div class="form-group{{ $errors->has('exercisepackage') ? ' has-error' : '' }}">
                                <label for="day">{{ __("Choose a exercisepackage :") }}<span class="text-danger">*</span></label>
                                <select data-placeholder="{{ __("Please select exercisepackage") }}" name="exercise_package[]"
                                    class="mdb-select md-form form-control select2" multiple>
                                    <option value="">{{ __("Select Exercisepackage") }}</option>
                                     @if (isset($package))
                                     @foreach($package as $packages)
                                    <option value="{{ $packages->id }}">{{ $packages->exercise_package}}</option>
                                     @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                            <div
                                                class="text-dark form-group{{ $errors->has('is_active') ? 'has-error' : '' }} switch-main-block">
                                                <div class="custom-switch">
                                                    {!! Form::checkbox('is_active', 1,1, ['id' => 'switch1', 'class' =>
                                                    'custom-control-input'])
                                                    !!}
                                                    <label class="custom-control-label" for="switch1">{{ __("Is Active") }}</label>
                                                </div>
                                            </div>
                                        </div>
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
        <!-- End Row -->
        @endsection
        