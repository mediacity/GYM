
<?php $__env->startSection('title',__('All PWA')); ?>
<?php $__env->startSection('breadcum'); ?>
	<div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title"><?php echo e(__("PWA")); ?></h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard.index')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                        	<?php echo e(__('PWA')); ?>

                        </li>
                    </ol>
                </div>
            </div>
          
        </div>          
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h5 class="card-title"><?php echo e(__('Progressive Web App Setting')); ?></h5>
      </div>
      <div class="card-body">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
              aria-controls="pills-home" aria-selected="true"><?php echo e(__("Https")); ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
              aria-controls="pills-profile" aria-selected="false"><?php echo e(__("Start URL")); ?></a>
          </li>

        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <form action="<?php echo e(route('pwa.setting.update')); ?>" method="POST" enctype="multipart/form-data">
              <?php echo csrf_field(); ?>

              <div class="form-group">

                <div class="form-group make-switch pwa-switch custom-switch">
                  <h5 class="bootstrap-switch-label"><?php echo e(__('Enable PWA')); ?></h5>
                  <div class="pwa-switch-input">
                    <input type="checkbox" id="switch" class="custom-control-input" value="1"
                      <?php echo e(env("PWA_ENABLE") =='1' ? "checked" : ""); ?> data-on-text="<?php echo e(__('On')); ?>"
                      data-off-text="<?php echo e(__('OFF')); ?>" name="PWA_ENABLE">
                    <label class="custom-control-label" for="switch"></label>
                  </div>

                </div>
              </div>

              <div class="form-group">
                <label><?php echo e(__('App Name')); ?>: </label>
                <input class="form-control" type="text" name="app_name" value="<?php echo e(env("PWA_NAME")); ?>" />
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label><?php echo e(__('Theme Color For Header')); ?>: </label>
                    <input name="PWA_THEME_COLOR" class="form-control" type="color"
                      value="<?php echo e(env('PWA_THEME_COLOR') ?? ''); ?>" />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for=""><?php echo e(__('Background Color')); ?>:</label>
                    <input name="PWA_BG_COLOR" class="form-control" type="color"
                      value="<?php echo e(env('PWA_BG_COLOR') ?? ''); ?>" />
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-5 col-md-8">

                  <div class="form-group">
                    <label for=""><?php echo e(__('Shortcut Icon For Home')); ?>: <span class="text-danger">*</span> </label>
                    <div class="custom-file">
                      <input name="shorticon_1" type="file"
                        class="custom-file-input <?php $__errorArgs = ['shorticon_1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="shorticon_1">
                      <label class="custom-file-label"
                        for="shorticon_1"><?php echo e(__("Select icon for login (96 x 96)")); ?></label>
                    </div>

                    <?php $__errorArgs = ['shorticon_1'];
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
                </div>
                <?php if(env('SHORTCUT_ICON1') != NULL): ?>
                <div class="col-lg-1 col-md-4 card text-center">
                  <?php if(env('SHORTCUT_ICON1') != NULL): ?>
                  <div class="card-body">
                    <img class="img-responsive" src="<?php echo e(url('images/icons/'.env('SHORTCUT_ICON1'))); ?>"
                      alt="<?php echo e('shorticon_1'); ?>">
                  </div>
                  <?php endif; ?>
                </div>
                <?php endif; ?>
                <div class="col-lg-5 col-md-8">
                  <div class="form-group">
                    <label for=""><?php echo e(__('Shortcut Icon For Login')); ?>: <span class="text-danger">*</span> </label>

                    <div class="custom-file">
                      <input name="shorticon_2" type="file"
                        class="custom-file-input <?php $__errorArgs = ['shorticon_2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="shorticon_2">
                      <label class="custom-file-label"
                        for="shorticon_2"><?php echo e(__("Select icon for home (96 x 96)")); ?></label>
                    </div>

                    <?php $__errorArgs = ['shorticon_2'];
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
                </div>
                <?php if(env('SHORTCUT_ICON2') != NULL): ?>
                <div class="col-lg-1 col-md-4 card text-center">

                  <div class="card-body">
                    <img class="img-responsive" src="<?php echo e(url('images/icons/'.env('SHORTCUT_ICON2'))); ?>"
                      alt="<?php echo e('shorticon_2'); ?>">
                  </div>

                </div>
                <?php endif; ?>
               </div>
                <button data-loading-text="<i class='fa fa-spinner fa-spin'></i> Saving..." type="submit"
                class="btn btn-default btn-add">
                <?php echo e(__('SaveChanges')); ?>

              </button>
            </form>
          </div>
          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <form action="<?php echo e(route('pwa.icons.update')); ?>" method="POST" enctype="multipart/form-data">
              <?php echo csrf_field(); ?>
              <div class="row">
                  <div class="col-lg-6 col-md-12">
                  <div class="form-group">
                     <label><?php echo e(__('PWAIcon')); ?> (512x512): <span class="text-danger">*</span> </label>
                       <div class="custom-file">
                      <input name="icon_512" type="file"
                        class="custom-file-input <?php $__errorArgs = ['icon_512'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 'is-invalid' <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="icon_512">
                      <label class="custom-file-label" for="icon_512"><?php echo e(__("Select icon (512 x 512)")); ?></label>
                    </div>

                    <?php $__errorArgs = ['icon_512'];
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
                </div>
                <div class="col-md-12">
                  <button data-loading-text="<i class='fa fa-spinner fa-spin'></i> Updating..." type="submit"
                    class="btn btn-default btn-add">
                    <?php echo e(__('UpdateIcon')); ?>

                  </button>
                </div>

              </div>
              <br>

              <h4><?php echo e(__('SplashScreens')); ?>:</h4>

              <div class="row">

                <div class="col-lg-6 col-md-12">

                  <div class="form-group">


                    <label><?php echo e(__('PWASplashScreen')); ?><?php echo e(__(" (2048x2732): ")); ?><span class="text-danger">*</span> </label>

                    <div class="custom-file">
                      <input name="splash_2048" type="file"
                        class="custom-file-input <?php $__errorArgs = ['splash_2048'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 'is-invalid' <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="splash_2048">
                      <label class="custom-file-label"
                        for="splash_2048"><?php echo e(__("Select splash screen (2048x2732)")); ?></label>
                    </div>

                    <?php $__errorArgs = ['splash_2048'];
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
                </div>
                <div class="col-md-12">
                  <button data-loading-text="<i class='fa fa-spinner fa-spin'></i> Updating..." type="submit"
                    class="btn btn-default btn-add">
                    <?php echo e(__('UpdateScreen')); ?>

                  </button>
                </div>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\GYM\resources\views/admin/pwa/index.blade.php ENDPATH**/ ?>