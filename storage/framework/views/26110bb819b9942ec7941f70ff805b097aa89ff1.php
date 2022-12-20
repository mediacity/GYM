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
    <link href="<?php echo e(url('css/theme.css')); ?>" rel="stylesheet" type="text/css">
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
    <section id="navbar" class="navbar-main-block">
        <div class="container-xl">
            <div class="row">
                <div class="col-lg-5">
                    <div class="navbar-logo">
                        <img src="<?php echo e(url('media/logo/1670406124GYMX 1 (1).png')); ?>" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="navbar-login-signup-btn">
                        <?php if(Route::has('login')): ?>
                        <div class="links">
                            <?php if(auth()->guard()->check()): ?>
                            <?php if(auth()->check() && auth()->user()->hasRole('Super Admin')): ?>
                                <a href="<?php echo e(route('admin.dashboard.index')); ?>"><?php echo e(__("Admin")); ?></a>
                            <?php endif; ?>
                            <?php if(auth()->check() && auth()->user()->hasRole('Trainer')): ?>
                            <a href="<?php echo e(route('admin.dashboard.index')); ?>"><?php echo e(__("Trainer")); ?></a>
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
    </section>
    <section id="breadcumb" class="breadcumb-main-block">
        <div class="breadcumb-img">
            <img src="<?php echo e(url('image/blog/breadcrum.jpg')); ?>" class="img-fluid" alt="">
            <div class="overlay-bg"></div>
        </div>
        <div class="container-xl">
            <div class="breadcumb-dtl">
                <h4 class="breadcumb-heading">Blog Detail</h4>
            </div>
        </div>
    </section>
    <section id="blog-detail" class="blog-detail-main-block">
        <div class="container-xl">
            <div class="row">
                <div class="col-lg-8 col-8">
                    <div class="blog-detail-block">
                        <div class="blog-detail-image">
                            <?php if($blog->image !='' && file_exists(public_path().'/image/blog/'.$blog->image)): ?>
                            <img src="<?php echo e(url('/image/blog/'.$blog->image)); ?>" class="img-fluid" alt="">
                            <?php else: ?> 
                            <img src="<?php echo e(Avatar::create(config('app.name'))->toBase64()); ?>" class="img-fluid" alt="">
                            <?php endif; ?> 
                        </div>
                        <!-- <div class="row"> -->
                        <div class="blog-detail-user">
                            <ul>
                                <li class="blog-user-dtl">
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
                                </li>
                                <li>
                                    <div class="blog-date"><?php echo e(date('F,d Y', strtotime($blog->created_at))); ?></div>
                                </li>
                            </ul>
                            <div class="blog-dtl">
                                <h4 class="blog-dtl-heading"><?php echo e($blog->title); ?></h4>
                                <p><?php echo $blog->detail; ?></p>
                            </div>
                        </div>                        
                    </div>
                </div>
                <div class="col-lg-4 col-4">
                    <?php if(count($relevant_blogs)>0): ?>
                    <div class="blog-detail-recent-post">
                        <h3 class="blog-recent-heading">Recent Posts</h3>
                        <?php $__currentLoopData = $relevant_blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rblog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="recent-block">
                            <div class="row">
                                <div class="col-lg-4 col-4">
                                    <div class="blog-recent-img">
                                        <?php if($rblog->image !='' && file_exists(public_path().'/image/blog/'.$rblog->image)): ?>
                                        <img src="<?php echo e(url('/image/blog/'.$rblog->image)); ?>" class="img-fluid" alt="">
                                        <?php else: ?> 
                                        <img src="<?php echo e(Avatar::create(config('app.name'))->toBase64()); ?>" class="img-fluid" alt="">
                                        <?php endif; ?> 
                                    </div>
                                </div>
                                <div class="col-lg-8 col-8">
                                    <h4 class="recent-heading"><a href="<?php echo e(route('blog.detail',$rblog->id )); ?>" title="<?php echo e($rblog->title); ?>"><?php echo e($rblog->title); ?></a></h4>
                                    <div class="blog-date"><?php echo e(date('F,d Y', strtotime($rblog->created_at))); ?></div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
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
                    <p>All rights reserved<br><span><a href="<?php echo e(route('front-terms-condition' )); ?>" title="">Terms &amp; Condition</a> and <a href="<?php echo e(route('front-privacy-policy')); ?>" title="">Privacy Policy</a></span></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="<?php echo e(url('assets/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(url('assets/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(url('js/owl.carousel.min.js')); ?>"></script>
    <script src="<?php echo e(url('js/theme.js')); ?>"></script>
</body>
</html><?php /**PATH C:\xampp\htdocs\GYM\gym_new\resources\views/front/blog_detail.blade.php ENDPATH**/ ?>