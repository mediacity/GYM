@extends('layouts.master')
@section('title',__("Affilates"))
@section('breadcum')
<div class="breadcrumbbar breadcrumbbar-one">
    <div class="row align-items-center">
        <div class="col-lg-4 col-md-6">
            <h4 class="page-title">{{ __("Affilates") }}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Dashboard') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ __('Affilates History') }}
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection
@section('maincontent')
<!-- Start Contentbar -->
<div class="row">
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-6">
                        <h5 class="card-title mb-0">{{__("All Referal Earnings")}}</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-border">
                        <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                               
                                <th>
                                    {{__("Refered User")}}
                                </th>
                                <th>
                                    {{__("Refered By")}}
                                </th>
                                <th>
                                    {{__("Amount")}}
                                </th>
                                <th>
                                    {{__("Date")}}
                                </th>
                            </tr>
                        </thead>
                    </table>
              
            </div>
            
        </div>
    </div>
</div>
@endsection
<!-- End Contentbar -->
@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $(function () {
        var table = $('#datatable-buttons').DataTable({
            processing: true,
            serverSide: true,
            ajax: @json (url("reports"))
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'refer_user_id',
                    name: 'refer_user_id'
                },
                {
                    data: 'user_id',
                    name: 'user_id'
                },
                {
                    data: 'amount',
                    name: 'amount'
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
