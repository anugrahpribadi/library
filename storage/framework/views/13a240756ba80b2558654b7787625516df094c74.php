<?php $__env->startPush('after_styles'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/vendors/css/extensions/sweetalert2.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('before_scripts'); ?>
    <script src="<?php echo e(asset('app-assets/vendors/js/extensions/sweetalert2.all.min.js')); ?>"></script>
<?php $__env->stopPush(); ?>


<?php if(session('status')): ?>
    <?php $__env->startPush('before_scripts'); ?>
        <script>
            Swal.fire({
                type: 'success',
                title: 'Success',
                text: '<?php echo e(session('status')); ?>'
            })
        </script>

    <?php $__env->stopPush(); ?>
<?php endif; ?>


<?php if(session('error')): ?>
    <?php $__env->startPush('before_scripts'); ?>
        <script>
            Swal.fire({
                type: 'error',
                title: 'Errors',
                text: '<?php echo e(session('error')); ?>'
            })
        </script>

    <?php $__env->stopPush(); ?>
<?php endif; ?>


<?php if($errors->any()): ?>

    <?php $__env->startPush('after_styles'); ?>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/vendors/css/extensions/toastr.css')); ?>">
    <?php $__env->stopPush(); ?>

    <?php $__env->startPush('after_scripts'); ?>
        <script src="<?php echo e(asset('app-assets/vendors/js/extensions/toastr.min.js')); ?>"></script>

        <script>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            toastr.error('<?php echo e($item); ?>', 'Oops', { "timeOut": 0 });
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </script>
    <?php $__env->stopPush(); ?>

<?php endif; ?>

<?php /**PATH C:\xampp\htdocs\perpus\resources\views/inc/alert.blade.php ENDPATH**/ ?>