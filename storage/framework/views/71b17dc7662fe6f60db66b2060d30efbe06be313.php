
<?php $__env->startSection('title',__('Invoice Setting')); ?>
<!-- Start Breadcrumbbar -->
<?php $__env->startSection('breadcum'); ?>
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title"><?php echo e(__("Invoice Settings")); ?></h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>"><?php echo e(__('Home')); ?></a></li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard.index')); ?>"><?php echo e(__('Dashboard')); ?></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <?php echo e(__('Site Settings')); ?>

                    </li>
                </ol>
            </div>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>
<!-- Start Breadcrumbbar -->
<!-- Start Contentbar -->
<?php $__env->startSection('maincontent'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title"><?php echo e(__('Invoice Settings')); ?></h5>
            </div>
            <div class="card-body">
                <form class="form" action="<?php echo e(route('invoice.settings.update')); ?>" method="POST" novalidate
                    enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="text-dark"><?php echo e(__('Terms And Condition:')); ?></label>
                                <input name="term_condition" autofocus="" type="text" class="form-control"
                                    placeholder="<?php echo e(__("enter terms and condition")); ?>" required=""
                                    value="<?php echo e($invoice ? $invoice->term_condition : ""); ?>">
                                <div class="invalid-feedback">
                                    <?php echo e(__('Please enter site title !')); ?>.
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="text-dark"><?php echo e(__('Name:')); ?></label>
                                <input name="name" autofocus="" type="text" class="form-control" placeholder="<?php echo e(__("enter your name")); ?>"
                                    value="<?php echo e($invoice ? $invoice->name : ""); ?>">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="text-dark"><?php echo e(__('Phone:')); ?></label>
                                <input name="phone" autofocus="" type="number" pattern="[0-9]{10}" class="form-control"
                                    placeholder="<?php echo e(__("enter your mobileno")); ?>" value="<?php echo e($invoice ? $invoice->phone : ""); ?>">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label><?php echo e(__("Add Signature:")); ?></label><span class="text-danger">*</span>
                                <input required="" type="file" class="form-control" name="signature" id="signature" />
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="text-dark"><?php echo e(__(' Email:')); ?></label>
                                <input name="email" autofocus="" type="email" class="form-control"
                                    placeholder="<?php echo e(__("enter your email")); ?>" required="" value="<?php echo e($invoice ? $invoice->email : ""); ?>">
                                <div class="invalid-feedback">
                                    <?php echo e(__('Please Enter support email !')); ?>.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <button type="submit" class="btn btn-primary-rgba"><i class="feather icon-save mr-2"></i>
                            <?php echo e(__('Save')); ?></button>
                    </div>

                </form>

            </div>
        </div>


    </div>
</div>
<br>
<?php $__env->stopSection(); ?>
<!-- End Contentbar -->
<?php $__env->startSection('scripts'); ?>
<script>
    $("#signature").on('change', function () {
        readURL1(this);
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\GYM\resources\views/admin/invoice/invoice.blade.php ENDPATH**/ ?>