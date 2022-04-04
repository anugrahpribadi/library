<?php
if (isset($object)) {
    $viewData = [
        'title' => 'Edit Role',
        'breadcrumbs' => [
            'Dashboard',
            'Role',
            $object->name,
            'Edit'
        ],
    ];
} else {
    $viewData = [
        'title' => 'Tambah Role',
        'breadcrumbs' => [
            'Dashboard',
            'Role',
            'Tambah'
        ],
    ];
}
?>



<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        <h4 class="card-title"><?php echo e($viewData['title']); ?></h4>
    </div>
    <br>
    <div class="card-body">
            <?php
            if (isset($object)) {
                $actionUrl = route('acl.role.update', [
                    'id' => $object->id,
                ]);
            } else {
                $actionUrl = route('acl.role.store');
            }
            
            ?>
            <form class="form form-horizontal" method="POST" action="<?php echo e($actionUrl); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php if(isset($object)): ?>
                <?php echo e(method_field('PATCH')); ?>

                <?php endif; ?>
                <div class="form-body">
                    <div class="row">

                        <div class="col-12">
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <span>Nama Role</span>
                                </div>
                                <div class="col-md-10">
                                    <div class="position-relative has-icon-left">
                                        <input type="text" class="form-control" name="name" value="<?php echo e(isset($object) ? $object->name : old('name')); ?>" placeholder="Nama Role" autofocus>
                                        <div class="form-control-position">
                                            <i class="feather icon-user"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <span>Permission</span>
                                </div>
                                <div class="col-md-10">
                                    <div class="custom-control custom-checkbox roles">
                                        <input type="checkbox" class="custom-control-input" name="permission_all" id="permission_all" value="permission_all">
                                        <label class="custom-control-label" for="permission_all">Check All</label>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-sm-12 permissions">
                                            <!-- Default unchecked -->
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input parent" name="permissions[]" id="<?php echo e(str_slug($permission->name)); ?>" value="<?php echo e($permission->id); ?>" <?php echo e(isset($object) && $object->permissions->pluck('name')->contains($permission->name) ? 'checked' : ''); ?>>
                                                <label class="custom-control-label" for="<?php echo e(str_slug($permission->name)); ?>"><strong><?php echo e($permission->name); ?></strong></label>
                                            </div>
                                            <br>
                                            <?php if($permission->childs()->count() > 0): ?>
                                                <div class="row mb-2 <?php echo e(str_slug($permission->name)); ?>">
                                                    <?php $__currentLoopData = $permission->childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="col-md-4">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" name="permissions[]" id="<?php echo e($child->id); ?>" value="<?php echo e($child->id); ?>" <?php echo e(isset($object) && $object->permissions->pluck('name')->contains($child->name) ? 'checked' : ''); ?>>
                                                            <label class="custom-control-label" for="<?php echo e($child->id); ?>"><?php echo e($child->name); ?></label>
                                                        </div>
                                                    </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <hr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        

                        <div class="col-md-2"></div>
                        <div class="col-md-10">
                            <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('after_scripts'); ?>
<script>
$('#permission_all').change(function() {
    if($(this).is(":checked")) {
        $('.permissions input').not(this).prop('checked', true);
    } else {
        $('.permissions input').not(this).prop('checked', false);
    }       
});
$('.parent').change(function() {
    if($(this).is(":checked")) {
        $(this).parent().parent().find('input[type=checkbox]').prop('checked', true);
    } else {
        $(this).parent().parent().find('input[type=checkbox]').prop('checked', false);
    }      
});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', $viewData, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\library\resources\views/acl/role-form.blade.php ENDPATH**/ ?>