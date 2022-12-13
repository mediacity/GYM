<?php $__env->startSection('title',__('Add Faq')); ?>
<?php $__env->startSection('maincontent'); ?>
<!-- Start Breadcrumbbar -->
<?php $__env->startComponent('components.breadcumb',['thirdactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
<?php echo e(__('Faq')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Admin')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu2'); ?>
<?php echo e(__('Add Faq')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('button'); ?>

<div class="col-md-6 col-lg-6">
    <a href="<?php echo e(route('faq.index')); ?>" class="float-right btn btn-primary-rgba mr-2"><i
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
                        <h5 class="card-title mb-0"><?php echo e(__("Add Faq")); ?></h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="admin-form">
                            <?php echo Form::open(['method' => 'POST', 'route' => 'faq.store','files' => true , 'class' =>
                            'form form-light' ,'novalidate']); ?>

                            <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('title', 'Question',['class'=>'required']); ?><span
                                    class="text-danger">*</span>
                                <?php echo Form::text('title', null, ['class' => 'form-control', 'required','placeholder' =>
                                'Please Enter Question']); ?>

                                <small class="text-danger"><?php echo e($errors->first('title')); ?></small>
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>
                                    <?php echo e(__("Add questions related to Gym")); ?></small>
                            </div>
                            <div class="form-group<?php echo e($errors->has('details') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('details', 'Answer',['class'=>'required']); ?><span
                                    class="text-danger">*</span>
                                <?php echo Form::textarea('details', null, ['id' => 'summernote','class' => 'form-control'
                                ,'required','placeholder' => 'Please Enter Answer']); ?>

                                <small class="text-danger"><?php echo e($errors->first('details')); ?></small>
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>
                                    <?php echo e(__("Add Answer....")); ?></small>
                            </div>
                            <div class="form-group<?php echo e($errors->has('status') ? ' has-error' : ''); ?> switch-main-block">
                                <div class="custom-switch">
                                    <?php echo Form::checkbox('status', 1,1, ['id' => 'switch1', 'class' =>
                                    'custom-control-input']); ?>

                                    <label class="custom-control-label" for="switch1"><?php echo e(__("Status")); ?></label>
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
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\GYM\gym_new\resources\views/admin/faq/create.blade.php ENDPATH**/ ?>