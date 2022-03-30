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
                <h5 class="card-title"><b><?php echo e($buku->judul); ?></b></h5>
                    <p class="card-text">Penerbit : <?php echo e($buku->penerbit); ?></p>
                    <p class="card-text">Penulis : <?php echo e($buku->penulis); ?></p>
                    <p class="card-text">Kategori : <?php echo e($buku->kategori->nama); ?></p>
                    <p class="card-text">Lokasi Kategori : <?php echo e($buku->kategori->lokasi); ?></p>
                    <p class="card-text">Tahun Terbit : <?php echo e($buku->thn_terbit); ?></p>
                    <p class="card-text">Yang Tersedia di Perpustakaan : <?php echo e($buku->jumlah_buku); ?></p>
                    <p class="card-text">Sinopsis</p>
                    <p class="card-text"><?php echo e($buku->sinopsis); ?></p>
                    <p>Download Buku</p>
                      <?php if(!is_null($buku->baca_buku_url)): ?> 
                      <a href="<?php echo e($buku->baca_buku_url); ?>">Download Buku <?php echo e($buku->judul); ?></a>
                      <?php else: ?>
                      <button class="btn btn-icon btn-sm btn-warning">Buku Hanya Bisa Dipinjam!</button>
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

<?php echo $__env->make('layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\perpuspbofix\perpus\resources\views/detailbuku.blade.php ENDPATH**/ ?>