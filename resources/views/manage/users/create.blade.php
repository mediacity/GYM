@extends('layouts.master')
@section('title',__('Create a new user'))
@section('breadcum')
<div class="breadcrumbbar breadcrumbbar-one">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">{{ config('app.name') }}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ __('Create user') }}
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
@section('maincontent')
<form action="{{ route('users.store') }}" class="form" method="POST" novalidate enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">

                    <h5 class="card-title">{{ __('Create a new user:') }}</h5>

                </div>

                <div class="card-body">

                    <div class="row">
                        <div class="col-lg-3 col-md-12">
                            <div class="form-group">
                                <input name="photo" type="file" id="imgupload" class="d-none"/>
                                <img @error('photo') is-invalid @enderror src="{{ url('media/images/default.jpg') }}"
                                    alt="profilephoto" class="profilechoose img-thumbnail rounded img-fluid">
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
                                        <label class="text-dark">{{ __("Name:") }} <span class="text-danger">*</span></label>
                                        <input value="{{ old('name') }}" autofocus="" type="text"
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="{{ __("Enter Name") }}" name="name" required="">

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
                                        <input value="{{ old('email') }}" autofocus="" type="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            placeholder="{{ __("Enter Your email" ) }}"required="">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-dark" for="address">{{ __("Password:") }} <span
                                                class="text-danger">*</span></label>
                                        <input minlength="8" name="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" id="password"
                                            placeholder="{{ __("Enter Password here") }}" required>

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-dark" for="address">{{ __("Confirm Password:") }} <span
                                                class="text-danger">*</span></label>
                                        <input minlength="8" type="password" class="form-control" id="re-password"
                                            placeholder="{{ __("Re-Type Password") }}" name="password_confirmation" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-dark">{{ __("Mobile:") }}<span class="text-danger">*</span></label>
                                        <input value="{{ old('mobile') }}" title="enter valid no." pattern="[0-9]{10}"
                                            type="text" class="form-control" placeholder="{{ __("Enter valid mobile no.") }}"
                                            required name="mobile">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-dark">{{ __("Alternate Mobile No:") }}</label>
                                        <input value="{{ old('phone') }}" title="enter valid no." pattern="[0-9]+"
                                            type="text" class="form-control" placeholder="{{ __("Enter alternate mobile no.") }}"
                                            name="phone">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">

                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="text-dark" for="address">{{ __("Address Line 1:") }} <span
                                        class="text-danger">*</span></label>
                                <textarea required="" class="@error('line1') is-invalid @enderror form-control"
                                    id="line1" name="line1"
                                    placeholder="{{ __("Enter Your Address here") }}">{{ old('line1') }}</textarea>
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
                                <textarea class="form-control" id="line2" name="line2">{{ old('line2') }}</textarea>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="text-dark" for="address">{{ __("Pincode:") }} <span class="text-danger">*</span></label>
                                <input value="{{ old('pincode') }}" required="" type="text" pattern="[0-9]+"
                                placeholder={{ __("Enter Pincode") }} name="pincode" class="form-control">
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="text-dark" for="address">{{ __("Select Country:") }} <span
                                        class="text-danger">*</span></label>
                                <select data-placeholder={{ __("Please select country") }} required="" name="country_id"
                                    id="country_id" class="country @error('country_id') is-invalid @enderror select2">
                                    <option value="">Select country</option>
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
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="text-dark" for="address">{{ __("Select State:") }} <span
                                        class="text-danger">*</span></label>
                                <select data-placeholder="{{ __("Please select state") }}" required="" name="state_id" id="state_id"
                                    class="states @error('state_id') is-invalid @enderror select2">
                                    <option value="">{{ __("Select state") }}</option>

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
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="text-dark">{{ __("Date of Birth:") }}</label>
                                <div class="input-group">
                                    <input value="{{ old('dob') }}" name="dob" type="text"
                                        class="datepicker-here form-control calendar" placeholder="{{ __("dd/mm/yyyy") }}"
                                        aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2"><i
                                                class="feather icon-calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="text-dark">{{ __("Occupation:") }}</label>
                                <input value="{{ old('name') }}" type="text" class="form-control"
                                    placeholder="{{ __("enter occupation of user") }}">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">

                            <div class="form-group">
                                <label class="text-dark">{{ __("VIP Membership: ") }}<span class="text-danger">*</span></label><br>
                                <label class="switch"><input type="checkbox" id="togBtn" name="membership">
                                    <div class="slider round">
                                        <span class="on"></span><span
                                            class="off"></span>
                                    </div>
                                </label>
                                @error('membership')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-dark">{{ __("Select Role:") }} <span class="text-danger">*</span></label>
                                <select required="" name="role" id="" class="form-control select2">
                                    <option value="">Choose a role</option>
                                    @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-dark" for="address">{{ __("Gender:") }}</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="m">{{ __("Male") }}</option>
                                    <option value="f">{{ __("Female") }}</option>
                                    <option value="o">{{ __("Other") }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
               
                <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="form-group">
                        <label class="text-dark">{{ __("Demo: ") }}<span class="text-danger">*</span></label><br>
                        <label class="switch"><input type="checkbox" id="togBtn" name="demo">
                            <div class="slider round">
                                <span class="on"></i></span><span
                                    class="off"></span>
                            </div>
                        </label>
                        @error('membership')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
               
                <div class="col-lg-4 col-md-6">
                <div class="form-group">
                    <label class="text-dark" for="issue">{{ __("Health Issue:") }}</label><br>
                    <label for="issue"> <input class="health_check" type="checkbox" id="issue"
                            name="health_check"> {{ __("Do you have any health issue ?") }}</label><br>
                    <br>
                    <div style="display:none;" id="healthbox" class="col-md-10">
                        <div class="row">
                            <div class="form-group health-form">
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


                            <button class="btn btn-sm btn-success health-btn" data-toggle="modal"
                                data-target="#exampleModalCenter">
                                +
                            </button>

                        </div>
                    </div>
                    <small class="text-muted text-info" name="details"> <i class="text-dark feather icon-help-circle"></i>
                        {{ __("Enter your health
                        description
                        :For eg: Any health problem like B.P, Sugar etc..") }}
                    </small>
                    @error('issue')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>
            </div>
            
           
                <div class="col-lg-4 col-md-6">
                   <input type="file" name="file" value="file" id="file2" class="{{ $errors->has('file') ? ' is-invalid' : '' }} inputfile inputfile-1"/>
                  <label for="file2"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="30" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg></label>
                  
                  <span class="text-danger invalid-feedback" role="alert"></span> <br> <small class="text-muted text-info" name="details"> <i class="text-dark feather icon-help-circle"></i>
                    {{ __("Upload Document") }}
                        </small></div>
               
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
        </div>
</form>

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
    
     $('.health_check').on('change', function () {
        if ($(this).is(':checked')) {
            $('#healthbox').show('fast');
            $('#issue_dropdown').attr('required', 'required');
        } else {
            $('#healthbox').hide('fast');
            $('#issue_dropdown').removeAttr('required');
        }
    })

</script>
@endsection
<!-- Start Modal -->
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
                                                        class="text-dark feather icon-help-circle"></i> {{ __("Enter
                                                        your health issue:For eg: BP,Sugar") }}</small>
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
<!-- End Modal -->