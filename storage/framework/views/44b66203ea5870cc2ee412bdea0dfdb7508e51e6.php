<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <title><?php echo e(config('app.name')); ?></title>
     <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="<?php echo e(url('assets/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(url('css/font_awesome/css/all.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(url('css/owl.carousel.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(url('css/owl.theme.default.min.css')); ?>" rel="stylesheet" type="text/css">
    <?php if(in_array(app()->getLocale(),array('ar','he','ur', 'arc', 'az', 'dv', 'ku', 'fa'))): ?>
    <link href="<?php echo e(url('assets/css/style_rtl.css')); ?>" rel="stylesheet" type="text/css">
    <?php else: ?> 
    <link href="<?php echo e(url('css/theme.css')); ?>" rel="stylesheet" type="text/css">
    <?php endif; ?>
    <!-- Styles -->
    
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

    </style>
</head>
<body>
    <div id="navbar" class="navbar-main-block">
        <div class="container-xl">
            <div class="row">
                <div class="col-lg-5 col-md-5">
                    <div class="navbar-logo">
                        <img src="<?php echo e(url('media/logo/1670406124GYMX 1 (1).png')); ?>" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="col-lg-7 col-md-7">
                    <div class="navbar-login-signup-btn">
                        <?php if(Route::has('login')): ?>
                        <div class="links">
                            <?php if(auth()->guard()->check()): ?>
                            <?php if(auth()->check() && auth()->user()->hasRole('Super Admin')): ?>
                                <a href="<?php echo e(route('admin.dashboard.index')); ?>" class="btn btn-primary mr-2"><?php echo e(__("Admin")); ?></a>
                            <?php endif; ?>
                            <?php if(auth()->check() && auth()->user()->hasRole('Trainer')): ?>
                            <a href="<?php echo e(route('admin.dashboard.index')); ?>" class="btn btn-primary mr-2"><?php echo e(__("Trainer")); ?></a>
                        <?php endif; ?>
                            <?php else: ?>
                            <a href="<?php echo e(route('login')); ?>" class="btn btn-primary mr-2"><i class="fa-solid fa-right-to-bracket mr-1"></i> <?php echo e(__("Login")); ?></a>

                            <?php if(Route::has('register')): ?>
                            <a href="<?php echo e(route('register')); ?>" class="btn btn-primary"><i class="fa-solid fa-user-plus mr-1"></i> <?php echo e(__("Register")); ?></a>
                            <?php endif; ?>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="home-slider" class="home-slider-main-block owl-carousel">
        
        <?php if($sliders): ?>
        <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="item">
            <div class="home-slider-block">
                <div class="home-slider-image">
                    <?php if($slider->image !='' && file_exists(public_path().'/image/slider/'.$slider->image)): ?>
                    <img src="<?php echo e(url('/image/slider/'.$slider->image)); ?>" class="img-fluid" alt="">
                    <?php else: ?> 
                    <img src="<?php echo e(Avatar::create(config('app.name'))->toBase64()); ?>" class="img-fluid" alt="">
                    <?php endif; ?>                   
                    <div class="overlay-bg"></div>
                </div>
                <div class="home-slider-dtl">
                    <h1 class="home-slider-heading"><?php echo e($slider->heading); ?></h1>
                    <h4 class="home-slider-sub-heading"><?php echo e($slider->subheading); ?></h4>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       <?php endif; ?> 
    </div>
    
    <?php if($faq): ?>
    <div id="faq" class="faq-main-block">
        <div class="container-xl">
            <h3 class="faq-heading">Frequently Asked Question</h3>
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="faq-block">
                        <div class="accordion" id="accordionExample">
                            <?php $__currentLoopData = $faq; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="card">
                                <div class="card-header" id="headingOne<?php echo e($key); ?>">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <?php echo e($value->title); ?><span><i class="fa-solid fa-angle-down"></i></span>
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseOne" class="collapse <?php echo e($key=='0'?'show':''); ?>" aria-labelledby="headingOne<?php echo e($key); ?>" data-parent="#accordionExample">
                                    <div class="card-body"><?php echo e($value->details); ?></div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <?php if($blogs): ?>

    <section id="blog" class="blog-main-block">
        <div class="container-xl">
            <h3 class="blog-heading">Blog</h3>
            <div id="blog-slider" class="blog-slider-main-block owl-carousel">
                <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item">
                    <div class="blog-block">
                        <div class="blog-image">
                            <a href="<?php echo e(route('blog.detail',$blog->id )); ?>" title="<?php echo e($blog->title); ?>">
                                <?php if($blog->image !='' && file_exists(public_path().'/image/blog/'.$blog->image)): ?>
                                <img src="<?php echo e(url('/image/blog/'.$blog->image)); ?>" class="img-fluid" alt="">
                                <?php else: ?> 
                                <img src="<?php echo e(Avatar::create(config('app.name'))->toBase64()); ?>" class="img-fluid" alt="">
                                <?php endif; ?> 
                            </a>
                        </div>
                        <div class="blog-cat">
                            <span class="badge badge-primary"><?php echo e($blog->category?$blog->category->title:''); ?></span>
                        </div>
                        <div class="blog-dtl">
                            <h4 class="blog-dtl-heading"><a href="<?php echo e(route('blog.detail',$blog->id )); ?>" title="<?php echo e($blog->title); ?>"><?php echo e($blog->title); ?></a></h4>
                            <p><?php echo e(substr($blog->detail, 0, 100)); ?></p>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-5">
                                <div class="blog-user-dtl">
                                    <ul>
                                        <li>
                                            <?php if($blog->user): ?>
                                                <?php if($blog->user->photo !='' && file_exists(public_path().'/media/users/'.$blog->user->photo)): ?>
                                                <img src="<?php echo e(url('/media/users/'.$blog->user->photo)); ?>" class="img-fluid" alt="">
                                                <?php else: ?> 
                                                <img src="<?php echo e(url('image/blog/blog-user.png')); ?>" class="img-fluid" alt="">
                                                <?php endif; ?>
                                            <?php else: ?>
                                            <img src="<?php echo e(url('image/blog/blog-user.png')); ?>" class="img-fluid" alt="">
                                            <?php endif; ?>
                                        </li>
                                        <li class="user-name"><?php echo e($blog->user?$blog->user->name:''); ?></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7 col-7">
                                <div class="blog-date"><?php echo e(date('F,d Y', strtotime($blog->created_at))); ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
    <?php endif; ?>
    <footer class="footer-main-block">
        <div class="container-xl">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="footer-logo">
                        <a href="#" title=""><img src="<?php echo e(url('media/logo/1670406124GYMX 1 (1).png')); ?>" class="img-fluid" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="footer-block">
                        <p>All rights reserved<br><span><a href="#" title="">Terms &amp; Condition</a> and <a href="#" title="">Privacy Policy</a></span></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="<?php echo e(url('assets/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(url('assets/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(url('assets/js/owl.carousel.min.js')); ?>"></script>
    <?php if(in_array(app()->getLocale(),array('ar','he','ur', 'arc', 'az', 'dv', 'ku', 'fa'))): ?>
    <script src="<?php echo e(url('assets/js/theme_rtl.js')); ?>"></script>
    <?php else: ?> 
    <script src="<?php echo e(url('assets/js/theme.js')); ?>"></script>
    <?php endif; ?>
</body>
</html><?php /**PATH D:\Official Projects\Media City\GYM\New\GYM\resources\views/welcome.blade.php ENDPATH**/ ?>