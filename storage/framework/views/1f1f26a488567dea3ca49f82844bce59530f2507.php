<?php $__env->startSection('content'); ?>
<a href="<?php echo e(route('acl.role.create')); ?>" class="btn btn-primary mb-1"><span class="fa fa-plus"></span> Tambah Role</a>
<div class="card">
    <div class="card-content">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover-animation nowrap scroll-horizontal-vertical" id="crudTable">
                    <thead>
                        <tr>
                            <th>Nama Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('after_styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('app-assets/vendors/css/forms/select/select2.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('app-assets/vendors/css/tables/datatable/datatables.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('after_scripts'); ?>
<script src="<?php echo e(asset('app-assets/vendors/js/forms/select/select2.min.js')); ?>"></script>
<script src="<?php echo e(asset('app-assets/vendors/js/tables/datatable/datatables.min.js')); ?>"></script>
<script src="<?php echo e(asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')); ?>"></script>
<script>
// AJAX DataTable
var datatable = $('#crudTable').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url: '<?php echo route('acl.role.data'); ?>',
    },
    ordering: false,
    columns: [
        { data: 'name', name: 'name' },
        { data: 'action', name: 'action' },
    ],
    drawCallback: function(){
        // Delete Confirmation
        $(".delete").on("click", function(){
            var form = $(this).parent().find("form");
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Yakin ingin menghapus ini?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya!'
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
    'title' => 'Daftar Role',
    'breadcrumbs' => [
        'Role',
        'List',
    ]
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\new-perpus1\resources\views/acl/role-list.blade.php ENDPATH**/ ?>