
<?php $__env->startSection('title',__('All Diet')); ?>
<?php $__env->startSection('breadcum'); ?>
<div class="breadcrumbbar breadcrumbbar-one">
    <div class="row align-items-center">
        <div class="col-lg-4 col-md-5">
            <h4 class="page-title"><?php echo e(__("Diet")); ?></h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <?php echo e(__('Diet')); ?>

                    </li>
                </ol>
            </div>
        </div>
        <?php if(auth()->user()->can('users.add')): ?>
        <div class="col-lg-8 col-md-7">
            <div class="top-btn-block text-right">
              <a href="<?php echo e(route('dietpackage.create',['id' => app('request')->input('id')])); ?>"
              class="btn btn-primary-rgba mr-2"><i class="feather icon-plus mr-2"></i><?php echo e(__("Add Diet")); ?></a>
              <button type="button" class="btn btn-danger-rgba mr-2 " data-toggle="modal" data-target="#bulk_delete"><i
                class="feather icon-trash"></i> <?php echo e(__("Delete Selected")); ?></button>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
<!-- Start Contentbar -->
<div class="row">
  <!-- Start col -->
  <div class="col-lg-12">
    <div class="card m-b-30">
      <div class="card-header">
        <div class="row align-items-center">
          <div class="col-6">
            <h5 class="card-title mb-0"><?php echo e(__("All Diet")); ?></h5>
          </div>

        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="datatable-buttons" class="table table-border">
            <thead>
              <tr>
                <th>
                  <div class="inline index-checkbox">
                    <input id="checkboxAll" type="checkbox" class="filled-in" name="checked[]" value="all" />
                    <label for="checkboxAll" class="material-checkbox"></label>
                  </div>
                </th>
                <th>
                  #</th>
                <th><?php echo e(__("User")); ?></th>
                <th><?php echo e(__("Description")); ?></th>
                <th><?php echo e(__("Diet")); ?></th>
                <th><?php echo e(__("Session")); ?></th>
                <th><?php echo e(__("Day")); ?></th>
                <?php if(Auth::user()->roles->first()->name == 'Trainer' || Auth::user()->roles->first()->name == 'Super
                Admin' ): ?>
                <th><?php echo e(__("Status")); ?></th>
                <th><?php echo e(__("Action")); ?></th>
                <?php endif; ?>
              </tr>
            </thead>
            <?php if(isset($dietpackages)): ?>
            <tbody>
              <?php $__currentLoopData = $dietpackages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td>
                  <div class='inline index-checkbox'>
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
                          <form id="bulk_delete_form" method="post" action="<?php echo e(route('dietpackage.bulk_delete')); ?>">
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
                <td> <?php echo e($list->user['name']); ?></td>
                <td>
                  <?php echo e($list->diet->description); ?>

                </td>
                <td>
                  <?php if($list->diet_package): ?>
                  <?php $__currentLoopData = $list->diet_package; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php
                  $package_u = App\Diet::where('id', $d)->first();
                  ?>
                  <?php if(isset($package_u)): ?>
                  <span class="badge badge-primary"><?php echo e(ucfirst($package_u->dietname)); ?></span>
                  <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
                </td>
                <td>
                  <?php $__currentLoopData = $list->diet->session_id; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php
                  $session = App\Dietid::find($value);
                  ?>
                  <?php if(isset($session)): ?>
                  <?php echo e($session->session_id); ?>

                  <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </td>
                <td>
                  <?php $__currentLoopData = $list->diet->day; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php
                  $day = App\Day::find($value);
                  ?>
                  <?php if(isset($day)): ?>
                  <?php echo e($day->day); ?>

                  <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </td>
                <?php if(Auth::user()->roles->first()->name == 'Trainer' || Auth::user()->roles->first()->name == 'Super
                Admin' ): ?>
                <td>
                  <?php echo Form::open(['method' => 'PUT', 'route' => ['dietpackage.status', $list->id]]); ?>

                  <div class="custom-switch">
                    <?php echo Form::checkbox('is_active', 1, $list->is_active == 1 ? 1 : 0, ['id' => 'switch'.$list->id,
                    'class' => 'custom-control-input', 'onChange'=>"this.form.submit()"]); ?>

                    <label class="custom-control-label" for="switch<?php echo e($list->id); ?>"></label>
                  </div>
                  <?php echo Form::close(); ?>

                </td>
                <td>
                  <div class="button-list">
                    <a href="<?php echo e(route('dietpackage.edit', $list->id)); ?>" class="btn btn-xm btn-success-rgba"><i
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
                            <?php echo Form::open(['method' => 'DELETE', 'route' => ['exercisepackage.destroy', $list->id]]); ?>

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
<!-- End Contentbar -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
  $("#checkboxAll").on('click', function () {
    $('input.check').not(this).prop('checked', this.checked);
  });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\GYM\resources\views/admin/dietpackage/index.blade.php ENDPATH**/ ?>