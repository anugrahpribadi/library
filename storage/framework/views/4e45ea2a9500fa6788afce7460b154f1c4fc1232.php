<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>MyLibrary : <?php echo e($title); ?> </title>
    <link rel="apple-touch-icon" href="<?php echo e(asset('app-assets/images/ico/apple-icon-120.png')); ?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('app-assets/images/logo/vuesax-logo.png')); ?>">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <?php echo $__env->make('inc.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldPushContent('before_styles'); ?>

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/vendors/css/vendors.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/vendors/css/ui/prism.min.css')); ?>">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/bootstrap.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/bootstrap-extended.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/colors.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/components.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/themes/dark-layout.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/themes/semi-dark-layout.css')); ?>">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/css/core/menu/menu-types/vertical-menu.css')); ?>">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/style.css')); ?>">
    <!-- END: Custom CSS-->

    

    <?php echo $__env->yieldPushContent('after_styles'); ?>

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click"
    data-menu="vertical-menu-modern" data-col="2-columns">

    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="http://127.0.0.1:8000">
                        
                        <img src="/img/logo.png" style="width: 60px; height: 25px;" alt="">
                        <h2 class="brand-text mb-0">MyLibrary</h2>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i
                            class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i
                            class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block primary"
                            data-ticon="icon-disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <?php echo $__env->make('inc.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">

        <!-- BEGIN: Header-->
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-shadow">
            <div class="navbar-wrapper">
                <div class="navbar-container content">
                    <div class="navbar-collapse" id="navbar-mobile">
                        <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                            <ul class="nav navbar-nav">
                                <li class="nav-item mobile-menu d-xl-none mr-auto"><a
                                class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                                class="ficon feather icon-menu"></i></a></li>
                                <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i
                                class="ficon feather icon-maximize"></i></a></li>
                            </ul>
                            &ensp;
                            <a class="btn btn-primary" href="<?php echo e(route('menu')); ?>">Menu</a>
                        </div>
                        <ul class="nav navbar-nav float-right">
                            <li class="dropdown dropdown-user nav-item"><a
                                    class="dropdown-toggle nav-link dropdown-user-link" href="http://127.0.0.1:8000" data-toggle="dropdown">
                                    <div class="user-nav d-sm-flex d-none"><span
                                            class="user-name text-bold-600"><?php echo e(Auth::user()->name); ?></span><span
                                            class="user-status"><?php echo e(Auth::user()->email); ?></span></div><span><img class="round"
                                            src="/img/default.png" class="img-circle elevation-2" alt="User Image"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="<?php echo e(url('/logout')); ?>"><i
                                        class="feather icon-log-out"></i> Logout</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <!-- END: Header-->

        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">
                                <?php echo e(isset($title) ? $title : config('app.name')); ?></h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="<?php echo e(route('home')); ?>">MyLibrary</a>
                                    </li>
                                    <?php if(isset($breadcrumbs) && is_array($breadcrumbs) && count($breadcrumbs) > 0): ?>
                                    <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($key + 1 == count($breadcrumbs)): ?>
                                    <li class="breadcrumb-item active">
                                        <a><?php echo e($item); ?></a>
                                    </li>
                                    <?php else: ?>
                                    <li class="breadcrumb-item">
                                        <a><?php echo e($item); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                    <li class="breadcrumb-item active">
                                        <a><?php echo e(isset($title) ? $title : ''); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    </ol>
                                        </div>
                                        </div>
                                            </div>
                                                    </div>
                                                        <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                                                        <div class="form-group breadcrum-right">
                                                        <div class="dropdown">
                                                        <button onClick="document.location.reload(true)"
                                                        class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                                        class="feather icon-refresh-ccw"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    <div class="content-body">

                <?php echo $__env->yieldContent('content'); ?>

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix blue-grey lighten-2 mb-0"><span
                class="float-md-left d-block d-md-inline-block mt-25"><strong>Copyright</strong> MyLibrary &copy; <?php echo e(date('Y')); ?></span>
            <button class="btn btn-primary btn-icon scroll-top" type="button"><i
                    class="feather icon-arrow-up"></i></button>
        </p>
    </footer>
    <!-- END: Footer-->

    <?php echo $__env->yieldPushContent('before_scripts'); ?>
    <!-- BEGIN: Vendor JS-->
    <script src="<?php echo e(asset('app-assets/vendors/js/vendors.min.js')); ?>"></script>
    <script src="<?php echo e(asset('app-assets/vendors/js/forms/select/select2.full.min.js')); ?>"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="<?php echo e(asset('app-assets/vendors/js/ui/prism.min.js')); ?>"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="<?php echo e(asset('app-assets/js/core/app-menu.js')); ?>"></script>
    <script src="<?php echo e(asset('app-assets/js/core/app.js')); ?>"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <!-- END: Page JS-->
    <?php echo $__env->yieldPushContent('after_scripts'); ?>

</body>
<!-- END: Body-->

</html>
<?php /**PATH /Users/macbookpro/Documents/Laravel/perpus/resources/views/layouts/app.blade.php ENDPATH**/ ?>