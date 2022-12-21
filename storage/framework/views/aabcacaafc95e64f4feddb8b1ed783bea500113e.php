
<?php $__env->startSection('title',__('Edit Appointment :aid -',['aid' => $appointment->id])); ?>
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
                        <?php echo e(__('Edit Appointment')); ?>

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
<!-- Start Row -->
<div class="row">
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-12">
                        <h5 class="card-title mb-0"><?php echo e(__('Edit Appointment')); ?></h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="admin-form">
                    <?php echo Form::model($appointment, ['method' => 'PATCH', 'route' =>
                    ['appointment.update', $appointment->id], 'files' => true , 'class' => 'form form-light',
                    'novalidate']); ?>                   
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group<?php echo e($errors->has('user id') ? ' has-error' : ''); ?>">
                                    <label for="cars"><?php echo e(__('Choose a user id')); ?><span class="text-danger">*</span></label>
                                    <select data-placeholder="<?php echo e(__("Please select user")); ?>" class="form-control select2"
                                        name="user_id">
                                        <option value=""><?php echo e(__('Select one')); ?></option>
                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php echo e($appointment['userid'] == $user->id ? "selected" : ""); ?>

                                            value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__('Select userid: Admin,Mrx')); ?> </small>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group<?php echo e($errors->has('service id') ? ' has-error' : ''); ?>">
                                    <label for="cars"><?php echo e(__("Choose a service id:")); ?><span class="text-danger">*</span></label>
                                    <select data-placeholder="<?php echo e(__("Please select group")); ?>" class="form-control select2"
                                        name="service">
                                        <option value=""><?php echo e(__("Select one")); ?></option>
                                        <?php $__currentLoopData = $service; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <option <?php echo e($appointment['serviceid'] == $service->id ? "selected" : ""); ?>

                                            value="<?php echo e($service->id); ?>"><?php echo e($service->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i><?php echo e(__(" Select the service")); ?>

                                    </small>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group<?php echo e($errors->has('status') ? ' has-error' : ''); ?>">
                                    <label class=" text-dark" for="status"><?php echo e(__("Choose a select status:")); ?><span class="text-danger"
                                            class="text-dark">*</span></label>
                                    <select data-placeholder="<?php echo e(__("Please select status")); ?>" class="form-control select2"
                                        name="appointment_status">
                                        <option selected> <?php echo e(__("Please select status ")); ?></option>
                                        <option <?php echo e($appointment->appointment_status =='No Action' ? "selected" : ""); ?>

                                            value="No Action"><?php echo e(__("No Action")); ?></option>
                                        <option <?php echo e($appointment->appointment_status =='Attended' ? "selected" : ""); ?>

                                            value="Attended "> <?php echo e(__("Attended")); ?></option>
                                        <option <?php echo e($appointment->appointment_status =='No show' ? "selected" : ""); ?>

                                            value="Measurement"><?php echo e(__("No show")); ?></option>
                                        <option <?php echo e($appointment->appointment_status =='Open' ? "selected" : ""); ?>

                                            value="Lockers"><?php echo e(__("Open")); ?></option>
                                        <option <?php echo e($appointment->appointment_status =='Cancelled' ? "selected" : ""); ?>

                                            value="Exercises"><?php echo e(__("Cancelled")); ?></option>
                                    </select>
                                </div>
                            </div>      
                            <div class="col-lg-12 col-md-12">   
                                <div class="form-group<?php echo e($errors->has('detail') ? ' has-error' : ''); ?>">
                                    <?php echo Form::label('detail', 'Description',['class'=>'required']); ?>

                                    <?php echo Form::textarea('detail', null, ['id' => 'summernote','class' => 'form-control'
                                    ,'required','placeholder' => 'Please Enter Package Detail']); ?>

                                    <small class="text-danger"><?php echo e($errors->first('detail')); ?></small>
                                    <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__("Add a  Package Description:This is some basic description")); ?></small>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="text-dark" for="calendar"><?php echo e(__("Appointment Assigned")); ?></label>
                                    <input value="<?php echo e(filter_var($appointment->from)); ?>" class="form-control calendar" type="text"
                                    id="calendar1" name="from">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="text-dark" for="calendar"><?php echo e(__("Appointment Expiration")); ?></label>
                                    <input value="<?php echo e($appointment->to); ?>" class="form-control calendar" type="text"
                                            id="calendar2" name="to">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 mt-4">
                                <div class="form-group<?php echo e($errors->has('comment') ? ' has-error' : ''); ?>">
                                    <?php echo Form::label('comment', 'Comment',['class'=>'required']); ?>

                                    <?php echo Form::text('comment', null, ['id' => 'summernote','class' => 'form-control'
                                    ,'required','placeholder' => 'Please Enter Comment']); ?>

                                    <small class="text-danger"><?php echo e($errors->first('comment')); ?></small>
                                    <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> 8</small>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group<?php echo e($errors->has('is_active') ? ' has-error' : ''); ?> switch-main-block">
                                    <label class="text-dark" ><?php echo e(__("Status")); ?></label>
                                    <div class="custom-switch">
                                        <?php echo Form::checkbox('is_active', 1,$appointment->is_active==1 ? 1
                                        : 0, ['id' => 'switch1', 'class' => 'custom-control-input']); ?>

                                        <label class="custom-control-label" for="switch1"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i>
                                        <?php echo e(__("Reset")); ?></button>
                                    <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                                        <?php echo e(__("Update")); ?></button>
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
</div>
<!-- End Row -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\GYM\resources\views/admin/appointment/edit.blade.php ENDPATH**/ ?>