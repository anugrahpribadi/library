<?php
if (isset($object)) {
$viewData = [
'title' => 'Edit anggota',
'breadcrumbs' => [
'Anggota',
$object->email,
'Edit',
],
];
} else {
$viewData = [
'title' => 'Tambah Anggota',
'breadcrumbs' => [
'Anggota',
'Tambah',
]
];
}
?>



<?php $__env->startSection('content'); ?>

<?php
if (isset($object)) {
$actionUrl = route('anggota.update', $object->id);
} else {
$actionUrl = route('anggota.store');
}
?>
<div class="row">
  <div class="<?php echo e(isset($object) ? "col-md-8" : "col-md-12"); ?>">
    <form action="<?php echo e($actionUrl); ?>" method="POST" enctype="multipart/form-data">

      <?php if(isset($object)): ?>
      <?php echo e(method_field('PATCH')); ?>

      <input type="hidden" name="user_id" value="<?php echo e($object->id); ?>" />
      <?php endif; ?>

      <?php echo e(csrf_field()); ?>


      <div class="card">
        <div class="card-header">
          <h4 class="card-title"><?php echo e($viewData['title']); ?></h4>
        </div>
        <br>
        <div class="card-body">


          <div class="form-body">
            <div class="row">

              <!-- <div class="col-12">
                <div class="form-group row">
                  <div class="col-md-2">
                    <span>Kode Anggota</span>
                  </div>
                  <div class="col-md-10">
                    <div class="position-relative has-icon-left">
                      <input type="number" class="form-control" name="kode_anggota" value="" placeholder="Kode Anggota" readonly="">
                      <div class="form-control-position">
                        <i class="feather icon-slack"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div> -->

              <div class="col-12">
                <div class="form-group row">
                  <div class="col-md-2">
                    <span>Nama Anggota</span>
                  </div>
                  <div class="col-md-10">
                    <div class="position-relative has-icon-left">
                      <input type="text" class="form-control" name="name" value="<?php echo e(isset($object) ? $object->name : old('name')); ?>" placeholder="Nama Anggota" autofocus required>
                      <div class="form-control-position">
                        <i class="feather icon-users"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="form-group row">
                  <div class="col-md-2">
                    <span>Email</span>
                  </div>
                  <div class="col-md-10">
                    <div class="position-relative has-icon-left">
                      <input type="email" class="form-control" name="email" value="<?php echo e(isset($object) ? $object->email : old('email')); ?>" placeholder="Email Anggota" required>
                      <div class="form-control-position">
                        <i class="feather icon-mail"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-2"></div>
              <div class="col-md-10">
                <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Save</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', $viewData, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\new-perpus1\resources\views/anggota/form.blade.php ENDPATH**/ ?>