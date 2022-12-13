<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="<?php echo e($setting['site_description']); ?>">
    <meta name="keywords" content="<?php echo e($setting['site_keyword']); ?>">
    <meta name="author" content="<?php echo e(config('app.name')); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title><?php echo e(__('Register').' | '.config('app.name')); ?></title>
    <!-- Fevicon -->
    <link rel="shortcut icon" href="<?php echo e(url('assets/images/favicon.ico')); ?>">
    <!-- Select2 css -->
    <link href="<?php echo e(url('assets/plugins/select2/select2.min.css')); ?>" rel="stylesheet" type="text/css">
    <!-- Switchery css -->
    <link href="<?php echo e(url('assets/plugins/switchery/switchery.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(url('assets/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(url('assets/css/icons.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(url('assets/css/style.css')); ?>" rel="stylesheet" type="text/css">
    <!-- End css -->
</head>
<body class="vertical-layout">
    <div id="containerbar" class="containerbar authenticate-bg">
        <!-- Start Container -->
        <div class="container">
            <div class="row justify-content-center">
                 <div class="col-md-12 col-lg-12">
                    <!-- Start Auth Box -->
                    <div class="auth-box-right">
                        <div class="card" style="margin-top:70px;">
                            <div class="card-body">

                                <div class="form-head">
                                        <?php if($setting->site_logo !='' &&
                                        file_exists(public_path().'/media/logo/'.$setting->site_logo)): ?>
                                        <a href="<?php echo e(url('/')); ?>" class="logo"><img
                                                src="<?php echo e(url('/media/logo/'.$setting->site_logo)); ?>" width="150px"
                                                class="img-fluid" alt="logo"></a>
                                        <?php else: ?>
                                        <a href="<?php echo e(url('/')); ?>" class="logo"><img
                                                src="<?php echo e(Avatar::create(config('app.name'))->toBase64()); ?>"
                                                class="img-fluid" alt="logo"></a>
                                        <?php endif; ?>
                                </div>
                                <hr>
                                <form id="basic-form-wizard" action="<?php echo e(route('register')); ?>" method="POST"
                                    class="needs-validation" novalidate>
                                    <?php echo e(csrf_field()); ?>

                                    <h4 class="font-22 mb-3"><?php echo e(__("Create an Account !!!")); ?></h4>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="text-dark" for="name"><?php echo e(__("Name: ")); ?><span
                                                            class="text-danger">*</span></label>
                                                    <input value="<?php echo e(old('name')); ?>" name="name" type="text"
                                                        class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        id="name" placeholder="<?php echo e(__('Enter name here')); ?>" required>
                                                    <?php $__errorArgs = ['name'];
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
                                         <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="text-dark" for="address"><?php echo e(__("Email:")); ?> <span
                                                            class="text-danger">*</span></label>
                                                    <input name="email" type="email"
                                                        class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        value="<?php echo e(old('email')); ?>" required autocomplete="email"
                                                        id="email" placeholder="<?php echo e(__('Enter your email here')); ?>" />

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
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="text-dark" for="address"><?php echo e(__("Password: ")); ?><span
                                                            class="text-danger">*</span></label>
                                                    <input name="password" type="password"
                                                        class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        id="password" placeholder="Enter Password here" required>

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
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="text-dark" for="address"><?php echo e(__("Confirm Password:")); ?> <span
                                                            class="text-danger">*</span></label>
                                                    <input type="password" class="form-control" id="re-password"
                                                        placeholder="Re-Type Password" name="password_confirmation"
                                                        required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="text-dark"><?php echo e(__("Mobile:")); ?><span
                                                                    class="text-danger">*</span></label>
                                                            <input value="<?php echo e(old('mobile')); ?>" title="enter valid no."
                                                                pattern="[0-9]+" type="text" class="form-control"
                                                                placeholder="Enter valid mobile no." name="mobile" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <?php if($af_system->status == 1): ?>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1"><?php echo e(__('ReferCode')); ?>

                                                        </label>
                                                        <input value="<?php echo e(app('request')->input('refercode') ?? old('refercode')); ?>" type="text" name="refer_code" class="<?php echo e($errors->has('refercode') ? ' is-invalid' : ''); ?> form-control unicase-form-control text-input" required />
                        
                                                        <?php if($errors->has('refercode')): ?>
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong><?php echo e($errors->first('refercode')); ?></strong>
                                                            </span> 
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                
                                            <div class="form-group">
                                                <div class="custom-checkbox-button">
                                                    <div class="form-check-inline checkbox-success">
                                                        <input class="<?php $__errorArgs = ['term'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> terms"
                                                            type="checkbox" id="term" name="term">
                                                        <label
                                                            for="term">&nbsp;<?php echo e(__('I agree with terms and conditions')); ?>

                                                        </label>
                                                        <?php $__errorArgs = ['term'];
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
                                                
                                             </div>   
                                             <div class="col-md-12">
                                                <div class="justify-content-center">
                                                    <button type="submit"
                                                        class="col-md-6 offset-md-3 btn btn-success btn-lg btn-block font-18"><?php echo e(__("Register")); ?></button>

                                                    <div class="text-center col-md-12">
                                                        <p class="mb-0 mt-3"><?php echo e(__('Already have an account?')); ?> <a
                                                                href="<?php echo e(route('login')); ?>"><?php echo e(__('Log in')); ?>

                                                            </a>
                                                        </p>
                                                    </div>
                                                     <div class="text-center col-md-12">
                                                     <a href="">
                                                        <p class="mb-0 mt-3"><?php echo e(__('TERMS & CONDITION  |')); ?></a> <a
                                                                href="#"><?php echo e(__('PRIVACY')); ?>

                                                            </a>
                                                        </p>
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <!-- End Auth Box -->
                            </div>
                        </div>
                    </div>
                </div>
                </form>

                <!-- Start js -->
                <script src="<?php echo e(url('assets/js/jquery.min.js')); ?>"></script>
                <script src="<?php echo e(url('assets/js/popper.min.js')); ?>"></script>
                <script src="<?php echo e(url('assets/js/bootstrap.min.js')); ?>"></script>
                <script src="<?php echo e(url('assets/js/custom/custom-form-validation.js')); ?>"></script>
                <!-- Switchery js -->
                <script src="<?php echo e(url('assets/plugins/switchery/switchery.min.js')); ?>"></script>
                <script src="<?php echo e(url('assets/js/modernizr.min.js')); ?>"></script>
                <script src="<?php echo e(url('assets/js/detect.js')); ?>"></script>
                <script src="<?php echo e(url('assets/js/jquery.slimscroll.js')); ?>"></script>
                <!-- Select2 js -->
                <script src="<?php echo e(url('assets/plugins/select2/select2.min.js')); ?>"></script>

                <script>
                    $(document).ready(function () {
                        $('.select2').select2();
                    });
                    var stateurl = <?php echo json_encode(route('list.state'), 15, 512) ?>;
                    var cityurl = <?php echo json_encode(route('list.cities'), 15, 512) ?>;

                </script>
                <script src="<?php echo e(url('js/admin.js')); ?>"></script>

</body>
</html>
<?php /**PATH C:\laragon\www\gym_new\resources\views/auth/register.blade.php ENDPATH**/ ?>