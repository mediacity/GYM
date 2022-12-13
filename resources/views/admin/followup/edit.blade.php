@extends('layouts.master')
@section('title',__('Edit Follow Up :eid -',['eid' => $followup->id]))
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
{{ __(' Edit Follow Up') }}
@endslot
@slot('button')
<div class="col-md-12 col-lg-6 text-right">
    <div class="top-btn-block">
        <a href="{{route('followup.index')}}" class="btn btn-primary-rgba mr-2"><i class="feather icon-arrow-left mr-2"></i>{{ __("Back") }}</a>
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
                        <h5 class="card-title mb-0">{{ __("Edit Follow up") }}</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="admin-form">
                            {!! Form::model($followup, ['method' => 'PATCH', 'route' => ['followup.update',
                            $followup->id], 'files'
                            => true , 'class' => 'form form-light' ,'novalidate']) !!}
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name">{{ __("Choose a user :") }}<span class="text-danger">*</span></label>
                                <select data-placeholder="{{ __("Please select user") }}" class="form-control select2"
                                    name="enquiry_name">
                                    <option value="">{{ __("Select one") }}</option>
                                    @foreach($enquirys as $enquiry)
                                    <option {{ $followup['enquiry_name'] == $enquiry->name ? "selected" : "" }}
                                        value="{{ $enquiry->name }}">{{ $enquiry->name }}</option>
                                    @endforeach
                                </select>
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>
                                    {{ __(" Selecting enquiry user eg: Admin, ... ") }}</small>
                            </div>
                            <div class="form-group">
                                <label class="text-dark">{{ __(" Next Date:") }} <span
                                        class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input value="{{ $followup->date}}" name="date" type="text" id="calendar2"
                                        class="calendar form-control" placeholder="{{ __("yyyy/mm/dd") }}"
                                        aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2"><i
                                                class="feather icon-calendar"></i></span>
                                    </div>
                                </div>
                                @error('date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>
                                    {{ __(" Choose the enquiry Date ") }}</small>

                            </div>
                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                {!! Form::label('description', 'Description',['class'=>'required']) !!} <span
                                    class="text-danger">*</span>
                                {!! Form::textarea('description', null, ['id' => 'summernote','class' => 'form-control'
                                ,'required','placeholder' => 'Please Enter Fees Description']) !!}
                                <small class="text-danger">{{ $errors->first('description') }}</small>
                            </div>
                            <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                <label class=" text-dark" for="cars">{{ __("Choose a Status:") }}<span
                                        class="text-danger" class="text-dark">*</span></label>
                                <select data-placeholder="{{ __("Please select status" ) }}class="form-control select2"
                                    name="status">
                                    <option selected>{{ __("Please select status") }}</option>

                                    <option {{ $followup->status =='demo' ? "selected" : "" }} value="demo">
                                        {{ __("Demo") }}
                                    </option>
                                    <option {{ $followup->status =='close' ? "selected" : "" }} value="close">
                                        {{ __("Close") }}
                                    </option>
                                    <option {{ $followup->status =='join' ? "selected" : "" }} value="join">
                                        {{ __("Join") }}
                                    </option>
                                    <option {{ $followup->status =='pending' ? "selected" : "" }} value="pending">
                                        {{ __("Pending") }}</option>
                                </select>
                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> {{ __("Select a status eg: pending,join") }}
                                </small>
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
</div>
<!-- End Row -->
@endsection
@section('script')
<script>
    $('.calendar').each(function () {
        $(this).datepicker({
            dateFormat: 'yy-mm-dd',
            minDate: 0
        });
    });
</script>
@endsection