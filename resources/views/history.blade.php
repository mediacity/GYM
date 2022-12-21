@extends('layouts.master')
@section('title',__('Device History'))
@section('breadcum')
<div class="breadcrumbbar breadcrumbbar-one">
    <div class="row align-items-center">
        <div class="col-lg-4 col-md-8">
            <h4 class="page-title">{{ __("Device History") }}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Dashboard') }}</a></li>
                    <li class="breadcrumb-item"><a href="">{{ __('Reports') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ __('Device History') }}
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection
@section('maincontent')
<!-- Start Contentbar -->
<div class="">
    <div class="row">
         <div class="col-md-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">{{ __('Device History') }}</h5>
                </div>
                <div class="card-body table-responsive">
                    <table id="device_reports" class="text-dark w-100 table table-striped table-bordered">
                        <thead>
                            <th>{{ __("#") }}</th>
                            <th>{{ __("User name")}}</th>
                            <th>{{ __("IP Address") }}</th>
                            <th>{{ __("Platform") }}</th>
                            <th>{{ __("Browser") }}</th>
                            <th>{{ __("Logged in at") }}</th>
                            <th>{{ __("Logged out at") }}</th>
                        </thead>
                    </table>
                       
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Contentbar -->
@endsection
@section('script')
<script>
    $(function () {
        "use strict";
        var table = $('#device_reports').DataTable({
            processing: true,
            serverSide: true,
            pageLength: 50,
            searchDelay: 450,
            ajax: '{{ route("device.logs") }}',
            language: {
                searchPlaceholder: "Search in device reports..."
            },
            columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    searchable: false,
                    orderable: false
                },
                {
                    data: 'username',
                    name: 'users.name'
                },
                {
                    data: 'ip_address',
                    name: 'auth_log.ip_address'
                },
                {
                    data: 'platform',
                    name: 'auth_log.platform'
                },
                {
                    data: 'browser',
                    name: 'auth_log.browser'
                },
                {
                    data: 'login_at',
                    name: 'auth_log.login_at'
                },
                {
                    data: 'logout_at',
                    name: 'auth_log.logout_at'
                }
            ],
            dom: 'lBfrtip',
            buttons: [
                'csv', 'excel', 'pdf', 'print', 'colvis'
            ],
            order: [
                [0, 'DESC']
            ]
        });

    });
</script>
@endsection
