
<?php $__env->startSection('title',__('Create a new user')); ?>
<?php $__env->startSection('breadcum'); ?>
<div class="breadcrumbbar breadcrumbbar-one">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title"><?php echo e(config('app.name')); ?></h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>"><?php echo e(__('Home')); ?></a></li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard.index')); ?>"><?php echo e(__('Dashboard')); ?></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <?php echo e(__('Create user')); ?>

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
<?php $__env->startSection('maincontent'); ?>
<form action="<?php echo e(route('users.store')); ?>" class="form" method="POST" novalidate enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">

                    <h5 class="card-title"><?php echo e(__('Create a new user:')); ?></h5>

                </div>

                <div class="card-body">

                    <div class="row">
                        <div class="col-lg-3 col-md-12">
                            <div class="form-group">
                                <input name="photo" type="file" id="imgupload" class="d-none"/>
                                <img <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> src="<?php echo e(url('media/images/default.jpg')); ?>"
                                    alt="profilephoto" class="profilechoose img-thumbnail rounded img-fluid">
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
                                        <label class="text-dark"><?php echo e(__("Name:")); ?> <span class="text-danger">*</span></label>
                                        <input value="<?php echo e(old('name')); ?>" autofocus="" type="text"
                                            class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            placeholder="<?php echo e(__("Enter Name")); ?>" name="name" required="">

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
                                        <input value="<?php echo e(old('email')); ?>" autofocus="" type="email" name="email"
                                            class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            placeholder="<?php echo e(__("Enter Your email" )); ?>"required="">

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
                                        <label class="text-dark" for="address"><?php echo e(__("Password:")); ?> <span
                                                class="text-danger">*</span></label>
                                        <input minlength="8" name="password" type="password"
                                            class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="password"
                                            placeholder="<?php echo e(__("Enter Password here")); ?>" required>

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
                                        <input minlength="8" type="password" class="form-control" id="re-password"
                                            placeholder="<?php echo e(__("Re-Type Password")); ?>" name="password_confirmation" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-dark"><?php echo e(__("Mobile:")); ?><span class="text-danger">*</span></label>
                                        <input value="<?php echo e(old('mobile')); ?>" title="enter valid no." pattern="[0-9]{10}"
                                            type="text" class="form-control" placeholder="<?php echo e(__("Enter valid mobile no.")); ?>"
                                            required name="mobile">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-dark"><?php echo e(__("Alternate Mobile No:")); ?></label>
                                        <input value="<?php echo e(old('phone')); ?>" title="enter valid no." pattern="[0-9]+"
                                            type="text" class="form-control" placeholder="<?php echo e(__("Enter alternate mobile no.")); ?>"
                                            name="phone">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">

                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="text-dark" for="address"><?php echo e(__("Address Line 1:")); ?> <span
                                        class="text-danger">*</span></label>
                                <textarea required="" class="<?php $__errorArgs = ['line1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> form-control"
                                    id="line1" name="line1"
                                    placeholder="<?php echo e(__("Enter Your Address here")); ?>"><?php echo e(old('line1')); ?></textarea>
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
                                <textarea class="form-control" id="line2" name="line2"><?php echo e(old('line2')); ?></textarea>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="text-dark" for="address"><?php echo e(__("Pincode:")); ?> <span class="text-danger">*</span></label>
                                <input value="<?php echo e(old('pincode')); ?>" required="" type="text" pattern="[0-9]+"
                                placeholder=<?php echo e(__("Enter Pincode")); ?> name="pincode" class="form-control">
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="text-dark" for="address"><?php echo e(__("Select Country:")); ?> <span
                                        class="text-danger">*</span></label>
                                <select data-placeholder=<?php echo e(__("Please select country")); ?> required="" name="country_id"
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
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="text-dark" for="address"><?php echo e(__("Select State:")); ?> <span
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
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="text-dark"><?php echo e(__("Date of Birth:")); ?></label>
                                <div class="input-group">
                                    <input value="<?php echo e(old('dob')); ?>" name="dob" type="text"
                                        class="datepicker-here form-control calendar" placeholder="<?php echo e(__("dd/mm/yyyy")); ?>"
                                        aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2"><i
                                                class="feather icon-calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="text-dark"><?php echo e(__("Occupation:")); ?></label>
                                <input value="<?php echo e(old('name')); ?>" type="text" class="form-control"
                                    placeholder="<?php echo e(__("enter occupation of user")); ?>">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">

                            <div class="form-group">
                                <label class="text-dark"><?php echo e(__("VIP Membership: ")); ?><span class="text-danger">*</span></label><br>
                                <label class="switch"><input type="checkbox" id="togBtn" name="membership">
                                    <div class="slider round">
                                        <span class="on"></span><span
                                            class="off"></span>
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


                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-dark"><?php echo e(__("Select Role:")); ?> <span class="text-danger">*</span></label>
                                <select required="" name="role" id="" class="form-control select2">
                                    <option value="">Choose a role</option>
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-dark" for="address"><?php echo e(__("Gender:")); ?></label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="m"><?php echo e(__("Male")); ?></option>
                                    <option value="f"><?php echo e(__("Female")); ?></option>
                                    <option value="o"><?php echo e(__("Other")); ?></option>
                                </select>
                            </div>
                        </div>
                    </div>
               
                <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="form-group">
                        <label class="text-dark"><?php echo e(__("Demo: ")); ?><span class="text-danger">*</span></label><br>
                        <label class="switch"><input type="checkbox" id="togBtn" name="demo">
                            <div class="slider round">
                                <span class="on"></i></span><span
                                    class="off"></span>
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
               
                <div class="col-lg-4 col-md-6">
                <div class="form-group">
                    <label class="text-dark" for="issue"><?php echo e(__("Health Issue:")); ?></label><br>
                    <label for="issue"> <input class="health_check" type="checkbox" id="issue"
                            name="health_check"> <?php echo e(__("Do you have any health issue ?")); ?></label><br>
                    <br>
                    <div style="display:none;" id="healthbox" class="col-md-10">
                        <div class="row">
                            <div class="form-group health-form">
                                <select data-placeholder="<?php echo e(__("Please select if you have any issue ")); ?>" name="issue[]"
                                    class="mdb-select md-form form-control select2" id="issue_dropdown"
                                    style="display:none;" multiple>
                                    <?php if(isset($enquiryhealth)): ?>
                                    <?php $__currentLoopData = $enquiryhealth; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enquiryhealth): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($enquiryhealth->id); ?>"><?php echo e($enquiryhealth->issue); ?>

                                    </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>
                            </div>


                            <button class="btn btn-sm btn-success health-btn" data-toggle="modal"
                                data-target="#exampleModalCenter">
                                +
                            </button>

                        </div>
                    </div>
                    <small class="text-muted text-info" name="details"> <i class="text-dark feather icon-help-circle"></i>
                        <?php echo e(__("Enter your health
                        description
                        :For eg: Any health problem like B.P, Sugar etc..")); ?>

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
            
           
                <div class="col-lg-4 col-md-6">
                   <input type="file" name="file" value="file" id="file2" class="<?php echo e($errors->has('file') ? ' is-invalid' : ''); ?> inputfile inputfile-1"/>
                  <label for="file2"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="30" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg></label>
                  
                  <span class="text-danger invalid-feedback" role="alert"></span> <br> <small class="text-muted text-info" name="details"> <i class="text-dark feather icon-help-circle"></i>
                    <?php echo e(__("Upload Document")); ?>

                        </small></div>
               
              </div>
             
           
                <div class="col-lg-12 col-md-12">
                    <div class="form-group">
                        <button type="reset" class="btn btn-danger"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>
                            <?php echo e(__("Create")); ?></button>
                    </div>
                </div>
                <div class="clear-both"></div>
            </div>
        </div>
</form>

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
    
     $('.health_check').on('change', function () {
        if ($(this).is(':checked')) {
            $('#healthbox').show('fast');
            $('#issue_dropdown').attr('required', 'required');
        } else {
            $('#healthbox').hide('fast');
            $('#issue_dropdown').removeAttr('required');
        }
    })

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
                                                <label class="text-dark"><?php echo e(__("Health Isuue:")); ?> <span
                                                        class="text-danger">*</span></label>
                                                <input type="text"
                                                    class="form-control <?php $__errorArgs = ['issue'];
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
                                                        class="text-dark feather icon-help-circle"></i> <?php echo e(__("Enter
                                                        your health issue:For eg: BP,Sugar")); ?></small>
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

                                                    <label class="custom-control-label" for="switch1"><?php echo e(__("Is Active")); ?></label>
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
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\media_city\GYM\gym\gym\resources\views/manage/users/create.blade.php ENDPATH**/ ?>