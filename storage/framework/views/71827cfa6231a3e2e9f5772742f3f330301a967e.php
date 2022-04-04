 

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-content">
        <div class="card-body">
            
            <?php if(isset($table['create'])): ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create anggota')): ?>
            <a href="<?php echo e($table['create']['url']); ?>" class="btn btn-primary"><span class="fa fa-plus"></span> <?php echo e($table['create']['label']); ?></a>
            <?php endif; ?>
            
            <?php endif; ?>

            <!-- =========================================================================================== -->

            <?php if(auth()->user()->name == "Admin"): ?>
            <a href="<?php echo e(route('cetak-anggota')); ?>" target="_blank" class="btn btn-primary"><span class="fa fa-print"></span> Cetak</a>
            <?php endif; ?>
            <?php if(auth()->user()->name == "Pustakawan"): ?>
            <a href="<?php echo e(route('cetak-anggota')); ?>" target="_blank" class="btn btn-primary"><span class="fa fa-print"></span> Cetak</a>
            <?php endif; ?>
            <div class="table-responsive">
                <table class="table table-hover-animation nowrap scroll-horizontal-vertical" id="crudTable">
                    <thead>
                        <tr>
                            <?php $__currentLoopData = $table['columns']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <th><?php echo e($column['label']); ?></th>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
$('#crudTable').DataTable({
    processing: true,
    serverSide: true,
    ajax: '<?php echo e($table['table_url']); ?>',
    ordering: false,
    columns: [
        <?php $__currentLoopData = $table['columns']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        { data: '<?php echo e($column['name']); ?>', name: '<?php echo e($column['name']); ?>' },
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    ],
    drawCallback: function(){
        // Delete Confirmation
        $(".delete").on("click", function(){
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
    'title' => 'Anggota',
    'breadcrumbs' => [
        'Anggota',
    ],
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\library\resources\views/anggota/index.blade.php ENDPATH**/ ?>