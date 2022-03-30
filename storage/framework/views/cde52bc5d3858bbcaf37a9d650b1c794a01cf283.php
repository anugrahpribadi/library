<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-content">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover-animation nowrap scroll-horizontal-vertical" id="crudTable">
                    <thead>
                        <tr>
                            <th>Nama Permission</th>
                            <th>Dimiliki oleh Role</th>
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
var datatable = $('#crudTable').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url: '<?php echo route('acl.permission.data'); ?>',
    },
    ordering: false,
    columns: [
        { data: 'name', name: 'name' },
        { data: 'has_role', name: 'has_role' },
    ]
});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', [
    'title' => 'Daftar Permission',
    'breadcrumbs' => [
        'Permission',
        'List',
    ]
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\perpuspbofix\perpus\resources\views/acl/permission-list.blade.php ENDPATH**/ ?>