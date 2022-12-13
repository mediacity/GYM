<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="<?php echo e($setting['site_description']); ?>">
    <meta name="keywords" content="<?php echo e($setting['site_keyword']); ?>">
    <meta name="author" content="<?php echo e(config('app.name')); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title><?php echo e(__('Login').' | '.config('app.name')); ?></title>
    <!-- Fevicon -->
    <link rel="shortcut icon" href="<?php echo e(url('assets/images/favicon.ico')); ?>">
    <!-- Start css -->
    <link href="<?php echo e(url('assets/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(url('assets/css/icons.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(url('assets/css/style.css')); ?>" rel="stylesheet" type="text/css">
    <!-- End css -->
</head>
<body class="vertical-layout">
    <!-- Start Containerbar -->
    <div id="containerbar" class="containerbar authenticate-bg">
        <!-- Start Container -->
        <div class="container-fluid">
            <div class="auth-box login-box">
                <!-- Start row -->
                <div class="row no-gutters align-items-center justify-content-center">
                    <!-- Start col -->
                    <div class="col-md-4 col-lg-3 col-12">
                        <div class="auth-box-img">
                            <?php if($setting->login_side_image !='' && file_exists(public_path().'/media/login/'.$setting->login_side_image)): ?>
                            <img src="<?php echo e(url('/media/login/'.$setting->login_side_image)); ?>" class="img-fluid" alt="">
                            <?php else: ?> 
                            <img src="<?php echo e(Avatar::create(config('app.name'))->toBase64()); ?>" class="img-fluid" alt="">
                            <?php endif; ?>
                        </div>
                        <div class="auth-logo form-head">
                            <?php if($setting->site_logo !='' && file_exists(public_path().'/media/logo/'.$setting->site_logo)): ?>
                                <a href="<?php echo e(url('/')); ?>" class="logo"><img src="<?php echo e(url('/media/logo/'.$setting->site_logo)); ?>" class="img-fluid" alt="logo"></a>
                            <?php else: ?>
                                <a href="<?php echo e(url('/')); ?>" class="logo"><img src="<?php echo e(Avatar::create(config('app.name'))->toBase64()); ?>" class="img-fluid" alt="logo"></a>
                            <?php endif; ?>
                            <p><?php echo e($setting?$setting->login_description:''); ?></p>
                        </div>  
                    </div>
                    <div class="col-md-8 col-lg-9 col-12">
                        <div class="auth-box-right">
                            <div class="card">
                                <div class="card-body">
                                    <?php if(session()->has('blocked')): ?>
                                        <div class="alert alert-danger">
                                           <i class="feather icon-alert-octagon"></i> <?php echo e(session()->get('blocked')); ?>

                                        </div>
                                    <?php endif; ?>
                                    <form action="<?php echo e(route('login.custom')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                                                             
                                        <h2 class="text-primary my-4"><?php echo e(__('Login')); ?></h2>
                                        <div class="form-group">
                                            <input name="email" type="text" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="email" placeholder="Enter email here" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>

                                             <?php $__errorArgs = ['email'];
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
                                            <input type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="password" name="password" placeholder="Enter Password here" required>
                                            <?php $__errorArgs = ['password'];
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
                                        <div class="form-row mb-3">
                                            <div class="col-sm-6">
                                                <div class="custom-control custom-checkbox text-left">
                                                  <input <?php echo e(old('remember') ? 'checked' : ''); ?> type="checkbox" class="custom-control-input" id="rememberme" name="remember">
                                                  <label class="custom-control-label font-14" for="rememberme"><?php echo e(__('Remember Me')); ?></label>
                                                </div>                                
                                            </div>
                                            <?php if(Route::has('password.request')): ?>
                                                <div class="col-sm-6">
                                                  <div class="forgot-psw"> 
                                                    <a id="forgot-psw" href="<?php echo e(route('password.request')); ?>" class="font-14"><?php echo e(__('Forgot Your Password?')); ?></a>
                                                  </div>
                                                </div>
                                            <?php endif; ?>
                                        </div>                          
                                      <button type="submit" class="btn btn-success btn-lg btn-block font-18">Log in</button>
                                    </form>
                                    <div class="login-or">
                                        <h6 class="text-muted"><?php echo e(__('OR')); ?></h6>
                                    </div>
                                    <div class="button-list">
                                        <a href="<?php echo e(route('social.login','facebook')); ?>" class="btn btn-primary-rgba font-18 facebook-icon"><i class="mdi mdi-facebook mr-2"></i><?php echo e(__('Facebook')); ?></a>
                                        <a href="<?php echo e(route('social.login','facebook')); ?>" class="btn btn-danger-rgba font-18 google-icon"><i class="mdi mdi-google mr-2"></i><?php echo e(__('Google')); ?></a>
                                    </div>
                                    <p class="mb-0 mt-3"><?php echo e(__("Don't have a account?")); ?> <a href="<?php echo e(route('register')); ?>"><?php echo e(__('Sign up')); ?></a></p>
                                    <div class="tiny-footer">
                                        <p>All rights reserved<br><span><a href="#" title="">Terms & Condition</a> and <a href="#" title="">Privacy Policy</a></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End col -->
                </div>
                <!-- End row -->
            </div>
        </div>
        <!-- End Container -->
    </div>
    <!-- End Containerbar -->
    <!-- Start js -->        
    <script src="<?php echo e(url('assets/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(url('assets/js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(url('assets/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(url('assets/js/modernizr.min.js')); ?>"></script>
    <script src="<?php echo e(url('assets/js/detect.js')); ?>"></script>
    <script src="<?php echo e(url('assets/js/jquery.slimscroll.js')); ?>"></script>
    <!-- End js -->
</body>
</html><?php /**PATH C:\xampp\htdocs\GYM\gym_new\resources\views/auth/login.blade.php ENDPATH**/ ?>