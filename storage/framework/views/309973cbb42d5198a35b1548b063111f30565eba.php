
<?php $__env->startSection('title',__('Edit Member Attendance :eid -',['eid' => $memberattendance->id])); ?>
<?php $__env->startSection('maincontent'); ?>
<!-- Start Breadcrumbbar -->                    
<?php $__env->startComponent('components.breadcumb',['thirdactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
<?php echo e(__('Attendance')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Admin')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu2'); ?>
<?php echo e(__(' Edit Member Attendance')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('button'); ?>
<div class="col-md-6 col-lg-6">
    <a href="<?php echo e(route('memberattendance.index')); ?>" class="float-right btn btn-primary-rgba mr-2"><i
            class="feather icon-arrow-left mr-2"></i><?php echo e(__("Create")); ?></a>
    <a href="<?php echo e(route('staffattendance.index')); ?>" title="Go To Staff Attendance" role="button"
        class="float-right btn btn-primary-rgba mr-2"><i class="feather icon-arrow-right"></i>
       <?php echo e(__(" Staff Aattendance")); ?></a>
</div>
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<!-- End Breadcrumbbar -->
<!-- Start Form -->
<form autocomplete="off" class="form-light form" novalidate
    action="<?php echo e(route('memberattendance.update', $memberattendance->id)); ?>" method="POST">
    <?php echo e(csrf_field()); ?>

    <?php echo method_field('PUT'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title"><?php echo e(__('Edit Attendance Details:')); ?></h1>
                </div>
            <br>
             <!--name-->
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="text-dark"><?php echo e(__(" Name:")); ?></label>
                                <select required="" name="user_id" id="user_id"
                                    class="<?php $__errorArgs = ['user_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> form-control select2">
                                    <option value=""><?php echo e(__("Select one")); ?></option>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php echo e($memberattendance['user_id'] == $user->id ? "selected" : ""); ?>

                                        value="<?php echo e($user->id); ?>">
                                        <?php echo e($user->name); ?> </option>
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
                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i><?php echo e(__(" Select your user name eg: John, joe")); ?></small>
                            </div>
                        </div>
                    </div>
                </div>
                  <!--Location -->
                   <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group<?php echo e($errors->has('location') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('location', 'Location',['class'=>'required text-dark']); ?> <span
                                    class="text-danger">*</span>
                                <?php echo Form::textarea('location', $memberattendance->location, ['id' => 'location','class'
                                => 'form-control' ,'required','placeholder' => 'Your Location']); ?>

                                <small class="text-danger"><?php echo e($errors->first('location')); ?></small>
                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__("Your attendance location")); ?></small>
                            </div>
                        </div>
                    </div>
                </div>
                 <!--Attend details-->
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="text-dark"><?php echo e(__("Attendance: ")); ?><span class="text-danger">*</span></label><br>
                                <label class="switch"><input type="checkbox" id="togBtn" name="attend"
                                        <?php echo e($memberattendance->attend == 'present' ? 'checked' : ''); ?> >
                                    <div class="slider round">
                                        <!--ADDED HTML -->
                                        <span class="on" ><?php echo e(__("Present")); ?></span><span class="off"
                                            ><?php echo e(__("Absent")); ?></span>
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
                </div>
                 <!--date-->
                  <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="text-dark"><?php echo e(__("Date:")); ?> <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input value="<?php echo e($memberattendance->date); ?>" name="date" type="text" id="calendar"
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
                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__("Choose the Attendance date")); ?></small>
                            </div>
                        </div>
                    </div>
                </div>
                 <!--date-->
                  <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="text-dark"><?php echo e(__("Comments: ")); ?><span class="text-danger">*</span></label>
                                <input value="<?php echo e($memberattendance->comment); ?>"  type="text"
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
                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__("Give your reason or comment for your attend details ")); ?></small>
                            </div>
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
            </div>
        </div>
    </div>
    <!-- End Form -->
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\GYM\gym_new\resources\views/admin/memberattendance/edit.blade.php ENDPATH**/ ?>