<?php $__env->startSection('content'); ?>
  <div class="container-md">
      <div class="row">
        <br>
        <!-- <?php $__currentLoopData = $katensi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ensi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="/kategori/<?php echo e($ensi->kategori); ?>" style="color: red;"><?php echo e($ensiklopedia); ?></a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <hr> -->

        <?php $__currentLoopData = $buku; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-3" style="max-width: 50rem;">
          <div class="card mb-3 shadow-sm">
            <br>
              <?php if($b->cover_buku != null): ?>
              <img src="<?php echo e(\Storage::url($b->cover_buku)); ?>" style="width: 130px;margin-left: auto;margin-right: auto;height: 170px;" class="card-img-top">
              <?php endif; ?>
              <hr>
            <div class="card-body">
              <a href="/detailbuku/<?php echo e($b->id); ?>"><h3><?php echo e($b->judul); ?></h3></a>
                <p><a href="/detailbuku/<?php echo e($b->id); ?>" class="btn btn-primary">Detail </a></p>
                <?php if(Auth::guest()): ?>
                <p><a href="<?php echo e(route('login')); ?>" class="btn btn-success">Pinjam / Baca</a></p>
                <?php else: ?>
                <p><a href="<?php echo e(route('buku.index')); ?>" class="btn btn-success">Pinjam / Baca</a></p>
                <?php endif; ?>
            </div>
          </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      </div>
    </div>
  </body>
</html>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\perpus\resources\views/menu.blade.php ENDPATH**/ ?>