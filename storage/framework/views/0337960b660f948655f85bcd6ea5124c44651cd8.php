
<?php $__env->startSection('title',__('Edit Pages :eid -',['eid' => $pages->id])); ?>
<?php $__env->startSection('breadcum'); ?>
	<div class="breadcrumbbar breadcrumbbar-one">
        <div class="row align-items-center">
            <div class="col-md-4 col-lg-5">
                <h4 class="page-title"><?php echo e(__("Pages")); ?></h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard.index')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                        	<?php echo e(__('Edit Page')); ?>

                        </li>
                    </ol>
                </div>
            </div>
            <div class="col-md-8 col-lg-7">
                <div class="top-btn-block text-right">
                    <a href="<?php echo e(route('pages.index')); ?>" class="btn btn-primary-rgba mr-2"><i
                    class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>
                </div>
            </div>  
        </div>          
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
<!-- Start row -->
<div class="row">
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-6">
                        <h5 class="card-title mb-0"><?php echo e(__("Edit Page")); ?></h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="admin-form">
                    <?php echo Form::model($pages, ['method' => 'PATCH', 'route' => ['pages.update', $pages->id],
                    'files' => true ,'class' => 'form form-light' ,'novalidate']); ?>

                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('title', 'Page Title',['class'=>'required']); ?> <span
                                    class="text-danger">*</span>
                                <?php echo Form::text('title', null, ['class' => 'form-control', 'required', 'placeholder' =>
                                'Please Enter Page Heading']); ?>

                                <small class="text-danger"><?php echo e($errors->first('title')); ?></small>
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i><?php echo e(__(" Enter Title : Return Policy, Terms and Condition..")); ?></small>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group<?php echo e($errors->has('aboutus') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('aboutus', 'Page Aboutus',['class'=>'required']); ?> <span
                                    class="text-danger">*</span>
                                <?php echo Form::text('aboutus', null, ['class' => 'form-control', 'required','placeholder' => 
                                'Please Enter Page Aboutus']); ?>

                                <small class="text-danger"><?php echo e($errors->first('aboutus')); ?></small>
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__("Enter page Aboutus : XYZ...")); ?></small>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group<?php echo e($errors->has('detail') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('detail', 'Description',['class'=>'required']); ?> <span
                                    class="text-danger">*</span>
                                <?php echo Form::textarea('detail', null, ['id' => 'summernote','class' => 'form-control'
                                ,'required' ,'placeholder' => 'Please Enter Page Detail']); ?>

                                <small class="text-danger"><?php echo e($errors->first('detail')); ?></small>
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__("Enter Details according to Title")); ?></small>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div
                                class="form-group<?php echo e($errors->has('is_active') ? ' has-error' : ''); ?> switch-main-block">
                                <div class="custom-switch">
                                    <?php echo Form::checkbox('is_active', 1,$pages->is_active==1 ? 1 : 0, ['id' => 'switch1',
                                    'class' => 'custom-control-input']); ?>

                                    <label class="custom-control-label" for="switch1"><span><?php echo e(__("Status")); ?></span></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
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
<!-- End row -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\GYM\resources\views/admin/pages/edit.blade.php ENDPATH**/ ?>