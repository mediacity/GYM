<?php $__env->startSection('title',__('Add Pages ')); ?>
<?php $__env->startSection('maincontent'); ?>
<!-- Start Breadcrumbbar -->
<?php $__env->startComponent('components.breadcumb',['thirdactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
<?php echo e(__('Page')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Admin')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu2'); ?>
<?php echo e(__('Create')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('button'); ?>
<div class="col-md-6 col-lg-6">
    <a href="<?php echo e(route('pages.index')); ?>" class="float-right btn btn-primary-rgba mr-2"><i
            class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>
</div>
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<!-- End Breadcrumbbar -->
<!-- Start Row -->
<div class="row">
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-12">
                        <h5 class="card-title mb-0"><?php echo e(__("Add Pages")); ?></h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="admin-form">
                            <?php echo Form::open(['method' => 'POST', 'route' => 'pages.store','files' => true , 'class' =>
                            'form form-light' ,'novalidate']); ?>

                            <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('title', 'Page Title',['class'=>'required']); ?> <span
                                    class="text-danger">*</span>
                                <?php echo Form::text('title', null, ['class' => 'form-control', 'required','placeholder' =>
                                'Please Enter Page Title']); ?>

                                <small class="text-danger"><?php echo e($errors->first('title')); ?></small>
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>
                                  <?php echo e(__("  Enter page Title : Return Policy, Terms and Condition..")); ?></small>
                            </div>
                            <div class="form-group<?php echo e($errors->has('aboutus') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('aboutus', 'Page Aboutus',['class'=>'required']); ?> <span
                                    class="text-danger">*</span>
                                <?php echo Form::text('aboutus', null, ['class' => 'form-control', 'required','placeholder' =>
                                'Please Enter Page Aboutus']); ?>

                                <small class="text-danger"><?php echo e($errors->first('aboutus')); ?></small>
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>
                                    <?php echo e(__("Enter page Aboutus : XYZ...")); ?></small>
                            </div>
                            <div class="form-group<?php echo e($errors->has('detail') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('detail', 'Description',['class'=>'required']); ?> <span
                                    class="text-danger">*</span>
                                <?php echo Form::textarea('detail', null, ['id' => 'summernote','class' => 'form-control'
                                ,'required' ,'placeholder' => ' Please Enter Page Title']); ?>

                                <small class="text-danger"><?php echo e($errors->first('detail')); ?></small>
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>
                                   <?php echo e(__(" Enter Details according to Title")); ?></small>
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
</div>
<!-- End Row -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\GYM\gym_new\resources\views/admin/pages/create.blade.php ENDPATH**/ ?>