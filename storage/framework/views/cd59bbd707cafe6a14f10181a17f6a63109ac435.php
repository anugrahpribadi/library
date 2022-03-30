<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="apple-touch-icon" href="<?php echo e(asset('app-assets/images/ico/apple-icon-120.png')); ?>">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('app-assets/images/logo/vuesax-logo.png')); ?>">
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

<title>MyLibrary</title>

<!-- BEGIN: Vendor CSS-->
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/vendors/css/vendors.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/vendors/css/ui/prism.min.css')); ?>">
<!-- END: Vendor CSS-->

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

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

<nav class="navbar navbar-expand-lg navbar-white bg-white">
<div class="container-fluid">
<a class="navbar-brand" href="http://127.0.0.1:8000">MyLibrary</a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
    <li class="nav-item">
        <a class="nav-link btn btn-primary" aria-current="page" href="http://127.0.0.1:8000">Home</a>
    </li>
    &ensp;
    <?php if(Auth::guest()): ?>
    <li class="nav-item">
        <a class="nav-link btn btn-primary" href="<?php echo e(route('home')); ?>" style="pointer-events: none;cursor: default;">Dashboard</a>
    </li>
    <?php else: ?> 
    <li class="nav-item">
        <a class="nav-link btn btn-primary" href="<?php echo e(route('home')); ?>">Dashboard</a>
    </li>
    <?php endif; ?>
    </ul>
    <ul class="nav navbar-nav float-right">
    <?php if(Auth::guest()): ?>
        <a href="<?php echo e(route('login')); ?>" class="btn btn-primary">Login</a>
    <?php else: ?>
        Halo, <?php echo e(Auth::user()->name); ?>

        &ensp;
        <a href="<?php echo e(route('logout')); ?>" class="badge bg-danger">Logout</a>
    <?php endif; ?>      
    </ul>
</div>
</div>
</nav>

</head>
<body>
<hr>
<br>
<?php echo $__env->yieldContent('content'); ?>
</body><?php /**PATH /Users/macbookpro/Documents/Laravel/perpus/resources/views/layouts/nav.blade.php ENDPATH**/ ?>