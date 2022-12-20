
<?php $__env->startSection('title',__('Edit Blogcategory :bid -',['bid' => $blogcategory->title])); ?>
<?php $__env->startSection('breadcum'); ?>
	<div class="breadcrumbbar breadcrumbbar-one">
        <div class="row align-items-center">
            <div class="col-md-5 col-lg-5">
                <h4 class="page-title"><?php echo e(__("Blog Category")); ?></h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard.index')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                        <li class="breadcrumb-item"><a href=""><?php echo e(__('Admin')); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                        	<?php echo e(__('Edit Blog Category')); ?>

                        </li>
                    </ol>
                </div>
            </div>
            <div class="col-md-7 col-lg-7">
                <div class="top-btn-block text-right">
                    <a href="<?php echo e(route('blogcategory.index')); ?>" class="btn btn-primary-rgba mr-2"><i
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
                        <div class="col-6">
                            <h5 class="card-title mb-0"><?php echo e(__("Add Blog Category")); ?></h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="admin-form">
                                <?php echo Form::model($blogcategory, ['method' => 'PATCH', 'route' => ['blogcategory.update',
                                $blogcategory->id], 'files' => true ,'class' => 'form form-light' , 'novalidate']); ?>

                                <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                                    <?php echo Form::label('title', 'Category Title',['class'=>'required text-dark']); ?>

                                    <?php echo Form::text('title', null, ['class' => 'form-control']); ?>

                                    <small class="text-danger"><?php echo e($errors->first('title')); ?></small>
                                    <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i><?php echo e(__(" Create your Blog Category title")); ?></small>
                                </div>
                                <div
                                    class="form-group<?php echo e($errors->has('is_active') ? ' has-error' : ''); ?> switch-main-block">
                                    <div class="custom-switch">
                                        <?php echo Form::checkbox('is_active', 1,$blogcategory->is_active==1 ? 1 :0, ['id' =>
                                        'switch1', 'class' => 'custom-control-input']); ?>

                                        <label class="custom-control-label text-dark" for="switch1"><span><?php echo e(__("Status")); ?></span></label>
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
<?php $__env->stopSection(); ?>
<!-- End Contentbar -->

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\GYM\resources\views/admin/blog/blogcategory/edit.blade.php ENDPATH**/ ?>