<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-content">
        <div class="card-body">
            <h2>Cetak Laporan Pertanggal</h2>
            Tanggal Awal
            <div class="input-group mb-3">
                <input type="date" name="tglawal" id="tglawal" class="form-control" required>
            </div>
            Tanggal Akhir
            <div class="input-group mb-3">
                <input type="date" name="tglakhir" id="tglakhir" class="form-control" required>
            </div>
            <div class="input-group mb-3">
            <a href="" onclick="this.href='/cetaklaporanpertanggal/'+ document.getElementById('tglawal').value + '/' + document.getElementById('tglakhir').value " target="_blank" class="btn btn-primary"><span class="fa fa-print"></span> Cetak</a>
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
'title' => 'Cetak Laporan Pertanggal',
'breadcrumbs' => [
'Laporan',
'Cetak Laporan Pertanggal'
],
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\new-perpus1\resources\views/cetaklaporan.blade.php ENDPATH**/ ?>