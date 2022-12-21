
<?php $__env->startSection('title',__('Referal link')); ?>
<?php $__env->startSection('breadcum'); ?>
<div class="breadcrumbbar breadcrumbbar-one">
    <div class="row align-items-center">
        <div class="col-lg-4 col-md-5">
            <h4 class="page-title"><?php echo e(__("Referal Link")); ?></h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <?php echo e(__('Referal Link')); ?>

                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
<div class="shadow-sm mt-3 card text-center">
    <div class="card-body">
        <div class="form-group">
            <input type="text" readonly class="text-dark text-center form-control cptext" value="<?php echo e(route('register',['refercode' => auth()->user()->refer_code ])); ?>">
        </div>
      <a href="#" class="copylink btn btn-primary">
          <?php echo e(__("CopyLink")); ?>

      </a>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $('.copylink').on('click', function () {
            $(this).text('Copied !');
            var copyText = $('.cptext').val();
            console.log(copyText);
            $('.cptext').select();
            document.execCommand("copy");
        });
    </script>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\GYM\resources\views/user/affiliate.blade.php ENDPATH**/ ?>