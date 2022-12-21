
<br/>
<br/>
<div class="contentbar">                
    <!-- Start row -->
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
                                   <p><?php echo e(__("Address :")); ?> <?php echo e($quotation->address); ?> <br>
                                        <?php echo e($quotation->city['name']); ?> <br> <?php echo e($quotation->state['name']); ?> <br>
                                        <?php echo e($quotation->country['name']); ?> </p>
                                </div>
                                <div class="col-12 col-md-5 col-lg-5">
                                    <div class="invoice-name">
                                        <h5 class="text-uppercase mb-3"><?php echo e(__("Invoice")); ?></h5>
                                        <p class="mb-1"><?php echo e(__($quotation->customerid)); ?></p>
                                        <p class="mb-0"><?php echo e(__($quotation->date)); ?></p>
                                         <h4 class="text-success mb-0 mt-3"><?php echo e('Rs '. __($quotation->grandtotal)); ?></h4>
                                        </div>
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
                                            <li><p>Address : <?php echo e($quotation->address); ?> <br>
                                                <?php echo e($quotation->city?$quotation->city->name:''); ?> <br> <?php echo e($quotation->state?$quotation->state->name:''); ?> <br>
                                                <?php echo e($quotation->country?$quotation->country->name:''); ?> </p></li>  
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
                                            <?php $__currentLoopData = $subquotation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                                    <td class="f-w-7 font-18"><h5><?php echo e('Rs '.__($quotation->grandtotal)); ?></h5></td>
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
                                <div class="col-sm-6 col-md-4 col-lg-4">
                                    <div class="invoice-meta-box">
                                        <h6 class="mb-3"><?php echo e(__("Contact Us")); ?></h6>
                                        <ul class="list-unstyled">
                                            <li><i class="feather icon-aperture mr-2"></i><?php echo e(__($invoice?$invoice->email:'')); ?></li> 
                                            <li><i class="feather icon-phone mr-2"></i><?php echo e(__($invoice?$invoice->phone:'')); ?></li>  
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
                        <div class="invoice-footer">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <p class="mb-0"><?php echo e(__("Thank you for your Business.")); ?></p>
                                </div>
                                <div class="col-md-6">
                                    <div class="invoice-footer-btn">
                                        <a href="javascript:window.print()" class="btn btn-primary-rgba py-1 font-16"><i class="feather icon-printer mr-2"></i><?php echo e(__("Print")); ?></a>
                                       
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mb-4">
                                    <a class="btn btn-primary" href="<?php echo e(action('QuotationController@downloadPDF', $quotation->id)); ?>"><?php echo e(__("Export to PDF")); ?></a>
                                </div>
                                <div id="social-links">
                                    <ul>
                                        <li><a href="https://www.facebook.com/sharer/sharer.php?u=http://jorenvanhocht.be" class="social-button " id=""><span class="fa fa-facebook-official"></span></a></li>
                                        <li><a href="https://wa.me/?text=<?php echo e($url.'/manage/downloadPDF/'.$quotation->id); ?>" class="social-button " id=""><span class="fa fa-whatsapp"></span></a></li>    
                                    </ul>
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
<?php $__env->startSection('script'); ?>
<script>
    $('.calendar').each(function () {
        $(this).datepicker({
            dateFormat: 'yy-mm-dd',
            minDate: 0
        });
    });

    var stateurl = <?php echo json_encode(route('list.state'), 15, 512) ?>;
    var cityurl = <?php echo json_encode(route('list.cities'), 15, 512) ?>;
    function printpage() {
        //Get the print button and put it into a variable
        var printButton = document.getElementById("printpagebutton");
        //Set the print button visibility to 'hidden' 
        //printButton.style.visibility = 'hidden';
        //Print the page content
        window.print()
        //Set the print button to 'visible' again 
        //[Delete this line if you want it to stay hidden after printing]
        printButton.style.visibility = 'visible';
    }

</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
<script src="<?php echo e(asset('js/share.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php
Share::page($url.'/manage/downloadPDF/'.$quotation->id, 'Share title')
	->facebook()
	->whatsapp();
?>
    

<?php echo $__env->make('layouts.theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\GYM\resources\views/admin/quotation/show.blade.php ENDPATH**/ ?>