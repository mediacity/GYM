
<?php $__env->startSection('title',__('Edit Slider :eid -',['eid' => $slider->id])); ?>
<?php $__env->startSection('breadcum'); ?>
	<div class="breadcrumbbar breadcrumbbar-one">
        <div class="row align-items-center">
            <div class="col-md-5 col-lg-8">
                <h4 class="page-title"><?php echo e(__("Slider")); ?></h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard.index')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                        	<?php echo e(__('Edit Slider')); ?>

                        </li>
                    </ol>
                </div>
            </div>
            <div class="col-md-7 col-lg-4">
                <div class="top-btn-block  text-right">
                    <a href="<?php echo e(route('slider.index')); ?>" class="btn btn-primary-rgba mr-2"><i
                    class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>
                </div>
            </div>
        </div>          
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="">
    <!-- Start row -->
    <div class="row justify-content-center">
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title"><?php echo e(__("Edit Slider")); ?></h5>
                </div>
                <div class="card-body">
                    <div class="box-body">
                        <form action="<?php echo e(route('slider.update',$slider['id'])); ?>" class="form" method="POST"
                            novalidate enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <?php echo method_field('PUT'); ?>
                            <div class="row">
                                <div class="col-lg-8 col-md-12">
                                    <div class="form-group text-dark">
                                        <label ><?php echo e(__("Choose Slider Image:")); ?></label>
                                        <div class="input-group mb-3">
                                            <div class="custom-file">
                                                <input type="file" name="image" value="<?php echo e($slider['image']); ?>" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                                    <label class="custom-file-label" for="inputGroupFile01"><?php echo e($slider['image']); ?></label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="d-none form-group" id="url_box">
                                        <label><?php echo e(__("Enter URL:")); ?></label>
                                        <input type="url" id="url" name="url" value="<?php echo e($slider['url']); ?>"
                                            class="form-control" placeholder="<?php echo e(__("http://www.")); ?>">
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <label><?php echo e(__("Slider Top Heading:")); ?></label>
                                                    <span
                                                class="text-danger">*</span>
                                                <input name="heading" type="text"
                                                    value="<?php echo e($slider['heading']); ?>"
                                                    placeholder="<?php echo e(__("Enter top heading" )); ?>" class="form-control" required="" />
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
                                                <input name="subheading" type="text"
                                                    value="<?php echo e($slider['subheading']); ?>"
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
                                        class="form-group<?php echo e($errors->has('status') ? ' has-error' : ''); ?> switch-main-block">
                                        <?php echo Form::checkbox('status', 1,$slider->status==1 ? 1 :0, ['id' =>
                                        'status', 'class' => 'tgl tgl-skewed']); ?>

                                        <label class="tgl-btn" data-tg-off="Deactive" data-tg-on="Active"
                                            for="status"></label>
                                        <?php echo Form::close(); ?>


                                    </div>
                                    <div class="form-group">
                                        <button type="reset" class="btn btn-danger-rgba"><i
                                                class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
                                        <button type="submit" class="btn btn-primary-rgba"><i
                                                class="fa fa-check-circle"></i> <?php echo e(__("Update")); ?></button>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <label for="link_by"><?php echo e(__("Image Preview:")); ?></label>
                                    <br><br>
                                    <div >
                                        <img  src="<?php echo e(asset('image/slider/'.$slider->image)); ?>"
                                            class="img-fluid" id="slider_preview"
                                            title="Image Preview" align="center" >

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                        <!-- /.box -->
                </div>
                <!-- /.content -->
            </div>
        </div>
    </div>
</div>
<!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>
    $('#inputGroupFile01').on('change',function(){
        //get the file name
        var fileName = $(this).val().replace('C:\\fakepath\\', " ");
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(fileName);
    })
</script>
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
        } else if (v == 'none') {
            $('#cat_id').hide();
            $('#url_box').hide();
            $('#pro_id').hide();
        } else {

            $('#url_box').hide();
            $('#cat_id').hide();
            $('#pro_id').hide();


            $('#pro').removeAttr('required');
            $('#cat').removeAttr('required');

            $('#url').removeAttr('required');
        }
    });
    $('#link_by').on('change', function () {


                var opt = $(this).val();

                if (opt == 'url') {
                    $('#minAmount').hide();
                    $('#urlbox').show();
                    $('#catbox').hide();
                    $('#url').attr('required', 'required');
                }
            });

</script>
<!-- Datepicker and toggle -->
    <link type="text/css" rel="stylesheet"
    href="https://mediacity.co.in/emart/demo/public/css/vendor/toggle.css">
    <!-- Datepicker and toggle -->
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\GYM\resources\views/admin/slider/edit.blade.php ENDPATH**/ ?>