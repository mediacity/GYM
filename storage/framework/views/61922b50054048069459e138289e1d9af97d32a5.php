
<?php $__env->startSection('title',__('Edit Fees :eid -',['eid' => $fees->id])); ?>
<?php $__env->startSection('breadcum'); ?>
<div class="breadcrumbbar breadcrumbbar-one">
    <div class="row align-items-center">
        <div class="col-lg-4 col-md-8">
            <h4 class="page-title"><?php echo e(__("Fees")); ?></h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                    <li class="breadcrumb-item"><a href=""><?php echo e(__('Admin')); ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <?php echo e(__('Edit Fees')); ?>

                    </li>
                </ol>
            </div>
        </div>
        <?php if(auth()->user()->can('users.add')): ?>
        <div class="col-lg-8 col-md-4">
            <div class="top-btn-block text-right">
                <a href="<?php echo e(route('fees.index')); ?>" class="btn btn-primary-rgba mr-2"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>
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
                        <h5 class="card-title mb-0"><?php echo e(__("Edit Fees")); ?></h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="admin-form">
                    <?php echo Form::model($fees, ['method' => 'PATCH', 'route' => ['fees.update', $fees->id], 'files'
                    => true , 'class' => 'form form-light' ,'novalidate']); ?>

                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('title', ' Fees Title',['class'=>'required']); ?>

                                <?php echo Form::text('title', null, ['class' => 'form-control', 'required','placeholder' =>
                                'Please Enter Fees Title']); ?>

                                <small class="text-danger"><?php echo e($errors->first('title')); ?></small>
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i><?php echo e(__(" Enter Fees Type eg: Cheque, Cash...")); ?> </small>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group<?php echo e($errors->has('price') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('price', 'Package price',['class'=>'required']); ?>

                                <?php echo Form::number('price', null, ['min' => '1', 'step' => '0.01', 'class' =>
                                'form-control', 'required','placeholder' => 'Please Enter Fees price']); ?>

                                <small class="text-danger"><?php echo e($errors->first('price')); ?></small>
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i><?php echo e(__(" Enter Fees Price eg: 1000,2000.. ")); ?></small>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group<?php echo e($errors->has('offerprice') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('offerprice', 'Offerprice'); ?>

                                <?php echo Form::number('offerprice', null, ['min' => '1', 'step' => '0.01', 'class' =>
                                'form-control', 'placeholder' => 'Please Enter Fees offerprice']); ?>

                                <small class="text-danger"><?php echo e($errors->first('offerprice')); ?></small>
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__("Enter Fees OfferPrice eg: 900,1900.. ")); ?></small>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group<?php echo e($errors->has('slug') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('slug', 'Slug'); ?>

                                <?php echo Form::text('slug', null, ['class' => 'form-control', 'placeholder' =>
                                'Please Enter Slug']); ?>

                                <small class="text-danger"><?php echo e($errors->first('slug')); ?></small>
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__("Add a Slug")); ?></small>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group<?php echo e($errors->has('detail') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('detail', 'Description',['class'=>'required']); ?>

                                <?php echo Form::textarea('detail', null, ['class' => 'form-control' ,'required', 'placeholder'
                                => 'Please Enter Fees description']); ?>

                                <small class="text-danger"><?php echo e($errors->first('detail')); ?></small>
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i><?php echo e(__(" Enter Fees Detail eg: Installment ")); ?></small>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div
                                class="form-group<?php echo e($errors->has('is_active') ? ' has-error' : ''); ?> switch-main-block">
                                <div class="custom-switch">
                                    <?php echo Form::checkbox('is_active', 1,$fees->is_active==1 ? 1 : 0, ['id' => 'switch1',
                                    'class' => 'custom-control-input']); ?>

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
<!-- End Row -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\GYM\resources\views/admin/fees/edit.blade.php ENDPATH**/ ?>