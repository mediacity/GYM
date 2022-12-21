
<?php $__env->startSection('title',__('Add Staff Attendance')); ?>
<?php $__env->startSection('breadcum'); ?>
<div class="breadcrumbbar breadcrumbbar-one">
    <div class="row align-items-center">
        <div class="col-lg-4 col-md-8">
            <h4 class="page-title"><?php echo e(__("Staff Attendance")); ?></h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                    <li class="breadcrumb-item"><a href=""><?php echo e(__('Admin')); ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <?php echo e(__('Add Staff Attendance')); ?>

                    </li>
                </ol>
            </div>
        </div>
        <div class="col-lg-8 col-md-4">
            <div class="top-btn-block text-right">
                <a href="<?php echo e(route('memberattendance.index')); ?>" title="Go back" role="button"
                    class="btn btn-info-rgba mr-2">
                    <?php echo e(__("Member Aattendance")); ?><i class="feather icon-arrow-right ml-2"></i></a>
                <a href="<?php echo e(route('staffattendance.index')); ?>" class="btn btn-primary-rgba mr-2"><i
                class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
<!-- Start Form -->
<form autocomplete="off" class="form-light form" novalidate action="<?php echo e(route('staffattendance.store')); ?>" method="POST">
    <?php echo e(csrf_field()); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title"><?php echo e(__('Staff Attendance Details:')); ?></h1>
                </div>
                <br>
               
                <div class="col-md-12">
                    <div class="row">
                         <!--name-->
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="text-dark"><?php echo e(__("Name:")); ?> <span class="text-danger">*</span></label>
                                <select autofocus="" class="form-control select2" name="user_id">
                                    <option value=""><?php echo e(__("Select One")); ?></option>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['user'];
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
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__("Select your user name eg: John, joe")); ?></small>
                            </div>
                        </div>
                        <!--date-->
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="text-dark"><?php echo e(__("Date:")); ?> <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input value="<?php echo e(old('value')); ?>" name="date" type="text" id="calendar"
                                        class="calendar form-control" placeholder="<?php echo e(__("yyyy/mm/dd")); ?>"
                                        aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2"><i
                                                class="feather icon-calendar"></i></span>
                                    </div>
                                </div>
                                <?php $__errorArgs = ['date'];
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
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__("Choose the Attendance date")); ?></small>
                            </div>
                        </div>
                        <!--date-->
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="text-dark"><?php echo e(__("Comments:")); ?> <span class="text-danger">*</span></label>
                                <input value="<?php echo e(old('comment')); ?>" type="text"
                                    class="form-control <?php $__errorArgs = ['comment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    placeholder="<?php echo e(__("Your comment")); ?>" name="comment" required="">

                                <?php $__errorArgs = ['comment'];
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
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i><?php echo e(__(" Give your reason or comment for your attend details")); ?> </small>
                            </div>
                        </div>
                        <!--Location -->
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group<?php echo e($errors->has('location') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('location', 'Location',['class'=>'required text-dark']); ?> <span
                                    class="text-danger">*</span>
                                <?php echo Form::textarea('location', null, ['id' => 'location','class' => 'form-control'
                                ,'required','placeholder' => 'Your Location']); ?>

                                <small class="text-danger"><?php echo e($errors->first('location')); ?></small>
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i><?php echo e(__(" Your attendance location")); ?></small>

                            </div>
                        </div>
                        <!--height-->
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group member-attendance-slider">
                                <label class="text-dark"><?php echo e(__("Attendance: ")); ?><span class="text-danger">*</span></label><br>
                                <label class="switch"><input type="checkbox" id="togBtn" name="attend">
                                    <div class="slider round">
                                        <!--ADDED HTML -->
                                        <span class="on" value="present"><?php echo e(__("Present")); ?></span><span class="off"
                                            value="absent"><?php echo e(__("Absent")); ?></span>
                                        <!--END-->
                                    </div>
                                </label>
                                <?php $__errorArgs = ['attend'];
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
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
                                <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                                    <?php echo e(__("Create")); ?></button>
                            </div>
                        </div>
                    </div>
                    <div class="clear-both"></div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Form -->
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
    $('.calendar').each(function () {
        $(this).datepicker({
            dateFormat: 'yy-mm-dd',
            minDate: 0
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\GYM\resources\views/admin/staffattendance/create.blade.php ENDPATH**/ ?>