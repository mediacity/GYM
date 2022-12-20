
<?php $__env->startSection('title',__('Roles & Permissions')); ?>
<!-- Start Breadcrumbbar -->
<?php $__env->startSection('breadcum'); ?>
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-12 col-lg-8">
            <h4 class="page-title"><?php echo e(__("Roles and permissions")); ?></h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>"><?php echo e(__('Home')); ?></a></li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard.index')); ?>"><?php echo e(__('Dashboard')); ?></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <?php echo e(__('Roles and Permissions')); ?>

                    </li>
                </ol>
            </div>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
<?php $__env->startSection('maincontent'); ?>
<div class="row">
    <div class="col-md-12">
         <div class="card">
            <?php if(Auth::user()->roles->first()->name == 'Super Admin'): ?>
            <div class="card-header">
                <a title="Create a new role" href="<?php echo e(route('roles.create')); ?>"
                    class="float-right btn btn-sm btn-primary-rgba">
                   <?php echo e(__(" + Add new role")); ?>

                </a>
                <h5 class="card-title"><?php echo e(__('Manage Roles and Permissions')); ?></h5>

            </div>
            <?php endif; ?>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="roletab" class="table table-borderd">

                        <thead>
                            <th>
                                #
                            </th>
                            <th>
                                <?php echo e(__("Role Name")); ?>

                            </th>
                            <th>
                                <?php echo e(__("Action")); ?>

                            </th>
                        </thead>

                        <tbody>

                        </tbody>


                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php $__env->stopSection(); ?>
<!-- End Contentbar -->
<?php $__env->startSection('script'); ?>
<script>
    $(document).ready(function () {
        var table = $('#roletab').DataTable({
            lengthChange: false,
            responsive: true,
            serverSide: true,
            ajax: "<?php echo e(url('roles.index ')); ?>",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    searchable: false
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'action',
                    name: 'action'
                }
            ],
            dom: 'lBfrtip',
            buttons: [
                'csv', 'excel', 'pdf', 'print'
            ]
        });

        table.buttons().container().appendTo('#roletable .col-md-3:eq(0)');
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\GYM\resources\views/manage/roles/index.blade.php ENDPATH**/ ?>