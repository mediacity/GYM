
<?php $__env->startSection('title',__('All Blogs')); ?>
<?php $__env->startSection('breadcum'); ?>
	<div class="breadcrumbbar breadcrumbbar-one">
        <div class="row align-items-center">
            <div class="col-md-4 col-lg-5">
                <h4 class="page-title"><?php echo e(__("Blogs")); ?></h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard.index')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                        	<?php echo e(__('Blogs')); ?>

                        </li>
                    </ol>
                </div>
            </div>
        </div>          
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
<!-- Start Contentbar -->
<div class="row">
    <div class="col-md-5 col-lg-4">
        <form action="" method="get">
            <div class="input-group mb-4">
                <input type="search" for="search" id="search" onsearch="OnSearch(this)" name="search"
                    value="<?php echo e(app('request')->input('search')); ?>" class="form-control" placeholder="<?php echo e(__("Search")); ?>">
                <span class="input-group-prepend">
                    <button type="submit" class="btn btn-primary"><i
                            class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <?php if(app('request')->input('search') != ''): ?>
        <a role="button" title="Back" href="<?php echo e(route('blog.index')); ?>" name="clear" value="search" id="clear_id"
            class="btn btn-warning btn-xs">
            <?php echo e(__("Clear Search")); ?>

        </a>
        <?php endif; ?>
    </div>
    <div class="col-md-7 col-lg-8">
        <div class="top-btn-block text-right">
            <a href="<?php echo e(route('blog.create')); ?>" class="btn btn-primary-rgba mr-2"><i class="feather icon-plus mr-2"></i><?php echo e(__("Add blog")); ?></a>
            <a href="<?php echo e(route('blo.index')); ?>" class="btn btn-success-rgba mr-2"><i class="feather icon-download-cloud mr-2"></i><?php echo e(__("Recycle")); ?></a>
            <br><br>
        </div>
    </div>
</div>
<div class="blog-admin-main-block">
    <div class="row">
        <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-6 col-lg-6 col-xl-4">
            <div class="card m-b-30">
                <div class="blog-admin-img">
                    <?php if($item->image != '' &&
                    file_exists(public_path().'/image/blog/'.$item->image)): ?>
                    <img title="<?php echo e($item->title); ?> " class="img-rounded img-fluid blog-img" src="<?php echo e(url('/image/blog/'.$item->image)); ?>"
                    >
                    <?php else: ?>
                    <img class="rounded img-fluid blog-img" title="<?php echo e($item->name); ?> " src="<?php echo e(url('/image/default/default.jpg')); ?>"
                        alt="No Photo">
                    <?php endif; ?>
                </div>
                <div class="blog-admin-badge">
                    <p class="text-center mb-3"><span class="badge badge-danger text-uppercase"><?php echo e($item->title); ?></span></p>
                </div>
                <div class="card-body">
                    <h5 class="card-title font-18"><?php echo e($item->category['title']); ?></h5>
                    <p class="read-more"><?php echo str_limit(strip_tags($item->detail) , 50); ?>

                        <?php if( strlen(strip_tags($item->detail)) > 50): ?>
                        <?php endif; ?>
                    </p>
                </div>
                <div class="card-footer blog-footer">
                    <div class="row align-items-center">
                        <div class="col-md-7">
                            <div class="blog-meta">
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item"><?php echo e(__("By")); ?> <a href="<?php echo e(route('users.index') ,$item->id); ?>"><strong><?php echo e($item->user?$item->user->name:''); ?></strong></a></li>
                                    <li class="list-inline-item">|</li>
                                    <li class="list-inline-item"><?php echo e($item->created_at->format('Y-m-d')); ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="blog-link">
                                <div class="admin-table-action-block">
                                    <a href="<?php echo e(route('blog.edit', $item->id)); ?>" class="btn btn-xm btn-success-rgba"><i
                                            class="feather icon-edit-2"></i></a>
                                            <button type="button" class="btn btn-xm btn-danger-rgba" data-toggle="modal"
                                        data-target="#deleteModal<?php echo e($item->id); ?>"><i class="feather icon-trash"></i></button>

                                    <div id="deleteModal<?php echo e($item->id); ?>" class="delete-modal modal fade" role="dialog">
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
                                                    <?php echo Form::open(['method' => 'DELETE', 'route' =>
                                                    ['blog.destroy', $item->id]]); ?>

                                                    <button type="reset" class="btn btn-dark"
                                                        data-dismiss="modal"><?php echo e(__("No")); ?></button>
                                                    <button type="submit" class="btn btn-danger"><?php echo e(__("Yes")); ?></button>
                                                    <?php echo Form::close(); ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<div class="mx-auto card-pagination">
    <?php echo e($blogs->appends(request()->except('page'))->links()); ?>

</div>
<!-- End Contentbar -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\GYM\resources\views/admin/blog/index.blade.php ENDPATH**/ ?>