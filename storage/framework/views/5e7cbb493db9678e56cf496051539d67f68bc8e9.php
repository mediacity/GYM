 <!-- Start Form -->
<form method="post" action="<?php echo e(route('multicurrency.default',$id)); ?>">
 <?php if($currencyid !=NULL): ?>
<input data-toggle="modal" checked data-target="#curModal<?php echo e($id); ?>" type="radio" name="default_currency" value="<?php echo e($id); ?>"/>
<?php else: ?>
<input data-toggle="modal"  data-target="#curModal<?php echo e($id); ?>" type="radio" name="default_currency" value="<?php echo e($id); ?>"/>
<?php endif; ?>
<div class="modal fade" id="curModal<?php echo e($id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__("Modal title")); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
      <h4 class="modal-heading"><?php echo e(__("Are You Sure ?")); ?></h4>
                    <p><?php echo e(__("Do you want to make")); ?> <b><?php echo e($code); ?></b><?php echo e(__(" default currency ?")); ?></p>
                     <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <button type="submit" class="btn btn-md btn-primary">
            <i class="fa fa-save"></i> <?php echo e(__("Change ?")); ?>

        </button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo e(__("Cancel")); ?></button>
        </form>
       </div>
      </div>
  </div>
</div>
<!-- End Form -->
<?php /**PATH C:\laragon\www\GYM\resources\views/admin/multicurrency/default.blade.php ENDPATH**/ ?>