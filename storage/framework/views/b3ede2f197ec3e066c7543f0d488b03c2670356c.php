<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
    <li class="<?php echo e(\Request::is('home') ? 'active' : ''); ?> nav-item"><a href="<?php echo e(route('home')); ?>"><i class="feather icon-home"></i><span class="menu-title">Dashboard</span></a></li>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission')): ?>
    <li class="nav-item has-sub "><a href="#"><i class="feather icon-database"></i><span class="menu-title">Users, Role dan Permission</span></a>
        <ul class="menu-content">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('users')): ?>
            <li class="<?php echo e(in_array(\Request::route()->getName(), [
                'users.index',
                'users.create',
                'users.edit',
            ]) ? 'active' : ''); ?> nav-item"><a href="<?php echo e(route('users.index')); ?>"><i class="feather icon-users"></i><span class="menu-item">Users </span></a></li>
            <?php endif; ?>
            <li class="<?php echo e(in_array(\Request::route()->getName(), [
                'acl.role.index',
            ]) ? 'active' : ''); ?> nav-item"><a href="<?php echo e(route('acl.role.index')); ?>"><i class="feather icon-log-in"></i><span class="menu-item">Role</span></a></li>
            <li class="<?php echo e(in_array(\Request::route()->getName(), [
                'acl.permission.index',
            ]) ? 'active' : ''); ?> nav-item"><a href="<?php echo e(route('acl.permission.index')); ?>"><i class="feather icon-log-out"></i><span class="menu-item">Permission</span></a></li>
        </ul>
    </li>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('transaksi')): ?>
    <li class="<?php echo e(in_array(\Request::route()->getName(), [
        'transaksi.index',
        'transaksi.create',
        'transaksi.edit',
    ]) ? 'active' : ''); ?> nav-item"><a href="<?php echo e(route('transaksi.index')); ?>"><i class="feather icon-server"></i><span class="menu-title">Peminjaman & Pengembalian </span></a></li>
    <?php endif; ?>


    <li class="<?php echo e(in_array(\Request::route()->getName(), [
        'buku.index',
        'buku.create',
        'buku.edit',
        'buku.transaksiedit',
    ]) ? 'active' : ''); ?> nav-item"><a href="<?php echo e(route('buku.index')); ?>"><i class="feather icon-book-open"></i><span class="menu-item">Buku</span></a></li>


    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check("kategori")): ?>
    <li class="<?php echo e(in_array(\Request::route()->getName(), [
        'kategori.index',
        'kategori.create',
        'kategori.edit',
    ]) ? 'active' : ''); ?> nav-item"><a href="<?php echo e(route('kategori.index')); ?>"><i class="feather icon-grid"></i><span class="menu-title">Kategori </span></a></li>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check("anggota")): ?>
    <li class="<?php echo e(in_array(\Request::route()->getName(), [
        'anggota.index',
        'anggota.create',
        'anggota.edit',
    ]) ? 'active' : ''); ?> nav-item"><a href="<?php echo e(route('anggota.index')); ?>"><i class="feather icon-users"></i><span class="menu-title">Anggota </span></a></li>
    <?php endif; ?>
    
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check("pinjam")): ?>
    <li class="nav-item has-sub "><a href="#"><i class="feather icon-file-text"></i><span class="menu-title">Laporan</span></a>
        <ul class="menu-content">
            <li class="<?php echo e(in_array(\Request::route()->getName(), [
                'pinjam',
            ]) ? 'active' : ''); ?> nav-item"><a href="<?php echo e(route('pinjam')); ?>"><i class="feather icon-file-text"></i><span class="menu-item">Laporan Peminjaman</span></a></li>
            <li class="<?php echo e(in_array(\Request::route()->getName(), [
                'cetaklaporan',
            ]) ? 'active' : ''); ?> nav-item"><a href="<?php echo e(route('cetaklaporan')); ?>"><i class="feather icon-printer"></i><span class="menu-item">Cetak Laporan Peminjaman</span></a></li>
        </ul>
    </li>
    <?php endif; ?>
</ul>
<?php /**PATH C:\xampp\htdocs\new-perpus1\resources\views/inc/sidebar.blade.php ENDPATH**/ ?>