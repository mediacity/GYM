<!DOCTYPE html>
<!--
**********************************************************************************************************
    Copyright (c) 2021.
**********************************************************************************************************  -->
<!-- 
Template Name: Soyuz
Author: Media City
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]> -->
<html lang="en" >
<!-- <![endif]-->
<!-- head -->
<!-- theme styles -->
<head>
    
    <link href="<?php echo e(url('assets/plugins/switchery/switchery.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(url('assets/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(url('assets/css/icons.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(url('assets/css/flag-icon.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(url('assets/css/style.css" rel="stylesheet')); ?>" type="text/css">
</head>
<!-- end head -->
<!-- body start-->
<body>
<!-- terms end-->
<!-- about-home start -->
<div class="contentbar">                
    <!-- End row -->
    <div class="row justify-content-center">
        <!-- Start col -->
        <div class="col-md-12 col-lg-10 col-xl-10">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="invoice">
                        <div class="invoice-head">
                            <div class="row">
                                <div class="col-12 col-md-7 col-lg-7">
                                    <div class="invoice-logo">
                                        <?php if($invoice): ?>
                                        <img src=<?php echo e(url('/image/signature/'.$invoice->signature)); ?> class="img-fluid" alt="signature">
                                        <?php endif; ?>
                                    </div>
                                    <h4><?php echo e(__("Gym Quotation")); ?></h4>
                                   <p><?php echo e(__("Address : ")); ?><?php echo e($quotation->address); ?> <br>
                                        <?php echo e($quotation->city['name']); ?> <br> <?php echo e($quotation->state['name']); ?> <br>
                                        <?php echo e($quotation->country['name']); ?> </p>
                                </div>
                              
                            </div>
                        </div> 
                        <div class="invoice-billing">
                            <div class="row">
                                <div class="col-sm-6 col-md-4 col-lg-4">
                                    <div class="invoice-address">
                                        <h6 class="mb-3"><?php echo e(__("Bill to")); ?></h6>
                                        <h6 class="text-muted"><?php echo e(__($quotation->name)); ?></h6>
                                        <ul class="list-unstyled">
                                            <li><p><?php echo e(__("Address :")); ?> <?php echo e($quotation->address); ?> <br>
                                                <?php echo e($quotation->city['name']); ?> <br> <?php echo e($quotation->state['name']); ?> <br>
                                                <?php echo e($quotation->country['name']); ?> </p></li>  
                                            <li><?php echo e($quotation->phone); ?></li>  
                                            <li><?php echo e($quotation->email); ?></li>  
                                        </ul>
                                    </div>
                                </div>
                               
                                
                            </div>
                        </div>  
                        <div class="invoice-summary">
                            <div class="table-responsive ">
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th scope="col"><?php echo e(__("ID")); ?></th>                       
                                            <th scope="col"><?php echo e(__("Product")); ?></th>
                                            <th scope="col"><?php echo e(__("Qty")); ?></th>
                                            <th scope="col"><?php echo e(__("Price")); ?></th>
                                            <th scope="col" class="text-right"><?php echo e(__("Total")); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php $__currentLoopData = $quotation->subquotation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <th scope="row"><?php echo e($t->id); ?></th>
                                            <td><?php echo e($t->productname); ?></td>
                                            <td><?php echo e($t->quantity); ?></td>
                                            <td><?php echo e($t->price); ?></td>
                                            <td class="text-right"><?php echo e($t->total); ?></td>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tr>
                                     
                                </table>
                            </div>
                        </div>
                        <div class="invoice-summary-total">
                            <div class="row">
                                <div class="col-md-12 order-2 order-lg-1 col-lg-5 col-xl-6">
                                    <div class="order-note">
                                        <p class="mb-3"><span class="badge badge-info-inverse font-14"><?php echo e(__("This is Free Shipping Order")); ?></span></p>
                                        <h6><?php echo e(__("Special Note for this order:")); ?></h6>
                                        <p><?php echo $quotation->additionalnote; ?></p>
                                    </div>
                                </div>
                                <div class="col-md-12 order-1 order-lg-2 col-lg-7 col-xl-6">
                                    <div class="order-total table-responsive ">
                                        <table class="table table-borderless text-right">
                                            <tbody>
                                                <tr>
                                                    <td><?php echo e(__("Sub Total :")); ?></td>
                                                    <td><?php echo e($quotation->subtotal); ?></td>
                                                </tr>
                                                <tr>
                                                    <td><?php echo e(__("Tax %")); ?></td>
                                                    <td><?php echo e($quotation->tax); ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="f-w-7 font-18"><h5><?php echo e(__("Amount Payable :")); ?></h5></td>
                                                    <td class="f-w-7 font-18"><h5>Rs. <?php echo e($quotation->grandtotal); ?></h5></td>
                                                 </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="invoice-meta">
                            <div class="row">
                                <div class="col-sm-6 col-md-4 col-lg-4">
                                    <div class="invoice-meta-box">
                                        <h6 class="mb-3"><?php echo e(__("Terms & Conditions")); ?></h6>
                                        <ul class="pl-3">
                                            <li><?php echo e(__($invoice?$invoice->term_condition:'')); ?></li>
                                         </ul>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="invoice-meta-box text-right">
                                        <h6 class="mb-0"><?php echo e(__("Authorized Signatory")); ?></h6>
                                        <?php if($invoice): ?>
                                       <img src=<?php echo e(url('/image/signature/'.$invoice->signature)); ?> class="img-fluid" alt="signature">
                                        <p class="mb-0"><?php echo e(__($invoice->name)); ?> C</p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div> 
                   
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
    </div>
    <!-- End row -->
</div>
<!-- footer start -->

<!-- footer end -->
<!-- jquery -->
<script>
    $('.calendar').each(function () {
        $(this).datepicker({
            dateFormat: 'yy-mm-dd',
            minDate: 0
        });
    });
    var stateurl = <?php echo json_encode(route('list.state'), 15, 512) ?>;
    var cityurl = <?php echo json_encode(route('list.cities'), 15, 512) ?>;
    </script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
<script src="<?php echo e(asset('js/share.js')); ?>"></script>
<script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/modernizr.min.js"></script>
    <script src="assets/js/detect.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/vertical-menu.js"></script>
    <!-- Switchery js -->
    <script src="assets/plugins/switchery/switchery.min.js"></script>
    <!-- Core js -->
    <script src="assets/js/core.js"></script>
<!-- end jquery -->
</body>
<!-- body end -->
</html> 
<?php /**PATH C:\xampp\htdocs\GYM\gym_new\resources\views/admin/quotation/pdf.blade.php ENDPATH**/ ?>