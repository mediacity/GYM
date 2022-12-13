
<?php $__env->startSection('title',__('Referal link')); ?>
<?php $__env->startSection('maincontent'); ?>
<?php $__env->startComponent('components.breadcumb',['thirdactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
<?php echo e(__('Referal Link')); ?>

<?php $__env->endSlot(); ?>

<?php $__env->slot('menu1'); ?>
<?php echo e(__('Referal Link')); ?>

<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
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




<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\GYM\gym_new\resources\views/user/affiliate.blade.php ENDPATH**/ ?>