
<?php $__env->startSection('title',__('Edit Diet :eid -',['eid' => $diet->dietname])); ?>
<?php $__env->startSection('maincontent'); ?>
<!-- Start Breadcrumbbar -->                    
<?php $__env->startComponent('components.breadcumb',['thirdactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
<?php echo e(__('Diet')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Admin')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu2'); ?>
<?php echo e(__(' Edit Diet')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('button'); ?>
<div class="col-md-12 col-lg-6 text-right">
    <div class="top-btn-block">
        <a href="<?php echo e(route('diet.index')); ?>" class="btn btn-primary-rgba mr-2"><i
            class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>
    </div>
</div>
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<!-- End Breadcrumbbar -->
<!--Section: Live preview-->
<form autocomplete="off" novalidate class="form-light" action="<?php echo e(route('diet.update' , $diet->id)); ?>" method="POST" novalidate enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                 <div class="card-header">
                    <h1 class="card-title"><?php echo e(__('Edit your diet:')); ?></h1>
                 </div>
                <br>
                 <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="text-dark"><?php echo e(__("Diet Name: ")); ?><span class="text-danger">*</span></label>
                                        <input value="<?php echo e($diet->dietname); ?>" autofocus="" type="text"
                                            class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            placeholder="<?php echo e(__("Enter Diet name")); ?>" name="dietname" required="">
                                             <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        <small class="text-muted"> <i
                                                class="text-dark feather icon-help-circle"></i><?php echo e(__("Enter your diet type eg : Weight Loss, Body Shaping ")); ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                        <div class="form-group<?php echo e($errors->has('image') ? ' has-error' : ''); ?> input-file-block">
                            <?php echo Form::label('image', 'Diet Image',['class'=>'text-dark']); ?>

                            <?php echo Form::file('image', ['class' => 'input-file', 'id'=>'image']); ?>

                            <small class="text-danger"><?php echo e($errors->first('image')); ?></small>
                        </div>
                    </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group<?php echo e($errors->has('description') ? ' has-error' : ''); ?>">
                                        <?php echo Form::label('description', 'Description',['class'=>'required text-dark']); ?> <span class="text-danger">*</span>
                                        <?php echo Form::textarea('description', $diet->description, ['id' =>
                                        'description','class' =>
                                        'form-control' ,'required','placeholder' => 'Your Diet Description']); ?>

                                        <small class="text-danger"><?php echo e($errors->first('description')); ?></small>
                                        <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i><?php echo e(__("Describe your diet to eat eg : Rice ,Salad")); ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="text-dark"><?php echo e(__("Diet Includes: ")); ?><span class="text-danger">*</span></label>
                            <div class="row">
                                 <div class="col-md-12 col-sm-12">
                                     <table class="myTable table table-bordered table-responsive" id="table_field">
                                        <thead>
                                            <tr>
                                                    <th><?php echo e(__("Contents")); ?></th>
                                                    <th><?php echo e(__("Quantity")); ?></th>
                                                    <th><?php echo e(__("Single Calories")); ?></th>
                                                    <th><?php echo e(__("Total Calories")); ?></th>
                                                    <th> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(count($diet->diethascontent)>0): ?>
                                            <?php $__currentLoopData = $diet->diethascontent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr id="tableBody" class="tbody">
                                                 <td><input type="text" name="content[]"
                                                        class="diet_content form-control" required=""
                                                        value="<?php echo e($content->content); ?>">
                                                    <input class="dietcontentid" type="hidden" name="dietcontentid[]"
                                                        value="<?php echo e($content->content); ?>">
                                                </td>
                                                 <td><input type="number" min="1" name="quantity[]" value="<?php echo e(filter_var($content->quantity)); ?>" class="form-control quantity  <?php $__errorArgs = ['quantity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="">
                                         </td>
                                          <td><input type="number" min="1" name="single_kal[]" value="<?php echo e(filter_var($content->calories/$content->quantity)); ?>" class="form-control single_kal  <?php $__errorArgs = ['single_kal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="">
                                         </td>
                                          <td><input type="text" value="<?php echo e(filter_var( $content->calories)); ?>" name="dcalories[]" class="form-control dcalories <?php $__errorArgs = ['dcalories'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="">
                                        </td>
                                                <td>
                                                    <?php if($loop->last): ?>
                                                        <button class="btn btn-success addNew" type="button">
                                                            +
                                                        </button>
                                                    <?php endif; ?>
                                                     <button class="btn btn-danger removeBtn" type="button">
                                                        -
                                                    </button>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                            <tr id="tableBody" class="tbody">
                                                <td><input type="text" name="content[]"
                                                        class="diet_content form-control" required="">
                                                    <input class="dietcontentid" type="hidden" name="dietcontentid[]"
                                                        value="">
                                                </td>
                                                <td><input type="number" name="quantity[]" id="quantity" class="form-control quantity"
                                                        required="" value="">
                                                </td>
                                                <td><input type="number" min="1" name="single_kal[]"class="form-control single_kal  <?php $__errorArgs = ['single_kal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="">
                                         </td>
                                         <td><input type="text" name="dcalories[]" class="form-control dcalories <?php $__errorArgs = ['dcalories'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="">
                                       </td>
                                                <td><button class="btn addNew btn-success" type="button" name="add"
                                                        id="add" value="+">
                                                        +</button>
                                                </td>
                                                <td><button class="btn removeBtn btn-danger" type="button">
                                                        - </button>
                                                </td>
                                            </tr>
                                             <?php endif; ?>
                                        </tbody>
                                    </table>
                                 </div>
                                </div>
                            <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i> <?php echo e(__("Enter the content and its calories which your diet need eg : Rice:130 kcal, Tomato:22 kcal")); ?>

                            </small>
                        </div>
                        <?php $__errorArgs = ['diet includes'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                         <label class="text-dark"><?php echo e(__('Diet Day:')); ?> <span class="text-danger">*</span></label>
                                        <select data-placeholder="<?php echo e(__("Please select day")); ?>" name="day_id[]"
                                            class="mdb-select md-form form-control select2" multiple>
                                            <option value=""><?php echo e(__("Select Day")); ?></option>
                                            <?php $__currentLoopData = App\day::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             <option <?php if($diet->day != ''): ?> <?php $__currentLoopData = $diet->day; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dietday): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php echo e($dietday == $day->id ? "selected" : ""); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>
                                                value="<?php echo e($day->id); ?>"> <?php echo e($day['day']); ?> </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php $__errorArgs = ['day'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        <small class="text-muted"> <i
                                                class="text-dark feather icon-help-circle"></i><?php echo e(__("Enter the day on which you have to eat the diet eg : Monday, Tuesday ")); ?></small>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                         <label class="text-dark"><?php echo e(__('Session:')); ?><span class="text-danger">*</span></label>
                                        <select data-placeholder="<?php echo e(__('Please select diet session')); ?>" name="session_id[]"
                                            id="session_id[]"<?php echo e(__("Please select diet session")); ?> class="form-control select2" multiple>
                                            <option value=""></option>
                                            <?php $__currentLoopData = App\dietid::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             <option <?php if($diet->session_id != ''): ?> <?php $__currentLoopData = $diet->session_id; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php echo e($session == $session_id->id ? "selected" : ""); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?>
                                                value="<?php echo e($session_id->id); ?>"> <?php echo e($session_id['session_id']); ?> </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php $__errorArgs = ['session_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        <small class="text-muted"> <i class="text-dark feather icon-help-circle"></i>
                                           <?php echo e(__(" Selecting diet session eg : Morning, Afternoon")); ?> </small>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="text-dark"><?php echo e(__(" Follow Up Date: ")); ?><span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input value="<?php echo e($diet->followup_date); ?>" name="followup_date" type="text" id="calendar2"
                                    class="calendar form-control" placeholder="<?php echo e(__('yyyy/mm/dd')); ?>" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2"><i
                                            class="feather icon-calendar"></i></span>
                                </div>
                            </div>
                            <?php $__errorArgs = ['date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <small class="text-muted text-info"> <i class="text-dark feather icon-help-circle"></i>
                               <?php echo e(__(" Please Enter Next Followup Date ")); ?></small>
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="text-dark"
                                            class="form-group<?php echo e($errors->has('is_active') ? ' has-error' : ''); ?> switch-main-block">
                                            <div class="custom-switch">
                                                <?php echo Form::checkbox('is_active', 1,$diet->is_active==1 ? 1 :0, ['id' =>
                                                'switch1', 'class' =>
                                                'custom-control-input']); ?>

                                                <label class="custom-control-label" for="switch1"><?php echo e(__("Is Active")); ?></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
                                <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                                    <?php echo e(__("Update")); ?></button>
                            </div>
                        </div>

                        <div class="clear-both"></div>
                    </div>
                </div>
            </div>
</form>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
    $(document).ready(function () {
        $(".diet_content").each(function (index) {
            enableAutoComplete($(this));
        });
    });
    $(".myTable").on('click', 'button.addNew', function () {

        var n = $(this).closest('tr');
        addNewRow(n);

    });
    function addNewRow(n) {
        var $tr = n;
        var allTrs = $tr.closest('table').find('tr');
        var lastTr = allTrs[allTrs.length - 1];
        var $clone = $(lastTr).clone();
        $clone.find('td').each(function () {
            var el = $(this).find(':first-child');
            var id = el.attr('id') || null;
            if (id) {

                var i = id.substr(id.length - 1);
                var prefix = id.substr(0, (id.length - 1));
                el.attr('id', prefix + (+i + 1));
                el.attr('name', prefix + (+i + 1));
            }
        });
        $clone.find('input').val('');
        $tr.closest('table').append($clone);
        $('input.diet_content').last().focus();
        enableAutoComplete($("input.diet_content:last"));
    }
     function enableAutoComplete($element) {
          $element.autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: "<?php echo e(route('diet.fetch')); ?>",
                    data: {
                        term: request.term
                    },
                    dataType: "json",
                    success: function (data) {
                          var resp = $.map(data, function (obj) {
                            return {
                                id: obj.id,
                                label: obj.label,
                                value: obj.value,
                                quantity: obj.quantity,
                                calories: obj.calories
                            }
                        });

                        response(resp);
                    }
                });
            },
            select: function (event, ui) {
                if (ui.item.value) {
                     this.value = ui.item.value.replace(/\D/g, '');
                    $(this).val(ui.item.value);
                    var row = $(this).closest("tr");
                     row.find("input.single_kal").val(ui.item.calories);
                    row.closest('input.dcalories').val(ui.item.id);
                    if(row.find("input.quantity").val() == ''){
                        row.find("input.quantity").val(ui.item.quantity);
                        }   
                    var qty = +row.find("input.quantity").val();
                    var kal = +row.find("input.single_kal").val();
                    row.find("input.dcalories").val(qty*kal);
                    console.log(qty*kal);
                      }
                       return false;
                        },
            minlength: 1,
            });
    }
    $('.myTable').on('click', 'button.removeBtn', function () {
        var d = $(this);
        removeRow(d);

    });
    function removeRow(d) {
        var rowCount = $('.myTable tr').length;
        if (rowCount !== 2) {
            d.closest('tr').remove();
        } else {
            console.log('Atleast one sell is required');
        }
    }
    $(".myTable").on('change', 'input.quantity', function () {
        var row = $(this).closest("tr");
        var qty = +$(this).val();
        var kal = +row.find("input.single_kal").val();
        row.find("input.dcalories").val(qty*kal);
    });
$(".myTable").on('change', 'input.single_kal', function () {
    var row = $(this).closest("tr");
    var qty = +row.find("input.quantity").val(); 
    var kal = +$(this).val();
    row.find("input.dcalories").val(qty*kal);
    });
$('.calendar').each(function () {
        $(this).datepicker({
            dateFormat: 'yy-mm-dd',
            minDate: 0
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\GYM\gym_new\resources\views/admin/diet/edit.blade.php ENDPATH**/ ?>