
<?php $__env->startSection('title',__('Affilates')); ?>
<?php $__env->startSection('breadcum'); ?>
<div class="breadcrumbbar breadcrumbbar-one">
    <div class="row align-items-center">
        <div class="col-lg-4 col-md-5">
            <h4 class="page-title"><?php echo e(__("Affilates")); ?></h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <?php echo e(__('Affilates')); ?>

                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"><?php echo e(__('Affilates')); ?></h5>
                </div> 
                <div class="card-body">
                    <form class="form" action="<?php echo e(route('save.affilates.update')); ?>" method="POST" novalidate enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label class="text-dark"><?php echo e(__('Refferal_ID Length:')); ?></label>
                                    <input name="ref_id" autofocus="" type="number" min="4"  class="form-control"  placeholder="<?php echo e(__("Please enter Refferal id Limit")); ?>" required="" value="<?php echo e($affilates ? $affilates->ref_id : ""); ?>">
                                    <div class="invalid-feedback">
                                        <?php echo e(__('Please Enter Refferal id Limit')); ?>.
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label class="text-dark"><?php echo e(__('Point per refferal:')); ?></label>
                                    <input name="per_referral" autofocus="" type="number" step="any"  class="form-control" placeholder="<?php echo e(__("Enter Referral for per Point")); ?>" value="<?php echo e($affilates ? $affilates->per_referral : ""); ?>">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group">
                                    <label class="text-dark"><?php echo e(__('Minimum Readme :')); ?></label>
                                    <input name="min_readme" autofocus="" type="number" class="form-control" placeholder="<?php echo e(__("Enter minimum point readme")); ?>" value="<?php echo e($affilates ? $affilates->min_readme : ""); ?>">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group<?php echo e($errors->has('status') ? ' has-error' : ''); ?> switch-main-block">
                                    <div class="custom-switch">
                                        <?php echo Form::checkbox('status', 1,$affilates->status==1 ? 1 : 0, ['id' =>
                                        'switch1', 'class' => 'custom-control-input']); ?>

                                        <label class="custom-control-label" for="switch1"><span><?php echo e(__('Status')); ?></span></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban mr-2"></i><?php echo e(__('Reset')); ?></button>
                                    <button type="submit" class="btn btn-primary-rgba"><i class="feather icon-save mr-2"></i>
                                        <?php echo e(__('Save')); ?></button>
                                </div>          
                            </div>    
                        </div>    
                    </form>
                </div> 
            </div>
        </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\GYM\resources\views/admin/affilates/index.blade.php ENDPATH**/ ?>