
<?php $__env->startSection('title',__('Edit Trainer :eid -',['eid' => $trainer->trainer_name])); ?>
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
<?php echo e(__(' Edit Trainer')); ?>

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
<div class="admin-form">
    <form action="<?php echo e(route('trainer.update',$trainer->id)); ?>" method="POST" enctype="multipart/form-data"
        class="form-light form" novalidate>
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="tab-pane fade active show" id="v-pills-profile" role="tabpanel"
            aria-labelledby="v-pills-profile-tab">
            <div class="card m-b-5">
                <div class="card-body">
                    <div class="profilebox pt-4 text-center">
                        <div class="col-md-12">
                            <input name="photo" type="file" id="imgupload" style="display:none" />
                            <?php if($image = @file_get_contents('../public/image/slider/'.$trainer->photo)): ?>
                            <img <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> src="<?php echo e(url('image/slider/'.$trainer->photo)); ?>"
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
                                src="<?php echo e(Avatar::create($trainer->trainer_name)->toBase64()); ?>" alt="profilephoto"
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
                </div>
            </div>
        </div>
        <br>
        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title mb-0"><?php echo e(__("Personal Informations")); ?></h5>
            </div>
            <div class="card-body">
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
                                    <option <?php echo e($trainer['trainer_name'] == $user->id ? "selected" : ""); ?>

                                        value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>
                                   <?php echo e(__(" Select the user : Admin , Mr.x")); ?></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-dark"><?php echo e(__("Email: ")); ?><span class="text-danger">*</span></label>
                                <input autofocus="" type="email"
                                    class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    placeholder="<?php echo e(__("Enter Your Email" )); ?>"name="email" required=""
                                    value="<?php echo e($trainer->email); ?>">
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
                                <label class="text-dark"><?php echo e(__("Mobile Number:")); ?> <span class="text-danger">*</span></label>
                                <input autofocus="" type="tel" pattern="[0-9]{10}"
                                    class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    placeholder="<?php echo e(__("Enter your mobile number")); ?>" name="phone" required=""
                                    value="<?php echo e($trainer->phone); ?>">
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
                                    <?php echo e(__("Enter your mobile no.")); ?>

                                </small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-dark"><?php echo e(__("Date of Birth:")); ?></label>
                                <div class="input-group">
                                    <input name="dob" type="text" id="datepicker" class="datepicker-here form-control"
                                        placeholder="<?php echo e(__("dd/mm/yyyy")); ?>" aria-describedby="basic-addon2"
                                        value="<?php echo e($trainer->dob); ?>">
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
                                   <?php echo e(__(" Enter your Date of Birth")); ?>

                                </small>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                         <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-dark" for="address"><?php echo e(__("Address: ")); ?><span
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
                                    placeholder="<?php echo e(__("Enter Address")); ?>"><?php echo e($trainer['address']); ?></textarea>
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
                                    <?php echo e(__("Enter your address")); ?>

                                </small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-dark" for="address"><?php echo e(__("Pincode:")); ?> <span class="text-danger">*</span></label>
                                <input required="" type="text" pattern="[0-9]+" placeholder="<?php echo e(__("Enter pincode")); ?>" name="pincode"
                                    class="form-control" value="<?php echo e($trainer->pincode); ?>">
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
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>
                                   <?php echo e(__(" Enter your City Pincode")); ?>

                                </small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="text-dark" for="address"><?php echo e(__("Select Country:")); ?> <span
                                        class="text-danger">*</span></label>
                                <select data-placeholder="<?php echo e(__("Please select country" )); ?>"required="" name="country_id"
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
                                        <?php echo e($trainer->country_id != '' && $trainer->country_id == $country->id ? "selected" : ""); ?>

                                        value="<?php echo e($country->id); ?>"> <?php echo e($country->nicename); ?> </option>
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
                                <label class="text-dark" for="address"><?php echo e(__("Select State: ")); ?><span
                                        class="text-danger">*</span></label>
                                <select data-placeholder="<?php echo e(__("Please select state" )); ?>"required="" name="state_id" id="state_id"
                                    class="states <?php $__errorArgs = ['state_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> select2">
                                    <option value=""><?php echo e(__("Select state")); ?></option>
                                    <?php if(isset($trainer->country->states)): ?>
                                    <?php $__currentLoopData = $trainer->country->states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php echo e($trainer->state_id == $state->id ? "selected" : ""); ?>

                                        value="<?php echo e($state->id); ?>"><?php echo e($state->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
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
                                <label class="text-dark" for="address"><?php echo e(__("Select City:")); ?> <span
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
                                    <?php $__currentLoopData = $trainer->state->cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php echo e($trainer->city_id == $city->id ? "selected" : ""); ?>

                                        value="<?php echo e($city->id); ?>">
                                        <?php echo e($city->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                        <input type="text" class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            placeholder="<?php echo e(__("Enter your Qualification ")); ?>" name="qualification" required=""
                                            value="<?php echo e($trainer->qualification); ?>">

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
                                        <small class="text-muted text-info"> <i
                                                class="text-dark feather icon-help-circle"></i>
                                           <?php echo e(__(" Enter your Qualification details")); ?>

                                        </small>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">

                                        <label class="text-dark"><?php echo e(__("Enter Trainer Experience (In Years):")); ?> <span
                                                class="text-danger">*</span></label>
                                        <input autofocus="" type="text" pattern="[0-9]+"
                                            class="form-control <?php $__errorArgs = ['experience'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            placeholder="<?php echo e(__("Enter Your Trainer Experience")); ?>" name="experience" required=""
                                            value="<?php echo e($trainer->experience); ?>">

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
                                                class="text-dark feather icon-help-circle"></i>
                                           <?php echo e(__(" Enter your Experience")); ?>

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
                                        <input class="form-control <?php $__errorArgs = ['trainer_limit'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            placeholder="<?php echo e(__("Enter the Trainer Client limit ")); ?>" name="trainer_limit"
                                            type="number" required="" value="<?php echo e($trainer->trainer_limit); ?>">

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
                                                class="text-dark feather icon-help-circle"></i>
                                           <?php echo e(__(" Enter your Trainer Client limit")); ?>

                                        </small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-dark"><?php echo e(__("Enter Trainer Type: ")); ?><span
                                                class="text-danger">*</span></label>
                                        <select required="" name="type" id="type" class="form-control select2">
                                            <option value="Trainer type not set"><?php echo e(__("Select Trainer Type")); ?></option>
                                            <option <?php echo e($trainer->type =='Not a Personal Trainer' ? "selected" : ""); ?>

                                                value="Not a Personal Trainer"><?php echo e(__("Not a Personal Trainer")); ?></option>
                                            <option <?php echo e($trainer->type =='Home Personal Trainer' ? "selected" : ""); ?>

                                                value="Home Personal Trainer"><?php echo e(__("Home Personal Trainer")); ?></option>
                                            <option <?php echo e($trainer->type =='Online Personal Trainer' ? "selected" : ""); ?>

                                                value="Online Personal Trainer"><?php echo e(__("Online Personal Trainer")); ?></option>
                                            <option
                                                <?php echo e($trainer->type =='Home Online Personal Trainer' ? "selected" : ""); ?>

                                                value="Home Online Personal Trainer"><?php echo e(__("Home Online Personal Trainer")); ?>

                                            </option>
                                            <option <?php echo e($trainer->type =='Gym Personal Trainer' ? "selected" : ""); ?>

                                                value="Gym Personal Trainer"><?php echo e(__("Gym Personal Trainer")); ?></option>

                                        </select>
                                        <?php $__errorArgs = ['rating'];
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
                                <input value="<?php echo e($trainer->specialization); ?>" autofocus="" type="text"
                                    class="form-control <?php $__errorArgs = ['specialization'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    placeholder="<?php echo e(__("Enter Your Trainer Specialization")); ?>" name="specialization" required="">

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
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>
                                  <?php echo e(__("Enter your Specialization")); ?>

                                </small>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group<?php echo e($errors->has('rating') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('rating'); ?>-<span class="text-danger">*</span>
                                <div class="col-md-6">
                                    <div class="rating">
                                        <label>
                                            <input type="radio" name="rating" value="1"
                                                <?php echo e($trainer->rating == 1 ? 'checked' : ''); ?> />
                                            <span class="icon"><i class="fa fa-star" 
                                                    aria-hidden="true"></i></span>
                                        </label>
                                        <label>
                                            <input type="radio" name="rating" value="2"
                                                <?php echo e($trainer->rating == 2 ? 'checked' : ''); ?> />
                                            <span class="icon"><i class="fa fa-star" 
                                                    aria-hidden="true"></i></span>
                                            <span class="icon"><i class="fa fa-star" 
                                                    aria-hidden="true"></i></span>
                                        </label>
                                        <label>
                                            <input type="radio" name="rating" value="3"
                                                <?php echo e($trainer->rating == 3? 'checked' : ''); ?> />
                                            <span class="icon"><i class="fa fa-star" 
                                                    aria-hidden="true"></i></span>
                                            <span class="icon"><i class="fa fa-star" 
                                                    aria-hidden="true"></i></span>
                                            <span class="icon"><i class="fa fa-star" 
                                                    aria-hidden="true"></i></span>
                                        </label>
                                        <label>
                                            <input type="radio" name="rating" value="4"
                                                <?php echo e($trainer->rating == 4 ? 'checked' : ''); ?> />
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
                                            <input type="radio" name="rating" value="5"
                                                <?php echo e($trainer->rating == 5 ? 'checked' : ''); ?> />
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
                                        <div class="text-dark"
                                            class="form-group<?php echo e($errors->has('is_active') ? ' has-error' : ''); ?> switch-main-block">
                                            <div class="custom-switch">
                                                <?php echo Form::checkbox('is_active', 1,$trainer->is_active==1 ? 1 : 0,
                                                ['id' => 'switch1', 'class' => 'custom-control-input']); ?>

                                                <label class="custom-control-label" for="switch1"><?php echo e(__("Is Active")); ?></label>
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
                            <?php echo e(__("Update")); ?></button>
                    </div>
                </div>
                <div class="clear-both"></div>
    </form>
</div>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\GYM\gym_new\resources\views/admin/trainerlist/trainer/edit.blade.php ENDPATH**/ ?>