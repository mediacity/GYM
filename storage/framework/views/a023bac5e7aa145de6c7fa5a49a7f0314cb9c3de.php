
<?php $__env->startSection('title',__('Edit Language :eid -',['eid' => $language->id])); ?>
<?php $__env->startSection('maincontent'); ?>
<!-- Start Breadcrumbbar -->
<?php $__env->startComponent('components.breadcumb',['thirdactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
<?php echo e(__('Language')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Admin')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu2'); ?>
<?php echo e(__('Edit Language')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('button'); ?>
<div class="col-md-6 col-lg-6">
    <a href="<?php echo e(route('language.index')); ?>" class="float-right btn btn-primary-rgba mr-2"><i
            class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>
</div>
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<!-- End Breadcrumbbar -->
<div class="row">
     <!-- row started -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <!-- Card header will display you the heading -->
            <div class="card-header">
                <h5 class="card-box"><?php echo e(__(' Edit Language')); ?></h5>
            </div>

            <!-- card body started -->
            <div class="card-body">
                <!-- form start -->
                <form id="demo-form2" method="post" action="<?php echo e(route('language.update',$language->id)); ?>"
                    data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    <?php echo method_field('put'); ?>
                    <div class="row">
                        <!-- Name -->
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="text-dark" for="name"><?php echo e(__('Name')); ?> : <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e($language->name); ?>" name="name" id="sub_heading"
                                    placeholder="<?php echo e(__("Please enter language name eg:English" )); ?>"required>
                            </div>
                        </div>
                        <!-- Local -->
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="text-dark" for="language"><?php echo e(__('Local')); ?> : <span
                                        class="text-danger">*</span></label>
                                <input class="form-control <?php $__errorArgs = ['language'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e($language->language); ?>" type="text" name="language"
                                    placeholder="<?php echo e(__("Please enter language local name")); ?>" required>
                            </div>
                        </div>
                        <!-- SetDefault -->
                        <div class="form-group col-md-2">
                            <div class="custom-switch">
                                <label for="exampleInputDetails"><?php echo e(__('SetDefault')); ?> :</label><br>   
                                <input type="checkbox" name="def" id="switch1" for="switch1" class="custom-control-input">
                                <label class="custom-control-label" for="switch1"></label>
                            </div>
                        </div>

                    </div>

                    <div class="form-group">
                        <button type="reset" class="btn btn-danger-rgba mr-1"><i class="fa fa-ban"></i>
                            <?php echo e(__("Reset")); ?></button>
                        <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                            <?php echo e(__("Update")); ?></button>
                    </div>

                </form>
                <!-- form end -->
            </div>
            <!-- card body end -->
        </div><!-- col end -->
    </div>
</div>
</div><!-- row end -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\gym_new\resources\views/admin/language/edit.blade.php ENDPATH**/ ?>