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
    <div id="navbar" class="navbar-main-block">
        <div class="container-fluid">
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
    </div>
    <div id="home-slider" class="home-slider-main-block owl-carousel">
        <div class="item">
            <div class="home-slider-block">
                <div class="home-slider-image">
                    <img src="<?php echo e(url('image/slider/slider-01.jpg')); ?>" class="img-fluid" alt="">
                    <div class="overlay-bg"></div>
                </div>
                <div class="home-slider-dtl">
                    <h1 class="home-slider-heading">Title Here</h1>
                    <h4 class="home-slider-sub-heading">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</h4>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="home-slider-block">
                <div class="home-slider-image">
                    <img src="<?php echo e(url('image/slider/slider-02.jpg')); ?>" class="img-fluid" alt="">
                    <div class="overlay-bg"></div>
                </div>
                <div class="home-slider-dtl">
                    <h1 class="home-slider-heading">Title Here</h1>
                    <h4 class="home-slider-sub-heading">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</h4>
                </div>
            </div>
        </div>
    </div>
    <div id="faq" class="faq-main-block">
        <div class="containe-fluid">
            <h3 class="faq-heading text-center">Frequently Asked Question</h3>
            <div class="row">
                <div class="col-lg-12">
                    <div class="faq-block col-md-6 offset-md-3">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            What is Lorem Ipsum?
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Collapsible Group Item #2
                                    </button>
                                </h2>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingThree">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Collapsible Group Item #3
                                    </button>
                                </h2>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <!-- <div class="flex-center position-ref full-height">
        <?php if(Route::has('login')): ?>
        <div class="top-right links">
            <?php if(auth()->guard()->check()): ?>
            <?php if(auth()->check() && auth()->user()->hasRole('Super Admin')): ?>
                <a href="<?php echo e(route('admin.dashboard.index')); ?>"><?php echo e(__("Admin")); ?></a>
            <?php endif; ?>
            <?php if(auth()->check() && auth()->user()->hasRole('Trainer')): ?>
            <a href="<?php echo e(route('admin.dashboard.index')); ?>"><?php echo e(__("Trainer")); ?></a>
        <?php endif; ?>
            <?php else: ?>
            <a href="<?php echo e(route('login')); ?>"><?php echo e(__("Login")); ?></a>

            <?php if(Route::has('register')): ?>
            <a href="<?php echo e(route('register')); ?>"><?php echo e(__("Register")); ?></a>
            <?php endif; ?>
            <?php endif; ?>
        </div>
        <?php endif; ?>
        <div class="content">
            <div class="title m-b-md" style="color:black;">
            <?php echo e(('GYM')); ?>

        </div>
        </div>
    </div> -->
    <script src="<?php echo e(url('assets/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(url('assets/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(url('js/owl.carousel.min.js')); ?>"></script>
    <script src="<?php echo e(url('js/theme.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\laragon\www\gym_new\resources\views/welcome.blade.php ENDPATH**/ ?>