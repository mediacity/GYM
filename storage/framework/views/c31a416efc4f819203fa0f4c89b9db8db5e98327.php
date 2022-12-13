
<?php $__env->startSection('title',__('Add Fitness Measurement')); ?>
<?php $__env->startSection('maincontent'); ?>
<!-- Start Breadcrumbbar -->                    
<?php $__env->startComponent('components.breadcumb',['thirdactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
<?php echo e(__('Measurement')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Admin')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu2'); ?>
<?php echo e(__('Add Measurement')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('button'); ?>
<div class="col-md-12 col-lg-6 text-right">
    <div class="top-btn-block">
        <a href="<?php echo e(route('measurement.index')); ?>" class="btn btn-primary-rgba mr-2"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>
    </div>
</div>
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<!-- End Breadcrumbbar -->
<!-- Start Form -->
<form action="<?php echo e(route('measurement.store')); ?>" class="form" method="POST" novalidate enctype="multipart/form-data">
<?php echo csrf_field(); ?>
<div class="col-md-12">
    <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="card m-b-3">
                <div class="card-body">
                    <div class="form-group">
                        <label class="text-dark" for="address"><?php echo e(__("Name: ")); ?><span class="text-danger">*</span></label>
                        <select autofocus="" data-placeholder="<?php echo e(__("Please select user")); ?> name="user_id" id="user_id"
                            class="form-control select2">
                            <option value=""><?php echo e(__("Select user")); ?></option>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?php echo e(base64_decode(app('request')->input('id')) == $user->id ? "selected" : ""); ?>

                                value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
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
                        <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i><?php echo e(__(" Enter your name eg: john, Joe")); ?></small>
                    </div>
                    <div class="form-group">
                        <label class="text-dark" for="address"><?php echo e(__("Height: ")); ?><span class="text-danger">*</span></label>
                        <input name="height" type="text" pattern="\d{1,5}"
                            class="form-control <?php $__errorArgs = ['height'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(__("Enter Your Height")); ?>"
                            required>
                             <?php $__errorArgs = ['height'];
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
                        <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__("Enter your height eg: 152 cm, 172cm")); ?></small>
                    </div>
                    <div class="form-group">
                        <label class="text-dark" for="address"><?php echo e(__("Weight:")); ?> <span class="text-danger">*</span></label>
                        <input name="weight" type="text"
                            class="form-control <?php $__errorArgs = ['weight'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(__("Enter your Weight")); ?>"
                            required>

                        <?php $__errorArgs = ['weight'];
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
                        <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i><?php echo e(__(" Enter your weight eg: 87kg ,76kg")); ?></small>
                    </div>
                    <div class="form-group">
                        <label class="text-dark" for="address"><?php echo e(__("Neck: ")); ?><span class="text-danger">*</span></label>
                        <input name="neck" type="text" pattern="\d{1,5}"
                            class="form-control <?php $__errorArgs = ['neck'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(__("Enter your neck size")); ?>"
                            required>

                        <?php $__errorArgs = ['neck'];
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
                        <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i><?php echo e(__(" Enter your neck measurement")); ?></small>
                    </div>
                    <div class="form-group">
                        <label class="text-dark"><?php echo e(__("Chest:s")); ?> <span class="text-danger">*</span></label>
                        <input value="<?php echo e(old('chest')); ?>" type="text" name="chest" pattern="\d{1,5}"
                            class="form-control <?php $__errorArgs = ['chest'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            placeholder=<?php echo e(__("Enter your chest Size")); ?> required="">

                        <?php $__errorArgs = ['chest'];
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
                        <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i><?php echo e(__(" Enter your chest Size ")); ?></small>
                    </div>
                    <div class="form-group">
                        <label class="text-dark"><?php echo e(__("Waist:")); ?> <span class="text-danger">*</span></label>
                        <input value="<?php echo e(old('waist')); ?>" type="text" name="waist" pattern="\d{1,5}"
                            class="form-control <?php $__errorArgs = ['tricep'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            placeholder=<?php echo e(__("Enter your waist Size")); ?> required="">

                        <?php $__errorArgs = ['waist'];
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
                        <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i><?php echo e(__(" Enter Waist Size")); ?></small>
                    </div>
                    <div class="form-group">
                        <label class="text-dark" for="address"><?php echo e(__("Shoulder(Round): ")); ?><span
                                class="text-danger">*</span></label>
                        <input name="shoulder" type="text" pattern="\d{1,5}"
                            class="form-control <?php $__errorArgs = ['shoulder'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"placeholder="<?php echo e(__("Enter your Shoulder" )); ?>" required>

                        <?php $__errorArgs = ['shoulder'];
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
                        <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i><?php echo e(__(" Enter your shoulder size")); ?></small>
                    </div>
                    <div class="form-group">
                        <label class="text-dark" for="address"><?php echo e(__("Hips: ")); ?><span class="text-danger">*</span></label>
                        <input name="hips" type="text" pattern="\d{1,5}"
                            class="form-control <?php $__errorArgs = ['hips'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(__("Enter your Hips size")); ?>"
                            required>

                        <?php $__errorArgs = ['hips'];
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
                        <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__("Enter your hips size")); ?></small>
                    </div>
                    <div class="form-group">
                        <label class="text-dark" for="address"><?php echo e(__("Bicep:")); ?> <span class="text-danger">*</span></label>
                        <input name="bicep" type="text" pattern="\d{1,5}"
                            class="form-control <?php $__errorArgs = ['bicep'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            placeholder="<?php echo e(__("Enter your Bicep Measurement")); ?>" required>

                        <?php $__errorArgs = ['bicep'];
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
                            <?php echo e(__("Enter your Bicep Measurement")); ?></small>
                    </div>
                    <div class="form-group">
                        <label class="text-dark" for="address"><?php echo e(__("BMI:")); ?> <span class="text-danger">*</span></label>
                        <input name="bmi" type="text" pattern="\d{1,5}"
                            class="form-control <?php $__errorArgs = ['bmi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(__("Enter Your BMI")); ?>"
                            required>

                        <?php $__errorArgs = ['bmi'];
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
                        <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__("Enter your BMI")); ?></small>
                        
                    </div>
                    <div class="form-group">
                        <label class="text-dark"><?php echo e(__("Fat(%): ")); ?><span class="text-danger">*</span></label>
                        <input value="<?php echo e(old('fat')); ?>" autofocus="" type="number" name="fat"
                            class="form-control <?php $__errorArgs = ['fat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(__("Enter Your Fat")); ?>"
                            required="">

                        <?php $__errorArgs = ['fat'];
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
                        <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__("Enter your total body Fat")); ?></small>
                    </div>
                    <div class="form-group">
                        <label class="text-dark"><?php echo e(__("Optimal Fat(%): ")); ?><span class="text-danger">*</span></label>
                        <input value="<?php echo e(old('optimal_fat')); ?>" autofocus="" type="number" name="optimal_fat"
                            class="form-control <?php $__errorArgs = ['optimal_fat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            placeholder="<?php echo e(("Enter Your Optimal Fat")); ?>" required="">

                        <?php $__errorArgs = ['optimal_fat'];
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
                        <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i><?php echo e(__(" Enter your body Optimal Fat")); ?></small>
                    </div>
                    <div class="form-group">

                        <div class="text-dark"
                            class="form-group<?php echo e($errors->has('is_active') ? ' has-error' : ''); ?> switch-main-block">
                            <div class="custom-switch">
                                <?php echo Form::checkbox('is_active', 1,1,
                                ['id' => 'switch1', 'class' =>
                                'custom-control-input']); ?>

                                <label class="custom-control-label" for="switch1"><?php echo e(__("Is Active")); ?></label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i>
                            <?php echo e(__("Reset")); ?></button>
                        <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                            <?php echo e(__("Create")); ?></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="card m-b-3">
                <div class="card-body">
                    <div class="form-group">
                        <label class="text-dark"><?php echo e(__("Follow Up Date:")); ?> <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input value="<?php echo e(old('value')); ?>" name="date" type="text" id="calendar"
                                class="calendar form-control" placeholder="<?php echo e(__("yyyy/mm/dd")); ?>" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2"><i
                                        class="feather icon-calendar"></i></span>
                            </div>
                        </div>
                        <?php $__errorArgs = ['date'];
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
                        <small class="text-muted text-info text-info"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__("Choose the Measurement date")); ?></small>
                    </div>
                    <div class="form-group">
                        <label class="text-dark"><?php echo e(__("Calves: ")); ?><span class="text-danger">*</span></label>
                        <input value="<?php echo e(old('calves')); ?>" autofocus="" type="text" name="calves" pattern="\d{1,5}"
                        class="form-control <?php $__errorArgs = ['calves'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        placeholder="<?php echo e(__("Enter your Calves Size")); ?>" required="">

                        <?php $__errorArgs = ['calves'];
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
                        <small class="text-muted text-info text-info"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__("Enter your calves Size")); ?></small>
                     </div>
                    
                    <div class="form-group">
                        <label class="text-dark"><?php echo e(("Abdomen: ")); ?><span class="text-danger">*</span></label>
                        <input value="<?php echo e(old('abdomen')); ?>" autofocus="" type="text" name="abdomen" pattern="\d{1,5}"
                            class="form-control <?php $__errorArgs = ['abdomen'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            placeholder="<?php echo e(__("Enter your Abdomen Size")); ?>" required="">

                        <?php $__errorArgs = ['abdomen'];
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
                        <small class="text-muted text-info text-info"> <i class="text-dark feather icon-help-circle"></i><?php echo e(__(" Enter abdomen Size")); ?></small>
                    </div>
                    <div class="form-group">
                        <label class="text-dark" for="address"><?php echo e(__("Lean Muscle(%):")); ?> <span
                                class="text-danger">*</span></label>
                        <input name="muscle" type="text" pattern="\d{1,5}"
                            class="form-control <?php $__errorArgs = ['muscle'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(__("Enter Your Muscle")); ?>"
                            required>

                        <?php $__errorArgs = ['muscle'];
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
                        <small class="text-muted text-info text-info"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__("Enter your Muscle size")); ?></small>
                    </div>
                    <div class="form-group">
                        <label class="text-dark" for="address"><?php echo e(__("Right Arm: ")); ?><span class="text-danger">*</span></label>
                        <input name="r_arm" type="text" pattern="\d{1,5}"
                            class="form-control <?php $__errorArgs = ['r_arm'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            placeholder="<?php echo e(__("Enter your R Arm size")); ?>" required>

                        <?php $__errorArgs = ['r_arm'];
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
                        <small class="text-muted text-info text-info"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__("Enter your R Arm measurement")); ?></small>
                    </div>
                    <div class="form-group">
                        <label class="text-dark" for="address"><?php echo e(__("Left Arm:")); ?> <span class="text-danger">*</span></label>
                        <input name="l_arm" type="text" pattern="\d{1,5}"
                            class="form-control <?php $__errorArgs = ['l_arm'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(__("Enter your L Arm")); ?>"
                            required>

                        <?php $__errorArgs = ['l_arm'];
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
                        <small class="text-muted text-info text-info"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__("Enter your L Arm measurement eg:120cm")); ?></small>
                    </div>
                    <div class="form-group">
                        <label class="text-dark" for="address"><?php echo e(__("Thigh R:")); ?> <span class="text-danger">*</span></label>
                        <input name="thigh_r" type="text" pattern="\d{1,5}"
                            class="form-control <?php $__errorArgs = ['thigh_r'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            placeholder="<?php echo e(__("Enter Your Thigh R Measurement")); ?>" required>
                             <?php $__errorArgs = ['thigh_r'];
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
                        <small class="text-muted text-info text-info"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__("Enter your Right Thigh Measurement")); ?></small>
                    </div>
                    <div class="form-group">
                        <label class="text-dark" for="address"><?php echo e(__("Thigh L: ")); ?><span class="text-danger">*</span></label>
                        <input name="thigh_l" type="text" pattern="\d{1,5}"
                            class="form-control <?php $__errorArgs = ['thigh_l'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            placeholder="<?php echo e(__("Enter your Thigh L Measurement")); ?>" required>

                        <?php $__errorArgs = ['thigh_l'];
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
                        <small class="text-muted text-info text-info"> <i class="text-dark feather icon-help-circle"></i>
                          <?php echo e(__("  Enter Left Thigh Mesurement")); ?></small>
                    </div>
                    <div class="form-group">
                        <label class="text-dark" for="address"> <?php echo e(__("Mid Upper Arm Circumference: ")); ?><span class="text-danger">*</span></label>
                        <input name="arm_circumference" type="text" pattern="\d{1,5}"
                            class="form-control <?php $__errorArgs = ['arm_circumference'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            placeholder="<?php echo e(__("Enter your Arm Circumference")); ?>" required>

                        <?php $__errorArgs = ['arm_circumference'];
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
                        <small class="text-muted text-info text-info"> <i class="text-dark feather icon-help-circle"></i>
                           <?php echo e(__(" Enter your Mid Upper Arm Circumference")); ?></small>
                    </div>
                    <div class="form-group">
                        <label class="text-dark" for="address"><?php echo e(__("Tricep: ")); ?><span class="text-danger">*</span></label>
                        <input name="tricep" type="text" pattern="\d{1,5}"
                            class="form-control <?php $__errorArgs = ['tricep'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            placeholder= "<?php echo e(__("Enter your Tricep Measurement" )); ?>" required><?php $__errorArgs = ['tricep'];
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
                        <small class="text-muted text-info text-info"> <i class="text-dark feather icon-help-circle"></i><?php echo e(__("Enter your Tricep Measurement")); ?></small>
                    </div>
                    <div class="form-group<?php echo e($errors->has('description') ? ' has-error' : ''); ?>">
                        <?php echo Form::label('description',
                        'Description',['class'=>'required
                        text-dark']); ?> <span class="text-danger">*</span>
                        <?php echo Form::textarea('description', null,
                        ['id' => 'description','class' =>
                        'form-control' ,'required','placeholder' =>
                        'Your description']); ?>

                        <small class="text-danger"><?php echo e($errors->first('description')); ?></small>
                        <small class="text-muted text-info text-info"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__("Describe for which you give the measurement eg: Body shaping , Weight loss")); ?></small>
                    </div>
                    <div class="form-group">
                        <label class="text-dark" for="address"><?php echo e(__("Prescribed by:")); ?> <span class="text-danger">*</span></label>
                        <select required="" name="trainer_name" id="trainer_name"
                            class="<?php $__errorArgs = ['trainer_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> form-control select2">
                            <option value=""><?php echo e(__("Select Trainer name")); ?>

                            </option>
                            <?php $__currentLoopData = $trainers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trainer_name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <option value="<?php echo e($trainer_name->id); ?>">
                                <?php echo e($trainer_name->trainer_name); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['trainer_name'];
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
                        <small class="text-muted text-info text-info"> <i class="text-dark feather icon-help-circle"></i>
                            <?php echo e(__("Select the  trainer name by which you prescribed this mesurement")); ?></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Form -->
 <?php $__env->stopSection(); ?>
    <?php $__env->startSection('script'); ?>
    <script>
        $('.calendar').each(function () {
            $(this).datepicker({
                dateFormat: 'yy-mm-dd',
                minDate: 0
            });
        });
    </script>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\GYM\gym_new\resources\views/admin/measurement/create.blade.php ENDPATH**/ ?>