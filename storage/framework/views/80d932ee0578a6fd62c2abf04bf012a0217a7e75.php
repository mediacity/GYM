
<?php $__env->startSection('title',__('All Trainers List')); ?>
<?php $__env->startSection('breadcum'); ?>
<div class="breadcrumbbar breadcrumbbar-one">
    <div class="row align-items-center">
        <div class="col-lg-4 col-md-5">
            <h4 class="page-title"><?php echo e(__("Trainer list")); ?></h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <?php echo e(__('Trainer list')); ?>

                    </li>
                </ol>
            </div>
        </div>
        <?php if(auth()->user()->can('trainer_list.add')): ?>
        <div class="col-lg-8 col-md-7">
            <div class="top-btn-block text-right">
                <a href="<?php echo e(route('trainerlist.create',['id' => app('request')->input('id')])); ?>" class="btn btn-primary-rgba mr-2"><i
                    class="feather icon-plus mr-2"></i><?php echo e(__("Add Trainer List")); ?></a>
                <button type="button" class=" btn btn-danger-rgba mr-2 " data-toggle="modal" data-target="#bulk_delete"><i
                    class="feather icon-trash mr-2"></i><?php echo e(__(" Delete Selected")); ?></button>
                <a href="<?php echo e(route('blo.index')); ?>" class="btn btn-success-rgba mr-2"><i
                class="feather icon-download-cloud mr-2"></i><?php echo e(__("Recycle")); ?></a>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
<div class="card">
    <div class="card-header">
        <h5 class="card-title"><span class="ml-13">
                <input id="checkboxAll" type="checkbox" class="filled-in" name="checked[]" value="all" />
                <label for="checkboxAll" class="material-checkbox"></label>
                <?php echo e(__('   All Trainerlist')); ?></span></h5>
    </div>
</div>
<!-- Start Row -->
<div class="row">
    <?php $__currentLoopData = $trainerlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $trainerlist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless mb-0">
                        <tbody>
                            <tr>
                                <td>
                                    <div class='inline'>
                                        <input type='checkbox' form='bulk_delete_form'
                                            class='check filled-in material-checkbox-input' name='checked[]'
                                            value=<?php echo e($trainerlist->id); ?> id='checkbox<?php echo e($trainerlist->id); ?>'>
                                        <label for='checkbox<?php echo e($trainerlist->id); ?>' class='material-checkbox'></label>
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
                                                        action="<?php echo e(route('trainerlist.bulk_delete')); ?>">
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

                                <td>

                                    <p class="mb-1 font-14"><?php echo e(__("Member names")); ?></p>
                                    <h5> <?php echo e(ucfirst($trainerlist-> user['name'])); ?></h5>
                                </td>
                                <td>
                                    <p class="mb-1 font-14"><?php echo e(__("Trainer name")); ?></p>
                                    <h5> <?php echo e(App\User::whereId($trainerlist->trainer_name)->value('name')); ?></h5>
                                </td>
                                <td>
                                    <p class="mb-1 font-14"><?php echo e(__("Trainer type")); ?></p>
                                    <h5> <?php echo e(str_limit($trainerlist-> personaltrainer , 10)); ?></h5>
                                </td>
                                <td>
                                    <p class="mb-1 font-14"><?php echo e(__("Description")); ?></p>
                                    <h5> <?php echo e(str_limit($trainerlist-> description , 20)); ?></h5>
                                </td>

                                <td>

                                    <p class="mb-1 font-14"><?php echo e(__("From")); ?></p>
                                    <h5><?php echo e($trainerlist-> from); ?></h5>
                                </td>
                                <td>
                                    <p class="mb-1 font-14"><?php echo e(__("To")); ?></p>
                                    <h5><?php echo e($trainerlist-> to); ?></h5>
                                </td>
                                <td>
                                    <?php echo Form::open(['method' => 'PUT', 'route' =>
                                    ['trainerlist.status',$trainerlist->id]]); ?>

                                    <div class="custom-switch">
                                        <p class="mb-1 font-14 ml--40 mt--15"><?php echo e(__("Status")); ?></p>
                                        <?php echo Form::checkbox('is_active', 1, $trainerlist->is_active == 1 ? 1 : 0, ['id'
                                        => 'switch'.$trainerlist->id, 'class' => 'custom-control-input',
                                        'onChange'=>"this.form.submit()"]); ?>

                                        <label class="custom-control-label" for="switch<?php echo e($trainerlist->id); ?>"></label>
                                    </div>
                                    <?php echo Form::close(); ?>

                                </td>
                                <td>
                                    <p class="mb-1 font-14 mt--10"><?php echo e(__("Action")); ?></p>
                                    <a class="btn btn-xm btn-success-rgba"
                                        href="<?php echo e(route('trainerlist.edit',$trainerlist->id)); ?>"><i
                                            class="feather icon-edit-2"></i>
                                    </a>

                                    <form method="POST" id="delete-form-<?php echo e($trainerlist->id); ?>"
                                        action="<?php echo e(route ('trainerlist.destroy',$trainerlist->id)); ?>"
                                        style="display:none;">

                                        <?php echo e(csrf_field()); ?>

                                        <?php echo e(method_field('delete')); ?>

                                    </form>
                                    <button type="button" class="btn btn-danger-rgba  btn btn-xm" data-toggle="modal"
                                        data-target="#deleteModal<?php echo e($trainerlist->id); ?>">
                                        <i class="feather icon-trash"></i>
                                    </button>
                                </td>
                                <div id="deleteModal<?php echo e($trainerlist->id); ?>" class="delete-modal modal fade" role="dialog">
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
                                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['trainerlist.destroy',
                                                $trainerlist->id]]); ?>

                                                <button type="submit" class="btn btn-danger"><?php echo e(__("Yes")); ?></button>
                                                <?php echo Form::close(); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\GYM\resources\views/admin/trainerlist/index.blade.php ENDPATH**/ ?>