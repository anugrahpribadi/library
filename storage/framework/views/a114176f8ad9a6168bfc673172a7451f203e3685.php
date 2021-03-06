<?php $__env->startSection('content'); ?>

<!-- <div class="row-md-3">
    <div class="card">
        <div class="card-header">
            Quote
        </div>
        <div class="card-body">
            <blockquote class="blockquote mb-0">
                <p>A well-known quote, contained in a blockquote element.</p>
                <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
            </blockquote>
        </div>
    </div>
</div> -->

<div class="row">
    <div class="card">
        <div class="card-header d-flex flex-column align-items-start pb-0">
            <div class="avatar bg-rgba-primary p-50 m-0">
                <div class="user-content">
                    <i class="feather icon-book-open text-primary font-medium-5" button title="Jumlah Buku"></i>
                </div>
            </div>
            <h2 class="text-bold-700 mt-1"> hari lagi!</h2>
            <p class="mb-100">Sisa waktu pengembalian buku</p>
            <br>
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
            <h2 class="text-bold-700 mt-1"><?php echo e($buku); ?></h2>
            <p class="mb-100">Total Buku</p>
            <br>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.nav', [
'title' => 'Laporan Pengembalian',
'breadcrumbs' => [
'Laporan Pengembalian'
],
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\libraryc\resources\views/beranda.blade.php ENDPATH**/ ?>