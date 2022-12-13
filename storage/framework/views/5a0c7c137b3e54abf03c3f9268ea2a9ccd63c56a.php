
<?php $__env->startSection('title',__('Edit Exercise :eid -',['eid' => $exercise->id])); ?>
<?php $__env->startSection('maincontent'); ?>
<!-- Start Breadcrumbbar -->                    
<?php $__env->startComponent('components.breadcumb',['thirdactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
<?php echo e(__('Home')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Admin')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu2'); ?>
<?php echo e(__(' Edit Exercise')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('button'); ?>
<div class="col-md-12 col-lg-6 text-right">
    <div class="top-btn-block">
        <a href="<?php echo e(route('exercise.index')); ?>" class="btn btn-primary-rgba mr-2"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>
    </div>
</div>
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
<div class="row">
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-6">
                        <h5 class="card-title mb-0"><?php echo e(__("Edit Exercise")); ?></h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="admin-form">
                            <?php echo Form::model($exercise, ['method' => 'PATCH', 'route' => ['exercise.update',
                            $exercise->id], 'files' => true , 'class' => 'form form-light' ,'novalidate']); ?>

                            <div class="form-group">
                                <label class="text-dark"><?php echo e(__("Exercise Package: ")); ?><span class="text-danger">*</span></label>
                                <input value="<?php echo e($exercise->exercise_package); ?>" type="text"
                                    class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    placeholder="<?php echo e(__("enter exercise package name")); ?>" name="exercise_package" required="">
                                <?php $__errorArgs = ['exercise_package'];
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
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>
                                   <?php echo e(__(" Enter your Exercise Package..")); ?></small>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                         <label class="text-dark"><?php echo e(__("Session:")); ?><span class="text-danger">*</span></label>
                                        <select data-placeholder="<?php echo e(__("Please select diet session")); ?>" name="session_id[]"
                                            id="session_id[]" class="form-control select2" multiple>
                                            <option value=""><?php echo e(__("Please select diet session")); ?></option>
                                            <?php $__currentLoopData = App\dietid::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php if($exercise->session_id != ''): ?> <?php $__currentLoopData = $exercise->session_id; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php echo e($session == $session_id->id ? "selected" : ""); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>
                                                value="<?php echo e($session_id->id); ?>"> <?php echo e($session_id['session_id']); ?> </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </select>
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

                                        <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>
                                           <?php echo e(__(" Select session eg : Morning, Afternoon")); ?> </small>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('day') ? ' has-error' : ''); ?>">
                                <label for="day"><?php echo e(__("Choose a day :")); ?><span class="text-danger">*</span></label>
                                <select data-placeholder="<?php echo e(__("Please select day")); ?>" name="day_id[]"
                                    class="mdb-select md-form form-control select2" multiple>
                                    <option value=""><?php echo e(__("Select Day")); ?></option>
                                    <?php $__currentLoopData = App\day::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <option <?php if($exercise->day != ''): ?> <?php $__currentLoopData = $exercise->day; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exerciseday): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo e($exerciseday == $day->id ? "selected" : ""); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>
                                        value="<?php echo e($day->id); ?>"> <?php echo e($day['day']); ?> </option>
                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>
                                    <?php echo e(__("Select day: eg : Monday , Tuesday")); ?> </small>
                            </div>
                            <div class="form-group<?php echo e($errors->has('exercisename') ? ' has-error' : ''); ?>">
                                <label for="exercisename"><?php echo e(__("Choose a exercisename :")); ?><span
                                        class="text-danger">*</span></label>
                                <select data-placeholder="<?php echo e(__("Please select exercise")); ?>" name="exercisename_id[]"
                                    class="mdb-select md-form form-control select2" multiple>
                                    <option value=""><?php echo e(__("Select exercise name")); ?></option>
                                    <?php $__currentLoopData = App\exercisename::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exercisename): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php if($exercise->exercisename != ''): ?> <?php $__currentLoopData = $exercise->exercisename; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exerciseday): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo e($exerciseday == $exercisename->id ? "selected" : ""); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>
                                        value="<?php echo e($exercisename->id); ?>"> <?php echo e($exercisename['exercisename']); ?> </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__("Select Exercisename: eg: Pushups , Pullups")); ?> </small>
                                <small class="text-danger text-info"><?php echo e($errors->first('exercisename')); ?> </small>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('detail') ? ' has-error' : ''); ?>">
                            <?php echo Form::label('detail', 'Description',['class'=>'required']); ?><span
                                class="text-danger">*</span></label>
                            <?php echo Form::textarea('detail', null, ['id' => 'summernote','class' => 'form-control'
                            ,'required','placeholder' => 'Please Enter Exercise Detail']); ?>

                            <small class="text-danger"><?php echo e($errors->first('detail')); ?></small>
                            <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>
                                <?php echo e(__("Enter the Exercise Description")); ?></small>
                        </div>
                        <div class="form-group<?php echo e($errors->has('time') ? ' has-error' : ''); ?>">
                            <?php echo Form::label('time', 'Time',['class'=>'required']); ?><span
                                class="text-danger">*</span></label>
                            <?php echo Form::number('time', null, ['class' => 'form-control', 'required','placeholder' =>
                            'Please Enter the time for exercise']); ?>

                            <small class="text-danger"><?php echo e($errors->first('time')); ?></small>
                            <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>
                                <?php echo e(__("Enter the times of exercise eg: 50 ,40")); ?></small>
                        </div>
                        <div class="form-group<?php echo e($errors->has('video') ? ' has-error' : ''); ?> input-file-block">
                            <?php echo Form::label('video', 'Video',['class'=>'required text-dark']); ?>

                            <?php echo Form::file('video', ['class' => 'input-file', 'id'=>'video']); ?>

                            <small class="text-danger"><?php echo e($errors->first('video')); ?></small>
                        </div>

                        <div class="form-group<?php echo e($errors->has('url') ? ' has-error' : ''); ?>">
                            <?php echo Form::label('url', 'Exercise Url',['class'=>'required']); ?><span
                                class="text-danger">*</span></label>
                            <?php echo Form::text('url', null, ['class' => 'form-control','required' ,'placeholder' => 'Please
                            Enter Url' , 'pattern' => "https?://.+"]); ?>

                            <small class="text-danger"><?php echo e($errors->first('url')); ?></small>
                            <small class="text-info"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__('Enter url for exercise')); ?>

                            </small>
                        </div>
                        <div class="form-group">
                            <label class="text-dark"><?php echo e(__(" Follow Up Date:")); ?> <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input value="<?php echo e($exercise->followup_date); ?>" name="followup_date" type="text"
                                    id="calendar2" class="calendar form-control" placeholder="<?php echo e(__("yyyy/mm/dd")); ?>"
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
                            <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>
                                <?php echo e(__("Please Enter Next Followup Date ")); ?></small>
                        </div>
                    </div>
                </div>
                <div class="form-group<?php echo e($errors->has('is_active') ? ' has-error' : ''); ?> switch-main-block">
                    <div class="custom-switch">
                        <?php echo Form::checkbox('is_active', 1,$exercise->is_active==1 ? 1 : 0, ['id' =>
                        'switch1', 'class' => 'custom-control-input']); ?>

                        <label class="custom-control-label" for="switch1"><?php echo e(__("Is Active")); ?></label>
                    </div>
                </div>

                <div class="form-group">
                    <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
                    <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                        <?php echo e(__("Update")); ?></button>
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
<!-- End Contentbar -->
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
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\GYM\gym_new\resources\views/admin/exercise/edit.blade.php ENDPATH**/ ?>