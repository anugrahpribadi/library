<?php $__env->startSection('content'); ?>
<div class="container-md">
    <!-- <a href="<?php echo e(route('menu')); ?>" class="btn btn-primary">Kembali</a> -->
    <h2>Riwayat Peminjaman</h2>
    <br><br>
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Judul Buku</th>
                                <th scope="col">Penulis</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Tanggal Peminjaman</th>
                                <!-- <th scope="col">Status</th> -->
                                <th scope="col">Batas Waktu Peminjaman</th>
                                <th scope="col">Tanggal Pengembalian</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            ?>
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row"><?php echo e(++$no); ?></th>
                                <td><?php echo e($d->buku->judul); ?></td>
                                <td><?php echo e($d->buku->penulis); ?></td>
                                <td><?php echo e($d->buku->kategori->nama); ?></td>
                                <td><?php echo e(date('d F Y', strtotime($d->tgl_pinjam))); ?></td>
                                <td><?php echo e(date('d F Y', strtotime($d->tgl_hrs_kembali))); ?></td>
                                <?php if($d->deleted_at == null): ?> 
                                    <td>Belum Dikembalikan!</td>
                                <?php else: ?>
                                <td><?php echo e(date('d F Y', strtotime($d->deleted_at))); ?></td>
                                <?php endif; ?>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\new-perpus1\resources\views/histori.blade.php ENDPATH**/ ?>