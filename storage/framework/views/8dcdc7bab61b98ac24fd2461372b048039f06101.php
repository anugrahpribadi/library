<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-content">
        <div class="card-body">
            <form class="form-inline" action="">
                <!-- <div class="form-group">
                    <label for=""><b>Tanggal awal : </b></label>
                    <input name="tgl_awal" type="date" class="form-control ml-1">
                </div>
                <div class="form-group">
                    <label for=""><b>s/d tanggal : </b></label>
                    <input name="tgl_akhir" type="date" class="form-control ml-1">
                </div> -->
                <!-- <button type="submit" class="btn btn-primary ml-1">Oke</button> -->
                <a href="<?php echo e(route('cetak-pengembalian')); ?>" target="_blank" class="btn btn-primary ml-5"><span class="fa fa-print"></span> Cetak</a>
            </form>
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
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        ?>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th scope="row"><?php echo e(++$no); ?></th>
                            <td><?php echo e($data->kode); ?></td>
                            <td><?php echo e($data->buku_name); ?></td>
                            <td><?php echo e($data->user_name); ?></td>
                            <td><?php echo e(date('d F Y', strtotime($data->tgl_pinjam))); ?></td>
                            <td><?php echo e(date('d F Y', strtotime($data->tgl_hrs_kembali))); ?></td>
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
        "createdRow": function(row, data, dataTable) {
            if (data.dataa == "") {
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
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\library\resources\views/laporan.blade.php ENDPATH**/ ?>