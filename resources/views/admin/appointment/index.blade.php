@extends('layouts.master')
@section('title', __('Appointment'))
@section('maincontent')
<!-- Start Breadcrumbbar -->                    
@component('components.breadcumb',['thirdactive' => 'active'])
@slot('heading')
{{ __('Appointment') }}
@endslot
@slot('menu1')
{{ __('Admin') }}
@endslot
@slot('menu2')
{{ __('All Appointments') }}
@endslot
@slot('button')
<div class="col-md-12 col-lg-6 text-right">
    <div class="top-btn-block">
        <a href="{{route('appointment.create')}}" class="btn btn-primary-rgba mr-2"><i class="feather icon-plus mr-2"></i>{{ __("Add Appointment") }}</a>
        <a href="{{ route('app.index') }}" class="btn btn-primary-rgba mr-2"><i class="feather icon-download-cloud mr-2"></i>{{ __("Recycle") }}</a>
    </div>
</div> 
@endslot
@endcomponent
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{__("Calendar") }}</h1>
            </div>
           
        </div>
    </div>
    <!-- /.container-fluid -->
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



