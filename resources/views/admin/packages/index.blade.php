@extends('layouts.master')
@section('title',__('All Packages'))
@section('breadcum')
<div class="breadcrumbbar breadcrumbbar-one">
    <div class="row align-items-center">
        <div class="col-lg-4 col-md-5">
            <h4 class="page-title">{{ __("Packages") }}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Dashboard') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ __('Packages') }}
                    </li>
                </ol>
            </div>
        </div>
        @if(auth()->user()->can('users.add'))
        <div class="col-lg-8 col-md-7">
            <div class="top-btn-block text-right">
              <a href="{{route('packages.create')}}" class="btn btn-primary-rgba mr-2"><i class="feather icon-plus mr-2"></i>Add
              {{ __("Package") }}</a>
              <a href="{{ route('pack.index') }}" class="btn btn-success-rgba mr-2"><i class="feather icon-download-cloud mr-2"></i>{{ __("Recycle") }}</a>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
@section('maincontent')
<!-- Start Contentbar -->
<div class="">
  <!-- Start row -->
  <div class="row align-items-center justify-content-center">
    @if (isset($package))
    @foreach($package as $plan)
    <!-- Start col -->
    <div class="col-md-6 col-lg-6 col-xl-3">
      <div class="card m-b-30">
        <div class="card-body p-3 h-100">
          <div class="pricing text-center">
            <div class="pricing-top">
              <h4 class="text-success mb-0"><em>{{$plan->title}}</em></h4>
              <img src="{{ url('image/packages/pricing-starter.svg') }}" class="img-fluid my-4" alt="starter pricing">
              <div class="pricing-amount">
                <h3 class="text-success mb-0"><sup>$</sup>
                  @if($plan->offerprice)
                  {{ $plan->price }} <del>{{ $plan->offerprice }}<del>
                  @else
                  {{ $plan->price }}
                  @endif
                </h3>
                <h6 class="pricing-duration">{{ $plan->duration }}</h6>
              </div>
              <div class="pricing-middle">
                <ul class="list-group">
                  <li class="list-group-item">{{str_limit($plan->detail,'50') }}</li>
                </div>
              </div>
              @if($payment != NULL && $payment->package_id == $plan->id)
            <a class="btn btn-success btn-block font-20 text-white" height="50px">Purchased&nbsp;</a>
            @endif
            @if(Auth::user()->roles->first()->name == 'Super Admin')
            <div class="pricing-bottom pricing-bottom-basic">
              <div class="pricing-btn">
                 <a type="button" href="{{route('packages.edit',$plan->id)}}"
                  class="btn btn-success-rgba mb-4 font-16">{{ __("Edit") }}</a>
                <a type="button" href="{{route('packages.destroy',$plan->id)}}"
                  class="btn btn-danger-rgba mb-4 font-16">{{ __("Delete") }}</a>
                 </div>
                 </div>
            @endif
            @if(Auth::user()->roles->first()->name == 'User')
            <div class="bottom-wrap">
              @if($payment == NULL )
              <input name="csrf-token" content="{{ csrf_token() }}" hidden>
              <div class="row">
                <div class="col-md-6 text-center">
                  <form action="{{ url('payment') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="amount" value="{{ $plan->offerprice ?? $plan->price }}">
                    <input type="hidden" name="id" value="{{$plan->id}}">
                    <button class="btn btn-primary package-btn">{{ __("Paytm")}}</button>
                  </form>
                </div>
                <div class="col-md-6 text-center"><a href="javascript:void(0)" class="buy_now btn btn-primary"
                    data-amount="{{ $plan->price }}" data-planid="{{ $plan->id }}">{{ __("Razorpay") }}</a>
                </div>
              </div>
              @endif
            </div>
            @endif
           </div>
        </div>
      </div>
    </div>
    @endforeach
    @endif
    <!-- End col -->
   </div>
</div>
<!-- End row -->
</div>
<!-- End Contentbar -->
@endsection
@section('script')
<script>
  $('.add_fee').on('click', function () {
     var planid = $(this).data('data-amount');
      $('#plan_id').val(planid);

  })
</script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script>
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('input[name="csrf-token"]').attr('content')
    }
  });
  $('body').on('click', '.buy_now', function (e) {
    var totalAmount = $(this).attr("data-amount");
    var product_id = $(this).attr("data-planid");

    var options = {
      "key": "rzp_test_MO2mGQNEAnyxdT",
      "amount": (totalAmount * 100), // 2000 paise = INR 20
      "name": "W3Adda",
      "description": "Payment",
      "image": "https://www.w3adda.com/wp-content/uploads/2019/07/w3a-fb-dp.png",
      "handler": function (response) {
        $.ajax({
          url: "{{route('paysuccess')}}",
          type: 'get',
          dataType: 'json',
          data: {
            razorpay_payment_id: response.razorpay_payment_id,
            totalAmount: totalAmount,
            product_id: product_id,
          },
          success: function (msg) {

            window.location.href = SITEURL + 'thank-you';
          }
        });

      },
      "prefill": {
        "contact": '1234567890',
        "email": 'xxxxxxxxx@gmail.com',
      },
      "theme": {
        "color": "#528FF0"
      }
    };
    var rzp1 = new Razorpay(options);
    rzp1.open();
    e.preventDefault();
  });
</script>

@endsection