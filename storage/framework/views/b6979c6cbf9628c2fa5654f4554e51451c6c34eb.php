<?php $__env->startSection('title',__('Create Slider')); ?>
<?php $__env->startSection('maincontent'); ?>
<!-- Start Breadcrumbbar -->                    
<?php $__env->startComponent('components.breadcumb',['thirdactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
<?php echo e(__('Home')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Slider')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu2'); ?>
<?php echo e(__('Create')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('button'); ?>
<div class="col-md-6 col-lg-6">
    <a href="<?php echo e(route('slider.index')); ?>" class="float-right btn btn-primary-rgba mr-2"><i
            class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>
</div>
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<!-- End Breadcrumbbar -->
<!-- Content Wrapper. Contains page content -->
<div class="contentbar">
    <!-- Start row -->
    <div class="row justify-content-center">
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title"><?php echo e(__("Create New Slider")); ?></h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box-body">
                                <form action="<?php echo e(route('slider.store')); ?>" class="form" method="POST" novalidate
                                    enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="text-dark" for="address"><?php echo e(__("Image")); ?><span
                                                            class="text-danger">*</span></label>
                                                    <div class="custom-file">
                                                        <input type="file" name="image" class="custom-file-input" id="image"
                                                            aria-describedby="inputGroupFileAddon01">
                                                        <label class="custom-file-label" for="inputGroupFile01"><?php echo e(__("Choose file")); ?></label>
                                                    </div>
                                                </div>
                                                <div class="display-none form-group" id="url_box" style="display:none;">
                                                    <label><?php echo e(__("Enter URL:")); ?></label>
                                                    <input type="url" id="url" name="url" class="form-control"
                                                        placeholder="<?php echo e(__("http://www.")); ?>">
                                                </div>
                                                <div class="display-none form-group" id="cat_id" style="display:none;">
                                                    <label><?php echo e(__("Enter Channel Name:")); ?></label>
                                                    <input type="text" id="cat" name="cat" class="form-control"
                                                        placeholder="<?php echo e(__("Channel Name")); ?>">
                                                </div>
                                                 <div class="display-none form-group" id="pro_id" style="display:none;">
                                                    <label><?php echo e(__("Enter Product Name:")); ?></label>
                                                    <input type="text" id="pro" name="pro" class="form-control"
                                                        placeholder="<?php echo e(__("Product Name")); ?>">
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                             <label><?php echo e(__("Slider Top Heading:")); ?></label><span
                                                                class="text-danger">*</span>
                                                            <input name="heading" type="text" value=""
                                                                placeholder="<?php echo e(__("Enter top heading")); ?>" class="form-control"
                                                                required />

                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for=""><?php echo e(__("Text Color:")); ?></label>
                                                            <input class="form-control" type="color" value=""
                                                                name="headingtextcolor">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <label><?php echo e(__("Slider Sub Heading:")); ?></label>
                                                            <input name="subheading" type="text" value=""
                                                                placeholder="<?php echo e(__("Enter Sub heading")); ?>" class="form-control" />
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label for=""><?php echo e(__("Text Color:")); ?></label>
                                                            <input class="form-control" type="color" value=""
                                                                name="subheadingcolor">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="form-group<?php echo e($errors->has('status') ? ' has-error' : ''); ?> ">
                                                    <?php echo Form::checkbox('status', 1,1, ['id' => 'status', 'class' => 'tgl
                                                    tgl-skewed']); ?>

                                                    <label class="tgl-btn" data-tg-off="Deactive" data-tg-on="Active"
                                                        for="status"></label>
                                                </div>
                                                <div class="form-group">
                                                    <button type="reset" class="btn btn-danger-rgba"><i
                                                            class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
                                                    <button type="submit" class="btn btn-primary-rgba"><i
                                                            class="fa fa-check-circle"></i>
                                                        <?php echo e(__("Create")); ?></button>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="link_by"><?php echo e(__("Image Preview:")); ?></label>
                                                <br><br>
                                                <div>
                                                    <img src="https://mediacity.co.in/emart/demo/public/images/sliderpreview.png"
                                                        class="img-fluid" id="slider_preview"  title="Image Preview"
                                                        align="center">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <?php $__env->stopSection(); ?>
            <?php $__env->startSection('scripts'); ?>
            <script>
                $("#image").on('change', function () {
                    readURL1(this);
                });

                function readURL1(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $('#slider_preview').attr('src', e.target.result);
                        }
                        reader.readAsDataURL(input.files[0]);
                    }
                }
                $('#link_by').on('change', function () {

                    var v = $(this).val();
                    if (v == 'url') {
                        $('#url_box').show();

                        $('#url').attr('required', '');
                    } else if (v == 'cat') {
                        $('#cat_id').show();
                        $('#url_box').hide();
                        $('#cat').attr('required', '');
                    } else if (v == 'pro') {
                        $('#pro_id').show();
                        $('#url_box').hide();
                        $('#cat_id').hide();
                        $('#pro').attr('required', '');
                    } else {

                        $('#url_box').hide();
                        $('#cat_id').hide();
                        $('#pro_id').hide();
                        $('#pro').removeAttr('required');
                        $('#cat').removeAttr('required');

                        $('#url').removeAttr('required');
                    }
                });
            </script>
            <link type="text/css" rel="stylesheet"
                href="https://mediacity.co.in/emart/demo/public/css/vendor/toggle.css">
            <?php $__env->stopSection(); ?>
            
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\GYM\gym_new\resources\views/admin/slider/create.blade.php ENDPATH**/ ?>