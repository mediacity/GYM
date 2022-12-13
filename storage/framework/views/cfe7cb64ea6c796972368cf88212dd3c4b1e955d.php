 <!-- Start Topbar Mobile -->
 <div class="topbar-mobile">
     <div class="row align-items-center">
         <div class="col-md-12">
             <div class="mobile-logobar">
                 <a href="<?php echo e(url('/')); ?>" class="mobile-logo"><img src="<?php echo e(url('/media/logo/'.$setting->site_logo)); ?>"
                         class="img-fluid" alt="logo"></a>
             </div>
             <div class="mobile-togglebar">
                 <ul class="list-inline mb-0">
                     <li class="list-inline-item">
                         <div class="topbar-toggle-icon">
                             <a class="topbar-toggle-hamburger" href="javascript:void();">
                                 <img src="<?php echo e(url('assets/images/svg-icon/horizontal.svg')); ?>"
                                     class="img-fluid menu-hamburger-horizontal" alt="horizontal">
                                 <img src="<?php echo e(url('assets/images/svg-icon/verticle.svg')); ?>"
                                     class="img-fluid menu-hamburger-vertical" alt="verticle">
                             </a>
                         </div>
                     </li>
                     <li class="list-inline-item">
                         <div class="menubar">
                             <a class="menu-hamburger" href="javascript:void();">
                                 <img src="<?php echo e(url('assets/images/svg-icon/menu.svg')); ?>"
                                     class="img-fluid menu-hamburger-collapse" alt="collapse">
                                 <img src="<?php echo e(url('assets/images/svg-icon/close.svg')); ?>"
                                     class="img-fluid menu-hamburger-close" alt="close">
                             </a>
                         </div>
                     </li>
                 </ul>
             </div>
         </div>
     </div>
 </div>
 <!-- Start Topbar -->
<div class="topbar">
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-6">
            <!-- <div class="togglebar">
                <ul class="list-inline mb-0">

                    <li class="list-inline-item">
                        <div class="menubar">
                            <a class="menu-hamburger" href="javascript:void();">
                                <img src="<?php echo e(url('assets/images/svg-icon/menu.svg')); ?>"
                                     class="img-fluid menu-hamburger-collapse" alt="menu">
                                <img src="<?php echo e(url('assets/images/svg-icon/close.svg')); ?>"
                                     class="img-fluid menu-hamburger-close" alt="close">
                            </a>
                        </div>
                    </li>
                </ul>
            </div> -->
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="infobar">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item mr-5 align-self-center">
                        <i class="fa fa-clock-o mr-1"></i> <?php echo e(__(' Your Time is')); ?> <span class="text-primary" id="timeyours"></span>
                    </li>
                    <?php $languages = app('JoeDixon\Translation\Language'); ?>
                   
                    <li class="list-inline-item">
                        <div class="languagebar">
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" id="languagelink"
                                     data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span
                                         class="live-icon"><?php echo e(ucfirst(session()->get('changed_language')) ?? ucfirst(app()->getLocale())); ?></span><span
                                         class="feather icon-chevron-down live-icon"></span></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="languagelink"
                                     x-placement="bottom-end">
                                     
                                    <?php $__currentLoopData = $languages->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a class="dropdown-item" href="<?php echo e(route('languageSwitch',$language->language)); ?>">
                                        <i class="feather icon-globe"></i>
                                        <?php echo e($language->name); ?> (<?php echo e($language->language); ?>)</a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-inline-item">
                        <div class="notifybar">
                            <div class="dropdown">
                                <a class="dropdown-toggle infobar-icon" href="#" role="button" id="notoficationlink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="<?php echo e(url('assets/images/svg-icon/notifications.svg')); ?>" class="img-fluid" alt="notifications">
                                    <span class="live-icon"><?php echo e(auth()->user()->unreadNotifications()->count()); ?></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="notoficationlink">
                                    <div class="notification-dropdown-title">
                                        <h4><?php echo e(__('Notifications')); ?></h4>
                                    </div>
                                    <ul class="list-unstyled">
                                        <li class="media dropdown-item">
                                            <span class="mr-3 action-icon badge badge-warning-inverse"></span>
                                            <div class="media-body">
                                                <?php $__currentLoopData = auth()->user()->unreadNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <h5 class="action-title"><?php echo e(($notification->data['id'])); ?>

                                                     <?php echo e(($notification->data['data'])); ?> </h5>
                                                <p><span
                                                         class="timing"><?php echo e(($notification->created_at->format('d-m-Y'))); ?></span>
                                                </p>
                                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </li>
                                    </ul>
                                    <?php if(isset($notification)): ?>
                                    <a class="color111 float-right"
                                         href="<?php echo e(route('markAsRead')); ?>"><?php echo e(__('MarkallasRead')); ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-inline-item">
                        <div class="profilebar">
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="<?php echo e(route('profile.index')); ?>" role="button" id="profilelink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="<?php echo e(url('assets/images/users/profile.svg')); ?>" class="img-fluid" alt="profile">
                                    <span class="live-icon"><?php echo e(Auth::user()->name); ?></span>
                                    <span class="feather icon-chevron-down live-icon"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profilelink">
                                    <div class="dropdown-item">
                                        <div class="profilename">
                                            <h5><?php echo e(Auth::user()->name); ?></h5>
                                        </div>
                                    </div>
                                    <div class="userbox">
                                        <ul class="list-unstyled mb-0">
                                            <li class="media dropdown-item">
                                                <a href="<?php echo e(route('profile.index')); ?>" class="profile-icon">
                                                    <img src="<?php echo e(url('assets/images/svg-icon/crm.svg')); ?>" class="img-fluid" alt="user"><?php echo e(__('My Profile')); ?>

                                                </a>
                                            </li>
                                            <li class="media dropdown-item">
                                                <a href="<?php echo e(route('logout')); ?>" class="profile-icon" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    <img src="<?php echo e(url('assets/images/svg-icon/logout.svg')); ?>" class="img-fluid" alt="logout"><?php echo e(__('Logout')); ?>

                                                </a>
                                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                                     <?php echo csrf_field(); ?>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- End col -->
    </div>
    <!-- End row -->
 </div>
 <!-- End Topbar -->
 <!-- Start Breadcrumbbar -->
 <?php echo $__env->yieldContent('breadcum'); ?>
 <!-- End Breadcrumbbar -->
 <?php echo $__env->yieldContent('scripts'); ?>
 <script type="text/JavaScript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script>
      $( document ).ready(function() {
        
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    
    // m = checkTime(m);
    // s = checkTime(s);
   
    var date = today.getDate() + '/' + (today.getMonth() + 1) + '/' + today.getFullYear();
    
    var n = today.toLocaleString([], {
      hour: '2-digit',
      minute: '2-digit',
      second: '2-digit'
    });
    
    document.getElementById('timeyours').innerHTML = date + ' | ' + n;
    var t = setTimeout(startTime, 1000);
  });
</script><?php /**PATH C:\xampp\htdocs\GYM\gym_new\resources\views/layouts/topbar.blade.php ENDPATH**/ ?>