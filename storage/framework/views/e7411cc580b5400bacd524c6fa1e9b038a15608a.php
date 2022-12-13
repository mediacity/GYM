<div class="leftbar">
    <!-- Start Sidebar -->
    <div class="sidebar">
        <!-- Start Navigationbar -->
        <div class="vertical-menu-detail">
            <div class="logobar">
                <a href="<?php echo e(url('/')); ?>" class="logo logo-large">
                    <img src="<?php echo e(url('media/logo/'.$setting->site_logo)); ?>"
                        class="img-fluid" alt="logo">
                </a>
            </div>
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade active show" id="v-pills-dashboard" role="tabpanel"
                    aria-labelledby="v-pills-dashboard">
                    <!-- DAshboard -->
                    <ul class="vertical-menu">
                        
                        <li class="<?php echo e(Nav::isRoute('admin.dashboard.index')); ?> vertical-active">
                            <a class="nav-link" href="<?php echo e(route('admin.dashboard.index')); ?>">
                                <i class="fa fa-columns"></i>
                                <span><?php echo e(__('Dashboard')); ?></span>
                            </a>
                        </li>
                        <!--Enquiry-->
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('enquiry.view')): ?>
                        <li class="<?php echo e(Nav::isResource('enquiry')); ?> vertical-active">
                            <a class="<?php echo e(Nav::isResource('enquiry')); ?>" href="<?php echo e(route('enquiry.index')); ?>">
                                <i class="feather icon-phone-call

                                    "></i>
                                <span><?php echo e(__('Enquiry')); ?></span>
                            </a>
                        </li>
                        <?php endif; ?>
                         <!-- Users -->
                          <li class="<?php echo e(Nav::isResource('users')); ?> <?php echo e(Nav::isResource('roles')); ?>">
                            <a href="javaScript:void();">
                                <i class="feather icon-user-check"></i><span><?php echo e(__('Users')); ?></span><i
                                    class="feather icon-chevron-right"></i>
                            </a>
                            <ul class="vertical-submenu">
                                 <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('users.view')): ?>
                                <li>
                                    <a class="<?php echo e(Nav::isResource('users')); ?>"
                                        href="<?php echo e(route('users.index')); ?>"><?php echo e(__('All users')); ?></a>
                                </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('roles.view')): ?>
                                <li>
                                    <a class="<?php echo e(Nav::isResource('roles')); ?>"
                                        href="<?php echo e(route('roles.index')); ?>"><?php echo e(__('Roles & Permissions')); ?></a>
                                </li>
                                <?php endif; ?>
                                <li>
                                    <a class="nav-link" href="<?php echo e(route('user.affiliate.settings')); ?>">

                                        <?php echo e(__('Referal Link')); ?>

                                    </a>
                                </li>
                                <li>
                                    <a class="<?php echo e(Nav::isResource('quotation')); ?>" href="<?php echo e(route('quotation.index')); ?>">

                                        <?php echo e(__('Quotation')); ?>

                                    </a>
                                </li>

                            </ul>
                        </li>
                        <!-- Gym Management -->
                        <li
                            class="<?php echo e(Nav::isResource('exercise')); ?> <?php echo e(Nav::isResource('measurement')); ?>  <?php echo e(Nav::isResource('locker')); ?>  ">
                            <a href="javaScript:void();">
                                <i class="feather icon-voicemail"></i><span><?php echo e(__('Gym Management')); ?></span><i
                                    class="feather icon-chevron-right"></i>
                                 </a>
                            <ul class="vertical-submenu">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('exercise.view')): ?>
                                 <li>
                                    <a class="<?php echo e(Nav::isResource('exercise')); ?>" href="<?php echo e(route('exercise.index')); ?>">
                                        <?php echo e(__('Exercise Package')); ?>

                                    </a>
                                </li>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('exercise.add')): ?>
                                <li class="<?php echo e(Nav::isResource('exercisename')); ?> <?php echo e(Nav::isResource('type')); ?>">
                                    <a href="javaScript:void();">
                                        <span><?php echo e(__('Exercisename')); ?></span>
                                        <i class="feather icon-chevron-right"></i>
                                    </a>
                                    <ul class="vertical-submenu">
                                          <li>
                                            <a class="<?php echo e(Nav::isResource('exercisename')); ?>"
                                                href="<?php echo e(route('exercisename.index')); ?>"><?php echo e(__('Exercisename ')); ?></a>
                                        </li>
                                         <li>
                                            <a class="<?php echo e(Nav::isResource('type')); ?>"
                                                href="<?php echo e(route('type.index')); ?>"><?php echo e(__('Type')); ?></a>
                                        </li>
                                    </ul>
                                </li>
                                <?php endif; ?>
                                <!-- Measurements -->
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('measurements.view')): ?>
                                <li>
                                    <a class="<?php echo e(Nav::isResource('measurement')); ?>"
                                        href="<?php echo e(route('measurement.index')); ?>">
                                        <?php echo e(__('Measurements')); ?>

                                    </a>
                                </li>
                                <?php endif; ?>
                                <li class="<?php echo e(Nav::isResource('packages')); ?> <?php echo e(Nav::isResource('fees')); ?>">
                                    <a href="javaScript:void();">
                                        </i><span><?php echo e(__('Package & Plans')); ?></span>
                                        <i class="feather icon-chevron-right"></i>
                                    </a>
                                    <ul class="vertical-submenu">
                                         <!--Packages-->
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('packages.view')): ?>
                                        <li>
                                            <a class="<?php echo e(Nav::isResource('packages')); ?>"
                                                href="<?php echo e(route('packages.index')); ?>">
                                                <?php echo e(__('Packages')); ?>

                                            </a>
                                        </li>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('fees.view')): ?>
                                        <li>
                                            <a class="<?php echo e(Nav::isResource('fees')); ?>" href="<?php echo e(route('fees.index')); ?>">
                                                <?php echo e(__('Fees')); ?>

                                            </a>
                                        </li>
                                        <?php endif; ?>
                                    </ul>
                                </li>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('supplement.view')): ?>
                                <li>
                                    <a class="<?php echo e(Nav::isResource('admin/supplement')); ?>"
                                        href="<?php echo e(route('supplement.index')); ?>">

                                        <?php echo e(__('Supplement')); ?>

                                    </a>
                                </li>
                                <?php endif; ?>
                                <li class="<?php echo e(Nav::isResource('diet_session')); ?> <?php echo e(Nav::isResource('diet_content')); ?>">
                                    <a href="javaScript:void();">
                                        <span><?php echo e(__('Diet Management')); ?></span><i
                                            class="feather icon-chevron-right"></i>
                                        </a>
                                    <ul class="vertical-submenu">
                                         <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('diet.view')): ?>
                                        <li>
                                            <a class="<?php echo e(Nav::isResource('diet')); ?>"
                                                href="<?php echo e(route('diet.index')); ?>"><?php echo e(__('Diet Package')); ?></a>
                                        </li>
                                        <?php endif; ?>
                                         <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('diet_session.view')): ?>
                                        <li>
                                            <a class="<?php echo e(Nav::isResource('diet_session')); ?>"
                                                href="<?php echo e(route('dietid.index')); ?>"><?php echo e(__('Diet session')); ?></a>
                                        </li>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('diet_content.view')): ?>
                                        <li>
                                            <a class="<?php echo e(Nav::isResource('diet_content')); ?>"
                                                href="<?php echo e(route('dietcontent.index')); ?>"><?php echo e(__('Diet content')); ?></a>
                                        </li>
                                         <?php endif; ?>
                                         </ul>
                                        </li>
                                     </ul>
                        </li>
                        <!--Trainerpackages-->
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('trainerpackages.view')): ?>
                        <li>
                            <a class="<?php echo e(Nav::isResource('trainerpackages')); ?>"
                                href="<?php echo e(route('trainerpackages.index')); ?>">
                                <i class="feather icon-message-square"></i>
                                <span><?php echo e(__('Trainerpackages')); ?></span>
                            </a>

                        </li>
                        <?php endif; ?>
                        <li class="<?php echo e(Nav::isResource('trainer')); ?> <?php echo e(Nav::isResource('trainerlist')); ?>">
                            <a href="javaScript:void();">
                                <i class="feather icon-user-plus"></i><span><?php echo e(__('Trainer')); ?></span><i
                                    class="feather icon-chevron-right"></i>

                            </a>
                            <ul class="vertical-submenu">
                                 <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('trainer_list.view')): ?>
                                <li>
                                    <a class="<?php echo e(Nav::isResource('trainerlist')); ?>"
                                        href="<?php echo e(route('trainerlist.index')); ?>"><?php echo e(__('Trainer List')); ?></a>
                                </li>
                                <?php endif; ?>
                                 <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('trainer.view')): ?>
                                <li>
                                    <a class="<?php echo e(Nav::isResource('trainer')); ?>"
                                        href="<?php echo e(route('trainer.index')); ?>"><?php echo e(__('Trainer ')); ?></a>
                                </li>
                                <?php endif; ?>
                                <li class="<?php echo e(Nav::isResource('attendance')); ?>">
                                    <a href="javaScript:void();">
                                        <span><?php echo e(__('Attendance')); ?></span><i class="feather icon-chevron-right"></i>

                                    </a>
                                    <ul class="vertical-submenu">
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('member_attendance.view')): ?>
                                        <li>
                                            <a class="<?php echo e(Nav::isResource('attendance')); ?>"
                                                href="<?php echo e(route('memberattendance.index')); ?>"><?php echo e(__('Member Attendance')); ?></a>
                                        </li>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('staff_attendance.view')): ?>
                                        <li>
                                            <a class="<?php echo e(Nav::isResource('attendance')); ?>"
                                                href="<?php echo e(route('staffattendance.index')); ?>"><?php echo e(__('Staff Attendance')); ?></a>
                                        </li>
                                        <?php endif; ?>
                                    </ul>
                                    <li
                                    class="<?php echo e(Nav::isResource('appointment')); ?> <?php echo e(Nav::isResource('appointmentsetting')); ?>">
                                    <a href="javaScript:void();">
                                        </i><span><?php echo e(__('Appointment')); ?></span>
                                        <i class="feather icon-chevron-right"></i>
                                    </a>
                                    <ul class="vertical-submenu">
                                        <li>
                                            <a class="<?php echo e(Nav::isResource('appointment')); ?>"
                                                href="<?php echo e(route('appointment.index')); ?>"><?php echo e(__('Appointment ')); ?></a>
                                        </li>
                                        <li>
                                            <a class="<?php echo e(Nav::isResource('appointmentsetting')); ?>"
                                                href="<?php echo e(route('appointmentsetting.index')); ?>"><?php echo e(__('Appointment setting')); ?></a>
                                        </li>
                                        <li>
                                            <a class="<?php echo e(Nav::isResource('service')); ?>"
                                                href="<?php echo e(route('service.index')); ?>">
                                                <?php echo e(__('Service')); ?>

                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="<?php echo e(Nav::isResource('todo')); ?> <?php echo e(Nav::isResource('group')); ?>">
                                    <a href="javaScript:void();">
                                        <span><?php echo e(__('Todo')); ?></span>
                                        <i class="feather icon-chevron-right"></i>
                                    </a>
                                    <ul class="vertical-submenu">
                                        <li>
                                            <a class="<?php echo e(Nav::isResource('todo')); ?>"
                                                href="<?php echo e(route('todo.index')); ?>"><?php echo e(__('Todo ')); ?></a>
                                        </li>
                                        <li>
                                            <a class="<?php echo e(Nav::isResource('group')); ?>"
                                                href="<?php echo e(route('group.index')); ?>"><?php echo e(__('Group')); ?></a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                         <li>
                            <a href="javaScript:void();">
                                <i class="feather icon-file"></i><span><?php echo e(__('Reports')); ?></span><i
                                    class="feather icon-chevron-right"></i></a>
                            <ul class="vertical-submenu">
                                <li>
                                    <a href="<?php echo e(route('history')); ?>"><?php echo e(__('Payment Report ')); ?></a>
                                </li>
                                 <li>
                                    <a href="<?php echo e(route('reports')); ?>"><?php echo e(__('Referal Report ')); ?></a>
                                </li>
                                 <li>
                                    <a href="<?php echo e(route('demo')); ?>"><?php echo e(__('Demo Report ')); ?></a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('join')); ?>"><?php echo e(__('Join Report ')); ?></a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('device.logs')); ?>"><?php echo e(__('Device History ')); ?></a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('user.image')); ?>"><?php echo e(__('Download Image ')); ?></a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo e(url('clear-cache')); ?>">
                                <i class="feather icon-loader"></i> <span><?php echo e(__('Clear Cache')); ?></span>
                            </a>
                        </li>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ptsubscription.view')): ?>
                        <li>
                            <a href="<?php echo e(route('ptsubscription.index')); ?>">
                                <i class="feather icon-file-plus"></i> <span><?php echo e(__('PT Subscription')); ?></span>
                            </a>
                        </li>
                        <?php endif; ?>
                        <!--Setting-->
                        <li>
                            <a href="javaScript:void();">
                                <i class="feather icon-settings"></i><span><?php echo e(__('Settings')); ?></span><i
                                    class="feather icon-chevron-right"></i>
                                </a>
                            <ul class="vertical-submenu">
                                 <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('settings.update')): ?>
                                 <li>
                                    <a href="<?php echo e(route('site.settings')); ?>"><?php echo e(__('Site Settings')); ?></a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('mail.setting')); ?>"><?php echo e(__('Mail Settings')); ?></a>
                                </li>
                                <li>
                                    <a class="<?php echo e(Nav::isResource('settings/razorpay')); ?>"
                                        href="<?php echo e(route('payment.settings')); ?>"><?php echo e(__('Payment Settings')); ?></a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('admin.push.noti.settings')); ?>"><?php echo e(__('Onesignal Settings')); ?></a>
                                </li>
                                <?php endif; ?>
                                 <li>
                                    <a class="<?php echo e(Nav::isResource('settings/invoice')); ?>"
                                        href="<?php echo e(route('invoice.settings')); ?>"><?php echo e(__('Invoice Settings')); ?></a>
                                </li>
                                <li>
                                    <a class="nav-link" href="<?php echo e(route('save.affilates')); ?>">

                                        <?php echo e(__('Affilates')); ?>

                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link" href="<?php echo e(route('multicurrency.index')); ?>">

                                        <?php echo e(__('MultiCurrency')); ?>

                                    </a>
                                </li>
                                <!-- Manual Payment settings-->
                                <li>
                                    <a class="nav-link" href="<?php echo e(route('manual.payment.gateway')); ?>">

                                        <?php echo e(__('Manual Payment')); ?>

                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo e(route('pwa.setting.index')); ?>"><?php echo e(__('PWA Settings')); ?></a>
                                </li>
                            </ul>
                        </li>
                        <li class="<?php echo e(Nav::isResource('pages')); ?> <?php echo e(Nav::isResource('faq')); ?> <?php echo e(Nav::isResource('slider')); ?>

                            <?php echo e(Nav::isResource('blogs')); ?>">
                            <a href="#">
                                <i class="feather icon-settings"></i><span><?php echo e(__('Front Settings')); ?></span>
                                <i class="feather icon-chevron-right"></i>
                            </a>
                            <ul class="vertical-submenu">
                                <!----Sliders ------>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('slider.view')): ?>
                                <li>
                                    <a class="<?php echo e(Nav::isResource('slider')); ?>" href="<?php echo e(route('slider.index')); ?>">
                                        <?php echo e(__('Slider')); ?>

                                    </a>
                                </li>
                                <?php endif; ?>
                                <!--FAQ-->
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('faq.view')): ?>
                                <li>
                                    <a class="<?php echo e(Nav::isResource('faq')); ?>" href="<?php echo e(route('faq.index')); ?>">
                                        <?php echo e(__('Faq')); ?>

                                    </a>
                                </li>
                                <?php endif; ?>
                                <!--Pages-->
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('pages.view')): ?>
                                <li>
                                    <a class="<?php echo e(Nav::isResource('pages')); ?>" href="<?php echo e(route('pages.index')); ?>">
                                        <?php echo e(__('Pages')); ?>

                                    </a>
                                </li>
                                <?php endif; ?>
                                <!-- Blogs -->
                                <li>
                                    <a class="<?php echo e(Nav::isResource('blog')); ?> <?php echo e(Nav::isResource('blogcategory')); ?>"
                                        href="#">
                                        <?php echo e(__('Blogs')); ?><i class="feather icon-chevron-right"></i>
                                    </a>
                                    <ul class="vertical-submenu">
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('blogs.view')): ?>
                                        <li>
                                            <a class="<?php echo e(Nav::isResource('blog')); ?>"
                                                href="<?php echo e(route('blog.index')); ?>"><?php echo e(__('Blog')); ?></a>
                                        </li>
                                        <?php endif; ?>
                                         <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('blogs.view')): ?>
                                        <li>
                                            <a class="<?php echo e(Nav::isResource('blogcategory')); ?>"
                                                href="<?php echo e(route('blogcategory.index')); ?>"><?php echo e(__('Blog Category')); ?></a>
                                        </li>
                                        <?php endif; ?>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
    <!-- End Navigationbar -->
</div>
<!-- End Sidebar -->
<?php /**PATH C:\laragon\www\gym_new\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>