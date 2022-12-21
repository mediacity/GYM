
<?php $__env->startSection('title', __('Show Appointment')); ?>
<?php $__env->startSection('maincontent'); ?>
<!-- Start Breadcrumbbar -->                    
<?php $__env->startComponent('components.breadcumb',['thirdactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
<?php echo e(__('Appointment')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Admin')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu2'); ?>
<?php echo e(__('Appointment Details')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('button'); ?>
<div class="col-md-6 col-lg-6 text-right">
    <a href="<?php echo e(route('appointment.index')); ?>" class="btn btn-primary-rgba mr-2"><i
            class="feather icon-arrow-left mr-2"></i><?php echo e(__('Back')); ?></a>
</div>
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<!-- End Breadcrumbbar -->
<form autocomplete="off" class="form-light" action="<?php echo e(route('appointment.show' , $appointment->id)); ?>" method="POST">
    <div class="card m-b-30">
        <div class="card-body py-5">
            <div class="row">
                <div class="col-lg-3 text-center">
                    <input name="photo" type="file" id="imgupload" class="d-none" />
                    <?php if($image = @file_get_contents('../public/media/users/'.$appointment->user['photo'])): ?>
                    <img <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        src="<?php echo e(url('media/users/'.$appointment->user['photo'])); ?>" alt="profilephoto"
                        class="profilechoose img-thumbnail rounded img-fluid">
                    <?php else: ?>
                    <img <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        src="<?php echo e(Avatar::create($appointment->user['name'])->toBase64()); ?>" alt="profilephoto"
                        class="profilechoose img-thumbnail rounded img-fluid">
                    <?php endif; ?>
                </div>
                <div class="col-lg-9">
                    <h4><?php echo e(ucfirst($appointment->user['name'])); ?></h4>
                    <div class="button-list mt-4 mb-3">
                        <a href="mailto:<?php echo e($appointment->user['email']); ?>" role="button" class="btn btn-primary-rgba"><i
                                class="feather icon-mail mr-2"></i><?php echo e(ucfirst($appointment->user['email'])); ?></a>
                        <button type="button" class="btn btn-success-rgba"><i class="feather icon-phone mr-2"></i><a
                                href="tel:($appointment->user['mobile'])"><?php echo e(ucfirst($appointment->user['mobile'])); ?></a></button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr>
                                    <th scope="row" class="p-1"><?php echo e(__("Service Name :")); ?></th>
                                    <td class="p-1"> <span class="badge badge-primary show-heading"
                                            ><?php echo e($appointment->service['name']); ?></span></td>
                                </tr>
                                <tr>
                                    <th scope="row" class="p-1"><?php echo e(__("Appointment Details :")); ?></th>
                                    <td class="p-1">
                                        <p class="show-heading"><?php echo e(str_limit($appointment->detail , 60)); ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row" class="p-1"><?php echo e(__("Comments :")); ?></th>
                                    <td class="p-1"> <?php if($appointment->comment): ?>
                                        <span class="badge badge-success show-heading">
                                            <?php echo e($appointment->comment); ?>

                                        </span>
                                        <?php else: ?>
                                        <?php echo e(__("Not set")); ?>

                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row" class="p-1"><?php echo e(__("Appointment Date :")); ?></th>
                                    <td class="p-1">
                                        <p class="text-dark show-heading"><?php echo e(__("From:")); ?><br>
                                            <p class="text-dark show-heading"><?php echo e($appointment->from); ?>

                                            </p>
                                        </p>
                                    </td>
                                    <td class="p-1">
                                        <div>
                                            <p class="text-dark show-heading-two">
                                               <?php echo e(__(" To:")); ?><br><?php echo e($appointment->to); ?>

                                            </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="show-btn">
                                            <?php echo Form::open(['method' => 'POST', 'route' => ['appointment.status',
                                            $appointment->id]]); ?>

                                            <div
                                                class="form-group custom-switch<?php echo e($errors->has('status') ? ' has-error' : ''); ?>">
                                                <?php echo Form::checkbox('status', 1, $appointment->status == 1 ? 1 : 0, ['id'
                                                =>
                                                'switch'.$appointment->id, 'class'
                                                => 'tgl
                                                8 tgl-skewed' , 'onChange'=>"this.form.submit()"]); ?>

                                                <label class="tgl-btn" data-tg-off="Reject" data-tg-on="Accept"
                                                    for="switch<?php echo e($appointment->id); ?>"></label>
                                            </div>
                                            <?php echo Form::close(); ?>

                                        </div>
                    </div>
                    <!-- Start Modal -->
                    <div id="deleteModal<?php echo e($appointment->id); ?>" class="delete-modal modal fade" role="dialog">
                        <div class="modal-dialog modal-sm">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <div class="delete-icon"></div>
                                </div>
                                <div class="modal-body text-center">
                                    <h4 class="modal-heading"><?php echo e(__("Are You Sure ?")); ?></h4>
                                    <p><?php echo e(__("Do you really want to delete these records? This process cannot
                                        be undone.")); ?></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="reset" class="btn btn-dark" data-dismiss="modal"><?php echo e(__("No")); ?></button>
                                    <?php echo Form::open(['method' => 'DELETE', 'route' =>
                                    ['appointment.destroy',
                                    $appointment->id]]); ?>

                                    <button type="submit" class="btn btn-danger"><?php echo e(__("Yes")); ?></button>
                                    <?php echo Form::close(); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal -->
                </td>
                    </tr>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<link type="text/css" rel="stylesheet" href="https://mediacity.co.in/emart/demo/public/css/vendor/toggle.css">
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\GYM\resources\views/admin/appointment/show.blade.php ENDPATH**/ ?>