<?php $__env->startSection('content'); ?>
<?php echo csrf_field(); ?>

<style type="text/css">
  #scroll-btn {
    display: none;
    position: fixed;
    bottom: 20px;
    right: 30px;
    z-index: 99;
    font-size: 18px;
    border: none;
    outline: none;
    background-color: orangered;
    color: white;
    cursor: pointer;
    padding: 15px 19px;
    border-radius: 100px;
  }

  #scroll-btn:hover {
    background-color: blue;
  }

  .sampel {
    min-height: 2000px;
  }
</style>

<div class="container-md">

  <div class="row">
    <br>

    <table id="table" class="display" style="width:100%">
      <tbody>
        <?php $__currentLoopData = $buku; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-3" style="max-width: 50rem;">
          <div class="card mb-3 shadow-lg">
            <br>
            <?php if($b->cover_buku != null): ?>
            <img src="<?php echo e(\Storage::url($b->cover_buku)); ?>" style="width: 130px;margin-left: auto;margin-right: auto;height: 170px;" class="card-img-top">
            <?php endif; ?>
            <hr>
            <div class="card-body">
              <h6><?php echo e($b->penulis); ?></h6>
              <h4><b><?php echo e($b->judul); ?></b></h4>
              <?php if(Auth::guest()): ?>
              <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#loginModal">
                Detail
              </button>

              <!-- Modal -->
              <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">My Library</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Anda Harus Login Terlebih Dahulu Untuk Melihat Detail Buku!
                    </div>
                    <div class="modal-footer">
                      <p><a href="<?php echo e(route('login')); ?>" class="btn btn-warning">Login Sekarang!</a></p>
                    </div>
                  </div>
                </div>
              </div>
              <?php else: ?>
              <!-- <p><a href="<?php echo e(route('buku.index')); ?>" class="btn btn-success">Pinjam / Baca</a></p> -->

              <p><a href="/detailbuku/<?php echo e($b->id); ?>" class="btn btn-success">Detail </a></p>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('#kategori').change(function() {
      buku();
    })
  })

  function buku() {
    var kategori = $('#kategori').val();
    $.ajax({
      url: "<?php echo e(url('PagesController/setKategori')); ?>",
      data: "kategori=" + kategori,
      success: function(data) {
        $("#table tbody").html(data);
      }
    })
  }
</script>


<button onclick="topFunction()" id="scroll-btn" title="Top"><i class="feather icon-arrow-up"></i></button>

<script>
  window.onscroll = function() {
    scrollFunction()
  };

  function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
      document.getElementById("scroll-btn").style.display = "block";
    } else {
      document.getElementById("scroll-btn").style.display = "none";
    }
  }

  function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
  }
</script>

<footer class="footer footer-static footer-dark">
  <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25"><strong>Copyright</strong> MyLibrary &copy; <?php echo e(date('Y')); ?></span>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
  </p>
</footer>


<script src="<?php echo e(asset('public/assets/js/jquery-3.4.0.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/assets/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/assets/js/filter.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\library\resources\views/menu.blade.php ENDPATH**/ ?>