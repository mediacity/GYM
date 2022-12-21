
<?php $__env->startSection('title',__('Edit Faq :eid -',['eid' => $faq->title])); ?>
<?php $__env->startSection('breadcum'); ?>
	<div class="breadcrumbbar breadcrumbbar-one">
        <div class="row align-items-center">
            <div class="col-md-4 col-lg-5">
                <h4 class="page-title"><?php echo e(__("Faq")); ?></h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard.index')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                        	<?php echo e(__('Edit Faq')); ?>

                        </li>
                    </ol>
                </div>
            </div>
            <div class="col-md-8 col-lg-7">
                <div class="top-btn-block text-right">
                    <a href="<?php echo e(route('faq.index')); ?>" class="btn btn-primary-rgba mr-2"><i
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
                        <h5 class="card-title mb-0"><?php echo e(__("Edit Faq")); ?></h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="admin-form">
                            <?php echo Form::model($faq, ['method' => 'PATCH', 'route' => ['faq.update', $faq->id], 'files' =>
                            true , 'class' => 'form form-light' ,'novalidate']); ?>

                            <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('title', 'Question',['class'=>'required']); ?><span
                                    class="text-danger">*</span>
                                <?php echo Form::text('title', null, ['class' => 'form-control', 'required','placeholder' =>
                                'Please Enter Title']); ?>

                                <small class="text-danger"><?php echo e($errors->first('title')); ?></small>
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__("Add related to Question")); ?></small>
                            </div>
                            <div class="form-group<?php echo e($errors->has('details') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('details', 'Answer',['class'=>'required']); ?><span
                                    class="text-danger">*</span>
                                <?php echo Form::textarea('details', null, ['id' => 'summernote','class' => 'form-control'
                                ,'required','placeholder' => 'Please Enter Detail']); ?>

                                <small class="text-danger"><?php echo e($errors->first('details')); ?></small>
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__("Add Answer....")); ?></small>
                            </div>
                            <div class="form-group<?php echo e($errors->has('status') ? ' has-error' : ''); ?> switch-main-block">
                                <div class="custom-switch">
                                    <?php echo Form::checkbox('status', 1,$faq->status==1 ? 1 : 0, ['id' => 'switch1', 'class'
                                    => 'custom-control-input']); ?>

                                    <label class="custom-control-label" for="switch1"><span><?php echo e(__("Status")); ?></span></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i>
                                    <?php echo e(__("Reset")); ?></button>
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
<!-- End Row -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\GYM\resources\views/admin/faq/edit.blade.php ENDPATH**/ ?>