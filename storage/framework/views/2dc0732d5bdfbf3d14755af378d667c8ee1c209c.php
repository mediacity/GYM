
<?php $__env->startSection('title',__('Add Group')); ?>
<?php $__env->startSection('breadcum'); ?>
<div class="breadcrumbbar breadcrumbbar-one">
    <div class="row align-items-center">
        <div class="col-lg-4 col-md-6">
            <h4 class="page-title"><?php echo e(__("Groups")); ?></h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                    <li class="breadcrumb-item"><a href=""><?php echo e(__('Admin')); ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <?php echo e(__('Add Groups')); ?>

                    </li>
                </ol>
            </div>
        </div>
        <div class="col-lg-8 col-md-6">
            <div class="top-btn-block text-right">
                <a href="<?php echo e(route('group.index')); ?>" class="btn btn-primary-rgba mr-2"><i
                class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
<!-- Start Contentbar -->
<div class="">
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <h5 class="card-title mb-0"><?php echo e(__("Add group")); ?></h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="admin-form">
                        <?php echo Form::open(['method' => 'POST', 'route' => 'group.store','files' => true ,'class' =>
                        'form form-light' ,'novalidate']); ?>

                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                                    <?php echo Form::label('name', 'Group Name',['class'=>'required']); ?> <span
                                        class="text-danger">*</span>
                                    <?php echo Form::text('name', null, ['class' => 'form-control', 'required','placeholder' =>
                                    'Please Enter Group Name']); ?>

                                    <small class="text-danger"><?php echo e($errors->first('name')); ?></small>
                                    <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__("Enter a group name: Weight loss, Weight gain")); ?>

                                    </small>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group<?php echo e($errors->has('user id') ? ' has-error' : ''); ?>">
                                    <label class="text-dark" for="user_id[]"><?php echo e(__("Select users for group")); ?><span
                                            class="text-danger">*</span></label>
                                    <select required="" name="user_id[]" id="user_id[]"
                                        class="<?php $__errorArgs = ['user_id[]'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> form-control select2" multiple
                                        plaeholder=" Select users">
                                        <option value=""><?php echo e(__("Select user for group")); ?></option>
                                        <?php if(isset($users)): ?>
                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                    <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__("Select users: oster,admin")); ?>

                                    </small>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group<?php echo e($errors->has('detail') ? ' has-error' : ''); ?>">
                                    <?php echo Form::label('detail', 'Description',['class'=>'required']); ?> <span
                                        class="text-danger">*</span>
                                    <?php echo Form::textarea('detail', null, ['id' => 'summernote','class' => 'form-control'
                                    ,'required','placeholder' => 'Please Enter Detail']); ?>

                                    <small class="text-danger"><?php echo e($errors->first('detail')); ?></small>
                                    <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__("Enter details")); ?>

                                    </small>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div
                                    class="form-group<?php echo e($errors->has('is_active') ? ' has-error' : ''); ?> switch-main-block">
                                    <div class="custom-switch">
                                        <?php echo Form::checkbox('is_active', 1,1, ['id' => 'switch1', 'class' =>
                                        'custom-control-input']); ?>

                                        <label class="custom-control-label" for="switch1"><span><?php echo e(__("Status")); ?></span></label>
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
                                        <?php echo e(__("Create")); ?></button>
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
    <!-- End row -->
</div>
<!-- End Contentbar -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\GYM\resources\views/admin/group/create.blade.php ENDPATH**/ ?>