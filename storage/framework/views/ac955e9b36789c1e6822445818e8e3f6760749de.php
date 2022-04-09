<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-content">
        <div class="card-body">

            <?php if(isset($table['create'])): ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create buku')): ?>
            <a href="<?php echo e($table['create']['url']); ?>" class="btn btn-primary"><span class="fa fa-plus"></span> <?php echo e($table['create']['label']); ?></a>
            <?php endif; ?>

            <?php endif; ?>

            <!-- ========================================================================================== -->
            
            <?php if(auth()->user()->name == "Admin"): ?>
                <a href="<?php echo e(route('cetak-buku')); ?>" target="_blank" class="btn btn-primary"><span class="fa fa-print"></span> Cetak</a>
            <?php endif; ?>
            <?php if(auth()->user()->name == "Pustakawan"): ?>
                <a href="<?php echo e(route('cetak-buku')); ?>" target="_blank" class="btn btn-primary"><span class="fa fa-print"></span> Cetak</a>
            <?php endif; ?>
            <div class="table-responsive">
                <table class="table table-hover-animation nowrap scroll-horizontal-vertical" id="crudTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Kode Buku</th>
                            <th>Judul</th>
                            <th>Kategori Buku </th>
                            <th>Cover Buku</th>
                            <th>Download Buku</th>
                            <th>Jumlah Buku</th>
                            <th>Aksi</th>
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
var table = $('#crudTable').DataTable({
    processing: true,
    serverSide: true,
    ajax: { 
        url: '<?php echo route('buku.data',); ?>',
    },
    ordering: false,
    columns: [
        { data: 'formatted_id', name: 'formatted_id' },
        { data: 'kode', name: 'kode' },
        { data: 'judul', name: 'judul' },
        { data: 'kategori_name', name: 'kategori_id' },
        { data: 'cover_buku_url', name: 'cover_buku_url' },
        { data: 'baca_buku_url', name: 'baca_buku_url' },
        { data: 'jumlah_buku', name: 'jumlah_buku' },
        { data: 'action', name: 'action' },
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

//filter Berdasarkan satuan product
$('.filter-satuan').change(function () {
        table.column( $(this).data('column'))
        .search( $(this).val() )
        .draw();
    });


</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', [
'title' => 'Buku',
'breadcrumbs' => [
'Buku', 
],
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\new-perpus1\resources\views/Book/index.blade.php ENDPATH**/ ?>