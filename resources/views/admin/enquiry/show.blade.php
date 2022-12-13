@extends('layouts.master')
@section('title',__('All Enquiry'))
@section('maincontent')
<!-- Start Breadcrumbbar -->                    
@component('components.breadcumb',['secondaryactive' => 'active'])
@slot('heading')
{{ __('Enquiry') }}
@endslot
@slot('menu1')
{{ __('Enquiry') }}
@endslot
@endcomponent
<!-- End Breadcrumbbar -->
<div class="card m-b-30">
    <div class="card-header">                                
        <div class="row align-items-center">
            <div class="col-7">
                <h5 class="card-title mb-0">{{ __("Order No :") }} {{ __($enquiry->enid ?? '-') }}</h5>
            </div>
            <div class="col-5 text-right">
                <span class="badge badge-success-inverse">{{ __($enquiry->status ?? '-') }}</span>                                             
            </div>
        </div>
    </div>
    <div class="card-body">                                
        <div class="row mb-5">
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="order-primary-detail mb-4">
                    <h6>{{ __("Order Placed") }}</h6>
                    <p class="mb-0">{{ $enquiry->updated_at }}</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="order-primary-detail mb-4">
                <h6>{{ __("Name") }}</h6>
                <p class="mb-0">{{ __($enquiry->name ?? '-') }}</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="order-primary-detail mb-4">
                <h6>{{ __("Email ID") }}</h6>
                <p class="mb-0">{{ __($enquiry->email ?? '-') }}</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="order-primary-detail mb-4">
                <h6>{{ __("Contact No") }}</h6>
                <p class="mb-0">{{ __($enquiry->mobile ?? '-') }} / {{ __($enquiry->phone ?? '-') }}</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="order-primary-detail mb-4">
                <h6>{{ __("Age") }}</h6>
                <p class="mb-0">{{ __($enquiry->age) }}</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="order-primary-detail mb-4">
                <h6>{{ __("Purpose") }}</h6>
                <p class="mb-0">{{ __($enquiry->purpose) }}</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="order-primary-detail mb-4">
                <h6>{{ __("Cost") }}</h6>
                <p class="mb-0">{{ $enquiry->cost?$enquiry->cost->cost:'' }}</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="order-primary-detail mb-4">
                <h6>{{ __("Occupation") }}</h6>
                <p class="mb-0">{{ $enquiry->occupation?$enquiry->occupation->occupation:'' }}</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="order-primary-detail mb-4">
                <h6>{{ __("Refrence") }}</h6>
                <p class="mb-0">{{ __($enquiry->refrence) }}</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="order-primary-detail mb-4">
                <h6>{{ __("Second Language") }}</h6>
                <p class="mb-0">{{ $enquiry->Secondlanguage?$enquiry->Secondlanguage->secondlanguage:'' }}</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="order-primary-detail mb-4">
                <h6>{{ __("Description") }}</h6>
                <p class="mb-0">{{ __($enquiry->description) }}</p>
                </div>
            </div>
        </div> 
        <div class="row">
            <div class="col-md-6 col-lg-6 col-xl-6 ">
                <div class="order-primary-detail mb-4">
                <h6>{{ __("Address") }}</h6>
                <p>{{ __($enquiry->address ?? '-') }}<br/>{{ $enquiry->city['name'] ?? '-'}} <br> {{ $enquiry->state['name'] ?? '-'}} <br>
                    {{ $enquiry->country['name'] ?? '-' }} </p>
                <p class="mb-0"></p>
                </div>
            </div>
        </div>                                
    </div>
</div> 
@endsection