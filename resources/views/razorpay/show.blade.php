@extends('layouts.master')
@section('title',__('History'))
@section('breadcum')
<div class="breadcrumbbar breadcrumbbar-one">
    <div class="row align-items-center">
        <div class="col-lg-4 col-md-6">
            <h4 class="page-title">{{ __("History") }}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Dashboard') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ __('History') }}
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection
@section('maincontent')
<div class="row">
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-6">
                        <h5 class="card-title mb-0">{{ __("All History") }}</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="payment_history" class="table table-border">
                        <thead>
                            <tr>
                                <th>{{ __("User Name") }}</th>
                                <th>{{ __("Payment Method") }}</th>
                                <th>{{ __("Paid Amount") }}</th>
                                <th>{{ __("Subscription To") }}</th>
                                <th>{{ __("Subscription From") }}</th>
                                <th>{{ __("Date") }}</th>
                            </tr>
                        </thead>
                        @if ($payment)
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End col -->
    @endsection
    @section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        $(function () {
            var table = $('#payment_history').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('history') }}",
                columns: [{
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'payment_method',
                        name: 'payment_method'
                    },
                    {
                        data: 'amount',
                        name: 'amount'
                    },
                    {
                        data: 'to',
                        name: 'to'
                    },
                    {
                        data: 'from',
                        name: 'from'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        orderable: true,
                        searchable: true
                    },
                ]
            });
        });
    </script>
    @endsection
    