
<?php $__env->startSection('title',__('Create a new role')); ?>
<!-- Start Breadcrumbbar -->
<?php $__env->startSection('breadcum'); ?>
<div class="breadcrumbbar breadcrumbbar-one">
    <div class="row align-items-center">
        <div class="col-md-12 col-lg-8">
            <h4 class="page-title"><?php echo e(__("Roles and permissions")); ?></h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>"><?php echo e(__('Home')); ?></a></li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard.index')); ?>"><?php echo e(__('Dashboard')); ?></a>
                    </li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('roles.index')); ?>"><?php echo e(__('Roles & Permissions')); ?></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <?php echo e(__('Add new role')); ?>

                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
<?php $__env->startSection('maincontent'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <a href="<?php echo e(route('roles.index')); ?>" title="Go back" role="button"
                    class="float-right btn btn-primary-rgba"><i class="feather icon-arrow-left"></i> <?php echo e(__("Back")); ?></a>
                <h5 class="card-title"><?php echo e(__('Create a new role')); ?></h5>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('roles.store')); ?>" method="POST" class="needs-validation" novalidate>
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="name" class="text-dark">Role name <span class="text-danger">*</span></label>
                        <input name="name" type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            id="name" placeholder="Enter role name" value="<?php echo e(old('name')); ?>" required autofocus>

                        <input type="hidden" name="guard" value="web">

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

                        <div class="invalid-feedback">
                            <?php echo e(__('Please enter role name !')); ?>

                        </div>
                    </div>

                    <div class="form-group">


                        <label class="text-dark"><?php echo e(__('Assign Permissions to role')); ?></label>
                        <hr>
                        <div class="table-responsive">
                            <table class="permissionTable table table-bordered">
                                <th>
                                    <?php echo e(__("Section")); ?>

                                </th>

                                <th>
                                    <?php echo e(__("Action")); ?>

                                </th>

                                <th>
                                    #
                                </th>
                                <tbody>
                                    <tr>
                                        <td>
                                            <?php echo e(__("Login")); ?>

                                        </td>
                                        <td>
                                            <label>
                                                <input class="selectall" type="checkbox" name="customCheckboxInline2">
                                                &nbsp;<?php echo e(__('Select all')); ?>

                                            </label>
                                        </td>
                                        <td>
                                            <?php $__currentLoopData = $role_permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(strstr($p->name, 'can')): ?>

                                            <input class="permissioncheckbox" type="checkbox"
                                                id="customCheckboxInline<?php echo e($p['id']); ?>" value="<?php echo e($p['name']); ?>"
                                                name="permissions[]">
                                            <label
                                                for="customCheckboxInline<?php echo e($p['id']); ?>">&nbsp;<?php echo e(str_replace('can.', '', $p['name'])); ?></label>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <?php echo e(__("Users")); ?>

                                        </td>
                                        <td>
                                            <label>
                                                <input class="selectall" type="checkbox" name="customCheckboxInline2">
                                                &nbsp;<?php echo e(__('Select all')); ?>

                                            </label>
                                        </td>
                                        <td>
                                            <?php $__currentLoopData = $role_permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(strstr($p->name, 'users')): ?>

                                            <input class="permissioncheckbox" type="checkbox"
                                                id="customCheckboxInline<?php echo e($p['id']); ?>" value="<?php echo e($p['name']); ?>"
                                                name="permissions[]">
                                            <label
                                                for="customCheckboxInline<?php echo e($p['id']); ?>">&nbsp;<?php echo e(str_replace('users.', '', $p['name'])); ?></label>

                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <?php echo e(__("Exercise")); ?>

                                        </td>
                                        <td>
                                            <label>
                                                <input class="selectall" type="checkbox" name="customCheckboxInline2">
                                                &nbsp;<?php echo e(__('Select all')); ?>

                                            </label>
                                        </td>
                                        <td>
                                            <?php $__currentLoopData = $role_permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(strstr($p->name, 'exercise')): ?>

                                            <input class="permissioncheckbox" type="checkbox"
                                                id="customCheckboxInline<?php echo e($p['id']); ?>" value="<?php echo e($p['name']); ?>"
                                                name="permissions[]">
                                            <label
                                                for="customCheckboxInline<?php echo e($p['id']); ?>">&nbsp;<?php echo e(str_replace('exercise.', '', $p['name'])); ?></label>

                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo e(__("Dashboard")); ?>

                                        </td>
                                        <td>
                                            <label>
                                                <input class="selectall" type="checkbox" name="customCheckboxInline2">
                                                &nbsp;<?php echo e(__('Select all')); ?>

                                            </label>
                                        </td>
                                        <td>
                                            <?php $__currentLoopData = $role_permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(strstr($p->name, 'dashboard')): ?>

                                            <input class="permissioncheckbox" type="checkbox"
                                                id="customCheckboxInline<?php echo e($p['id']); ?>" value="<?php echo e($p['name']); ?>"
                                                name="permissions[]">
                                            <label
                                                for="customCheckboxInline<?php echo e($p['id']); ?>">&nbsp;<?php echo e(str_replace('dashboard.', '', $p['name'])); ?></label>

                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo e(__("Measurements")); ?>

                                        </td>
                                        <td>
                                            <label>
                                                <input class="selectall" type="checkbox" name="customCheckboxInline2">
                                                &nbsp;<?php echo e(__('Select all')); ?>

                                            </label>
                                        </td>
                                        <td>
                                            <?php $__currentLoopData = $role_permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(strstr($p->name, 'measurements')): ?>

                                            <input class="permissioncheckbox" type="checkbox"
                                                id="customCheckboxInline<?php echo e($p['id']); ?>" value="<?php echo e($p['name']); ?>"
                                                name="permissions[]">
                                            <label
                                                for="customCheckboxInline<?php echo e($p['id']); ?>">&nbsp;<?php echo e(str_replace('measurements.', '', $p['name'])); ?></label>

                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo e(__("Locker")); ?>

                                        </td>
                                        <td>
                                            <label>
                                                <input class="selectall" type="checkbox" name="customCheckboxInline2">
                                                &nbsp;<?php echo e(__('Select all')); ?>

                                            </label>
                                        </td>
                                        <td>
                                            <?php $__currentLoopData = $role_permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(strstr($p->name, 'locker')): ?>

                                            <input class="permissioncheckbox" type="checkbox"
                                                id="customCheckboxInline<?php echo e($p['id']); ?>" value="<?php echo e($p['name']); ?>"
                                                name="permissions[]">
                                            <label
                                                for="customCheckboxInline<?php echo e($p['id']); ?>">&nbsp;<?php echo e(str_replace('locker.', '', $p['name'])); ?></label>

                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo e(__("Slider")); ?>

                                        </td>
                                        <td>
                                            <label>
                                                <input class="selectall" type="checkbox" name="customCheckboxInline2">
                                                &nbsp;<?php echo e(__('Select all')); ?>

                                            </label>
                                        </td>
                                        <td>
                                            <?php $__currentLoopData = $role_permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(strstr($p->name, 'slider')): ?>

                                            <input class="permissioncheckbox" type="checkbox"
                                                id="customCheckboxInline<?php echo e($p['id']); ?>" value="<?php echo e($p['name']); ?>"
                                                name="permissions[]">
                                            <label
                                                for="customCheckboxInline<?php echo e($p['id']); ?>">&nbsp;<?php echo e(str_replace('slider.', '', $p['name'])); ?></label>

                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo e(__("Faq")); ?>

                                        </td>
                                        <td>
                                            <label>
                                                <input class="selectall" type="checkbox" name="customCheckboxInline2">
                                                &nbsp;<?php echo e(__('Select all')); ?>

                                            </label>
                                        </td>
                                        <td>
                                            <?php $__currentLoopData = $role_permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(strstr($p->name, 'faq')): ?>

                                            <input class="permissioncheckbox" type="checkbox"
                                                id="customCheckboxInline<?php echo e($p['id']); ?>" value="<?php echo e($p['name']); ?>"
                                                name="permissions[]">
                                            <label
                                                for="customCheckboxInline<?php echo e($p['id']); ?>">&nbsp;<?php echo e(str_replace('faq.', '', $p['name'])); ?></label>

                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo e(__("Pages")); ?>

                                        </td>
                                        <td>
                                            <label>
                                                <input class="selectall" type="checkbox" name="customCheckboxInline2">
                                                &nbsp;<?php echo e(__('Select all')); ?>

                                            </label>
                                        </td>
                                        <td>
                                            <?php $__currentLoopData = $role_permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(strstr($p->name, 'pages')): ?>

                                            <input class="permissioncheckbox" type="checkbox"
                                                id="customCheckboxInline<?php echo e($p['id']); ?>" value="<?php echo e($p['name']); ?>"
                                                name="permissions[]">
                                            <label
                                                for="customCheckboxInline<?php echo e($p['id']); ?>">&nbsp;<?php echo e(str_replace('pages.', '', $p['name'])); ?></label>

                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo e(__("Blogs")); ?>}
                                        </td>
                                        <td>
                                            <label>
                                                <input class="selectall" type="checkbox" name="customCheckboxInline2">
                                                &nbsp;<?php echo e(__('Select all')); ?>

                                            </label>
                                        </td>
                                        <td>
                                            <?php $__currentLoopData = $role_permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(strstr($p->name, 'blogs')): ?>

                                            <input class="permissioncheckbox" type="checkbox"
                                                id="customCheckboxInline<?php echo e($p['id']); ?>" value="<?php echo e($p['name']); ?>"
                                                name="permissions[]">
                                            <label
                                                for="customCheckboxInline<?php echo e($p['id']); ?>">&nbsp;<?php echo e(str_replace('blogs.', '', $p['name'])); ?></label>

                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        <?php echo e(__("  PT Subscription")); ?>

                                        </td>
                                        <td>
                                            <label>
                                                <input class="selectall" type="checkbox" name="customCheckboxInline2">
                                                &nbsp;<?php echo e(__('Select all')); ?>

                                            </label>
                                        </td>
                                        <td>
                                            <?php $__currentLoopData = $role_permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(strstr($p->name, 'pt')): ?>
                                            <input class="permissioncheckbox" type="checkbox"
                                                id="customCheckboxInline<?php echo e($p['id']); ?>" value="<?php echo e($p['name']); ?>"
                                                name="permissions[]">
                                            <label
                                                for="customCheckboxInline<?php echo e($p['id']); ?>">&nbsp;<?php echo e(str_replace('pt.', '', $p['name'])); ?></label>

                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        <?php echo e(__("Packages")); ?>

                                        </td>
                                        <td>
                                            <label>
                                                <input class="selectall" type="checkbox" name="customCheckboxInline2">
                                                &nbsp;<?php echo e(__('Select all')); ?>

                                            </label>
                                        </td>
                                        <td>
                                            <?php $__currentLoopData = $role_permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(strstr($p->name, 'packages')): ?>

                                            <input class="permissioncheckbox" type="checkbox"
                                                id="customCheckboxInline<?php echo e($p['id']); ?>" value="<?php echo e($p['name']); ?>"
                                                name="permissions[]">
                                            <label
                                                for="customCheckboxInline<?php echo e($p['id']); ?>">&nbsp;<?php echo e(str_replace('packages.', '', $p['name'])); ?></label>

                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        <?php echo e(__("Fees")); ?>

                                        </td>
                                        <td>
                                            <label>
                                                <input class="selectall" type="checkbox" name="customCheckboxInline2">
                                                &nbsp;<?php echo e(__('Select all')); ?>

                                            </label>
                                        </td>
                                        <td>
                                            <?php $__currentLoopData = $role_permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(strstr($p->name, 'fees')): ?>

                                            <input class="permissioncheckbox" type="checkbox"
                                                id="customCheckboxInline<?php echo e($p['id']); ?>" value="<?php echo e($p['name']); ?>"
                                                name="permissions[]">
                                            <label
                                                for="customCheckboxInline<?php echo e($p['id']); ?>">&nbsp;<?php echo e(str_replace('fees.', '', $p['name'])); ?></label>

                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        <?php echo e(__("Diet")); ?>

                                        </td>
                                        <td>
                                            <label>
                                                <input class="selectall" type="checkbox" name="customCheckboxInline2">
                                                &nbsp;<?php echo e(__('Select all')); ?>

                                            </label>
                                        </td>
                                        <td>
                                            <?php $__currentLoopData = $role_permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(strstr($p->name, 'diet.')): ?>

                                            <input class="permissioncheckbox" type="checkbox"
                                                id="customCheckboxInline<?php echo e($p['id']); ?>" value="<?php echo e($p['name']); ?>"
                                                name="permissions[]">
                                            <label
                                                for="customCheckboxInline<?php echo e($p['id']); ?>">&nbsp;<?php echo e(str_replace('diet.', '', $p['name'])); ?></label>

                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        <?php echo e(__(" Diet Session")); ?>

                                        </td>
                                        <td>
                                            <label>
                                                <input class="selectall" type="checkbox" name="customCheckboxInline2">
                                                &nbsp;<?php echo e(__('Select all')); ?>

                                            </label>
                                        </td>
                                        <td>
                                            <?php $__currentLoopData = $role_permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(strstr($p->name, 'diet_session')): ?>

                                            <input class="permissioncheckbox" type="checkbox"
                                                id="customCheckboxInline<?php echo e($p['id']); ?>" value="<?php echo e($p['name']); ?>"
                                                name="permissions[]">
                                            <label
                                                for="customCheckboxInline<?php echo e($p['id']); ?>">&nbsp;<?php echo e(str_replace('diet_session.', '', $p['name'])); ?></label>

                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo e(__("Diet Content")); ?>

                                        </td>
                                        <td>
                                            <label>
                                                <input class="selectall" type="checkbox" name="customCheckboxInline2">
                                                &nbsp;<?php echo e(__('Select all')); ?>

                                            </label>
                                        </td>
                                        <td>
                                            <?php $__currentLoopData = $role_permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(strstr($p->name, 'diet_content')): ?>

                                            <input class="permissioncheckbox" type="checkbox"
                                                id="customCheckboxInline<?php echo e($p['id']); ?>" value="<?php echo e($p['name']); ?>"
                                                name="permissions[]">
                                            <label
                                                for="customCheckboxInline<?php echo e($p['id']); ?>">&nbsp;<?php echo e(str_replace('diet_content.', '', $p['name'])); ?></label>

                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        <?php echo e(__(" Supplement")); ?>

                                        </td>
                                        <td>
                                            <label>
                                                <input class="selectall" type="checkbox" name="customCheckboxInline2">
                                                &nbsp;<?php echo e(__('Select all')); ?>

                                            </label>
                                        </td>
                                        <td>
                                            <?php $__currentLoopData = $role_permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(strstr($p->name, 'supplement')): ?>

                                            <input class="permissioncheckbox" type="checkbox"
                                                id="customCheckboxInline<?php echo e($p['id']); ?>" value="<?php echo e($p['name']); ?>"
                                                name="permissions[]">
                                            <label
                                                for="customCheckboxInline<?php echo e($p['id']); ?>">&nbsp;<?php echo e(str_replace('supplement.', '', $p['name'])); ?></label>

                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        <?php echo e(__("  Trainer List")); ?>

                                        </td>
                                        <td>
                                            <label>
                                                <input class="selectall" type="checkbox" name="customCheckboxInline2">
                                                &nbsp;<?php echo e(__('Select all')); ?>

                                            </label>
                                        </td>
                                        <td>
                                            <?php $__currentLoopData = $role_permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(strstr($p->name, 'trainer_list')): ?>
                                            <input class="permissioncheckbox" type="checkbox"
                                                id="customCheckboxInline<?php echo e($p['id']); ?>" value="<?php echo e($p['name']); ?>"
                                                name="permissions[]">
                                            <label
                                                for="customCheckboxInline<?php echo e($p['id']); ?>">&nbsp;<?php echo e(str_replace('trainer_list.', '', $p['name'])); ?></label>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        <?php echo e(__(" Trainer Packages")); ?>

                                        </td>
                                        <td>
                                            <label>
                                                <input class="selectall" type="checkbox" name="customCheckboxInline2">
                                                &nbsp;<?php echo e(__('Select all')); ?>

                                            </label>
                                        </td>
                                        <td>
                                            <?php $__currentLoopData = $role_permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(strstr($p->name, 'trainerp')): ?>
                                            <input class="permissioncheckbox" type="checkbox"
                                                id="customCheckboxInline<?php echo e($p['id']); ?>" value="<?php echo e($p['name']); ?>"
                                                name="permissions[]">
                                            <label
                                                for="customCheckboxInline<?php echo e($p['id']); ?>">&nbsp;<?php echo e(str_replace('trainerp', '', $p['name'])); ?></label>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo e(__("Trainer")); ?>

                                        </td>
                                        <td>
                                            <label>
                                                <input class="selectall" type="checkbox" name="customCheckboxInline2">
                                                &nbsp;<?php echo e(__('Select all')); ?>

                                            </label>
                                        </td>
                                        <td>
                                            <?php $__currentLoopData = $role_permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(strstr($p->name, 'trainer.')): ?>

                                            <input class="permissioncheckbox" type="checkbox"
                                                id="customCheckboxInline<?php echo e($p['id']); ?>" value="<?php echo e($p['name']); ?>"
                                                name="permissions[]">
                                            <label
                                                for="customCheckboxInline<?php echo e($p['id']); ?>">&nbsp;<?php echo e(str_replace('trainer.', '', $p['name'])); ?></label>

                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        <?php echo e(__("  Member Attendance")); ?>

                                        </td>
                                        <td>
                                            <label>
                                                <input class="selectall" type="checkbox" name="customCheckboxInline2">
                                                &nbsp;<?php echo e(__('Select all')); ?>

                                            </label>
                                        </td>
                                        <td>
                                            <?php $__currentLoopData = $role_permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(strstr($p->name, 'member_attendance')): ?>

                                            <input class="permissioncheckbox" type="checkbox"
                                                id="customCheckboxInline<?php echo e($p['id']); ?>" value="<?php echo e($p['name']); ?>"
                                                name="permissions[]">
                                            <label
                                                for="customCheckboxInline<?php echo e($p['id']); ?>">&nbsp;<?php echo e(str_replace('member_attendance.', '', $p['name'])); ?></label>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        <?php echo e(__(" Staff Attendance")); ?>

                                        </td>
                                        <td>
                                            <label>
                                                <input class="selectall" type="checkbox" name="customCheckboxInline2">
                                                &nbsp;<?php echo e(__('Select all')); ?>

                                            </label>
                                        </td>
                                        <td>
                                            <?php $__currentLoopData = $role_permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(strstr($p->name, 'staff_attendance')): ?>

                                            <input class="permissioncheckbox" type="checkbox"
                                                id="customCheckboxInline<?php echo e($p['id']); ?>" value="<?php echo e($p['name']); ?>"
                                                name="permissions[]">
                                            <label
                                                for="customCheckboxInline<?php echo e($p['id']); ?>">&nbsp;<?php echo e(str_replace('staff_attendance.', '', $p['name'])); ?></label>

                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                    <tr>
                                        <td>
                                            <?php echo e(__("Enquiry")); ?>

                                        </td>
                                        <td>
                                            <label>
                                                <input class="selectall" type="checkbox" name="customCheckboxInline2">
                                                &nbsp;<?php echo e(__('Select all')); ?>

                                            </label>
                                        </td>
                                        <td>
                                            <?php $__currentLoopData = $role_permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(strstr($p->name, 'enquiry')): ?>

                                            <input class="permissioncheckbox" type="checkbox"
                                                id="customCheckboxInline<?php echo e($p['id']); ?>" value="<?php echo e($p['name']); ?>"
                                                name="permissions[]">
                                            <label
                                                for="customCheckboxInline<?php echo e($p['id']); ?>">&nbsp;<?php echo e(str_replace('enquiry.', '', $p['name'])); ?></label>

                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo e(__("Group")); ?>

                                        </td>
                                        <td>
                                            <label>
                                                <input class="selectall" type="checkbox" name="customCheckboxInline2">
                                                &nbsp;<?php echo e(__('Select all')); ?>

                                            </label>
                                        </td>
                                        <td>
                                            <?php $__currentLoopData = $role_permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(strstr($p->name, 'group')): ?>

                                            <input class="permissioncheckbox" type="checkbox"
                                                id="customCheckboxInline<?php echo e($p['id']); ?>" value="<?php echo e($p['name']); ?>"
                                                name="permissions[]">
                                            <label
                                                for="customCheckboxInline<?php echo e($p['id']); ?>">&nbsp;<?php echo e(str_replace('group.', '', $p['name'])); ?></label>

                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo e(__("Todo")); ?>

                                        </td>
                                        <td>
                                            <label>
                                                <input class="selectall" type="checkbox" name="customCheckboxInline2">
                                                &nbsp;<?php echo e(__('Select all')); ?>

                                            </label>
                                        </td>
                                        <td>
                                            <?php $__currentLoopData = $role_permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(strstr($p->name, 'todo')): ?>

                                            <input class="permissioncheckbox" type="checkbox"
                                                id="customCheckboxInline<?php echo e($p['id']); ?>" value="<?php echo e($p['name']); ?>"
                                                name="permissions[]">
                                            <label
                                                for="customCheckboxInline<?php echo e($p['id']); ?>">&nbsp;<?php echo e(str_replace('todo.', '', $p['name'])); ?></label>

                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        <?php echo e(__("Site Settings")); ?>

                                        </td>
                                        <td>
                                            <label>
                                                <input class="selectall" type="checkbox" name="customCheckboxInline2">
                                                &nbsp;<?php echo e(__('Select all')); ?>

                                            </label>
                                        </td>
                                        <td>
                                            <?php $__currentLoopData = $role_permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(strstr($p->name, 'settings')): ?>

                                            <input class="permissioncheckbox" type="checkbox"
                                                id="customCheckboxInline<?php echo e($p['id']); ?>" value="<?php echo e($p['name']); ?>"
                                                name="permissions[]">
                                            <label
                                                for="customCheckboxInline<?php echo e($p['id']); ?>">&nbsp;<?php echo e(str_replace('settings.', '', $p['name'])); ?></label>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo e(__("Services")); ?>

                                        </td>
                                        <td>
                                            <label>
                                                <input class="selectall" type="checkbox" name="customCheckboxInline2">
                                                &nbsp;<?php echo e(__('Select all')); ?>

                                            </label>
                                        </td>
                                        <td>
                                            <?php $__currentLoopData = $role_permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(strstr($p->name, 'services')): ?>

                                            <input class="permissioncheckbox" type="checkbox"
                                                id="customCheckboxInline<?php echo e($p['id']); ?>" value="<?php echo e($p['name']); ?>"
                                                name="permissions[]">
                                            <label
                                                for="customCheckboxInline<?php echo e($p['id']); ?>">&nbsp;<?php echo e(str_replace('services.', '', $p['name'])); ?></label>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo e(__("Roles")); ?>

                                        </td>
                                        <td>
                                            <label>
                                                <input class="selectall" type="checkbox" name="customCheckboxInline2">
                                                &nbsp;<?php echo e(__('Select all')); ?>

                                            </label>
                                        </td>
                                        <td>
                                            <?php $__currentLoopData = $role_permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(strstr($p->name, 'roles')): ?>

                                            <input class="permissioncheckbox" type="checkbox"
                                                id="customCheckboxInline<?php echo e($p['id']); ?>" value="<?php echo e($p['name']); ?>"
                                                name="permissions[]">
                                            <label
                                                for="customCheckboxInline<?php echo e($p['id']); ?>">&nbsp;<?php echo e(str_replace('roles.', '', $p['name'])); ?></label>

                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>

                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-md btn-primary">
                            <i class="feather icon-plus"></i> <?php echo e(__("Create")); ?>

                        </button>
                        <a role="button" href="<?php echo e(route('roles.index')); ?>" class="btn btn-md btn-secondary">
                            <i class="feather icon-arrow-left"></i> <?php echo e(__("Back")); ?>

                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<!-- End Contentbar -->
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(url('js/checkbox.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\GYM\resources\views/manage/roles/create.blade.php ENDPATH**/ ?>