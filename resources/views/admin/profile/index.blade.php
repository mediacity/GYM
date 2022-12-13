@extends('layouts.master')
@section('title',__('Edit new user'))
<!-- Start Breadcrumbbar -->                    
@section('breadcum')
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">{{ config('app.name') }}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ __('Edit Profile') }}
                    </li>
                </ol>
            </div>
        </div>
         <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a title="Back" href="{{ route('users.index') }}" class="btn btn-primary-rgba"><i
                        class="feather icon-arrow-left mr-2"></i>{{ __("Back") }} </a>
            </div>
        </div>

    </div>
</div>
@endsection
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
@section('maincontent')
<form action="{{ route('profile.update', $user['uuid']) }}" class="form" method="POST" novalidate
    enctype="multipart/form-data">
     @csrf
     @method('PUT')
    <div class="tab-pane fade active show" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title mb-0">{{ __("My Profile") }}</h5>
            </div>
            <div class="card-body">
                <div class="profilebox pt-4 text-center">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <input name="photo" type="file" id="imgupload" style="display:none" />
                            @if($image = @file_get_contents('../public/media/users/'.$user->photo))
                            <img @error('photo') is-invalid @enderror src="{{ url('media/users/'.$user->photo) }}"
                                alt="profilephoto" class="profilechoose img-thumbnail rounded img-fluid">
                            @else
                            @if(isset($user->user))
                            <img @error('photo') is-invalid @enderror
                                src="{{ Avatar::create($user->user['name'])->toBase64() }}" alt="profilephoto"
                                class="profilechoose img-thumbnail rounded img-fluid">
                            @endif
                            @endif
                            @error('photo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title mb-0">{{ __("Edit Your Profile") }}</h5>
            </div>
            <div class="card-body">
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="username">{{ __("Username") }}</label>
                            <input type="text" class="form-control" name="name" id="username"
                                value="{{ Auth::user()->name }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="useremail">{{ __("Email") }}</label>
                            <input type="email" class="form-control" name="email" id="useremail"
                                value="{{ Auth::user()->email }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="usermobile">{{ __("Mobile Number") }}</label>
                            <input type="text" class="form-control" id="usermobile" value="{{Auth::user()->mobile}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="userbirthdate">{{ __("Date of Birth") }}</label>
                            <input type="date" class="form-control" id="userbirthdate" value="{{Auth::user()->dob}}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label class="text-dark" for="address">{{ __("Address Line 1:") }} <span
                                    class="text-danger">*</span></label>
                            <textarea required="" class="@error('line1') is-invalid @enderror form-control" id="line1"
                                name="line1">{{ $user['line1'] }}</textarea>
                            @error('line1')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label class="text-dark" for="address">{{ __("Address Line 2:") }}</label>
                            <textarea class="form-control" id="line2" name="line2">{{ $user['line2'] }}</textarea>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="text-dark" for="address">Pincode: <span class="text-danger">*</span></label>
                            <input value="{{ $user['pincode'] }}" required="" type="text" pattern="[0-9]+"
                                placeholder="{{ __("enter pincode") }}" name="pincode" class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="text-dark" for="address">{{ __("Select Country: ") }}<span
                                        class="text-danger">*</span></label>
                                <select data-placeholder="{{ __("Please select country") }}" required="" name="country_id"
                                    id="country_id" class="country @error('country_id') is-invalid @enderror select2">
                                    <option value="">{{ __("Select country") }}</option>
                                    @foreach ($countries as $country)
                                    <option
                                        {{ $user->country_id != '' && $user->country_id == $country->id ? "selected" : "" }}
                                        value="{{ $country->id }}"> {{ $country->nicename }} </option>
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
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="text-dark" for="address">{{ __("Select State: ") }}<span
                                        class="text-danger">*</span></label>
                                <select data-placeholder="{{ __("Please select state") }}" required="" name="state_id" id="state_id"
                                    class="states @error('state_id') is-invalid @enderror select2">
                                    <option value="">{{ __("Select state") }}</option>
                                    @if(isset($user->country->states))
                                    @foreach ($user->country->states as $state)
                                    <option {{ $user->state_id == $state->id ? "selected" : "" }}
                                        value="{{ $state->id }}">{{ $state->name }}</option>
                                    @endforeach
                                    @endif

                                </select>
                                @error('state_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                                <div class="invalid-feedback">
                                    {{ __('Please select state') }}
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="text-dark" for="address">{{ __("Select City: ") }}<span
                                        class="text-danger">*</span></label>
                                <select data-placeholder="{{ __("Please select city") }}" required="" name="city_id" id="city_id"
                                    class="cities @error('city_id') is-invalid @enderror select2">
                                    <option value="">{{ __("Select city") }}</option>
                                    @foreach ($user->state->cities as $city)
                                    <option {{ $user->city_id == $city->id ? "selected" : "" }} value="{{ $city->id }}">
                                        {{ $city->name }}</option>
                                    @endforeach
                                </select>
                                @error('city_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <div class="invalid-feedback">
                                    {{ __('Please select city') }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <label class="text-dark">{{ __("Designation:") }}</label>
                            <input value="{{ $user['name'] }}" type="text" class="form-control"
                                placeholder="{{ __("enter designation of user") }}">

                        </div>
                         <div class="form-group col-md-6">
                                 <label class="text-dark" for="address">{{ __("Gender:") }}</label>
                            <select name="gender" id="gender" class="form-control" value="{{ Auth::user()->gender }}">
                                <option {{ $user->gender=='m' ? "selected" : "" }} value="m">{{ __("Male") }}</option>
                                <option {{ $user->gender=='f' ? "selected" : "" }} value="f">{{ __("Female") }}</option>
                                <option {{ $user->gender=='o' ? "selected" : "" }} value="o">{{ __("Other") }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <div class="update-password custom-switch">
                            <input type="checkbox" id="myCheck" name="update_pass" class="custom-control-input"
                         value="1" onclick="myFunction()">
                            <label class="custom-control-label" for="myCheck"> {{ __('UpdatePassword') }}:</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div style="display: none" id="update-password">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{ __('Password') }}</label>
                                        <input type="password" name="password" id="password" class="form-control"
                                            placeholder="{{ __("Please Enter Password") }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{ __('ConfirmPassword') }}</label>
                                        <input type="password" name="password_confirmation" id="re-password"
                                            class="form-control" placeholder="{{ __("Please Enter Confirm Password") }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary-rgba font-16"><i
                            class="feather icon-save mr-2"></i>{{ __("Update") }}</button>
                </form>
            </div>
        </div>
    </div>
</form>
<br>
@endsection
<!-- End Contentbar -->
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

<script>
    (function ($) {
        "use strict";
        $(function () {
            $('#myCheck').change(function () {
                if ($('#myCheck').is(':checked')) {
                    $('#update-password').show('fast');
                } else {
                    $('#update-password').hide('fast');
                }
            });

        });
    })(jQuery);
</script>

@endsection