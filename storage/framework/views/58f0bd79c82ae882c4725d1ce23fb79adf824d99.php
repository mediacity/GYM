
<?php $__env->startSection('title',__('Add Products')); ?>
<?php $__env->startSection('breadcum'); ?>
<div class="breadcrumbbar breadcrumbbar-one">
    <div class="row align-items-center">
        <div class="col-lg-4 col-md-8">
            <h4 class="page-title"><?php echo e(__("Products")); ?></h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                    <li class="breadcrumb-item"><a href=""><?php echo e(__('Admin')); ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <?php echo e(__('Add Products')); ?>

                    </li>
                </ol>
            </div>
        </div>
        <?php if(auth()->user()->can('users.add')): ?>
        <div class="col-lg-8 col-md-4">
            <div class="top-btn-block text-right">
                <a href="<?php echo e(route('supplement.index')); ?>" class="btn btn-primary-rgba mr-2"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
<!-- Start row -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title"><?php echo e(__('Add Your Products:')); ?></h5>
            </div>
            <div class="card-body">
                <div class="admin-form">
                    <?php echo Form::open(['method' => 'POST', 'route' => 'supplement.store','files' => true , 'class' => 'form
                    form-light' ,'novalidate']); ?>

                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('name', 'Name'); ?><span class="text-danger">*</span></label>
                                <?php echo Form::text('name', null, ['class' => 'form-control', 'required','placeholder' =>'Please Enter Products Name']); ?>

                                <small class="text-danger"><?php echo e($errors->first('name')); ?></small>
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__("Enter Products Name : Protien Drink...")); ?> </small>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group<?php echo e($errors->has('link') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('link', 'Products Link',['class'=>'required']); ?><span
                                    class="text-danger">*</span></label>
                                <?php echo Form::text('link', null, ['class' => 'form-control','required' ,'placeholder' => 'Please Enter Product Links' , 'pattern' => "https?://.+"]); ?>

                                <small class="text-danger"><?php echo e($errors->first('link')); ?></small>
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__("Enter External  Link  Also")); ?></small>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group<?php echo e($errors->has('detail') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('detail', 'Description',['class'=>'required']); ?><span
                                    class="text-danger">*</span></label>
                                <?php echo Form::textarea('detail', null, ['id' => 'summernote','class' => 'form-control'
                                ,'required','placeholder' => 'Please Enter Products Detail']); ?>

                                <small class="text-danger"><?php echo e($errors->first('detail')); ?></small>
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__("Enter Detail About Supplement")); ?></small>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group<?php echo e($errors->has('price') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('price', 'Products price',['class'=>'required']); ?><span
                                    class="text-danger">*</span></label>
                                <?php echo Form::number('price', null, ['class' => 'form-control', 'required', 'placeholder'
                                => 'Please Enter price']); ?>

                                <small class="text-danger"><?php echo e($errors->first('price')); ?></small>
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__("Enter The Price : 100....")); ?></small>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group<?php echo e($errors->has('offerprice') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('offerprice', 'OfferPrice'); ?>

                                <?php echo Form::number('offerprice', null, ['class' => 'form-control','placeholder' => 'Please Enter OfferPrice']); ?>

                                <small class="text-danger"><?php echo e($errors->first('offerprice')); ?></small>
                                <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i><?php echo e(__(" Enter The OfferPrice: 50,60...")); ?></small>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group<?php echo e($errors->has('image') ? ' has-error' : ''); ?> input-file-block">
                                <?php echo Form::label('image', 'Product Image',['class'=>'text-dark']); ?>

                                <?php echo Form::file('image', ['class' => 'input-file', 'id'=>'image']); ?>

                                <small class="text-danger"><?php echo e($errors->first('image')); ?></small>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group<?php echo e($errors->has('is_active') ? ' has-error' : ''); ?> switch-main-block">
                                <div class="custom-switch">
                                    <?php echo Form::checkbox('is_active', 1,1, ['id' => 'switch1', 'class' =>
                                    'custom-control-input']); ?>

                                    <label class="custom-control-label" for="switch1"><span><?php echo e(__("Status")); ?></span></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
                                <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                                    <?php echo e(__("Create")); ?></button>
                            </div>
                        </div>
                    </div>
                    <div class="clear-both"></div>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- End row -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\GYM\resources\views/admin/supplement/create.blade.php ENDPATH**/ ?>