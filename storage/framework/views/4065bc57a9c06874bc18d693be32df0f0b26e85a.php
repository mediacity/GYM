
<?php $__env->startSection('title', __('Appointment')); ?>
<?php $__env->startSection('breadcum'); ?>
<div class="breadcrumbbar breadcrumbbar-one">
    <div class="row align-items-center">
        <div class="col-lg-4 col-md-5">
            <h4 class="page-title"><?php echo e(__("Appointment")); ?></h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                    <li class="breadcrumb-item"><a href=""><?php echo e(__('Admin')); ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <?php echo e(__('All Appointments')); ?>

                    </li>
                </ol>
            </div>
        </div>
        <div class="col-lg-8 col-md-7">
            <div class="top-btn-block text-right">
                <a href="<?php echo e(route('appointment.create')); ?>" class="btn btn-primary-rgba mr-2"><i class="feather icon-plus mr-2"></i><?php echo e(__("Add Appointment")); ?></a>
                <a href="<?php echo e(route('app.index')); ?>" class="btn btn-primary-rgba mr-2"><i class="feather icon-download-cloud mr-2"></i><?php echo e(__("Recycle")); ?></a>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
<!-- Start Contentbar -->
<section class="content-header">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h4><?php echo e(__("Calendar")); ?></h4>
        </div>
        
    </div>
</section>
<!-- End Contentbar -->
<div class="card-body p-0">
<?php echo $calendar->calendar(); ?>

</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@5.3.0/main.min.js"></script>
<?php echo $calendar->script(); ?>

<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\GYM\resources\views/admin/appointment/index.blade.php ENDPATH**/ ?>