
<?php $__env->startSection('title',__('Payment Settings')); ?>
<!-- Start Breadcrumbbar -->                    
<?php $__env->startSection('breadcum'); ?>
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">

            <h4 class="page-title"><?php echo e(__('Payment Settings')); ?></h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>"><?php echo e(__('Home')); ?></a></li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard.index')); ?>"><?php echo e(__('Dashboard')); ?></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <?php echo e(__('Payment Settings')); ?>

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
<div class="">
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-5 col-xl-3 col-md-4">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title mb-0"><i class="feather icon-credit-card"></i><?php echo e(__(" Payment Method")); ?></h5>
                </div>
                <div class="card-body">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link mb-2 active" data-toggle="pill" href="#rpaytab" role="tab"
                            aria-selected="true"><?php echo e(__("RazorPay")); ?></a>
                        <a class="nav-link mb-2" data-toggle="pill" href="#paytmtab" role="tab"
                            aria-selected="false"><?php echo e(__("Paytm")); ?></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-7 col-xl-9 col-md-8">
            <div class="tab-content" id="v-pills-tabContent">
                <!-- Dashboard Start -->
                <div class="tab-pane fade show active payment-setting" id="rpaytab" role="tabpanel">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h5 class="card-title mb-0"><?php echo e(__("RazorPay")); ?></h5>
                        </div>
                        <div class="card-body">
                            <form class="form" action="<?php echo e(route('payment.settings.save',['type' => 'razorpay'])); ?>"
                                method="POST" novalidate>
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label class="text-dark"><?php echo e(__('Razorpay Key:')); ?></label>
                                            <input name="RAZOR_PAY_KEY" autofocus="" type="text" class="form-control"
                                                placeholder="<?php echo e(__("Enter razorpay key")); ?>" required=""
                                                value="<?php echo e(env('RAZOR_PAY_KEY') ? env('RAZOR_PAY_KEY') : 'no'); ?>">
                                            <div class="invalid-feedback">
                                                <?php echo e(__('Please provide Razorpay api key !')); ?>.
                                            </div>
                                        </div>  
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label class="text-dark"><?php echo e(__('Razorpay Secret Key:')); ?> </label>
                                            <input name="RAZOR_PAY_SECRET" autofocus="" type="text" class="form-control"
                                                placeholder="<?php echo e(__("Enter razorpay secret key")); ?>" value="<?php echo e(env('RAZOR_PAY_SECRET')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group member-attendance-slider">
                                            <label class="switch"><input type="checkbox" id="togBtn" name="ENABLE_RAZOR_PAY"
                                                    <?php echo e(env('ENABLE_RAZOR_PAY') == 1 ? "checked" : ""); ?>>
                                                <div class="slider round">
                                                    <!--ADDED HTML -->
                                                    <span class="on" value="1"><?php echo e(__("Active")); ?></span><span class="off"
                                                        value="0"><?php echo e(__("Deactive")); ?></span>
                                                    <!--END-->
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer razorpay-btn">
                                    <button type="submit" class="btn btn-primary-rgba"><i class="feather icon-save mr-2"></i> <?php echo e(__('Save')); ?></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade payment-setting" id="paytmtab" role="tabpanel">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h5 class="card-title mb-0"><?php echo e(__("Paytm")); ?></h5>
                        </div>
                        <div class="card-body">
                            <form class="form" action="<?php echo e(route('payment.settings.save',['type' => 'paytm'])); ?>"
                                method="POST" novalidate>
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label class="text-dark"><?php echo e(__('Paytm Merchant Id:')); ?></label>
                                            <input name="PAYTM_MERCHANT_ID" autofocus="" type="text" class="form-control"
                                                placeholder="<?php echo e(__("Enter Paytm Id")); ?>" required="" value="<?php echo e(env('PAYTM_MERCHANT_ID')); ?>">
                                            <div class="invalid-feedback">
                                                <?php echo e(__('Please provide Paytm api key !')); ?>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label class="text-dark"><?php echo e(__('Paytm Merchant Key:')); ?> </label>
                                            <input name="PAYTM_MERCHANT_KEY" autofocus="" type="text" class="form-control"
                                                placeholder="<?php echo e(__("Enter Paytm Merchant key")); ?>" value="<?php echo e(env('PAYTM_MERCHANT_KEY')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label class="text-dark"><?php echo e(__('Paytm Merchant Website:')); ?> </label>
                                            <input name="PAYTM_MERCHANT_WEBSITE" autofocus="" type="text" class="form-control"
                                                placeholder="<?php echo e(__("Enter Paytm Secret key")); ?>"
                                                value="<?php echo e(env('PAYTM_MERCHANT_WEBSITE')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label class="text-dark"><?php echo e(__('PAYTM ENVIROMENT:')); ?> </label><br>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="customRadioInline3" name="ENVIRONMENT"
                                                    class="custom-control-input" value="local"
                                                    <?php echo e((env('ENVIRONMENT') == 'local' ? "checked" : "")); ?>>
                                                <label class="custom-control-label" for="customRadioInline3"><?php echo e(__("Local")); ?></label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="customRadioInline4" name="ENVIRONMENT"
                                                    class="custom-control-input" value="production"
                                                    <?php echo e((env('ENVIRONMENT') == 'production' ? "checked" : "")); ?>>
                                                <label class="custom-control-label" for="customRadioInline4"><?php echo e(__("Production")); ?></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group member-attendance-slider">
                                            <label class="switch"><input type="checkbox" id="togBtn" name="ENABLE_PAYTM_PAY"
                                                    <?php echo e(env('ENABLE_PAYTM_PAY')==1 ? "checked" : ""); ?>>
                                                <div class="slider round">
                                                    <!--ADDED HTML -->
                                                    <span class="on" value="1"><?php echo e(__("Active")); ?></span><span class="off"
                                                        value="0"><?php echo e(__("Deactive")); ?></span>
                                                    <!--END-->
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <button type="submit" class="btn btn-primary-rgba"><i class="feather icon-save mr-2"></i>
                                        <?php echo e(__('Save')); ?></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End col -->
            </div>
            <!-- End row -->
        </div>
        <!-- End Contentbar -->
        <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\GYM\resources\views/admin/settings/razorpay.blade.php ENDPATH**/ ?>