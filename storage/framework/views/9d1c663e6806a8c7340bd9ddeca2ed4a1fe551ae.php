
<?php $__env->startSection('title',__('All Enquiry')); ?>
<?php $__env->startSection('maincontent'); ?>
<!-- Start Breadcrumbbar -->                    
<?php $__env->startComponent('components.breadcumb',['secondaryactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
<?php echo e(__('Enquiry')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Enquiry')); ?>

<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<!-- End Breadcrumbbar -->
<div class="card m-b-30">
    <div class="card-header">                                
        <div class="row align-items-center">
            <div class="col-7">
                <h5 class="card-title mb-0"><?php echo e(__("Order No :")); ?> <?php echo e(__($enquiry->enid ?? '-')); ?></h5>
            </div>
            <div class="col-5 text-right">
                <span class="badge badge-success-inverse"><?php echo e(__($enquiry->status ?? '-')); ?></span>                                             
            </div>
        </div>
    </div>
    <div class="card-body">                                
        <div class="row mb-5">
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="order-primary-detail mb-4">
                    <h6><?php echo e(__("Order Placed")); ?></h6>
                    <p class="mb-0"><?php echo e($enquiry->updated_at); ?></p>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="order-primary-detail mb-4">
                <h6><?php echo e(__("Name")); ?></h6>
                <p class="mb-0"><?php echo e(__($enquiry->name ?? '-')); ?></p>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="order-primary-detail mb-4">
                <h6><?php echo e(__("Email ID")); ?></h6>
                <p class="mb-0"><?php echo e(__($enquiry->email ?? '-')); ?></p>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="order-primary-detail mb-4">
                <h6><?php echo e(__("Contact No")); ?></h6>
                <p class="mb-0"><?php echo e(__($enquiry->mobile ?? '-')); ?> / <?php echo e(__($enquiry->phone ?? '-')); ?></p>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="order-primary-detail mb-4">
                <h6><?php echo e(__("Age")); ?></h6>
                <p class="mb-0"><?php echo e(__($enquiry->age)); ?></p>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="order-primary-detail mb-4">
                <h6><?php echo e(__("Purpose")); ?></h6>
                <p class="mb-0"><?php echo e(__($enquiry->purpose)); ?></p>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="order-primary-detail mb-4">
                <h6><?php echo e(__("Cost")); ?></h6>
                <p class="mb-0"><?php echo e($enquiry->cost?$enquiry->cost->cost:''); ?></p>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="order-primary-detail mb-4">
                <h6><?php echo e(__("Occupation")); ?></h6>
                <p class="mb-0"><?php echo e($enquiry->occupation?$enquiry->occupation->occupation:''); ?></p>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="order-primary-detail mb-4">
                <h6><?php echo e(__("Refrence")); ?></h6>
                <p class="mb-0"><?php echo e(__($enquiry->refrence)); ?></p>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="order-primary-detail mb-4">
                <h6><?php echo e(__("Second Language")); ?></h6>
                <p class="mb-0"><?php echo e($enquiry->Secondlanguage?$enquiry->Secondlanguage->secondlanguage:''); ?></p>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="order-primary-detail mb-4">
                <h6><?php echo e(__("Description")); ?></h6>
                <p class="mb-0"><?php echo e(__($enquiry->description)); ?></p>
                </div>
            </div>
        </div> 
        <div class="row">
            <div class="col-md-6 col-lg-6 col-xl-6 ">
                <div class="order-primary-detail mb-4">
                <h6><?php echo e(__("Address")); ?></h6>
                <p><?php echo e(__($enquiry->address ?? '-')); ?><br/><?php echo e($enquiry->city['name'] ?? '-'); ?> <br> <?php echo e($enquiry->state['name'] ?? '-'); ?> <br>
                    <?php echo e($enquiry->country['name'] ?? '-'); ?> </p>
                <p class="mb-0"></p>
                </div>
            </div>
        </div>                                
    </div>
</div> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\gym_new\resources\views/admin/enquiry/show.blade.php ENDPATH**/ ?>