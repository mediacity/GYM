@extends('layouts.master')
@section('title',__('Add Exercise'))
@section('breadcum')
<div class="breadcrumbbar breadcrumbbar-one">
    <div class="row align-items-center">
        <div class="col-lg-4 col-md-8">
            <h4 class="page-title">{{ __("Exercise") }}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Dashboard') }}</a></li>
                    <li class="breadcrumb-item"><a href="">{{ __('Admin') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ __('Add Exercise') }}
                    </li>
                </ol>
            </div>
        </div>
        @if(auth()->user()->can('users.add'))
        <div class="col-lg-8 col-md-4">
            <div class="top-btn-block  text-right">
                <a href="{{route('exercise.index')}}" class="btn btn-primary-rgba mr-2"><i class="feather icon-arrow-left mr-2"></i>{{ __("Back") }}</a>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
@section('maincontent')
<!-- Start Contentbar -->
<div class="card m-b-30">
    <div class="card-body">
        {!! Form::open(['method' => 'POST', 'route' => 'exercise.store' ,'files' => true , 'class' => 'form
            form-light' ,'novalidate']) !!}
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                        <label class="text-dark">{{ __("Exercise Package:") }} <span class="text-danger">*</span></label>
                        <input value="{{ old('exercise_package') }}" type="text"
                            class="form-control @error('name') is-invalid @enderror"
                            placeholder="{{ __("enter exercise package name") }}" name="exercise_package" required="">
                        @error('exercise_package')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> {{ __("Enter your Exercise Package..") }}</small>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                        <label class="text-dark">{{ __("Session:") }}<span class="text-danger">*</span></label>
                        <select data-placeholder="{{ __("Please select diet session") }}" name="session_id[]" id="session_id[]"
                        class="form-control select2 @error('session_id[]') is-invalid @enderror" multiple>
                            <option value="">{{ __("Please select diet session") }}</option>
                            @if (isset($dietid))
                            @foreach ($dietid as $session_id)
                            <option value="{{ $session_id->id }}">
                                {{ $session_id->session_id }}</option>
                            @endforeach
                            @endif
                        </select>
                        @error('session_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> {{ __("Select session eg : Morning, Afternoon") }} </small>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="form-group{{ $errors->has('day') ? ' has-error' : '' }}">
                        <label for="day">{{ __("Choose a day :") }}<span class="text-danger">*</span></label>
                        <select data-placeholder="{{ __("Please select day") }}" name="day_id[]"  class="mdb-select md-form form-control select2" multiple>
                            <option value="">{{ __("Select Day") }}</option>
                            @if (isset($days))
                            @foreach($days as $day)
                            <option value="{{ $day->id }}">{{ $day->day}}</option>
                            @endforeach
                            @endif
                        </select>
                        <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>{{ __(" Select day: eg: Monday , Tuesday") }} </small>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="form-group{{ $errors->has('exercisename_id') ? ' has-error' : '' }}">
                        <label for="exercisename">{{ __(("Choose a exercise name :")) }}<span class="text-danger">*</span></label>
                        <select data-placeholder="{{ __("Please select exercise") }}" name="exercisename_id[]"
                            class="mdb-select md-form form-control select2" multiple>
                            <option value="">{{ __("Select exercise name") }}</option>
                            @if (isset($exercisenames))
                            @foreach($exercisenames as $exercisename)
                            <option value="{{ $exercisename->id }}">{{ $exercisename->exercisename}}</option>
                            @endforeach
                            @endif
                        </select>
                        <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>
                            {{ __(" Select Exercisename: eg: Pushups , Pullups ") }}</small>
                        <small class="text-danger">{{ $errors->first('exercisename_id') }} </small>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="form-group{{ $errors->has('detail') ? ' has-error' : '' }}">
                        {!! Form::label('detail', 'Description',['class'=>'required']) !!}<span
                            class="text-danger">*</span></label>
                        {!! Form::textarea('detail', null, ['id' => 'summernote','class' => 'form-control'
                        ,'required','placeholder' => 'Please Enter Exercise Detail']) !!}
                        <small class="text-danger">{{ $errors->first('detail') }}</small>
                        @error('detail')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> {{ __("Enter Exercise Description") }}</small>
                    </div> 
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="form-group{{ $errors->has('time') ? ' has-error' : '' }}">
                        {!! Form::label('time', 'Time',['class'=>'required time']) !!}<span
                            class="text-danger">*</span></label>
                        {!! Form::number('time', null, ['class' => 'form-control', 'required','placeholder' =>'Please Enter the time for exercise']) !!}
                        <small class="text-danger">{{ $errors->first('time') }}</small>
                        <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>{{ __(" Enter times eg:50,40.") }}</small>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
                        {!! Form::label('url', 'Exercise Url',['class'=>'required']) !!}<span class="text-danger">*</span></label>
                        {!! Form::text('url', null, ['class' => 'form-control','required' ,'placeholder' => 'Please Enter Url' ,  'pattern' => "https?://.+"]) !!}
                        <small class="text-danger">{{ $errors->first('url') }}</small>
                        <small class="text-info"> <i class="text-dark feather icon-help-circle"></i>{{ __(" Enter Url For Exercise") }}
                            </small>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                        <label class="text-dark">{{ __(" Follow Up Date: ") }}<span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input value="{{ old('followup_date') }}" name="followup_date" type="text" id="calendar2"
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
                            {{ __("Please Enter Next Followup Date" )}} </small>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="form-group{{ $errors->has('video') ? ' has-error' : '' }} input-file-block">
                        {!! Form::label('video', 'Video',['class'=>'text-dark']) !!}
                        <div class="input-group">
                            {!! Form::file('video', ['class' => 'input-file', 'id'=>'video']) !!}
                        </div>
                            <small class="text-danger">{{ $errors->first('video') }}</small>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }} switch-main-block">
                        <div class="custom-switch">
                            {!! Form::checkbox('is_active', 1, 1, ['id' => 'switch1', 'class' => 'custom-control-input'])
                            !!}
                            <label class="custom-control-label" for="switch1"><span>{{ __("Status") }}</span></label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                        <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i> {{ __("Reset") }}</button>
                        <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i> {{ __("Create") }}</button>
                    </div>
                </div>
            </div>
            <div class="clear-both"></div>
        {!! Form::close() !!}
    </div>  
</div>
<!-- End Contentbar -->
@endsection
@section('script')
<script>
    $(document).ready(function () {
        $('.mdb-select').materialSelect();
    });
    $('.calendar').each(function () {
        $(this).datepicker({
            dateFormat: 'yy-mm-dd',
            minDate: 0
        });
    });
</script>
@endsection
