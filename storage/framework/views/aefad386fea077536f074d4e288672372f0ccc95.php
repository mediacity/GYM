
<?php $__env->startSection('title',__('Edit User :eid -',['eid' => $user->name])); ?>
<?php $__env->startSection('breadcum'); ?>
<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar breadcrumbbar-one">
    <div class="row align-items-center">
        <div class="col-md-6 col-lg-8">
            <h4 class="page-title"><?php echo e(config('app.name')); ?></h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>"><?php echo e(__('Home')); ?></a></li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard.index')); ?>"><?php echo e(__('Dashboard')); ?></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <?php echo e(__('Edit user')); ?>

                    </li>
                </ol>
            </div>
        </div>

        <div class="col-md-6 col-lg-4">
            <div class="widgetbar">
                <a title="Back" href="<?php echo e(route('users.index')); ?>" class=" text-right btn btn-primary-rgba"><i
                class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?> </a>
            </div>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
<?php $__env->startSection('maincontent'); ?>
<form autocomplete="off" action="<?php echo e(route('users.update', $user['uuid'])); ?>" class="form" method="POST" novalidate
    enctype="multipart/form-data">

    <?php echo csrf_field(); ?>

    <?php echo method_field('PUT'); ?>

    <div class="row">

        <div class="col-md-12">
            <div class="card">

                <div class="card-header">

                    <h4>
                        <?php if(!$user->roles): ?>
                        <span class='float-right badge badge-pill badge-secondary'> <i class='feather icon-user-x'></i>
                           <?php echo e(__(" No Role assigned !")); ?></span>
                        <?php endif; ?>


                        <?php if(isset($user->roles[0]['name']) && $user->roles[0]['name'] == 'Super Admin'): ?>
                        <span class='float-right badge badge-pill badge-danger'> <i class='feather icon-shield'></i>
                            <?php echo e($user->roles[0]['name']); ?></span>
                        <?php endif; ?>


                        <?php if(isset($user->roles[0]['name']) && $user->roles[0]['name'] == 'Admin'): ?>{
                        <span class='float-right badge badge-pill badge-warning'> <i class='feather icon-award'></i>
                            <?php echo e($user->roles[0]['name']); ?></span>
                        <?php endif; ?>

                        <?php if(isset($user->roles[0]['name']) && $user->roles[0]['name'] == 'Trainer'): ?>
                        <span class='float-right badge badge-pill badge-info'> <i
                                class='feather icon-user-check'></i>&nbsp;<?php echo e($user->roles[0]['name']); ?></span>
                        <?php endif; ?>

                        <?php if(isset($user->roles[0]['name']) && $user->roles[0]['name'] == 'Blocked'): ?>
                        <span class='float-right badge badge-pill badge-dark'> <i
                                class='feather  icon-user-x'></i>&nbsp;<?php echo e($user->roles[0]['name']); ?></span>
                        <?php endif; ?>

                        <?php if(isset($user->roles[0]['name']) && $user->roles[0]['name'] == 'Prescriptionist'): ?>
                        <span class='float-right badge badge-pill badge-success'> <i
                                class='feather  icon-gitlab'></i>&nbsp;<?php echo e($user->roles[0]['name']); ?></span>
                        <?php endif; ?>

                        <?php if(isset($user->roles[0]['name']) && $user->roles[0]['name'] == 'Doctor'): ?>
                        <span class='float-right badge badge-pill badge-primary'> <i
                                class='feather icon-heart'></i>&nbsp;<?php echo e($user->roles[0]['name']); ?></span>
                        <?php endif; ?>

                        <?php if(isset($user->roles[0]['name']) && $user->roles[0]['name'] == 'User'): ?>
                        <span class='float-right badge badge-pill badge-primary'> <i
                                class='feather icon-heart'></i>&nbsp;<?php echo e($user->roles[0]['name']); ?></span>
                        <?php endif; ?>

                    </h4>

                    <h4 class="card-title"><?php echo e(__('Edit user :')); ?> <?php echo e($user->name); ?></h4>
                  </div>

                <div class="card-body">

                    <div class="row">
                        <div class="col-lg-3 col-md-12">
                            <div class="form-group">
                                <input name="photo" type="file" id="imgupload" class="d-none" />
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
                                <img <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    src="<?php echo e(Avatar::create($user->name)->toBase64()); ?>" alt="profilephoto"
                                    class="profilechoose img-thumbnail rounded img-fluid">
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
                            </div>
                        </div>

                        <div class="col-lg-9 col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-dark"><?php echo e(__("Name: ")); ?><span class="text-danger">*</span></label>
                                        <input value="<?php echo e($user['name']); ?>" autofocus="" type="text"
                                            class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            placeholder="<?php echo e(__("enter name")); ?>" name="name" required="">

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
                                        <label class="text-dark"><?php echo e(__("Email:")); ?> <span class="text-danger">*</span></label>
                                        <input value="<?php echo e($user['email']); ?>" autofocus="" type="email" name="email"
                                            class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            placeholder="<?php echo e(__("enter email")); ?>" required="">

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



                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-dark"><?php echo e(__("Mobile:")); ?></label>

                                        <input value="<?php echo e($user['mobile']); ?>" title="enter valid no." pattern="[0-9]{10}"
                                            type="text" class="form-control" placeholder="<?php echo e(__("enter valid mobile no.")); ?>"
                                            name="mobile" required="">


                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-dark"><?php echo e(__("Alternate Mobile No:")); ?></label>
                                        <input value="<?php echo e($user['phone']); ?>" title="enter valid no." pattern="[0-9]+"
                                            type="text" class="form-control" placeholder="<?php echo e(__("Enter alternate mobile no.")); ?>"
                                            name="phone">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-dark" for="address"><?php echo e(__("Gender:")); ?></label>

                                        <select name="gender" id="gender" class="form-control" required="">

                                            <option <?php echo e($user->gender =='m' ? "selected" : ""); ?> value="m"><?php echo e(__("Male")); ?></option>
                                            <option <?php echo e($user->gender =='f' ? "selected" : ""); ?> value="f"><?php echo e(__("Female")); ?>

                                            </option>
                                            <option <?php echo e($user->gender =='o' ? "selected" : ""); ?> value="o"><?php echo e(__("Other")); ?></option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="text-dark"><?php echo e(__("Membership: ")); ?><span
                                                class="text-danger">*</span></label><br>
                                        <label class="switch"><input type="checkbox" id="togBtn" name="membership"
                                                <?php echo e($user->membership == 'yes' ? 'checked' : ''); ?>>
                                            <div class="slider round">

                                                <span class="on"></span><span class="off"></span>

                                            </div>
                                        </label>
                                        <?php $__errorArgs = ['membership'];
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
                    </div>

                    <hr>

                    <div class="row">

                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="text-dark" for="address"><?php echo e(__("Address Line 1: ")); ?><span
                                        class="text-danger">*</span></label>
                                <textarea required="" class="<?php $__errorArgs = ['line1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> form-control"
                                    id="line1" name="line1" required=""><?php echo e($user['line1']); ?></textarea>

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
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="text-dark" for="address"><?php echo e(__("Address Line 2:")); ?></label>
                                <textarea class="form-control" id="line2" name="line2"><?php echo e($user['line2']); ?></textarea>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="text-dark" for="address"><?php echo e(__("Pincode:")); ?> <span class="text-danger">*</span></label>

                                <input value="<?php echo e($user['pincode']); ?>" required="" type="text" pattern="[0-9]{6}"
                                    placeholder="<?php echo e(__("enter pincode")); ?>" name="pincode" class="form-control">
                            </div>

                        </div>

                        <div class="col-lg-4 col-md-6">
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
                                    <option value="">Select country</option>

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

                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="text-dark" for="address"><?php echo e(__("Select State: ")); ?><span
                                        class="text-danger">*</span></label>
                                <select data-placeholder="<?php echo e(__("Please select state" )); ?>" required="" name="state_id" id="state_id"
                                    class="states <?php $__errorArgs = ['state_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> select2">
                                    <option value="">Please select state</option>
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

                        <div class="col-lg-4 col-md-6">

                            <div class="form-group">
                                <label class="text-dark" for="address"><?php echo e(__("Select City: ")); ?><span
                                        class="text-danger">*</span></label>
                                <select data-placeholder="<?php echo e(__("Please select city" )); ?>" required="" name="city_id" id="city_id"
                                    class="cities <?php $__errorArgs = ['city_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> select2">
                                    <option value="">Please select city</option>
                                    <?php if(isset($user->state->cities)): ?>
                                    <?php $__currentLoopData = $user->state->cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php echo e($user->city_id == $city->id ? "selected" : ""); ?> value="<?php echo e($city->id); ?>">
                                        <?php echo e($city->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
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



                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-dark"><?php echo e(__("Date of Birth:")); ?></label>
                                <div class="input-group">
                                    <input value="<?php echo e($user->dob); ?>" name="dob" type="text" id="datepicker"
                                        class="datepicker-here form-control" placeholder="<?php echo e(__("YYYY/MM/DD")); ?>"
                                        aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2"><i
                                                class="feather icon-calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-dark"><?php echo e(__("Occupation:")); ?></label>
                                <input value="<?php echo e($user['name']); ?>" type="text" class="form-control"
                                    placeholder="<?php echo e(__("enter occupation of user")); ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-dark"><?php echo e(__("Select Role:")); ?> <span class="text-danger">*</span></label>
                                <select required="" name="role" id="" class="form-control select2">
                                    <option value="">Choose a role</option>
                                    <?php if(isset($roles)): ?>

                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option
                                        <?php echo e(isset($user->roles[0]['id']) && $user->roles[0]['id'] == $role->id ? "selected" : ""); ?>

                                        value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-dark"><?php echo e(__("Demo: ")); ?><span class="text-danger">*</span></label><br>
                                <label class="switch"><input type="checkbox" id="togBtn" name="demo"
                                        <?php echo e($user->demo == 'yes' ? 'checked' : ''); ?>>
                                    <div class="slider round">

                                        <span class="on"></span><span class="off"></span>

                                    </div>
                                </label>
                                <?php $__errorArgs = ['demo'];
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
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-dark" for="issue"><?php echo e(("Health Issue:")); ?>}}</label>
                                <br>
                                <label for="issue">
                                    <input <?php echo e(($user->issue != ['NO'] ? "checked" : "")); ?> class="health_check"
                                        type="checkbox" id="issue" name="health_check"> Do you have any health issue
                                    ?</label>
                                <div style=<?php echo e(($user->issue != ['NO'] ? "checked" : "display:none;")); ?> id="healthbox">
                                    <select data-placeholder="<?php echo e(__("Please select if you have any issue ")); ?>" name="issue[]"
                                        class="mdb-select md-form form-control select2" id="issue_dropdown"
                                        style="display:none;" multiple>

                                        <?php $__currentLoopData = App\Enquiryhealth::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $issue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <option <?php if($user->issue != ''): ?> <?php $__currentLoopData = $user->issue; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $health): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo e($health == $issue->id ? "selected" : ""); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>
                                            value="<?php echo e($issue->id); ?>"> <?php echo e($issue['issue']); ?> </option>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                <?php $__errorArgs = ['issue'];
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
                                <br>
                                <small class="text-muted" name="details"> <i
                                        class="text-dark feather icon-help-circle"></i> <?php echo e(__("Enter your health description
                                        :For eg.- any health problem like B.P, Sugar etc..")); ?>

                                </small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <input type="file" name="file" value="<?php echo e($user->file); ?>" id="file2"
                                class="<?php echo e($errors->has('file') ? ' is-invalid' : ''); ?> inputfile inputfile-1" />
                            <label for="file2"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="30"
                                    viewBox="0 0 20 17">
                                    <path
                                        d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                                </svg></label>

                            <span class="text-danger invalid-feedback" role="alert"></span> <br> <small
                                class="text-muted text-info" name="details"> <i
                                    class="text-dark feather icon-help-circle"></i>
                               <?php echo e(__(" Upload Document")); ?>

                            </small></div>
                           </div>
                </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <button type="reset" class="btn btn-danger"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i> <?php echo e(__("Update")); ?></button>
                    </div>
                </div>
                <div class="clear-both"></div>
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
    $('.health_check').on('change', function () {
        if ($(this).is(':checked')) {
            $('#healthbox').show('fast');
            $('#issue_dropdown').attr('required', 'required');
        } else {
            $('#healthbox').hide('fast');
            $('#issue_dropdown').removeAttr('required');
        }
    })

    var stateurl = <?php echo json_encode(route('list.state'), 15, 512) ?>;
    var cityurl = <?php echo json_encode(route('list.cities'), 15, 512) ?>;
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\GYM\gym_new\resources\views/manage/users/edit.blade.php ENDPATH**/ ?>