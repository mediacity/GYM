
<?php $__env->startSection('title',__('All Exercise')); ?>
<?php $__env->startSection('maincontent'); ?>
<!-- Start Breadcrumbbar -->                    
<?php $__env->startComponent('components.breadcumb',['secondaryactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
<?php echo e(__('Exercise')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Exercise')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('button'); ?>
<?php if(Auth::user()->roles->first()->name == 'Trainer' || Auth::user()->roles->first()->name == 'Super Admin' ): ?>
<div class="col-md-12 col-lg-6 text-right">
    <div class="top-btn-block">
        <a href="<?php echo e(route('exercise.create')); ?>" class="btn btn-primary-rgba mr-2"><i class="feather icon-plus mr-2"></i><?php echo e(__("Add")); ?>

            <?php echo e(__("Exercise")); ?></a>
        <button type="button" class="btn btn-danger-rgba mr-2 " data-toggle="modal" data-target="#bulk_delete"><i
                class="feather icon-trash"></i><?php echo e(__(" Delete Selected")); ?></button>
        <a href="<?php echo e(route('ex.index')); ?>" class="btn btn-success-rgba mr-2"><i
            class="feather icon-download-cloud"></i><?php echo e(__("Recycle")); ?></a>
    </div>
</div>
<?php endif; ?>
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<!-- End Breadcrumbbar -->
<div class="row">
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-6">
                        <h5 class="card-title mb-0"><?php echo e(__("All Exercise")); ?></h5>
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
                                        <input id="checkboxAll" type="checkbox" class="filled-in" name="checked[]"
                                            value="all" />
                                        <label for="checkboxAll" class="material-checkbox"></label>
                                    </div>
                                </th>
                                <th> # </th>
                                <th><?php echo e(__("Package Name")); ?></th>
                                <th><?php echo e(__("Session Name")); ?></th>
                                <th><?php echo e(__("Day")); ?></th>
                                <th><?php echo e(__("Exercise name")); ?></th>
                                <!-- <th><?php echo e(__("Detail")); ?></th> -->
                                <th><?php echo e(__("Url")); ?></th>
                                <th><?php echo e(__("Video")); ?></th>
                                <?php if(Auth::user()->roles->first()->name == 'Trainer' ||
                                Auth::user()->roles->first()->name == 'Super Admin' ): ?>
                                <th><?php echo e(__("Status")); ?></th>
                                <th><?php echo e(__("Action")); ?></th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <?php if(isset($exerciselist)): ?>
                        <tbody>
                            <?php $__currentLoopData = $exerciselist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                            <tr>
                                <td>
                                    <div class='inline index-checkbox'>
                                        <input type='checkbox' form='bulk_delete_form'
                                            class='check filled-in material-checkbox-input' name='checked[]'
                                            value=<?php echo e($list->id); ?> id='checkbox<?php echo e($list->id); ?>'>
                                        <label for='checkbox<?php echo e($list->id); ?>' class='material-checkbox'></label>
                                    </div>
                                    <div id="bulk_delete" class="delete-modal modal fade" role="dialog">
                                        <div class="modal-dialog modal-sm">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close"
                                                        data-dismiss="modal">&times;</button>
                                                    <div class="delete-icon"></div>
                                                </div>
                                                <div class="modal-body text-center">
                                                    <h4 class="modal-heading"><?php echo e(__("Are You Sure")); ?></h4>
                                                    <p><?php echo e(__("Do you really want to delete selected item names here? This process cannot be undone")); ?></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <form id="bulk_delete_form" method="post"
                                                        action="<?php echo e(route('exercise.bulk_delete')); ?>">
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
                                <td>
                                    <?php echo e($key+1); ?>

                                </td>
                                <td><?php echo e($list->exercise_package); ?></td>
                                <td>
                                    <?php if($list->session_id): ?>
                                    <?php $__currentLoopData = $list->session_id; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                    $session_id = App\Dietid::find($s);
                                    ?>
                                    <?php if(isset($session_id)): ?>
                                    <span class="badge badge-secondary"><?php echo e(ucfirst($session_id->session_id)); ?></span>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if($list->day): ?>
                                    <?php $__currentLoopData = $list->day; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                    <?php if($list->exercisename): ?>
                                    <?php $__currentLoopData = $list->exercisename; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                    $exercisename = App\Exercisename::find($e);
                                    ?>
                                    <?php if(isset($exercisename)): ?>
                                    <span class="badge badge-success"><?php echo e(ucfirst($exercisename->exercisename)); ?></span>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </td>
                                <!-- <td><?php echo e(str_limit($list->detail , 20)); ?></td> -->
                                <td><a href="<?php echo e($list->url); ?>"><?php echo e(str_limit($list->url, '30')); ?></a></td>

                                <td><a href="<?php echo e(url('image/exercise',$list->video)); ?>" class="btn btn-primary-rgba"><i class="feather icon-eye mr-2"></i><?php echo e(__("Video")); ?></a>
                                </td>
                                <?php if(Auth::user()->roles->first()->name == 'Trainer' ||
                                Auth::user()->roles->first()->name == 'Super Admin' ): ?>
                                <td>
                                    <?php echo Form::open(['method' => 'PUT', 'route' => ['exercise.status', $list->id]]); ?>

                                    <div class="custom-switch">
                                        <?php echo Form::checkbox('is_active', 1, $list->is_active == 1 ? 1 : 0, ['id' =>
                                        'switch'.$list->id,
                                        'class' => 'custom-control-input', 'onChange'=>"this.form.submit()"]); ?>

                                        <label class="custom-control-label" for="switch<?php echo e($list->id); ?>"></label>
                                    </div>
                                    <?php echo Form::close(); ?>

                                </td>
                                <td>
                                    <div class="button-list button-list-two">
                                        <a href="<?php echo e(route('exercise.edit', $list->id ,['id' => app('request')->input('id')])); ?>"
                                            class="btn btn-xm btn-success-rgba"><i class="feather icon-edit-2"></i></a>
                                        <button type="button" class="btn btn-xm btn-danger-rgba" data-toggle="modal"
                                            data-target="#deleteModal<?php echo e($list->id); ?>"><i
                                                class="feather icon-trash"></i></button>
                                    </div>
                                    <!-- Modal -->
                                    <div id="deleteModal<?php echo e($list->id); ?>" class="delete-modal modal fade" role="dialog">
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
                                                    <?php echo Form::open(['method' => 'DELETE', 'route' =>
                                                    ['exercise.destroy', $list->id]]); ?>

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
            </td>
            <?php endif; ?>
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
<script>
    (function($) {
        
      "use strict";
      $(document).ready(function(){
        $(".group1").colorbox({rel:'group1'});
        $(".group2").colorbox({rel:'group2', transition:"fade"});
        $(".group3").colorbox({rel:'group3', transition:"none", width:"75%", height:"75%"});
        $(".group4").colorbox({rel:'group4', slideshow:true});
        $(".ajax").colorbox();
        $(".youtube").colorbox({iframe:true, innerWidth:640, innerHeight:390});
        $(".vimeo").colorbox({iframe:true, innerWidth:500, innerHeight:409});
        $(".iframe").colorbox({iframe:true, width:"50%", height:"50%"});
        $(".inline").colorbox({inline:true, width:"50%"});
        $(".callbacks").colorbox({
          onOpen:function(){ alert('onOpen: colorbox is about to open'); },
          onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
          onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
          onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
          onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
        });
        $('.non-retina').colorbox({rel:'group5', transition:'none'})
        $('.retina').colorbox({rel:'group5', transition:'none', retinaImage:true, retinaUrl:true});
        $("#click").click(function(){
          $('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
          return false;
        });
      });
      
    })(jQuery);
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\GYM\gym_new\resources\views/admin/exercise/index.blade.php ENDPATH**/ ?>