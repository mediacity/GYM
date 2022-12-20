
<?php $__env->startSection('title',__('Add Appointmentsetting')); ?>
<?php $__env->startSection('breadcum'); ?>
<div class="breadcrumbbar breadcrumbbar-one">
    <div class="row align-items-center">
        <div class="col-lg-4 col-md-8">
            <h4 class="page-title"><?php echo e(__("Appointment Setting")); ?></h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                    <li class="breadcrumb-item"><a href=""><?php echo e(__('Admin')); ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <?php echo e(__('Add Appointment Setting')); ?>

                    </li>
                </ol>
            </div>
        </div>
        <div class="col-lg-8 col-md-4">
            <div class="top-btn-block text-right">
                <a href="<?php echo e(route('appointmentsetting.index')); ?>" class="btn btn-primary-rgba mr-2"><i
                class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
<!-- Start Contentbar -->
<div class="row">
    <!-- Start col -->
    <div class="col-lg-12">
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="alert alert-danger" role="alert">
            <?php echo e($message); ?>

        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div class="card m-b-30">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-12">
                        <h5 class="card-title mb-0"><?php echo e(__("Create Appointmentsetting")); ?></h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="admin-form">
                            <?php echo Form::open(['method' => 'POST', 'route' => 'appointmentsetting.store','files' => true]); ?>

                            <div class="form-group<?php echo e($errors->has('slot') ? ' has-error' : ''); ?>">
                                <label class="text-dark" for="cars"><?php echo e(__("Choose a Slot time:")); ?><span class="text-danger"
                                        class="text-dark">*</span></label>
                                <select data-placeholder=<?php echo e(__('Please select slot time')); ?> class="form-control select2"
                                    multiple="multiple" name="slot[]">
                                    <option><?php echo e(__("Please select slot")); ?></option>
                                    <option value="5.00am"><?php echo e(__("5.00am")); ?></option>
                                    <option value="6.00am"><?php echo e(__("6.00am")); ?></option>
                                    <option value="7.00am"><?php echo e(__("7.00am")); ?></option>
                                    <option value="8.00am"><?php echo e(__("8.00am")); ?></option>
                                    <option value="9.00am"><?php echo e(__("9.00am")); ?></option>
                                    <option value="10.00am"><?php echo e(__("10.00am")); ?></option>
                                    <option value="11.00am"><?php echo e(__("11.00am")); ?></option>
                                    <option value="12.00am"><?php echo e(__("12.00am")); ?></option>
                                    <option value="1.00pm"><?php echo e(__("1.00pm")); ?></option>
                                    <option value="2.00pm"><?php echo e(__("2.00pm")); ?></option>
                                    <option value="3.00pm"><?php echo e(__("3.00pm")); ?></option>
                                    <option value="4.00pm"><?php echo e(__("4.00pm")); ?></option>
                                    <option value="5.00pm"><?php echo e(__("5.00pm")); ?></option>
                                    <option value="6.00pm"><?php echo e(__("6.00pm")); ?></option>
                                    <option value="7.00pm"><?php echo e(__("7.00pm")); ?></option>
                                    <option value="8.00pm"><?php echo e(__("8.00pm")); ?></option>
                                    <option value="9.00pm"><?php echo e(__("9.00pm")); ?></option>
                                    <option value="10.00pm"><?php echo e(__("10.00pm")); ?></option>
                                    <option value="11.00pm"><?php echo e(__("11.00pm")); ?></option>
                                    <option value="12.00pm"><?php echo e(__("12.00pm")); ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="admin-form">
                            <div class="text-dark"
                                class="form-group<?php echo e($errors->has('is_active') ? ' has-error' : ''); ?> switch-main-block">
                                <div class="custom-switch">
                                    <?php echo Form::checkbox('is_active', 1,1, ['id' => 'switch1', 'class' =>
                                    'custom-control-input']); ?>

                                    <label class="custom-control-label" for="switch1"><span><?php echo e(__("Status")); ?></span></label>
                                </div>
                            </div>
                        </div><br>
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
<!-- End Contentbar -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\GYM\resources\views/admin/appointmentsetting/index.blade.php ENDPATH**/ ?>