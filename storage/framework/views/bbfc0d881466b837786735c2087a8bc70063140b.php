
<?php $__env->startSection('title',__('Add Enquiry')); ?>
<?php $__env->startSection('breadcum'); ?>
	<div class="breadcrumbbar breadcrumbbar-one">
        <div class="row align-items-center">
            <div class="col-md-7 col-lg-5">
                <h4 class="page-title"><?php echo e(__("Enquiry")); ?></h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard.index')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                        <li class="breadcrumb-item"><a href=""><?php echo e(__('Admin')); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                        	<?php echo e(__('Add Enquiry')); ?>

                        </li>
                    </ol>
                </div>
            </div>
            <div class="col-md-5 col-lg-7">
                <div class="top-btn-block text-right">
                    <a href="<?php echo e(route('enquiryhealth.create')); ?>" class="btn btn-primary-rgba mr-2"><i
                    class="feather icon-plus mr-2"></i><?php echo e(__("Add Health Issue")); ?></a>

                    <a href="<?php echo e(route('enquiry.index')); ?>" class="btn btn-primary-rgba mr-2"><i
                    class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>
                </div>
            </div>  
        </div>          
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
    <!-- <div class="col-md-12"> -->
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card m-b-3">
            <div class="card-body">
                <form autocomplete="off" class="form-light form" novalidate action="<?php echo e(route('enquiry.store')); ?>" method="POST">
                <?php echo e(csrf_field()); ?>

                    <div class="bg-info-rgba bg-orange p-4 mb-4">
                        <h4 class="pb-4">Personal Details</h4>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="text-dark"><?php echo e(__("Name:")); ?> <span class="text-danger">*</span></label>
                                    <input value="<?php echo e(old('name')); ?>" type="text"
                                        class="form-control mb-2 <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        placeholder="<?php echo e(__('Your Name')); ?>" name="name" required="">
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
                                    <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>
                                        <?php echo e(__(" Enter your name..")); ?></small>
                                </div>
                                <div class="text-dark form-group<?php echo e($errors->has('age') ? ' has-error' : ''); ?>">
                                    <?php echo Form::label('age', 'Age',['class'=>'required']); ?><span class="text-danger">*</span>
                                    <?php echo Form::number('age', null, ['class' => 'form-control mb-2',
                                    'required','placeholder' => 'Please Enter Age', 'pattern' => '[0-9]{1-100}']); ?>

                                    <small class="text-danger"><?php echo e($errors->first('age')); ?></small>
                                    <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>
                                        <?php echo e(__("Add a Age")); ?></small>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark"><?php echo e(__("Mobile Number: ")); ?><span
                                            class="text-danger">*</span></label>

                                    <input value="<?php echo e(old('mobile')); ?>" type="tel" pattern="[0-9]{10}"
                                        class="form-control mb-2 <?php $__errorArgs = ['mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        placeholder="<?php echo e(__('Your current Mobile Number')); ?>" name="mobile" required="">
                                    <?php $__errorArgs = ['mobile'];
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
                                        <?php echo e(__("  Enter your mobile number")); ?></small>
                                </div>  
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="text-dark"><?php echo e(__("Father's Name: ")); ?><span
                                            class="text-danger">*</span></label>
                                    <input value="<?php echo e(old('f_name')); ?>" type="text"
                                        class="form-control mb-2 <?php $__errorArgs = ['f_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        placeholder="<?php echo e(__('Your Fathers Name')); ?>" name="f_name" required="">
                                    <?php $__errorArgs = ['f_name'];
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
                                        <?php echo e(__(" Enter your father name..")); ?></small>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark"><?php echo e(__("Email: ")); ?><span class="text-danger">*</span></label>
                                    <input value="<?php echo e(old('email')); ?>" type="email"
                                        class="form-control mb-2 <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        placeholder="<?php echo e(__('Your Email')); ?>" name="email" required="">
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
                                        <?php echo e(__(" Enter your valid email")); ?></small>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark"><?php echo e(__("Alternate Mobile Number:")); ?>

                                    </label>
                                    <input value="<?php echo e(old('phone')); ?>" type="text"
                                        class="form-control mb-2 <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        placeholder="<?php echo e(__('Your Alternate Mobile Number')); ?>" name="phone">
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
                                        <?php echo e(__("Enter your alternate mobile number")); ?></small>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label class="text-dark" for="address"><?php echo e(__("Description: ")); ?><span
                                            class="text-danger">*</span></label>
                                    <textarea required="" class="<?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> form-control mb-2"
                                        id="description" name="description" rows="5"><?php echo e(old('description')); ?></textarea>
                                    <?php $__errorArgs = ['description'];
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
                                    <small class="text-muted text-info" name="description">
                                        <i class="text-dark feather icon-help-circle"></i>
                                        <?php echo e(__("Enter your Enquiry description")); ?>

                                    </small>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-info-rgba bg-orange p-4 mb-4">
                        <h4 class="pb-4">Address</h4>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="text-dark" for="address"><?php echo e(__("Select Country: ")); ?><span
                                            class="text-danger">*</span></label>
                                    <select data-placeholder="<?php echo e(__('Please select country')); ?>" required="" name="country_id"
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
                                        <option value="<?php echo e($country->id); ?>"> <?php echo e($country->nicename); ?> </option>
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
                                <div class="form-group">
                                    <label class="text-dark" for="address"><?php echo e(__("Select City: ")); ?><span
                                            class="text-danger">*</span></label>
                                    <select data-placeholder="<?php echo e(__('Please select state')); ?>" required="" name="city_id"
                                        id="city_id" class="cities <?php $__errorArgs = ['city_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> select2">
                                        <option value=""><?php echo e(__("Select city")); ?></option>

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
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="text-dark" for="address"><?php echo e(__("Select State: ")); ?><span
                                            class="text-danger">*</span></label>
                                    <select data-placeholder="<?php echo e(__('Please select state')); ?>" required="" name="state_id"
                                        id="state_id" class="states <?php $__errorArgs = ['state_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> select2">
                                        <option value=""><?php echo e(__("Select state")); ?></option>
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
                                <div class="form-group">
                                    <label class="text-dark"><?php echo e(__('Pincode:')); ?> <span class="text-danger">*</span></label>
                                    <input value="<?php echo e(old('pincode')); ?>" type="tel" pattern="[0-9]{6}"
                                        class="form-control mb-2 <?php $__errorArgs = ['pincode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        placeholder="<?php echo e(__('Your city Pincode')); ?>" name="pincode" required="">
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
                                        <?php echo e(__("Enter your city pincode")); ?></small>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label class="text-dark" for="address"><?php echo e(__("Address : ")); ?><span
                                            class="text-danger">*</span></label>
                                    <textarea required="" class="<?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> form-control mb-2" id="line1"
                                        name="address"><?php echo e(old('address')); ?></textarea>
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
                                        <?php echo e(__(" Enter your Address")); ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-info-rgba bg-orange p-4 mb-4">
                        <h4 class="pb-4">Other Information</h4>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="text-dark"><?php echo e(__("Select Your Enquiry Purpose: ")); ?><span
                                            class="text-danger">*</span></label>
                                    <select required="" name="purpose" id="purpose" class="form-control mb-2 select2">
                                        <option value="Not set"><?php echo e(__("Select Purpose")); ?></option>
                                        <option value="Gym"><?php echo e(__("Gym")); ?></option>
                                        <option value="Diet"><?php echo e(__("Diet")); ?></option>
                                        <option value="Yoga"><?php echo e(__("Yoga")); ?></option>
                                        <option value="Aerobics"><?php echo e(__("Aerobics")); ?></option>
                                        <option value="Others"><?php echo e(__("Others")); ?></option>
                                    </select>
                                    <?php $__errorArgs = ['purpose'];
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
                                            class="text-dark feather icon-help-circle"></i>
                                        <?php echo e(__("  Select your Enquiry Purpose")); ?>

                                    </small>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark"><?php echo e(__("Budget:")); ?> <span class="text-danger">*</span></label>

                                    <select autofocus="" class="form-control mb-2 select2" name="cost_id">
                                        <option value=""><?php echo e(__("Select Cost")); ?></option>
                                        <?php $__currentLoopData = $costs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <option value="<?php echo e($cost->id); ?>"><?php echo e($cost->cost); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>

                                    <?php $__errorArgs = ['cost'];
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
                                        <?php echo e(__("Select cost eg:10,000, 12,000")); ?> </small>

                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-10 col-md-9 col-9">
                                            <label class="text-dark"><?php echo e(__("Religion:")); ?> <span
                                                    class="text-danger">*</span></label>
                                            <select autofocus="" class="form-control mb-2 select2" name="religion_id">
                                                <option value=""><?php echo e(__("Select Religion")); ?></option>
                                                <?php $__currentLoopData = $religions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $religion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <option value="<?php echo e($religion->id); ?>"><?php echo e($religion->religion); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php $__errorArgs = ['religion'];
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
                                                <?php echo e(__("Select religion eg:buddhism,islam ")); ?></small>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-3">
                                            <button class="btn btn-sm btn-primary religion-btn" data-toggle="modal"
                                                data-target="#exampleModal">
                                                +
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-10 col-md-9 col-9">
                                            <label class="text-dark"><?php echo e(__("Second Language:")); ?> <span
                                                    class="text-danger">*</span></label>

                                            <select autofocus="" class="form-control mb-2 select2" name="second_language">
                                                <option value=""><?php echo e(__("Select Second Language")); ?></option>
                                                <?php $__currentLoopData = $secondlanguages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $secondlanguage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <option value="<?php echo e($secondlanguage->id); ?>"><?php echo e($secondlanguage->secondlanguage); ?>

                                                </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>

                                            <?php $__errorArgs = ['secondlanguage'];
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
                                                <?php echo e(__("Select secondlanguage eg:Marathi,Gujrathi ")); ?></small>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-3">
                                            <button class="btn btn-sm btn-primary religion-btn" data-toggle="modal"
                                                data-target="#exampleModalll">
                                                +
                                            </button>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="text-dark"><?php echo e(__("From Where You Get Reference About us: ")); ?><span
                                            class="text-danger">*</span></label>
                                    <select required="" name="refrence" id="details" class="form-control mb-2 select2">
                                        <option value="Not set"><?php echo e(__("From Where You Get Reference About us")); ?></option>
                                        <option value="News"><?php echo e(__("News")); ?></option>
                                        <option value="Email"><?php echo e(__("Email")); ?></option>
                                        <option value="Socialmedia"><?php echo e(__("SocialMedia")); ?></option>
                                        <option value="From gym"><?php echo e(__("Some one from our gym")); ?></option>
                                        <option value="Others"><?php echo e(__("Others")); ?></option>
                                    </select>
                                    <?php $__errorArgs = ['details'];
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
                                    <small class="text-muted text-info" name="reference"> <i
                                            class="text-dark feather icon-help-circle"></i>
                                        <?php echo e(__(" Select where you get details about us")); ?></small>
                                </div>
                                <div class="form-group<?php echo e($errors->has('status') ? ' has-error' : ''); ?>">
                                    <label class=" text-dark" for="cars"><?php echo e(__("Choose a Status:")); ?><span class="text-danger" class="text-dark">*</span></label>
                                    <select data-placeholder="<?php echo e(__("Please select status")); ?>" class="form-control mb-2 select2" name="status">
                                        <option selected><?php echo e(__("Please select status")); ?></option>
                                        <option value="demo"><?php echo e(__("Demo")); ?></option>
                                        <option value="close"><?php echo e(__("Close")); ?></option>
                                        <option value="join"><?php echo e(__("Join")); ?></option>
                                        <option value="pending"><?php echo e(__("Pending")); ?></option>
                                    </select>
                                    <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>
                                        <?php echo e(__("Select a status eg: pending,join")); ?>

                                    </small>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-10 col-md-9 col-9">
                                            <label class="text-dark" ><?php echo e(__("Occupation:")); ?> <span
                                                    class="text-danger">*</span></label>

                                            <select autofocus="" class="form-control mb-2 select2" name="occupation_id">
                                                <option value=""><?php echo e(__("Select Occupation")); ?></option>
                                                <?php $__currentLoopData = $occupations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $occupation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <option value="<?php echo e($occupation->id); ?>"><?php echo e($occupation->occupation); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>

                                            <?php $__errorArgs = ['occupation'];
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
                                                <?php echo e(__("Select occupation eg:dentist,bussinessman")); ?> </small>
                                        </div>
                                        <div class="col-lg-2 col-md-3 col-3">
                                            <button class="btn btn-sm btn-primary religion-btn" data-toggle="modal"
                                                data-target="#exampleModall">
                                                +
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark" for="issue"><?php echo e(__("Health Issue:")); ?></label><br>
                                    <label for="issue"> <input class="health_check" type="checkbox" id="issue"
                                            name="health_check"> <?php echo e(__("Do you have any health issue ?")); ?></label>
                                    <br>
                                    <div style="display:none;" id="healthbox" class="col-md-10">
                                        <div class="row">
                                            <div class="form-group health-form">
                                                <select data-placeholder="<?php echo e(__('Please select if you have any issue')); ?>"
                                                    name="issue[]" class="mdb-select md-form form-control mb-2 select2"
                                                    id="issue_dropdown" style="display:none;" multiple>
                                                    <?php if(isset($enquiryhealth)): ?>
                                                    <?php $__currentLoopData = $enquiryhealth; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enquiryhealth): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($enquiryhealth->id); ?>"><?php echo e($enquiryhealth->issue); ?>

                                                    </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </select>
                                            </div>
                                            <button class="btn btn-sm btn-primary health-btn" data-toggle="modal"
                                                data-target="#exampleModalCenter">
                                                +
                                            </button>
                                        </div>
                                    </div>
                                    <small class="text-muted text-info" name="details"> <i
                                            class="text-dark feather icon-help-circle"></i><?php echo e(__("Enter your health description:For eg: Any health problem like B.P, Sugar etc..")); ?>

                                    </small>
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
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i>
                            <?php echo e(__("Reset")); ?></button>
                        <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                            <?php echo e(__("Create")); ?></button>

                        <div class="clear-both"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    <!-- </div> -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
    $('.calendar').each(function () {
        $(this).datepicker({
            dateFormat: 'yy-mm-dd',
            minDate: 0
        });
    });

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
<!-- Start Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <form autocomplete="off" class="form-light" action="<?php echo e(route('enquiryhealth.store')); ?>" method="POST">
                    <?php echo e(csrf_field()); ?>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h1 class="card-title"><?php echo e(__('Health Details:')); ?></h1>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="text-dark"><?php echo e(__("Health Isuue: ")); ?><span
                                                        class="text-danger">*</span></label>
                                                <input type="text"
                                                    class="form-control mb-2 <?php $__errorArgs = ['issue'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    placeholder="<?php echo e(__("Your Health issue")); ?>" name="issue" required="">
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
                                                <small class="text-muted"> <i
                                                        class="text-dark feather icon-help-circle"></i>
                                                    <?php echo e(__("Enter your health issue:For eg: BP,Sugar")); ?></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="text-dark"
                                                class="form-group<?php echo e($errors->has('is_active') ? ' has-error' : ''); ?> switch-main-block">
                                                <div class="custom-switch">
                                                    <?php echo Form::checkbox('is_active', 1,1,
                                                    ['id' => 'switch1', 'class' =>
                                                    'custom-control-input']); ?>

                                                    <label class="custom-control-label"
                                                        for="switch1"><?php echo e(__("Is Active")); ?></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i>
                                        <?php echo e(__("Reset")); ?></button>
                                    <button type="submit" class="btn btn-primary-rgba"><i
                                            class="fa fa-check-circle"></i>
                                        <?php echo e(__("Create")); ?></button>
                                </div>
                            </div>
                            <div class="clear-both"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
<!-- Start Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <div class="contentbar">
                    <!-- Start row -->
                    <div class="row">
                        <div class="col-md-12">

                            <?php echo Form::open(['method' => 'POST', 'route' => 'religion.store','files' => true , 'class' =>
                            'form-light form' , 'novalidate']); ?>

                            <div class="admin-form">
                                <?php echo e($errors->has('Religion') ? ' has-error' : ''); ?>

                                <?php echo Form::label('religion', 'Religion',['class'=>'required']); ?><span
                                    class="text-danger">*</span>
                                <?php echo Form::text('religion', null, ['class' => 'form-control mb-2', 'required','placeholder' =>
                                'Please Enter Religion']); ?>

                                <small class="text-danger"><?php echo e($errors->first('religion')); ?></small>
                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__("Enter
                                    Religion eg:
                                    Hinduism ,Islam ,Christianity ,Sikhism ,Buddhism")); ?> </small>
                            </div>
                            <br>
                            <div
                                class="form-group<?php echo e($errors->has('is_active') ? ' has-error' : ''); ?> switch-main-block">
                                <div class="custom-switch">
                                    <?php echo Form::checkbox('is_active', 1,1, ['id' => 'switch1', 'class'
                                    =>'custom-control-input']); ?>

                                    <label class="custom-control-label" for="switch1"><?php echo e(__("Status")); ?></label>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="reset" class="btn btn-danger"><i class="fa fa-ban"></i>
                                    <?php echo e(__("Reset")); ?></button>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>
                                    <?php echo e(__("Create")); ?></button>
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
<!-- Start Modal -->
<div class="modal fade" id="exampleModall" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <div class="contentbar">
                    <!-- Start row -->
                    <div class="row">
                        <div class="col-md-12">

                            <?php echo Form::open(['method' => 'POST', 'route' => 'occupation.store','files' => true , 'class'
                            =>
                            'form-light form' , 'novalidate']); ?>

                            <div class="admin-form">
                                <?php echo e($errors->has('Occupation') ? ' has-error' : ''); ?>

                                <?php echo Form::label('occupation', 'Occupation',['class'=>'required']); ?><span
                                    class="text-danger">*</span>
                                <?php echo Form::text('occupation', null, ['class' => 'form-control mb-2', 'required','placeholder'
                                =>  'Please Enter Occupation']); ?>

                                <small class="text-danger"><?php echo e($errors->first('occupation')); ?></small>
                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__("Enter
                                    Occupation eg:
                                    Electrician,Doctor,Businessman")); ?> </small>
                            </div>
                            <br>
                            <div
                                class="form-group<?php echo e($errors->has('is_active') ? ' has-error' : ''); ?> switch-main-block">
                                <div class="custom-switch">
                                    <?php echo Form::checkbox('is_active', 1,1, ['id' => 'switch1', 'class'
                                    =>'custom-control-input']); ?>

                                    <label class="custom-control-label" for="switch1"><?php echo e(__("Status")); ?></label>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="reset" class="btn btn-danger"><i class="fa fa-ban"></i>
                                    <?php echo e(__("Reset")); ?></button>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>
                                    <?php echo e(__("Create")); ?></button>
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
<!-- End Modal -->
<!-- Start Modal -->
<div class="modal fade" id="exampleModalll" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <div class="contentbar">
                    <!-- Start row -->
                    <div class="row">
                        <div class="col-md-12">

                            <?php echo Form::open(['method' => 'POST', 'route' => 'secondlanguage.store','files' => true ,
                            'class' =>
                            'form-light form' , 'novalidate']); ?>

                            <div class="admin-form">
                                <?php echo e($errors->has('secondLanguage') ? ' has-error' : ''); ?>

                                <?php echo Form::label('secondlanguage', 'SecondLanguage',['class'=>'required']); ?><span
                                    class="text-danger">*</span>
                                <?php echo Form::text('secondlanguage', null, ['class' => 'form-control mb-2',
                                'required','placeholder' => 'Please Enter SecondLanguage']); ?>

                                <small class="text-danger"><?php echo e($errors->first('secondLanguage')); ?></small>
                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i>
                                    <?php echo e(__("Enter SecondLanguage eg:Marathi,Gujrati")); ?> </small>
                            </div>
                            <br>
                            <div
                                class="form-group<?php echo e($errors->has('is_active') ? ' has-error' : ''); ?> switch-main-block">
                                <div class="custom-switch">
                                    <?php echo Form::checkbox('is_active', 1,1, ['id' => 'switch1', 'class'
                                    =>'custom-control-input']); ?>

                                    <label class="custom-control-label" for="switch1"><?php echo e(__("Status")); ?></label>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <button type="reset" class="btn btn-danger"><i class="fa fa-ban"></i>
                                    <?php echo e(__("Reset")); ?></button>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>
                                    <?php echo e(__("Create")); ?></button>
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
<!-- End Modal -->
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\GYM\resources\views/admin/enquiry/create.blade.php ENDPATH**/ ?>