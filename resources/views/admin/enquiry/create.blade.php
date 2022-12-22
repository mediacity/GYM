@extends('layouts.master')
@section('title',__('Add Enquiry'))
@section('breadcum')
	<div class="breadcrumbbar breadcrumbbar-one">
        <div class="row align-items-center">
            <div class="col-md-7 col-lg-5">
                <h4 class="page-title">{{ __("Enquiry") }}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">{{ __('Dashboard') }}</a></li>
                        <li class="breadcrumb-item"><a href="">{{ __('Admin') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                        	{{ __('Add Enquiry') }}
                        </li>
                    </ol>
                </div>
            </div>
            <div class="col-md-5 col-lg-7">
                <div class="top-btn-block text-right">
                    <a href="{{route('enquiryhealth.create')}}" class="btn btn-primary-rgba mr-2"><i
                    class="feather icon-plus mr-2"></i>{{ __("Add Health Issue") }}</a>

                    <a href="{{route('enquiry.index')}}" class="btn btn-primary-rgba mr-2"><i
                    class="feather icon-arrow-left mr-2"></i>{{ __("Back") }}</a>
                </div>
            </div>  
        </div>          
    </div>
@endsection
@section('maincontent')
    <!-- <div class="col-md-12"> -->
    @if ($errors->any())  
	<div class="alert alert-danger" role="alert">
	@foreach($errors->all() as $error)     
	<p>{{ $error}}<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	<span aria-hidden="true" style="color:red;">&times;</span></button></p>
	@endforeach  
	</div>
	@endif
<div class="row">
    
    <div class="col-lg-12 col-md-12">
        <div class="card m-b-3">
            <div class="card-body">
                <form autocomplete="off" class="form-light form" novalidate action="{{route('enquiry.store')}}" method="POST">
                {{ csrf_field() }}
                    <div class="bg-info-rgba bg-orange p-4 mb-4">
                        <h4 class="pb-4">Personal Details</h4>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="text-dark">{{ __("Name:") }} <span class="text-danger">*</span></label>
                                    <input value="{{ old('name') }}" type="text"
                                        class="form-control mb-2 @error('name') is-invalid @enderror"
                                        placeholder="{{ __('Your Name') }}" name="name" required>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>
                                        {{ __(" Enter your name..") }}</small>
                                </div>
                                <div class="text-dark form-group{{ $errors->has('age') ? ' has-error' : '' }}">
                                    {!! Form::label('age', 'Age',['class'=>'required']) !!}<span class="text-danger">*</span>
                                    {!! Form::number('age', null, ['class' => 'form-control mb-2',
                                    'required','placeholder' => 'Please Enter Age', 'pattern' => '[0-9]{1-100}']) !!}
                                    <small class="text-danger">{{ $errors->first('age') }}</small>
                                    <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>
                                        {{ __("Add a Age") }}</small>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark">{{ __("Mobile Number: ") }}<span
                                            class="text-danger">*</span></label>

                                    <input value="{{ old('mobile') }}" type="tel" pattern="[0-9]{10}"
                                        class="form-control mb-2 @error('mobile') is-invalid @enderror"
                                        placeholder="{{ __('Your current Mobile Number') }}" name="mobile" required="">
                                    @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>
                                        {{ __("  Enter your mobile number") }}</small>
                                </div>  
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="text-dark">{{ __("Father's Name: ") }}<span
                                            class="text-danger">*</span></label>
                                    <input value="{{ old('f_name') }}" type="text"
                                        class="form-control mb-2 @error('f_name') is-invalid @enderror"
                                        placeholder="{{ __('Your Fathers Name') }}" name="f_name" required>
                                    @error('f_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>
                                        {{ __(" Enter your father name..") }}</small>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark">{{ __("Email: ") }}<span class="text-danger">*</span></label>
                                    <input value="{{ old('email') }}" type="email"
                                        class="form-control mb-2 @error('email') is-invalid @enderror"
                                        placeholder="{{ __('Your Email') }}" name="email" required="">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>
                                        {{ __(" Enter your valid email") }}</small>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark">{{ __("Alternate Mobile Number:") }}
                                    </label>
                                    <input value="{{ old('phone') }}" type="text"
                                        class="form-control mb-2 @error('phone') is-invalid @enderror"
                                        placeholder="{{ __('Your Alternate Mobile Number') }}" name="phone">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>
                                        {{ __("Enter your alternate mobile number") }}</small>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label class="text-dark" for="address">{{ __("Description: ") }}<span
                                            class="text-danger">*</span></label>
                                    <textarea required="" class="@error('description') is-invalid @enderror form-control mb-2"
                                        id="description" name="description" rows="5">{{ old('description') }}</textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <small class="text-muted text-info" name="description">
                                        <i class="text-dark feather icon-help-circle"></i>
                                        {{ __("Enter your Enquiry description") }}
                                    </small>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-info-rgba bg-orange p-4 mb-4">
                        <h4 class="pb-4">Address</h4>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="text-dark" for="address">{{ __("Select Country: ")}}<span
                                            class="text-danger">*</span></label>
                                    <select data-placeholder="{{ __('Please select country') }}" required="" name="country_id"
                                        id="country_id" class="country @error('country_id') is-invalid @enderror select2">
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
                                </div>
                                <div class="form-group">
                                    <label class="text-dark" for="address">{{ __("Select City: ") }}<span
                                            class="text-danger">*</span></label>
                                    <select data-placeholder="{{ __('Please select state') }}" required="" name="city_id"
                                        id="city_id" class="cities @error('city_id') is-invalid @enderror select2">
                                        <option value="">{{ __("Select city") }}</option>

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
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="text-dark" for="address">{{ __("Select State: ") }}<span
                                            class="text-danger">*</span></label>
                                    <select data-placeholder="{{ __('Please select state') }}" required="" name="state_id"
                                        id="state_id" class="states @error('state_id') is-invalid @enderror select2">
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
                                <div class="form-group">
                                    <label class="text-dark">{{ __('Pincode:') }} <span class="text-danger">*</span></label>
                                    <input value="{{ old('pincode') }}" type="tel" pattern="[0-9]{6}"
                                        class="form-control mb-2 @error('pincode') is-invalid @enderror"
                                        placeholder="{{ __('Your city Pincode') }}" name="pincode" required="">
                                    @error('pincode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>
                                        {{ __("Enter your city pincode") }}</small>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label class="text-dark" for="address">{{ __("Address : ") }}<span
                                            class="text-danger">*</span></label>
                                    <textarea required="" class="@error('address') is-invalid @enderror form-control mb-2" id="line1"
                                        name="address">{{ old('address') }}</textarea>
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>
                                        {{ __(" Enter your Address") }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-info-rgba bg-orange p-4 mb-4">
                        <h4 class="pb-4">Other Information</h4>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="text-dark">{{ __("Select Your Enquiry Purpose: ") }}<span
                                            class="text-danger">*</span></label>
                                    <select required="" name="purpose" id="purpose" class="form-control mb-2 select2">
                                        <option value="Not set">{{ __("Select Purpose") }}</option>
                                        <option value="Gym">{{ __("Gym") }}</option>
                                        <option value="Diet">{{ __("Diet") }}</option>
                                        <option value="Yoga">{{ __("Yoga") }}</option>
                                        <option value="Aerobics">{{ __("Aerobics") }}</option>
                                        <option value="Others">{{ __("Others") }}</option>
                                    </select>
                                    @error('purpose')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <small class="text-muted text-info" name="type"> <i
                                            class="text-dark feather icon-help-circle"></i>
                                        {{ __("  Select your Enquiry Purpose") }}
                                    </small>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark">{{ __("Budget:") }} <span class="text-danger">*</span></label>

                                    <select autofocus="" class="form-control mb-2 select2" name="cost_id">
                                        <option value="">{{ __("Select Cost") }}</option>
                                        @foreach($costs as $cost)

                                        <option value="{{ $cost->id }}">{{ $cost->cost }}</option>
                                        @endforeach
                                    </select>

                                    @error('cost')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>
                                        {{ __("Select cost eg:10,000, 12,000") }} </small>

                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-10 col-md-9 col-9">
                                            <label class="text-dark">{{ __("Religion:") }} <span
                                                    class="text-danger">*</span></label>
                                            <select autofocus="" class="form-control mb-2 select2" name="religion_id">
                                                <option value="">{{ __("Select Religion") }}</option>
                                                @foreach($religions as $religion)

                                                <option value="{{ $religion->id }}">{{ $religion->religion }}</option>
                                                @endforeach
                                            </select>
                                            @error('religion')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            <small class="text-muted text-info"> <i
                                                    class="text-dark feather icon-help-circle"></i>
                                                {{ __("Select religion eg:buddhism,islam ") }}</small>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-3">
                                            <button class="btn btn-sm btn-primary religion-btn" type="button" data-toggle="modal"
                                                data-target="#exampleModal">
                                                +
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-10 col-md-9 col-9">
                                            <label class="text-dark">{{ __("Second Language:") }} <span
                                                    class="text-danger">*</span></label>

                                            <select autofocus="" class="form-control mb-2 select2" name="second_language">
                                                <option value="">{{ __("Select Second Language") }}</option>
                                                @foreach($secondlanguages as $secondlanguage)

                                                <option value="{{ $secondlanguage->id }}">{{ $secondlanguage->secondlanguage }}
                                                </option>
                                                @endforeach
                                            </select>

                                            @error('secondlanguage')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            <small class="text-muted text-info"> <i
                                                    class="text-dark feather icon-help-circle"></i>
                                                {{ __("Select secondlanguage eg:Marathi,Gujrathi ") }}</small>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-3">
                                            <button class="btn btn-sm btn-primary religion-btn" type="button" data-toggle="modal"
                                                data-target="#exampleModalll">
                                                +
                                            </button>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="text-dark">{{ __("From Where You Get Reference About us: ") }}<span
                                            class="text-danger">*</span></label>
                                    <select required="" name="refrence" id="details" class="form-control mb-2 select2">
                                        <option value="Not set">{{ __("From Where You Get Reference About us") }}</option>
                                        <option value="News">{{ __("News") }}</option>
                                        <option value="Email">{{ __("Email") }}</option>
                                        <option value="Socialmedia">{{ __("SocialMedia") }}</option>
                                        <option value="From gym">{{ __("Some one from our gym") }}</option>
                                        <option value="Others">{{ __("Others") }}</option>
                                    </select>
                                    @error('details')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <small class="text-muted text-info" name="reference"> <i
                                            class="text-dark feather icon-help-circle"></i>
                                        {{ __(" Select where you get details about us") }}</small>
                                </div>
                                <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                    <label class=" text-dark" for="cars">{{ __("Choose a Status:") }}<span class="text-danger" class="text-dark">*</span></label>
                                    <select data-placeholder="{{ __("Please select status") }}" class="form-control mb-2 select2" name="status">
                                        <option selected>{{ __("Please select status") }}</option>
                                        <option value="demo">{{ __("Demo") }}</option>
                                        <option value="close">{{ __("Close") }}</option>
                                        <option value="join">{{ __("Join") }}</option>
                                        <option value="pending">{{ __("Pending") }}</option>
                                    </select>
                                    <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>
                                        {{ __("Select a status eg: pending,join") }}
                                    </small>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-10 col-md-9 col-9">
                                            <label class="text-dark" >{{ __("Occupation:") }} <span
                                                    class="text-danger">*</span></label>

                                            <select autofocus="" class="form-control mb-2 select2" name="occupation_id">
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
                                                    class="text-dark feather icon-help-circle"></i>
                                                {{ __("Select occupation eg:dentist,bussinessman") }} </small>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-3">
                                            <button class="btn btn-sm btn-primary religion-btn" type="button" data-toggle="modal" data-target="#exampleModall">
                                                +
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark" for="issue">{{ __("Health Issue:") }}</label><br>
                                    <label for="issue"> <input class="health_check" type="checkbox" id="issue"
                                            name="health_check"> {{ __("Do you have any health issue ?") }}</label>
                                    <br>
                                    <div style="display:none;" id="healthbox" class="col-md-10">
                                        <div class="row">
                                            <div class="form-group health-form">
                                                <select data-placeholder="{{ __('Please select if you have any issue') }}"
                                                    name="issue[]" class="mdb-select md-form form-control mb-2 select2"
                                                    id="issue_dropdown" style="display:none;" multiple>
                                                    @if (isset($enquiryhealth))
                                                    @foreach($enquiryhealth as $enquiryhealth)
                                                    <option value="{{ $enquiryhealth->id }}">{{ $enquiryhealth->issue}}
                                                    </option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                            <button class="btn btn-sm btn-primary health-btn" type="button" data-toggle="modal" data-target="#exampleModalCenter">
                                                +
                                            </button>
                                        </div>
                                    </div>
                                    <small class="text-muted text-info" name="details"> <i
                                            class="text-dark feather icon-help-circle"></i>{{ __("Enter your health description:For eg: Any health problem like B.P, Sugar etc..") }}
                                    </small>
                                    @error('issue')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i>
                            {{ __("Reset") }}</button>
                        <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                            {{ __("Create") }}</button>

                        <div class="clear-both"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    <!-- </div> -->

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
                                                <label class="text-dark">{{ __("Health Isuue: ") }}<span
                                                        class="text-danger">*</span></label>
                                                <input type="text"
                                                    class="form-control mb-2 @error('issue') is-invalid @enderror"
                                                    placeholder="{{ __("Your Health issue") }}" name="issue" required="">
                                                @error('issue')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                <small class="text-muted"> <i
                                                        class="text-dark feather icon-help-circle"></i>
                                                    {{ __("Enter your health issue:For eg: BP,Sugar") }}</small>
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
                                                    <label class="custom-control-label"
                                                        for="switch1"><span>{{ __("Is Active") }}</span></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i>
                                        {{ __("Reset") }}</button>
                                    <button type="submit" class="btn btn-primary-rgba"><i
                                            class="fa fa-check-circle"></i>
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
<!-- Start Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <div class="contentbar">
                    <!-- Start row -->
                    <div class="row">
                        <div class="col-md-12">

                            {!! Form::open(['method' => 'POST', 'route' => 'religion.store','files' => true , 'class' =>
                            'form-light form' , 'novalidate']) !!}
                            <div class="admin-form">
                                {{ $errors->has('Religion') ? ' has-error' : '' }}
                                {!! Form::label('religion', 'Religion',['class'=>'required']) !!}<span
                                    class="text-danger">*</span>
                                {!! Form::text('religion', null, ['class' => 'form-control mb-2', 'required','placeholder' =>
                                'Please Enter Religion']) !!}
                                <small class="text-danger">{{ $errors->first('religion') }}</small>
                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> {{ __("Enter
                                    Religion eg:
                                    Hinduism ,Islam ,Christianity ,Sikhism ,Buddhism") }} </small>
                            </div>
                            <br>
                            <div
                                class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }} switch-main-block">
                                <div class="custom-switch">
                                    {!! Form::checkbox('is_active', 1,1, ['id' => 'switch1', 'class'
                                    =>'custom-control-input']) !!}
                                    <label class="custom-control-label" for="switch1"><span>{{ __("Status") }}</span></label>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="reset" class="btn btn-danger"><i class="fa fa-ban"></i>
                                    {{ __("Reset") }}</button>
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
<!-- Start Modal -->
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
                                {!! Form::text('occupation', null, ['class' => 'form-control mb-2', 'required','placeholder'
                                =>  'Please Enter Occupation']) !!}
                                <small class="text-danger">{{ $errors->first('occupation') }}</small>
                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> {{ __("Enter
                                    Occupation eg:
                                    Electrician,Doctor,Businessman") }} </small>
                            </div>
                            <br>
                            <div
                                class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }} switch-main-block">
                                <div class="custom-switch">
                                    {!! Form::checkbox('is_active', 1,1, ['id' => 'switch1', 'class'
                                    =>'custom-control-input']) !!}
                                    <label class="custom-control-label" for="switch1"><span>{{ __("Status") }}</span></label>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="reset" class="btn btn-danger"><i class="fa fa-ban"></i>
                                    {{ __("Reset") }}</button>
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
<!-- End Modal -->
<!-- Start Modal -->
<div class="modal fade" id="exampleModalll" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <div class="contentbar">
                    <!-- Start row -->
                    <div class="row">
                        <div class="col-md-12">

                            {!! Form::open(['method' => 'POST', 'route' => 'secondlanguage.store','files' => true ,
                            'class' =>
                            'form-light form' , 'novalidate']) !!}
                            <div class="admin-form">
                                {{ $errors->has('secondLanguage') ? ' has-error' : '' }}
                                {!! Form::label('secondlanguage', 'SecondLanguage',['class'=>'required']) !!}<span
                                    class="text-danger">*</span>
                                {!! Form::text('secondlanguage', null, ['class' => 'form-control mb-2',
                                'required','placeholder' => 'Please Enter SecondLanguage']) !!}
                                <small class="text-danger">{{ $errors->first('secondLanguage') }}</small>
                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i>
                                    {{ __("Enter SecondLanguage eg:Marathi,Gujrati") }} </small>
                            </div>
                            <br>
                            <div
                                class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }} switch-main-block">
                                <div class="custom-switch">
                                    {!! Form::checkbox('is_active', 1,1, ['id' => 'switch1', 'class'
                                    =>'custom-control-input']) !!}
                                    <label class="custom-control-label" for="switch1"><span>{{ __("Status") }}</span></label>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <button type="reset" class="btn btn-danger"><i class="fa fa-ban"></i>
                                    {{ __("Reset") }}</button>
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
</div>
</div>
<!-- End Modal -->