
<?php $__env->startSection('title',__('Multiple Currency')); ?>
<?php $__env->startSection('breadcum'); ?>
	<div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title"><?php echo e(__("Multiple Currency Setting")); ?></h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard.index')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                        	<?php echo e(__('Multiple Currency')); ?>

                        </li>
                    </ol>
                </div>
            </div>
          
        </div>          
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
    <!-- Start Card -->
        <div class="card m-b-30">
            <div class="card-body">
                <div class="box-header with-border">
                    <div class="box-title text-dark mt-20 ml-16">
                        <h5> <?php echo e(__("Currencies")); ?></h5>
                    </div>
                    <button data-toggle="modal" data-target="#addCurrency" type="button"
                        class="pull-right btn btn-primary btn-md mr-16 mt--40">+ Add
                        <?php echo e(__("Currency")); ?></button>
                </div>
                <div class="box-body table-responsive">
                    <table id="currencyTable" class="width100 table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th scope="col"><?php echo e(__("Currency")); ?></th>
                                <th scope="col"><?php echo e(__("Rate")); ?></th>
                                <th scope="col"><?php echo e(__("Additional Fee")); ?></th>
                                <th scope="col"><?php echo e(__("Currency Symbol")); ?></th>
                                <th scope="col"><?php echo e(__("Default currency")); ?></th>
                                <th scope="col"><?php echo e(__("Action")); ?></th>
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
                            <h4 class="modal-title" id="my-modal-title"><?php echo e(__("Add New Currency")); ?></h4>
                            <button class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo e(route('multicurrency.store')); ?>" method="POST" novalidate
                                enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <label><?php echo e(__("Currency Code:")); ?><span class="text-danger">*</span></label>
                                    <input placeholder="<?php echo e(__("eg. USD")); ?>" value="" required class="form-control" type="text"
                                        name="code">
                                </div>
                                <div class="form-group">
                                    <label><?php echo e(__("Additonal Charge:")); ?></label>
                                    <input placeholder="<?php echo e(__("eg. 0.50")); ?>" min="0" step="0.01" value="" class="form-control"
                                        type="number" name="add_amount">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-md">
                                        <i class="fa fa-save"></i> <?php echo e(__("Save")); ?>

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
                        <span id="buttontext"><i class="fa fa-refresh"></i></span> <?php echo e(__('Update Rates')); ?>

                    </a>
                </div>
            </div>
            <br><br>
        </div>
        <!-- End Card -->
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('script'); ?>
    <script>
        $(function () {
            "use strict";
            var table = $('#currencyTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "<?php echo e(route('multicurrency.index')); ?>",
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
                    url: '<?php echo e(route("auto.update.rates")); ?>',

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
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\GYM\resources\views/admin/multicurrency/index.blade.php ENDPATH**/ ?>