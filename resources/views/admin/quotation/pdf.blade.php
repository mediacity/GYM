<!DOCTYPE html>
<!--
**********************************************************************************************************
    Copyright (c) 2021.
**********************************************************************************************************  -->
<!-- 
Template Name: Soyuz
Author: Media City
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]> -->
<html lang="en" >
<!-- <![endif]-->
<!-- head -->
<!-- theme styles -->
<head>
    
    <link href="{{ url('assets/plugins/switchery/switchery.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('assets/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('assets/css/flag-icon.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('assets/css/style.css" rel="stylesheet') }}" type="text/css">
</head>
<!-- end head -->
<!-- body start-->
<body>
<!-- terms end-->
<!-- about-home start -->
<div class="contentbar">                
    <!-- End row -->
    <div class="row justify-content-center">
        <!-- Start col -->
        <div class="col-md-12 col-lg-10 col-xl-10">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="invoice">
                        <div class="invoice-head">
                            <div class="row">
                                <div class="col-12 col-md-7 col-lg-7">
                                    <div class="invoice-logo">
                                        @if($invoice)
                                        <img src={{url('/image/signature/'.$invoice->signature) }} class="img-fluid" alt="signature">
                                        @endif
                                    </div>
                                    <h4>{{ __("Gym Quotation") }}</h4>
                                   <p>{{ __("Address : ") }}{{ $quotation->address }} <br>
                                        {{ $quotation->city['name']}} <br> {{ $quotation->state['name'] }} <br>
                                        {{ $quotation->country['name'] }} </p>
                                </div>
                              
                            </div>
                        </div> 
                        <div class="invoice-billing">
                            <div class="row">
                                <div class="col-sm-6 col-md-4 col-lg-4">
                                    <div class="invoice-address">
                                        <h6 class="mb-3">{{ __("Bill to") }}</h6>
                                        <h6 class="text-muted">{{__($quotation->name) }}</h6>
                                        <ul class="list-unstyled">
                                            <li><p>{{ __("Address :") }} {{ $quotation->address }} <br>
                                                {{ $quotation->city['name']}} <br> {{ $quotation->state['name'] }} <br>
                                                {{ $quotation->country['name'] }} </p></li>  
                                            <li>{{ $quotation->phone }}</li>  
                                            <li>{{ $quotation->email }}</li>  
                                        </ul>
                                    </div>
                                </div>
                               
                                
                            </div>
                        </div>  
                        <div class="invoice-summary">
                            <div class="table-responsive ">
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th scope="col">{{ __("ID") }}</th>                       
                                            <th scope="col">{{ __("Product") }}</th>
                                            <th scope="col">{{ __("Qty") }}</th>
                                            <th scope="col">{{ __("Price") }}</th>
                                            <th scope="col" class="text-right">{{ __("Total") }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @foreach ($quotation->subquotation as $t)
                                            <th scope="row">{{ $t->id }}</th>
                                            <td>{{ $t->productname }}</td>
                                            <td>{{ $t->quantity }}</td>
                                            <td>{{ $t->price }}</td>
                                            <td class="text-right">{{ $t->total }}</td>
                                            @endforeach
                                        </tr>
                                     
                                </table>
                            </div>
                        </div>
                        <div class="invoice-summary-total">
                            <div class="row">
                                <div class="col-md-12 order-2 order-lg-1 col-lg-5 col-xl-6">
                                    <div class="order-note">
                                        <p class="mb-3"><span class="badge badge-info-inverse font-14">{{ __("This is Free Shipping Order") }}</span></p>
                                        <h6>{{ __("Special Note for this order:") }}</h6>
                                        <p>{!! $quotation->additionalnote !!}</p>
                                    </div>
                                </div>
                                <div class="col-md-12 order-1 order-lg-2 col-lg-7 col-xl-6">
                                    <div class="order-total table-responsive ">
                                        <table class="table table-borderless text-right">
                                            <tbody>
                                                <tr>
                                                    <td>{{ __("Sub Total :") }}</td>
                                                    <td>{{ $quotation->subtotal }}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{ __("Tax %") }}</td>
                                                    <td>{{ $quotation->tax }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="f-w-7 font-18"><h5>{{ __("Amount Payable :") }}</h5></td>
                                                    <td class="f-w-7 font-18"><h5>Rs. {{ $quotation->grandtotal }}</h5></td>
                                                 </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="invoice-meta">
                            <div class="row">
                                <div class="col-sm-6 col-md-4 col-lg-4">
                                    <div class="invoice-meta-box">
                                        <h6 class="mb-3">{{ __("Terms & Conditions") }}</h6>
                                        <ul class="pl-3">
                                            <li>{{ __($invoice?$invoice->term_condition:'')}}</li>
                                         </ul>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="invoice-meta-box text-right">
                                        <h6 class="mb-0">{{ __("Authorized Signatory") }}</h6>
                                        @if($invoice)
                                       <img src={{url('/image/signature/'.$invoice->signature) }} class="img-fluid" alt="signature">
                                        <p class="mb-0">{{ __($invoice->name)}} C</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div> 
                   
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
    </div>
    <!-- End row -->
</div>
<!-- footer start -->

<!-- footer end -->
<!-- jquery -->
<script>
    $('.calendar').each(function () {
        $(this).datepicker({
            dateFormat: 'yy-mm-dd',
            minDate: 0
        });
    });
    var stateurl = @json(route('list.state'));
    var cityurl = @json(route('list.cities'));
    </script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
<script src="{{ asset('js/share.js') }}"></script>
<script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/modernizr.min.js"></script>
    <script src="assets/js/detect.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/vertical-menu.js"></script>
    <!-- Switchery js -->
    <script src="assets/plugins/switchery/switchery.min.js"></script>
    <!-- Core js -->
    <script src="assets/js/core.js"></script>
<!-- end jquery -->
</body>
<!-- body end -->
</html> 
