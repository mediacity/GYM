@extends('layouts.master')
@section('title',__('Add Trainer'))
@section('breadcum')
<div class="breadcrumbbar breadcrumbbar-one">
    <div class="row align-items-center">
        <div class="col-lg-4 col-md-8">
            <h4 class="page-title">{{ __("Trainer") }}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Dashboard') }}</a></li>
                    <li class="breadcrumb-item"><a href="">{{ __('Admin') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ __('Add Trainer') }}
                    </li>
                </ol>
            </div>
        </div>
        <div class="col-lg-8 col-md-4">
            <div class="top-btn-block text-right">
                <a href="{{route('trainer.index')}}" class="btn btn-primary-rgba mr-2"><i
                class="feather icon-arrow-left mr-2"></i>{{ __("Back") }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
@section('maincontent')
<!-- Start form -->
<form  autocomplete="on" class="form-light form" novalidate action="{{route('trainer.store')}}" method="POST">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-12">
            <!-- <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h5 class="card-title mb-0">{{ __("Add Trainer") }}</h5>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade active show" id="v-pills-profile" role="tabpanel"
                    aria-labelledby="v-pills-profile-tab">
                    <div class="card m-b-5">
                          <div class="card-body">
                              <div class="profilebox pt-4 text-center">
                                <ul class="list-inline">
                                    <div class="col-md-12">
                                        <li class="list-inline-item">
                                            <input name="photo" type="file" id="imgupload" style="display:none" />
                                            <img @error('photo') is-invalid @enderror
                                                src="{{ url('/assets/images/users/profile.svg') }}" alt="profilephoto"
                                                class="profilechoose ">
                                        </li>
                                </ul>
                                @error('photo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <br> -->
              <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title mb-0">{{ __("Personal Informations") }}</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group{{ $errors->has('trainer_name') ? ' has-error' : '' }}">
                                        <label class="text-dark" for="users id">{{ __("Choose a trainer") }} <span
                                                class="text-danger">*</span></label>
                                        <select data-placeholder="{{ __("Please select user") }}" class="form-control select2"
                                            name="trainer_name">
                                            <option value="">{{ __("Select one") }}</option>
                                            @foreach($users as $user)
            
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                        <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> {{ __("Select the user : Admin , Mr.x") }}</small>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group">

                                        <label class="text-dark">{{ __("Email:") }} <span class="text-danger">*</span></label>
                                        <input value="{{ old('email') }}" autofocus="" type="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            placeholder="{{ __("Enter Your Email" ) }}"name="email" required="">
                                            @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>
                                           {{ __(" Enter your email") }}
                                        </small>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label class="text-dark">{{ __("Mobile Number:") }} <span
                                                class="text-danger">*</span></label>
                                        <input value="{{ old('phone') }}" autofocus="" type="tel" pattern="[0-9]{10}"
                                            class="form-control @error('phone') is-invalid @enderror"
                                            placeholder="{{ __("Enter your mobile number") }}" name="phone" required="">
                                            @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>
                                          {{ __("  Enter your mobile no.") }}
                                        </small>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                         <label class="text-dark">{{ __("Date of Birth:") }}</label>
                                        <div class="input-group">
                                            <input value="{{ old('dob') }}" name="dob" type="text" id="datepicker"
                                                class="datepicker-here form-control" placeholder="{{ __("dd/mm/yyyy") }}"
                                                aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2"><i
                                                        class="feather icon-calendar"></i></span>
                                            </div>
                                        </div>
                                        @error('dob')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>
                                           {{ __(" Enter your  Date of Birth") }}
                                        </small>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label class="text-dark" for="address">{{ __("Address:") }} <span
                                                class="text-danger">*</span></label>
                                        <textarea required="" class="@error('line1') is-invalid @enderror form-control"
                                            id="line1" name="address"
                                            placeholder="{{ __("Enter Address") }}">{{ old('address') }}</textarea>
                                        @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>
                                            {{ __("Enter your addresss") }}
                                        </small>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <label class="text-dark" for="address">{{ __("Pincode:") }} <span
                                            class="text-danger">*</span></label>
                                    <input value="{{ old('pincode') }}" required="" type="text" pattern="[0-9]+"
                                        placeholder="{{ __("Enter pincode") }}" name="pincode" class="form-control">
                                    @error('pincode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> {{ __("Enter   your City Pincodes") }}
                                    </small>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label class="text-dark" for="address">{{ __("Select Country:") }} <span
                                                class="text-danger">*</span></label>
                                        <select data-placeholder="{{ __("Please select country" ) }}"required="" name="country_id"
                                            id="country_id"
                                            class="country @error('country_id') is-invalid @enderror select2">
                                            <option value="">{{ __("Select country") }}</option>
                                            @foreach ($countries as $country)
                                            <option value="{{ $country->id }}"> {{ $country->nicename }} </option>
                                            @endforeach
                                        </select>
                                        @error('country_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                         <div class="invalid-feedback">
                                            {{ __('Please select country') }}
                                        </div>
                                        <small class="text-muted text-info"><i class="text-dark feather icon-help-circle"></i> {{ __("Enter your Country") }}
                                        </small>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label class="text-dark" for="address">{{ __("Select State:") }} <span
                                                class="text-danger">*</span></label>
                                        <select data-placeholder="{{ __("Please select state") }}" required="" name="state_id"
                                            id="state_id"
                                            class="states @error('state_id') is-invalid @enderror select2">
                                            <option value="">{{ __("Select states") }}</option>

                                        </select>
                                        @error('state_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                        <div class="invalid-feedback">
                                            {{ __('Please select state') }}
                                        </div>
                                        <small class="text-muted text-info"><i class="text-dark feather icon-help-circle"></i> {{ __("Enter your State") }}
                                        </small>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label class="text-dark" for="address">{{ __("Select City:") }} <span
                                                class="text-danger">*</span></label>
                                        <select data-placeholder="{{ __("Please select city") }}" required="" name="city_id"
                                            id="city_id" class="cities @error('city_id') is-invalid @enderror select2">
                                            <option value="">{{ __("Select citys") }}</option>
                                        </select>
                                        @error('city_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <div class="invalid-feedback">
                                            {{ __('Please select city') }}
                                        </div>
                                        <small class="text-muted text-info"> <i
                                                class="text-dark feather icon-help-circle"></i> {{ __("Enter your City") }}
                                        </small>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label class="text-dark">{{ __("Trainer Qualification:") }} <span
                                                class="text-danger">*</span></label>
                                        <input value="{{ old('phone') }}" type="text"
                                            class="form-control @error('phone') is-invalid @enderror"
                                            placeholder="{{ __("Enter your Qualification ") }}" name="qualification"
                                            required="">

                                        @error('qualification')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <small class="text-muted text-info"> <i
                                                class="text-dark feather icon-help-circle"></i> {{ __("Enter your Qualification details") }}
                                        </small>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label class="text-dark">{{ __("Enter Trainer Experience (In Years):") }} <span
                                                class="text-danger">*</span></label>
                                        <input value="{{ old('experience') }}" autofocus="" type="text"
                                            pattern="[0-9]+"
                                            class="form-control @error('experience') is-invalid @enderror"
                                            placeholder="{{ __("Enter Your Trainer Experience") }}"" name="experience"
                                            required="">

                                        @error('experience')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <small class="text-muted text-info"> <i
                                                class="text-dark feather icon-help-circle"></i> {{ __("Enter your Experiences") }}
                                        </small>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label class="text-dark">{{ __("Trainer client Limit:") }} <span
                                                class="text-danger">*</span></label>
                                        <input value="{{ old('trainer_limit') }}"
                                            class="form-control @error('trainer_limit') is-invalid @enderror"
                                            placeholder="{{ __("Enter the Trainer Client limit ") }}" name="trainer_limit"
                                            type="number" required="">

                                        @error('trainer_limit')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <small class="text-muted text-info"> <i
                                                class="text-dark feather icon-help-circle"></i> {{ __("Enter your Trainer Client limit") }}
                                        </small>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group">

                                        <label class="text-dark">{{ __("Enter Trainer Type:") }} <span
                                                class="text-danger">*</span></label>
                                        <select required="" name="type" id="type" class="form-control select2">
                                            <option value="Trainer type not set">{{ __("Select Trainer Type") }}</option>
                                            <option value="Not a Personal Trainer">{{ __("Not a Personal Trainer") }}
                                            </option>
                                            <option value="Home Personal Trainer">{{ __("Home Personal Trainer") }}</option>
                                            <option value="Online Personal Trainer">{{ __("Online Personal Trainer") }}
                                            </option>
                                            <option value="Home Online Personal Trainer">{{ __("Home Online Personal") }}
                                                {{ __(" Trainer") }}</option>
                                            <option value="Gym Personal Trainer">{{ __("Gym Personal Trainer") }}</option>

                                        </select>
                                            @error('type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <small class="text-muted text-info" name="type"> <i
                                                class="text-dark feather icon-help-circle"></i> {{ __("Enter your Trainer Type") }}
                                        </small>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label class="text-dark">{{ __("Trainer Specialization:") }} <span
                                                class="text-danger">*</span></label>
                                        <input value="{{ old('specialization') }}" autofocus="" type="text"
                                            class="form-control @error('specialization') is-invalid @enderror"
                                            placeholder="{{ __("Enter Your Trainer Specialization") }}" name="specialization"
                                            required="">

                                        @error('specialization')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <small class="text-muted text-info"> <i
                                                class="text-dark feather icon-help-circle"></i> {{ __("Enter your Specialization") }}
                                        </small>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <label class="text-dark">{{ __("Select Image:") }} <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                        </div>
                                        <div class="custom-file">
                                            <input name="photo" type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>
                                    </div>
                                    @if(isset($trainer->photo))
                                        <img src="{{ url('/assets/images/users/' .$trainer->photo) }}"
                                        class="img-fluid ">
                                    @endif
                                    <small class="text-muted text-info"> <i
                                        class="text-dark feather icon-help-circle"></i> {{ __("Please select your image") }}
                                    </small>
                                        
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group{{ $errors->has('rating') ? ' has-error' : '' }}">
                                        {!! Form::label('rating') !!} -<span class="text-danger">*</span>
                                        
                                        <div class="col-md-12">
                                            <div class="rating">
                                                <label>
                                                    <input type="radio" name="rating" value="1" />
                                                    <span class="icon"><i class="fa fa-star"
                                                                aria-hidden="true"></i></span>
                                                </label>
                                                <label>
                                                    <input type="radio" name="rating" value="2" />
                                                    <span class="icon"><i class="fa fa-star"
                                                            aria-hidden="true"></i></span>
                                                    <span class="icon"><i class="fa fa-star"
                                                            aria-hidden="true"></i></span>
                                                </label>
                                                <label>
                                                    <input type="radio" name="rating" value="3" />
                                                    <span class="icon"><i class="fa fa-star"
                                                            aria-hidden="true"></i></span>
                                                    <span class="icon"><i class="fa fa-star"
                                                            aria-hidden="true"></i></span>
                                                    <span class="icon"><i class="fa fa-star"
                                                                aria-hidden="true"></i></span>
                                                </label>
                                                <label>
                                                    <input type="radio" name="rating" value="4" />
                                                    <span class="icon"><i class="fa fa-star"
                                                                aria-hidden="true"></i></span>
                                                    <span class="icon"><i class="fa fa-star"
                                                                aria-hidden="true"></i></span>
                                                    <span class="icon"><i class="fa fa-star"
                                                                aria-hidden="true"></i></span>
                                                    <span class="icon"><i class="fa fa-star"
                                                                aria-hidden="true"></i></span>
                                                </label>
                                                <label>
                                                    <input type="radio" name="rating" value="5" />
                                                    <span class="icon"><i class="fa fa-star"
                                                            aria-hidden="true"></i></span>
                                                    <span class="icon"><i class="fa fa-star"
                                                            aria-hidden="true"></i></span>
                                                    <span class="icon"><i class="fa fa-star"
                                                            aria-hidden="true"></i></span>
                                                    <span class="icon"><i class="fa fa-star"
                                                            aria-hidden="true"></i></span>
                                                    <span class="icon"><i class="fa fa-star"
                                                                aria-hidden="true"></i></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <div class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }} switch-main-block">
                                            <div class="custom-switch">
                                                {!! Form::checkbox('is_active', 1,1, ['id' => 'switch1',
                                                'class' =>
                                                'custom-control-input']) !!}
                                                <label class="custom-control-label"
                                                    for="switch1"><span>{{ __("Status") }}</span></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <button type="reset" class="btn btn-danger"><i class="fa fa-ban"></i> {{ __("Reset") }}</button>
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>
                                            {{ __("Create") }}</button>
                                    </div>
                                </div>
                            </div>
                            <div class="clear-both"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- End form -->
    @endsection
    @section('script')
    <script>
        $('.profilechoose').click(function () {
            $('#imgupload').trigger('click');
        });
        $("#imgupload").on('change', function () {
            readURL1(this);
        });

        function readURL1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('.profilechoose').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        var stateurl = @json(route('list.state'));
        var cityurl = @json(route('list.cities'));
    </script>
    @endsection
