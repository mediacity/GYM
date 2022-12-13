@extends('layouts.master')
@section('title',__('Edit Dietpackage :eid -',['eid' => $dietpackage->dietpackage]))
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
{{ __(' Edit Dietpackage') }}
@endslot
@slot('button')
<div class="col-md-4 col-lg-4">
    <a href="{{route('dietpackage.index')}}" class="float-right btn btn-dark-rgba mr-2"><i
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
                        <h5 class="card-title mb-0">{{ __("Edit Dietpakage") }}</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="admin-form">
                            {!! Form::model($dietpackage, ['method' => 'PATCH', 'route' => ['dietpackage.update',
                            $dietpackage->id], 'files' =>
                            true , 'class' => 'form form-light' ,'novalidate']) !!}
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="text-dark" for="address">{{ __("Name:") }} <span class="text-danger">*</span></label>
                                            <select required="" name="user_id" id="user_id"
                                                class="@error('user_id') is-invalid @enderror form-control select2">
                                                <option value="">{{ __('Select one') }}</option>
                                                @foreach($users as $user)
                                                 <option {{ $dietpackage['user_id'] == $user->id ? "selected" : "" }}
                                                    value="{{filter_var(' $user->id ')}}">
                                                    {{ $user->name }} </option>
                                                       @endforeach
                                            </select>
                                            @error('user_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i>{{ __("Select the user name ") }}</small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                               <div class="form-group{{ $errors->has('dietpackage') ? ' has-error' : '' }}">
                                                    <label for="day">{{ __("Choose a dietpackage :") }}<span class="text-danger">*</span></label>
                                                    <select data-placeholder="{{ __('"Please select dietpackage"') }}" name="diet_package[]"
                                                        class="mdb-select md-form form-control select2" multiple>
                                                         <option value="">{{ __("Select Package") }}</option>
                                                        @foreach(App\diet::all() as $day)
                                                        <option @if($dietpackage->diet_package != '') @foreach($dietpackage->diet_package as $exerciseday)
                                                            {{ $exerciseday == $day->id ? "selected" : "" }} @endforeach @endif
                                                            value="{{ $day->id }}"> {{ $day['dietname'] }} </option>
                                                            @endforeach
                                                         </select>
                                                 </div>
                                            </div>
                                        </div>
                            <div
                                class="text-dark form-group{{ $errors->has('is_active') ? 'has-error' : '' }} switch-main-block">
                                <div class="custom-switch">
                                    {!! Form::checkbox('is_active', 1,$dietpackage->is_active==1 ? 1 :0, ['id' => 'switch1', 'class'
                                    =>'custom-control-input'])
                                    !!}
                                    <label class="custom-control-label" for="switch1">{{ __("Is Active") }}</label>
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
<!-- End Contentbar -->
@endsection
