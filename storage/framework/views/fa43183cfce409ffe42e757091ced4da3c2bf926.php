<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
    <li class="<?php echo e(\Request::is('home') ? 'active' : ''); ?> nav-item"><a href="<?php echo e(route('home')); ?>"><i class="feather icon-home"></i><span class="menu-title">Dashboard</span></a></li>
    
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('users')): ?>
    <li class="<?php echo e(in_array(\Request::route()->getName(), [
        'users.index',
        'users.create',
        'users.edit',
    ]) ? 'active' : ''); ?> nav-item"><a href="<?php echo e(route('users.index')); ?>"><i class="feather icon-users"></i><span class="menu-title">Users </span></a></li>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('transaksi')): ?>
    <li class="<?php echo e(in_array(\Request::route()->getName(), [
        'transaksi.index',
        'transaksi.create',
        'transaksi.edit',
    ]) ? 'active' : ''); ?> nav-item"><a href="<?php echo e(route('transaksi.index')); ?>"><i class="feather icon-server"></i><span class="menu-title">Peminjaman </span></a></li>
    <?php endif; ?>
    

    <!-- <li class="<?php echo e(in_array(\Request::route()->getName(), [
        'transaksi.index',
        'transaksi.create',
        'transaksi.edit',
    ]) ? 'active' : ''); ?> nav-item"><a href="<?php echo e(route('transaksi.index')); ?>"><i class="feather icon-server"></i><span class="menu-title">Peminjaman </span></a></li> -->

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('buku')): ?>
    <li class="<?php echo e(in_array(\Request::route()->getName(), [
        'buku.index',
        'buku.create',
        'buku.edit',
    ]) ? 'active' : ''); ?> nav-item"><a href="<?php echo e(route('buku.index')); ?>"><i class="feather icon-book-open"></i><span class="menu-item">Buku</span></a></li>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check("kategori")): ?>
    <li class="<?php echo e(in_array(\Request::route()->getName(), [
        'kategori.index',
        'kategori.create',
        'kategori.edit',
    ]) ? 'active' : ''); ?> nav-item"><a href="<?php echo e(route('kategori.index')); ?>"><i class="feather icon-server"></i><span class="menu-title">Kategori </span></a></li>
    <?php endif; ?>

<<<<<<< HEAD:storage/framework/views/29aa2c42b787d087fe93a8952889f86ccba09b40.php
=======
    <li class="<?php echo e(in_array(\Request::route()->getName(), [
                'listkategori',
            ]) ? 'active' : ''); ?> nav-item"><a href="<?php echo e(route('listkategori')); ?>"><i class="feather icon-list"></i><span class="menu-item">List Kategori</span></a></li>

    <!-- <li class="nav-item has-sub "><a href="#"><i class="feather icon-list"></i><span class="menu-title">List Kategori</span></a>
        <ul class="menu-content">
            <li class="<?php echo e(in_array(\Request::route()->getName(), [
                ]) ? 'active' : ''); ?> nav-item"><a href=""><i class="feather icon-tag"></i><span class="menu-item"></span></a>
            </li>
        </ul>
    </li> -->

>>>>>>> 361c333084b3405f0993090f55f9a66f677fbefb:storage/framework/views/fa43183cfce409ffe42e757091ced4da3c2bf926.php
    <li class="nav-item has-sub "><a href="#"><i class="feather icon-file-text"></i><span class="menu-title">Role and Permission</span></a>
        <ul class="menu-content">
            <li class="<?php echo e(in_array(\Request::route()->getName(), [
                'acl.role.index',
            ]) ? 'active' : ''); ?> nav-item"><a href="<?php echo e(route('acl.role.index')); ?>"><i class="feather icon-log-in"></i><span class="menu-item">Role</span></a></li>
            <li class="<?php echo e(in_array(\Request::route()->getName(), [
                'acl.permission.index',
            ]) ? 'active' : ''); ?> nav-item"><a href="<?php echo e(route('acl.permission.index')); ?>"><i class="feather icon-log-out"></i><span class="menu-item">Permission</span></a></li>
        </ul>
    </li>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check("lokasi")): ?>
    <li class="<?php echo e(in_array(\Request::route()->getName(), [
        'lokasi.index',
        'lokasi.create',
        'lokasi.edit',
    ]) ? 'active' : ''); ?> nav-item"><a href="<?php echo e(route('lokasi.index')); ?>"><i class="feather icon-book"></i><span class="menu-title">Lokasi Buku </span></a></li>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check("anggota")): ?>
    <li class="<?php echo e(in_array(\Request::route()->getName(), [
        'anggota.index',
        'anggota.create',
        'anggota.edit',
    ]) ? 'active' : ''); ?> nav-item"><a href="<?php echo e(route('anggota.index')); ?>"><i class="feather icon-users"></i><span class="menu-title">Anggota </span></a></li>
    <?php endif; ?>
    
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check("denda")): ?>
    <li class="<?php echo e(in_array(\Request::route()->getName(), [
        'denda.index',
        'denda.create',
        'denda.edit',
    ]) ? 'active' : ''); ?> nav-item"><a href="<?php echo e(route('denda.index')); ?>"><i class="feather icon-users"></i><span class="menu-title">Denda </span></a></li>
    <?php endif; ?>
    
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check("pinjam")): ?>
    <li class="nav-item has-sub "><a href="#"><i class="feather icon-file-text"></i><span class="menu-title">Laporan</span></a>
        <ul class="menu-content">
            <li class="<?php echo e(in_array(\Request::route()->getName(), [
                'pinjam',
            ]) ? 'active' : ''); ?> nav-item"><a href="<?php echo e(route('pinjam')); ?>"><i class="feather icon-log-in"></i><span class="menu-item">Peminjaman</span></a></li>
            <li class="<?php echo e(in_array(\Request::route()->getName(), [
                'trash',
            ]) ? 'active' : ''); ?> nav-item"><a href="<?php echo e(route('trash')); ?>"><i class="feather icon-log-out"></i><span class="menu-item">Pengembalian</span></a></li>
        </ul>
    </li>
    <?php endif; ?>
</ul>
<?php /**PATH C:\xampp\htdocs\perpus\resources\views/inc/sidebar.blade.php ENDPATH**/ ?>