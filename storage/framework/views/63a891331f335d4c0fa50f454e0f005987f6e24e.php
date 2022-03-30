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
              <b><h4 class="card-title"><?php echo e($buku->judul); ?></h4></b>
                <p class="card-text">
                  <b> Sinopsis : </b><?php echo e($buku->sinopsis); ?>

                </p>
                <hr>
                <u><h3>Detail Buku</h3></u>
                    <p class="card-text"><b> Penerbit : </b> <?php echo e($buku->penerbit); ?></p>
                    <p class="card-text"><b> Penulis : </b> <?php echo e($buku->penulis); ?></p>
                    <p class="card-text"><b> Kategori : </b> <?php echo e($buku->kategori->nama); ?></p>
                    <p class="card-text"><b> Tahun Terbit : </b> <?php echo e($buku->thn_terbit); ?></p>
                    <p class="card-text"><b> Yang Tersedia di Perpustakaan : </b> <?php echo e($buku->jumlah_buku); ?></p>
                    <?php if(Auth::guest()): ?>
                      <p><a href="<?php echo e(route('login')); ?>" class="btn btn-success">Pinjam Buku</a></p>
                      <?php else: ?>
                      <?php if(!is_null($buku->baca_buku_url)): ?> 
                      <a href="<?php echo e($buku->baca_buku_url); ?>" class="btn btn-outline-success">Download Buku <?php echo e($buku->judul); ?></a>
                      <?php else: ?>
                      <button class="btn btn-icon btn-sm btn-warning">Buku Hanya Bisa Dipinjam!</button>
                      <?php endif; ?>
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

<?php $__env->startPush('after_scripts'); ?>
<script src="<?php echo e(asset('app-assets/vendors/js/tables/datatable/datatables.min.js')); ?>"></script>
<script src="<?php echo e(asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')); ?>"></script>
<script>
// AJAX DataTable
// AJAX DataTable
$('#crudTable').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url: '<?php echo route('buku.data',); ?>',
    },
    ordering: false,
    columns: [
        { data: 'formatted_id', name: 'formatted_id' },
        { data: 'kode', name: 'kode' },
        { data: 'judul', name: 'judul' },
        { data: 'kategori_name', name: 'kategori_id' },
        { data: 'cover_buku_url', name: 'cover_buku_url' },
        { data: 'baca_buku_url', name: 'baca_buku_url' },
        { data: 'jumlah_buku', name: 'jumlah_buku' },
        { data: 'action', name: 'action' },
    ],
    drawCallback: function() {
        // Delete Confirmation
        $(".delete").on("click", function() {
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
var myModal = document.getElementById('myModal')
var myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', function () {
  myInput.focus()
})
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\new-perpus\resources\views/detailbuku.blade.php ENDPATH**/ ?>