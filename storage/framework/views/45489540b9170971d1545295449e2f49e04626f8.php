
<?php $__env->startSection('title',__('All Enquiry')); ?>
<?php $__env->startSection('breadcum'); ?>
	<div class="breadcrumbbar breadcrumbbar-one">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-5">
                <h4 class="page-title"><?php echo e(__("Enquiry")); ?></h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard.index')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                        <li class="breadcrumb-item"><a href=""><?php echo e(__('Admin')); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                        	<?php echo e(__('Enquiry')); ?>

                        </li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-7">
                <div class="top-btn-block text-right">

                    <a href="<?php echo e(route('enquiry.index')); ?>" class="btn btn-primary-rgba mr-2"><i
                    class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>
                </div>
            </div>  
        </div>          
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
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
                <p class="mb-0"><?php echo e(($enquiry->name ?? '-')); ?></p>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="order-primary-detail mb-4">
                <h6><?php echo e(__("Email ID")); ?></h6>
                <p class="mb-0"><?php echo e(($enquiry->email ?? '-')); ?></p>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="order-primary-detail mb-4">
                <h6><?php echo e(__("Contact No")); ?></h6>
                <p class="mb-0"><?php echo e(($enquiry->mobile ?? '-')); ?> / <?php echo e(($enquiry->phone ?? '-')); ?></p>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="order-primary-detail mb-4">
                <h6><?php echo e(__("Age")); ?></h6>
                <p class="mb-0"><?php echo e(($enquiry->age)); ?></p>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="order-primary-detail mb-4">
                <h6><?php echo e(__("Purpose")); ?></h6>
                <p class="mb-0"><?php echo e(($enquiry->purpose)); ?></p>
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
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\GYM\resources\views/admin/enquiry/show.blade.php ENDPATH**/ ?>