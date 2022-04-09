<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-content">
        <div class="card-body">
            <div class="row">
            <a href="<?php echo e(route('cetaklaporan')); ?>" class="btn btn-primary"><span class="fa fa-print"></span> Cetak</a>

            <div class="col-md-3">
            <div class="dropdown">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Urut Berdasarkan</button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?php echo e(url('laporan/dataterbaru')); ?>"><i class="feather icon-chevrons-up"></i>Data Terbaru</a>
                    <a class="dropdown-item" href="<?php echo e(url('laporan/dataterlama')); ?>"><i class="feather icon-chevrons-down"></i> Data Terlama</a>
                </div>
            </div>
            </div>
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
                    <tbody id="dataTable">
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

<?php $__env->startPush('after_styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('app-assets/vendors/css/tables/datatable/datatables.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('after_scripts'); ?>
<script src="<?php echo e(asset('app-assets/vendors/js/tables/datatable/datatables.min.js')); ?>"></script>
<script src="<?php echo e(asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')); ?>"></script>
<script>
// AJAX DataTable
// AJAX DataTable
$('.dataTable').DataTable({
    processing: true,
    serverSide: true,
    ordering: false,
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', [
'title' => 'Laporan Peminjaman',
'breadcrumbs' => [
'Laporan Peminjaman'
],
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\library\resources\views/pinjam.blade.php ENDPATH**/ ?>