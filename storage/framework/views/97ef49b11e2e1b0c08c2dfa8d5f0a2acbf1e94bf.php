
<?php $__env->startSection('title',__('All Members Attendance')); ?>
<?php $__env->startSection('maincontent'); ?>
<!-- Start Breadcrumbbar -->
<?php $__env->startComponent('components.breadcumb',['secondaryactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
<?php echo e(__('Members Attendance')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Members Attendance')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('button'); ?>
<div class="col-md-12 col-lg-6 text-right">
    <div class="top-btn-block">
        <a href="<?php echo e(route('memberattendance.create')); ?>" class="btn btn-primary-rgba mr-2"><i
            class="feather icon-plus mr-2"></i><?php echo e(__("Member Attendance")); ?></a>
        <button type="button" class="btn btn-danger-rgba mr-2" data-toggle="modal" data-target="#bulk_delete"><i
            class="feather icon-trash"></i><?php echo e(__(" Delete Selected")); ?></button>
        <a href="<?php echo e(route('mem.index')); ?>" class="btn btn-success-rgba mr-2"><i
            class="feather icon-download-cloud"></i><?php echo e(__("Recycle")); ?></a>
    </div>
</div>
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<!-- End Breadcrumbbar -->
<!-- Start Row  -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title"><?php echo e(__('Attendance')); ?></h5>
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
                                <th><?php echo e(__("Name")); ?></th>
                                <th><?php echo e(__("location")); ?></th>
                                <th><?php echo e(__("Attendance")); ?></th>
                                <th><?php echo e(__("Date")); ?></th>
                                <th><?php echo e(__("Comments")); ?></th>
                                <th><?php echo e(__("Action")); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $memberattendance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $memberattendance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <div class='inline'>
                                        <input type='checkbox' form='bulk_delete_form'
                                            class='check filled-in material-checkbox-input' name='checked[]'
                                            value=<?php echo e($memberattendance->id); ?> id='checkbox<?php echo e($memberattendance->id); ?>'>
                                        <label for='checkbox<?php echo e($memberattendance->id); ?>'
                                            class='material-checkbox'></label>
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
                                                        action="<?php echo e(route('memberattendance.bulk_delete')); ?>">
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
                                <td><?php echo e($key+1); ?></td>
                                <td><?php echo e(ucfirst($memberattendance->user?$memberattendance->user['name']:'')); ?></td>
                                <td><?php echo e($memberattendance -> location); ?></td>
                                <td> <?php if($memberattendance->attend == 'present'): ?> <span
                                        class="badge badge-success"><?php echo e($memberattendance->attend == 'present' ? "Present" : ""); ?></span>
                                    <?php elseif($memberattendance->attend == 'absent'): ?> <span
                                        class="badge badge-danger"><?php echo e($memberattendance->attend == 'absent' ? "Absent" : ""); ?></span>
                                    <?php endif; ?> </td>
                                <td><?php echo e($memberattendance -> date); ?></td>
                                <td><?php echo e($memberattendance -> comment); ?></td>
                                <td><a class="btn btn-xs btn-success-rgba"
                                        href="<?php echo e(route('memberattendance.edit',$memberattendance->id)); ?>"><i
                                            class="feather icon-edit-2" aria-hidden="true"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger-rgba btn btn-xs" data-toggle="modal"
                                        data-target="#deleteModal<?php echo e($memberattendance->id); ?>">
                                        <i class="feather icon-trash" aria-hidden="true"></i>
                                    </button>
                                </td>
                                <div id="deleteModal<?php echo e($memberattendance->id); ?>" class="delete-modal modal fade"
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
                                                <p><?php echo e(__("Do you really want to delete these records? This process cannot be  undone.")); ?></p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="reset" class="btn btn-dark"
                                                    data-dismiss="modal"><?php echo e(__("No")); ?></button>
                                                <?php echo Form::open(['method' => 'DELETE', 'route' =>
                                                ['memberattendance.destroy', $memberattendance->id]]); ?>

                                                <button type="submit" class="btn btn-danger"><?php echo e(__("Yes")); ?></button>
                                                <?php echo Form::close(); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row  -->
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('script'); ?>
    <script>
        $("#checkboxAll").on('click', function () {
            $('input.check').not(this).prop('checked', this.checked);
        });
    </script>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\GYM\gym_new\resources\views/admin/memberattendance/index.blade.php ENDPATH**/ ?>