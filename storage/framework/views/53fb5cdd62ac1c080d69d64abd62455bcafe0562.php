<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-content">
        <div class="card-body">

            <?php if(isset($table['create'])): ?>

            <a href="<?php echo e($table['create']['url']); ?>" class="btn btn-primary"><span class="fa fa-plus"></span> <?php echo e($table['create']['label']); ?></a>
            
            
            <?php endif; ?>
            <div class="table-responsive">
                <table class="table table-hover-animation nowrap scroll-horizontal-vertical" id="crudTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Kode Transaksi</th>
                            <th>Buku</th>
                            <th>Anggota</th>
                            <th>keterangan </th>
                            <th>Nominal Denda</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
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
$('#crudTable').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url: '<?php echo route('denda.data',); ?>',
    },
    ordering: false,
    columns: [
        { data: 'formatted_id', name: 'formatted_id' },
        { data: 'transaksi_name', name: 'transaksi_id' },
        { data: 'buku_name', name: 'buku_id' },
        { data: 'anggota_name', name: 'anggota_id' },
        { data: 'keterangan', name: 'keterangan' },
        { data: 'nominal', name: 'nominal' },
    ],
    drawCallback: function() {
        // Delete Confirmation
        $(".delete").on("click", function() {
            var form = $(this).parent().find("form");
            Swal.fire({
                title: 'Are you sure?',
                text: "Are you sure to delete this?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!'
            }).then((result) => {
                if (result.value) {
                    form.submit();
                }
            })
        });
    }
});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', [
'title' => 'Denda',
'breadcrumbs' => [
'Denda',
],
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/macbookpro/Documents/Laravel/perpus/resources/views/denda/index.blade.php ENDPATH**/ ?>