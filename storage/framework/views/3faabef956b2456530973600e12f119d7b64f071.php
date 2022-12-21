
<?php $__env->startSection('title',__(' Key')); ?>
<?php $__env->startSection('breadcum'); ?>
	<div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title"><?php echo e(__("One Signal")); ?></h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard.index')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                        	<?php echo e(__('One Signal')); ?>

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
        <div class="col-md-12">
            <div class="card-header">
                <div class="box-header">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <h5 class="card-title mb-0"><?php echo e(__("One Signal")); ?></h5>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="one-signal-key">
                                <a title="Get one signal keys" href="https://onesignal.com/" class="" target="__blank">
                                    <i class="fa fa-key"></i> <?php echo e(__("Get your keys from here")); ?>

                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('admin.onesignal.keys')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label for="ONESIGNAL_APP_ID"><?php echo e(__("ONESIGNAL APP ID: ")); ?><span
                                        class="text-danger">*</span></label>
                                <input type="text" value="<?php echo e(env('ONESIGNAL_APP_ID')); ?>" name="ONESIGNAL_APP_ID"
                                    placeholder="<?php echo e(__("Enter ONESIGNAL APP ID " )); ?>"id="ONESIGNAL_APP_ID" type=""
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label for="ONESIGNAL_REST_API_KEY"><?php echo e(__(" ONESIGNAL REST API KEY: ")); ?><span
                                        class="text-danger">*</span></label>
                                <input type="text" value="<?php echo e(env('ONESIGNAL_REST_API_KEY')); ?>"
                                    name="ONESIGNAL_REST_API_KEY" placeholder="<?php echo e(__("Enter ONESIGNAL REST API KEY ")); ?>"
                                    id="ONESIGNAL_REST_API_KEY" type="" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-md">
                            <i class="fa fa-save"></i> <?php echo e(__("Save Keys")); ?>

                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- End Card -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\GYM\resources\views/admin/notification/index.blade.php ENDPATH**/ ?>