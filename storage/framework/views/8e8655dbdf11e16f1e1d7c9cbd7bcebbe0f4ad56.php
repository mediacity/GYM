
<?php $__env->startSection('title',__('Edit Blog :bid -',['bid' => $blog->title])); ?>
<?php $__env->startSection('maincontent'); ?>
<!-- Start Breadcrumbbar -->
<?php $__env->startComponent('components.breadcumb',['thirdactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
<?php echo e(__('Blog')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Admin')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu2'); ?>
<?php echo e(__(' Edit Blog')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('button'); ?>
<div class="col-md-6 col-lg-6">
    <a href="<?php echo e(route('blog.index')); ?>" class="float-right btn btn-primary-rgba mr-2"><i
            class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>
</div>
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
<div class="contentbar">
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h5 class="card-title mb-0"><?php echo e(__("Edit Blog")); ?></h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="admin-form">
                                <?php echo Form::model($blog, ['method' => 'PATCH', 'route' => ['blog.update', $blog->id],
                                'files' => true, 'class' => 'form form-light','novalidate']); ?>

                                <div class="form-group">
                                    <label class="text-dark" for="address"><?php echo e(__("Name:")); ?><span
                                            class="text-danger">*</span></label>
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
                                        <option <?php echo e($blog['user_id'] == $user->id ? "selected" : ""); ?>

                                            value="<?php echo e($user->id); ?>">
                                            <?php echo e($user->name); ?> </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['user_id'];
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
                                    <small class="text-muted text-info"> <i
                                            class="text-dark feather icon-help-circle"></i> <?php echo e(__("Select your username")); ?> </small>
                                </div>
                                <div class="form-group<?php echo e($errors->has('blog_cat_id') ? ' has-error' : ''); ?>">
                                    <?php echo Form::label('blog_cat_id', 'Select Blog Category',['class'=>'required
                                    text-dark']); ?><span class="text-danger">*</span>
                                    <?php echo Form::select('blog_cat_id', $blogcategory, null, ['class' => 'form-control
                                    select2','required','placeholder'=>'Select Blog Category']); ?>

                                    <small class="text-danger"><?php echo e($errors->first('blog_cat_id')); ?></small>
                                    <small class="text-muted text-info"> <i
                                            class="text-dark feather icon-help-circle"></i> <?php echo e(__("Select your blog category eg : Your Fitness, Body Tips")); ?> </small>
                                </div>
                                <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                                    <?php echo Form::label('title', 'Blog Title',['class'=>'required text-dark']); ?><span
                                        class="text-danger">*</span>
                                    <?php echo Form::text('title', null, ['class' => 'form-control', 'required']); ?>

                                    <small class="text-danger"><?php echo e($errors->first('title')); ?></small>
                                    <small class="text-muted text-info"> <i
                                            class="text-dark feather icon-help-circle"></i> <?php echo e(__("Enter your Blog Title eg : Sweat and Life ")); ?></small>
                                </div>
                                <div class="form-group<?php echo e($errors->has('detail') ? ' has-error' : ''); ?>">
                                    <?php echo Form::label('detail', 'Description',['class'=>'required text-dark']); ?><span
                                        class="text-danger">*</span>
                                    <?php echo Form::textarea('detail', null, ['id' => 'summernote','class' => 'form-control'
                                    ,'required','placeholder' => 'Describe your blog' ]); ?>

                                    <small class="text-danger"><?php echo e($errors->first('detail')); ?></small>
                                    <small class="text-muted text-info"> <i
                                            class="text-dark feather icon-help-circle"></i>
                                        <?php echo e(__(" Describe your Blog")); ?> </small> </div>
                                <div class="form-group">
                                    <label class="text-dark" for="address"><?php echo e(__("Image")); ?><span
                                            class="text-danger">*</span></label>
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="image"
                                            aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" for="inputGroupFile01"><?php echo e(__('Choose file')); ?></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark" for="address"><?php echo e(__("Video")); ?></label>
                                    <div class="custom-file">
                                        <input type="file" name="video" class="custom-file-input" id="video"
                                            aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" for="inputGroupFile01"><?php echo e(__('Choose file')); ?></label>
                                    </div>
                                </div>
                                <div class="form-group<?php echo e($errors->has('is_active') ? ' has-error' : ''); ?> switch-main-block">
                                    <div class="custom-switch">
                                        <?php echo Form::checkbox('is_active', 1,$blog->is_active==1 ? 1 :0, ['id' =>
                                        'switch1', 'class' => 'custom-control-input']); ?>

                                        <label class="custom-control-label" for="switch1"><?php echo e(__("Is Active")); ?></label>
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
</div>
<!-- End Contentbar -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\GYM\gym_new\resources\views/admin/blog/edit.blade.php ENDPATH**/ ?>