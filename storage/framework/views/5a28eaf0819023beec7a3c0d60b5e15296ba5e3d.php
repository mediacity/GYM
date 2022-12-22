
<?php $__env->startSection('title',__(' Dashboard')); ?>
<!-- Start Breadcrumbbar -->
<?php $__env->startSection('breadcum'); ?>
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-12 col-lg-8">
            <h4 class="page-title"><?php echo e(__("Home")); ?></h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>"><?php echo e(__('Home')); ?></a></li>
                    <li class="breadcrumb-item active"><?php echo e(__('Dashboard')); ?></li>

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
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('dashboard.superadmin')): ?>
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12">
            <!-- Start row -->
            <div class="row">
                <!-- Start col -->
                <div class="col-lg-6 col-xl-3 col-sm-6">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h4><?php echo e($userss); ?></h4>
                                    <p class="font-14 mb-0"><?php echo e(__('Users')); ?></p>
                                </div>
                                <div class="col-6 text-right">
                                    <a href="<?php echo e(route('users.index')); ?>"><i
                                            class="text-info feather icon-users icondashboard"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End col -->
                <!-- Start col -->
                <div class="col-lg-6 col-xl-3 col-sm-6">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h4><?php echo e($blogs); ?></h4>
                                    <p class="font-14 mb-0"><?php echo e(__("Blogs")); ?></p>
                                </div>
                                <div class="col-6 text-right">
                                    <a href="<?php echo e(route('blog.index')); ?>"><i
                                            class="text-info feather icon-message-square icondashboard"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End col -->
                <!-- Start col -->
                <div class="col-lg-6 col-xl-3 col-sm-6">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h4><?php echo e($payments); ?></h4>
                                    <p class="font-14 mb-0"><?php echo e(__("Payment")); ?></p>
                                </div>
                                <div class="col-6 text-right">
                                    <a href="<?php echo e(route('history')); ?>"><i class="text-info feather icon-dollar-sign icondashboard"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3 col-sm-6">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h4><?php echo e($faqs); ?></h4>
                                    <p class="font-14 mb-0"><?php echo e(__("Faqs")); ?></p>
                                </div>
                                <div class="col-6 text-right">
                                    <a href="<?php echo e(route('faq.index')); ?>"><i
                                            class="text-info feather icon-help-circle icondashboard"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3 col-sm-6">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h4><?php echo e($quotations); ?></h4>
                                    <p class="font-14 mb-0"><?php echo e(__("Quotation")); ?></p>
                                </div>
                                <div class="col-6 text-right">
                                    <a href="<?php echo e(route('quotation.index')); ?>"><i
                                            class="text-info feather icon-file icondashboard"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3 col-sm-6">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h4><?php echo e($referalusers); ?></h4>
                                    <p class="font-14 mb-0"><?php echo e(__("AffilateHistory")); ?></p>
                                </div>
                                <div class="col-6 text-right">
                                    <a href="<?php echo e(route('history')); ?>"><i
                                            class="text-info feather icon-user-check icondashboard"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3 col-sm-6">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h4><?php echo e($appointments); ?></h4>
                                    <p class="font-14 mb-0"><?php echo e(__("Appointment")); ?></p>
                                </div>
                                <div class="col-6 text-right">
                                    <a href="<?php echo e(route('appointment.index')); ?>"><i
                                            class="text-info feather icon-phone-call icondashboard"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3 col-sm-6">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h4><?php echo e($enquirys); ?></h4>
                                    <p class="font-14 mb-0"><?php echo e(__("Enquiry")); ?></p>
                                </div>
                                <div class="col-6 text-right">
                                    <a href="<?php echo e(route('enquiry.index')); ?>"><i
                                            class="text-info feather icon-plus-square icondashboard"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if(count($todayuser)>0): ?>
                <div class="col-lg-6 col-xl-3 col-sm-6">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <h5 class="card-title mb-0"><?php echo e(__("Top Users")); ?></h5>
                                </div>
                                <div class="col-3">
                                    <div class="dropdown">
                                        <button class="btn btn-link p-0 font-18 float-right" type="button"
                                            id="widgetRevenue" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false"><i class="feather icon-more-horizontal-"></i></button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="widgetRevenue">
                                            <a class="dropdown-item font-13" href="#"><?php echo e(__("Refresh")); ?></a>
                                            <a class="dropdown-item font-13" href="#"><?php echo e(__("Export")); ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="user-slider">
                            <?php $__currentLoopData = $todayuser; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $todayusers): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="user-slider">
                                <div class="user-slider-item">
                                    <div class="card-body text-center">
                                        <span class="action-icon badge badge-primary-inverse">
                                            <img src="<?php echo e(Avatar::create($todayusers->name)->toBase64()); ?>"
                                                class="dashboard-imgs" alt=""></span>
                                        <h5><?php echo e($todayusers->name); ?></h5>
                                        <p><?php echo e($todayusers->email); ?></p>
                                        <p><span
                                                class="badge badge-primary-inverse"><?php echo e(__("Membership:")); ?><?php echo e($todayusers->membership); ?></span>
                                        </p>
                                        <div class="button-list mt-4">
                                            <button type="button" class="btn btn-round btn-secondary-rgba"><i
                                                    class="feather icon-phone"></i></button>
                                            <button type="button" class="btn btn-round btn-secondary-rgba"><i
                                                    class="feather icon-mail"></i></button>
                                        </div>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="row">
                                            <div class="col-12">
                                                <h4 class="user-phone-no border-right"><?php echo e($todayusers->phone); ?></h4>
                                                <p class="user-contact-no my-2"><?php echo e(__("Contact No")); ?></p>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <div class="col-lg-6 col-xl-3 col-sm-6 d-none">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <h5 class="card-title mb-0"><?php echo e(__("Top Measurement")); ?></h5>
                                </div>
                                <div class="col-3">
                                    <div class="dropdown">
                                        <button class="btn btn-link p-0 font-18 float-right" type="button"
                                            id="widgetRevenue" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false"><i class="feather icon-more-horizontal-"></i></button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="widgetRevenue">
                                            <a class="dropdown-item font-13" href="#"><?php echo e(__("Refresh")); ?></a>
                                            <a class="dropdown-item font-13" href="#"><?php echo e(__("Export")); ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="user-slider">
                            <?php $__currentLoopData = $todaymeasurements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $todaymeasurement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="user-slider">
                                <div class="user-slider-item">
                                    <div class="card-body text-center">
                                        <span class="action-icon badge badge-primary-inverse"><img
                                                src="<?php echo e(Avatar::create($todaymeasurement->user->name )->toBase64()); ?>"
                                                class="dashboard-imgs" alt=""></span>
                                        <h5><?php echo e($todaymeasurement->user->name); ?></h5>
                                        <p><?php echo e($todaymeasurement->user->email); ?></p>
                                        <p><span
                                                class="badge badge-primary-inverse"><?php echo e(__("Date:")); ?><?php echo e($todaymeasurement->created_at); ?></span>
                                        </p>
                                        <div class="button-list mt-4">
                                            <button type="button" class="btn btn-round btn-secondary-rgba"><i
                                                    class="feather icon-phone"></i></button>
                                            <button type="button" class="btn btn-round btn-secondary-rgba"><i
                                                    class="feather icon-mail"></i></button>
                                        </div>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="row">
                                            <div class="col-12">
                                                <h4 class="user-phone-no border-right"><?php echo e($todaymeasurement->description); ?></h4>
                                                <p class="user-contact-no my-2"><?php echo e(__("Description")); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3 col-sm-6 d-none">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <h5 class="card-title mb-0"><?php echo e(__("Top Enquiry")); ?></h5>
                                </div>
                                <div class="col-3">
                                    <div class="dropdown">
                                        <button class="btn btn-link p-0 font-18 float-right" type="button"
                                            id="widgetRevenue" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false"><i class="feather icon-more-horizontal-"></i></button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="widgetRevenue">
                                            <a class="dropdown-item font-13" href="#"><?php echo e(__("Refresh")); ?></a>
                                            <a class="dropdown-item font-13" href="#"><?php echo e(__("Export")); ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="user-slider">
                            <?php $__currentLoopData = $todayenquiry; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $todayenquirys): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="user-slider">
                                <div class="user-slider-item">
                                    <div class="card-body text-center">
                                        <span class="action-icon badge badge-primary-inverse"><img
                                                src="<?php echo e(Avatar::create($todayenquirys->name )->toBase64()); ?>"
                                                class="dashboard-imgs" alt=""></span>
                                        <h5><?php echo e($todayenquirys->name); ?></h5>
                                        <p><?php echo e($todayenquirys->email); ?></p>
                                        <p><span
                                                class="badge badge-primary-inverse"><?php echo e(__("Status:")); ?><?php echo e($todayenquirys->status); ?></span>
                                        </p>
                                        <div class="button-list mt-4">
                                            <button type="button" class="btn btn-round btn-secondary-rgba"><i
                                                    class="feather icon-phone"></i></button>
                                            <button type="button" class="btn btn-round btn-secondary-rgba"><i
                                                    class="feather icon-mail"></i></button>
                                        </div>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="row">
                                            <div class="col-12">
                                                <h4  class="user-phone-no border-right"><?php echo e(date_format($todayenquirys->created_at,'d-m-Y')); ?></h4>
                                                <p class="user-contact-no my-2"><?php echo e(__("Enquiry Date")); ?></p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
                <?php if(count($todayappointment)>0): ?>
                <div class="col-lg-6 col-xl-3 col-sm-6">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <h5 class="card-title mb-0"><?php echo e(__("Top Appointment")); ?></h5>
                                </div>
                                <div class="col-3">
                                    <div class="dropdown">
                                        <button class="btn btn-link p-0 font-18 float-right" type="button"
                                            id="widgetRevenue" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false"><i class="feather icon-more-horizontal-"></i></button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="widgetRevenue">
                                            <a class="dropdown-item font-13" href="#"><?php echo e(__("Refresh")); ?></a>
                                            <a class="dropdown-item font-13" href="#"><?php echo e(__("Export")); ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="user-slider">
                            <?php $__currentLoopData = $todayappointment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $todayappointments): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="user-slider">
                                <div class="user-slider-item">
                                    <div class="card-body text-center">
                                        <span class="action-icon badge badge-primary-inverse"><img
                                                src="<?php echo e(Avatar::create($todayappointments->user->name)->toBase64()); ?>"
                                                class="dashboard-imgs" alt=""></span>
                                        <h5><?php echo e($todayappointments->user->name); ?></h5>
                                        <p><?php echo e($todayappointments->user->email); ?></p>
                                        <p><span
                                                class="badge badge-primary-inverse">Service:<?php echo e($todayappointments->service->name); ?></span>
                                        </p>
                                        <div class="button-list mt-4">
                                            <button type="button" class="btn btn-round btn-secondary-rgba"><i
                                                    class="feather icon-phone"></i></button>
                                            <button type="button" class="btn btn-round btn-secondary-rgba"><i
                                                    class="feather icon-mail"></i></button>
                                        </div>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="row">
                                            <div class="col-12">
                                                <h4  class="user-phone-no border-right"><?php echo e(date_format($todayappointments->created_at,'d-m-Y')); ?></h4>
                                                <p class="user-contact-no my-2"><?php echo e(__("Appointment Date")); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <?php if(count($todayreferal)>0): ?>
                <div class="col-lg-6 col-xl-3 col-sm-6">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <h5 class="card-title mb-0"><?php echo e(__("Top Referal User")); ?></h5>
                                </div>
                                <div class="col-3">
                                    <div class="dropdown">
                                        <button class="btn btn-link p-0 font-18 float-right" type="button"
                                            id="widgetRevenue" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false"><i class="feather icon-more-horizontal-"></i></button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="widgetRevenue">
                                            <a class="dropdown-item font-13" href="#"><?php echo e(__("Refresh")); ?></a>
                                            <a class="dropdown-item font-13" href="#"><?php echo e(__("Export")); ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="user-slider">
                            <?php $__currentLoopData = $todayreferal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $todayreferals): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           
                            <div class="user-slider">
                                <div class="user-slider-item">
                                    <div class="card-body text-center">
                                        <span class="action-icon badge badge-primary-inverse"><img
                                                src="<?php echo e(Avatar::create($todayreferals->user->name)->toBase64()); ?>"
                                                class="dashboard-imgs" alt=""></span>
                                        <h5><?php echo e($todayreferals->user->name); ?></h5>
                                        <p><?php echo e($todayreferals->amount); ?></p>
                                        <p><span class="badge badge-primary-inverse"><?php echo e($todayreferals->log); ?></span></p>
                                        <div class="button-list mt-4">
                                            <button type="button" class="btn btn-round btn-secondary-rgba"><i
                                                    class="feather icon-phone"></i></button>
                                            <button type="button" class="btn btn-round btn-secondary-rgba"><i
                                                    class="feather icon-mail"></i></button>
                                        </div>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="row">
                                            <div class="col-12">
                                                <h4 class="user-phone-no border-right"><?php echo e(date_format($todayreferals->created_at,'d-m-Y')); ?>

                                                </h4>
                                                <p class="user-contact-no my-2"><?php echo e(__("Referal Date")); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                
                <?php if(count($userbirthday)>0): ?>
                <div class="col-lg-6 col-xl-3 col-sm-6">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <h5 class="card-title mb-0"><?php echo e(__("Top User Birthday")); ?></h5>
                                </div>
                                <div class="col-3">
                                    <div class="dropdown">
                                        <button class="btn btn-link p-0 font-18 float-right" type="button"
                                            id="widgetRevenue" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false"><i class="feather icon-more-horizontal-"></i></button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="widgetRevenue">
                                            <a class="dropdown-item font-13" href="#"><?php echo e(__("Refresh")); ?></a>
                                            <a class="dropdown-item font-13" href="#"><?php echo e(__("Export")); ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="user-slider">
                            <?php $__currentLoopData = $userbirthday; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userbirthdays): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="user-slider">
                                <div class="user-slider-item">
                                    <div class="card-body text-center">
                                        <span class="action-icon badge badge-primary-inverse"><img
                                                src="<?php echo e(Avatar::create($userbirthdays->name)->toBase64()); ?>"
                                                class="dashboard-imgs" alt=""></span>
                                        <h5><?php echo e($userbirthdays->dob); ?></h5>
                                        <p><?php echo e($userbirthdays->name); ?></p>
                                        <p><span class="badge badge-primary-inverse"><?php echo e($userbirthdays->log); ?></span></p>
                                        <div class="button-list mt-4">
                                            <button type="button" class="btn btn-round btn-secondary-rgba"><i
                                                    class="feather icon-phone"></i></button>
                                            <button type="button" class="btn btn-round btn-secondary-rgba"><i
                                                    class="feather icon-mail"></i></button>
                                        </div>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="row">
                                            <div class="col-12">
                                                <h4 class="user-phone-no border-right"><?php echo e(date_format($userbirthdays->created_at,'d-m-Y')); ?></h4>
                                                <p class="user-contact-no my-2"><?php echo e(__("User Register")); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <div class="col-lg-6 col-xl-3 col-sm-6 d-none">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <h5 class="card-title mb-0"><?php echo e(__("Top Exercise")); ?></h5>
                                </div>
                                <div class="col-3">
                                    <div class="dropdown">
                                        <button class="btn btn-link p-0 font-18 float-right" type="button"
                                            id="widgetRevenue" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false"><i class="feather icon-more-horizontal-"></i></button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="widgetRevenue">
                                            <a class="dropdown-item font-13" href="#"><?php echo e(__("Refresh")); ?></a>
                                            <a class="dropdown-item font-13" href="#"><?php echo e(__("Export")); ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="user-slider">
                            <?php $__currentLoopData = $todayexercise; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $todayexercises): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="user-slider">
                                <div class="user-slider-item">
                                    <div class="card-body text-center">
                                        <span class="action-icon badge badge-primary-inverse"><img
                                                src="<?php echo e(Avatar::create($todayexercises->user->name)->toBase64()); ?>"
                                                class="dashboard-imgs" alt=""></span>
                                        <h5><?php echo e($todayexercises->user->name); ?></h5>
                                        <p><?php echo e($todayexercises->user->email); ?></p>
                                        <p><span
                                                class="badge badge-primary-inverse"><?php echo e($todayexercises->exercise?$todayexercises->exercise->exercise_package:''); ?></span>
                                        </p>
                                        <div class="button-list mt-4">
                                            <button type="button" class="btn btn-round btn-secondary-rgba"><i
                                                    class="feather icon-phone"></i></button>
                                            <button type="button" class="btn btn-round btn-secondary-rgba"><i
                                                    class="feather icon-mail"></i></button>
                                        </div>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="row">
                                            <div class="col-12">
                                                <h4 class="user-phone-no border-right"><?php echo e(date_format($todayexercises->created_at,'d-m-Y')); ?></h4>
                                                <p class="user-contact-no my-2"><?php echo e(__("Exercise Created")); ?></p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3 col-sm-6 d-none">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <h5 class="card-title mb-0"><?php echo e(__("Top Diet")); ?></h5>
                                </div>
                                <div class="col-3">
                                    <div class="dropdown">
                                        <button class="btn btn-link p-0 font-18 float-right" type="button"
                                            id="widgetRevenue" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false"><i class="feather icon-more-horizontal-"></i></button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="widgetRevenue">
                                            <a class="dropdown-item font-13" href="#"><?php echo e(__("Refresh")); ?></a>
                                            <a class="dropdown-item font-13" href="#"><?php echo e(__("Export")); ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="user-slider">
                            <?php $__currentLoopData = $todaydiet; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $todaydiets): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="user-slider">
                                <div class="user-slider-item">
                                    <div class="card-body text-center">
                                        <span class="action-icon badge badge-primary-inverse"><img
                                                src="<?php echo e(Avatar::create($todaydiets->user->name)->toBase64()); ?>"
                                                class="dashboard-imgs" alt=""></span>
                                        <h5><?php echo e($todaydiets->user->name); ?></h5>
                                        <p><?php echo e($todaydiets->user->email); ?></p>
                                        <p><span class="badge badge-primary-inverse"><?php echo e($todaydiets->status); ?></span></p>
                                        <div class="button-list mt-4">
                                            <button type="button" class="btn btn-round btn-secondary-rgba"><i
                                                    class="feather icon-phone"></i></button>
                                            <button type="button" class="btn btn-round btn-secondary-rgba"><i
                                                    class="feather icon-mail"></i></button>
                                        </div>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="row">
                                            <div class="col-12">
                                                <h4 class="user-phone-no border-right"><?php echo e(date_format($todaydiets->created_at,'d-m-Y')); ?></h4>
                                                <p class="user-contact-no my-2"><?php echo e(__("Diet Created")); ?></p>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h5 class="card-title"><?php echo e(__("Users")); ?></h5>
                        </div>
                        <div class="card-body">
                            <div id="apex-column-chart"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h5 class="card-title"><?php echo e(__("Payment Report")); ?></h5>
                        </div>
                        <div class="card-body">
                            <div id="apex-line-chart"></div>
                        </div>
                    </div>
                </div>
                  <div class="col-lg-6">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h5 class="card-title"><?php echo e(__("User Distribution")); ?></h5>
                        </div>
                        <div class="card-body">
                            <div id="apex-circle-chart-custom-angel-chart"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 mb-5">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <h5 class="card-title mb-0"><?php echo e(__("Latest Payment")); ?></h5>
                                </div>
                                <div class="col-3">
                                    <div class="dropdown">
                                        <button class="btn btn-link p-0 font-18 float-right" type="button"
                                            id="upcomingTask" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false"><i class="feather icon-more-horizontal-"></i></button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="upcomingTask">
                                            <a class="dropdown-item font-13" href="#"><?php echo e(__("Refresh")); ?></a>
                                            <a class="dropdown-item font-13" href="#"><?php echo e(__("Export")); ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <tr>
                                        <th><?php echo e(__("Payment Id")); ?></th>
                                        <th><?php echo e(__("Name")); ?></th>
                                        <th><?php echo e(__("Email")); ?></th>
                                        <th><?php echo e(__("Method")); ?></th>
                                        <th><?php echo e(__("Amount")); ?></th>
                                    </tr>
                                    <tbody>
                                        <?php $__currentLoopData = $paymentlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paymentlist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($paymentlist->payment_id); ?></td>
                                            <td><?php echo e($paymentlist->name); ?></td>
                                            <td><?php echo e($paymentlist->email); ?></td>
                                            <td><?php echo e($paymentlist->payment_method); ?></td>
                                            <td><?php echo e($paymentlist->amount); ?></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('dashboard.users')): ?>
    <div class="row">
        <div class="col-lg-6 col-xl-3 col-sm-6">
            <div class="card m-b-30  shadow-sm">

                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-7">
                            <h2><?php echo e($refer); ?></h2>
                            <p><?php echo e(__("Total referal user")); ?></p>
                        </div>
                        <div class="col-5 text-right">
                            <a href="<?php echo e(route('users.index')); ?>"><i
                                    class="text-success feather icon-user-check icondashboard"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-lg-6 col-xl-3 col-sm-6">
            <div class="card m-b-30 shadow-sm">

                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-7">
                            <h2><?php echo e($packageplan); ?></h2>
                            <p><?php echo e(__("Purchased Plan")); ?></p>
                        </div>
                        <div class="col-5 text-right">
                            <a href="<?php echo e(route('users.index')); ?>"><i
                                    class="text-info feather icon-shopping-bag icondashboard"></i></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-12 mb-5">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title"><?php echo e(__("Referal Report")); ?></h5>
                </div>
                <div class="card-body">
                    <div id="apex-area-chart"></div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('dashboard.trainer')): ?>
    <div class="row">
        <div class="col-lg-6 col-xl-3 col-sm-6">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h2><?php echo e($trainers); ?></h2>
                            <p class="font-14 mb-0"><?php echo e(__("User")); ?></p>
                        </div>
                        <div class="col-6 text-right">
                            <div><a href="<?php echo e(route('users.index')); ?>"><i
                                        class="feather icon-user-check icondashboard"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('dashboard.other')): ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card-body">
                <div class="card bg-primary-rgba m-b-30">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h5 class="card-title text-primary mb-1"><?php echo e($day); ?>, <?php echo e(Auth::user()->name); ?></h5>
                                <p class="mb-0 text-primary font-14"><?php echo e($quote); ?></p>
                            </div>
                            <div class="col-4 text-right">
                                <img src="assets/images/general/sun.svg" class="img-fluid sun-img" alt="sun">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php $__env->stopSection(); ?>
    <!-- End Contentbar -->
    <?php $__env->startSection('script'); ?>
    <script>
        var user = <?php echo json_encode($usercard, 15, 512) ?>;
        var blog = <?php echo json_encode($blogcard, 15, 512) ?>;
        var userscount = <?php echo json_encode($userscount, 15, 512) ?>;
        var admincharts = <?php echo json_encode($admincharts, 15, 512) ?>;
        var purchased = <?php echo json_encode($purchased, 15, 512) ?>;
        var purchasecard = <?php echo json_encode($purchasecard, 15, 512) ?>;
        var faqcard = <?php echo json_encode($faqcard, 15, 512) ?>;
        var quotationcard = <?php echo json_encode($quotationcard, 15, 512) ?>;
        var referalusercard = <?php echo json_encode($referalusercard, 15, 512) ?>;
        var appointmentcard = <?php echo json_encode($appointmentcard, 15, 512) ?>;
        var enquirycard = <?php echo json_encode($enquirycard, 15, 512) ?>;
        var referallist = <?php echo json_encode($referallist, 15, 512) ?>;
    </script>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\GYM\gym_new\resources\views/admin/dashboard/index.blade.php ENDPATH**/ ?>