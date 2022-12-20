
<?php $__env->startSection('title',__('Add Exercises')); ?>
<?php $__env->startSection('breadcum'); ?>
<div class="breadcrumbbar breadcrumbbar-one">
    <div class="row align-items-center">
        <div class="col-lg-4 col-md-8">
            <h4 class="page-title"><?php echo e(__("Exercise Name")); ?></h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <?php echo e(__('Add Exercise Name')); ?>

                    </li>
                </ol>
            </div>
        </div>
        <?php if(auth()->user()->can('users.add')): ?>
        <div class="col-lg-8 col-md-4">
            <div class="top-btn-block  text-right">
                <a href="<?php echo e(route('exercisename.index')); ?>" class="btn btn-primary-rgba mr-2"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>
            </div>
        </div>
        <?php endif; ?>
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
                        <h5 class="card-title mb-0"><?php echo e(__("Add Exercise")); ?></h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="admin-form">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <?php echo Form::open(['method' => 'POST', 'route' => 'exercisename.store','files' => true ,
                            'class' => 'form-light form' ,'novalidate']); ?>

                            <div class="form-group<?php echo e($errors->has('Exercisename') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('exercisename', 'Exercisename',['class'=>'required']); ?><span
                                    class="text-danger">*</span></label>

                                <?php echo Form::text('exercisename', null, ['class' => 'form-control',
                                'required','placeholder' =>
                                'Please Enter Exercisename']); ?>

                                <small class="text-danger"><?php echo e($errors->first('exercisename')); ?></small>
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__("Enter Exercise name eg: push-up,pull-up")); ?></small>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group<?php echo e($errors->has('body_part') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('body_part', 'Bodypart',['class'=>'required']); ?><span
                                    class="text-danger">*</span></label>

                                <?php echo Form::text('body_part', null, ['class' => 'form-control', 'required','placeholder' =>'Please Enter Bodypart']); ?>

                                <small class="text-danger"><?php echo e($errors->first('body_part')); ?></small>
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i><?php echo e(__(" Enter Bodypart for which exercise is assigned eg: Arm , hips..")); ?></small>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label class="text-dark"><?php echo e(__('Exercise Type: ')); ?><span class="text-danger">*</span></label>
                                <select data-placeholder="<?php echo e(__("Please select exercise type")); ?>" name="type[]"
                                    class="select2 md-form form-control   <?php $__errorArgs = ['type[]'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    multiple>
                                    <option value=""><?php echo e(__("Select Exercise Type")); ?></option>
                                    <?php if(isset($types)): ?>
                                    <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($type->id); ?>"><?php echo e($type->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>
                                <?php $__errorArgs = ['type'];
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
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__("Select the Exercise Type : Traditional Pushups, Clap Pushups ")); ?></small>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group<?php echo e($errors->has('description') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('detail', 'Description',['class'=>'required']); ?><span
                                    class="text-danger">*</span></label>

                                <?php echo Form::textarea('detail', null, ['id' => 'summernote','class' => 'form-control'
                                ,'required','placeholder' => 'Please Enter Exercise Detail']); ?>

                                <small class="text-danger"><?php echo e($errors->first('description')); ?></small>
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__("Enter Exercise Description ")); ?></small>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                           <div class="form-group">
                                <div class="text-dark form-group<?php echo e($errors->has('is_active') ? 'has-error' : ''); ?> switch-main-block">
                                    <div class="custom-switch">
                                        <?php echo Form::checkbox('is_active', 1,1, ['id' => 'switch1', 'class' =>
                                        'custom-control-input']); ?>

                                        <label class="custom-control-label" for="switch1"><span><?php echo e(__("Status")); ?></<span></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
                                <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                                    <?php echo e(__("Create")); ?></button>
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
        
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\GYM\resources\views/admin/exercisename/create.blade.php ENDPATH**/ ?>