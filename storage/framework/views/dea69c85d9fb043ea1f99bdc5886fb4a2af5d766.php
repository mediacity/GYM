
<?php $__env->startSection('title',__('Site Settings')); ?>
<!-- Start Breadcrumbbar -->                    
<?php $__env->startSection('breadcum'); ?>
	<div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title"><?php echo e(__("Site Settings")); ?></h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>"><?php echo e(__('Home')); ?></a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard.index')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                        	<?php echo e(__('Site Settings')); ?>

                        </li>
                    </ol>
                </div>
            </div>
          
        </div>          
    </div>
<?php $__env->stopSection(); ?>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
<?php $__env->startSection('maincontent'); ?>
	<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"><?php echo e(__('Site Settings')); ?></h5>
                </div> 

                <div class="card-body">
                    <form class="form" action="<?php echo e(route('site.settings.update')); ?>" method="POST" novalidate enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label class="text-dark"><?php echo e(__('Site Title:')); ?></label>
                            <input name="site_title" autofocus="" type="text" class="form-control" placeholder="<?php echo e(__("enter your project/site title")); ?>" required="" value="<?php echo e($setting ? $setting->site_title : ""); ?>">
                            <div class="invalid-feedback">
                                <?php echo e(__('Please enter site title !')); ?>.
                            </div>-
                        </div>

                        <div class="form-group">
                            <label class="text-dark"><?php echo e(__('Copyright Text:')); ?></label>
                            <input name="site_copyright" autofocus="" type="text" class="form-control" placeholder="<?php echo e(__("enter your copyright text" )); ?>value="<?php echo e($setting ? $setting->site_copyright : ""); ?>">
                        </div>

                        <div class="form-group">
                            <label class="text-dark"><?php echo e(__('Site Keyword:')); ?></label>
                            <div class="bootstrap-tagsinput">
                                <input type="text" id="tagsinput-typehead" class="form-control" data-role="tagsinput" name="site_keyword" value="<?php echo e($setting ? $setting->site_keyword : ""); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="text-dark"><?php echo e(__('Default Currency:')); ?></label>

                            <div class="bootstrap-tagsinput">
                                <input type="text" class="form-control"  name="default_currency" value="<?php echo e($setting ? $setting->default_currency : ""); ?>">
                            </div>

 
                        </div>
                        <div class="form-group">
                            <label class="text-dark"><?php echo e(__('Site Description:')); ?></label>
                            <textarea name="site_description" cols="30" rows="5" type="text" class="form-control" placeholder="<?php echo e(__("enter your project/site description")); ?>" name="site_description"><?php echo e($setting ? $setting->site_description : ""); ?></textarea>
                        </div>

                        <div class="form-group">
                            <label class="text-dark"><?php echo e(__('Site Logo:')); ?></label>
                            <input type="file" class="form-control <?php $__errorArgs = ['site_logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="site_logo">
                            <?php $__errorArgs = ['site_logo'];
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
                        </div>

                        <div class="form-group">
                            <label class="text-dark"><?php echo e(__('Site Favicon:')); ?></label>
                            <input type="file" class="form-control <?php $__errorArgs = ['site_favicon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="site_favicon">
                             <?php $__errorArgs = ['site_favicon'];
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
                        </div>
                        <div class="form-group">
                            <label class="text-dark"><?php echo e(__('Support Email:')); ?></label>
                            <input name="support_email" autofocus="" type="email" class="form-control" placeholder="<?php echo e(__("enter your email")); ?>" required="" value="<?php echo e($setting ? $setting->support_email : ""); ?>">
                            <div class="invalid-feedback">
                                <?php echo e(__('Please Enter support email !')); ?>.
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="text-dark"><?php echo e(__('Login Side Image:')); ?></label>
                            <div class="bootstrap-tagsinput">
                                <input type="file" class="form-control" name="login_side_image">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="text-dark"><?php echo e(__('Login Side Description:')); ?></label>
                            <textarea name="login_description" cols="30" rows="2" type="text" class="form-control" placeholder="<?php echo e(__("enter your description")); ?>"><?php echo e($setting ? $setting->login_description : ""); ?></textarea>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group ">
                                    <div class="custom-switch">
                                        <div class="row">
                                            <div class="col-lg-6 col-10">
                                                <label for="exampleInputDetails"><?php echo e(__('Inspect Element Disabled')); ?> :</label><br>   
                                            </div>
                                            <div class="col-lg-6 col-2">
                                                <input type="checkbox" name="inspect_element" <?php echo e($setting->inspect_element==1 ? 'checked' : ''); ?> id="switch1" for="switch1" class="custom-control-input">
                                                <label class="custom-control-label" for="switch1"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group ">
                                    <div class="custom-switch">
                                        <div class="row">
                                            <div class="col-lg-6 col-10">
                                                <label for="exampleInputDetails"><?php echo e(__('Right Click Disabled')); ?> :</label><br> 
                                            </div>  
                                            <div class="col-lg-6 col-2">
                                                <input type="checkbox" name="right_click" <?php echo e($setting->right_click==1 ? 'checked' : ''); ?> id="switch2" for="switch2" class="custom-control-input">
                                                <label class="custom-control-label" for="switch2"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary-rgba"><i class="feather icon-save mr-2"></i> <?php echo e(__('Save')); ?></button>
                        </div>
                     </form>
                    </div> 
            </div>
        </div>
    </div>
    <br>
<?php $__env->stopSection(); ?>
<!-- End Contentbar -->

  
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\GYM\gym_new\resources\views/admin/settings/settings.blade.php ENDPATH**/ ?>