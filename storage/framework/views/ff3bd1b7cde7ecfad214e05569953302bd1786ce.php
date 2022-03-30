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

    <?php echo $__env->make('inc.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>


    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <!-- JQuery Ajax -->


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


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css" integrity="sha512-kq3FES+RuuGoBW3a9R2ELYKRywUEQv0wvPTItv3DSGqjpbNtGWVdvT8qwdKkqvPzT93jp8tSF4+oN4IeTEIlQA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Select2 Bootstrap theme CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.css" integrity="sha512-CbQfNVBSMAYmnzP3IC+mZZmYMP2HUnVkV4+PwuhpiMUmITtSpS7Prr3fNncV1RBOnWxzz4pYQ5EAGG4ck46Oig==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/style.css')); ?>">
    <!-- END: Custom CSS-->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <nav class="navbar navbar-expand-lg navbar-white bg-white">
        <div class="container-fluid">
            <a class="navbar-brand" href="http://127.0.0.1:8000/menu">

                <img src="/img/logo.png" style="width: 70px; height: 35px;" alt="">
                <!-- <h2 class="brand-text mb-0">MyLibrary</h2> -->
            </a>
            <a class="navbar-brand" href="http://127.0.0.1:8000/menu">MyLibrary</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    &ensp;
                    <?php if(Auth::guest()): ?>
                    <!-- <li class="nav-item">
        <a class="nav-link btn btn-primary" href="<?php echo e(route('home')); ?>" style="pointer-events: none;cursor: default;">Dashboard</a>
    </li> -->
                    <!-- <li class="nav-item">
                        <a class="nav-link btn btn-primary" aria-current="page" href="http://127.0.0.1:8000">Home</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary" href="<?php echo e(route('beranda')); ?>">Beranda</a>
                    </li>
                    &ensp;
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary" href="<?php echo e(route('menu')); ?>">Buku</a>
                    </li>
                    <?php else: ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('dashboard')): ?>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary" href="<?php echo e(route('home')); ?>">Dashboard</a>
                    </li>
                    <?php endif; ?>
                    &ensp;
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('beranda')): ?>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary" href="<?php echo e(route('beranda')); ?>">Beranda</a>
                    </li>
                    <?php endif; ?>
                    &ensp;
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('book')): ?>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary" href="<?php echo e(route('menu')); ?>">Buku</a>
                    </li>
                    <?php endif; ?>
                    &ensp;
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('histori')): ?>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary" href="<?php echo e(route('histori')); ?>">Riwayat</a>
                    </li>
                    <?php endif; ?>
                    <?php endif; ?>
                </ul>
            </div>

            <div class="col">
                <form action="/buku/cari" method="GET">
                    <ul class="nav navbar-nav float-left">
                        <input type="text" class="form-control" id="cari" style="" name="cari" placeholder="Judul /Penulis /Kategori" value="<?php echo e(old('cari')); ?>">
                    </ul>
                </form>
            </div>

            &ensp;

            <!-- <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <input class="typeahead form-control" type="text">
                </ul> -->
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
    
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    
    <script src="<?php echo e(url('')); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo e(url('')); ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo e(url('')); ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo e(url('')); ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo e(url('')); ?>/dist/js/adminlte.js"></script>
    <script type="text/javascript" src="<?php echo e(url('')); ?>/plugins/select2/js/select2.full.min.js"></script>
    <script type="text/javascript" src="<?php echo e(url('')); ?>/dist/js/jquery.form.min.js">
    </script>
    <script type="text/javascript" src="<?php echo e(url('')); ?>/plugins/orgchart/js/html2canvas.min.js"></script>
    <script type="text/javascript" src="<?php echo e(url('')); ?>/plugins/orgchart/js/jquery.orgchart.min.js"></script>
    <?php echo $__env->yieldContent('js'); ?>
</body>

</html><?php /**PATH C:\xampp\htdocs\new-perpus1\resources\views/layouts/nav.blade.php ENDPATH**/ ?>