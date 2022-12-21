
<?php $__env->startSection('title',__('Add Blog')); ?>
<?php $__env->startSection('breadcum'); ?>
	<div class="breadcrumbbar breadcrumbbar-one">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-5">
                <h4 class="page-title"><?php echo e(__("Blog")); ?></h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard.index')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                        <li class="breadcrumb-item"><a href=""><?php echo e(__('Admin')); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                        	<?php echo e(__('Add Blog')); ?>

                        </li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-7">
                <div class="top-btn-block text-right">
                    <a href="<?php echo e(route('blog.index')); ?>" class="btn btn-primary-rgba mr-2"><i
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
                            <h5 class="card-title mb-0"><?php echo e(__("Add Blog")); ?></h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="admin-form">
                        <?php echo Form::open(['method' => 'POST', 'route' => 'blog.store','files' => true, 'class' =>
                        'form form-light', 'novalidate']); ?>

                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group<?php echo e($errors->has('user id') ? ' has-error' : ''); ?>">
                                    <label class="text-dark" for="cars"><?php echo e(__("Choose a user name:")); ?><span
                                            class="text-danger">*</span></label>
                                    <select class="form-control select2" name="user_id" class="select2">
                                        <option value=""><?php echo e(__("Select User")); ?></option>
                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <small class="text-muted text-info"><i
                                            class="text-dark feather icon-help-circle"></i> <?php echo e(__("Select your username ")); ?></small>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group<?php echo e($errors->has('blog_cat_id') ? ' has-error' : ''); ?>">
                                    <?php echo Form::label('blog_cat_id', 'Select Blog Category',['class'=>'required
                                    text-dark']); ?> <span class="text-danger">*</span>
                                    <?php echo Form::select('blog_cat_id', $blogcategory, null, ['class' => 'form-control
                                    select2','required','placeholder'=>'Select Blog Category']); ?>

                                    <small class="text-danger"><?php echo e($errors->first('blog_cat_id')); ?></small>
                                    <small class="text-muted text-info"> <i
                                            class="text-dark feather icon-help-circle"></i> <?php echo e(__("Select your blog category eg : Your Fitness, Body Tips")); ?> </small>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                                    <?php echo Form::label('title', 'Blog Title',['class'=>'required text-dark']); ?> <span
                                        class="text-danger">*</span>
                                    <?php echo Form::text('title', null, ['class' => 'form-control', 'required'
                                    ,'placeholder'=>'Enter Blog Title']); ?>

                                    <small class="text-danger"><?php echo e($errors->first('title')); ?></small>
                                    <small class="text-muted text-info"> <i
                                            class="text-dark feather icon-help-circle"></i><?php echo e(__(" Type your Blog Title eg : Sweat and Life")); ?> </small>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group<?php echo e($errors->has('detail') ? ' has-error' : ''); ?>">
                                    <?php echo Form::label('detail', 'Description',['class'=>'required text-dark']); ?><span
                                        class="text-danger">*</span>
                                    <?php echo Form::textarea('detail', null, ['id' => 'summernote','class' => 'form-control'
                                    ,'required']); ?>

                                    <small class="text-danger"><?php echo e($errors->first('detail')); ?></small>
                                    <small class="text-muted text-info"> <i
                                            class="text-dark feather icon-help-circle"></i>
                                        <?php echo e(__("Describe your Blog")); ?></small>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="text-dark" for="address"><?php echo e(__("Image")); ?><span
                                            class="text-danger">*</span></label>
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="image"
                                            aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" for="inputGroupFile01"><?php echo e(__('Choose file')); ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="text-dark" for="address"><?php echo e(__("Video")); ?></label>
                                    <div class="custom-file">
                                        <input type="file" name="video" class="custom-file-input" id="video"
                                            aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" for="inputGroupFile01"><?php echo e(__('Choose file')); ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
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
                            <div class="col-lg-6 col-md-6">
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
</div>
<!-- End Contentbar -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\GYM\resources\views/admin/blog/create.blade.php ENDPATH**/ ?>