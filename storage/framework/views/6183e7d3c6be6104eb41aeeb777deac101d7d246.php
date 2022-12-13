
<?php $__env->startSection('title',__('Add Trainer')); ?>
<?php $__env->startSection('maincontent'); ?>
<!-- Start Breadcrumbbar -->    
<?php $__env->startComponent('components.breadcumb',['thirdactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
<?php echo e(__('Trainer')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Trainer')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu2'); ?>
<?php echo e(__('Add Trainer')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('button'); ?>
<div class="col-md-12 col-lg-6 text-right">
    <div class="top-btn-block">
        <a href="<?php echo e(route('trainer.index')); ?>" class="btn btn-primary-rgba mr-2"><i
            class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>
    </div>
</div>
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<!-- End Breadcrumbbar -->
<!-- Start form -->
<form  autocomplete="on" class="form-light form" novalidate action="<?php echo e(route('trainer.store')); ?>" method="POST">
    <?php echo e(csrf_field()); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h5 class="card-title mb-0"><?php echo e(__("Add Trainer")); ?></h5>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade active show" id="v-pills-profile" role="tabpanel"
                    aria-labelledby="v-pills-profile-tab">
                    <div class="card m-b-5">
                          <div class="card-body">
                              <div class="profilebox pt-4 text-center">
                                <ul class="list-inline">
                                    <div class="col-md-12">
                                        <li class="list-inline-item">
                                            <input name="photo" type="file" id="imgupload" style="display:none" />
                                            <img <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                src="<?php echo e(url('/assets/images/users/profile.svg')); ?>" alt="profilephoto"
                                                class="profilechoose ">
                                        </li>
                                </ul>
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
                    </div>
                </div>
            </div>
             <br>
              <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title mb-0"><?php echo e(__("Personal Informations")); ?></h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group<?php echo e($errors->has('trainer_name') ? ' has-error' : ''); ?>">
                                        <label class="text-dark" for="users id"><?php echo e(__("Choose a trainer")); ?> <span
                                                class="text-danger">*</span></label>
                                        <select data-placeholder="<?php echo e(__("Please select user")); ?>" class="form-control select2"
                                            name="trainer_name">
                                            <option value=""><?php echo e(__("Select one")); ?></option>
                                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
                                            <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__("Select the user : Admin , Mr.x")); ?></small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">

                                        <label class="text-dark"><?php echo e(__("Email:")); ?> <span class="text-danger">*</span></label>
                                        <input value="<?php echo e(old('email')); ?>" autofocus="" type="email"
                                            class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            placeholder="<?php echo e(__("Enter Your Email" )); ?>"name="email" required="">
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
                                        <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>
                                           <?php echo e(__(" Enter your email")); ?>

                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                           <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-dark"><?php echo e(__("Mobile Number:")); ?> <span
                                                class="text-danger">*</span></label>
                                        <input value="<?php echo e(old('phone')); ?>" autofocus="" type="tel" pattern="[0-9]{10}"
                                            class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            placeholder="<?php echo e(__("Enter your mobile number")); ?>" name="phone" required="">
                                            <?php $__errorArgs = ['phone'];
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
                                        <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>
                                          <?php echo e(__("  Enter your mobile no.")); ?>

                                        </small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                         <label class="text-dark"><?php echo e(__("Date of Birth:")); ?></label>
                                        <div class="input-group">
                                            <input value="<?php echo e(old('dob')); ?>" name="dob" type="text" id="datepicker"
                                                class="datepicker-here form-control" placeholder="<?php echo e(__("dd/mm/yyyy")); ?>"
                                                aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2"><i
                                                        class="feather icon-calendar"></i></span>
                                            </div>
                                        </div>
                                        <?php $__errorArgs = ['dob'];
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
                                        <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>
                                           <?php echo e(__(" Enter your  Date of Birth")); ?>

                                        </small>
                                    </div>
                                </div>
                            </div>
                             <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-dark" for="address"><?php echo e(__("Address:")); ?> <span
                                                class="text-danger">*</span></label>
                                        <textarea required="" class="<?php $__errorArgs = ['line1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> form-control"
                                            id="line1" name="address"
                                            placeholder="<?php echo e(__("Enter Address")); ?>"><?php echo e(old('address')); ?></textarea>
                                        <?php $__errorArgs = ['address'];
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
                                        <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>
                                            <?php echo e(__("Enter your addresss")); ?>

                                        </small>
                                    </div>
                                </div>
                                 <div class="col-md-6">
                                    <label class="text-dark" for="address"><?php echo e(__("Pincode:s")); ?> <span
                                            class="text-danger">*</span></label>
                                    <input value="<?php echo e(old('pincode')); ?>" required="" type="text" pattern="[0-9]+"
                                        placeholder="<?php echo e(__("Enter pincode")); ?>" name="pincode" class="form-control">
                                    <?php $__errorArgs = ['pincode'];
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
                                    <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__("Enter   your City Pincodes")); ?>

                                    </small>
                                </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="text-dark" for="address"><?php echo e(__("Select Country:s")); ?> <span
                                                class="text-danger">*</span></label>
                                        <select data-placeholder="<?php echo e(__("Please select country" )); ?>"required="" name="country_id"
                                            id="country_id"
                                            class="country <?php $__errorArgs = ['country_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> select2">
                                            <option value=""><?php echo e(__("Select country")); ?></option>
                                            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($country->id); ?>"> <?php echo e($country->nicename); ?> </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <hr>
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
                                        <label class="text-dark" for="address"><?php echo e(__("Select State:")); ?> <span
                                                class="text-danger">*</span></label>
                                        <select data-placeholder="<?php echo e(__("Please select state")); ?>" required="" name="state_id"
                                            id="state_id"
                                            class="states <?php $__errorArgs = ['state_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> select2">
                                            <option value=""><?php echo e(__("Select states")); ?></option>

                                        </select>
                                        <hr>
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
                                        <label class="text-dark" for="address"><?php echo e(__("Select City:s")); ?> <span
                                                class="text-danger">*</span></label>
                                        <select data-placeholder="<?php echo e(__("Please select city")); ?>" required="" name="city_id"
                                            id="city_id" class="cities <?php $__errorArgs = ['city_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> select2">
                                            <option value=""><?php echo e(__("Select citys")); ?></option>
                                        </select>
                                        <hr>
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
                                  <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-dark"><?php echo e(__("Trainer Qualification:")); ?> <span
                                                        class="text-danger">*</span></label>
                                                <input value="<?php echo e(old('phone')); ?>" type="text"
                                                    class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    placeholder="<?php echo e(__("Enter your Qualification ")); ?>" name="qualification"
                                                    required="">

                                                <?php $__errorArgs = ['qualification'];
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
                                                <small class="text-muted"> <i
                                                        class="text-dark feather icon-help-circle"></i> <?php echo e(__("Enter your Qualification details")); ?>

                                                </small>
                                            </div>
                                        </div>
                                          <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-dark"><?php echo e(__("Enter Trainer Experience (In Years):")); ?> <span
                                                        class="text-danger">*</span></label>
                                                <input value="<?php echo e(old('experience')); ?>" autofocus="" type="text"
                                                    pattern="[0-9]+"
                                                    class="form-control <?php $__errorArgs = ['experience'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    placeholder="<?php echo e(__("Enter Your Trainer Experience")); ?>"" name="experience"
                                                    required="">

                                                <?php $__errorArgs = ['experience'];
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
                                                        class="text-dark feather icon-help-circle"></i> <?php echo e(__("Enter your Experiences")); ?>

                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-dark"><?php echo e(__("Trainer client Limit:")); ?> <span
                                                        class="text-danger">*</span></label>
                                                <input value="<?php echo e(old('trainer_limit')); ?>"
                                                    class="form-control <?php $__errorArgs = ['trainer_limit'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    placeholder="<?php echo e(__("Enter the Trainer Client limit ")); ?>" name="trainer_limit"
                                                    type="number" required="">

                                                <?php $__errorArgs = ['trainer_limit'];
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
                                                        class="text-dark feather icon-help-circle"></i> <?php echo e(__("Enter your Trainer Client limit")); ?>

                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">

                                                <label class="text-dark"><?php echo e(__("Enter Trainer Type:")); ?> <span
                                                        class="text-danger">*</span></label>
                                                <select required="" name="type" id="type" class="form-control select2">
                                                    <option value="Trainer type not set"><?php echo e(__("Select Trainer Type")); ?></option>
                                                    <option value="Not a Personal Trainer"><?php echo e(__("Not a Personal Trainer")); ?>

                                                    </option>
                                                    <option value="Home Personal Trainer"><?php echo e(__("Home Personal Trainer")); ?></option>
                                                    <option value="Online Personal Trainer"><?php echo e(__("Online Personal Trainer")); ?>

                                                    </option>
                                                    <option value="Home Online Personal Trainer"><?php echo e(__("Home Online Personal")); ?>

                                                       <?php echo e(__(" Trainer")); ?></option>
                                                    <option value="Gym Personal Trainer"><?php echo e(__("Gym Personal Trainer")); ?></option>

                                                </select>
                                                 <?php $__errorArgs = ['type'];
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
                                                <small class="text-muted text-info" name="type"> <i
                                                        class="text-dark feather icon-help-circle"></i> <?php echo e(__("Enter your Trainer Type")); ?>

                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                                <label class="text-dark"><?php echo e(__("Trainer Specialization:")); ?> <span
                                                        class="text-danger">*</span></label>
                                                <input value="<?php echo e(old('specialization')); ?>" autofocus="" type="text"
                                                    class="form-control <?php $__errorArgs = ['specialization'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    placeholder="<?php echo e(__("Enter Your Trainer Specialization")); ?>" name="specialization"
                                                    required="">

                                                <?php $__errorArgs = ['specialization'];
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
                                                        class="text-dark feather icon-help-circle"></i> <?php echo e(__("Enter your Specialization")); ?>

                                                </small>
                                            </div>
                                      
                                         </div>
                                        <div class="col-md-12">
                                            <div class="form-group<?php echo e($errors->has('rating') ? ' has-error' : ''); ?>">
                                                <?php echo Form::label('rating'); ?> -<span class="text-danger">*</span>
                                              
                                                <div class="col-md-12">
                                                    <div class="rating">
                                                        <label>
                                                            <input type="radio" name="rating" value="1" />
                                                            <span class="icon"><i class="fa fa-star"
                                                                     aria-hidden="true"></i></span>
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="rating" value="2" />
                                                            <span class="icon"><i class="fa fa-star"
                                                                    aria-hidden="true"></i></span>
                                                            <span class="icon"><i class="fa fa-star"
                                                                   aria-hidden="true"></i></span>
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="rating" value="3" />
                                                            <span class="icon"><i class="fa fa-star"
                                                                    aria-hidden="true"></i></span>
                                                            <span class="icon"><i class="fa fa-star"
                                                                    aria-hidden="true"></i></span>
                                                            <span class="icon"><i class="fa fa-star"
                                                                     aria-hidden="true"></i></span>
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="rating" value="4" />
                                                            <span class="icon"><i class="fa fa-star"
                                                                     aria-hidden="true"></i></span>
                                                            <span class="icon"><i class="fa fa-star"
                                                                     aria-hidden="true"></i></span>
                                                            <span class="icon"><i class="fa fa-star"
                                                                     aria-hidden="true"></i></span>
                                                            <span class="icon"><i class="fa fa-star"
                                                                     aria-hidden="true"></i></span>
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="rating" value="5" />
                                                            <span class="icon"><i class="fa fa-star"
                                                                   aria-hidden="true"></i></span>
                                                            <span class="icon"><i class="fa fa-star"
                                                                   aria-hidden="true"></i></span>
                                                            <span class="icon"><i class="fa fa-star"
                                                                    aria-hidden="true"></i></span>
                                                            <span class="icon"><i class="fa fa-star"
                                                                    aria-hidden="true"></i></span>
                                                            <span class="icon"><i class="fa fa-star"
                                                                     aria-hidden="true"></i></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div
                                                        class="form-group<?php echo e($errors->has('is_active') ? ' has-error' : ''); ?> switch-main-block">
                                                        <div class="custom-switch">
                                                            <?php echo Form::checkbox('is_active', 1,1, ['id' => 'switch1',
                                                            'class' =>
                                                            'custom-control-input']); ?>

                                                            <label class="custom-control-label"
                                                                for="switch1"><?php echo e(__("Is_Active")); ?></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <button type="reset" class="btn btn-danger"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>
                                        <?php echo e(__("Create")); ?></button>
                                </div>
                            </div>
                            <div class="clear-both"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- End form -->
    <?php $__env->stopSection(); ?>
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
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\GYM\gym_new\resources\views/admin/trainerlist/trainer/create.blade.php ENDPATH**/ ?>