
<?php $__env->startSection('title',__('All Slider')); ?>
<?php $__env->startSection('maincontent'); ?>
<!-- Start Breadcrumbbar -->
<?php $__env->startComponent('components.breadcumb',['secondaryactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
<?php echo e(__('Slider')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Slider')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('button'); ?>
<?php $__env->endSlot(); ?>
<?php $__env->slot('button'); ?>
<div class="col-md-6 col-lg-6 text-right">
    <a href="<?php echo e(route('slider.create')); ?>" class="btn btn-primary-rgba mr-2"><i
            class="feather icon-plus mr-2"></i><?php echo e(__("Create")); ?>

        <?php echo e(__("Slider")); ?></a>
    <button type="button" class="btn btn-danger-rgba mr-2 " data-toggle="modal" data-target="#bulk_delete"><i
            class="feather icon-trash"></i> <?php echo e(__("Delete Selected")); ?></button>
    <a href="<?php echo e(route('sli.index')); ?>" class="btn btn-success-rgba mr-2"><i
            class="feather icon-download-cloud mr-2"></i><?php echo e(__("Recycle")); ?></a>
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
                        <h5 class="card-title mb-0"><?php echo e(__("All Slider")); ?></h5>
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
                                <th><?php echo e(__("ID")); ?></th>
                                <th><?php echo e(__("Slider Image")); ?></th>
                                <th><?php echo e(__("Slider Contents")); ?></th>
                                <th><?php echo e(__("Status")); ?></th>
                                <th><?php echo e(__("Action")); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($slider)): ?>
                        <tbody>
                            <?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <div class='inline'>
                                        <input type='checkbox' form='bulk_delete_form'
                                            class='check filled-in material-checkbox-input' name='checked[]'
                                            value=<?php echo e($item->id); ?> id='checkbox<?php echo e($item->id); ?>'>
                                        <label for='checkbox<?php echo e($item->id); ?>' class='material-checkbox'></label>
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
                                                        action="<?php echo e(route('slider.bulk_delete')); ?>">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('POST'); ?>
                                                        <button type="reset" class="btn btn-gray translate-y-3"
                                                            data-dismiss="modal"><?php echo e(__("No")); ?></button>
                                                        <button type="submit"
                                                            class="btn btn-danger"><?php echo e(__("Yes")); ?></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <?php echo e($key+1); ?>

                                </td>
                                <td>
                                    <?php if($item->image): ?>
                                    <img src="<?php echo e(asset('image/slider/'.$item->image)); ?>"
                                        class="slider-img" alt="image">
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <table id="datatable-buttons" class="table table-borderless">
                                        <tr>
                                            <td class="text-dark"><?php echo e(ucfirst(str_limit($item->link_by, 20))); ?><br><a
                                                    href="<?php echo e($item->url); ?>"
                                                    target="_blank"><?php echo e(str_limit($item->url,30)); ?></a></td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    <?php echo Form::open(['method' => 'POST', 'route' => ['slider.status', $item->id]]); ?>

                                    <div class="custom-switch">
                                        <?php echo Form::checkbox('status', 1, $item->status == 1 ? 1 : 0, ['id' =>
                                        'switch'.$item->id, 'class' => 'custom-control-input',
                                        'onChange'=>"this.form.submit()"]); ?>

                                        <label class="custom-control-label" for="switch<?php echo e($item->id); ?>"></label>
                                    </div>
                                    <?php echo Form::close(); ?>

                                </td>
                                <td>
                                    <div class="admin-table-action-block">
                                        <a href="<?php echo e(route('slider.edit', $item->id)); ?>"
                                            class="btn btn-xm btn-success-rgba"><i class="feather icon-edit-2"></i></a>
                                        <!-- Delete Modal -->
                                        <button type="button" class="btn btn-danger-rgba  btn btn-xm"
                                            data-toggle="modal" data-target="#deleteModal<?php echo e($item->id); ?>"><i
                                                class="feather icon-trash"></i></button>
                                        <!-- Modal -->
                                        <div id="deleteModal<?php echo e($item->id); ?>" class="delete-modal modal fade"
                                            role="dialog">
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
                                                        <p><?php echo e(__("Do you really want to delete these records? This process cannot be undone.")); ?>

                                                        </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <?php echo Form::open(['method' => 'DELETE', 'route' =>
                                                        ['slider.destroy', $item->id]]); ?>

                                                        <button type="reset" class="btn btn-dark"
                                                            data-dismiss="modal"><?php echo e(__("No")); ?></button>
                                                        <button type="submit"
                                                            class="btn btn-danger"><?php echo e(__("Yes")); ?></button>
                                                        <?php echo Form::close(); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                        <?php endif; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End row -->
<div class="mx-auto">
    <?php echo $slider->links(); ?>

</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<!-- Sweetalert -->
<script src="https://mediacity.co.in/emart/demo/public/front/vendor/js/sweetalert.min.js"></script>
<link type="text/css" rel="stylesheet" href="https://mediacity.co.in/emart/demo/public/css/vendor/toggle.css">
<script>
    $("#checkboxAll").on('click', function () {
        $('input.check').not(this).prop('checked', this.checked);
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\gym_new\resources\views/admin/slider/index.blade.php ENDPATH**/ ?>