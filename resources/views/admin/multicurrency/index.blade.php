@extends('layouts.master')
@section('title',__('Multiple Currency'))
@section('maincontent')
<!-- Start Breadcrumbbar -->                    
@component('components.breadcumb',['secondaryactive' => 'active'])
@slot('heading')
<h4> {{ __('Multiple Currency Setting') }} </h1>
    @endslot
    @slot('menu1')
    {{ __('Multiple Currency') }}
    @endslot
    @endcomponent
    <!-- End Breadcrumbbar -->
    <!-- Start Card -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="box-header with-border">
                    <div class="box-title text-dark mt-20 ml-16">
                        <h5> {{ __("Currencies") }}</h5>
                    </div>
                    <button data-toggle="modal" data-target="#addCurrency" type="button"
                        class="pull-right btn btn-primary btn-md mr-16 mt--40">+ Add
                        {{ __("Currency") }}</button>
                </div>
                <div class="box-body">
                    <table id="currencyTable" class="width100 table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th scope="col">{{ __("Currency") }}</th>
                                <th scope="col">{{ __("Rate") }}</th>
                                <th scope="col">{{ __("Additional Fee") }}</th>
                                <th scope="col">{{ __("Currency Symbol") }}</th>
                                <th scope="col">{{ __("Default currency") }}</th>
                                <th scope="col">{{ __("Action") }}</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <div id="addCurrency" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="my-modal-title">{{ __("Add New Currency") }}</h4>
                            <button class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('multicurrency.store') }}" method="POST" novalidate
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>{{ __("Currency Code:") }}<span class="text-danger">*</span></label>
                                    <input placeholder="{{ __("eg. USD") }}" value="" required class="form-control" type="text"
                                        name="code">
                                </div>
                                <div class="form-group">
                                    <label>{{ __("Additonal Charge:") }}</label>
                                    <input placeholder="{{ __("eg. 0.50") }}" min="0" step="0.01" value="" class="form-control"
                                        type="number" name="add_amount">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-md">
                                        <i class="fa fa-save"></i> {{ __("Save") }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pull-left ">
                <div class="col-md-6 ml-35">
                    <a class="btn btn-primary updateRateBtn text-white">
                        <span id="buttontext"><i class="fa fa-refresh"></i></span> {{ __('Update Rates') }}
                    </a>
                </div>
            </div>
            <br><br>
        </div>
    </div>
    </div>
    </div>
    </div>
        <!-- End Card -->
    @endsection
    @section('script')
    <script>
        $(function () {
            "use strict";
            var table = $('#currencyTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('multicurrency.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'code',
                        name: 'currencies.code'
                    },
                    {
                        data: 'exchange_rate',
                        name: 'currencies.exchange_rate'
                    },
                    {
                        data: 'add_amount',
                        name: 'currencies.add_amount'
                    },
                    {
                        data: 'symbol',
                        name: 'currencies.currency_symbol'
                    },
                    {
                        data: 'default_currency',
                        name: 'default_currency',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
                order: [
                    [0, 'ASC']
                ]
            });

            $('.updateRateBtn').on('click', function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({

                    type: "POST",
                    url: '{{ route("auto.update.rates") }}',

                    beforeSend: function () {
                        $('#buttontext').html(
                        '<i class="fa fa-refresh fa-spin fa-fw"></i>');
                    },
                    success: function (data) {
                        table.draw();
                        console.log(data);
                        var animateIn = "lightSpeedIn";
                        var animateOut = "lightSpeedOut";
                        $('#buttontext').html('<i class="fa fa-refresh"></i>');
                        toastr.success('Currency updated successfully !');
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        console.log(XMLHttpRequest);
                    }

                });
            });
        });
    </script>
    @endsection