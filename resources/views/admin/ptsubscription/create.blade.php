@extends('layouts.master')
@section('title',__('Add PT'))
@section('maincontent')
<!-- Start Breadcrumbbar -->
@component('components.breadcumb',['thirdactive' => 'active'])
@slot('heading')
{{ __('PT') }}
@endslot
@slot('menu1')
{{ __('PT') }}
@endslot
@slot('menu2')
{{ __('Add PT') }}
@endslot
@slot('button')
<div class="col-md-6 col-lg-6">
    <a href="{{route('ptsubscription.index')}}" class="float-right btn btn-primary-rgba mr-2"><i
            class="feather icon-arrow-left mr-2"></i>{{ __("Back") }}</a>
</div>
@endslot
@endcomponent
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
<form autocomplete="on" class="form-light form" novalidate action="{{route('ptsubscription.store')}}" method="POST">
    {{ csrf_field() }}
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="card m-b-3">
                    <div class="card-body">
                        <h3>{{ __("Personal details") }}</h3>
                        <div class="form-group{{ $errors->has('user id') ? ' has-error' : '' }}">
                            <label class="text-dark" for="users id">{{ __("Choose a user") }} <span
                                    class="text-danger">*</span></label>
                            <select data-placeholder="{{ __("Please select user") }}" class="form-control select2" name="user_id">
                                <option value="">{{ __("Select one") }}</option>
                                @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                            <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>
                                {{ __("Select the user : Admin , Mr.x") }}</small>
                        </div>
                        <div class="form-group">
                            <label class="text-dark">{{ __("Email:") }} <span class="text-danger">*</span></label>
                            <input value="{{ old('email') }}" type="email"
                                class="form-control @error('email') is-invalid @enderror" placeholder="{{ __("Your Email") }}"
                                name="email" required="">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>
                                {{ __("Enter your valid email") }}</small>
                        </div>
                        <div class="form-group">
                            <label class="text-dark">{{ __("Mobile Number: ") }}<span class="text-danger">*</span></label>

                            <input value="{{ old('mobile') }}" type="tel" pattern="[0-9]{10}"
                                class="form-control @error('mobile') is-invalid @enderror"
                                placeholder="{{ __("Your current Mobile Number") }}" name="mobile" required="">
                            @error('mobile')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>
                                {{ __("Enter your mobile number") }}</small>
                        </div>
                        <div class="form-group">
                            <label class="text-dark">{{ __("Emergency Contact:") }}
                            </label>
                            <input value="{{ old('phone') }}" type="text"
                                class="form-control @error('phone') is-invalid @enderror"
                                placeholder="{{ __("Your Alternate Mobile Number") }}" name="phone">
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>
                                {{ __("Enter  your alternate mobile number") }}</small>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-10">
                                    <label class="text-dark">{{ __("Occupation:") }} <span class="text-danger">*</span></label>
                                     <select autofocus="" class="form-control select2" name="occupation_id">
                                        <option value="">{{ __("Select Occupation") }}</option>
                                        @foreach($occupations as $occupation)
                                        <option value="{{ $occupation->id }}">{{ $occupation->occupation }}</option>
                                        @endforeach
                                    </select>

                                    @error('occupation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <small class="text-muted text-info"> <i
                                            class="text-dark feather icon-help-circle"></i>{{ __(" Select occupation eg:dentist,bussinessman ") }}</small>
                                </div>
                                <div class="mt-4 col-md-2">
                                    <button class="btn btn-sm btn-primary" data-toggle="modal"
                                        data-target="#exampleModall" style="position: relative; top:12px;">
                                        +
                                    </button>
                                </div>
                            </div>
                        </div>
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
                        </div>
                        <div class="form-group">
                            <label class="text-dark" for="address">{{ __("Gender:") }}</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="m">{{ __("Male") }}</option>
                                <option value="f">{{ __("Female") }}</option>
                                <option value="o">{{ __("Other") }}</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label class="text-dark" for="address">{{ __("Address Line 1:") }} <span
                                    class="text-danger">*</span></label>
                            <textarea required="" class="@error('line1') is-invalid @enderror form-control" id="line1"
                                name="line1" placeholder="{{ __("Enter Your Address here") }}">{{ old('line1') }}</textarea>
                            @error('line1')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="text-dark">{{ __("Favourite Music:") }} <span class="text-danger">*</span></label>
                            <input value="{{ old('favourite_music') }}" type="text"
                                class="form-control @error('favourite_music') is-invalid @enderror"
                                placeholder="{{ __("Your Favourite Music") }}" name="favourite_music" required="">
                            @error('favourite_music')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>
                               {{ _(" Enter your Favourite Music..") }}}</small>
                        </div>
                        <div class="form-group">
                            <label class="text-dark">{{ __("Favourite Snack:") }} <span class="text-danger">*</span></label>
                            <input value="{{ old('favourite_snack') }}" type="text"
                                class="form-control @error('favourite_snack') is-invalid @enderror"
                                placeholder="{{ __("Your Favourite Snack") }}" name="favourite_snack" required="">
                            @error('favourite_snack')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>
                               {{ __(" Enter  your Favourite Snack..") }}</small>
                        </div>
                    </div>
                </div>
                <div class="card m-b-3">
                    <div class="card-body">
                        <h3>{{ __("Smoking") }}</h3>

                        <div class="form-group">
                            <label class="text-dark">{{ __("Do You Smoke? ") }}<span class="text-danger">*</span></label><br>
                            <label class="switch"><input type="checkbox" id="togBtn" name="smoke">
                                <div class="slider round">
                                    <span class="on">{{ __("Yes") }}</span><span class="off">{{ __("No") }}</span>
                                </div>
                            </label>
                            @error('smoke')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="text-dark">{{ __("Have You Ever Smoked? ") }}<span
                                    class="text-danger">*</span></label><br>
                            <label class="switch"><input type="checkbox" id="togBtn" name="smoke_future">
                                <div class="slider round">
                                    <span class="on">{{ __("Yes") }}</span><span class="off">{{ __("No") }}</span>
                                </div>
                            </label>
                            @error('smoke_future')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="text-dark">{{ __("If You Stopped Smoking,how long ago did you stop?:") }} <span
                                    class="text-danger">*</span></label>
                            <input value="{{ old('smoke_stop') }}" type="text"
                                class="form-control @error('smoke_stop') is-invalid @enderror"
                                placeholder="{{ __("Your Favourite Snack") }}" name="smoke_stop" required="">
                            @error('smoke_stop')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card m-b-3">
                    <div class="card-body">
                        <h3>{{ __("Commitment") }}</h3>
                        <div class="form-group{{ $errors->has('acheive_goals') ? ' has-error' : '' }}">
                            <label class=" text-dark" for="cars">{{ __("How important to you is it that you acheive the goals above?") }}<span class="text-danger" class="text-dark">*</span></label>
                            <select data-placeholder="{{ __("Please select") }}" class="form-control select2" name="acheive_goals">
                                <option selected>{{ __("Please select") }}</option>

                                <option value="not very">{{ __("Not Very") }}</option>
                                <option value="somewhat">{{ __("Somewhat") }}</option>
                                <option value="very">{{ __("Very") }} </option>
                                <option value="extermly">{{ __("Extermly") }}</option>


                            </select>
                            <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> {{ __("Select option") }}
                            </small>
                        </div>
                        <div class="form-group{{ $errors->has('willing_work') ? ' has-error' : '' }}">
                            <label class=" text-dark" for="cars">{{ __("What areas are you willing to work on to acheive these goal(s)?") }}<span class="text-danger" class="text-dark">*</span></label>
                            <select data-placeholder="{{ __("Please select") }}" class="form-control select2" name="willing_work">
                                <option selected>{{ __("Please select") }}</option>

                                <option value="exercise">{{ __("Exercise") }}</option>
                                <option value="nutrition">{{ __("Nutrition") }}</option>
                                <option value="stress/mood">{{ __("Stress/Mood") }}</option>
                            </select>
                            <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> {{ __("Select option") }}
                            </small>
                        </div>
                    </div>
                </div>
                <div class="card m-b-3">
                    <div class="card-body">
                        <h3>Motivation</h3>
                        <div class="form-group{{ $errors->has('motivation') ? ' has-error' : '' }}">
                            <label class=" text-dark" for="cars">{{ __("In Your experience which phrase best describes your motivation levels?") }}<span class="text-danger" class="text-dark">*</span></label>
                            <select data-placeholder="{{ __("Please select" ) }}class="form-control select2" name="motivation">
                                <option selected>{{ __("Please select") }}</option>

                                <option value="not very">{{ __("I am Self Motivated") }}</option>
                                <option value="somewhat">{{ __("I find exercise easier to stick to if i have a partner") }}</option>
                                <option value="very">{{ __("I find exercise easier with regular appointments") }}</option>
                                <option value="very">{{ __("I usually experience some problems staying motivated") }}</option>
                            </select>
                            <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i>{{ __(" Select option") }}
                            </small>
                        </div>
                    </div>
                </div>
                <div class="card m-b-3">
                    <div class="card-body">
                        <h3>{{ __("Support") }}</h3>
                        <h6>{{ __("From the following list who is supportive of you achieving your goals?") }}</h6>
                        <div class="form-group">
                            <label class="text-dark">{{ __("Family") }}<span class="text-danger">*</span></label><br>
                            <label class="switch"><input type="checkbox" id="togBtn" name="family">
                                <div class="slider round">
                                    <span class="on">{{ __("Yes") }}</span><span class="off">{{ __("No") }}</span>
                                </div>
                            </label>
                            @error('family')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="text-dark">{{ __("Friends") }}<span class="text-danger">*</span></label><br>
                            <label class="switch"><input type="checkbox" id="togBtn" name="friends">
                                <div class="slider round">
                                    <span class="on">{{ __("Yes") }}</span><span class="off">{{ __("No") }}</span>
                                </div>
                            </label>
                            @error('friends')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="text-dark">{{ __("Work Colleagues") }}<span class="text-danger">*</span></label><br>
                            <label class="switch"><input type="checkbox" id="togBtn" name="work">
                                <div class="slider round">
                                    <span class="on">{{ __("Yes") }}</span><span class="off">{{ __("No") }}</span>
                                </div>
                            </label>
                            @error('work')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="text-dark">{{ __("What are you expecting from your personal trainer?") }}<span
                                    class="text-danger">*</span></label>
                            <input value="{{ old('personal_trainer') }}" type="text"
                                class="form-control @error('personal_trainer') is-invalid @enderror"
                                placeholder="{{ __("Describe") }}" name="personal_trainer" required="">
                            @error('personal_trainer')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card m-b-3">
                    <div class="card-body">
                        <h3>
                            {{ __("Exercise Preferences") }}
                        </h3>
                        <h6>{{ __("1-If You are currently exercising") }}</h6>
                        <div class="form-group">
                            <label class="text-dark">{{ __("What activities are you doing?") }}<span
                                    class="text-danger">*</span></label>
                            <input value="{{ old('activities') }}" type="text"
                                class="form-control @error('activities') is-invalid @enderror" placeholder="{{ __("Describe") }}"
                                name="activities" required="">
                            @error('activities')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="text-dark">{{ __("What do you like about them?") }}<span
                                    class="text-danger">*</span></label>
                            <input value="{{ old('do_like') }}" type="text"
                                class="form-control @error('do_like') is-invalid @enderror"
                                placeholder="{{ __("Like About them") }}" name="do_like" required="">
                            @error('do_like')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="text-dark">{{ __("Is there anything you don't like about them?") }}<span
                                    class="text-danger">*</span></label>
                            <input value="{{ old('dont_like') }}" type="text"
                                class="form-control @error('dont_like') is-invalid @enderror"
                                placeholder="{{ __("Not Like About them") }}" name="dont_like" required="">@error('dont_like')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <h6>{{ __("2-If You have previously exercised?") }}</h6>
                        <div class="form-group">
                            <label class="text-dark">{{ __("What activities did you do?") }}<span
                                    class="text-danger">*</span></label>
                            <input value="{{ old('previously_activities') }}" type="text"
                                class="form-control @error('previously_activities') is-invalid @enderror"
                                placeholder="{{ __("Activities" ) }}" name="previously_activities" required="">
                            @error('previously_activities')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="text-dark">{{ __("What do you like about them?") }}<span
                                    class="text-danger">*</span></label>
                            <input value="{{ old('dolike') }}" type="text"
                                class="form-control @error('dolike') is-invalid @enderror" placeholder="{{ __("Like About them") }}"
                                name="dolike" required="">
                            @error('dolike')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="text-dark">{{ __("Is there anything you don't like about them?") }}<span
                                    class="text-danger">*</span></label>
                            <input value="{{ old('dontlike') }}" type="text"
                                class="form-control @error('dontlike') is-invalid @enderror"
                                placeholder="{{ __(" Not Like About them" ) }}" name="dontlike" required="">
                            @error('dontlike')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <h6>{{ __("3-For your exercise in the future.") }}</h6>
                        <div class="form-group">
                            <label class="text-dark">{{ __("If you have trained with weights before,what exercises did you like?") }}<span class="text-danger">*</span></label>
                            <input value="{{ old('dontlike') }}" type="text"
                                class="form-control @error('dontlike') is-invalid @enderror"
                                placeholder="{{ __(" Not Like About them") }}" name="dontlike" required="">
                            @error('dontlike')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <h6>{{ __("If you have exercised on the cardio machines before rating these machines(1-5) from favourite to atleast favourite") }}</h6>
                        <div class="form-group{{ $errors->has('cycle_rating') ? ' has-error' : '' }}">
                            {!! Form::label('Cycle') !!} -<span class="text-danger">*</span>
                             <div class="rating">
                                <label>
                                    <input type="radio" name="cycle_rating" value="1" />
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                </label>
                                <label>
                                    <input type="radio" name="cycle_rating" value="2" />
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                </label>
                                <label>
                                    <input type="radio" name="cycle_rating" value="3" />
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                </label>
                                <label>
                                    <input type="radio" name="cycle_rating" value="4" />
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                </label>
                                <label>
                                    <input type="radio" name="cycle_rating" value="5" />
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                </label>
                            </div>

                        </div>
                        <div class="form-group{{ $errors->has('trainer_rating') ? ' has-error' : '' }}">
                            {!! Form::label('Cross trainer') !!} -<span class="text-danger">*</span>


                            <div class="rating">
                                <label>
                                    <input type="radio" name="trainer_rating" value="1" />
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                </label>
                                <label>
                                    <input type="radio" name="trainer_rating" value="2" />
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                </label>
                                <label>
                                    <input type="radio" name="trainer_rating" value="3" />
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                </label>
                                <label>
                                    <input type="radio" name="trainer_rating" value="4" />
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                </label>
                                <label>
                                    <input type="radio" name="trainer_rating" value="5" />
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                </label>
                            </div>

                        </div>
                        <div class="form-group{{ $errors->has('tread_rating') ? ' has-error' : '' }}">
                            {!! Form::label('Tread Mill') !!} -<span class="text-danger">*</span>


                            <div class="rating">
                                <label>
                                    <input type="radio" name="tread_rating" value="1" />
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                </label>
                                <label>
                                    <input type="radio" name="tread_rating" value="2" />
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                </label>
                                <label>
                                    <input type="radio" name="tread_rating" value="3" />
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                </label>
                                <label>
                                    <input type="radio" name="tread_rating" value="4" />
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                </label>
                                <label>
                                    <input type="radio" name="tread_rating" value="5" />
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                </label>
                            </div>

                        </div>
                        <div class="form-group{{ $errors->has('stepper_rating') ? ' has-error' : '' }}">
                            {!! Form::label('Stepper') !!} -<span class="text-danger">*</span>


                            <div class="rating">
                                <label>
                                    <input type="radio" name="stepper_rating" value="1" />
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                </label>
                                <label>
                                    <input type="radio" name="stepper_rating" value="2" />
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                </label>
                                <label>
                                    <input type="radio" name="stepper_rating" value="3" />
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                </label>
                                <label>
                                    <input type="radio" name="stepper_rating" value="4" />
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                </label>
                                <label>
                                    <input type="radio" name="stepper_rating" value="5" />
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                </label>
                            </div>

                        </div>
                        <div class="form-group{{ $errors->has('rower_rating') ? ' has-error' : '' }}">
                            {!! Form::label('Rower') !!} -<span class="text-danger">*</span>


                            <div class="rating">
                                <label>
                                    <input type="radio" name="rower_rating" value="1" />
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                </label>
                                <label>
                                    <input type="radio" name="rower_rating" value="2" />
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                </label>
                                <label>
                                    <input type="radio" name="rower_rating" value="3" />
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                </label>
                                <label>
                                    <input type="radio" name="rower_rating" value="4" />
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                </label>
                                <label>
                                    <input type="radio" name="rower_rating" value="5" />
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                    <span class="icon"><i class="fa fa-star" style='color:orange'
                                            aria-hidden="true"></i></span>
                                </label>
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="text-dark">{{ __("On average,how long would you like to exercise for?") }}<span
                                    class="text-danger">*</span></label>
                            <input value="{{ old('exercise_average') }}" type="text"
                                class="form-control @error('exercise_average') is-invalid @enderror"
                                placeholder="{{ __(" Like to exercise for") }}" name="exercise_average" required="">
                            @error('exercise_average')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="text-dark">{{ __("On average,how hard would you like to exercise(on average from 1-10,10 being extremly hard?)") }}<span class="text-danger">*</span></label>
                            <input value="{{ old('extremly_hard') }}" type="text"
                                class="form-control @error('extremly_hard') is-invalid @enderror"
                                name="extremly_hard" required="">
                            @error('extremly_hard')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="text-dark">{{ __("Next to the days in the table on the next page,write the time of day you would to like exercise.") }}<span class="text-danger">*</span></label>
                            <input value="{{ old('next_page') }}" type="text"
                                class="form-control @error('next_page') is-invalid @enderror"
                                placeholder="{{ __(" write the time") }}" name="next_page" required="">
                            @error('next_page')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card m-b-3">
                    <div class="card-body">
                        <h3>{{ __("Personal and or family illness") }}</h3>
                        <div class="form-group">
                            <label class="text-dark" for="issue">{{ __("Health Issue:") }}</label><br>
                            <label for="issue"> <input class="health_check" type="checkbox" id="issue"
                                    name="health_check"> {{ __("Do you have any health issue ?") }}</label><br>
                            <br>
                            <div style="display:none;" id="healthbox" class="col-md-10">
                                <div class="row">
                                    <div class="form-group" style="width:330px; height:60px;">
                                        <select data-placeholder="{{ __("Please select if you have any issue ") }}" name="issue[]"
                                            class="mdb-select md-form form-control select2" id="issue_dropdown"
                                            style="display:none;" multiple>
                                            @if (isset($enquiryhealth))
                                            @foreach($enquiryhealth as $enquiryhealth)
                                            <option value="{{ $enquiryhealth->id }}">{{ $enquiryhealth->issue}}
                                            </option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <button class="btn btn-sm btn-success" data-toggle="modal"
                                        style="margin-left:350px; margin-top:-82px; height:50px;"
                                        data-target="#exampleModalCenter">
                                        +
                                    </button>

                                </div>
                            </div>
                            <small class="text-muted text-info" name="details"> <i
                                    class="text-dark feather icon-help-circle"></i>{{ __(" Enter your health description :For eg: Any health problem like B.P, Sugar etc..") }}
                            </small>
                            @error('issue')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                    </div>
                </div>
                <div class="card m-b-3">
                    <div class="card-body">
                        <h3>Medications</h3>
                        <div class="form-group">
                            <label class="text-dark">{{ __("Do You Take any pills,tablets,medicines or medication?") }} <span
                                    class="text-danger">*</span></label><br>
                            <label class="switch"><input type="checkbox" id="togBtn" name="medicine">
                                <div class="slider round">
                                    <span class="on">{{ __("Yes") }}</span><span class="off">{{ __("No") }}</span>
                                </div>
                            </label>
                            @error('medicine')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="text-dark">{{ __("If Yes Please Describe") }} <span class="text-danger">*</span></label>
                            <input value="{{ old('medicine_describe') }}" type="text"
                                class="form-control @error('medicine_describe') is-invalid @enderror"
                                placeholder="{{ __("Your Favourite Snack") }}" name="medicine_describe" required="">
                            @error('medicine_describe')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card m-b-3">
                    <div class="card-body">
                        <h3>Injury Profile</h3>
                        <div class="form-group{{ $errors->has('injured') ? ' has-error' : '' }}">
                            <label class=" text-dark" for="cars">{{ __("Have you ever injured of anyof the following areas of your  body?") }}<span class="text-danger" class="text-dark">*</span></label>
                            <select data-placeholder="{{ __("Please select") }}" class="form-control select2" name="injured">
                                <option selected>{{ __("Please select") }}</option>

                                <option value="head">{{ __("Head") }}</option>
                                <option value="neck">{{ __("Neck") }}</option>
                                <option value="back">{{ __("Back") }}</option>
                                <option value="torso">{{ __("Torso") }}</option>
                                <option value="shoulders">{{ __("Shoulders") }}</option>
                                <option value="arms">{{ __("Arms") }}</option>
                                <option value="hands/wrist">{{ __("Hands/Wrist") }}</option>
                                <option value="hips">{{ __("Hips") }}</option>
                                <option value="upperlegs">{{ __("Upper Legs") }}</option>
                                <option value="lowerlegs">{{ __("Lower Legs") }}</option>
                                <option value="knees">{{ __("Knees") }}</option>
                                <option value="ankles/feet">{{ __("Ankles/feet") }}</option>
                                <option value="Noinjured">{{ __("No Injured") }}</option>

                            </select>
                            <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> {{ __("Select yes or no.") }}
                            </small>
                        </div>
                        <div class="form-group">
                            <label class="text-dark">{{ __("If there anything else that may affect your exercising?") }} <span
                                    class="text-danger">*</span></label>
                            <input value="{{ old('injured_describe') }}" type="text"
                                class="form-control @error('injured_describe') is-invalid @enderror"
                                placeholder="{{ __("Describe") }}" name="injured_describe" required="">
                            @error('injured_describe')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card m-b-3">
                    <div class="card-body">
                        <h3>Physical Profile</h3>
                        <div class="form-group">
                            <label class="text-dark">{{ __("Weight") }} <span class="text-danger">*</span></label>
                            <input value="{{ old('weight') }}" type="number"
                                class="form-control @error('weight') is-invalid @enderror"
                                placeholder="{{ __("Enter Your weight") }}" name="weight" required="">
                            @error('weight')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="text-dark">{{ __("Pant/Dress size") }} <span class="text-danger">*</span></label>
                            <input value="{{ old('dress_size') }}" type="number"
                                class="form-control @error('dress_size') is-invalid @enderror"
                                placeholder="{{ __("Enter Your Size") }}" name="dress_size" required="">
                            @error('weight')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card m-b-3">
                    <div class="card-body">
                        <h3>{{ __("Goals") }}</h3>
                        <h6>{{ __("Which of the following lifestyle ,health and fitness goals are important to us?") }}</h6>
                        <div class="form-group{{ $errors->has('goal') ? ' has-error' : '' }}">
                            <label class=" text-dark" for="cars">{{ __("I Want to..") }}<span class="text-danger"
                                    class="text-dark">*</span></label>
                            <select data-placeholder="{{ __("Please select") }}" class="form-control select2" name="goal">
                                <option selected>{{ __("Please select") }}</option>

                                <option value="get filter">{{ __("Get Filter") }}</option>
                                <option value="get stronger">{{ __("Get Stronger") }}</option>
                                <option value="build muscle">{{ __("Build Muscle") }}</option>
                                <option value="loss body fat">{{ __("Loss Body Fat") }}</option>


                            </select>
                            <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i>{{ __(" Select option") }}
                            </small>
                        </div>
                        <div class="form-group{{ $errors->has('feel') ? ' has-error' : '' }}">
                            <label class=" text-dark" for="cars">{{ __("I Want to feel..") }}<span class="text-danger"
                                    class="text-dark">*</span></label>
                            <select data-placeholder="{{ __("Please select" ) }}"class="form-control select2" name="feel">
                                <option selected>{{ __("Please select") }}</option>
                                 <option value="more awake">{{ __("More Awake") }}</option>
                                <option value="healthier">{{ __("Healthier") }}</option>
                                <option value="more relaxed">{{ __("More Relaxed") }}</option>
                                <option value="more in control">{{ __("More in Control") }}</option>
                             </select>
                            <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i>{{ __(" Select  option") }}
                            </small>
                        </div>
                        <div class="form-group{{ $errors->has('have') ? ' has-error' : '' }}">
                            <label class=" text-dark" for="cars">{{ __("I Want to have..") }}<span class="text-danger"
                                    class="text-dark">*</span></label>
                            <select data-placeholder="{{ __("Please select") }}" class="form-control select2" name="have">
                                <option selected>{{ __("Please select") }}</option>
                                 <option value="more time">{{ __("More Time") }}</option>
                                <option value="less stress">{{ __("Less Stress") }}</option>
                                <option value="more energy">{{ __("More Energy") }}</option>
                                <option value="more fun">{{ __("More Fun") }}</option>
                             </select>
                            <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> {{ __("Select option") }}
                            </small>
                        </div>
                    </div>
                </div>
     <div class="card m-b-3">
        <div class="card-body">
            <h3>{{ __("PAR-Q Questions") }}</h3>
            <div class="form-group">
                <label class="text-dark">{{ __("Has your doctor ever said that you have a heart condition and that you should only do physical activity recommended by a doctor?") }} <span class="text-danger">*</span></label><br>
                <label class="switch"><input type="checkbox" id="togBtn" name="physical_activity">
                    <div class="slider round">
                        <span class="on">{{ __("Yes") }}</span><span class="off">{{ __("No") }}</span>
                    </div>
                </label>
                @error('physical_activity')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label class="text-dark">{{ __("Do you feel pain in your chest when you do physical activity?") }}<span class="text-danger">*</span></label><br>
                <label class="switch"><input type="checkbox" id="togBtn" name="feel_pain">
                    <div class="slider round">
                        <span class="on">{{ __("Yes") }}</span><span class="off">{{ __("No") }}</span>
                    </div>
                </label>
                @error('feel_pain')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label class="text-dark">{{ __("In the past month, have you had chest pain when you were not doing physical activity?") }}<span class="text-danger">*</span></label><br>
                <label class="switch"><input type="checkbox" id="togBtn" name="chest_pain">
                    <div class="slider round">
                        <span class="on">{{ __("Yes") }}</span><span class="off">{{ __("No") }}</span>
                    </div>
                </label>
                @error('chest_pain')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label class="text-dark">{{ __("Do you lose your balance because of dizziness or do you ever lose consciousness?") }}<span class="text-danger">*</span></label><br>
                <label class="switch"><input type="checkbox" id="togBtn" name="balance">
                    <div class="slider round">
                        <span class="on">{{ __("Yes") }}</span><span class="off">{{ __("No") }}</span>
                    </div>
                </label>
                @error('balance')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label class="text-dark">{{ __("Do you have a bone or joint problem (for example, back, knee, or hip) that could be made worse by achange in your physical activity?") }}<span class="text-danger">*</span></label><br>
                <label class="switch"><input type="checkbox" id="togBtn" name="joint">
                    <div class="slider round">
                        <span class="on">{{ __("Yes") }}</span><span class="off">{{ __("No") }}</span>
                    </div>
                </label>
                @error('joint')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label class="text-dark">{{ __("Is your doctor currently prescribing drugs (for example, water pills) for your blood pressure or heart condition?") }}<span class="text-danger">*</span></label><br>
                <label class="switch"><input type="checkbox" id="togBtn" name="drugs">
                    <div class="slider round">
                        <span class="on">{{ __("Yes") }}</span><span class="off">{{ __("No") }}</span>
                    </div>
                </label>
                @error('drugs')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label class="text-dark">{{ __("Do you know of any other reason why you should not do physical activity?") }}<span class="text-danger">*</span></label><br>
                <label class="switch"><input type="checkbox" id="togBtn" name="reason">
                    <div class="slider round">
                        <span class="on">{{ __("Yes") }}</span><span class="off">{{ __("No") }}</span>
                    </div>
                </label>
                @error('reason')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label class="text-dark">{{ __("Body composition testing: ") }}<span class="text-danger">*</span></label>
                <input value="{{ old('body_composition') }}" type="text"
                    class="form-control @error('body_composition') is-invalid @enderror"
                    placeholder="{{ __("Enter Body composition testing" ) }}" name="body_composition" required="">
                @error('body_composition')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>
            <div class="form-group">
                <label class="text-dark"> {{ __("BMI ( body mass index):") }} <span class="text-danger">*</span></label>
                <input value="{{ old('body_mass') }}" type="text"
                    class="form-control @error('body_mass') is-invalid @enderror" placeholder="{{ __("Enter BMI") }}"
                    name="body_mass" required="">
                @error('body_mass')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>
            <div class="form-group">
                <label class="text-dark">{{ __("Skin fold measurement:") }} <span class="text-danger">*</span></label>
                <input value="{{ old('skin_fold') }}" type="text"
                    class="form-control @error('skin_fold') is-invalid @enderror"
                    placeholder="{{ __("Enter Skin fold measurement") }}" name="skin_fold" required="">
                @error('skin_fold')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>
            <div class="form-group">
                <label class="text-dark">{{ __(". Cardiovascular endurance testing:" )}} <span class="text-danger">*</span></label>
                <input value="{{ old('endurance_testing') }}" type="text"
                    class="form-control @error('endurance_testing') is-invalid @enderror"
                    placeholder="{{ __("Enter Cardiovascular endurance testing")  }}" name="endurance_testing" required="">
                @error('endurance_testing')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>
            <div class="form-group">
                <label class="text-dark">{{ __("Exercise stress:") }} <span class="text-danger">*</span></label>
                <input value="{{ old('exercise_stress') }}" type="text"
                    class="form-control @error('exercise_stress') is-invalid @enderror" placeholder="{{ __("Enter stress") }}"
                    name="exercise_stress" required="">
                @error('exercise_stress')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>
            <div class="form-group">
                <label class="text-dark">{{ __(" Vo2 to Max testing:") }}<span class="text-danger">*</span></label>
                <input value="{{ old('max_testing') }}" type="text"
                    class="form-control @error('max_testing') is-invalid @enderror"name="max_testing" required="">
                @error('max_testing')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>
            <div class="form-group">
                <label class="text-dark">{{ __(" Strength and endurance testing: ") }}<span class="text-danger">*</span></label>
                <input value="{{ old('strength_endurance') }}" type="text"
                    class="form-control @error('strength_endurance') is-invalid @enderror"
                    placeholder="{{( __"Enter Core Strength and endurance testing") }}" name="strength_endurance" required="">
                @error('strength_endurance')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>
            <div class="form-group">
                <label class="text-dark">{{ __(" Core strength and stability test: ") }}<span class="text-danger">*</span></label>
                <input value="{{ old('strength_stability') }}" type="text"
                    class="form-control @error('strength_stability') is-invalid @enderror"
                    placeholder="{{ __("Enter Core Strength and Stability test") }}" name="strength_stability" required="">
                @error('strength_stability')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>
            <div class="form-group">
                <label class="text-dark">{{ __("Core strength and endurance test are valuable:") }} <span
                        class="text-danger">*</span></label>
                <input value="{{ old('strength_valuable') }}" type="text"
                    class="form-control @error('strength_endurance') is-invalid @enderror"
                    placeholder="{{ __("Enter Core Strength" ) }}" name="strength_valuable" required="">
                @error('strength_valuable')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>
            <div class="form-group{{ $errors->has('flexibility_test') ? ' has-error' : '' }}">
                <label class=" text-dark" for="cars">{{ __("Flexibility Test") }}<span class="text-danger"
                        class="text-dark">*</span></label>
                <select data-placeholder="{{ __("Please select") }}" class="form-control select2" name="flexibility_test">
                    <option selected>{{ __("Please select") }}</option>
                    <option value="shoulder flexibility test"> {{ __("Shoulder flexibility test") }}</option>
                    <option value="sit and rich test">{{ __("Sit and reach test") }}</option>
                    <option value="trunk lift test">{{ __("Trunk lift test") }}</option>
                </select>
                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> {{ __("Select option") }}
                </small>
            </div>
            <div class="form-group">
                <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i> {{ __("Reset") }}</button>
                <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                    {{ __("Create") }}</button>
                     <div class="clear-both"></div>
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

    $('.health_check').on('change', function () {
        if ($(this).is(':checked')) {
            $('#healthbox').show('fast');
            $('#issue_dropdown').attr('required', 'required');
        } else {
            $('#healthbox').hide('fast');
            $('#issue_dropdown').removeAttr('required');
        }
    })

    var stateurl = @json(route('list.state'));
    var cityurl = @json(route('list.cities'));
</script>
@endsection
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <form autocomplete="off" class="form-light" action="{{route('enquiryhealth.store')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h1 class="card-title">{{ __('Health Details:') }}</h1>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="text-dark">{{ __("Health Isuue:") }} <span
                                                        class="text-danger">*</span></label>
                                                <input type="text"
                                                    class="form-control @error('issue') is-invalid @enderror"
                                                    placeholder="{{ __("Your Health issue") }}" name="issue" required="">
                                                @error('issue')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                <small class="text-muted"> <i
                                                        class="text-dark feather icon-help-circle"></i> {{ __("Enter your health issue:For eg: BP,Sugar") }}</small>
                                            </div>
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
                                                    {!! Form::checkbox('is_active', 1,1,
                                                    ['id' => 'switch1', 'class' =>
                                                    'custom-control-input'])
                                                    !!}
                                                    <label class="custom-control-label" for="switch1">{{ __("Is Active") }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <button type="reset" class="btn btn-danger"><i class="fa fa-ban"></i> {{ __("Reset") }}</button>
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>
                                        {{ __("Create") }}</button>
                                </div>
                            </div>
                            <div class="clear-both"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModall" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <div class="contentbar">
                    <!-- Start row -->
                    <div class="row">
                        <div class="col-md-12">

                            {!! Form::open(['method' => 'POST', 'route' => 'occupation.store','files' => true , 'class'
                            =>
                            'form-light form' , 'novalidate']) !!}
                            <div class="admin-form">
                                {{ $errors->has('Occupation') ? ' has-error' : '' }}
                                {!! Form::label('occupation', 'Occupation',['class'=>'required']) !!}<span
                                    class="text-danger">*</span>
                                {!! Form::text('occupation', null, ['class' => 'form-control', 'required','placeholder'
                                =>  'Please Enter Occupation']) !!}
                                <small class="text-danger">{{ $errors->first('occupation') }}</small>
                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i>{{ __(" Enter Occupation eg:Electrician,Doctor,Businessman ") }}</small>
                            </div>
                            <br>
                            <div
                                class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }} switch-main-block">
                                <div class="custom-switch">
                                    {!! Form::checkbox('is_active', 1,1, ['id' => 'switch1', 'class'
                                    =>'custom-control-input']) !!}
                                    <label class="custom-control-label" for="switch1">{{ __("Status") }}</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="reset" class="btn btn-danger"><i class="fa fa-ban"></i> {{ __("Reset") }}</button>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>
                                    {{ __("Create") }}</button>
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
