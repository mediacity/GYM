@extends('layouts.master')
@section('title',__('Roles & Permissions'))
<!-- Start Breadcrumbbar -->
@section('breadcum')
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-12 col-lg-8">
            <h4 class="page-title">{{ __("Roles and permissions") }}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ __('Roles and Permissions') }}
                    </li>
                </ol>
            </div>
        </div>

    </div>
</div>
@endsection
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
@section('maincontent')
<div class="row">
    <div class="col-md-12">
         <div class="card">
            @if(Auth::user()->roles->first()->name == 'Super Admin')
            <div class="card-header">
                <a title="Create a new role" href="{{ route('roles.create') }}"
                    class="float-right btn btn-sm btn-primary-rgba">
                   {{ __(" + Add new role") }}
                </a>
                <h5 class="card-title">{{ __('Manage Roles and Permissions') }}</h5>

            </div>
            @endif

            <div class="card-body">
                <div class="table-responsive">
                    <table id="roletab" class="table table-borderd">

                        <thead>
                            <th>
                                #
                            </th>
                            <th>
                                {{ __("Role Name") }}
                            </th>
                            <th>
                                {{ __("Action") }}
                            </th>
                        </thead>

                        <tbody>

                        </tbody>


                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
<!-- End Contentbar -->
@section('script')
<script>
    $(document).ready(function () {
        var table = $('#roletab').DataTable({
            lengthChange: false,
            responsive: true,
            serverSide: true,
            ajax: "{{ url('roles.index ') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    searchable: false
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'action',
                    name: 'action'
                }
            ],
            dom: 'lBfrtip',
            buttons: [
                'csv', 'excel', 'pdf', 'print'
            ]
        });

        table.buttons().container().appendTo('#roletable .col-md-3:eq(0)');
    });
</script>
@endsection