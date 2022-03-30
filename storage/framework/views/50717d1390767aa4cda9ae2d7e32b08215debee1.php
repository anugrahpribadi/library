<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-content">
        <div class="card-body">
            <a href="<?php echo e(route('cetak-pengembalian')); ?>" target="_blank" class="btn btn-primary"><span class="fa fa-print"></span> Cetak</a>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Kode Transaksi</th>
                                <th scope="col">Judul Buku</th>
                                <th scope="col">Nama Anggota</th>
                                <th scope="col">Tanggal Peminjaman</th>
                                <th scope="col">Batas Waktu Peminjaman</th>
                                <th scope="col">Tanggal Kembali</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            ?>
                            <?php $__currentLoopData = $dataa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dataa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row"><?php echo e(++$no); ?></th>
                                <td><?php echo e($dataa->kode); ?></td>
                                <td><?php echo e($dataa->buku_name); ?></td>
                                <td><?php echo e($dataa->anggota_name); ?></td>
                                <td><?php echo e($dataa->tgl_pinjam); ?></td>
                                <td><?php echo e($dataa->tgl_hrs_kembali); ?></td>
                                <td><?php echo e($dataa->deleted_at); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<script>
	$('.dataTable').dataTable({
		processing: true,
		serverSide: false,
            "createdRow": function( row, data, dataTable){
				if (data.dataa == ""){
					$(row).addClass('redClass');
				}
        }
    })		
</script>
<?php echo $__env->make('layouts.app', [
'title' => 'Laporan Pengembalian',
'breadcrumbs' => [
'Laporan Pengembalian'
],
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\perpus\resources\views/trash.blade.php ENDPATH**/ ?>