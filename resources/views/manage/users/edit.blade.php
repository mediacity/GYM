@extends('layouts.master')
@section('title',__('Edit User :eid -',['eid' => $user->name]))
@section('breadcum')
<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar breadcrumbbar-one">
    <div class="row align-items-center">
        <div class="col-md-6 col-lg-8">
            <h4 class="page-title">{{ config('app.name') }}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ __('Edit user') }}
                    </li>
                </ol>
            </div>
        </div>

        <div class="col-md-6 col-lg-4">
            <div class="widgetbar">
                <a title="Back" href="{{ route('users.index') }}" class=" text-right btn btn-primary-rgba"><i
                class="feather icon-arrow-left mr-2"></i>{{ __("Back") }} </a>
            </div>
        </div>

    </div>
</div>
@endsection
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
@section('maincontent')
<form autocomplete="off" action="{{ route('users.update', $user['uuid']) }}" class="form" method="POST" novalidate
    enctype="multipart/form-data">

    @csrf

    @method('PUT')

    <div class="row">

        <div class="col-md-12">
            <div class="card">

                <div class="card-header">

                    <h4>
                        @if(!$user->roles)
                        <span class='float-right badge badge-pill badge-secondary'> <i class='feather icon-user-x'></i>
                           {{ __(" No Role assigned !") }}</span>
                        @endif


                        @if(isset($user->roles[0]['name']) && $user->roles[0]['name'] == 'Super Admin')
                        <span class='float-right badge badge-pill badge-danger'> <i class='feather icon-shield'></i>
                            {{ $user->roles[0]['name'] }}</span>
                        @endif


                        @if(isset($user->roles[0]['name']) && $user->roles[0]['name'] == 'Admin'){
                        <span class='float-right badge badge-pill badge-warning'> <i class='feather icon-award'></i>
                            {{ $user->roles[0]['name'] }}</span>
                        @endif

                        @if(isset($user->roles[0]['name']) && $user->roles[0]['name'] == 'Trainer')
                        <span class='float-right badge badge-pill badge-info'> <i
                                class='feather icon-user-check'></i>&nbsp;{{ $user->roles[0]['name'] }}</span>
                        @endif

                        @if(isset($user->roles[0]['name']) && $user->roles[0]['name'] == 'Blocked')
                        <span class='float-right badge badge-pill badge-dark'> <i
                                class='feather  icon-user-x'></i>&nbsp;{{ $user->roles[0]['name'] }}</span>
                        @endif

                        @if(isset($user->roles[0]['name']) && $user->roles[0]['name'] == 'Prescriptionist')
                        <span class='float-right badge badge-pill badge-success'> <i
                                class='feather  icon-gitlab'></i>&nbsp;{{ $user->roles[0]['name'] }}</span>
                        @endif

                        @if(isset($user->roles[0]['name']) && $user->roles[0]['name'] == 'Doctor')
                        <span class='float-right badge badge-pill badge-primary'> <i
                                class='feather icon-heart'></i>&nbsp;{{ $user->roles[0]['name'] }}</span>
                        @endif

                        @if(isset($user->roles[0]['name']) && $user->roles[0]['name'] == 'User')
                        <span class='float-right badge badge-pill badge-primary'> <i
                                class='feather icon-heart'></i>&nbsp;{{ $user->roles[0]['name'] }}</span>
                        @endif

                    </h4>

                    <h4 class="card-title">{{ __('Edit user :') }} {{ $user->name }}</h4>
                  </div>

                <div class="card-body">

                    <div class="row">
                        <div class="col-lg-3 col-md-12">
                            <div class="form-group">
                                <input name="photo" type="file" id="imgupload" class="d-none" />
                                @if($image = @file_get_contents('../public/media/users/'.$user->photo))
                                <img @error('photo') is-invalid @enderror src="{{ url('media/users/'.$user->photo) }}"
                                    alt="profilephoto" class="profilechoose img-thumbnail rounded img-fluid">
                                @else
                                <img @error('photo') is-invalid @enderror
                                    src="{{ Avatar::create($user->name)->toBase64() }}" alt="profilephoto"
                                    class="profilechoose img-thumbnail rounded img-fluid">
                                @endif
                                @error('photo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-9 col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-dark">{{ __("Name: ") }}<span class="text-danger">*</span></label>
                                        <input value="{{ $user['name'] }}" autofocus="" type="text"
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="{{ __("enter name") }}" name="name" required="">

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-dark">{{ __("Email:") }} <span class="text-danger">*</span></label>
                                        <input value="{{ $user['email'] }}" autofocus="" type="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            placeholder="{{ __("enter email") }}" required="">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-dark">{{ __("Mobile:") }}</label>

                                        <input value="{{ $user['mobile'] }}" title="enter valid no." pattern="[0-9]{10}"
                                            type="text" class="form-control" placeholder="{{ __("enter valid mobile no.") }}"
                                            name="mobile" required="">


                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-dark">{{ __("Alternate Mobile No:") }}</label>
                                        <input value="{{  $user['phone'] }}" title="enter valid no." pattern="[0-9]+"
                                            type="text" class="form-control" placeholder="{{ __("Enter alternate mobile no.") }}"
                                            name="phone">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-dark" for="address">{{ __("Gender:") }}</label>

                                        <select name="gender" id="gender" class="form-control" required="">

                                            <option {{ $user->gender =='m' ? "selected" : "" }} value="m">{{ __("Male") }}</option>
                                            <option {{ $user->gender =='f' ? "selected" : "" }} value="f">{{ __("Female") }}
                                            </option>
                                            <option {{ $user->gender =='o' ? "selected" : "" }} value="o">{{ __("Other") }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="text-dark">{{ __("Membership: ") }}<span
                                                class="text-danger">*</span></label><br>
                                        <label class="switch"><input type="checkbox" id="togBtn" name="membership"
                                                {{ $user->membership == 'yes' ? 'checked' : '' }}>
                                            <div class="slider round">

                                                <span class="on"></span><span class="off"></span>

                                            </div>
                                        </label>
                                        @error('membership')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">

                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="text-dark" for="address">{{ __("Address Line 1: ") }}<span
                                        class="text-danger">*</span></label>
                                <textarea required="" class="@error('line1') is-invalid @enderror form-control"
                                    id="line1" name="line1" required="">{{ $user['line1'] }}</textarea>

                                @error('line1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="text-dark" for="address">{{ __("Address Line 2:") }}</label>
                                <textarea class="form-control" id="line2" name="line2">{{ $user['line2'] }}</textarea>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="text-dark" for="address">{{ __("Pincode:") }} <span class="text-danger">*</span></label>

                                <input value="{{ $user['pincode'] }}" required="" type="text" pattern="[0-9]{6}"
                                    placeholder="{{ __("enter pincode") }}" name="pincode" class="form-control">
                            </div>

                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="text-dark" for="address">{{ __("Select Country: ") }}<span
                                        class="text-danger">*</span></label>
                                <select data-placeholder="{{ __("Please select country") }}" required="" name="country_id"
                                    id="country_id" class="country @error('country_id') is-invalid @enderror select2">
                                    <option value="">Select country</option>

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

                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="text-dark" for="address">{{ __("Select State: ") }}<span
                                        class="text-danger">*</span></label>
                                <select data-placeholder="{{ __("Please select state" ) }}" required="" name="state_id" id="state_id"
                                    class="states @error('state_id') is-invalid @enderror select2">
                                    <option value="">Please select state</option>
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

                        <div class="col-lg-4 col-md-6">

                            <div class="form-group">
                                <label class="text-dark" for="address">{{ __("Select City: ") }}<span
                                        class="text-danger">*</span></label>
                                <select data-placeholder="{{ __("Please select city" ) }}" required="" name="city_id" id="city_id"
                                    class="cities @error('city_id') is-invalid @enderror select2">
                                    <option value="">Please select city</option>
                                    @if(isset($user->state->cities))
                                    @foreach ($user->state->cities as $city)
                                    <option {{ $user->city_id == $city->id ? "selected" : "" }} value="{{ $city->id }}">
                                        {{ $city->name }}</option>
                                    @endforeach
                                    @endif
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



                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-dark">{{ __("Date of Birth:") }}</label>
                                <div class="input-group">
                                    <input value="{{$user->dob }}" name="dob" type="text" id="datepicker"
                                        class="datepicker-here form-control" placeholder="{{ __("YYYY/MM/DD") }}"
                                        aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2"><i
                                                class="feather icon-calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-dark">{{ __("Occupation:") }}</label>
                                <input value="{{ $user['name'] }}" type="text" class="form-control"
                                    placeholder="{{ __("enter occupation of user") }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-dark">{{ __("Select Role:") }} <span class="text-danger">*</span></label>
                                <select required="" name="role" id="" class="form-control select2">
                                    <option value="">Choose a role</option>
                                    @if(isset($roles))

                                    @foreach($roles as $key=> $role)
                                    <option
                                        {{ isset($user->roles[0]['id']) && $user->roles[0]['id'] == $role->id ? "selected" : "" }}
                                        value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-dark">{{ __("Demo: ") }}<span class="text-danger">*</span></label><br>
                                <label class="switch"><input type="checkbox" id="togBtn" name="demo"
                                        {{ $user->demo == 'yes' ? 'checked' : '' }}>
                                    <div class="slider round">

                                        <span class="on"></span><span class="off"></span>

                                    </div>
                                </label>
                                @error('demo')
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
                                <label class="text-dark" for="issue">{{ ("Health Issue:") }}}}</label>
                                <br>
                                <label for="issue">
                                    <input {{ ($user->issue != ['NO'] ? "checked" : "") }} class="health_check"
                                        type="checkbox" id="issue" name="health_check"> Do you have any health issue
                                    ?</label>
                                <div style={{ ($user->issue != ['NO'] ? "checked" : "display:none;") }} id="healthbox">
                                    <select data-placeholder="{{ __("Please select if you have any issue ") }}" name="issue[]"
                                        class="mdb-select md-form form-control select2" id="issue_dropdown"
                                        style="display:none;" multiple>

                                        @foreach(App\Enquiryhealth::all() as $issue)

                                        <option @if($user->issue != '') @foreach($user->issue as $health)
                                            {{ $health == $issue->id ? "selected" : "" }} @endforeach @endif
                                            value="{{ $issue->id }}"> {{ $issue['issue'] }} </option>

                                        @endforeach
                                    </select>
                                </div>

                                @error('issue')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <br>
                                <small class="text-muted" name="details"> <i
                                        class="text-dark feather icon-help-circle"></i> {{ __("Enter your health description
                                        :For eg.- any health problem like B.P, Sugar etc..") }}
                                </small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <input type="file" name="file" value="{{ $user->file }}" id="file2"
                                class="{{ $errors->has('file') ? ' is-invalid' : '' }} inputfile inputfile-1" />
                            <label for="file2"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="30"
                                    viewBox="0 0 20 17">
                                    <path
                                        d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                                </svg></label>

                            <span class="text-danger invalid-feedback" role="alert"></span> <br> <small
                                class="text-muted text-info" name="details"> <i
                                    class="text-dark feather icon-help-circle"></i>
                               {{ __(" Upload Document") }}
                            </small></div>
                           </div>
                </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <button type="reset" class="btn btn-danger"><i class="fa fa-ban"></i> {{ __("Reset") }}</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i> {{ __("Update") }}</button>
                    </div>
                </div>
                <div class="clear-both"></div>
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
