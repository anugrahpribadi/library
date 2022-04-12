<?php
if (isset($object)) {
$viewData = [
'title' => 'Edit buku',
'breadcrumbs' => [
'Buku',
$object->email,
'Edit',
],
];
} else {
$viewData = [
'title' => 'Tambah Buku',
'breadcrumbs' => [
'Buku',
'Tambah',
]
];
}
?>



<?php $__env->startSection('content'); ?>

<?php
if (isset($object)) {
$actionUrl = route('buku.update', $object->id);
} else {
$actionUrl = route('buku.store');
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

            <div class="col-12">
                <div class="form-group row">
                  <div class="col-md-2">
                    <span>Judul</span>
                  </div>
                  <div class="col-md-10">
                    <div class="position-relative has-icon-left">
                      <input type="text" class="form-control" name="judul" value="<?php echo e(isset($object) ? $object->judul : old('judul')); ?>" placeholder="Judul" required>
                      <div class="form-control-position">
                        <i class="feather icon-type"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="form-group row">
                  <div class="col-md-2">
                    <span>Penerbit</span>
                  </div>
                  <div class="col-md-10">
                    <div class="position-relative has-icon-left">
                      <input type="text" class="form-control" name="penerbit" value="<?php echo e(isset($object) ? $object->penerbit : old('penerbit')); ?>" placeholder="Nama Penerbit" required>
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
                    <span>Penulis</span>
                  </div>
                  <div class="col-md-10">
                    <div class="position-relative has-icon-left">
                      <input type="text" class="form-control" name="penulis" value="<?php echo e(isset($object) ? $object->penulis : old('penulis')); ?>" placeholder="Nama Penulis" required>
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
                    <span>Sinopsis</span>
                  </div>
                  <div class="col-md-10">
                    <div class="position-relative">
                      <textarea name="sinopsis" class="form-control" placeholder="Sinopsis" required><?php echo e(isset($object) ? $object->sinopsis : old('sinopsis')); ?></textarea>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="form-group row">
                  <div class="col-md-2">
                    <span>Kategori Buku </span>
                  </div>
                  <div class="col-md-10">
                    <select class="form-control select2" name="kategori_id">
                    <?php
                    $old = isset($object) ? $object->kategori_id : old('kategori_id');
                    ?>
                      <option value=""> -- Pilih Kategori -- </option>
                      <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($item->id); ?>" <?php echo e($old == $item->id ? 'selected' : ''); ?>><?php echo e($item->nama); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="form-group row">
                  <div class="col-md-2">
                    <span>Tahun Terbit</span>
                  </div>
                  <div class="col-md-10">
                    <div class="position-relative has-icon-left">
                      <input type="month" class="form-control" name="thn_terbit" value="<?php echo e(isset($object) ? $object->thn_terbit : old('thn_terbit')); ?>" placeholder="YYYY" min="2000" max="2100" required>
                      <div class="form-control-position">
                        <i class="feather icon-calendar"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="form-group row">
                  <div class="col-md-2">
                    <span>Jumlah Buku</span>
                  </div>
                  <div class="col-md-10">
                    <div class="position-relative has-icon-left">
                      <input type="number" class="form-control" name="jumlah_buku" value="<?php echo e(isset($object) ? $object->jumlah_buku : old('jumlah_buku')); ?>" placeholder="Jumlah Buku" required>
                      <div class="form-control-position">
                        <i class="feather icon-calendar"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="form-group row">
                  <div class="col-md-2">
                    <span>Kondisi Buku </span>
                  </div>
                  <div class="col-md-10">
                    <div class="position-relative">
                      <select class="form-control select2" id="kondisi" name="kondisi" required>
                        <option value="" required> -- Pilih Kondisi Buku -- </option>
                        <?php $__currentLoopData = config('general.kondisi'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key); ?>" <?php echo e(isset($object) && $object->kondisi == $key ? 'selected' : ''); ?>><?php echo e($item['label']); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                    </div>
                  </div>
                </div>
              </div>

              <!-- <div class="col-12">
                <div class="form-group row">
                  <div class="col-md-2">
                    <span>Cover Buku</span>
                  </div>
                  <div class="col-md-10">
                    <div class="position-relative has-icon-left">
                      <input type="file" class="form-control" name="status" value="<?php echo e(isset($object) ? $object->status : old('status')); ?>" placeholder="Status">
                      <div class="form-control-position">
                        <i class="feather icon-wind"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div> -->

              <div class="col-12">
                <div class="form-group row">
                  <div class="col-md-2">
                    <span>Cover Buku</span>
                  </div>
                  <div class="col-md-10">
                    <div class="position-relative">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile01" name="cover_buku">
                        <label class="custom-file-label" for="inputGroupFile01">Choose image</label>
                        <?php if(isset($object) && $object->file_url): ?>
                        <small>Kosongkan jika tidak ingin mengupdate, lihat <a href="<?php echo e($object->cover_buku_url); ?>" target="_blank">File Sebelumnya <span class="fa fa-external-link"></span></a></small>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="form-group row">
                  <div class="col-md-2">
                    <span>Buku</span>
                  </div>
                  <div class="col-md-10">
                    <div class="position-relative">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile02" name="baca_buku">
                        <label class="custom-file-label" for="inputGroupFile02">Choose File</label>
                        <?php if(isset($object) && $object->file_url): ?>
                        <small>Kosongkan jika tidak ingin mengupdate, lihat <a href="<?php echo e($object->baca_buku_url); ?>" target="_blank">File Sebelumnya <span class="fa fa-external-link"></span></a></small>
                        <?php endif; ?>
                      </div>
                      <small>Jangan menambahkan E-Book jika buku tersebut memiliki hak cipta</small>
                    </div>
                  </div>
                </div>
              </div>


              <div class="col-md-2">
              </div>
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
<?php echo $__env->make('layouts.app', $viewData, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\new-perpus1\resources\views/Book/form.blade.php ENDPATH**/ ?>