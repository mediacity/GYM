@extends('layouts.master')
@section('title',__('Add Staff Attendance'))
@section('breadcum')
<div class="breadcrumbbar breadcrumbbar-one">
    <div class="row align-items-center">
        <div class="col-lg-4 col-md-8">
            <h4 class="page-title">{{ __("Staff Attendance") }}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Dashboard') }}</a></li>
                    <li class="breadcrumb-item"><a href="">{{ __('Admin') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ __('Add Staff Attendance') }}
                    </li>
                </ol>
            </div>
        </div>
        <div class="col-lg-8 col-md-4">
            <div class="top-btn-block text-right">
                <a href="{{ route('memberattendance.index') }}" title="Go back" role="button"
                    class="btn btn-info-rgba mr-2">
                    {{ __("Member Aattendance") }}<i class="feather icon-arrow-right ml-2"></i></a>
                <a href="{{route('staffattendance.index')}}" class="btn btn-primary-rgba mr-2"><i
                class="feather icon-arrow-left mr-2"></i>{{ __("Back") }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
@section('maincontent')
<!-- Start Form -->
<form autocomplete="off" class="form-light form" novalidate action="{{route('staffattendance.store')}}" method="POST">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">{{ __('Staff Attendance Details:') }}</h1>
                </div>
                <br>
               
                <div class="col-md-12">
                    <div class="row">
                         <!--name-->
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="text-dark">{{ __("Name:") }} <span class="text-danger">*</span></label>
                                <select autofocus="" class="form-control select2" name="user_id">
                                    <option value="">{{ __("Select One") }}</option>
                                    @foreach($users as $user)
                                     <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @error('user')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> {{ __("Select your user name eg: John, joe") }}</small>
                            </div>
                        </div>
                        <!--date-->
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="text-dark">{{ __("Date:") }} <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input value="{{ old('value') }}" name="date" type="text" id="calendar"
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
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> {{ __("Choose the Attendance date") }}</small>
                            </div>
                        </div>
                        <!--date-->
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="text-dark">{{ __("Comments:") }} <span class="text-danger">*</span></label>
                                <input value="{{ old('comment') }}" type="text"
                                    class="form-control @error('comment') is-invalid @enderror"
                                    placeholder="{{ __("Your comment") }}" name="comment" required="">

                                @error('comment')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>{{ __(" Give your reason or comment for your attend details") }} </small>
                            </div>
                        </div>
                        <!--Location -->
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                                {!! Form::label('location', 'Location',['class'=>'required text-dark']) !!} <span
                                    class="text-danger">*</span>
                                {!! Form::textarea('location', null, ['id' => 'location','class' => 'form-control'
                                ,'required','placeholder' => 'Your Location']) !!}
                                <small class="text-danger">{{ $errors->first('location') }}</small>
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>{{ __(" Your attendance location") }}</small>

                            </div>
                        </div>
                        <!--height-->
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group member-attendance-slider">
                                <label class="text-dark">{{ __("Attendance: ") }}<span class="text-danger">*</span></label><br>
                                <label class="switch"><input type="checkbox" id="togBtn" name="attend">
                                    <div class="slider round">
                                        <!--ADDED HTML -->
                                        <span class="on" value="present">{{ __("Present") }}</span><span class="off"
                                            value="absent">{{ __("Absent") }}</span>
                                        <!--END-->
                                    </div>
                                </label>
                                @error('attend')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i> {{ __("Reset") }}</button>
                                <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                                    {{ __("Create") }}</button>
                            </div>
                        </div>
                    </div>
                    <div class="clear-both"></div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Form -->
</div>
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