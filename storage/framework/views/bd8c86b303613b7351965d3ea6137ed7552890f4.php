 

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-content">
        <div class="card-body">
          <div class="row">
            <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <p><a href="/namakategori/<?php echo e($k->id); ?>" class="btn btn-primary"> <?php echo e($k->nama); ?> </a></p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
    
    ordering: false,
    columns: [
       
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
    'title' => 'Kategori',
    'breadcrumbs' => [
        'Kategori',
    ],
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\perpuspbofix\perpus\resources\views/listkategori.blade.php ENDPATH**/ ?>