
<?php $__env->startSection('title',__('History')); ?>
<?php $__env->startSection('maincontent'); ?>
<?php $__env->startComponent('components.breadcumb',['secondaryactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
<?php echo e(__('History')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('History')); ?>

<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="row">
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-6">
                        <h5 class="card-title mb-0"><?php echo e(__("All History")); ?></h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="payment_history" class="table table-border">
                        <thead>
                            <tr>
                                <th><?php echo e(__("User Name")); ?></th>
                                <th><?php echo e(__("Payment Method")); ?></th>
                                <th><?php echo e(__("Paid Amount")); ?></th>
                                <th><?php echo e(__("Subscription To")); ?></th>
                                <th><?php echo e(__("Subscription From")); ?></th>
                                <th><?php echo e(__("Date")); ?></th>
                            </tr>
                        </thead>
                        <?php if($payment): ?>
                        <?php endif; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End col -->
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('script'); ?>
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
                ajax: "<?php echo e(route('history')); ?>",
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
    <?php $__env->stopSection(); ?>
    
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\gym_new\resources\views/razorpay/show.blade.php ENDPATH**/ ?>