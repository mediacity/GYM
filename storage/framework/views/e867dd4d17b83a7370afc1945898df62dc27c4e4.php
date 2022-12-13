
<?php $__env->startSection('title',__('Add Diet Session')); ?>
<?php $__env->startSection('maincontent'); ?>
<!-- Start Breadcrumbbar -->
<?php $__env->startComponent('components.breadcumb',['thirdactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
<?php echo e(__('Diet Session')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Admin')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu2'); ?>
<?php echo e(__('Add diet session')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('button'); ?>
<div class="col-md-12 col-lg-6 text-right">
    <div class="top-btn-block">
        <a href="<?php echo e(route('dietid.index')); ?>" class="btn btn-primary-rgba mr-2"><i
            class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>
    </div>
</div>
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<!-- End Breadcrumbbar -->
<form class="form-light form" action="<?php echo e(route('dietid.store')); ?>" novalidate method="POST">
    <?php echo e((csrf_field())); ?>

    <!--Form without header-->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title"><?php echo e(__('Add a session for Diet:')); ?></h1>
                </div>
                <br>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="text-dark"><?php echo e(__("Diet Session: ")); ?><span class="text-danger">*</span></label>
                                <input value="<?php echo e(old('session_id')); ?>" autofocus="" type="text"
                                    class="form-control <?php $__errorArgs = ['session_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    placeholder="<?php echo e(__('Enter Diet Session')); ?>" name="session_id" required="">

                                <?php $__errorArgs = ['session_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__("Enter the session for diet eg: Morning, Evening")); ?></small>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Is Active-->
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div
                                    class="text-dark form-group<?php echo e($errors->has('is_active') ? 'has-error' : ''); ?> switch-main-block">
                                    <div class="custom-switch">
                                        <?php echo Form::checkbox('is_active', 1,1, ['id' => 'switch1', 'class' =>'custom-control-input']); ?>

                                        <label class="custom-control-label" for="switch1"><?php echo e(__("Is Active")); ?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
                        <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                            <?php echo e(__("Create")); ?></button>
                    </div>
                </div>
                <div class="clear-both"></div>
</form>
</div>
<!--Form -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\GYM\gym_new\resources\views/admin/diet/dietid/create.blade.php ENDPATH**/ ?>