
<?php $__env->startSection('title',__('All Diet')); ?>
<?php $__env->startSection('maincontent'); ?>
<!-- Start Breadcrumbbar -->                    
<?php $__env->startComponent('components.breadcumb',['secondaryactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
<?php echo e(__('Diet')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Diet')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('button'); ?>
<div class="col-md-12 col-lg-6 text-right">
    <div class="top-btn-block">
        <?php if(auth()->user()->can('diet.add')): ?>
        <a href="<?php echo e(route('diet.create')); ?>" class="btn btn-primary-rgba mr-2"><i class="feather icon-plus mr-2"></i><?php echo e(__("Add Diet")); ?></a>
        <button type="button" class="btn btn-danger-rgba mr-2 " data-toggle="modal" data-target="#bulk_delete"><i class="feather icon-trash"></i><?php echo e(__(" Delete Selected")); ?></button>
        <a href="<?php echo e(route('die.index')); ?>" class="btn btn-success-rgba mr-2"><i class="feather icon-download-cloud"></i><?php echo e(__("Recycle")); ?></a>
        <?php endif; ?>
    </div>
</div>
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
<div class="row">
    <div class="col-md-12">
         <div class="card">
            <div class="card-header">
                <h5 class="card-title"><?php echo e(__('Diets')); ?></h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="userstable" class="table table-borderd">
                         <thead>
                          <th>
                               <div class="inline index-checkbox">
                                <input id="checkboxAll" type="checkbox" class="filled-in" name="checked[]"
                                    value="all" />
                                <label for="checkboxAll" class="material-checkbox"></label>
                            </div>
                        </th>
                            <th>
                                #
                            </th>
                            <th>
                                <?php echo e(__("Image")); ?>

                            </th>
                            <th>
                              <?php echo e(__("Diet Name")); ?>

                            </th>
                            <th>
                                <?php echo e(__("Description")); ?>

                            </th>
                            <th>
                                <?php echo e(__("Included Content")); ?>

                            </th>

                            <th>
                               <?php echo e(__(" Diet Day")); ?>

                            </th>
                            <th>
                              <?php echo e(__("  Session")); ?>

                            </th>
                            <?php if(auth()->user()->can('diet.view')): ?>
                            <th>
                                <?php echo e(__("Status")); ?>

                            </th>
                             <th>
                                <?php echo e(__("Action")); ?>

                            </th>
                            <?php endif; ?>

                        </thead>
                         <tbody>
                            <?php $__currentLoopData = $diet; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                             <tr>
                               <td>
                            <div class='inline index-checkbox'>
                                <input type='checkbox' form='bulk_delete_form' class='check filled-in material-checkbox-input'
                                    name='checked[]' value=<?php echo e($item->id); ?> id='checkbox<?php echo e($item->id); ?>'>
                                <label for='checkbox<?php echo e($item->id); ?>' class='material-checkbox'></label>
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
                                            <form id="bulk_delete_form" method="post"
                                                action="<?php echo e(route('diet.bulk_delete')); ?>">
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
                                    <?php if($item->image != '' &&
                                    file_exists(public_path().'/image/diet/'.$item->image)): ?>

                                    <img width="150px" height="150px" class="margin-top-15" 
                                        src="<?php echo e(url('image/diet/'.$item->image)); ?>" title="<?php echo e($item->dietname); ?>">
                                    <?php else: ?>
                                    <img width="150px" height="150px" class="margin-top-15" 
                                        title="<?php echo e($item->dietname); ?>" src="<?php echo e(Avatar::create($item->dietname)->toBase64()); ?>" />
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($item -> dietname); ?></td>
                                <td><?php echo e(Str::limit($item->description, 30)); ?></td>
                                <td>
                                     <?php if(count($item->diethascontent)>0): ?>
                                    <?php $__currentLoopData = $item->diethascontent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <span class="badge badge-success">
                                        <?php echo e($content->content); ?>

                                    </span>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                    <?php echo e(__("Not set")); ?>

                                    <?php endif; ?>
                                </td>
                                <td>
                                 <?php if($item->day): ?>
                                    <?php $__currentLoopData = $item->day; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                    $day = App\Day::find($d);
                                    ?>
                                    <?php if(isset($day)): ?>
                                    <span class="badge badge-primary"><?php echo e(ucfirst($day->day)); ?></span>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>

                                </td>
                                <td> 
                                  <?php if($item->session_id): ?>
                                    <?php $__currentLoopData = $item->session_id; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                    $session_id = App\Dietid::find($s);
                                    ?>
                                    <?php if(isset($session_id)): ?>
                                    <span class="badge badge-secondary"><?php echo e(ucfirst($session_id->session_id)); ?></span>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?> 
                                    <?php if(auth()->user()->can('diet.view')): ?>
                                    <td>
                                    <?php echo Form::open(['method' => 'PUT', 'route' => ['diet.status', $item->id]]); ?>

                                    <div class="custom-switch">
                                        <?php echo Form::checkbox('is_active', 1, $item->is_active == 1 ? 1 : 0, ['id' =>
                                        'switch'.$item->id, 'class' => 'custom-control-input',
                                        'onChange'=>"this.form.submit()"]); ?>

                                        <label class="custom-control-label" for="switch<?php echo e($item->id); ?>"></label>
                                    </div>
                                    <?php echo Form::close(); ?>

                                </td>
                                <td>
                                    <div class="btn-group mr-2">
                                        <div class="dropdown">
                                            <button class="btn btn-round btn-primary-rgba" type="button"
                                                id="CustomdropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false"><i class="feather icon-more-vertical-"></i></button>
                                            <div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton3">
                                                
                                                <a class="dropdown-item" href="<?php echo e(route('diet.edit', $item->id ,['id' => app('request')->input('id')])); ?>"
                                                    class="btn btn-xs btn-success-rgba"><i
                                                        class="feather icon-edit-2 mr-2"></i><?php echo e(__("Edit")); ?></a>
                                                <button  class="dropdown-item" type="button" data-toggle="modal" class="btn btn-primary-rgba"
                                                    data-target="#deleteModal<?php echo e($item->id); ?>"><i
                                                        class="feather icon-trash mr-2"></i><?php echo e(__("Delete")); ?></button>
                                                
                                            </div>
                                        </div>
                                    </div>
                                  </td>
                                <div id="deleteModal<?php echo e($item->id); ?>" class="delete-modal modal fade" role="dialog">
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
                                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['diet.destroy',
                                                $item->id]]); ?>

                                                <button type="submit" class="btn btn-danger"><?php echo e(__("Yes")); ?></button>
                                                <?php echo Form::close(); ?>

                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\GYM\gym_new\resources\views/admin/diet/index.blade.php ENDPATH**/ ?>