
<?php $__env->startSection('title',__('Add Fees')); ?>
<?php $__env->startSection('maincontent'); ?>
<!-- Start Breadcrumbbar -->                    
<?php $__env->startComponent('components.breadcumb',['thirdactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
<?php echo e(__('Fees')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Admin')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu2'); ?>
<?php echo e(__('Add Fees')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('button'); ?>
<div class="col-md-12 col-lg-6 text-right">
    <div class="top-btn-block">
        <a href="<?php echo e(route('fees.index')); ?>" class="btn btn-primary-rgba mr-2"><i
            class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>
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
                    <div class="col-12">
                        <h5 class="card-title mb-0"><?php echo e(__("Add Fees")); ?></h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="admin-form">
                            <?php echo Form::open(['method' => 'POST', 'route' => 'fees.store','files' => true ,'class' =>
                            'form-light form', 'novalidate']); ?>

                            <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('title', 'Fees Title',['class'=>'required']); ?> <span
                                    class="text-danger">*</span>
                                <?php echo Form::text('title', null, ['class' => 'form-control', 'required','placeholder' =>
                                'Please Enter Fees Title']); ?>

                                <small class="text-danger"><?php echo e($errors->first('title')); ?></small>
                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i><?php echo e(__(" Enter Fees Type eg: Cheque, Cash...")); ?> </small>
                            </div>
                            <div class="form-group<?php echo e($errors->has('detail') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('detail', 'Description',['class'=>'required']); ?> <span
                                    class="text-danger">*</span>
                                <?php echo Form::textarea('detail', null, ['id' => 'summernote','class' => 'form-control'
                                ,'required','placeholder' => 'Please Enter Fees Detail']); ?>

                                <small class="text-danger"><?php echo e($errors->first('detail')); ?></small>
                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__("Enter Fees  Detail eg: Installment")); ?> </small>
                            </div>
                            <div class="form-group<?php echo e($errors->has('price') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('price', 'Fees price',['class'=>'required']); ?> <span
                                    class="text-danger">*</span>
                                <?php echo Form::number('price', null, ['min' => '1', 'step' => '0.01', 'class' =>
                                'form-control', 'required','placeholder' => 'Please Enter Fees price']); ?>

                                <small class="text-danger"><?php echo e($errors->first('price')); ?></small>
                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__("Enter Fees Price eg: 1000,2000..")); ?> </small>
                            </div>
                            <div class="form-group<?php echo e($errors->has('offerprice') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('offerprice', 'OfferPrice'); ?> <span class="text-danger">*</span>
                                <?php echo Form::number('offerprice', null, ['min' => '1', 'step' => '0.01', 'class' =>
                                'form-control','placeholder' => 'Please Enter Fees offerprice']); ?>

                                <small class="text-danger"><?php echo e($errors->first('offerprice')); ?></small>
                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__("Enter Fees OfferPrice eg: 900,1900.. ")); ?></small>
                            </div>
                            <div class="form-group<?php echo e($errors->has('slug') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('slug', 'Slug',['class'=>'required']); ?>

                                <?php echo Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Please Enter Slug
                               ']); ?>

                                <small class="text-danger"><?php echo e($errors->first('slug')); ?></small>
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
<!-- End Row -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\GYM\gym_new\resources\views/admin/fees/create.blade.php ENDPATH**/ ?>