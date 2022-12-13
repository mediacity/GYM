
<?php $__env->startSection('title',__('Edit Packages :eid -',['eid' => $packages->title])); ?>
<?php $__env->startSection('maincontent'); ?>
<!-- Start Breadcrumbbar -->                    
<?php $__env->startComponent('components.breadcumb',['thirdactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
<?php echo e(__('Home')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Admin')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu2'); ?>
<?php echo e(__(' Edit Packages')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('button'); ?>
<div class="col-md-12 col-lg-6 text-right">
    <div class="top-btn-block">
        <a href="<?php echo e(route('packages.index')); ?>" class="btn btn-primary-rgba mr-2"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>
    </div>
</div>
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<!-- End Breadcrumbbar -->
<!-- Start Row -->
<div class="row">
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-6">
                        <h5 class="card-title mb-0"><?php echo e(__("Edit Package")); ?></h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="admin-form">
                            <?php echo Form::model($packages, ['method' => 'PATCH', 'route' => ['packages.update',
                            $packages->id], 'files' => true ,'class' => 'form form-light' ,'novalidate']); ?>

                            <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('title', 'Package Title',['class'=>'required']); ?> <span
                                    class="text-danger">*</span>
                                <?php echo Form::text('title', null, ['class' => 'form-control', 'required','placeholder' => 'Please Enter Package Title']); ?>

                                <small class="text-danger"><?php echo e($errors->first('title')); ?></small>
                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__("Add a Package Title : Gold Bronze Card, Special Card..")); ?></small>
                            </div>
                            <div class="form-group<?php echo e($errors->has('detail') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('detail', 'Description',['class'=>'required']); ?> <span
                                    class="text-danger">*</span>
                                <?php echo Form::textarea('detail', null, ['class' => 'form-control' ,'required', 'placeholder'
                                => 'Please Enter Package description']); ?>

                                <small class="text-danger"><?php echo e($errors->first('detail')); ?></small>
                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__("Add a Package Description:This is some basic description")); ?></small>
                            </div>
                            <div class="form-group<?php echo e($errors->has('duration') ? ' has-error' : ''); ?>">
                                <label class=" text-dark" for="cars"><?php echo e(__("Choose a Duration:")); ?><span class="text-danger"
                                        class="text-dark">*</span></label>
                                <select data-placeholder="<?php echo e(__("Please select duration")); ?>" class="form-control select2"
                                    name="duration">
                                    <option selected><?php echo e(__("Please select duration")); ?></option>
                                    <option <?php echo e($packages->duration =='1 Month' ? "selected" : ""); ?> value="1 Month"><?php echo e(__("1 Month")); ?></option>
                                    <option <?php echo e($packages->duration =='2 Month' ? "selected" : ""); ?> value="2 Month"><?php echo e(__("2 Month")); ?></option>
                                    <option  <?php echo e($packages->duration =='3 Month' ? "selected" : ""); ?> value="3 Month"><?php echo e(__("3 Month")); ?></option>
                                    <option <?php echo e($packages->duration =='4 Month' ? "selected" : ""); ?> value="4 Month"><?php echo e(__("4 Month")); ?></option>
                                    <option <?php echo e($packages->duration =='5 Month' ? "selected" : ""); ?> value="5 Month"><?php echo e(__("5 Month")); ?></option>
                                    <option  <?php echo e($packages->duration =='6 Month' ? "selected" : ""); ?> value="6 Month"><?php echo e(__("6 Month")); ?></option>
                                    <option <?php echo e($packages->duration =='7 Month' ? "selected" : ""); ?> value="7 Month"><?php echo e(__("7 Month")); ?></option>
                                    <option <?php echo e($packages->duration =='8 Month' ? "selected" : ""); ?> value="8 Month"><?php echo e(__("8 Month")); ?></option>
                                    <option <?php echo e($packages->duration =='9 Month' ? "selected" : ""); ?> value="9 Month"><?php echo e(__("9 Month")); ?></option>
                                    <option  <?php echo e($packages->duration =='10 Month' ? "selected" : ""); ?>value="10 Month"><?php echo e(__("10 Month")); ?></option>
                                    <option <?php echo e($packages->duration =='11 Month' ? "selected" : ""); ?> value="11Month"><?php echo e(__("11 Month")); ?></option>
                                    <option <?php echo e($packages->duration =='1 Year' ? "selected" : ""); ?> value="1 Year"><?php echo e(__("1 Year")); ?></option>
                                    <option <?php echo e($packages->duration =='2 Year' ? "selected" : ""); ?> value="2 Year"><?php echo e(__("2 Year")); ?></option>

                                </select>
                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i><?php echo e(__(" Enter the Package Duration For eg: 12 Months, 6Months")); ?></small>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                <div class="form-group<?php echo e($errors->has('price') ? ' has-error' : ''); ?>">
                                    <?php echo Form::label('price', 'Package price',['class'=>'required']); ?><span
                                        class="text-danger">*</span>
                                    <?php echo Form::number('price', null, ['class' => 'form-control', 'required','placeholder' =>'Please Enter Package price']); ?>

                                    <small class="text-danger"><?php echo e($errors->first('price')); ?></small>
                                    <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__("Enter the Package price For eg: 2400 ,2000...")); ?></small>
                                </div>
                            </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <div class="form-group<?php echo e($errors->has('offerprice') ? ' has-error' : ''); ?>">
                                    <?php echo Form::label('offerprice', 'OfferPrice'); ?>

                                    <?php echo Form::number('offerprice', null, ['class' => 'form-control', 'placeholder' => 'Please Enter Package offerprice']); ?>

                                    <small class="text-danger"><?php echo e($errors->first('offerprice')); ?></small>
                                    <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i><?php echo e(__(" Enter thePackage Offerprice For eg: 1800 ,2000...")); ?></small>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div
                                class="form-group<?php echo e($errors->has('is_active') ? ' has-error' : ''); ?> switch-main-block">
                                <div class="custom-switch">
                                    <?php echo Form::checkbox('is_active', 1,$packages->is_active==1 ? 1 : 0, ['id' =>
                                    'switch1', 'class' => 'custom-control-input']); ?>

                                    <label class="custom-control-label" for="switch1"><?php echo e(__(
                                        "Is Active"
                                    )); ?></label>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
                                <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                                    <?php echo e(__("Update")); ?></button>
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
<!-- End Row -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\GYM\gym_new\resources\views/admin/packages/edit.blade.php ENDPATH**/ ?>