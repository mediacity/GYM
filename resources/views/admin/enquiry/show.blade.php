@extends('layouts.master')
@section('title',__('All Enquiry'))
@section('breadcum')
	<div class="breadcrumbbar breadcrumbbar-one">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-5">
                <h4 class="page-title">{{ __("Enquiry") }}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">{{ __('Dashboard') }}</a></li>
                        <li class="breadcrumb-item"><a href="">{{ __('Admin') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                        	{{ __('Enquiry') }}
                        </li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-7">
                <div class="top-btn-block text-right">

                    <a href="{{route('enquiry.index')}}" class="btn btn-primary-rgba mr-2"><i
                    class="feather icon-arrow-left mr-2"></i>{{ __("Back") }}</a>
                </div>
            </div>  
        </div>          
    </div>
@endsection
@section('maincontent')
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
                <p class="mb-0">{{ ($enquiry->name ?? '-') }}</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="order-primary-detail mb-4">
                <h6>{{ __("Email ID") }}</h6>
                <p class="mb-0">{{($enquiry->email ?? '-') }}</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="order-primary-detail mb-4">
                <h6>{{ __("Contact No") }}</h6>
                <p class="mb-0">{{ ($enquiry->mobile ?? '-') }} / {{ ($enquiry->phone ?? '-') }}</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="order-primary-detail mb-4">
                <h6>{{ __("Age") }}</h6>
                <p class="mb-0">{{ ($enquiry->age) }}</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="order-primary-detail mb-4">
                <h6>{{ __("Purpose") }}</h6>
                <p class="mb-0">{{ ($enquiry->purpose) }}</p>
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