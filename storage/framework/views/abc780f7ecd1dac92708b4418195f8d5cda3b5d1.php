
<?php $__env->startSection('title',__("Add Appointment")); ?>
<?php $__env->startSection('breadcum'); ?>
<div class="breadcrumbbar breadcrumbbar-one">
    <div class="row align-items-center">
        <div class="col-lg-4 col-md-8">
            <h4 class="page-title"><?php echo e(__("Appointment")); ?></h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                    <li class="breadcrumb-item"><a href=""><?php echo e(__('Admin')); ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <?php echo e(__('Add Appointment')); ?>

                    </li>
                </ol>
            </div>
        </div>
        <div class="col-lg-8 col-md-4">
            <div class="top-btn-block text-right">
                <a href="<?php echo e(route('appointment.index')); ?>" class="btn btn-primary-rgba mr-2"><i
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
                        <h5 class="card-title mb-0"><?php echo e(__("Add Appointment")); ?></h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="admin-form">
                    <?php echo Form::open(['method' => 'POST', 'route' => 'appointment.store','files' => true , 'class'
                    => 'form form-light', 'novalidate']); ?>

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group<?php echo e($errors->has('user id') ? ' has-error' : ''); ?>">
                                    <label class="text-dark" for="cars"><?php echo e(__("Choose a User Name:")); ?><span
                                            class="text-danger">*</span></label>
                                    <select data-placeholder="<?php echo e(__('Please select user')); ?>" class="form-control select2"
                                        name="userid">
                                        <option value=""><?php echo e(__("Select One")); ?></option>
                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__("Select the user:Admin, Mr.X")); ?></small>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group<?php echo e($errors->has('service id') ? ' has-error' : ''); ?>">
                                    <label class="text-dark" for="cars"><?php echo e(__("Choose a Service")); ?><span
                                            class="text-danger">*</span></label>
                                    <select data-placeholder="<?php echo e(__('Please select group')); ?>" class="form-control select2"
                                        name="serviceid">
                                        <option value=""><?php echo e(__("Select One")); ?></option>
                                        <?php $__currentLoopData = $service; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($service->id); ?>"><?php echo e($service->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__("Select the Service")); ?>

                                    </small>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group<?php echo e($errors->has('status') ? ' has-error' : ''); ?>">
                                    <label class=" text-dark" for="status"><?php echo e(__("Choose a Select Status")); ?><span class="text-danger" class="text-dark">*</span></label>
                                    <select data-placeholder="<?php echo e(__("Please select status")); ?>" class="form-control select2" name="appointment_status">
                                        <option  selected><?php echo e(__("Please Select Status")); ?></option>
                                        <option value="No Action"><?php echo e(__("No Action")); ?></option>
                                        <option value="Attended"> <?php echo e(__("Attended")); ?></option>
                                        <option value="No show"><?php echo e(__("No Show")); ?></option>
                                        <option value="Open"><?php echo e(__("Open")); ?></option>
                                        <option value="Cancelled"><?php echo e(__("Cancelled")); ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <label for=""><?php echo e(__("Text Color:")); ?></label>
                                <input class="form-control" type="color" value=" name="detailcolor">
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group<?php echo e($errors->has('detail') ? ' has-error' : ''); ?>">
                                    <?php echo Form::label('detail', 'Description',['class'=>'required']); ?><span
                                        class="text-danger">*</span>
                                    <?php echo Form::textarea('detail', null, ['id' => 'summernote','class' => 'form-control'
                                    ,'required','placeholder' => 'Please Enter Package Detail']); ?>

                                    <small class="text-danger"><?php echo e($errors->first('detail')); ?></small>
                                    <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i><?php echo e(__("Enter Description")); ?></small>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label class="text-dark" for="calendar"><?php echo e(__("Appointment Date")); ?><span class="text-danger">*</span></label>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <label class="text-dark" for="calendar"><?php echo e(__("Appointment Assigned")); ?></label>
                                            <div class="input-group">
                                                <input value="<?php echo e(old('from')); ?>"
                                                    class="form-control calendar <?php $__errorArgs = ['from'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    type="text" id="calendar1" name="from">
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon2"><i
                                                            class="feather icon-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <label class="text-dark" for="calendar"><?php echo e(__("Appointment Experiation")); ?></label>
                                            <div class="input-group">
                                                <input value="<?php echo e(old('to')); ?>" class="form-control calendar" type="text"
                                                    id="calendar2" name="to">
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon2"><i
                                                            class="feather icon-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group<?php echo e($errors->has('comment') ? ' has-error' : ''); ?>">
                                    <?php echo Form::label('comment', 'Comment'); ?>

                                    <?php echo Form::text('comment', null, ['id' => 'summernote','class' => 'form-control'
                                    ,'placeholder' => 'Please Enter Comment']); ?>

                                    <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> 
                                        <?php echo e(__("Enter Comment")); ?></small>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <div class="text-dark"
                                        class="form-group<?php echo e($errors->has('is_active') ? ' has-error' : ''); ?> switch-main-block">
                                        <div class="custom-switch">
                                            <?php echo Form::checkbox('is_active', 1,1, ['id' => 'switch1', 'class' =>
                                            'custom-control-input']); ?>

                                            <label class="custom-control-label" for="switch1"><span><?php echo e(__("Status")); ?></span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i><?php echo e(__("Reset")); ?></button>
                                    <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                                        <?php echo e(__("Create")); ?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clear-both"></div>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<!-- End Contentbar -->
<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\GYM\resources\views/admin/appointment/create.blade.php ENDPATH**/ ?>