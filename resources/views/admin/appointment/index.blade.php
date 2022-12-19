@extends('layouts.master')
@section('title', __('Appointment'))
@section('breadcum')
<div class="breadcrumbbar breadcrumbbar-one">
    <div class="row align-items-center">
        <div class="col-lg-4 col-md-5">
            <h4 class="page-title">{{ __("Appointment") }}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Dashboard') }}</a></li>
                    <li class="breadcrumb-item"><a href="">{{ __('Admin') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ __('All Appointments') }}
                    </li>
                </ol>
            </div>
        </div>
        <div class="col-lg-8 col-md-7">
            <div class="top-btn-block text-right">
                <a href="{{route('appointment.create')}}" class="btn btn-primary-rgba mr-2"><i class="feather icon-plus mr-2"></i>{{ __("Add Appointment") }}</a>
                <a href="{{ route('app.index') }}" class="btn btn-primary-rgba mr-2"><i class="feather icon-download-cloud mr-2"></i>{{ __("Recycle") }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
@section('maincontent')
<!-- Start Contentbar -->
<section class="content-header">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h4>{{__("Calendar") }}</h4>
        </div>
        
    </div>
</section>
<!-- End Contentbar -->
<div class="card-body p-0">
{!! $calendar->calendar() !!}
</div>
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@5.3.0/main.min.js"></script>
{!! $calendar->script() !!}
@endsection



