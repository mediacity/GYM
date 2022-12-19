@extends('layouts.master')
@section('title',__('Edit Measurement :eid -',['eid' => $measurement->user_id]))
@section('breadcum')
<div class="breadcrumbbar breadcrumbbar-one">
    <div class="row align-items-center">
        <div class="col-lg-4 col-md-8">
            <h4 class="page-title">{{ __("Measurement") }}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Dashboard') }}</a></li>
                    <li class="breadcrumb-item"><a href="">{{ __('Admin') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ __('Edit Measurement') }}
                    </li>
                </ol>
            </div>
        </div>
        @if(auth()->user()->can('users.add'))
        <div class="col-lg-8 col-md-4">
            <div class="top-btn-block text-right">
                <a href="{{route('measurement.index')}}" class="float-right btn btn-primary-rgba mr-2"><i class="feather icon-arrow-left mr-2"></i>{{ __("Back") }}</a>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
@section('maincontent')
<!-- Start Form -->
<form class="form-light form" action="{{route('measurement.update' , $measurement->id)}}" novalidate method="POST">
    {{ csrf_field() }}
    @method('PUT')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                 <div class="card-header">
                       <h5 class="card-title">{{ __('Edit Your Measurement:') }}</h5>
                      </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-dark" for="address">{{ __("Name:") }} <span
                                            class="text-danger">*</span></label>
                                    <select autofocus="" data-placeholder="{{ __("Please select user" ) }}" name="user_id"
                                        id="user_id" class="form-control select2">
                                        <option value="">{{ __("Select user") }}</option>
                                        @foreach($users as $user)
                                        <option {{ $measurement['user_id'] == $user->id ? "selected" : "" }}
                                            {{ base64_decode(app('request')->input('id')) == $user->id ? "selected" : "" }}
                                            value="{{ $user->id}}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('user_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> {{ __("Enter your name eg: john, Joe") }}</small>
                                    <hr>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-dark">{{ __("Follow Up Date: ") }}<span class="text-danger">*</span></label>
                                    <div class="input-group">

                                        <input value="{{ $measurement->date }}" name="date" type="text" id="calendar"
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
                                    <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> {{ __("Choose the Measurement date") }}</small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="text-dark" for="address">{{ __("Height: ") }}<span
                                                    class="text-danger">*</span></label>
                                            <input name="height" type="text" pattern="\d{1,5}"
                                                class="form-control @error('height') is-invalid @enderror"
                                                placeholder="{{ __("Enter Your Height" ) }}"required
                                                value="{{ $measurement->height }}">

                                            @error('height')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            <small class="text-muted"> <i
                                                    class="text-dark feather icon-help-circle"></i> {{ __("Enter  your height eg: 152 cm, 172cm") }}</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="text-dark" for="address">{{ __("Weight: ") }}<span
                                                    class="text-danger">*</span></label>
                                            <input name="weight" type="text" pattern="\d{1,5}"
                                                class="form-control @error('weight') is-invalid @enderror"
                                                placeholder="{{ __("Enter your Weight") }}" required
                                                value="{{ $measurement->weight }}">

                                            @error('weight')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            <small class="text-muted"> <i  class="text-dark feather icon-help-circle"></i> {{ __("Enter your weight eg: 87kg ,76kg") }}</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="text-dark" for="address">{{ __("Neck:") }} <span
                                                    class="text-danger">*</span></label>
                                            <input name="neck" type="text" pattern="\d{1,5}"
                                                class="form-control @error('neck') is-invalid @enderror"
                                                placeholder="{{ __("Enter your neck size") }}" required
                                                value="{{ $measurement->neck }}">

                                            @error('neck')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            <small class="text-muted"> <i
                                                    class="text-dark feather icon-help-circle"></i> {{ __("Enter your neck measurement") }}</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="text-dark">{{ __("Chest:") }} <span class="text-danger">*</span></label>
                                            <input value="{{ $measurement->chest}}" type="text" name="chest" pattern="\d{1,5}"
                                                class="form-control @error('chest') is-invalid @enderror"
                                                placeholder="{{ __("Enter your chest Size") }}" required="">

                                            @error('chest')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            <small class="text-muted"> <i
                                                    class="text-dark feather icon-help-circle"></i> {{ __("Enter  your chest Size") }} </small>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="text-dark">{{ __("Waist:") }} <span class="text-danger">*</span></label>
                                            <input value="{{  $measurement->waist }}" type="text" name="waist" pattern="\d{1,5}"
                                                class="form-control @error('tricep') is-invalid @enderror"
                                                placeholder="{{ __("Enter your waist Size") }} required="">

                                            @error('waist')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            <small class="text-muted"> <i
                                                    class="text-dark feather icon-help-circle"></i> {{ __("Enter Waist Size.") }}</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="text-dark" for="address">{{ __("Shoulder(Round): ") }}<span
                                                    class="text-danger">*</span></label>
                                            <input name="shoulder" type="text"
                                                class="form-control @error('shoulder') is-invalid @enderror" pattern="\d{1,5}"
                                                placeholder="{{ __("Enter your Shoulder") }}" required
                                                value="{{ $measurement->shoulder }}">

                                            @error('shoulder')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            <small class="text-muted"> <i
                                                    class="text-dark feather icon-help-circle"></i> {{ __("Enter your shoulder size") }}</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="text-dark" for="address">{{ __("Hips:") }} <span
                                                    class="text-danger">*</span></label>
                                            <input name="hips" type="text" pattern="\d{1,5}"
                                                class="form-control @error('hips') is-invalid @enderror"
                                                placeholder="{{ __("Enter your Hips size") }}" required
                                                value="{{ $measurement->hips }}">

                                            @error('hips')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            <small class="text-muted"> <i
                                                    class="text-dark feather icon-help-circle"></i> {{ __("Enter your hips size") }}</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="text-dark">{{ __("Calves: ") }}<span class="text-danger">*</span></label>
                                            <input value="{{$measurement->calves }}" autofocus="" type="text" pattern="\d{1,5}"
                                                name="calves" class="form-control @error('calves') is-invalid @enderror"
                                                placeholder="{{ __("Enter your Calves Size") }}" required="">

                                            @error('calves')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            <small class="text-muted"> <i
                                                    class="text-dark feather icon-help-circle"></i> {{ __("Enter your calves Size") }}</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="text-dark">{{ __("Abdomen: ") }}<span class="text-danger">*</span></label>
                                            <input value="{{ $measurement->abdomen }}" autofocus="" type="text" pattern="\d{1,5}"
                                                name="abdomen"
                                                class="form-control @error('abdomen') is-invalid @enderror"
                                                placeholder="{{ __("Enter your Abdomen Size") }}" required="">

                                            @error('abdomen')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            <small class="text-muted"> <i
                                                    class="text-dark feather icon-help-circle"></i>{{ _(" Enter  abdomen Size") }}</small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="text-dark" for="address">{{ __("Lean Muscle(%):") }} <span
                                                            class="text-danger">*</span></label>
                                                    <input name="muscle" type="text" pattern="\d{1,5}"
                                                        class="form-control @error('muscle') is-invalid @enderror"
                                                        placeholder="{{ __("Enter Your Muscle") }}" required
                                                        value="{{ $measurement->muscle }}">

                                                    @error('muscle')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                    <small class="text-muted"> <i
                                                            class="text-dark feather icon-help-circle"></i>{{ __(" Enter your Muscle size") }}</small>
                                                </div>
                                            </div>


                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="text-dark" for="address">{{ __("Right Arm:") }} <span
                                                            class="text-danger">*</span></label>
                                                    <input name="r_arm" type="text" pattern="\d{1,5}"
                                                        class="form-control @error('r_arm') is-invalid @enderror"
                                                        placeholder="{{ __("Enter your R Arm size") }}" required
                                                        value="{{ $measurement->r_arm }}">

                                                    @error('r_arm')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                    <small class="text-muted"> <i
                                                            class="text-dark feather icon-help-circle"></i> {{ __("Enter your R Arm measurement") }}</small>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="text-dark" for="address">{{ __("Left Arm:") }} <span
                                                            class="text-danger">*</span></label>
                                                    <input name="l_arm" type="text" pattern="\d{1,5}"
                                                        class="form-control @error('l_arm') is-invalid @enderror"
                                                        placeholder="{{ __("Enter your L Arm") }}" required
                                                        value="{{ $measurement->l_arm }}">

                                                    @error('l_arm')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                    <small class="text-muted"> <i
                                                            class="text-dark feather icon-help-circle"></i>{{ __(" Enter your L Arm measurement eg:120cm") }}</small>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="text-dark" for="address">Thigh R: <span
                                                                    class="text-danger">*</span></label>
                                                            <input name="thigh_r" type="text" pattern="\d{1,5}"
                                                                class="form-control @error('thigh_r') is-invalid @enderror"
                                                                placeholder="{{ __("Enter Your Thigh R Measurement") }}" required
                                                                value="{{ $measurement->thigh_r }}">

                                                            @error('thigh_r')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                            <small class="text-muted"> <i
                                                                    class="text-dark feather icon-help-circle"></i> {{ __("Enter your Right Thigh Measurement") }}</small>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="text-dark" for="address">{{ __("Thigh L: ") }}<span
                                                                    class="text-danger">*</span></label>
                                                            <input name="thigh_l" type="text" pattern="\d{1,5}"
                                                                class="form-control @error('thigh_l') is-invalid @enderror"
                                                                placeholder="{{ __("Enter your Thigh L Measurement") }}" required
                                                                value="{{ $measurement->thigh_l }}">

                                                            @error('thigh_l')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                            <small class="text-muted"> <i
                                                                    class="text-dark feather icon-help-circle"></i>
                                                              {{ __("  Enter your Left Thigh Mesurement") }}</small>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="text-dark" for="address">{{ __("Mid Upper Arm Circumference:") }} <span
                                                                    class="text-danger">*</span></label>
                                                            <input name="arm_circumference" type="text" pattern="\d{1,5}"
                                                                class="form-control @error('arm_circumference') is-invalid @enderror"
                                                                placeholder="{{ __("Enter your Arm Circumference") }}" required
                                                                value="{{ $measurement->arm_circumference }}">

                                                            @error('arm_circumference')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                            <small class="text-muted"> <i
                                                                    class="text-dark feather icon-help-circle"></i>
                                                               {{ __(" Enter your Mid Upper Arm  Circumference") }}</small>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                             <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="text-dark" for="address">{{ __("Tricep:") }} <span
                                                                            class="text-danger">*</span></label>
                                                                    <input name="tricep" type="text" pattern="\d{1,5}"
                                                                        class="form-control @error('tricep') is-invalid @enderror"
                                                                        placeholder="{{ __("Enter your Tricep Measurement") }}"
                                                                        required value="{{ $measurement->tricep }}">

                                                                    @error('tricep')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                    <small class="text-muted"> <i
                                                                            class="text-dark feather icon-help-circle"></i> {{ __(" Enter your Tricep Measurement") }}</small>
                                                                    <hr>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="text-dark" for="address">{{ __("Bicep:") }}<span
                                                                            class="text-danger">*</span></label>
                                                                    <input name="bicep" type="text" pattern="\d{1,5}"
                                                                        class="form-control @error('bicep') is-invalid @enderror"
                                                                        placeholder="{{ __("Enter your Bicep Measurement") }}"
                                                                        required value="{{ $measurement->bicep }}">

                                                                    @error('bicep')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                    <small class="text-muted"> <i
                                                                            class="text-dark feather icon-help-circle"></i>
                                                                        {{ __("Enter   your Bicep Measurement") }}</small>
                                                                    <hr>
                                                                </div>
                                                            </div>
                                                             <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="text-dark" for="address">{{ __("BMI: ") }}<span
                                                                            class="text-danger">*</span></label>
                                                                    <input name="bmi" type="text" pattern="\d{1,5}"
                                                                        class="form-control @error('bmi') is-invalid @enderror"
                                                                        placeholder="{{ __("Enter Your BMI") }}" required
                                                                        value="{{ $measurement->bmi }}">
                                                                         @error('bmi')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                    <small class="text-muted"> <i  class="text-dark feather icon-help-circle"></i> {{ __("Enter your BMI") }}</small>
                                                                    <hr>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                     <hr>
                                                      <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="text-dark">{{ __("Fat(%): ") }}<span
                                                                            class="text-danger">*</span></label>
                                                                    <input value="{{$measurement->fat }}" autofocus=""
                                                                        type="number" name="fat"
                                                                        class="form-control @error('fat') is-invalid @enderror"
                                                                        placeholder="{{ __("Enter Your Fat") }}" required="">

                                                                    @error('fat')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                    <small class="text-muted"> <i
                                                                            class="text-dark feather icon-help-circle"></i> {{ __("Enter total body Fat") }}</small>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="text-dark">{{ __("Optimal Fat(%):") }} <span
                                                                            class="text-danger">*</span></label>
                                                                    <input value="{{$measurement->optimal_fat }}"
                                                                        autofocus="" type="number" name="optimal_fat"
                                                                        class="form-control @error('optimal_fat') is-invalid @enderror"
                                                                        placeholder="{{ __("Enter Your Optimal Fat") }}"
                                                                        required="">
                                                                        @error('optimal_fat')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                    <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> {{ __("Enter your body Optimal Fat") }}</small>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="col-md-12">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div
                                                                            class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                                                            {!! Form::label('description',
                                                                            'Description',['class'=>'required
                                                                            text-dark']) !!} <span
                                                                                class="text-danger">*</span>
                                                                            {!! Form::textarea('description',
                                                                            $measurement->description,
                                                                            ['id' => 'description','class' =>
                                                                            'form-control' ,'required','placeholder' => 'Your description']) !!}
                                                                            <small
                                                                                class="text-danger">{{ $errors->first('description') }}</small>
                                                                            <small class="text-muted"> <i
                                                                                    class="text-dark feather icon-help-circle"></i> {{ __("Describe for which you give the measurement eg:Body shaping , Weight loss") }}</small>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label class="text-dark"
                                                                                for="address">{{ __("Prescribed by:") }} <span
                                                                                    class="text-danger">*</span></label>
                                                                            <select required="" name="trainer_name"
                                                                                id="trainer_name"
                                                                                class="@error('trainer_name') is-invalid @enderror form-control select2">
                                                                                <option value="">{{ __("Select Trainer name") }}
                                                                                </option>
                                                                                @foreach($trainers as $trainer_name)
                                                                                <option
                                                                                    {{ $measurement['trainer_name'] == $trainer_name->id ? "selected" : "" }}
                                                                                    value="{{ $trainer_name->id  }}">
                                                                                    {{ $trainer_name->trainer_name }}
                                                                                </option>
                                                                                @endforeach
                                                                            </select>
                                                                            @error('trainer_name')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                            @enderror
                                                                            <small class="text-muted"> <i
                                                                                    class="text-dark feather icon-help-circle"></i>
                                                                               {{ __(" Select the trainer name by which you prescribed this mesurement") }}</small>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                             <div class="col-md-12">
                                                                <div class="row">
                                                                     <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <div class="text-dark"
                                                                                class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }} switch-main-block">
                                                                                <div class="custom-switch">
                                                                                    {!! Form::checkbox('is_active',
                                                                                    1,$measurement->is_active==1 ? 1 :
                                                                                    0,
                                                                                    ['id' => 'switch1', 'class' =>
                                                                                    'custom-control-input']) !!}
                                                                                    <label class="custom-control-label"
                                                                                        for="switch1"><span>{{ __("Status") }}</span></label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <br>
                                                            <div class="col-md-12">
                                                                <div class="row">
                                                                     <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <button type="reset"
                                                                                class="btn btn-danger-rgba"><i
                                                                                    class="fa fa-ban"></i>
                                                                                {{ __("Reset") }}</button>
                                                                            <button type="submit"
                                                                                class="btn btn-primary-rgba"><i
                                                                                    class="fa fa-check-circle"></i>
                                                                                {{ __("Update") }}</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</form>
<!-- End Form -->
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
