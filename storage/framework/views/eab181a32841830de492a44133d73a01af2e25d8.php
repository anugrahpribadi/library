<?php $__env->startSection('content'); ?>

<!-- <div class="col-md-3">
    <div class="card">
        <div class="card-header d-flex flex-column align-items-start pb-0">
            <div class="avatar bg-rgba-primary p-50 m-0">
                <div class="user-content">
                    <i class="feather icon-book-open text-primary font-medium-5" button title="Jumlah Buku"></i>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-header d-flex flex-column align-items-start pb-0">
                    <div class="avatar bg-rgba-primary p-50 m-0">
                        <div class="user-content">
                            <i class="feather icon-book-open text-primary font-medium-5" button title="Jumlah Buku"></i>
                        </div>
                    </div>
                    <h2 class="text-bold-700 mt-1"><?php echo e($ck); ?></h2>
                    <p class="mb-100">Total Kategori</p>
                    <br>
                </div>
            </div>
        </div>
        
        <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header d-flex flex-column align-items-start pb-0">
                    <div class="avatar bg-rgba-primary p-50 m-0">
                        <div class="user-content">
                            <i class="feather icon-book-open text-primary font-medium-5" button title="Jumlah Buku"></i>
                        </div>
                    </div>
                    <h2 class="text-bold-700 mt-1"><?php echo e($k->nama); ?></h2>
                    <p class="mb-100"></p>
                    <br>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<footer class="footer footer-static footer-dark footer-fixed">
    <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25"><strong>Copyright</strong> MyLibrary &copy; <?php echo e(date('Y')); ?></span>
        <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
    </p>
</footer>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.nav', [
'title' => 'Laporan Pengembalian',
'breadcrumbs' => [
'Laporan Pengembalian'
],
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\new-perpus1\resources\views/beranda.blade.php ENDPATH**/ ?>