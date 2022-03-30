<?php $__env->startSection('content'); ?>
<div class="container-md">
  <a href="<?php echo e(route('menu')); ?>" class="btn btn-primary">Kembali</a>
  <br><br>
  <div class="row">
    <br>
    <div class="card mb-5" style="max-width: 1300px;">
        <div class="row g-0">
          <div class="col-md-4">
            <br>
            <img src="<?php echo e(\Storage::url($buku->cover_buku)); ?>" class="img-fluid rounded-start" alt="...">
          </div>
          <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Judul : <?php echo e($buku->judul); ?></h5>
                    <p class="card-text">Penerbit : <?php echo e($buku->penerbit); ?></p>
                    <p class="card-text">Penulis : <?php echo e($buku->penulis); ?></p>
                    <p class="card-text">Kategori : <?php echo e($buku->kategori->nama); ?></p>
                    <p class="card-text">Tahun Terbit : <?php echo e($buku->thn_terbit); ?></p>
                    <p class="card-text">Sinopsis : <?php echo e($buku->sinopsis); ?></p>
                    <?php if(Auth::guest()): ?>
                    <p><a href="<?php echo e(route('login')); ?>" class="btn btn-success">Pinjam / Baca</a></p>
                    <?php else: ?>
                    <p><a href="<?php echo e(route('buku.index')); ?>" class="btn btn-success">Pinjam / Baca</a></p>
                    <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
</body>
</html>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\perpus\resources\views/detailbuku.blade.php ENDPATH**/ ?>