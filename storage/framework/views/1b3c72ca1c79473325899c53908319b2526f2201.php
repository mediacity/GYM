
<?php $__env->startSection('title',__('Add Exercise Type')); ?>
<?php $__env->startSection('maincontent'); ?>
<!-- Start Breadcrumbbar -->                    
<?php $__env->startComponent('components.breadcumb',['thirdactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
<?php echo e(__('Type')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Admin')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu2'); ?>
<?php echo e(__('Add Type')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('button'); ?>
<div class="col-md-12 col-lg-6 text-right">
    <div class="top-btn-block">
        <a href="<?php echo e(route('type.index')); ?>" class="btn btn-primary-rgba mr-2"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>
    </div>
</div>
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
                        <h5 class="card-title mb-0"><?php echo e(__("Add Exercise Type")); ?></h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="admin-form">
                            <?php echo Form::open(['method' => 'POST', 'route' => 'type.store','files' => true , 'class' =>
                            'form form-light' ,'novalidate']); ?>

                            <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('name', 'Exercise Type',['class'=>'required']); ?><span
                                    class="text-danger">*</span></label>
                                <?php echo Form::text('name', null, ['class' => 'form-control', 'required','placeholder' =>
                                'Please Enter Exercise Name']); ?>

                                <small class="text-danger"><?php echo e($errors->first('title')); ?></small>
                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(("Enter the exercise  Type : Traditional pushup , Clap Pushup")); ?>}}</small>
                            </div>
                            <div
                                class="form-group<?php echo e($errors->has('is_active') ? ' has-error' : ''); ?> switch-main-block">
                                <div class="custom-switch">
                                    <?php echo Form::checkbox('is_active', 1,1, ['id' => 'switch1', 'class' =>
                                    'custom-control-input']); ?>

                                    <label class="custom-control-label" for="switch1"><?php echo e(__("Is Active")); ?></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
                                <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                                    <?php echo e(__("Create")); ?></button>
                            </div>
                            <div class="clear-both"></div>
                            <?php echo Form::close(); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End row -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\GYM\gym_new\resources\views/admin/type/create.blade.php ENDPATH**/ ?>