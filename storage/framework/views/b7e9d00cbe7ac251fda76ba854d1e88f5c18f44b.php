
<html lang="en">
    <head>
        <style>.box {
      position: relative;
      max-width: 600px;
      width: 90%;
      height: 400px;
      background: #fff;
      box-shadow: 0 0 15px rgba(0,0,0,.1);
    }
    
    /* common */
    .ribbon {
      width: 150px;
      height: 150px;
      overflow: hidden;
      position: absolute;
    }
    .ribbon::before,
    .ribbon::after {
      position: absolute;
      z-index: -1;
      content: '';
      display: block;
      border: 5px solid #43d187;
    }
    .ribbon span {
      position: absolute;
      display: block;
      width: 229px;
      padding: 5px 0;
      background-color: #43d187;
      box-shadow: 0 5px 10px rgba(0,0,0,.1);
      color: #fff;
      font: 700 18px/1 'Lato', sans-serif;
      text-shadow: 0 1px 1px rgba(0,0,0,.2);
      text-transform: uppercase;
      text-align: center;
    }
    
    /* top left*/
    .ribbon-top-left {
      top: 0px;
      left: 0px;
    }
    .ribbon-top-left::before,
    .ribbon-top-left::after {
      border-top-color: transparent;
      border-left-color: transparent;
    }
    .ribbon-top-left::before {
      top: 0;
      right: 0;
    }
    .ribbon-top-left::after {
      bottom: 0;
      left: 0;
    }
    .ribbon-top-left span {
      right: -25px;
      top: 30px;
      transform: rotate(-45deg);
    }
    
    /* top right*/
    .ribbon-top-right {
      top: 0px;
      right: 0px;
    }
    .ribbon-top-right::before,
    .ribbon-top-right::after {
      border-top-color: transparent;
      border-right-color: transparent;
    }
    .ribbon-top-right::before {
      top: 0;
      left: 0;
    }
    .ribbon-top-right::after {
      bottom: 0;
      right: 0;
    }
    .ribbon-top-right span {
      left: -5px;
      top: 17px;
      transform: rotate(45deg);
    }
    
    /* bottom left*/
    .ribbon-bottom-left {
      bottom: -10px;
      left: -10px;
    }
    .ribbon-bottom-left::before,
    .ribbon-bottom-left::after {
      border-bottom-color: transparent;
      border-left-color: transparent;
    }
    .ribbon-bottom-left::before {
      bottom: 0;
      right: 0;
    }
    .ribbon-bottom-left::after {
      top: 0;
      left: 0;
    }
    .ribbon-bottom-left span {
      right: -25px;
      bottom: 30px;
      transform: rotate(225deg);
    }
    
    /* bottom right*/
    .ribbon-bottom-right {
      bottom: -10px;
      right: -10px;
    }
    .ribbon-bottom-right::before,
    .ribbon-bottom-right::after {
      border-bottom-color: #008000;
      border-right-color: #008000;
    }
    .ribbon-bottom-right::before {
      bottom: 0;
      left: 0;
    }
    .ribbon-bottom-right::after {
      top: 0;
      right: 0;
    }
    .ribbon-bottom-right span {
      left: -25px;
      bottom: 30px;
      transform: rotate(-225deg);
    }
    .dashboard-imgs {
      margin-top: -10px;
      margin-left: -10px;
    }
    </style>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="<?php echo e($setting['site_description']); ?>">
        <meta name="keywords" content="<?php echo e($setting['site_keyword']); ?>">
        <meta name="author" content="<?php echo e(config('app.name')); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title><?php echo $__env->yieldContent('title'); ?> | <?php echo e(__('Admin')); ?></title>
        <?php echo $__env->make('layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </head>
    <body class="vertical-layout"> 
    <div id="containerbar">
       
       
    
    <div class="rightbar">
         
         <!-- Start Contentbar -->    
        <div class="contentbar">                
            <?php echo $__env->make('message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->yieldContent('maincontent'); ?>
        </div>
    
    
        <div class="contentbar">                
          <?php echo $__env->yieldContent('rightbar-content'); ?>
        </div>
        
             <!-- Start Footerbar -->
        
           
      
      
        
        <!-- End Footerbar -->
    </div>
    
    </div>
     <?php echo $__env->make('layouts.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
     <?php echo $__env->yieldContent('scripts'); ?>
    </body>
    </html><?php /**PATH C:\laragon\www\GYM\resources\views/layouts/theme.blade.php ENDPATH**/ ?>