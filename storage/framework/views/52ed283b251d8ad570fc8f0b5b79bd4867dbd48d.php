
<?php $__env->startSection('title',__('Edit new user')); ?>
<!-- Start Breadcrumbbar -->                    
<?php $__env->startSection('breadcum'); ?>
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title"><?php echo e(config('app.name')); ?></h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>"><?php echo e(__('Home')); ?></a></li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard.index')); ?>"><?php echo e(__('Dashboard')); ?></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <?php echo e(__('Edit Profile')); ?>

                    </li>
                </ol>
            </div>
        </div>
         <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a title="Back" href="<?php echo e(route('users.index')); ?>" class="btn btn-primary-rgba"><i
                        class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?> </a>
            </div>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
<?php $__env->startSection('maincontent'); ?>
<form action="<?php echo e(route('profile.update', $user['uuid'])); ?>" class="form" method="POST" novalidate
    enctype="multipart/form-data">
     <?php echo csrf_field(); ?>
     <?php echo method_field('PUT'); ?>
    <div class="tab-pane fade active show" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title mb-0"><?php echo e(__("My Profile")); ?></h5>
            </div>
            <div class="card-body">
                <div class="profilebox pt-4 text-center">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <input name="photo" type="file" id="imgupload" style="display:none" />
                            <?php if($image = @file_get_contents('../public/media/users/'.$user->photo)): ?>
                            <img <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> src="<?php echo e(url('media/users/'.$user->photo)); ?>"
                                alt="profilephoto" class="profilechoose img-thumbnail rounded img-fluid">
                            <?php else: ?>
                            <?php if(isset($user->user)): ?>
                            <img <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                src="<?php echo e(Avatar::create($user->user['name'])->toBase64()); ?>" alt="profilephoto"
                                class="profilechoose img-thumbnail rounded img-fluid">
                            <?php endif; ?>
                            <?php endif; ?>
                            <?php $__errorArgs = ['photo'];
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
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title mb-0"><?php echo e(__("Edit Your Profile")); ?></h5>
            </div>
            <div class="card-body">
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="username"><?php echo e(__("Username")); ?></label>
                            <input type="text" class="form-control" name="name" id="username"
                                value="<?php echo e(Auth::user()->name); ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="useremail"><?php echo e(__("Email")); ?></label>
                            <input type="email" class="form-control" name="email" id="useremail"
                                value="<?php echo e(Auth::user()->email); ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="usermobile"><?php echo e(__("Mobile Number")); ?></label>
                            <input type="text" class="form-control" id="usermobile" value="<?php echo e(Auth::user()->mobile); ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="userbirthdate"><?php echo e(__("Date of Birth")); ?></label>
                            <input type="date" class="form-control" id="userbirthdate" value="<?php echo e(Auth::user()->dob); ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label class="text-dark" for="address"><?php echo e(__("Address Line 1:")); ?> <span
                                    class="text-danger">*</span></label>
                            <textarea required="" class="<?php $__errorArgs = ['line1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> form-control" id="line1"
                                name="line1"><?php echo e($user['line1']); ?></textarea>
                            <?php $__errorArgs = ['line1'];
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
                        <div class="form-group col-md-4">
                            <label class="text-dark" for="address"><?php echo e(__("Address Line 2:")); ?></label>
                            <textarea class="form-control" id="line2" name="line2"><?php echo e($user['line2']); ?></textarea>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="text-dark" for="address">Pincode: <span class="text-danger">*</span></label>
                            <input value="<?php echo e($user['pincode']); ?>" required="" type="text" pattern="[0-9]+"
                                placeholder="<?php echo e(__("enter pincode")); ?>" name="pincode" class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="text-dark" for="address"><?php echo e(__("Select Country: ")); ?><span
                                        class="text-danger">*</span></label>
                                <select data-placeholder="<?php echo e(__("Please select country")); ?>" required="" name="country_id"
                                    id="country_id" class="country <?php $__errorArgs = ['country_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> select2">
                                    <option value=""><?php echo e(__("Select country")); ?></option>
                                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option
                                        <?php echo e($user->country_id != '' && $user->country_id == $country->id ? "selected" : ""); ?>

                                        value="<?php echo e($country->id); ?>"> <?php echo e($country->nicename); ?> </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['country_id'];
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

                                <div class="invalid-feedback">
                                    <?php echo e(__('Please select country')); ?>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="text-dark" for="address"><?php echo e(__("Select State: ")); ?><span
                                        class="text-danger">*</span></label>
                                <select data-placeholder="<?php echo e(__("Please select state")); ?>" required="" name="state_id" id="state_id"
                                    class="states <?php $__errorArgs = ['state_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> select2">
                                    <option value=""><?php echo e(__("Select state")); ?></option>
                                    <?php if(isset($user->country->states)): ?>
                                    <?php $__currentLoopData = $user->country->states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php echo e($user->state_id == $state->id ? "selected" : ""); ?>

                                        value="<?php echo e($state->id); ?>"><?php echo e($state->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>

                                </select>
                                <?php $__errorArgs = ['state_id'];
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

                                <div class="invalid-feedback">
                                    <?php echo e(__('Please select state')); ?>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="text-dark" for="address"><?php echo e(__("Select City: ")); ?><span
                                        class="text-danger">*</span></label>
                                <select data-placeholder="<?php echo e(__("Please select city")); ?>" required="" name="city_id" id="city_id"
                                    class="cities <?php $__errorArgs = ['city_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> select2">
                                    <option value=""><?php echo e(__("Select city")); ?></option>
                                    <?php $__currentLoopData = $user->state->cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php echo e($user->city_id == $city->id ? "selected" : ""); ?> value="<?php echo e($city->id); ?>">
                                        <?php echo e($city->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['city_id'];
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
                                <div class="invalid-feedback">
                                    <?php echo e(__('Please select city')); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <label class="text-dark"><?php echo e(__("Designation:")); ?></label>
                            <input value="<?php echo e($user['name']); ?>" type="text" class="form-control"
                                placeholder="<?php echo e(__("enter designation of user")); ?>">

                        </div>
                         <div class="form-group col-md-6">
                                 <label class="text-dark" for="address"><?php echo e(__("Gender:")); ?></label>
                            <select name="gender" id="gender" class="form-control" value="<?php echo e(Auth::user()->gender); ?>">
                                <option <?php echo e($user->gender=='m' ? "selected" : ""); ?> value="m"><?php echo e(__("Male")); ?></option>
                                <option <?php echo e($user->gender=='f' ? "selected" : ""); ?> value="f"><?php echo e(__("Female")); ?></option>
                                <option <?php echo e($user->gender=='o' ? "selected" : ""); ?> value="o"><?php echo e(__("Other")); ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <div class="update-password custom-switch">
                            <input type="checkbox" id="myCheck" name="update_pass" class="custom-control-input"
                         value="1" onclick="myFunction()">
                            <label class="custom-control-label" for="myCheck"> <?php echo e(__('UpdatePassword')); ?>:</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div style="display: none" id="update-password">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><?php echo e(__('Password')); ?></label>
                                        <input type="password" name="password" id="password" class="form-control"
                                            placeholder="<?php echo e(__("Please Enter Password")); ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><?php echo e(__('ConfirmPassword')); ?></label>
                                        <input type="password" name="password_confirmation" id="re-password"
                                            class="form-control" placeholder="<?php echo e(__("Please Enter Confirm Password")); ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary-rgba font-16"><i
                            class="feather icon-save mr-2"></i><?php echo e(__("Update")); ?></button>
                </form>
            </div>
        </div>
    </div>
</form>
<br>
<?php $__env->stopSection(); ?>
<!-- End Contentbar -->
<?php $__env->startSection('script'); ?>

<script>
    $('.profilechoose').click(function () {
        $('#imgupload').trigger('click');
    });

    $("#imgupload").on('change', function () {
        readURL1(this);
    });

    function readURL1(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.profilechoose').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    var stateurl = <?php echo json_encode(route('list.state'), 15, 512) ?>;
    var cityurl = <?php echo json_encode(route('list.cities'), 15, 512) ?>;
</script>

<script>
    (function ($) {
        "use strict";
        $(function () {
            $('#myCheck').change(function () {
                if ($('#myCheck').is(':checked')) {
                    $('#update-password').show('fast');
                } else {
                    $('#update-password').hide('fast');
                }
            });

        });
    })(jQuery);
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\gym_new\resources\views/admin/profile/index.blade.php ENDPATH**/ ?>