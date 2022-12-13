
<?php $__env->startSection('title',__('All Products')); ?>
<?php $__env->startSection('maincontent'); ?>
<!-- Start Breadcrumbbar -->                    
<?php $__env->startComponent('components.breadcumb',['secondaryactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
<?php echo e(__('Products')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Products')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('button'); ?>
<?php if(Auth::user()->roles->first()->name == 'Trainer' || Auth::user()->roles->first()->name == 'Super Admin' ): ?>
<div class="col-md-12 col-lg-6 text-right">
  <div class="top-btn-block">
    <a href="<?php echo e(route('supplement.create')); ?>" class="btn btn-primary-rgba mr-2"><i class="feather icon-plus mr-2"></i> <?php echo e(__("Add
    Products")); ?></a>
    <button type="button" class="btn btn-danger-rgba mr-2 " data-toggle="modal" data-target="#bulk_delete"><i
      class="feather icon-trash"></i> <?php echo e(__("Delete Selected")); ?></button>
    <a href="<?php echo e(route('sup.index')); ?>" class="btn btn-success-rgba mr-2"><i
      class="feather icon-download-cloud"></i><?php echo e(__("Recycle")); ?></a>
  </div>
</div>
<?php endif; ?>
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<!-- End Breadcrumbbar -->
<!-- Start col -->
<div class="col-lg-12">
  <div class="card m-b-30">
    <div class="card-header">
      <div class="row align-items-center">
        <div class="col-6">
          <h5 class="card-title mb-0"><?php echo e(__("All Supplement")); ?></h5>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table id="datatable-buttons" class="table table-border">
          <thead>
            <tr>
              <th>
                <div class="inline">
                  <input id="checkboxAll" type="checkbox" class="filled-in" name="checked[]" value="all" />
                  <label for="checkboxAll" class="material-checkbox"></label>
                </div>
              </th>
              <th>
                #
              </th>
              <th><?php echo e(__("Name/Image")); ?></th>
              <th><?php echo e(__("Link")); ?></th>
              <th><?php echo e(__("Detail")); ?></th>
              <th><?php echo e(__("Price")); ?></th>
              <th><?php echo e(__("Offerprice")); ?></th>
              <?php if(Auth::user()->roles->first()->name == 'Trainer' || Auth::user()->roles->first()->name == 'Super Admin'
              ): ?>
              <th><?php echo e(__("Status")); ?></th>
              <th><?php echo e(__("Action")); ?></th>
              <?php endif; ?>
            </tr>
          </thead>
          <?php if(isset($supplement)): ?>
          <tbody>
            <?php $__currentLoopData = $supplement; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                        <form id="bulk_delete_form" method="post" action="<?php echo e(route('supplement.bulk_delete')); ?>">
                          <?php echo csrf_field(); ?>
                          <?php echo method_field('POST'); ?>
                          <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal"><?php echo e(__("No")); ?></button>
                          <button type="submit" class="btn btn-danger"><?php echo e(__("Yes")); ?></button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
              <td>
                <?php echo e($key+1); ?>

              </td>
              <td>
                <?php if($list->image != '' && file_exists(public_path().'/image/supplements/'.$list->image)): ?>
                <img title="<?php echo e($list->name); ?> " class="img-rounded img-fluid"
                  src="<?php echo e(url('/image/supplements/'.$list->image)); ?>" width="70px" height="70px">
                <?php else: ?>
                <img class="rounded img-fluid" width="70px" title="<?php echo e($list->name); ?> "
                  src="<?php echo e(url('/image/default/default.jpg')); ?>" alt="No Photo">
                <?php endif; ?>
                <br>
                <?php echo e($list->name); ?>

              </td>
              <td><a href="<?php echo e($list->link); ?>"><?php echo e(str_limit($list->link, '30')); ?></a></td>

              <td><?php echo e(str_limit($list->detail,'10')); ?></td>
              <td><?php echo e('$'.($list->price)); ?></td>
              <td>
                <?php if(($list->offerprice)>0): ?> <span class="badge badge-success">

                  <?php echo e('$'.(ucfirst($list->offerprice))); ?> </span> <?php else: ?>
                <?php echo e(__("Not set")); ?>

                <?php endif; ?>
              </td>
              <?php if(Auth::user()->roles->first()->name == 'Trainer' || Auth::user()->roles->first()->name == 'Super Admin'
              ): ?>
              <td>
                <?php echo Form::open(['method' => 'PUT', 'route' => ['supplement.status', $list->id]]); ?>

                <div class="custom-switch">
                  <?php echo Form::checkbox('is_active', 1, $list->is_active == 1 ? 1 : 0, ['id' => 'switch'.$list->id, 'class'
                  => 'custom-control-input', 'onChange'=>"this.form.submit()"]); ?>

                  <label class="custom-control-label" for="switch<?php echo e($list->id); ?>"></label>
                </div>
                <?php echo Form::close(); ?>

              </td>
              <td>
                <div class="button-list">
                  <a href="<?php echo e(route('supplement.edit', $list->id)); ?>" class="btn btn-xm btn-success-rgba"><i
                      class="feather icon-edit-2"></i></a>
                  <button type="button" class="btn btn-xm btn-danger-rgba" data-toggle="modal"
                    data-target="#deleteModal<?php echo e($list->id); ?>"><i class="feather icon-trash"></i></button>
                  <!-- Modal -->
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
                          <?php echo Form::open(['method' => 'DELETE', 'route' => ['supplement.destroy', $list->id]]); ?>

                          <button type="reset" class="btn btn-dark" data-dismiss="modal"><?php echo e(__("No")); ?></button>
                          <button type="submit" class="btn btn-danger"><?php echo e(__("Yes")); ?></button>
                          <?php echo Form::close(); ?>

                        </div>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
          <?php endif; ?>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- End col -->
</div>
<!-- End row -->
</div>
<!-- End Contentbar -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
  $("#checkboxAll").on('click', function () {
    $('input.check').not(this).prop('checked', this.checked);
  });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\GYM\gym_new\resources\views/admin/supplement/index.blade.php ENDPATH**/ ?>