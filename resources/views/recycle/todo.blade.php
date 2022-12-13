@extends('layouts.master')
@section('title',__('All Recycle'))
@section('maincontent')
@component('components.breadcumb',['secondaryactive' => 'active'])
@slot('heading')
{{ __('Recycle') }}
@endslot
@slot('menu1')
{{ __('Recycle') }}
@endslot
@endcomponent
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
                    <table id="datatable-buttons" class="table table-border">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __("Todo") }}</th>
                                <th>{{ __("Action") }}</th>
                            </tr>
                        </thead>
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
        var table = $('#datatable-buttons').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('tod.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'title',
                    name: 'title'
                },
               
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true
                },
            ]
        });
     });
</script>
@endsection
