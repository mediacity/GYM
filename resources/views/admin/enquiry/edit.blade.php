@extends('layouts.master')
@section('title',__('Edit Enquiry :eid -',['eid' => $enquiry->id]))
@section('maincontent')
<!-- Start Breadcrumbbar -->
@component('components.breadcumb',['thirdactive' => 'active'])
@slot('heading')
{{ __('Enquiry') }}
@endslot
@slot('menu1')
{{ __('Admin') }}
@endslot
@slot('menu2')
{{ __('Edit Enquiry') }}
@endslot
@slot('button')
<div class="col-md-12 col-lg-6 text-right">
  <div class="top-btn-block">
    <a href="{{route('enquiry.index')}}" class="btn btn-primary-rgba mr-2"><i
      class="feather icon-arrow-left mr-2"></i>{{ __("Back") }}</a>
  </div>
</div>
@endslot
@endcomponent
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
<form class="form-light form" novalidate action="{{route('enquiry.update',$enquiry->id)}}" method="POST">
  {{ csrf_field() }}
  {{ method_field('PUT') }}
  <div class="col-md-12">
    <div class="row">
      <div class="col-lg-6 col-md-12">
        <div class="card m-b-3">
          <div class="card-body">
            <div class="form-group">
              <label class="text-dark">{{ __("Name:") }} <span class="text-danger">*</span></label>
              <input value="{{ $enquiry->name }}" type="text" class="form-control @error('name') is-invalid @enderror"
                placeholder="{{ __("Your Name") }}" name="name" required="">
              @error('name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
              <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> {{ __("Enter your name..") }}</small>
            </div>
            <div class="form-group">
              <label class="text-dark">{{ __("Father's Name: ") }}<span class="text-danger">*</span></label>
              <input value="{{ $enquiry->f_name }}" type="text"
                class="form-control @error('f_name') is-invalid @enderror" placeholder="{{ __('"Your Fathers Name"') }}"
                name="f_name" required="">
              @error('f_name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
              <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i>{{ __(" Enter your father name..") }}</small>
            </div>
            <div class="form-group">
              <label class="text-dark">{{ __("Email: ") }}<span class="text-danger">*</span></label>
              <input value="{{ $enquiry->email }}" type="email"
                class="form-control @error('email') is-invalid @enderror" placeholder="{{ __("Your Email") }}" name="email"
                required="">
              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
              <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i>{{ __(" Enter your valid email") }}</small>
            </div>
            <div class="form-group">
              <label class="text-dark">{{ __("Mobile Number: ") }}<span class="text-danger">*</span></label>

              <input value="{{ $enquiry->mobile }}" type="text" pattern="[0-9]{10}"
                class="form-control @error('mobile') is-invalid @enderror" placeholder="{{ __("Your current Mobile Number") }}"
                name="mobile" required="">
              @error('mobile')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
              <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i>{{ __(" Enter your mobile number") }}</small>
            </div>
            <div class="form-group">
              <label class="text-dark">{{ __("Alternate Mobile Number:") }}
              </label>
              <input value="{{ $enquiry->phone }}" type="text" class="form-control"
                placeholder={{ __("Your Alternate Mobile Number") }} name="phone">
              @error('phone')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
              <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i>{{ __(" Enter your alternate mobile number") }}</small>
            </div>
            <div class="form-group">
              <label class="text-dark" for="address">{{ __("Select Country: ") }}<span
                  class="text-danger">*</span></label>
              <select data-placeholder="{{ __("Please select country") }}" required="" name="country_id" id="country_id"
                class="country @error('country_id') is-invalid @enderror select2">
                <option value="">{{ __("Select country") }}</option>
                @foreach ($countries as $country)
                <option {{ $enquiry->country_id != '' && $enquiry->country_id == $country->id ? "selected" : "" }}
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
            <div class="form-group">
              <label class="text-dark" for="address">{{ __("Select State: ") }}<span
                  class="text-danger">*</span></label>
              <select data-placeholder="{{ __("Please select state") }}" required="" name="state_id" id="state_id"
                class="states @error('state_id') is-invalid @enderror select2">
                <option value="">{{ __("Select state") }}</option>
                @if(isset($enquiry->country->states))
                @foreach ($enquiry->country->states as $state)
                <option {{ $enquiry->state_id == $state->id ? "selected" : "" }} value="{{ $state->id }}">
                  {{ $state->name }}</option>
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
            <div class="form-group">
              <label class="text-dark" for="address">{{ __("Select City: ") }}<span class="text-danger">*</span></label>
              <select data-placeholder={{ __("Please select city") }} required="" name="city_id" id="city_id"
                class="cities @error('city_id') is-invalid @enderror select2">
                <option value="">{{ __("Select city") }}</option>
                @foreach ($enquiry->state->cities as $city)
                <option {{ $enquiry->city_id == $city->id ? "selected" : "" }} value="{{ $city->id }}">
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
            <div class="form-group">
              <label class="text-dark" for="issue">{{ __("Health Issue:") }}</label>
              <br>
              <label for="issue">
                <input {{ ($enquiry->issue != ['NO'] ? "checked" : "") }} class="health_check" type="checkbox"
                  id="issue" name="health_check">{{ __(" Do you have any health issue?") }}</label>
              <div style={{ ($enquiry->issue != ['NO'] ? "checked" : "display:none;") }} id="healthbox">
                <select data-placeholder="{{ __("Please select if you have any issue ") }}" name="issue[]"
                  class="mdb-select md-form form-control select2" id="issue_dropdown" style="display:none;" multiple>
                  @foreach(App\enquiryhealth::all() as $issue)
                  <option @if($enquiry->issue != '') @foreach($enquiry->issue as $health)
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
              <small class="text-muted" name="details"> <i class="text-dark feather icon-help-circle"></i>{{ __(" Enter your health description:For eg.- any health problem like B.P, Sugar etc..") }}
              </small>
            </div>
            <div class="form-group">
              <label class="text-dark" for="address">{{ __("Address :") }} <span class="text-danger">*</span></label>
              <textarea required="" class="@error('address') is-invalid @enderror form-control" id="line1"
                name="address">{{ $enquiry->address }}</textarea>
              @error('address')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group">
              <label class="text-dark">{{ __("Pincode:") }} <span class="text-danger">*</span></label>
              <input value="{{ $enquiry->pincode }}" type="text" pattern="[0-9]{6}"
                class="form-control @error('pincode') is-invalid @enderror" placeholder="{{ __("Your city Pincode") }}"
                name="pincode" required="">
              @error('pincode')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
              <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> {{ __("Enter your city pincode") }}</small>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-12">
        <div class="card m-b-3">
          <div class="card-body">
            <div class="form-group">
              <label class="text-dark">{{ __("Age:") }} <span class="text-danger">*</span></label>
              <input value="{{ $enquiry->age }}" type="text" class="form-control @error('age') is-invalid @enderror"
                placeholder="{{ __("Your Age") }}" name="age" required="">
              @error('age')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
              <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> {{ __("Enter your Age..") }}</small>
            </div>
            <div class="form-group">
              <label class="text-dark">{{ __("Select Your Enquiry Purpose: ") }}<span
                  class="text-danger">*</span></label>
              <select required="" name="purpose" id="purpose" class="form-control select2">
                <option {{ $enquiry->purpose =='Not set' ? "selected" : "" }} value="Not set">{{ __("Select Purpose") }}</option>
                <option {{ $enquiry->purpose =='Gym' ? "selected" : "" }} value="Gym">{{ __("Gym") }}</option>
                <option {{ $enquiry->purpose =='Diet' ? "selected" : "" }} value="Diet">{{ __("Diet") }}
                </option>
                <option {{ $enquiry->purpose =='Yoga' ? "selected" : "" }} value="Yoga">{{ __("Yoga") }}
                </option>
                <option {{ $enquiry->purpose =='Aerobics' ? "selected" : "" }} value="Aerobics">
                  {{ __("Aerobics") }}</option>
                <option {{ $enquiry->purpose =='Others' ? "selected" : "" }} value="Others">{{ __("Others") }}
                </option>
              </select>
              @error('purpose')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
              <small class="text-muted" name="type"> <i class="text-dark feather icon-help-circle"></i> {{ __("Select your Enquiry Purpose") }}
              </small>
            </div>
            <div class="form-group">
              <label class="text-dark">{{ __("From Where You Get Details: ") }}<span
                  class="text-danger">*</span></label>
              <select required="" name="refrence" id="details" class="form-control select2">
                <option {{ $enquiry->refrence =='Not set' ? "selected" : "" }} value="Not set">{{ __("Where You Get Details") }}</option>
                <option {{ $enquiry->refrence =='News' ? "selected" : "" }} value="News">{{ __("News") }}
                </option>
                <option {{ $enquiry->refrence =='Email' ? "selected" : "" }} value="Email">{{ __("Email") }}
                </option>
                <option {{ $enquiry->refrence =='Socialmedia' ? "selected" : "" }} value="Socialmedia">
                  {{ __("SocialMedia") }}</option>
                <option {{ $enquiry->details =='From gym' ? "selected" : "" }} value="From gym">{{ __("Some one from our gym") }}</option>
                <option {{ $enquiry->refrence =='Others' ? "selected" : "" }} value="Others">{{ __("Others") }}
                </option>
              </select>
              @error('details')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
              <small class="text-muted" name="details"> <i class="text-dark feather icon-help-circle"></i> {{ __("Select where you get details") }}
              </small>
            </div>
            <div class="form-group">
              <label class="text-dark">{{ __("Religion: ") }}<span class="text-danger">*</span></label>
              <select autofocus="" class="form-control select2" name="religion_id">
                <option value="">{{ __("Select Religion") }}</option>
                @foreach($religions as $religion)
                <option {{ $enquiry['religion_id'] == $religion->id ? "selected" : "" }} value="{{ $religion->id }}">
                  {{ $religion->religion }}</option>
                @endforeach
              </select>
              @error('religion')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
              <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> {{ __("Select religion eg:buddhism,islam ") }}</small>
            </div>
            <div class="form-group">
              <label class="text-dark">{{ __("Occupation: ") }}<span class="text-danger">*</span></label>
               <select autofocus="" class="form-control select2" name="occupation_id">
                <option value="">{{ __("Select Occupation") }}</option>
                @foreach($occupations as $occupation)
                <option {{ $enquiry['occupation_id'] == $occupation->id ? "selected" : "" }}
                  value="{{ $occupation->id }}">{{ $occupation->occupation }}</option>
                @endforeach
              </select>
              @error('occupation')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
              <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> {{ __("Select occupation eg:dentist,bussinessman") }} </small>
            </div>
            <div class="form-group">
              <label class="text-dark">{{ __("SecondLanguage: ") }}<span class="text-danger">*</span></label>

              <select autofocus="" class="form-control select2" name="second_language">
                <option value="">{{ __("Select SecondLanguage") }}</option>
                @foreach($secondlanguages as $secondlanguage)
                <option {{ $enquiry['second_language'] == $secondlanguage->id ? "selected" : "" }}
                  value="{{ $secondlanguage->id }}">{{ $secondlanguage->secondlanguage}}</option>
                @endforeach
              </select>
              @error('occupation')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
              <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i>{{ __(" Select occupation eg:marathi,gujrathi") }} </small>
            </div>
            <div class="form-group">
              <label class="text-dark" for="address">{{ __("Description:") }} <span class="text-danger">*</span></label>
              <textarea required="" class="@error('description') is-invalid @enderror form-control" id="description"
                name="description" rows="5">{{ $enquiry->description }}</textarea>
              @error('description')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
              <small class="text-muted" name="description"> <i class="text-dark feather icon-help-circle"></i>
                {{ __("Enter your Enquiry description") }}
              </small>
              </small>
            </div>
            <div class="form-group">
              <label class="text-dark">{{ __("Budget:") }} <span class="text-danger">*</span></label>
              <select autofocus="" class="form-control select2" name="cost_id">
                <option value="">{{ __("Select Cost") }}</option>
                @foreach($costs as $cost)
                <option {{ $enquiry['cost_id'] == $cost->id ? "selected" : "" }} value="{{ $cost->id }}">
                  {{ $cost->cost }}</option>
                @endforeach
              </select>
              @error('cost')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
              <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> {{ __("Select cost eg:10,000, 12,000") }} </small>
            </div>
            <br />
            <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
              <label class=" text-dark" for="cars">{{ __("Choose a Status:") }}<span class="text-danger"
                  class="text-dark">*</span></label>
              <select data-placeholder="{{ __("Please select status") }}" class="form-control select2" name="status">
                <option selected>{{ __("Please select status") }}</option>
                <option {{ $enquiry->status =='demo' ? "selected" : "" }} value="demo">{{ __("Demo") }}</option>
                <option {{ $enquiry->status =='close' ? "selected" : "" }} value="close">{{ __("Close") }}</option>
                <option {{ $enquiry->status =='join' ? "selected" : "" }} value="join">{{ __("Join") }}</option>
                <option {{ $enquiry->status =='pending' ? "selected" : "" }} value="pending">{{ __("Pending") }}
                </option>
              </select>
              <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> {{ __("Select a status eg: pending,join") }}
              </small>
            </div>
            <br />
            <div class="form-group">
              <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i> {{ __("Reset") }}</button>
              <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                {{ __("Update") }}</button>
              <div class="clear-both"></div>
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
  $('.health_check').on('change', function () {
    if ($(this).is(':checked')) {
      $('#healthbox').show('fast');
      $('#issue_dropdown').attr('required', 'required');
    } else {
      $('#healthbox').hide('fast');
      $('#issue_dropdown').removeAttr('required');
    }
  })
  $('.calendar').each(function () {
    $(this).datepicker({
      dateFormat: 'yy-mm-dd',
      minDate: 0
    });
  });
  var stateurl = @json(route('list.state'));
  var cityurl = @json(route('list.cities'));
</script>
@endsection