
<?php $__env->startSection('title',__('All Payment')); ?>
<?php $__env->startSection('breadcum'); ?>
	<div class="breadcrumbbar breadcrumbbar-one">
        <div class="row align-items-center">
            <div class="col-md-5 col-lg-8">
                <h4 class="page-title"><?php echo e(__("Manual Payment")); ?></h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard.index')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                        	<?php echo e(__('Payment')); ?>

                        </li>
                    </ol>
                </div>
            </div>
            <div class="col-md-7 col-lg-4">
                <div class="top-btn-block  text-right">
                    <?php if(Auth::user()->roles->first()->name == 'Trainer' || Auth::user()->roles->first()->name == 'Super Admin' ): ?>
                        <a href="<?php echo e(route('manual.payment.gateway.store')); ?>" class="btn btn-primary-rgba mr-2"
                        data-toggle="modal" data-target="#exampleModalCenter"><i class="feather icon-plus mr-2"></i><?php echo e(__("Add Manual Payement")); ?></a>
                        <button type="button" class="btn btn-danger-rgba mr-2 " data-toggle="modal"
                        data-target="#bulk_delete"><i class="feather icon-trash"></i> <?php echo e(__("Delete Selected")); ?></button>
                    <?php endif; ?>
                </div>
                <div class="modal fade manual-pay-modal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <form autocomplete="off" class="form-light" action="<?php echo e(route('manual.payment.gateway.store')); ?>"
                                    method="POST" novalidate enctype="multipart/form-data">
                                    <?php echo e(csrf_field()); ?>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header mb-4">
                                                    <h1 class="card-title"><?php echo e(__('Manual Payement Details:')); ?></h1>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="text-dark"><?php echo e(__("Payement Name:")); ?> <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text"
                                                                class="form-control <?php $__errorArgs = ['payment_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                                placeholder="<?php echo e(__("Your Payment Name ")); ?>" name="payment_name"
                                                                required="">
                                                            <?php $__errorArgs = ['payment_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong><?php echo e($message); ?></strong>
                                                            </span>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                            <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__("Enter the manual payement name")); ?></small>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="text-dark"><?php echo e(__("Description: ")); ?>}<span
                                                                    class="text-danger">*</span></label>
                                                            <textarea type="text" rows="10" cols="10"
                                                                class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                                placeholder="<?php echo e(__("Your Payment Description")); ?>" name="description"
                                                                required=""></textarea>
                                                            <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong><?php echo e($message); ?></strong>
                                                            </span>
                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                            <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i><?php echo e(__(" Enter your payment description")); ?></small>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div
                                                                class="form-group<?php echo e($errors->has('thumbnail') ? ' has-error' : ''); ?> input-file-block">
                                                                <?php echo Form::label('thumbnail', 'Image',['class'=>'required text-dark']); ?> 
                                                                    <?php echo Form::file('thumbnail', ['class' => 'input-file',
                                                                'id'=>'thumbnail']); ?>

                                                                <small class="text-danger"><?php echo e($errors->first('thumbnail')); ?></small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <div class="text-dark"
                                                                class="form-group<?php echo e($errors->has('status') ? ' has-error' : ''); ?> switch-main-block">
                                                                <div class="custom-switch">
                                                                    <?php echo Form::checkbox('status', 1,1,
                                                                    ['id' => 'switch2', 'class' =>
                                                                    'custom-control-input']); ?>

                                                                    <label class="custom-control-label" for="switch2"><span><?php echo e(__("Status")); ?></span></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i>
                                                                <?php echo e(__("Reset")); ?></button>
                                                            <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                                                                <?php echo e(__("Create")); ?></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                            
                                            <div class="clear-both"></div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>          
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
<!-- Start Row -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title"><?php echo e(__('Manual Payement Details')); ?></h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="userstable" class="table table-borderd ">
                        <thead>
                            <tr>
                                <th>
                                    <div class="inline">
                                        <input id="checkboxAll" type="checkbox" class="filled-in" name="checked[]"
                                            value="all" />
                                        <label for="checkboxAll" class="material-checkbox"></label>
                                    </div>
                                </th>
                                <th>#</th>
                                <th><?php echo e(__("Payment Name")); ?></th>
                                <th><?php echo e(__("Description")); ?></th>
                                <th><?php echo e(__("Image")); ?></th>
                                <?php if(Auth::user()->roles->first()->name == 'Trainer' ||
                                Auth::user()->roles->first()->name == 'Super Admin' ): ?>
                                <th><?php echo e(__("Status")); ?></th>
                                <th><?php echo e(__("Action")); ?></th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <div class='inline'>
                                        <input type='checkbox' form='bulk_delete_form'
                                            class='check filled-in material-checkbox-input' name='checked[]'
                                            value=<?php echo e($method->id); ?> id='checkbox<?php echo e($method->id); ?>'>
                                        <label for='checkbox<?php echo e($method->id); ?>' class='material-checkbox'></label>
                                    </div>
                                    <div id="bulk_delete" class="delete-modal modal fade" role="dialog">
                                        <div class="modal-dialog modal-sm">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close"
                                                        data-dismiss="modal">&times;</button>
                                                    <div class="delete-icon"></div>
                                                </div>
                                                <div class="modal-body text-center">
                                                    <h4 class="modal-heading"><?php echo e(__("Are You Sure ?")); ?></h4>
                                                    <p><?php echo e(__("Do you really want to delete selected item names here? This process cannot be undone.")); ?></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <form id="bulk_delete_form" method="post"
                                                        action="<?php echo e(route('manual.payment.gateway.bulk_delete')); ?>">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('POST'); ?>
                                                        <button type="reset" class="btn btn-gray translate-y-3"
                                                            data-dismiss="modal"><?php echo e(__("No")); ?></button>
                                                        <button type="submit" class="btn btn-danger"><?php echo e(__("Yes")); ?></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td><?php echo e($key+1); ?></td>
                                <td><?php echo e(ucfirst($method -> payment_name)); ?></td>
                                <td><?php echo e(str_limit($method -> description ,20)); ?></td>
                                <td>
                                    <?php if($method->thumbnail != ''): ?>
                                    <img width="80px" height="80px" class="margin-right-15 width-height manual-img"
                                        src="<?php echo e(url('/image/payment/'.$method->thumbnail )); ?>"
                                        title="<?php echo e(ucfirst( $method->payment_name )); ?>" class="rounded-circle img-fluid">

                                    <?php else: ?>
                                    <img width="80px" height="80px" class="margin-right-15 manual-img" title="<?php echo e(ucfirst($method->payment_name)); ?>"
                                        src="<?php echo e(Avatar::create(ucfirst($method->payment_name))->toBase64()); ?>" />
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if(Auth::user()->roles->first()->name == 'Trainer' ||
                                    Auth::user()->roles->first()->name == 'Super Admin' ): ?>
                                    <?php echo Form::open(['method' => 'PUT', 'route' =>
                                    ['manual.payment.gateway.status',$method->id]]); ?>

                                    <div class="custom-switch">
                                   <?php echo Form::checkbox('status', 1, $method->status == 1 ? 1 : 0, ['id'
                                        => 'switch'.$method->id, 'class' => 'custom-control-input',
                                        'onChange'=>"this.form.submit()"]); ?>

                                        <label class="custom-control-label" for="switch<?php echo e($method->id); ?>"></label>
                                    </div>
                                    <?php echo Form::close(); ?>

                                </td>
                                <td><a class="btn btn-xs btn-success-rgba" href="#" data-toggle="modal"
                                        data-target="#exampleModalCenter1<?php echo e($method->id); ?>"><i
                                            class="feather icon-edit-2" aria-hidden="true"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger-rgba btn btn-xs" data-toggle="modal"
                                        data-target="#deleteModal-<?php echo e($method->id); ?>">
                                        <i class="feather icon-trash" aria-hidden="true"></i>
                                    </button>
                                </td>
                                <div id="deleteModal-<?php echo e($method->id); ?>" class="delete-modal modal fade" role="dialog">
                                    <div class="modal-dialog modal-sm">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close"
                                                    data-dismiss="modal">&times;</button>
                                                <div class="delete-icon"></div>
                                            </div>
                                            <div class="modal-body text-center">
                                                <h4 class="modal-heading"><?php echo e(__("Are You Sure ?")); ?></h4>
                                                <p><?php echo e(__("Do you really want to delete these records? This process cannot be undone.")); ?></p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="reset" class="btn btn-dark"
                                                    data-dismiss="modal"><?php echo e(__("No")); ?></button>
                                                <?php echo Form::open(['method' => 'DESTROY', 'route' =>
                                                ['manual.payment.gateway.delete', $method->id]]); ?>

                                                <button type="submit" class="btn btn-danger"><?php echo e(__("Yes")); ?></button>
                                                <?php echo Form::close(); ?>

                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                            <div class="modal fade" id="exampleModalCenter1<?php echo e($method->id); ?>" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <form autocomplete="off" class="form-light"
                                                action="<?php echo e(route('manual.payment.gateway.update',$method['id'])); ?>"
                                                method="POST" novalidate enctype="multipart/form-data">
                                                <?php echo e(csrf_field()); ?>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h1 class="card-title mb-4">
                                                                    <?php echo e(__('Edit Manual Payment Details:')); ?></h1>
                                                            </div>
                                                            <br>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="text-dark"><?php echo e(__("Payment Name:")); ?> <span
                                                                                class="text-danger">*</span></label>
                                                                        <input type="text"
                                                                            class="form-control <?php $__errorArgs = ['payment_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                                            placeholder="<?php echo e(__("Your Payment name")); ?>"
                                                                            name="payment_name" required=""
                                                                            value="<?php echo e($method->payment_name); ?>">
                                                                        <?php $__errorArgs = ['payment_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong><?php echo e($message); ?></strong>
                                                                        </span>
                                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                        <small class="text-muted text-info"> <i
                                                                                class="text-dark feather icon-help-circle"></i>
                                                                            <?php echo e(__(" Enter your payement name")); ?></small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="text-dark"><?php echo e(__("Description:")); ?>

                                                                            <span class="text-danger">*</span></label>
                                                                        <textarea type="text" rows="10" cols="10"
                                                                            class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                                            placeholder="<?php echo e(__("Your Payment Description")); ?>"
                                                                            name="description"
                                                                            required=""><?php echo e($method->description); ?></textarea>
                                                                        <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong><?php echo e($message); ?></strong>
                                                                        </span>
                                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                        <small class="text-muted text-info"> <i
                                                                                class="text-dark feather icon-help-circle"></i>
                                                                            <?php echo e(__("Enter your payment description")); ?> </small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <div
                                                                            class="form-group<?php echo e($errors->has('thumbnail') ? ' has-error' : ''); ?> input-file-block">
                                                                            <?php echo Form::label('thumbnail',
                                                                            'Image',['class'=>'required

                                                                            text-dark']); ?>


                                                                            <?php echo Form::file('thumbnail', ['class' =>
                                                                            'input-file',
                                                                            'id'=>'thumbnail']); ?>

                                                                            <small
                                                                                class="text-danger"><?php echo e($errors->first('thumbnail')); ?></small>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div
                                                                        class="form-group<?php echo e($errors->has('status') ? ' has-error' : ''); ?> switch-main-block">
                                                                        <div class="custom-switch">
                                                                            <?php echo Form::checkbox('status',
                                                                            1,$method->status == 1 ? 1 : 0, ['id' =>
                                                                            'switch3', 'class' =>
                                                                            'custom-control-input']); ?>

                                                                            <label class="custom-control-label"
                                                                                for="switch3"><span><?php echo e(__("Status")); ?></span></label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <button type="reset" class="btn btn-danger-rgba"><i
                                                                    class="fa fa-ban"></i>
                                                                <?php echo e(__("Reset")); ?></button>
                                                            <button type="submit" class="btn btn-primary-rgba"><i
                                                                    class="fa fa-check-circle"></i>
                                                                <?php echo e(__("Update")); ?></button>
                                                        </div>
                                                    </div>
                                                    <div class="clear-both"></div>
                                            </form>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- End Row -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
    $("#checkboxAll").on('click', function () {
        $('input.check').not(this).prop('checked', this.checked);
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\GYM\gym_new\resources\views/admin/manualpayment/index.blade.php ENDPATH**/ ?>