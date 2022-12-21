
<?php $__env->startSection('title',__('Mail Settings')); ?>
<!-- Start Breadcrumbbar -->
<?php $__env->startSection('breadcum'); ?>
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title"><?php echo e(__("Mail Settings")); ?></h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>"><?php echo e(__('Home')); ?></a></li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard.index')); ?>"><?php echo e(__('Dashboard')); ?></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <?php echo e(__('Mail Settings')); ?>

                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title"><?php echo e(__('Mail Settings')); ?></h5>
            </div>

            <div class="card-body">
                  <form class="form" action="<?php echo e(route('mail.setting.save')); ?>" method="POST" novalidate
                    enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="text-dark"><?php echo e(__('Sender Name:')); ?> <small
                                        class="text-muted text-info">(<b><?php echo e(__("eg.")); ?></b><?php echo e(__(" John Doe)")); ?></small></label>
                                <input name="MAIL_FROM_NAME" autofocus="" type="text" class="form-control"
                                    placeholder="<?php echo e(__("enter sender name")); ?>" required="" value="<?php echo e(env('MAIL_FROM_NAME')); ?>">
                                <div class="invalid-feedback">
                                    <?php echo e(__('Please sender name !')); ?>.
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="text-dark"><?php echo e(__('Sender Address:')); ?> <small
                                        class="text-muted text-info">(<b><?php echo e(__("eg.")); ?></b>
                                        <?php echo e(__("info@example.com)")); ?></small></label>
                                <input name="MAIL_FROM_ADDRESS" autofocus="" type="text" class="form-control"
                                    placeholder="<?php echo e(__("enter your mail address")); ?>" value="<?php echo e(env('MAIL_FROM_ADDRESS')); ?>">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="text-dark"><?php echo e(__('Mail Host:')); ?> <small
                                        class="text-muted text-info">(<b><?php echo e(__("eg.")); ?></b>
                                        <?php echo e(__(" smtp.gmail.com)")); ?></small></label>
                                <input placeholder="<?php echo e(__("enter mail host")); ?>" class="form-control" type="text" name="MAIL_HOST"
                                    value="<?php echo e(env('MAIL_HOST')); ?>">
                                <div class="invalid-feedback">
                                    <?php echo e(__('Please mail host !')); ?>.
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="text-dark"><?php echo e(__('Mail Driver:')); ?> <small
                                        class="text-muted text-info">(<b><?php echo e(__("eg.")); ?></b>
                                        <?php echo e(__("  smtp,sendmail,mail)")); ?></small></label>
                                <input placeholder="<?php echo e(__("enter mail driver")); ?>" class="form-control" type="text" name="MAIL_DRIVER"
                                    value="<?php echo e(env('MAIL_DRIVER')); ?>">
                                <div class="invalid-feedback">
                                    <?php echo e(__('Please mail driver !')); ?>.
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="text-dark"><?php echo e(__('Mail Username:')); ?></label>
                                <input placeholder="<?php echo e(__("enter mail username")); ?>" class="form-control" type="text" name="MAIL_USERNAME"
                                    value="<?php echo e(env('MAIL_USERNAME')); ?>">
                                <div class="invalid-feedback">
                                    <?php echo e(__('Please mail username !')); ?>.
                                </div>
                            </div>
                        </div>                        
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="text-dark"><?php echo e(__('Mail Encryption:')); ?> <small
                                        class="text-muted text-info"><?php echo e(__("(")); ?><b><?php echo e(__("eg.")); ?></b>
                                        <?php echo e(__("TLS,SSL or NULL)")); ?></small></label>
                                <input placeholder="<?php echo e(__("enter mail encryption")); ?>" class="form-control" type="text"
                                    name="MAIL_ENCRYPTION" value="<?php echo e(env('MAIL_ENCRYPTION')); ?>">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="text-dark"><?php echo e(__('Mail Password:')); ?></label>
                                <input placeholder="<?php echo e(__("enter mail password")); ?>" class="form-control" type="text" name="MAIL_PASSWORD"
                                    value="<?php echo e(env('MAIL_PASSWORD')); ?>">
                                <div class="invalid-feedback">
                                    <?php echo e(__('Please mail mail password !')); ?>.
                                </div>
                                <small class="text-primary text-muted text-info"><?php echo e(__("(")); ?><b><?php echo e(__("Note.")); ?></b> <?php echo e(__("IF gmail is using as mail provider mustenable ")); ?><b><a class="underline" href="https://www.google.com/landing/2step/"><?php echo e(__("2 StepVerification")); ?></a></b> <?php echo e(__("and Than")); ?>

                                    <b><?php echo e(__("Create a app password")); ?></b> <?php echo e(__("which will use here.)")); ?></small>
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
</div>
<br>
<?php $__env->stopSection(); ?>
<!-- End Contentbar -->

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\GYM\resources\views/admin/settings/mailsetting.blade.php ENDPATH**/ ?>