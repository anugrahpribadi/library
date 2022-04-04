<?php
if (isset($object)) {
$viewData = [
'title' => 'Transaksi Pengembalian',
'breadcrumbs' => [
'Transaksi',
$object->kode,
'Pengembalian',
],
];
} else {
$viewData = [
'title' => 'Pinjam Buku',
'breadcrumbs' => [
'Transaksi',
'Tambah',
]
];
}
?>



<?php $__env->startSection('content'); ?>

<?php
if (isset($object)) {
$actionUrl = route('transaksi.update', $object->id);
} else {
$actionUrl = route('transaksi.store');
}
?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />

<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

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

              <div class="col-12">
                <div class="form-group row">
                  <div class="col-md-2">
                    <span>Nama Anggota </span>
                  </div>
                  <div class="col-md-10">
                    <div>
                      <select class="form-control select2" name="user_id" required>
                        <option value="">-- Nama Anggota --</option>
                        <?php
                        $old = isset($object) ? $object->user_id : old('user_id');
                        ?>
                        <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($item->id); ?>" <?php echo e($old == $item->id ? 'selected' : ''); ?>><?php echo e($item->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="form-group row">
                  <div class="col-md-2">
                    <span>Judul Buku </span>
                  </div>
                  <div class="col-md-10">
                    <select class="form-control select2" name="buku_id" required>
                      <option value=""> -- Pilih Buku -- </option>
                      <?php
                      $old = isset($object) ? $object->buku_id : old('buku_id');
                      ?>
                      <?php $__currentLoopData = $buku; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($item->id); ?>" <?php echo e($old == $item->id ? 'selected' : ''); ?>><?php echo e($item->judul); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="form-group row">
                  <div class="col-md-2">
                    <span>Tgl Pinjam</span>
                  </div>
                  <div class="col-md-10">
                    <div class="position-relative has-icon-left">
                      <input type="date" class="form-control" name="tgl_pinjam" value="<?php echo e(date('Y-m-d', strtotime(Carbon\Carbon::today()->toDateString()))); ?>" placeholder="" required readonly="">
                      <div class="form-control-position" required>
                        <i class="feather icon-calendar"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="form-group row">
                  <div class="col-md-2">
                    <span>Batas Waktu</span>
                  </div>
                  <div class="col-md-10">
                    <div class="position-relative has-icon-left">
                      <input type="date" class="form-control" name="tgl_hrs_kembali" value="<?php echo e(date('Y-m-d', strtotime(Carbon\Carbon::today()->addDays(10)->toDateString()))); ?>" placeholder="" required readonly="">
                      <div class="form-control-position" required>
                        <i class="feather icon-calendar"></i>
                      </div>
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
        </div>
      </div>
    </form>
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', $viewData, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\libraryc\resources\views/transaksi/form.blade.php ENDPATH**/ ?>