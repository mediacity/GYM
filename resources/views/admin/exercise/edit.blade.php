@extends('layouts.master')
@section('title',__('Edit Exercise :eid -',['eid' => $exercise->id]))
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
{{ __(' Edit Exercise') }}
@endslot
@slot('button')
<div class="col-md-12 col-lg-6 text-right">
    <div class="top-btn-block">
        <a href="{{route('exercise.index')}}" class="btn btn-primary-rgba mr-2"><i class="feather icon-arrow-left mr-2"></i>{{ __("Back") }}</a>
    </div>
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
                    <div class="col-6">
                        <h5 class="card-title mb-0">{{ __("Edit Exercise") }}</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="admin-form">
                            {!! Form::model($exercise, ['method' => 'PATCH', 'route' => ['exercise.update',
                            $exercise->id], 'files' => true , 'class' => 'form form-light' ,'novalidate']) !!}
                            <div class="form-group">
                                <label class="text-dark">{{ __("Exercise Package: ") }}<span class="text-danger">*</span></label>
                                <input value="{{$exercise->exercise_package}}" type="text"
                                    class="form-control @error('name') is-invalid @enderror"
                                    placeholder="{{ __("enter exercise package name") }}" name="exercise_package" required="">
                                @error('exercise_package')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>
                                   {{ __(" Enter your Exercise Package..") }}</small>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                         <label class="text-dark">{{ __("Session:") }}<span class="text-danger">*</span></label>
                                        <select data-placeholder="{{ __("Please select diet session") }}" name="session_id[]"
                                            id="session_id[]" class="form-control select2" multiple>
                                            <option value="">{{ __("Please select diet session") }}</option>
                                            @foreach(App\dietid::all() as $session_id)
                                            <option @if($exercise->session_id != '') @foreach($exercise->session_id as
                                                $session)
                                                {{ $session == $session_id->id ? "selected" : "" }} @endforeach @endif
                                                value="{{ $session_id->id }}"> {{ $session_id['session_id'] }} </option>
                                            @endforeach

                                        </select>
                                        @error('session_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                        <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>
                                           {{ __(" Select session eg : Morning, Afternoon") }} </small>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('day') ? ' has-error' : '' }}">
                                <label for="day">{{ __("Choose a day :") }}<span class="text-danger">*</span></label>
                                <select data-placeholder="{{ __("Please select day") }}" name="day_id[]"
                                    class="mdb-select md-form form-control select2" multiple>
                                    <option value="">{{ __("Select Day") }}</option>
                                    @foreach(App\day::all() as $day)
                                     <option @if($exercise->day != '') @foreach($exercise->day as $exerciseday)
                                        {{ $exerciseday == $day->id ? "selected" : "" }} @endforeach @endif
                                        value="{{ $day->id }}"> {{ $day['day'] }} </option>
                                         @endforeach
                                </select>
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>
                                    {{ __("Select day: eg : Monday , Tuesday") }} </small>
                            </div>
                            <div class="form-group{{ $errors->has('exercisename') ? ' has-error' : '' }}">
                                <label for="exercisename">{{ __("Choose a exercisename :") }}<span
                                        class="text-danger">*</span></label>
                                <select data-placeholder="{{ __("Please select exercise") }}" name="exercisename_id[]"
                                    class="mdb-select md-form form-control select2" multiple>
                                    <option value="">{{ __("Select exercise name") }}</option>
                                    @foreach(App\exercisename::all() as $exercisename)
                                    <option @if($exercise->exercisename != '') @foreach($exercise->exercisename as
                                        $exerciseday)
                                        {{ $exerciseday == $exercisename->id ? "selected" : "" }} @endforeach @endif
                                        value="{{ $exercisename->id }}"> {{ $exercisename['exercisename'] }} </option>
                                    @endforeach
                                </select>
                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> {{ __("Select Exercisename: eg: Pushups , Pullups") }} </small>
                                <small class="text-danger text-info">{{ $errors->first('exercisename') }} </small>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('detail') ? ' has-error' : '' }}">
                            {!! Form::label('detail', 'Description',['class'=>'required']) !!}<span
                                class="text-danger">*</span></label>
                            {!! Form::textarea('detail', null, ['id' => 'summernote','class' => 'form-control'
                            ,'required','placeholder' => 'Please Enter Exercise Detail']) !!}
                            <small class="text-danger">{{ $errors->first('detail') }}</small>
                            <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>
                                {{ __("Enter the Exercise Description") }}</small>
                        </div>
                        <div class="form-group{{ $errors->has('time') ? ' has-error' : '' }}">
                            {!! Form::label('time', 'Time',['class'=>'required']) !!}<span
                                class="text-danger">*</span></label>
                            {!! Form::number('time', null, ['class' => 'form-control', 'required','placeholder' =>
                            'Please Enter the time for exercise']) !!}
                            <small class="text-danger">{{ $errors->first('time') }}</small>
                            <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>
                                {{ __("Enter the times of exercise eg: 50 ,40") }}</small>
                        </div>
                        <div class="form-group{{ $errors->has('video') ? ' has-error' : '' }} input-file-block">
                            {!! Form::label('video', 'Video',['class'=>'required text-dark']) !!}
                            {!! Form::file('video', ['class' => 'input-file', 'id'=>'video']) !!}
                            <small class="text-danger">{{ $errors->first('video') }}</small>
                        </div>

                        <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
                            {!! Form::label('url', 'Exercise Url',['class'=>'required']) !!}<span
                                class="text-danger">*</span></label>
                            {!! Form::text('url', null, ['class' => 'form-control','required' ,'placeholder' => 'Please
                            Enter Url' , 'pattern' => "https?://.+"]) !!}
                            <small class="text-danger">{{ $errors->first('url') }}</small>
                            <small class="text-info"> <i class="text-dark feather icon-help-circle"></i> {{ __('Enter url for exercise') }}
                            </small>
                        </div>
                        <div class="form-group">
                            <label class="text-dark">{{ __(" Follow Up Date:") }} <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input value="{{ $exercise->followup_date }}" name="followup_date" type="text"
                                    id="calendar2" class="calendar form-control" placeholder="{{ __("yyyy/mm/dd") }}"
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
                                {{ __("Please Enter Next Followup Date ") }}</small>
                        </div>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }} switch-main-block">
                    <div class="custom-switch">
                        {!! Form::checkbox('is_active', 1,$exercise->is_active==1 ? 1 : 0, ['id' =>
                        'switch1', 'class' => 'custom-control-input']) !!}
                        <label class="custom-control-label" for="switch1">{{ __("Is Active") }}</label>
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
</div>
<!-- End Contentbar -->
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