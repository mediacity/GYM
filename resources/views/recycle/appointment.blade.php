@extends('layouts.master')
@section('title',__('All Recycle'))
@section('maincontent')
<!-- Start Breadcrumbbar -->
@component('components.breadcumb',['secondaryactive' => 'active'])
@slot('heading')
{{ __('Recycle') }}
@endslot
@slot('menu1')
{{ __('Recycle') }}
@endslot
@endcomponent
<!-- End Breadcrumbbar -->
<!-- Start Row -->
<div class="row">
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-6">
                        <h5 class="card-title mb-0">{{ __("All Recycle") }}</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="appointment-recycle" class="table table-border">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __("Appointment") }}</th>
                                <th>{{ __("Action") }}</th>
                            </tr>
                        </thead>
                    </table>

                </div>

            </div>
        </div>
    </div>
    <!-- End Row -->
    <!-- End col -->
    @endsection
    @section('script')
    <script>
        var appointmentrecycle_url = @json(route('app.index'));
        </script>
    @endsection