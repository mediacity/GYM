
<?php $__env->startSection('title',__('Edit Quotation :eid -',['eid' => $quotation->id])); ?>
<?php $__env->startSection('breadcum'); ?>
<div class="breadcrumbbar breadcrumbbar-one">
    <div class="row align-items-center">
        <div class="col-lg-4 col-md-8">
            <h4 class="page-title"><?php echo e(__("Quotation")); ?></h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                    <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>"><?php echo e(__('Admin')); ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <?php echo e(__('Edit Quotation')); ?>

                    </li>
                </ol>
            </div>
        </div>
        <?php if(auth()->user()->can('users.add')): ?>
        <div class="col-lg-8 col-md-4">
            <div class="top-btn-block  text-right">
                <a href="<?php echo e(route('quotation.index')); ?>" class="btn btn-primary-rgba mr-2"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
 <?php echo Form::model($quotation, ['method' => 'PATCH', 'route' => ['quotation.update', $quotation->id], 'files' =>
            true , 'class' => 'form form-light' , 'novalidate']); ?>



    <!-- Start row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="text-dark"><?php echo e(__("Date: ")); ?><span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input value="<?php echo e($quotation->date); ?>" name="date" type="text" id="calendar"
                                        class="calendar form-control" placeholder="<?php echo e(__("yyyy/mm/dd")); ?>"
                                        aria-describedby="basic-addon2">
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

                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group<?php echo e($errors->has('Name') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('name', 'Name',['class'=>'required']); ?><span
                                    class="text-danger">*</span></label>

                                <?php echo Form::text('name', null, ['class' => 'form-control',
                                'required','placeholder' => 'Please Enter Name']); ?>

                                <small class="text-danger"><?php echo e($errors->first('name')); ?></small>

                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="text-dark"><?php echo e(__("Email:")); ?> <span class="text-danger">*</span></label>
                                <input value="<?php echo e($quotation['email']); ?>" autofocus="" type="email" name="email"
                                    class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    placeholder="<?php echo e(__("Enter Your email")); ?> required="">

                                <?php $__errorArgs = ['email'];
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
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="text-dark"><?php echo e(__("Mobile:")); ?><span class="text-danger">*</span></label>
                                <input value="<?php echo e($quotation['mobile']); ?>" title="enter valid no." pattern="[0-9]{10}"
                                    type="text" class="form-control" placeholder="<?php echo e(__("Enter valid mobile no.")); ?>" required
                                    name="mobile">
                            </div>
                        </div>                        
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="text-dark" for="address"><?php echo e(__("Select Country: ")); ?><span
                                        class="text-danger">*</span></label>
                                <select data-placeholder="<?php echo e(__("Please select country")); ?>" required="" name="country_id"
                                    id="country_id" class="country <?php $__errorArgs = ['country_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> select2">
                                    <option value=""><?php echo e(__("Select country")); ?></option>
                                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php echo e($quotation->country_id != '' && $quotation->country_id == $country->id ? "selected" : ""); ?>

                                        value="<?php echo e($country->id); ?>"> <?php echo e($country->nicename); ?> </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['country_id'];
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
                                <div class="invalid-feedback">
                                    <?php echo e(__('Please select country')); ?>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="text-dark" for="address"><?php echo e(__("Select State: ")); ?><span
                                        class="text-danger">*</span></label>
                                <select data-placeholder="<?php echo e(__("Please select state")); ?>" required="" name="state_id" id="state_id"
                                    class="states <?php $__errorArgs = ['state_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> select2">
                                    <option value=""><?php echo e(__("Please select state")); ?></option>
                                    <?php if(isset($quotation->country->states)): ?>
                                    <?php $__currentLoopData = $quotation->country->states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <option <?php echo e($quotation->state_id == $state->id ? "selected" : ""); ?>

                                        value="<?php echo e($state->id); ?>"><?php echo e($state->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>
                                <?php $__errorArgs = ['state_id'];
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

                                <div class="invalid-feedback">
                                    <?php echo e(__('Please select state')); ?>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="text-dark" for="address"><?php echo e(__("Select City: ")); ?><span
                                        class="text-danger">*</span></label>
                                <select data-placeholder="<?php echo e(__("Please select city")); ?>" required="" name="city_id" id="city_id"
                                    class="cities <?php $__errorArgs = ['city_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> select2">
                                    <option value=""><?php echo e(__("Please select city")); ?></option>
                                    <?php if(isset($quotation->state->cities)): ?>
                                    <?php $__currentLoopData = $quotation->state->cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php echo e($quotation->city_id == $city->id ? "selected" : ""); ?> value="<?php echo e($city->id); ?>">
                                        <?php echo e($city->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>
                                <?php $__errorArgs = ['city_id'];
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
                                 <div class="invalid-feedback">
                                    <?php echo e(__('Please select city')); ?>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="text-dark" for="address"><?php echo e(__("Pincode: ")); ?><span class="text-danger">*</span></label>
                                <input value="<?php echo e($quotation['pincode']); ?>" required="" type="text" pattern="[0-9]{6}"
                                placeholder="<?php echo e(__("enter pincode")); ?>" name="pincode" class="form-control" >
                                <?php $__errorArgs = ['pincode'];
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

                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label class="text-dark" for="address"><?php echo e(__("Address: ")); ?><span
                                        class="text-danger">*</span></label>
                                <textarea required="" class="<?php $__errorArgs = ['line1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> form-control"
                                    id="address" name="address"
                                    placeholder="<?php echo e(__("Enter Your Address here")); ?>"><?php echo e($quotation['address']); ?></textarea>
                                <?php $__errorArgs = ['address'];
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card m-b-30">
                <div class="card-body">

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <label class="text-dark"><?php echo e(__("Order Details: ")); ?><span class="text-danger">*</span></label>
                                <table class="myTable table table-bordered table-responsive" id="table_field">
                                    <thead>
                                        <tr>
                                            <th><?php echo e(__("ProductName")); ?></th>
                                            <th><?php echo e(__("Quantity")); ?></th>
                                             <th><?php echo e(__("Price")); ?></th>
                                            <th><?php echo e(__("Total")); ?></th>
                                             <th> </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $quotation->subquotation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr id="tableBody" class="tbody">
                                            <td><input type="text" name="productname"
                                                    class="productname form-control <?php $__errorArgs = ['productname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    value="<?php echo e($t->productname); ?>">
                                                
                                            </td>
                                            <td><input type="number" min="1" name="quantity"
                                                    class="form-control quantity  <?php $__errorArgs = ['quantity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    value="<?php echo e($t->quantity); ?>">
                                            </td>
                                            <td><input type="number" min="1" name="price"
                                                    class="form-control price  <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    value="<?php echo e($t->price); ?>">
                                            </td>

                                            <td><input type="text" name="total"
                                                    class="form-control total <?php $__errorArgs = ['total'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    value="<?php echo e($t->total); ?>">
                                                </td>
                                            <td><button class="btn addNew btn-success" type="button" name="add" id="add"
                                                    value="+">
                                                    +</button>
                                            </td>
                                            <td><button class="btn removeBtn btn-danger" type="button">
                                                    -</button>
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
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="form-group<?php echo e($errors->has('additionalnote') ? ' has-error' : ''); ?>">
                                <?php echo Form::label('additionalnote', 'Additionalnote',['class'=>'required']); ?><span
                                    class="text-danger">*</span>
                                <?php echo Form::textarea('additionalnote', null, ['id' => 'summernote','class' => 'form-control'
                                ,'required','placeholder' => 'Please Enter Additionalnote']); ?>

                                <small class="text-danger"><?php echo e($errors->first('additionalnote')); ?></small>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label class="text-dark"><?php echo e(__("Subtotal:")); ?> <span class="text-danger">*</span></label>
                                        <input value="<?php echo e($quotation['subtotal']); ?>" autofocus="" type="number" name="subtotal"  id="subtotal" 
                                            class="form-control <?php $__errorArgs = ['subtotal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            placeholder=<?php echo e(__("Enter Your Subtotal")); ?> required="">

                                        <?php $__errorArgs = ['subtotal'];
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
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">                            
                                    <div class="form-group">
                                        <label class="text-dark"><?php echo e(__("Tax: ")); ?><span class="text-danger">*</span></label>
                                        <input value="<?php echo e($quotation['tax']); ?>" autofocus="" type="number" name="tax"  id="tax"  
                                            class="form-control <?php $__errorArgs = ['tax'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            placeholder=<?php echo e(__("Enter Your Tax")); ?> required="">

                                        <?php $__errorArgs = ['tax'];
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
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group">
                                        <label class="text-dark"><?php echo e(__("GrandTotal: ")); ?><span class="text-danger">*</span></label>
                                        <input value="<?php echo e($quotation['grandtotal']); ?>" autofocus="" type="number" name="grandtotal"  id="grandtotal"
                                            class="form-control <?php $__errorArgs = ['grandtotal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            placeholder="<?php echo e(__("Enter Your Grandtotal" )); ?>"required="">

                                        <?php $__errorArgs = ['grandtotal'];
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
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="form-group<?php echo e($errors->has('is_active') ? ' has-error' : ''); ?> switch-main-block">
                                        <div class="custom-switch">
                                            <?php echo Form::checkbox('is_active', 1,$quotation->is_active==1 ? 1 : 0, ['id' => 'switch1',
                                            'class' => 'custom-control-input']); ?>

                                            <label class="custom-control-label" for="switch1"><span><?php echo e(__("Status")); ?></span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
                                        <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                                            <?php echo e(__("Update")); ?></button>
                                    </div>
                                </div>
                            </div>
                        <div class="clear-both"></div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
      <?php echo Form::close(); ?>

</form>
    <?php $__env->stopSection(); ?>
        <?php $__env->startSection('script'); ?>
      
        <script>
            $(document).ready(function () {
                $(".details").each(function (index) {
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
    
                $('input.details').last().focus();
    
                enableAutoComplete($("input.details:last"));
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
    
                var price = +row.find("input.price").val();
                
                 row.find("input.total").val(qty * price);
    
    
            });
    
            $(".myTable").on('change', 'input.price', function () {
    
                var row = $(this).closest("tr");
    
                var qty = +row.find("input.quantity").val();
    
                var price = +$(this).val();
    
                row.find("input.total").val(qty * price);
    
            });
            $('.calendar').each(function () {
                $(this).datepicker({
                    dateFormat: 'yy-mm-dd',
                    minDate: 0
                });
            });
            var stateurl = <?php echo json_encode(route('list.state'), 15, 512) ?>;
            var cityurl = <?php echo json_encode(route('list.cities'), 15, 512) ?>;
            $(document).ready(function() {
            function compute() {
          var a = $('#subtotal').val();
          var b = $('#tax').val();
          var total = a*(b/100);
          var grandtotal=parseInt(a) + parseInt(total);;
          
          $('#grandtotal').val(grandtotal);
        }
  
        $('#subtotal, #tax').change(compute);

    // $("#tax, #subtotal").on('input', function(){
    // var su = $('#subtotal').val();
    // var ta = $('#tax').val();
    // var total = su*(ta/100);
    // var grandtotal = parseInt(su)+parseInt(total);
    // //document.getElementById("grandtotal").innerHTML = grandtotal;
    //     console.log(grandtotal);
    // // document.getElementById("grandtotal").innerHTML = grandtotal;
    // // $('#tax').html(grandtotal);
});
        </script>

        <?php $__env->stopSection(); ?>
        

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\GYM\resources\views/admin/quotation/edit.blade.php ENDPATH**/ ?>