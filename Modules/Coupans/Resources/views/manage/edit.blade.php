@extends("layouts.master")
@section('title','Edit new coupan |'.$coupan->code)
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
          <h5 class="card-title">
            Edit Coupon : {{ $coupan->code }}
          </h5>
        </div>
        <form action="{{ route('coupans.update',$coupan->id) }}" method="POST">
          @csrf
          @method("PUT")
          <div class="card-body">
    
            <div class="form-group">
              <label>Coupon code: <span class="text-danger">*</span></label>
              <input value="{{ $coupan->code }}" type="text" class="form-control" name="code">
            </div>
            <div class="form-group">
              <label>Discount type: <span class="text-danger">*</span></label>
    
              <select required="" name="distype" id="distype" class="form-control">
    
                <option {{ $coupan->distype == 'fix' ? "selected" : ""}} value="fix">Fix Amount</option>
                <option {{ $coupan->distype == 'per' ? "selected" : ""}} value="per">% Percentage</option>
    
              </select>
    
            </div>
            <div class="form-group">
              <label>Amount: <span class="text-danger">*</span></label>
              <input type="text" value="{{ $coupan->amount }}" class="form-control" name="amount">
    
            </div>
            <div class="form-group">
              <label>Linked to: <span class="text-danger">*</span></label>
    
              <select required="" name="link_by" id="link_by" class="form-control">
                <option {{ $coupan->link_by == 'product' ? "selected" : ""}} value="product">Link By Product</option>
                <option {{ $coupan->link_by == 'simple_product' ? "selected" : ""}} value="simple_product">Link By Simple
                  Product</option>
                <option {{ $coupan->link_by == 'cart' ? "selected" : ""}} value="cart">Link to Cart</option>
                <option {{ $coupan->link_by == 'category' ? "selected" : ""}} value="category">Link to Category</option>
              </select>
    
            </div>
    
            <div class="form-group">
              <label>Max Usage Limit: <span class="text-danger">*</span></label>
              <input value="{{ $coupan->maxusage }}" type="number" min="1" class="form-control" name="maxusage">
            </div>
    
            <div id="minAmount" class="form-group {{ $coupan->link_by=='product' ? 'display-none' : "" }}">
              <label>Min Amount: </label>
              <div class="input-group">
                <input value="{{ $coupan->minamount }}" type="number" min="0.0" value="0.00" step="0.1" class="form-control"
                  name="minamount">
              </div>
            </div>
    
            <div class="form-group">
              <label>Expiry Date: </label>
                <div class="input-group">
                  <input value="{{ $coupan->expirydate }}" name="expirydate" type="text" id="datepicker"
                      class="datepicker-here form-control" placeholder="dd/mm/yyyy"
                      aria-describedby="basic-addon2">
                  <div class="input-group-append">
                      <span class="input-group-text" id="basic-addon2"><i class="feather icon-calendar"></i></span>
                  </div>
              </div>
            </div>
            <div class="form-group{{ $errors->has('is_login') ? ' has-error' : '' }} switch-main-block">
              <div class="custom-switch">
                  {!! Form::checkbox('is_login', 1,$coupan->is_login==1 ? 1 : 0, ['id' =>
                  'switch1', 'class' => 'custom-control-input']) !!}
                  <label class="custom-control-label" for="switch1">Only For Registered Users:</label>
              </div>
          </div>
          <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }} switch-main-block">
            <div class="custom-switch">
                {!! Form::checkbox('status', 1,$coupan->status==1 ? 1 : 0, ['id' =>
                'switch1', 'class' => 'custom-control-input']) !!}
                <label class="custom-control-label" for="switch1">Status:</label>
            </div>
        </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-md btn-primary-rgba">
              <i class="fa fa-save"></i> Update
            </button>
        </form>
        <a href="{{ route('coupans.index') }}" title="Cancel and go back" class="btn btn-md btn-primary-rgba">
          <i class="fa fa-arrow-left"></i> Back
        </a>
      </div>
    </div>
  </div>
@endsection