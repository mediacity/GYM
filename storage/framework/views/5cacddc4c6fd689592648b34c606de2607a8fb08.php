
<?php $__env->startSection('title',__('All Health Issue')); ?>
<?php $__env->startSection('breadcum'); ?>
	<div class="breadcrumbbar breadcrumbbar-one">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-5">
                <h4 class="page-title"><?php echo e(__("Health Enquiry")); ?></h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard.index')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                        	<?php echo e(__('All Health Issue')); ?>

                        </li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-7">
                <div class="top-btn-block text-right">
                    <a href="<?php echo e(route('enquiryhealth.create')); ?>" class="btn btn-primary-rgba "><i
                    class="feather icon-plus mr-2" ></i><?php echo e(__("Add Health Issue")); ?></a>
                    <button type="button" class="btn btn-danger-rgba mr-2 " data-toggle="modal" data-target="#bulk_delete"><i
                    class="feather icon-trash"></i> <?php echo e(__("Delete Selected")); ?></button>
                </div>
            </div>  
        </div>          
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
<!-- Start Form -->
<div class="card m-b-30">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-6">
                <h5 class="card-title mb-0"><?php echo e(__("All Health Issue")); ?></h5>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-borderd">
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
                        <th><?php echo e(__("Issue")); ?></th>
                        <th><?php echo e(__("Status")); ?></th>
                        <th><?php echo e(__("Action")); ?></th>
                    </tr>
                </thead>
                <?php if(isset($enquiryhealth)): ?>
                <tbody>
                    <?php $__currentLoopData = $enquiryhealth; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <tr>
                        <td>
                            <div class='inline'>
                                 <input type='checkbox' form='bulk_delete_form' class='check filled-in material-checkbox-input'
                                  name='checked[]' value=<?php echo e($list->id); ?> id='checkbox<?php echo e($list->id); ?>'>
                                <label for='checkbox<?php echo e($list->id); ?>' class='material-checkbox'></label>
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
                                                action="<?php echo e(route('enquiryhealth.bulk_delete')); ?>">
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
                        <td><?php echo e($list -> issue); ?></td>
                        <td>
                            <?php echo Form::open(['method' => 'PUT', 'route' => ['enquiryhealth.status',
                            $list->id]]); ?>

                            <div class="custom-switch">
                                <?php echo Form::checkbox('is_active', 1, $list->is_active == 1 ? 1 : 0, ['id'
                                => 'switch'.$list->id, 'class' => 'custom-control-input',
                                'onChange'=>"this.form.submit()"]); ?>

                                <label class="custom-control-label" for="switch<?php echo e($list->id); ?>"></label>
                            </div>
                            <?php echo Form::close(); ?>

                        </td>
                        <td>
                            <a class="btn btn-xs btn-success-rgba"
                                href="<?php echo e(route('enquiryhealth.edit',$list->id )); ?>"><i class="feather icon-edit-2"></i>
                            </a>
                            <button type="button" class="btn btn-danger-rgba  btn btn-xs" data-toggle="modal"
                                data-target="#deleteModal<?php echo e($list->id); ?>">
                                <i class="feather icon-trash"></i>
                            </button>
                        </td>
                        <div id="deleteModal<?php echo e($list->id); ?>" class="delete-modal modal fade" role="dialog">
                            <div class="modal-dialog modal-sm">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <div class="delete-icon"></div>
                                    </div>
                                    <div class="modal-body text-center">
                                        <h4 class="modal-heading"><?php echo e(__("Are You Sure ?")); ?></h4>
                                        <p><?php echo e(__("Do you really want to delete these records? This process cannot be undone.")); ?></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="reset" class="btn btn-dark" data-dismiss="modal"><?php echo e(__("No")); ?></button>
                                        <?php echo Form::open(['method' => 'DELETE', 'route' => ['enquiryhealth.destroy',
                                        $list->id]]); ?>


                                        <button type="submit" class="btn btn-danger"><?php echo e(__("Yes")); ?></button>
                                        <?php echo Form::close(); ?>

                                    </div>
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
<!-- End Form -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
      $("#checkboxAll").on('click', function () {
  $('input.check').not(this).prop('checked', this.checked);
});

</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\GYM\resources\views/admin/enquiry/enquiryhealth/index.blade.php ENDPATH**/ ?>