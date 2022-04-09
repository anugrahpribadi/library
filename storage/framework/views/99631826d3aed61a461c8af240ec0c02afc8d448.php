<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-content">
        <di class="card-body">

        <!-- <div class="col">
                <form action="/laporan/cari" method="GET">
                    <ul class="float-left">
                        <input type="text" class="form-control" id="cari" style="width: 200px;" name="cari" placeholder="Judul atau Penulis" value="<?php echo e(old('cari')); ?>">
                    </ul>
                </form>
                
            </div> -->

            <div class="col-md-3">
            <div class="dropdown">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Urut Berdasarkan</button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?php echo e(url('laporan/dataterbaru')); ?>"><i class="feather icon-chevrons-up"></i>Data Terbaru</a>
                            <a class="dropdown-item" href="<?php echo e(url('laporan/dataterlama')); ?>"><i class="feather icon-chevrons-down"></i> Data Terlama</a>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-3">
                <a href="<?php echo e(route('cetak-peminjaman')); ?>" target="_blank" class="btn btn-primary ml-5"><span class="fa fa-print"></span> Cetak</a>
                </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="dataTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kode Transaksi</th>
                            <th scope="col">Judul Buku</th>
                            <th scope="col">Nama Anggota</th>
                            <th scope="col">Tgl Peminjaman</th>
                            <th scope="col">Batas Waktu Peminjaman</th>
                            <th scope="col">Tgl Pengembalian</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        ?>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dataa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th scope="row"><?php echo e(++$no); ?></th>
                            <td><?php echo e($dataa->kode); ?></td>
                            <td><?php echo e($dataa->buku_name); ?></td>
                            <td><?php echo e($dataa->user_name); ?></td>
                            <td><?php echo e(date('d F Y', strtotime($dataa->tgl_pinjam))); ?></td>
                            <td><?php echo e(date('d F Y', strtotime($dataa->tgl_hrs_kembali))); ?></td>
                            <?php if($dataa->deleted_at == null): ?>
                            <td>Belum Dikembalikan!</td>
                            <?php else: ?>
                            <td><?php echo e(date('d F Y', strtotime($dataa->deleted_at))); ?></td>
                            <?php endif; ?>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', [
'title' => 'Laporan Peminjaman',
'breadcrumbs' => [
'Laporan Peminjaman'
],
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\library\resources\views/pinjam.blade.php ENDPATH**/ ?>