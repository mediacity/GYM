
<?php $__env->startSection('title',__('All Enquiry')); ?>
<?php $__env->startSection('maincontent'); ?>
<!-- Start Breadcrumbbar -->
<?php $__env->startComponent('components.breadcumb',['secondaryactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
<?php echo e(__('Enquiry')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('All Enquiry')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('button'); ?>
<div class="col-md-12 col-lg-6 text-right">
    <div class="breadcrumb-btn"> 
        <?php if(auth()->user()->can('enquiry.add')): ?>
        <a href="<?php echo e(route('enquiry.create')); ?>" class="btn btn-primary-rgba mr-2"><i class="feather icon-plus mr-2"></i><?php echo e(__("Add")); ?>

            <?php echo e(__("Enquiry")); ?></a>
        <button type="button" class="btn btn-danger-rgba mr-2 " data-toggle="modal" data-target="#bulk_delete"><i
                class="feather icon-trash"></i><?php echo e(__(" Delete Selected")); ?></button>
        <a href="<?php echo e(route('enq.index')); ?>" class="btn btn-success-rgba mr-2"><i
                class="feather icon-download-cloud mr-2"></i><?php echo e(__("Recycle")); ?></a>
        <a href="javascript:void(0)" id="infobar-settings-open" class="btn btn-warning-rgba mr-2">
            <i class="feather icon-filter mr-2"><?php echo e(__("Filter")); ?></i>
        </a>
        <div id="infobar-settings-sidebar" class="infobar-settings-sidebar">
            <div class="infobar-settings-sidebar-head d-flex justify-content-between">
                <h4><?php echo e(__("Filter")); ?></h4>
                <a href="javascript:void(0)" id="infobar-settings-close"
                    class="infobar-settings-close"><i class="feather icon-x"></i></a>
            </div>
            <form action="" method="get" class="filterForm">
                <div class="infobar-settings-sidebar-body">
                <div class="custom-mode-setting">
                    <div class="row align-items-center pb-3">
                        <div class="col-8 text-left">
                            <h6 class="mb-0"><?php echo e(__("Age")); ?></h6>
                        </div>
                        <div class="col-4 text-right">
                            <div class="custom-switch">
                                <input type="checkbox" id="switch" class="custom-control-input js-switch-setting-first question1" value="1">
                                <label class="custom-control-label" for="switch"></label>
                            </div>
                        </div>
                        <div class="myclass1  text-right col-md-6 offset-md-6" style="display:none" >
                            <select required="" name="age" id="purpose" class="form-control select2">
                                <option value="Not set"><?php echo e(__("Select Age")); ?></option>
                                <option value="0-18"><?php echo e(__("0-18")); ?></option>
                                <option value="19-25"><?php echo e(__("19-25")); ?></option>
                                <option value="26-35"><?php echo e(__("26-35")); ?></option>
                                <option value="35-50"><?php echo e(__("35-50")); ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="row align-items-center pb-3">
                        <div class="col-8 text-left">
                            <h6 class="mb-0"><?php echo e(__("Occupation")); ?></h6>
                        </div>
                        <div class="col-4 text-right">
                            <div class="custom-switch">
                                <input type="checkbox" id="switch-one" class="custom-control-input js-switch-setting-second question2" value="1">
                                <label class="custom-control-label" for="switch-one"></label>
                            </div>
                        </div>
                        <div  class="myclass2 text-right col-md-6 offset-md-6" style="display:none" >
                            <select autofocus="" class="form-control select2" name="occupation_id">
                                <option value=""><?php echo e(__("Select Occupation")); ?></option>
                                <?php $__currentLoopData = $occupations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $occupation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($occupation->id); ?>"><?php echo e($occupation->occupation); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="row align-items-center pb-3">
                        <div class="col-8 text-left">
                            <h6 class="mb-0"><?php echo e(__("Status")); ?></h6>
                        </div>
                        <div class="col-4 text-right">
                            <div class="custom-switch">
                                <input type="checkbox" id="switch-two" class="custom-control-input js-switch-setting-third question3" value="1">
                                <label class="custom-control-label" for="switch-two"></label>
                            </div>
                        </div>
                    </div>
                   <div  class="myclass3  text-right col-md-6 offset-md-6" style="display:none">
                        <select data-placeholder="<?php echo e(__("Please select status")); ?>" class="form-control select2"
                        name="status">
                        <option selected><?php echo e(__("Please select status")); ?></option>
                         <option value="demo"><?php echo e(__("Demo")); ?></option>
                        <option value="close"><?php echo e(__("Close")); ?></option>
                        <option value="join"><?php echo e(__("Join")); ?></option>
                        <option value="pending"><?php echo e(__("Pending")); ?></option>
                     </select>
                    </div>
                    <div class="row align-items-center pb-3">
                        <div class="col-8 text-left">
                            <h6 class="mb-0"><?php echo e(__("Purpose")); ?></h6>
                        </div>
                        <div class="col-4 text-right">
                            <div class="custom-switch">
                                <input type="checkbox" id="switch-third" class="custom-control-input js-switch-setting-fourth question4" value="1">
                                <label class="custom-control-label" for="switch-third"></label>
                            </div>
                        </div>
                        <div   class="myclass4 text-right col-md-6 offset-md-6" style="display:none">
                            <select required="" name="purpose" id="purpose" class="form-control select2">
                                <option value="Not set"><?php echo e(__("Select Purpose")); ?></option>
                                <option value="Gym"><?php echo e(__("Gym")); ?></option>
                                <option value="Diet"><?php echo e(__("Diet")); ?></option>
                                <option value="Yoga"><?php echo e(__("Yoga")); ?></option>
                                <option value="Aerobics"><?php echo e(__("Aerobics")); ?></option>
                                <option value="Others"><?php echo e(__("Others")); ?></option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-12 text-center">
                    <button type="reset" class="btn btn-danger-rgba reset-btn"><i class="fa fa-ban"></i> <?php echo e(__("Disable Filter")); ?></button>
                    <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                        <?php echo e(__("Apply Filter")); ?></button>
                </div>
            </div>
            </form>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
<div class="contentbar mb-5">
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12 col-xl-12">
          <div class="card">
    <div class="card-header">
         <div class="row align-items-center">
            <div class="col-6">
                <h5 class="card-title mb-0"><?php echo e(__("All Enquiry")); ?></h5>
            </div>
        </div>
         <div class="card-body px-0">
            <div class="table-responsive">
                <table class="table table-borderd">
                    <thead>
                        <tr>
                            <th>
                                <div class="inline">
                                    <input id="checkboxAll" type="checkbox" class="filled-in" name="checked[]"
                                        value="all" />
                                    <label for="checkboxAll" class="material-checkbox"></label>
                                </div>
                            </th>
                            <th>#</th>
                            <th><?php echo e(__("Enquiry Date")); ?></th>
                            <th><?php echo e(__("Enquiry ID")); ?></th>
                            <th><?php echo e(__("Name")); ?></th>
                            <th><?php echo e(__("Email")); ?></th>
                            <th><?php echo e(__("Mobile No.")); ?></th>
                            <th><?php echo e(__("Purpose")); ?></th>
                            <th><?php echo e(__("Age")); ?></th>
                            <th><?php echo e(__("Occupation")); ?></th>
                            <th><?php echo e(__("Cost")); ?></th>
                            <th><?php echo e(__("Health Issue")); ?></th>
                            <th><?php echo e(__("Status")); ?></th>
                            <?php if(auth()->user()->can('enquiry.view')): ?>
                            <th><?php echo e(__("Actions")); ?></th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <?php if(isset($enquiry)): ?>
                    <tbody>
                        <?php $__currentLoopData = $enquiry; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <div class='inline index-checkbox'>
                                    <input type='checkbox' form='bulk_delete_form'
                                        class='check filled-in material-checkbox-input' name='checked[]'
                                        value=<?php echo e($list->id); ?> id='checkbox<?php echo e($list->id); ?>'>
                                    <label for='checkbox$row->enquiryid' class='material-checkbox'></label>
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
                                                <h4 class="modal-heading"><?php echo e(__("Are You Sure ?")); ?></h4>
                                                <p><?php echo e(__("Do you really want to delete selected item names here? This process cannot be undone.")); ?></p>
                                            </div>
                                            <div class="modal-footer">
                                                <form id="bulk_delete_form" method="post"
                                                    action="<?php echo e(route('enquiry.bulk_delete')); ?>">
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
                            <td><?php echo e($list -> created_at); ?></td>
                            <td><?php echo e($list -> enid); ?></td>
                            <td><?php echo e(ucfirst($list->name)); ?> </td>
                            <td><?php echo e($list -> email); ?></td>
                            <td><?php echo e($list -> mobile); ?></td>
                            <td><?php echo e($list -> purpose); ?></td>
                            <td><?php echo e($list -> age); ?></td>
                            <td><?php echo e($list -> occupation['occupation'] ?? '-'); ?></td>
                            <td><?php echo e($list -> cost['cost'] ?? '-'); ?></td>
                            <td>
                                <?php if($list->issue): ?>
                                <?php $__currentLoopData = $list->issue; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($d == 'NO'): ?>
                                <span class="badge badge-success"><?php echo e(__("NO Health Issues")); ?></span>
                                <?php else: ?>
                                <?php
                                $issue = App\Enquiryhealth::find($d);
                                 ?>
                                 <?php if(isset($issue)): ?>
                                 <span class="badge badge-primary"><?php echo e(ucfirst($issue->issue)); ?></span>
                                 <?php endif; ?>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($list->status == 'demo'): ?> <span
                                    class="badge badge-primary"><?php echo e($list->status == 'demo' ? "Demo" : ""); ?></span>

                                <?php elseif($list->status == 'close'): ?> <span
                                    class="badge badge-danger"><?php echo e($list->status == 'close' ? "Close" : ""); ?></span>

                                <?php elseif($list->status == 'pending'): ?> <span
                                    class="badge badge-secondary"><?php echo e($list->status == 'pending' ? "Pending" : ""); ?></span>

                                <?php elseif($list->status == 'join'): ?> <span
                                    class="badge badge-success"><?php echo e($list->status == 'join' ? "Join" : ""); ?></span>
                                <?php else: ?>

                                <?php endif; ?>
                            </td>
                            <?php if(Auth::user()->roles->first()->name == 'Trainer' || Auth::user()->roles->first()->name ==
                            'Super Admin' ): ?>
                            <td>
                                 <div class="btn-group mr-2">
                                    <div class="dropdown">
                                        <button class="btn btn-round btn-primary-rgba" type="button"
                                            id="CustomdropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false"><i class="feather icon-more-vertical-"></i></button>
                                        <div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton3">
                                            <a class="dropdown-item" href="<?php echo e(route('enquiry.show',$list->id )); ?>"
                                                class="btn btn-primary-rgba"><i class="feather icon-file mr-2"></i><?php echo e(__("Show")); ?></a>
                                            <a class="dropdown-item" href="<?php echo e(route('enquiry.edit',$list->id )); ?>"
                                                class="btn btn-xs btn-success-rgba"><i
                                                    class="feather icon-edit-2 mr-2"></i><?php echo e(__("Edit")); ?></a>
                                            <button class="dropdown-item" type="button" data-toggle="modal"
                                                class="btn btn-primary-rgba" data-target="#deleteModal<?php echo e($list->id); ?>"><i
                                                    class="feather icon-trash mr-2"></i><?php echo e(__("Delete")); ?></button>
                                            <a class="dropdown-item" href="<?php echo e(route('followup.index')); ?>"><i
                                                    class="fa fa-calendar mr-2"></i><?php echo e(__("Followup")); ?></a>
                                        </div>
                                    </div>
                                </div>

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
                                                <button type="reset" class="btn btn-dark"
                                                    data-dismiss="modal"><?php echo e(__("No")); ?></button>
                                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['enquiry.destroy',
                                                $list->id]]); ?>


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
                    <?php else: ?>
                   <?php echo e(__(" 'No Result Found'")); ?>

                    <?php endif; ?>
                </table>
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
<script>
    $(document).ready(function(){
        $(".reset-btn").click(function(){
           var uri = window.location.toString();

            if (uri.indexOf("?") > 0) {

                var clean_uri = uri.substring(0, uri.indexOf("?"));

                window.history.replaceState({}, document.title, clean_uri);

            }

            location.reload();
        });
    });
</script>
<script type="text/javascript">
 $(".question1").click(function() {
    if($(this).is(":checked")) {
        $(".myclass1").show(300);
    } else {
        $(".myclass1").hide(200);
    }
});
</script>
<script type="text/javascript">
 $(".question2").click(function() {
    if($(this).is(":checked")) {
        $(".myclass2").show(300);
    } else {
        $(".myclass2").hide(200);
    }
});
</script>
<script type="text/javascript">
 $(".question3").click(function() {
    if($(this).is(":checked")) {
        $(".myclass3").show(300);
    } else {
        $(".myclass3").hide(200);
    }
});
</script>
<script type="text/javascript">
 $(".question4").click(function() {
    if($(this).is(":checked")) {
        $(".myclass4").show(300);
    } else {
        $(".myclass4").hide(200);
    }
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\gym_new\resources\views/admin/enquiry/index.blade.php ENDPATH**/ ?>