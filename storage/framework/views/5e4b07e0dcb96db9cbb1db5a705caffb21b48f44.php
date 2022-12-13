
<?php $__env->startSection('title',__('All Measurement')); ?>
<?php $__env->startSection('maincontent'); ?>
<!-- Start Breadcrumbbar -->
<?php $__env->startComponent('components.breadcumb',['secondaryactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
<?php echo e(__('Measurement')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Measurement')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('button'); ?>
<?php if(Auth::user()->roles->first()->name == 'Trainer' || Auth::user()->roles->first()->name == 'Super Admin' ): ?>
<div class="col-md-12 col-lg-6 text-right">
    <div class="top-btn-block">
        <a href="<?php echo e(route('measurement.create',['id' => app('request')->input('id')])); ?>" class="btn btn-primary-rgba mr-2"><i class="feather icon-plus mr-2"></i><?php echo e(__("Add Measurement")); ?></a>
        <button type="button" class="btn btn-danger-rgba mr-2 " data-toggle="modal" data-target="#bulk_delete"><i class="feather icon-trash"></i> <?php echo e(__("Delete Selected")); ?></button>
        <a href="<?php echo e(route('mea.index')); ?>" class="btn btn-success-rgba mr-2"><i class="feather icon-download-cloud mr-2"></i><?php echo e(__("Recycle")); ?></a>
    </div>
</div>
<?php $__env->endSlot(); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<!-- End Breadcrumbbar -->
<!-- Start Row -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title"><?php echo e(__('Fitness Measurement')); ?></h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="userstable" class="table table-borderd">
                        <thead>
                            <th>
                                <div class="inline">
                                    <input id="checkboxAll" type="checkbox" class="filled-in" name="checked[]"
                                        value="all" />
                                    <label for="checkboxAll" class="material-checkbox"></label>
                                </div>
                            </th>

                            <th>
                                #
                            </th>
                            <th><?php echo e(__("Image")); ?></th>
                            <th>
                                <?php echo e(__("Name")); ?>

                            </th>
                            <th>
                                <?php echo e(__("Height")); ?>

                            </th>
                            <th>
                                <?php echo e(__("Weight")); ?>

                            </th>
                            <th>
                                <?php echo e(__("Chest")); ?>

                            </th>
                            <th>
                                <?php echo e(__("Triceps")); ?>

                            </th>
                            <th>
                                <?php echo e(__("Biceps")); ?>

                            </th>
                            <th>
                                <?php echo e(__("Abdomen")); ?>

                            </th>
                            <th>
                                <?php echo e(__("Waist")); ?>

                            </th>
                            <th>
                                <?php echo e(__("Fat")); ?>

                            </th>
                            <th>
                                <?php echo e(__("Follow Up Date")); ?>                        
                            </th>
                            
                            <?php if(Auth::user()->roles->first()->name == 'Trainer' || Auth::user()->roles->first()->name ==
                            'Super Admin' ): ?>
                            <th>
                                <?php echo e(__("Status")); ?>

                            </th>
                            <th>
                                <?php echo e(__("Action")); ?>

                            </th>
                            <?php endif; ?>
                        </thead>
                        <?php if(isset($measurement)): ?>
                        <tbody>
                            <?php $__currentLoopData = $measurement; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $measurement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <div class='inline'>
                                        <input type='checkbox' form='bulk_delete_form'
                                            class='check filled-in material-checkbox-input' name='checked[]'
                                            value=<?php echo e($measurement->id); ?> id='checkbox<?php echo e($measurement->id); ?>'>
                                        <label for='checkbox<?php echo e($measurement->id); ?>' class='material-checkbox'></label>
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
                                                    <p><?php echo e(__("Do you really want to delete selected item names here? This
                                                        process
                                                        cannot be undone")); ?></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <form id="bulk_delete_form" method="post"
                                                        action="<?php echo e(route('measurement.bulk_delete')); ?>">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('POST'); ?>
                                                        <button type="reset" class="btn btn-gray translate-y-3"
                                                            data-dismiss="modal"><?php echo e(__("No")); ?></button>
                                                        <button type="submit" class="btn btn-danger"><?php echo e(_("Yes")); ?>}</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td><?php echo e($key+1); ?></td>
                                <td>
                                    <?php if( file_exists(public_path().'/media/users/'.$measurement->user['photo'])): ?>
                                    <img title="<?php echo e($measurement->user['name']); ?> " class="img-rounded img-fluid"
                                        src="<?php echo e(url('/media/users/'.$measurement->user['photo'])); ?>" width="70px"
                                        height="70px">
                                    <?php else: ?>
                                    <img class="rounded img-fluid" width="70px"
                                        title="<?php echo e($measurement->user['name']); ?> "
                                        src="<?php echo e(url('/image/default/default.jpg')); ?>" alt="No Photo">
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e(ucfirst($measurement->user['name'])); ?> </td>
                                <td><?php echo e($measurement -> height); ?></td>
                                <td><?php echo e($measurement -> weight); ?></td>
                                <td><?php echo e($measurement -> chest); ?></td>
                                <td><?php echo e($measurement -> tricep); ?></td>
                                <td><?php echo e($measurement -> bicep); ?></td>
                                <td><?php echo e($measurement -> abdomen); ?></td>
                                <td><?php echo e($measurement -> waist); ?></td>
                                <td><?php echo e($measurement -> fat); ?></td>
                                <td><?php echo e($measurement -> date); ?></td>
                                <?php if(Auth::user()->roles->first()->name == 'Trainer' ||
                                Auth::user()->roles->first()->name == 'Super Admin' ): ?>
                                <td>
                                    <?php echo Form::open(['method' => 'PUT', 'route' => ['measurement.status',
                                    $measurement->id]]); ?>

                                    <div class="custom-switch">
                                        <?php echo Form::checkbox('is_active', 1, $measurement->is_active == 1 ? 1 : 0, ['id'
                                        => 'switch'.$measurement->id, 'class' => 'custom-control-input',
                                        'onChange'=>"this.form.submit()"]); ?>

                                        <label class="custom-control-label" for="switch<?php echo e($measurement->id); ?>"></label>
                                    </div>
                                    <?php echo Form::close(); ?>

                                </td>
                                <td><a class="btn btn-xm btn-success-rgba"
                                        href="<?php echo e(route('measurement.edit',$measurement->id ,['id' => app('request')->input('id')])); ?>"><i
                                            class="feather icon-edit-2"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger-rgba  btn btn-xm" data-toggle="modal"
                                        data-target="#deleteModal<?php echo e($measurement->id); ?>">
                                        <i class="feather icon-trash"></i>
                                    </button>
                                </td>
                                <div id="deleteModal<?php echo e($measurement->id); ?>" class="delete-modal modal fade" role="dialog">
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
                                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['measurement.destroy',
                                                $measurement->id]]); ?>


                                                <button type="submit" class="btn btn-danger"><?php echo e(__("Yes")); ?></button>
                                                <?php echo Form::close(); ?>

                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>
                        <?php endif; ?>
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
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\GYM\gym_new\resources\views/admin/measurement/index.blade.php ENDPATH**/ ?>