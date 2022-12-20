
<?php $__env->startSection('title',__('All Diet Content')); ?>
<?php $__env->startSection('breadcum'); ?>
<div class="breadcrumbbar breadcrumbbar-one">
    <div class="row align-items-center">
        <div class="col-lg-4 col-md-5">
            <h4 class="page-title"><?php echo e(__("Diet Content")); ?></h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <?php echo e(__('Diet Content')); ?>

                    </li>
                </ol>
            </div>
        </div>
        <?php if(auth()->user()->can('users.add')): ?>
        <div class="col-lg-8 col-md-7">
            <div class="top-btn-block text-right">
                <a href="<?php echo e(route('dietcontent.create')); ?>" class="btn btn-primary-rgba mr-2"><i
                class="feather icon-plus mr-2"></i><?php echo e(__("Add Diet Content")); ?></a>
                <button type="button" class="btn btn-danger-rgba mr-2 " data-toggle="modal" data-target="#bulk_delete"><i
                class="feather icon-trash mr-2"></i> <?php echo e(__("Delete Selected")); ?></button>
                <a href="<?php echo e(route('dietcont.index')); ?>" class="btn btn-primary-rgba mr-2"><i class="feather icon-download-cloud mr-2"></i>Recycle</a>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
<!--main-->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                 <h5 class="card-title"><?php echo e(__('Diet Content')); ?></h5>
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
                            <th>
                                <?php echo e(__("Diet Content")); ?>

                            </th>
                            <th>
                                <?php echo e(__("Quantity")); ?>

                            </th>
                            <th>
                                <?php echo e(__("Calories")); ?>

                            </th>
                            <th>
                                <?php echo e(__("Status")); ?>

                            </th>
                            <th>
                              <?php echo e(__("  Action")); ?>

                            </th>
                        </thead>
                         <tbody>
                            <?php $__currentLoopData = $dietcontent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $dietcontent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <tr>
                            <td>
                            <div class='inline'>
                                <input type='checkbox' form='bulk_delete_form' class='check filled-in material-checkbox-input'
                                    name='checked[]' value=<?php echo e($dietcontent->id); ?> id='checkbox<?php echo e($dietcontent->id); ?>'>
                                <label for='checkbox<?php echo e($dietcontent->id); ?>' class='material-checkbox'></label>
                            </div>
                            <div id="bulk_delete" class="delete-modal modal fade" role="dialog">
                                <div class="modal-dialog modal-sm">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <div class="delete-icon"></div>
                                        </div>
                                        <div class="modal-body text-center">
                                            <h4 class="modal-heading"><?php echo e(__("Are You Sure ?")); ?></h4>
                                            <p><?php echo e(__("Do you really want to delete selected item names here? This process cannot be undone.")); ?></p>
                                        </div>
                                        <div class="modal-footer">
                                            <form id="bulk_delete_form" method="post"
                                                action="<?php echo e(route('dietcontent.bulk_delete')); ?>">
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
                         <td><?php echo e(ucfirst($dietcontent -> content)); ?></td>
                                  <td><?php echo e(ucfirst($dietcontent -> quantity)); ?></td>
                                  <td><?php echo e($dietcontent -> calories); ?></td>
                                <td>
                                    <?php echo Form::open(['method' => 'PUT', 'route' => ['dietcontent.status',
                                    $dietcontent->id]]); ?>

                                    <div class="custom-switch">
                                        <?php echo Form::checkbox('is_active', 1, $dietcontent->is_active == 1 ? 1 : 0, ['id'
                                        => 'switch'.$dietcontent->id, 'class' => 'custom-control-input',
                                        'onChange'=>"this.form.submit()"]); ?>

                                        <label class="custom-control-label" for="switch<?php echo e($dietcontent->id); ?>"></label>
                                    </div>
                                    <?php echo Form::close(); ?>

                                </td>
                                <td><a class="btn btn-xs btn-success-rgba"
                                        href="<?php echo e(route('dietcontent.edit',$dietcontent->id)); ?>"><i
                                            class="feather icon-edit-2" aria-hidden="true"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger-rgba  btn btn-xs" data-toggle="modal"
                                        data-target="#deleteModal<?php echo e($dietcontent->id); ?>">
                                        <i class="feather icon-trash" aria-hidden="true"></i>
                                    </button>
                                </td>
                                <div id="deleteModal<?php echo e($dietcontent->id); ?>" class="delete-modal modal fade" role="dialog">
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
                                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['dietcontent.destroy',
                                                $dietcontent->id]]); ?>

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
                     </table>
                     </div>
                    </div>
        </div>
    </div>
</div>
<!--END-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
      $("#checkboxAll").on('click', function () {
  $('input.check').not(this).prop('checked', this.checked);
});;

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\GYM\resources\views/admin/diet/dietcontent/index.blade.php ENDPATH**/ ?>