
<?php $__env->startSection('title',__('Term & Condition')); ?>
<?php $__env->startSection('maincontent'); ?>
<!-- Start Breadcrumbbar -->
<?php $__env->startComponent('components.breadcumb',['thirdactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
<?php echo e(__('Home')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Admin')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu2'); ?>
<?php echo e(__(' Term & Condition')); ?>

<?php $__env->endSlot(); ?>

<?php echo $__env->renderComponent(); ?>
<!-- End Breadcrumbbar -->
<!-- Start row -->
<div class="row">
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-6">
                        <h5 class="card-title mb-0"><?php echo e(__("Term & Condition")); ?></h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="admin-form">
                            <form action="<?php echo e(route('term-condition-update')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                                <label for="title">Title</label> <span class="text-danger">*</span>
                                <input type="text" name="title" value="<?php echo e($pages?$pages->title:''); ?>" class="form-control" placeholder="Enter Title" required>
                                <small class="text-danger"><?php echo e($errors->first('title')); ?></small>
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i><?php echo e(__(" Enter Title : Privacy Policy..")); ?></small>
                            </div>
                            <div class="form-group<?php echo e($errors->has('detail') ? ' has-error' : ''); ?>">
                                <label for="detail">Detail</label><span class="text-danger">*</span>
                         
                                <textarea name="detail" id="summernote" cols="30" rows="10" class="form-control" required><?php echo e($pages?$pages->detail:''); ?></textarea>
                                <small class="text-danger"><?php echo e($errors->first('detail')); ?></small>
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__("Enter Details according to Title")); ?></small>
                            </div>
                            <div class="form-group">
                                <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
                                <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                                    <?php echo e(__("Update")); ?></button>
                            </div>
                            <div class="clear-both"></div>
</form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- End row -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\GYM\gym_new\resources\views/admin/pages/terms.blade.php ENDPATH**/ ?>