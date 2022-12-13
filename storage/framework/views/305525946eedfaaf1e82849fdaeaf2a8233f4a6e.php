
<?php $__env->startSection('title',__('Users')); ?>
<!-- Start Breadcrumbbar -->
<?php $__env->startSection('breadcum'); ?>
<div class="breadcrumbbar breadcrumbbar-one">
    <div class="row align-items-center">
        <div class="col-lg-8 col-md-6">
            <h4 class="page-title"><?php echo e(__("All Users")); ?></h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>"><?php echo e(__('Home')); ?></a></li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard.index')); ?>"><?php echo e(__('Dashboard')); ?></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <?php echo e(__('Users')); ?>

                    </li>
                </ol>
            </div>
        </div>
        <?php if(auth()->user()->can('users.add')): ?>
        <div class="col-lg-4 col-md-6">
            <form action="" method="get">
                <div class="input-group">
                    <input type="hidden" name="filter" value="<?php echo e(app('request')->input('filter') ?? ''); ?>">

                    <input type="search" for="search" id="search" onsearch="OnSearch(this)" name="search"
                        value="<?php echo e(app('request')->input('search')); ?>" class="form-control" placeholder="<?php echo e(__("Search User")); ?>">
                    <span class="input-group-prepend">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                    </span>
                  </div>
            </form>
            <?php if(app('request')->input('search') != ''): ?>
            <a role="button" title="Back" href="<?php echo e(route('users.index')); ?>" name="clear" value="search" id="clear_id"
                class="btn btn-warning btn-xs">
                <?php echo e(__("Clear Search")); ?>

            </a>
            <?php endif; ?>

        </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
<?php $__env->startSection('maincontent'); ?>
<section class="all-user-top-bar">
    <div class="row">
        <div class="col-md-4 col-12">
            <h5 class="user-card card-title"><?php echo e(__('All users')); ?></h5>
        </div>
        <div class="col-md-8 col-12">
            <?php if(auth()->user()->can('users.add')): ?>
            <div class="card-header text-right">
                <a title="Create a new role" href="<?php echo e(route('users.create')); ?>" class="btn btn-sm btn-primary-rgba mr-2">
                    <?php echo e(__("+ Add new user")); ?>

                </a>
                <a href="<?php echo e(route('use.index')); ?>" class="btn btn-success-rgba mr-2"><i
                        class="feather icon-download-cloud mr-2"></i><?php echo e(__("Recycle")); ?></a>

                <form action="" method="GET" class="filter-role">
                    <select data-placeholder="<?php echo e(__("Filter by role")); ?>" name="roles" id="roles" class="float-left select2 rolesdrop">
                        <option value=""><?php echo e(__("Filter by role")); ?></option>
                        <option value="all" <?php echo e(request()->get('roles') == 'all' ? "selected" : " "); ?>><?php echo e(__("All")); ?>

                        </option>
                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($role->name); ?>" <?php echo e(request()->get('roles') == $role->name ? "selected" : " "); ?>>
                            <?php echo e($role->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </form>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<div class="all-user-block">
    <div class="table-responsive">
        <table id="userstable" class="table table-borderd">
            <tbody>
                <div class="row">
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-6 col-xl-4 col-md-6">
                        <div class="card doctor-box m-b-50">
                            <div class="card-body text-center">

                                <?php if($item->membership == 'yes'): ?>

                                <div class="ribbon ribbon-top-right">
                                    <span class="badge badge-success ">
                                        <i class="ti-crown w3-xxxlarge"></i>
                                        <?php echo e($item->membership == 'yes' ? "VIP" : ""); ?></span>
                                </div>

                                <?php elseif($item->demo == 'yes'): ?>
                                <div class="ribbon ribbon-top-right">
                                    <span class="badge badge-success ">
                                        <?php echo e($item->demo == 'yes' ? "Demo" : ""); ?></span>
                                </div>
                                <?php endif; ?>
                                <div>
                                    <?php if($item->photo != '' &&
                                    file_exists(public_path().'/media/users/'.$item->photo)): ?>
                                    <img class="img-fluid user-img"
                                        src="<?php echo e(url('media/users/'.$item->photo)); ?>" title="<?php echo e($item->name); ?>">
                                    <?php else: ?>
                                    <img class="margin-top-15 user-img"
                                        title="<?php echo e($item->name); ?>" src="<?php echo e(Avatar::create($item->name)->toBase64()); ?>" />
                                    <?php endif; ?>
                                </div>
                                <br>
                                <div class="card user-card-one">
                                    <div class="text-dark">

                                        <?php echo e($item->name); ?>

                                    </div>

                                    <div>
                                        <?php echo e($item->email); ?>

                                    </div>
                                    <div>
                                        <?php echo e($item->mobile); ?>

                                    </div>

                                    <br>

                                    <div class="button-list">
                                        <div class="card-footer text-center">

                                            <div class="row mb-15">
                                                <div class="col-4 border-right">
                                                    <h4><a href="<?php echo e(route('trainerlist.index',['id' => base64_encode($item->id) ])); ?>"
                                                            class="text-muted"><i class="feather icon-user-plus"></i>
                                                    </h4>
                                                    <small><?php echo e(__("Trainer")); ?></small></a>
                                                </div>
                                                <div class="col-4 border-right">
                                                    <h4><a href="<?php echo e(route('exercisepackage.index',['id' => base64_encode($item->id) ])); ?>"
                                                            class="text-muted"><i class="fa fa-bicycle text-muted"></i>
                                                    </h4>
                                                    <small><?php echo e(__("Exercise")); ?></small></a>
                                                </div>
                                                <div class="col-4">
                                                    <h4><a href="<?php echo e(route('dietpackage.index',['id' => base64_encode($item->id) ])); ?>"
                                                            class="text-muted"><i class="feather icon-pie-chart"></i>
                                                    </h4>

                                                    <small><?php echo e(__("Diet")); ?></small></a>
                                                </div>
                                            </div>
                                            <div class="row mb-15">
                                                <div class="col-4 border-right">
                                                    <h4><a href="<?php echo e(route('measurement.index',['id' => base64_encode($item->id) ])); ?>"
                                                            class="text-muted"><i
                                                                class="fa fa-balance-scale text-muted"></i>
                                                    </h4>
                                                    <small><?php echo e(__("Measurement")); ?></small></a>
                                                </div>
                                                <div class="col-4 border-right">
                                                    <h4><a href="<?php echo e(route('locker.index',['id' => base64_encode($item->id) ])); ?>"
                                                            class="text-muted"><i class="	feather icon-lock"></i></h4>
                                                    <small><?php echo e(__("Locker")); ?></small></a>
                                                </div>
                                                <?php if( Auth::user()->roles->first()->name == 'Super Admin' ): ?>
                                                <div class="col-4">
                                                    <h4> <a href="<?php echo e(route('users.edit',$item->uuid)); ?>"
                                                            class="text-muted"><i class="fa fa-edit text-muted"></i>
                                                    </h4>
                                                    <small><?php echo e(__("Edit")); ?></small></a>
                                                </div>
                                                <?php endif; ?>

                                            </div>
                                            <?php if(auth()->user()->can('users.add')): ?>

                                            <div class="row mb-15">
                                                <div class="col-4 border-right">
                                                    <h4><a href="<?php echo e(route('useraslogin',['id' => $item->id])); ?>"
                                                            class="text-muted"><i class="fa fa-key text-muted"></i>
                                                    </h4>
                                                    <small><?php echo e(__("Login As User")); ?></small></a>
                                                </div>

                                                <div class="col-4 border-right">
                                                    <div class="blog-link">
                                                        <div class="admin-table-action-block">
                                                            <button type="button" class="btn btn-lg-btn-danger"
                                                                data-toggle="modal"
                                                                data-target="#deleteModal<?php echo e($item->id); ?>">
                                                                <h4><i class="feather icon-trash userdelete"></i></h4>
                                                                <small class="text-muted"><?php echo e(__("Delete")); ?></small>
                                                            </button>

                                                            <div id="deleteModal<?php echo e($item->id); ?>"
                                                                class="delete-modal modal fade" role="dialog">
                                                                <div class="modal-dialog modal-sm">

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
                                                                            <?php echo Form::open(['method' =>
                                                                            'DELETE', 'route' =>
                                                                            ['users.destroy', $item->id]]); ?>

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
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                     </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <div class="mx-auto card-pagination">
            <?php echo e($users->links()); ?>


        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<!-- End Contentbar -->
<?php $__env->startSection('script'); ?>

<script>
    $('.rolesdrop').on('change', function () {
        var val = $(this).val();

        const urlParams = new URLSearchParams(window.location.search);

        urlParams.set('roles', val);

        window.location.search = urlParams;

    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\GYM\gym_new\resources\views/manage/users/index.blade.php ENDPATH**/ ?>