<?php
if (isset($object)) {
$viewData = [
'title' => 'Edit denda',
'breadcrumbs' => [
'Denda',
$object->kode,
'Edit',
],
];
} else {
$viewData = [
'title' => ' Denda',
'breadcrumbs' => [
'Denda',
'Tambah',
]
];
}
?>



<?php $__env->startSection('content'); ?>

<?php
if (isset($object)) {
$actionUrl = route('denda.update', $object->id);
} else {
$actionUrl = route('denda.store');
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
                                        <span>Kode Transaksi </span>
                                    </div>
                                    <div class="col-md-10">
                                        <select class="form-control select2" name="transaksi_id" required>
                                            <?php
                                            $old = isset($object) ? $object->transaksi_id : old('transaksi_id');
                                            ?>
                                            <option value=""> -- Pilih Transaksi -- </option>
                                            <?php $__currentLoopData = $transaksi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($item->id); ?>" <?php echo e($old == $item->id ? 'selected' : ''); ?>><?php echo e($item->kode); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <span>Nama Anggota </span>
                                    </div>
                                    <div class="col-md-10">
                                        <select class="form-control select2" name="anggota_id" required>
                                            <?php
                                            $old = isset($object) ? $object->anggota_id : old('anggota_id');
                                            ?>
                                            <option value=""> -- Pilih Anggota -- </option>
                                            <?php $__currentLoopData = $anggota; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($item->id); ?>" <?php echo e($old == $item->id ? 'selected' : ''); ?>><?php echo e($item->nama); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <span>Buku </span>
                                    </div>
                                    <div class="col-md-10">
                                        <select class="form-control select2" name="buku_id" required>
                                            <?php
                                            $old = isset($object) ? $object->buku_id : old('buku_id');
                                            ?>
                                            <option value=""> -- Pilih Buku -- </option>
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
                                        <span>Keterangan</span>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="position-relative has-icon-left">
                                            <input type="text" class="form-control" name="keterangan" value="<?php echo e(isset($object) ? $object->keterangan : old('keterangan')); ?>" placeholder="Nomor Handphone Anggota" required>
                                            <div class="form-control-position">
                                                <i class="feather icon-smartphone"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <span>Nominal Denda</span>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="position-relative has-icon-left">
                                            <input type="text" class="form-control" name="nominal" value="<?php echo e(isset($object) ? $object->nominal : old('nominal')); ?>" placeholder="Email Anggota" required>
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
<?php echo $__env->make('layouts.app', $viewData, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/macbookpro/Documents/Laravel/perpus/resources/views/denda/form.blade.php ENDPATH**/ ?>