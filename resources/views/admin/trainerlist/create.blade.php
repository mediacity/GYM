@extends('layouts.master')
@section('title',__('Add Trainer'))
@section('breadcum')
<div class="breadcrumbbar breadcrumbbar-one">
    <div class="row align-items-center">
        <div class="col-lg-4 col-md-8">
            <h4 class="page-title">{{ __("Trainer list") }}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Dashboard') }}</a></li>
                    <li class="breadcrumb-item"><a href="">{{ __('Admin') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ __('Add a Trainer') }}
                    </li>
                </ol>
            </div>
        </div>
        <div class="col-lg-8 col-md-4">
            <div class="top-btn-block text-right">
                <a href="{{route('trainerlist.index')}}" class="btn btn-primary-rgba mr-2"><i class="feather icon-arrow-left mr-2"></i>{{ __("Back") }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
@section('maincontent')
<!-- Start Form -->
<form class="form-light form" novalidate action="{{route('trainerlist.store')}}" method="POST">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">{{ __('Add a Trainer:') }}</h1>
                </div>
                <br>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="text-dark" for="address">{{ __("Member Name: ") }}<span
                                        class="text-danger">*</span></label>
                                <select required="" name="user_id" id="user_id"
                                    class="@error('user_id') is-invalid @enderror form-control select2">
                                    <option value="">{{ __("Select one") }}</option>
                                    @foreach($users as $user)
                                    <option
                                        {{ base64_decode(app('request')->input('id')) == $user->id ? "selected" : "" }}
                                        value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> {{ __("Select the user name") }} </small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-dark" for="address">{{ __("Trainer Name:") }} <span
                                        class="text-danger">*</span></label>
                                <select required="" name="trainer_name" id="trainer_name"
                                    class=" sel_test @error('trainers') is-invalid @enderror form-control select2">
                                    <option value="">{{ __("Select one") }}</option>
                                    @foreach($trainers as $trainer_name)
                                    <option value="{{ $trainer_name->id }}">{{ $trainer_name->name }}</option>
                                    @endforeach
                                </select>
                                @error('trainer_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>{{ __(" Select the trainer name which is given to you") }}</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-dark">{{ __("Select Trainer Type:") }} <span
                                        class="text-danger">*</span></label>
                                <select required="" name="personaltrainer" id="type" class="form-control select2">
                                    <option value="Trainer type not set">{{ __("Select Trainer Type") }}</option>
                                    <option value="Not a Personal Trainer">{{ __("Not a Personal Trainer") }}
                                    </option>
                                    <option value="Home Personal Trainer">{{ __("Home Personal Trainer") }}</option>
                                    <option value="Online Personal Trainer">{{ __("Online Personal Trainer") }}
                                    </option>
                                    <option value="Home Online Personal Trainer">{{ __("Home Online PersonalTrainer") }}</option>
                                    <option value="Gym Personal Trainer">{{ __("Gym Personal Trainer") }}</option>
                                </select>
                                @error('type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <small class="text-muted text-info" name="personaltrainer"> <i
                                        class="text-dark feather icon-help-circle"></i> {{ __("Select your Trainer Type") }}
                                </small>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="text-dark">{{ __("Date: ") }}<span class="text-danger">*</span></label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>From: </label>
                                            <div class="input-group">
                                                <input value="{{ old('from') }}" class="form-control calendar"
                                                    type="text" id="calendar1" name="from"
                                                    placeholder="{{ __("yyyy\mm\dd") }}">
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon2"><i
                                                            class="feather icon-calendar"></i></span>
                                                </div>
                                                @error('from')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{ __("To:") }}</label>
                                            <div>
                                                <div class="input-group">
                                                    <input value="{{ old('to') }}" class="form-control calendar"
                                                        type="text" id="calendar2" name="to"
                                                        placeholder="{{ __("yyyy\mm\dd") }}">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" id="basic-addon2"><i
                                                                class="feather icon-calendar"></i></span>
                                                    </div>
                                                    @error('to')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>{{ __(" Choose the date from which a trainer given to you") }}</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                {!! Form::label('description', 'Description',['class'=>'required text-dark'])
                                !!} <span class="text-danger">*</span>
                                {!! Form::textarea('description', null, ['id' => 'description','class' =>
                                'form-control' ,'required','placeholder' => 'Your description']) !!}
                                <small class="text-danger">{{ $errors->first('description') }}</small>
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>{{ __(" Describe for which you need a trainer eg: Weigh loss , Gain biceps ") }}</small>
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
                                        {!! Form::checkbox('is_active', 1,1, ['id' => 'switch1', 'class' =>
                                        'custom-control-input'])
                                        !!}
                                        <label class="custom-control-label" for="switch1"><span>{{ __("Status") }}</span></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i> {{ __("Reset") }}</button>
                        <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                            {{ __("Create") }}</button>
                    </div>
                </div>
                <div class="clear-both"></div>
            </div>
</form>
<!-- End Form -->
</div>
</div>
</div>
@endsection
@section('scripts')
<script>
    $('.calendar').each(function () {
        $(this).datepicker({
            dateFormat: 'yy-mm-dd',
            minDate: 0
        });
    });
    $(document).on('change', '.sel_test', function () {
        var typeID = $(this).val();
        $.ajax({
            type: 'GET',
            url: "{{ route('get.data.by.id') }}",
            data: {
                'type_id': typeID
            },
            success: function (data) {
                $("#personaltrainer").val(data);
            }
        });
    });
</script>
@endsection