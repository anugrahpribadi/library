<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
    <li class="{{ \Request::is('home') ? 'active' : '' }} nav-item"><a href="{{ route('home') }}"><i class="feather icon-home"></i><span class="menu-title">Dashboard</span></a></li>
    
    @can('users')
    <li class="{{ in_array(\Request::route()->getName(), [
        'users.index',
        'users.create',
        'users.edit',
    ]) ? 'active' : '' }} nav-item"><a href="{{ route('users.index') }}"><i class="feather icon-users"></i><span class="menu-title">Users </span></a></li>
    @endcan

    @can('transaksi')
    <li class="{{ in_array(\Request::route()->getName(), [
        'transaksi.index',
        'transaksi.create',
        'transaksi.edit',
    ]) ? 'active' : '' }} nav-item"><a href="{{ route('transaksi.index') }}"><i class="feather icon-server"></i><span class="menu-title">Peminjaman & Pengembalian </span></a></li>
    @endcan


    <li class="{{ in_array(\Request::route()->getName(), [
        'buku.index',
        'buku.create',
        'buku.edit',
        'buku.transaksiedit',
    ]) ? 'active' : '' }} nav-item"><a href="{{ route('buku.index') }}"><i class="feather icon-book-open"></i><span class="menu-item">Buku</span></a></li>


    @can("kategori")
    <li class="{{ in_array(\Request::route()->getName(), [
        'kategori.index',
        'kategori.create',
        'kategori.edit',
    ]) ? 'active' : '' }} nav-item"><a href="{{ route('kategori.index') }}"><i class="feather icon-database"></i><span class="menu-title">Kategori </span></a></li>
    @endcan

    <!-- @can('listkategori')
    <li class="{{ in_array(\Request::route()->getName(), [
                'listkategori',
            ]) ? 'active' : '' }} nav-item"><a href="{{ route('listkategori') }}"><i class="feather icon-list"></i><span class="menu-item">List Kategori</span></a></li>
    @endcan -->

    <!-- <li class="nav-item has-sub "><a href="#"><i class="feather icon-list"></i><span class="menu-title">List Kategori</span></a>
        <ul class="menu-content">
            <li class="{{ in_array(\Request::route()->getName(), [
                ]) ? 'active' : '' }} nav-item"><a href=""><i class="feather icon-tag"></i><span class="menu-item"></span></a>
            </li>
        </ul>
    </li> -->
    @can('permission')
    <li class="nav-item has-sub "><a href="#"><i class="feather icon-file-text"></i><span class="menu-title">Role and Permission</span></a>
        <ul class="menu-content">
            <li class="{{ in_array(\Request::route()->getName(), [
                'acl.role.index',
            ]) ? 'active' : '' }} nav-item"><a href="{{ route('acl.role.index') }}"><i class="feather icon-log-in"></i><span class="menu-item">Role</span></a></li>
            <li class="{{ in_array(\Request::route()->getName(), [
                'acl.permission.index',
            ]) ? 'active' : '' }} nav-item"><a href="{{ route('acl.permission.index') }}"><i class="feather icon-log-out"></i><span class="menu-item">Permission</span></a></li>
        </ul>
    </li>
    @endcan

    @can("anggota")
    <li class="{{ in_array(\Request::route()->getName(), [
        'anggota.index',
        'anggota.create',
        'anggota.edit',
    ]) ? 'active' : '' }} nav-item"><a href="{{ route('anggota.index') }}"><i class="feather icon-users"></i><span class="menu-title">Anggota </span></a></li>
    @endcan
    
    <!-- @can("denda")
    <li class="{{ in_array(\Request::route()->getName(), [
        'denda.index',
        'denda.create',
        'denda.edit',
    ]) ? 'active' : '' }} nav-item"><a href="{{ route('denda.index') }}"><i class="feather icon-users"></i><span class="menu-title">Denda </span></a></li>
    @endcan -->
    
    @can("pinjam")
    <li class="nav-item has-sub "><a href="#"><i class="feather icon-file-text"></i><span class="menu-title">Laporan</span></a>
        <ul class="menu-content">
            <li class="{{ in_array(\Request::route()->getName(), [
                'pinjam',
            ]) ? 'active' : '' }} nav-item"><a href="{{ route('pinjam') }}"><i class="feather icon-log-in"></i><span class="menu-item">Peminjaman</span></a></li>
            <li class="{{ in_array(\Request::route()->getName(), [
                'laporan',
            ]) ? 'active' : '' }} nav-item"><a href="{{ route('laporan') }}"><i class="feather icon-log-out"></i><span class="menu-item">Pengembalian</span></a></li>
        </ul>
    </li>
    @endcan
</ul>
