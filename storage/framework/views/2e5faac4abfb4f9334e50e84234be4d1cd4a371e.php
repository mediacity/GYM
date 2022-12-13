
<?php $__env->startSection('title',__('All Packages')); ?>
<?php $__env->startSection('maincontent'); ?>
<!-- Start Breadcrumbbar --> 
<?php $__env->startComponent('components.breadcumb',['secondaryactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
<?php echo e(__('Packages')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__('Packages')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('button'); ?>
<?php if(Auth::user()->roles->first()->name == 'Super Admin'): ?>
<div class="col-md-12 col-lg-6 text-right">
  <div class="top-btn-block">
    <a href="<?php echo e(route('packages.create')); ?>" class="btn btn-primary-rgba mr-2"><i class="feather icon-plus mr-2"></i>Add
    <?php echo e(__("Package")); ?></a>
    <a href="<?php echo e(route('pack.index')); ?>" class="btn btn-success-rgba mr-2"><i class="feather icon-download-cloud"></i><?php echo e(__("Recycle")); ?></a>
  </div>
</div>
<?php endif; ?>
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
<div class="contentbar">
  <!-- Start row -->
  <div class="row align-items-center justify-content-center">
    <?php if(isset($package)): ?>
    <?php $__currentLoopData = $package; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <!-- Start col -->
    <div class="col-md-6 col-lg-6 col-xl-3">
      <div class="card m-b-30">
        <div class="card-body p-3 h-100">
          <div class="pricing text-center">
            <div class="pricing-top">
              <h4 class="text-success mb-0"><em><?php echo e($plan->title); ?></em></h4>
              <img src="<?php echo e(url('image/packages/pricing-starter.svg')); ?>" class="img-fluid my-4" alt="starter pricing">
              <div class="pricing-amount">
                <h3 class="text-success mb-0"><sup>$</sup>
                  <?php if($plan->offerprice): ?>
                  <?php echo e($plan->price); ?> <del><?php echo e($plan->offerprice); ?><del>
                  <?php else: ?>
                  <?php echo e($plan->price); ?>

                  <?php endif; ?>
                </h3>
                <h6 class="pricing-duration"><?php echo e($plan->duration); ?></h6>
              </div>
              <div class="pricing-middle">
                <ul class="list-group">
                  <li class="list-group-item"><?php echo e(str_limit($plan->detail,'50')); ?></li>
                </div>
              </div>
              <?php if($payment != NULL && $payment->package_id == $plan->id): ?>
            <a class="btn btn-success btn-block font-20 text-white" height="50px">Purchased&nbsp;</a>
            <?php endif; ?>
            <?php if(Auth::user()->roles->first()->name == 'Super Admin'): ?>
            <div class="pricing-bottom pricing-bottom-basic">
              <div class="pricing-btn">
                 <a type="button" href="<?php echo e(route('packages.edit',$plan->id)); ?>"
                  class="btn btn-success-rgba mb-4 font-16"><?php echo e(__("Edit")); ?></a>
                <a type="button" href="<?php echo e(route('packages.destroy',$plan->id)); ?>"
                  class="btn btn-danger-rgba mb-4 font-16"><?php echo e(__("Delete")); ?></a>
                 </div>
                 </div>
            <?php endif; ?>
            <?php if(Auth::user()->roles->first()->name == 'User'): ?>
            <div class="bottom-wrap">
              <?php if($payment == NULL ): ?>
              <input name="csrf-token" content="<?php echo e(csrf_token()); ?>" hidden>
              <div class="row">
                <div class="col-md-6 text-center">
                  <form action="<?php echo e(url('payment')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="amount" value="<?php echo e($plan->offerprice ?? $plan->price); ?>">
                    <input type="hidden" name="id" value="<?php echo e($plan->id); ?>">
                    <button class="btn btn-primary package-btn"><?php echo e(__("Paytm")); ?></button>
                  </form>
                </div>
                <div class="col-md-6 text-center"><a href="javascript:void(0)" class="buy_now btn btn-primary"
                    data-amount="<?php echo e($plan->price); ?>" data-planid="<?php echo e($plan->id); ?>"><?php echo e(__("Razorpay")); ?></a>
                </div>
              </div>
              <?php endif; ?>
            </div>
            <?php endif; ?>
           </div>
        </div>
      </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <!-- End col -->
   </div>
</div>
<!-- End row -->
</div>
<!-- End Contentbar -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
  $('.add_fee').on('click', function () {
     var planid = $(this).data('data-amount');
      $('#plan_id').val(planid);

  })
</script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script>
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('input[name="csrf-token"]').attr('content')
    }
  });
  $('body').on('click', '.buy_now', function (e) {
    var totalAmount = $(this).attr("data-amount");
    var product_id = $(this).attr("data-id");

    var options = {
      "key": "rzp_test_MO2mGQNEAnyxdT",
      "amount": (totalAmount * 100), // 2000 paise = INR 20
      "name": "W3Adda",
      "description": "Payment",
      "image": "https://www.w3adda.com/wp-content/uploads/2019/07/w3a-fb-dp.png",
      "handler": function (response) {
        $.ajax({
          url: "<?php echo e(route('paysuccess')); ?>",
          type: 'get',
          dataType: 'json',
          data: {
            razorpay_payment_id: response.razorpay_payment_id,
            totalAmount: totalAmount,
            product_id: product_id,
          },
          success: function (msg) {

            window.location.href = SITEURL + 'thank-you';
          }
        });

      },
      "prefill": {
        "contact": '1234567890',
        "email": 'xxxxxxxxx@gmail.com',
      },
      "theme": {
        "color": "#528FF0"
      }
    };
    var rzp1 = new Razorpay(options);
    rzp1.open();
    e.preventDefault();
  });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\GYM\gym_new\resources\views/admin/packages/index.blade.php ENDPATH**/ ?>