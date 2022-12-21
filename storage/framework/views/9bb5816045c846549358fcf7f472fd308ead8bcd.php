
<?php $__env->startSection('title',__('Add Exercise')); ?>
<?php $__env->startSection('breadcum'); ?>
<div class="breadcrumbbar breadcrumbbar-one">
    <div class="row align-items-center">
        <div class="col-lg-4 col-md-8">
            <h4 class="page-title"><?php echo e(__("Exercise")); ?></h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                    <li class="breadcrumb-item"><a href=""><?php echo e(__('Admin')); ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <?php echo e(__('Add Exercise')); ?>

                    </li>
                </ol>
            </div>
        </div>
        <?php if(auth()->user()->can('users.add')): ?>
        <div class="col-lg-8 col-md-4">
            <div class="top-btn-block  text-right">
                <a href="<?php echo e(route('exercise.index')); ?>" class="btn btn-primary-rgba mr-2"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
<!-- Start Contentbar -->
<div class="card m-b-30">
    <div class="card-body">
        <?php echo Form::open(['method' => 'POST', 'route' => 'exercise.store' ,'files' => true , 'class' => 'form
            form-light' ,'novalidate']); ?>

            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                        <label class="text-dark"><?php echo e(__("Exercise Package:")); ?> <span class="text-danger">*</span></label>
                        <input value="<?php echo e(old('exercise_package')); ?>" type="text"
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
                        <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__("Enter your Exercise Package..")); ?></small>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                        <label class="text-dark"><?php echo e(__("Session:")); ?><span class="text-danger">*</span></label>
                        <select data-placeholder="<?php echo e(__("Please select diet session")); ?>" name="session_id[]" id="session_id[]"
                        class="form-control select2 <?php $__errorArgs = ['session_id[]'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" multiple>
                            <option value=""><?php echo e(__("Please select diet session")); ?></option>
                            <?php if(isset($dietid)): ?>
                            <?php $__currentLoopData = $dietid; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($session_id->id); ?>">
                                <?php echo e($session_id->session_id); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
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
                        <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__("Select session eg : Morning, Afternoon")); ?> </small>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="form-group<?php echo e($errors->has('day') ? ' has-error' : ''); ?>">
                        <label for="day"><?php echo e(__("Choose a day :")); ?><span class="text-danger">*</span></label>
                        <select data-placeholder="<?php echo e(__("Please select day")); ?>" name="day_id[]"  class="mdb-select md-form form-control select2" multiple>
                            <option value=""><?php echo e(__("Select Day")); ?></option>
                            <?php if(isset($days)): ?>
                            <?php $__currentLoopData = $days; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($day->id); ?>"><?php echo e($day->day); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </select>
                        <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i><?php echo e(__(" Select day: eg: Monday , Tuesday")); ?> </small>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="form-group<?php echo e($errors->has('exercisename_id') ? ' has-error' : ''); ?>">
                        <label for="exercisename"><?php echo e(__(("Choose a exercise name :"))); ?><span class="text-danger">*</span></label>
                        <select data-placeholder="<?php echo e(__("Please select exercise")); ?>" name="exercisename_id[]"
                            class="mdb-select md-form form-control select2" multiple>
                            <option value=""><?php echo e(__("Select exercise name")); ?></option>
                            <?php if(isset($exercisenames)): ?>
                            <?php $__currentLoopData = $exercisenames; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exercisename): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($exercisename->id); ?>"><?php echo e($exercisename->exercisename); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </select>
                        <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>
                            <?php echo e(__(" Select Exercisename: eg: Pushups , Pullups ")); ?></small>
                        <small class="text-danger"><?php echo e($errors->first('exercisename_id')); ?> </small>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="form-group<?php echo e($errors->has('detail') ? ' has-error' : ''); ?>">
                        <?php echo Form::label('detail', 'Description',['class'=>'required']); ?><span
                            class="text-danger">*</span></label>
                        <?php echo Form::textarea('detail', null, ['id' => 'summernote','class' => 'form-control'
                        ,'required','placeholder' => 'Please Enter Exercise Detail']); ?>

                        <small class="text-danger"><?php echo e($errors->first('detail')); ?></small>
                        <?php $__errorArgs = ['detail'];
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
                        <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__("Enter Exercise Description")); ?></small>
                    </div> 
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="form-group<?php echo e($errors->has('time') ? ' has-error' : ''); ?>">
                        <?php echo Form::label('time', 'Time',['class'=>'required time']); ?><span
                            class="text-danger">*</span></label>
                        <?php echo Form::number('time', null, ['class' => 'form-control', 'required','placeholder' =>'Please Enter the time for exercise']); ?>

                        <small class="text-danger"><?php echo e($errors->first('time')); ?></small>
                        <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i><?php echo e(__(" Enter times eg:50,40.")); ?></small>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="form-group<?php echo e($errors->has('url') ? ' has-error' : ''); ?>">
                        <?php echo Form::label('url', 'Exercise Url',['class'=>'required']); ?><span class="text-danger">*</span></label>
                        <?php echo Form::text('url', null, ['class' => 'form-control','required' ,'placeholder' => 'Please Enter Url' ,  'pattern' => "https?://.+"]); ?>

                        <small class="text-danger"><?php echo e($errors->first('url')); ?></small>
                        <small class="text-info"> <i class="text-dark feather icon-help-circle"></i><?php echo e(__(" Enter Url For Exercise")); ?>

                            </small>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                        <label class="text-dark"><?php echo e(__(" Follow Up Date: ")); ?><span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input value="<?php echo e(old('followup_date')); ?>" name="followup_date" type="text" id="calendar2"
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
                        <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>
                            <?php echo e(__("Please Enter Next Followup Date" )); ?> </small>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="form-group<?php echo e($errors->has('video') ? ' has-error' : ''); ?> input-file-block">
                        <?php echo Form::label('video', 'Video',['class'=>'text-dark']); ?>

                        <?php echo Form::file('video', ['class' => 'input-file', 'id'=>'video']); ?>

                            <small class="text-danger"><?php echo e($errors->first('video')); ?></small>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="form-group<?php echo e($errors->has('is_active') ? ' has-error' : ''); ?> switch-main-block">
                        <div class="custom-switch">
                            <?php echo Form::checkbox('is_active', 1, 1, ['id' => 'switch1', 'class' => 'custom-control-input']); ?>

                            <label class="custom-control-label" for="switch1"><span><?php echo e(__("Status")); ?></span></label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                        <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
                        <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i> <?php echo e(__("Create")); ?></button>
                    </div>
                </div>
            </div>
            <div class="clear-both"></div>
        <?php echo Form::close(); ?>

    </div>  
</div>
<!-- End Contentbar -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
    $(document).ready(function () {
        $('.mdb-select').materialSelect();
    });
    $('.calendar').each(function () {
        $(this).datepicker({
            dateFormat: 'yy-mm-dd',
            minDate: 0
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\GYM\resources\views/admin/exercise/create.blade.php ENDPATH**/ ?>