    
<?php $__env->startSection('title',__('All Quotation')); ?>
<?php $__env->startSection('maincontent'); ?>
<!-- Start Breadcrumbbar -->
<?php $__env->startComponent('components.breadcumb',['secondaryactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
<?php echo e(__('Quotation')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('menu1'); ?>
<?php echo e(__('Quotation')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('button'); ?>
<div class="col-md-12 col-lg-6 text-right">
    <div class="top-btn-block">
        <a href="<?php echo e(route('quotation.create')); ?>" class="btn btn-primary-rgba mr-2"><i class="feather icon-plus mr-2"></i>Add
            <?php echo e(__("Quotation")); ?></a>
        <button type="button" class="btn btn-danger-rgba mr-2" data-toggle="modal" data-target="#bulk_delete"><i
                class="feather icon-trash"></i> <?php echo e(__("Delete Selected")); ?></button>
        <a href="<?php echo e(route('quo.index')); ?>" class="btn btn-success-rgba mr-2 "><i
                class="feather icon-download-cloud mr-2"></i><?php echo e(__("Recycle")); ?></a>
    </div>
</div>
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<!-- End Breadcrumbbar -->
<!-- Start row -->
<div class="row">
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-6">
                        <h5 class="card-title mb-0"><?php echo e(__("All Quotation")); ?></h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-border">
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
                                <th><?php echo e(__("Customerid")); ?></th>
                                <th><?php echo e(__("Name")); ?></th>
                                <th><?php echo e(__("Email")); ?></th>
                                <th><?php echo e(__("Phone")); ?></th>
                                <th><?php echo e(__("ProductName")); ?></th>
                                <th><?php echo e(__("Total")); ?></th>
                                <th><?php echo e(__("Status")); ?></th>
                                <th><?php echo e(__("Action")); ?></th>
                            </tr>
                        </thead>
                        <?php if(isset($quotation)): ?>
                        <tbody>
                            <?php $__currentLoopData = $quotation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <div class='inline'>
                                        <input type='checkbox' form='bulk_delete_form'
                                            class='check filled-in material-checkbox-input' name='checked[]'
                                            value=<?php echo e($list->id); ?> id='checkbox<?php echo e($list->id); ?>'>
                                        <label for='checkbox<?php echo e($list->id); ?>' class='material-checkbox'></label>
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
                                                    <p><?php echo e(__(">Do you really want to delete selected item names here? This process cannot be undone.")); ?></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <form id="bulk_delete_form" method="post"
                                                        action="<?php echo e(route('quotation.bulk_delete')); ?>">
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
                                <td>
                                    <?php echo e($key+1); ?>

                                </td>
                                <td><?php echo e($list->customerid); ?></td>
                                <td><?php echo e($list->name); ?></td>
                                <td><?php echo e($list->email); ?></td>
                                <td><?php echo e($list->mobile); ?></td>
                                <td>
                                    <?php $__currentLoopData = $list->subquotation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo e(str_replace('"', '', $sub->productname)); ?>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </td>

                                <td>

                                    <?php $__currentLoopData = $list->subquotation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo e(str_replace('"', '', $sub->total)); ?>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </td>
                                <td>
                                    <?php echo Form::open(['method' => 'PUT', 'route' => ['quotation.status', $list->id]]); ?>

                                    <div class="custom-switch">
                                        <?php echo Form::checkbox('is_active', 1, $list->is_active == 1 ? 1 : 0, ['id' =>
                                        'switch'.$list->id, 'class' => 'custom-control-input',
                                        'onChange'=>"this.form.submit()"]); ?>

                                        <label class="custom-control-label" for="switch<?php echo e($list->id); ?>"></label>
                                    </div>
                                    <?php echo Form::close(); ?>

                                </td>
                                <td>
                                    <div class="btn-group mr-2">
                                        <div class="dropdown">
                                            <button class="btn btn-round btn-primary-rgba" type="button"
                                                id="CustomdropdownMenuButton3" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false"><i
                                                    class="feather icon-more-vertical-"></i></button>
                                            <div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton3">
                                                <a class="dropdown-item" href="<?php echo e(route('quotation.show',$list->id )); ?>"
                                                    class="btn btn-primary-rgba"><i
                                                        class="feather icon-file mr-2"></i><?php echo e(__("Show")); ?></a>
                                                <a class="dropdown-item" href="<?php echo e(route('quotation.edit', $list->id)); ?>"
                                                    class="btn btn-xs btn-success-rgba"><i
                                                        class="feather icon-edit-2 mr-2"></i><?php echo e(__("Edit")); ?></a>
                                                <button class="dropdown-item" type="button" data-toggle="modal"
                                                    class="btn btn-primary-rgba"
                                                    data-target="#deleteModal<?php echo e($list->id); ?>"><i
                                                        class="feather icon-trash mr-2"></i><?php echo e(__("Delete")); ?></button>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="deleteModal<?php echo e($list->id); ?>" class="delete-modal modal fade" role="dialog">
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
                                                    <p><?php echo e(__("Do you really want to delete these records? This process cannot be  undone.")); ?></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="reset" class="btn btn-dark"
                                                        data-dismiss="modal"><?php echo e(__("No")); ?></button>
                                                    <?php echo Form::open(['method' => 'DELETE', 'route' =>
                                                    ['quotation.destroy',$list->id]]); ?>


                                                    <button type="submit" class="btn btn-danger"><?php echo e(__("Yes")); ?></button>
                                                    <?php echo Form::close(); ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                        <?php endif; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End col -->
</div>
<!-- End row -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
    $("#checkboxAll").on('click', function () {
        $('input.check').not(this).prop('checked', this.checked);
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\GYM\gym_new\resources\views/admin/quotation/index.blade.php ENDPATH**/ ?>