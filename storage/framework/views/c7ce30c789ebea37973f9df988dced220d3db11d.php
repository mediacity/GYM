
<?php $__env->startSection('title',__('Edit Diet Content :eid -',['eid' => $dietcontent->id])); ?>
<?php $__env->startSection('maincontent'); ?>
<!-- Start Breadcrumbbar -->                    
<?php $__env->startComponent('components.breadcumb',['thirdactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
<?php echo e(__('Diet Content')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Admin')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu2'); ?>
<?php echo e(__(' Edit Diet Content')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('button'); ?>
<div class="col-md-12 col-lg-6 text-right">
    <div class="top-btn-block">
        <a href="<?php echo e(route('dietcontent.index')); ?>" class="btn btn-primary-rgba mr-2"><i
            class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>
    </div>
</div>
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title"><?php echo e(__('Edit Diet Contents:')); ?></h1>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <form action="<?php echo e(route('dietcontent.update',$dietcontent->id)); ?>" method="POST"
                                class="form form-light" novalidate>
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <label class="text-dark"><?php echo e(__("Diet Content:")); ?></label>
                                <input type="text" name="content"
                                    class="form-control <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e($dietcontent->content); ?>" >
                                <?php $__errorArgs = ['content'];
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
                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i><?php echo e(__(" Enter the content which your diet needed eg: Tomato, Rice ")); ?></small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="text-dark"><?php echo e(__("Quantity:")); ?></label>
                            <input type="text" name="quantity"
                                class="form-control <?php $__errorArgs = ['quantity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                value="<?php echo e(filter_var($dietcontent->quantity )); ?>" pattern="[0-9]+">
                            <?php $__errorArgs = ['quantity'];
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
                            <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__("Enter the quantity of the mentioned content. For eg: 3 Qty;")); ?></small>
                        </div>
                    </div>
                </div>
            </div>
              <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="text-dark"><?php echo e(__("Calories:")); ?></label>
                            <input type="text" name="calories"
                                class="form-control <?php $__errorArgs = ['calories'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                value="<?php echo e(filter_var($dietcontent->calories)); ?>" pattern="[0-9]+">
                            <?php $__errorArgs = ['calories'];
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
                            <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__("Enter the  caloriess of the content eg:, 20 kcal")); ?></small>
                        </div>
                    </div>
                </div>
            </div>
              <div class="col-md-6">
                <div class="form-group<?php echo e($errors->has('is_active') ? ' has-error' : ''); ?> switch-main-block">
                    <div class="custom-switch">
                        <?php echo Form::checkbox('is_active', 1,$dietcontent->is_active==1 ? 1 : 0,
                        ['id' => 'switch1', 'class' => 'custom-control-input']); ?>

                        <label class="custom-control-label" for="switch1"><?php echo e(__("Is Active")); ?></label>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
                    <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i> <?php echo e(__("Update")); ?></button>
                </div>
            </div>
            <div class="clear-both"></div>
            </form>
        </div>
     </div>
</div>
</div>
</div>
<!-- End Contentbar -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\GYM\gym_new\resources\views/admin/diet/dietcontent/edit.blade.php ENDPATH**/ ?>