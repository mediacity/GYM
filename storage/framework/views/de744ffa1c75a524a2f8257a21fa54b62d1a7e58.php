
<?php $__env->startSection('title',__('Edit Diet Session :eid -',['eid' => $dietid->id])); ?>
<?php $__env->startSection('breadcum'); ?>
<div class="breadcrumbbar breadcrumbbar-one">
    <div class="row align-items-center">
        <div class="col-lg-4 col-md-8">
            <h4 class="page-title"><?php echo e(__("Diet Session")); ?></h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                    <li class="breadcrumb-item"><a href=""><?php echo e(__('Admin')); ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <?php echo e(__('Edit Diet Session')); ?>

                    </li>
                </ol>
            </div>
        </div>
        <?php if(auth()->user()->can('users.add')): ?>
        <div class="col-lg-8 col-md-4">
            <div class="top-btn-block text-right">
                <a href="<?php echo e(route('dietid.index')); ?>" class="btn btn-primary-rgba mr-2"><i
                class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
<!--Form without header-->
<form action="<?php echo e(route('dietid.update',$dietid->id)); ?>" method="POST" class="form-light form" novalidate>
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                 <div class="card-header">
                    <h1 class="card-title" ><?php echo e(__('Edit your session for Diet:')); ?></h1>
                </div>
                <br>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="text-dark"><?php echo e(__("Diet Session:")); ?> <span class="text-danger">*</span></label>
                                <input value="<?php echo e($dietid->session_id); ?>" autofocus="" type="text"
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
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__("Enter the session for diet eg: Morning, Evening")); ?></small>
                            </div>
                        </div>
                    </div>
                    <!--Is Active-->
                    <div class="text-dark"
                        class="form-group<?php echo e($errors->has('is_active') ? ' has-error' : ''); ?> switch-main-block">
                        <div class="custom-switch">
                            <?php echo Form::checkbox('is_active', 1,$dietid->is_active==1 ? 1 : 0,
                            ['id' => 'switch1', 'class' => 'custom-control-input']); ?>

                            <label class="custom-control-label" for="switch1"><span><?php echo e(__("Status")); ?></span></label>
                        </div>
                    </div>
                </div>
                <br>
                <div class="col-md-6">
                    <div class="form-group">
                        <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
                        <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i> <?php echo e(__("Update")); ?></button>
                    </div>
                </div>
                <div class="clear-both"></div>
        </form>
</div>
<!--End-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\GYM\resources\views/admin/diet/dietid/edit.blade.php ENDPATH**/ ?>