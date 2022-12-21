
<?php $__env->startSection('title',__('All Blog Category')); ?>
<?php $__env->startSection('breadcum'); ?>
	<div class="breadcrumbbar breadcrumbbar-one">
        <div class="row align-items-center">
            <div class="col-md-5 col-lg-5">
                <h4 class="page-title"><?php echo e(__("Blog Category")); ?></h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard.index')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                        	<?php echo e(__('Blog Category')); ?>

                        </li>
                    </ol>
                </div>
            </div>
            <div class="col-md-7 col-lg-7">
                <div class="top-btn-block text-right">
                    <a href="<?php echo e(route('blogcategory.create')); ?>" class="btn btn-primary-rgba mr-2"><i
                    class="feather icon-plus mr-2"></i><?php echo e(__("Add Blog Category")); ?></a>
                    <button type="button" class="btn btn-danger-rgba mr-2 " data-toggle="modal" data-target="#bulk_delete"><i
                    class="feather icon-trash mr-2"></i> <?php echo e(__("Delete Selected")); ?></button>
                    <a href="<?php echo e(route('blocat.index')); ?>" class="btn btn-success-rgba mr-2"><i
                    class="feather icon-download-cloud mr-2"></i><?php echo e(__("Recycle")); ?></a>
                </div>
            </div>  
        </div>          
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
<!-- Start Contentbar -->
<div class="">
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h5 class="card-title mb-0"><?php echo e(__("All Categories")); ?></h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table ">
                                <thead>
                                    <tr>
                                        <th>

                                            <div class="inline">

                                                <input id="checkboxAll" type="checkbox" class="filled-in"
                                                    name="checked[]" value="all" />
                                                <label for="checkboxAll" class="material-checkbox"></label>
                                            </div>
                                        </th>
                                        <th>#</th>
                                        <th><?php echo e(__("Category")); ?></th>
                                        <th><?php echo e(__("Created At")); ?></th>
                                        <th><?php echo e(__("Status")); ?></th>
                                        <th><?php echo e(__("Actions")); ?></th>
                                    </tr>
                                </thead>
                                <?php if($blogcategory): ?>
                                <tbody>
                                    <?php $__currentLoopData = $blogcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                                            <p><?php echo e(__("Do you really want to delete selected item names here? This proces cannot be undone.")); ?></p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form id="bulk_delete_form" method="post"
                                                                action="<?php echo e(route('blogcategory.bulk_delete')); ?>">
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
                                        <td><?php echo e(ucfirst($item->title)); ?></td>
                                        <td><?php echo e($item->created_at->diffForHumans()); ?></td>
                                        <td>
                                            <?php echo Form::open(['method' => 'POST', 'route' => ['blogcategory.status',
                                            $item->id]]); ?>

                                            <div class="custom-switch">
                                                <?php echo Form::checkbox('is_active', 1, $item->is_active == 1 ? 1 : 0, ['id'
                                                =>
                                                'switch'.$item->id, 'class' => 'custom-control-input',
                                                'onChange'=>"this.form.submit()"]); ?>

                                                <label class="custom-control-label" for="switch<?php echo e($item->id); ?>"></label>
                                            </div>
                                            <?php echo Form::close(); ?>

                                        </td>
                                        <td>
                                            <div class="admin-table-action-block">
                                                <a href="<?php echo e(route('blogcategory.edit', $item->id)); ?>"
                                                    class="btn btn-xm btn-success-rgba"><i
                                                        class="feather icon-edit-2"></i></a>
                                                <button type="button" class="btn btn-xm btn-danger-rgba"
                                                    data-toggle="modal" data-target="#deleteModal<?php echo e($item->id); ?>"><i
                                                        class="feather icon-trash"></i></button>
                                                <!-- Modal -->
                                                <div id="deleteModal<?php echo e($item->id); ?>" class="delete-modal modal fade"
                                                    tabindex="-1" role="dialog" aria-hidden="true">
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
                                                                <?php echo Form::open(['method' => 'DELETE', 'route' =>
                                                                ['blogcategory.destroy', $item->id]]); ?>

                                                                <button type="reset" class="btn btn-primary"
                                                                    data-dismiss="modal"><?php echo e(__("No")); ?></button>
                                                                <button type="submit"
                                                                    class="btn btn-danger-rgba"><?php echo e(__("Yes")); ?></button>
                                                                <?php echo Form::close(); ?>

                                                            </div>
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
        </div>
    </div>
    <!-- End Contentbar -->
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('script'); ?>
    <script>
        $("#checkboxAll").on('click', function () {
            $('input.check').not(this).prop('checked', this.checked);
        });
    </script>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\GYM\resources\views/admin/blog/blogcategory/index.blade.php ENDPATH**/ ?>