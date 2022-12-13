
<?php $__env->startSection('title',__('Edit Products :eid -',['eid' => $supplement->id])); ?>
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
<?php echo e(__(' Edit Products')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('button'); ?>
<div class="col-md-12 col-lg-6 text-right">
    <div class="top-btn-block">
        <a href="<?php echo e(route('supplement.index')); ?>" class="btn btn-primary-rgba mr-2"><i
            class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>
    </div>
</div>
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<!-- End Breadcrumbbar -->
<!-- Start row -->
<div class="row">
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-6">
                        <h5 class="card-title mb-0"><?php echo e(__("Edit Products")); ?></h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="admin-form">
                            <?php echo Form::model($supplement, ['method' => 'PATCH', 'route' => ['supplement.update',
                            $supplement->id], 'files' => true , 'class' => 'form form-light' ,'novalidate']); ?>

                            <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('name', 'Name'); ?><span class="text-danger">*</span></label>
                                <?php echo Form::text('name', null, ['class' => 'form-control', 'required','placeholder' =>'Please Enter Products Name']); ?>

                                <small class="text-danger"><?php echo e($errors->first('name')); ?></small>
                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__("Enter Products Name : Protien Drink... ")); ?></small>
                            </div>
                            <div class="form-group<?php echo e($errors->has('link') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('link', 'Products Link',['class'=>'required']); ?><span
                                    class="text-danger">*</span></label>
                                <?php echo Form::text('link', null, ['class' => 'form-control','required' , 'pattern' =>
                                "https?://.+"]); ?>

                                <small class="text-danger"><?php echo e($errors->first('link')); ?></small>
                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__("Enter External Link Also")); ?></small>
                            </div>
                            <div class="form-group<?php echo e($errors->has('detail') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('detail', 'Description',['class'=>'required']); ?><span
                                    class="text-danger">*</span></label>
                                <?php echo Form::textarea('detail', null, ['id' => 'summernote','class' => 'form-control'
                                ,'required','placeholder' => 'Please Enter Products Detail']); ?>

                                <small class="text-danger"><?php echo e($errors->first('detail')); ?></small>
                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i><?php echo e(__(" Enter Detail About Products")); ?></small>
                            </div>
                            <div class="form-group<?php echo e($errors->has('price') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('price', 'Products price',['class'=>'required']); ?> <span
                                    class="text-danger">*</span></label>
                                <?php echo Form::number('price', null, ['class' => 'form-control', 'required','placeholder' =>
                                'Please Enter Products price']); ?>

                                <small class="text-danger"><?php echo e($errors->first('price')); ?></small>
                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i><?php echo e(__("Enter  Package price: 2400 ,2000...")); ?></small>
                            </div>
                            <div class="form-group<?php echo e($errors->has('offerprice') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('offerprice', 'Offerprice'); ?>

                                <?php echo Form::number('offerprice', null, ['class' => 'form-control', 'placeholder' =>
                                'Please Enter Package offerprice']); ?>

                                <small class="text-danger"><?php echo e($errors->first('offerprice')); ?></small>
                                <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__("Enter a Package Offerprice: 1800 ,2000...")); ?>}</small>

                            </div>
                            <div class="form-group<?php echo e($errors->has('image') ? ' has-error' : ''); ?> input-file-block">
                                <?php echo Form::label('image', 'Image',['class'=>'text-dark']); ?><br>
                                <?php echo Form::file('image', ['class' => 'input-file', 'id'=>'image']); ?>

                                 <small class="text-danger"><?php echo e($errors->first('image')); ?></small>
                            </div>
                            <div
                                class="form-group<?php echo e($errors->has('is_active') ? ' has-error' : ''); ?> switch-main-block">
                                <div class="custom-switch">
                                    <?php echo Form::checkbox('is_active', 1,$supplement->is_active==1 ? 1 : 0, ['id' =>
                                    'switch1', 'class' => 'custom-control-input']); ?>

                                    <label class="custom-control-label" for="switch1"><?php echo e(__("Is Actives")); ?></label>
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
<!-- End row -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\GYM\gym_new\resources\views/admin/supplement/edit.blade.php ENDPATH**/ ?>