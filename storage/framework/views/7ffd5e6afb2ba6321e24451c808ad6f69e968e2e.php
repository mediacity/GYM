
<?php $__env->startSection('title',__('All Language')); ?>
<?php $__env->startSection('maincontent'); ?>
<!-- Start Breadcrumbbar -->                    
<?php $__env->startComponent('components.breadcumb',['secondaryactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
<?php echo e(__('Language')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Language')); ?>

<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<div class="row">
    <div class="col-md-12">
        <!-- card started -->
        <div class="card">
          <!-- ========= -->
            <!-- to show add button start -->
            <div class="card-header">
            <div class="row align-items-center">
                <div class="col-md-7">
                <div class="card-header">
                    <h5 class="card-title"><?php echo e(__('Language')); ?></h5>
                </div>  
                </div> 
                <div class="col-md-5">
                <div class="widgetbar">
               <a href="<?php echo e(action('LanguageController@create')); ?>" class="float-right btn btn-primary-rgba mr-2"><i class="feather icon-plus mr-2"></i><?php echo e(__('Add Language')); ?></a>
                
           
                </div>
                </div>
            </div>
            </div>
            <!-- to show add button end -->
            <!-- card body started -->
            <div class="card-body">
            <div class="table-responsive">

                    <!-- table to display language start -->
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                        <th>
                            <input id="checkboxAll" type="checkbox" class="filled-in" name="checked[]"
                            value="all" />
                            <label for="checkboxAll" class="material-checkbox"></label>   # 
                        </th>
                        <th><?php echo e(__('Name')); ?></th>
                        <th><?php echo e(__('Language')); ?></th>
                        <th><?php echo e(__('Default')); ?></th>
                        <th><?php echo e(__('Action')); ?></th>
                    </thead>
                    <?php if($languages): ?>
                    <tbody>
                      <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>   <?php echo e($key+1); ?></td>
                        <td><?php echo e($language->name); ?></td>
                        <td><?php echo e($language->language); ?></td>
                        <td>
                          <?php if($language->def ==1): ?>
                            <i class="text-success fa fa-check"></i>
                          <?php else: ?>
                            <i class="text-danger fa fa-times"></i>
                          <?php endif; ?>
                        </td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-round btn-outline-primary" type="button" id="CustomdropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-vertical-"></i></button>
                                <div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton1">

                                    <a class="dropdown-item" href="<?php echo e(route('language.edit', $language->id)); ?>"><i class="feather icon-edit mr-2"></i><?php echo e(__('Edit')); ?></a>

                                    <?php if($language->def !=1): ?>

                                    <a class="dropdown-item btn btn-link" data-toggle="modal" data-target="#delete<?php echo e($language->id); ?>" >
                                        <i class="feather icon-delete mr-2"></i><?php echo e(__("Delete")); ?>

                                    </a>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- delete Modal start -->
                            <div class="modal fade bd-example-modal-sm" id="delete<?php echo e($language->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleSmallModalLabel"><?php echo e(__('Delete')); ?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                                <h4><?php echo e(__('Are You Sure ?')); ?></h4>
                                                <p><?php echo e(__('Do you really want to delete')); ?> <b><?php echo e($language->name); ?></b> ? <?php echo e(__('This process cannot be undone.')); ?></p>
                                        </div>
                                        <div class="modal-footer">
                                            <form method="post" action="<?php echo e(route('language.destroy', $language->id)); ?>" class="pull-right">
                                                <?php echo e(csrf_field()); ?>

                                                <?php echo e(method_field("DELETE")); ?>

                                                <button type="reset" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('No')); ?></button>
                                                <button type="submit" class="btn btn-primary"><?php echo e(__('Yes')); ?></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- delete Model ended -->

                        </td>
                            
                        </tr> 
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                    <?php endif; ?>
                    </table>                  
                    <!-- table to display language data end -->                
                </div><!-- table-responsive div end -->
            </div><!-- card body end -->
        </div><!-- card end -->
    </div><!-- col end -->
</div>
<?php $__env->stopSection(); ?>
<!-- End Breadcrumbbar -->
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\gym_new\resources\views/admin/language/index.blade.php ENDPATH**/ ?>