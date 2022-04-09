<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('menu');
});

route::get('/menu', 'PagesController@index')->name('menu');
route::get('/beranda', 'PagesController@beranda')->name('beranda');
Route::get('/detailbuku', 'PagesController@detail')->name('detailbuku');
Route::get('/buku/setKategori', 'PagesController@setKategori')->name('setKategori');
Route::get('/detailbuku/{id}','PagesController@show')->name('show');
Route::get('/sisa','PagesController@sisa')->name('sisa');

route::get('/buku', 'PagesController@buku')->name('buku');

Route::resource('/pages', 'PagesController');
Route::get('/buku/cari','PagesController@cari')->name('cari');
Route::get('/buku/kategori','PagesController@kategori')->name('kategori');
Route::get('/userguide','PagesController@guide')->name('guide');

Route::get('/listkategori', 'PagesController@listkategori')->name('listkategori');
Route::get('/laporan/cari','TransaksiController@cari')->name('cari');

Auth::routes(['register' => false]);
route::get('logout', 'Auth\LoginController@logout')->name('logout');
route::get('/admin/user', 'Admin\UserController@create')->name('register');

Route::group(['middleware' => 'auth'], function () {
    Route::get('profile', 'ProfileController@edit')->name('profile.edit');
    Route::patch('profile', 'ProfileController@update')->name('profile.update');
});

route::middleware('admin')->group(function () {
    route::get('/histori', 'TransaksiController@histori')->name('histori');
    route::get('/home', 'HomeController@index')->name('home');
    route::get('/laporanpengembalian/periode', 'TransaksiController@periodepengembalian')->name('periode_awal');
    route::get('/pinjam', 'TransaksiController@pinjam')->name('pinjam');
    route::get('/laporan/periode', 'TransaksiController@periodepinjam')->name('periode_awal');
    route::get('/laporan', 'TransaksiController@pinjam')->name('pinjam');
    route::get('/laporan/dataterbaru', 'TransaksiController@baru')->name('baru');
    route::get('/laporan/dataterlama', 'TransaksiController@lama')->name('lama');
    route::get('/histori/dataterbaru', 'TransaksiController@databaru')->name('baru');
    route::get('/histori/dataterlama', 'TransaksiController@datalama')->name('lama');

    route::get('/cetaklaporan', 'TransaksiController@cetakLaporan')->name('cetaklaporan');
    route::get('/cetaklaporanpertanggal/{tglawal}/{tglakhir}', 'TransaksiController@cetakLaporanPertanggal')->name('cetaklaporanpertanggal');
    
    Route::get('/laporan/periode','Transaksicontroller@periode')->name('periode');

    Route::prefix('acl')->name('acl.')->group(function () {
        Route::get('permission', 'Admin\ACLController@permissionList')->name('permission.index');
        Route::get('permission/data', 'Admin\ACLController@permissionData')->name('permission.data');
        Route::prefix('role')->name('role.')->group(function () {
            Route::get('/', 'Admin\ACLController@roleList')->name('index');
            Route::get('/data', 'Admin\ACLController@roleData')->name('data');
            Route::get('/create', 'Admin\ACLController@createRole')->name('create');
            Route::post('/create', 'Admin\ACLController@storeRole')->name('store');
            Route::get('/{id}/edit', 'Admin\ACLController@editRole')->name('edit');
            Route::patch('/{id}/edit', 'Admin\ACLController@updateRole')->name('update');
            Route::delete('/{id}/destroy', 'Admin\ACLController@deleteRole')->name('destroy');
        });
    });

    // Users
    route::resource('/users', 'Admin\UserController');
    route::get('/users/data/json', 'Admin\UserController@getData')->name('users.data');

    // Buku
    Route::resource('/buku', 'BukuController');
    Route::get('/buku/data/json', 'BukuController@getData')->name('buku.data');
    Route::post('/buku/data/json', 'BukuController@imageUploadPost')->name('image.upload.post');
    Route::post('/buku/data/json', 'BukuController@bacaUploadPost')->name('baca.upload.post');
    Route::get('/cetak-buku', 'BukuController@cetak')->name('cetak-buku');

    // Anggota
    Route::resource('/anggota', 'AnggotaController');
    Route::get('/anggota/data/json', 'AnggotaController@getData')->name('anggota.data');
    Route::get('/cetak-anggota', 'AnggotaController@cetak')->name('cetak-anggota');

    // Kategori
    Route::resource('/kategori', 'KategoriController');
    Route::get('/kategori/data/json', 'KategoriController@getData')->name('kategori.data');

    // Transaksi
    Route::resource('/transaksi', 'TransaksiController');
    Route::get('/transaksi/data/json', 'TransaksiController@getData')->name('transaksi.data');
    Route::get('/cetak-transaksi', 'TransaksiController@cetak')->name('cetak-transaksi');

    // Denda
    Route::resource('/denda', 'DendaController');
    Route::get('/denda/data/json', 'DendaController@getData')->name('denda.data');
    // Route::get('/cetak-denda', 'DendaController@cetak')->name('cetak-denda');
    
    // // User
    // Route::resource('/user', 'UserController');
    // Route::get('/user/data/json', 'UserController@getData')->name('user.data');

    // Laporan Peminjaman
    Route::resource('/laporanpeminjaman', 'LaporanpeminjamanController');
    Route::get('/laporan/data/json', 'LaporanpeminjamanController@getData')->name('laporanpeminjaman.data');
    Route::get('/cetak-peminjaman', 'TransaksiController@cetakpeminjaman')->name('cetak-peminjaman');

    // Laporan Pengembalian
    Route::resource('/laporanpengembalian', 'LaporanpengembalianController');
    Route::get('/laporan/data/json', 'LaporanpengembalianController@getData')->name('laporanpengembalian.data');
    Route::get('/cetak-pengembalian', 'TransaksiController@cetakpengembalian')->name('cetak-pengembalian');
    
});

Route::get('check/accessor', function (App\Models\Transaksi $id) {
    $data = new \App\Models\Transaksi;
    dd($data->first()->getBorrowDateAttribute());
});
