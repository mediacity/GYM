@extends("layouts.master")
@section('title','Add New Coupan')
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
            {{ __('Coupans') }}
          </li>
        </ol>
      </div>
    </div>

  </div>
</div>
@endsection
@section("maincontent")
<div class="mb-3 row">
  <div class="col-md-12">
    <div class="card">
  
      <div class="card-header with-border">
        <div class="box-title">
          Create New Coupon
        </div>
      </div>
      <form action="{{ route('coupans.store') }}" method="POST">
        @csrf
        <div class="card-body">
  
          <div class="form-group">
            <label>Coupon code: <span class="text-danger">*</span></label>
            <input required="" type="text" class="form-control" name="code">
          </div>
          <div class="form-group">
            <label>Discount type: <span class="text-danger">*</span></label>
  
            <select required="" name="distype" id="distype" class="form-control">
  
              <option value="fix">Fix Amount</option>
              <option value="upto">Upto</option>
              <option value="per">% Percentage</option>
  
            </select>
  
          </div>
          <div class="form-group">
            <label>Amount: <span class="text-danger">*</span></label>
            <input required="" type="text" class="form-control" name="amount">
  
          </div>
  
          <div class="form-group">
            <label>Max Usage Limit: <span class="text-danger">*</span></label>
            <input required="" type="number" min="1" class="form-control" name="maxusage">
          </div>
  
          <div id="minAmount" class="form-group">
            <label>Min Amount: </label>
            <div class="input-group">
              <input type="number" min="0.0" value="0.00" step="0.1" class="form-control" name="minamount">
            </div>
          </div>
  
  
          <div class="form-group">
            <label>Expiry Date: </label>
              <div class="input-group">
                <input value="{{ old("expirydate") }}" name="expirydate" type="text" id="datepicker"
                    class="datepicker-here form-control" placeholder="yyyy-mm-dd"
                    aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2"><i class="feather icon-calendar"></i></span>
                </div>
            </div>
          </div>
  
          <div class="form-group{{ $errors->has('is_login') ? ' has-error' : '' }} switch-main-block">
            <div class="custom-switch">
                {!! Form::checkbox('is_login', 1,1, ['id' =>
                'switch1', 'class' => 'custom-control-input']) !!}
                <label class="custom-control-label" for="switch1">Only For Registered Users:</label>
            </div>
        </div>
        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }} switch-main-block">
          <div class="custom-switch">
              {!! Form::checkbox('status', 1,1, ['id' =>
              'switch1', 'class' => 'custom-control-input']) !!}
              <label class="custom-control-label" for="switch1">Status:</label>
          </div>
      </div>
  
        <div class="card-footer">
          <button type="submit" class="btn btn-md btn-primary-rgba">
            <i class="fa fa-plus-circle"></i> Create
          </button>
         </form>
      <a href="{{ route('coupans.index') }}" title="Cancel and go back" class="btn btn-md btn-primary-rgba">
        <i class="fa fa-arrow-left"></i> Back
      </a>
    </div>
  </div>
</div>
@endsection