<?php $__env->startSection('content'); ?>
<section id="dashboard-analytics">

<div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header d-flex flex-column align-items-start pb-0">
                    <div class="avatar bg-rgba-primary p-50 m-0">
                        <div class="user-content">
                            <i class="feather icon-list text-primary font-medium-5" button title="Sedang Dipinjam"></i>
                        </div>
                    </div>
                    <h2 class="text-bold-700 mt-1"><?php echo e($transaksi); ?></h2>
                    <p class="mb-100">Sedang Dipinjam</p>
                    <br>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-header d-flex flex-column align-items-start pb-0">
                        <div class="avatar bg-rgba-primary p-50 m-0">
                            <div class="user-content">
                                <i class="feather icon-book-open text-primary font-medium-5" button title="Jumlah Buku"></i>
                            </div>
                        </div>
                        <h2 class="text-bold-700 mt-1"><?php echo e($buku); ?></h2>
                        <p class="mb-100">Total Buku</p>
                    <br>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-header d-flex flex-column align-items-start pb-0">
                    <div class="avatar bg-rgba-primary p-50 m-0">
                        <div class="user-content">
                            <i class="feather icon-users text-primary font-medium-5" button title="Jumlah Anggota"></i>
                        </div>
                    </div>
                    <h2 class="text-bold-700 mt-1"><?php echo e($anggota); ?></h2>
                    <p class="mb-100">Jumlah Anggota</p>
                    <br>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-header d-flex flex-column align-items-start pb-0">
                    <div class="avatar bg-rgba-primary p-50 m-0">
                        <div class="user-content">
                            <i class="feather icon-users text-primary font-medium-5" button title="Jumlah Anggota"></i>
                        </div>
                    </div>
                    <h2 class="text-bold-700 mt-1"><?php echo e($anggota); ?></h2>
                    <p class="mb-100">Jumlah Anggota</p>
                    <br>
                </div>
            </div>
        </div>

        <!-- <div class="col-md-3">
            <div class="card">
                <div class="card-header d-flex flex-column align-items-start pb-0">
                    <div class="avatar bg-rgba-primary p-50 m-0">
                        <div class="user-content">
                            <i class="feather icon-book text-primary font-medium-5" button title="Jumlah Buku Ensiklopedia"></i>
                        </div>
                    </div>
                    <h2 class="text-bold-700 mt-1"></h2>
                    <p class="mb-100">Jumlah Buku Ensiklopedia</p>
                    <br>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-header d-flex flex-column align-items-start pb-0">
                    <div class="avatar bg-rgba-primary p-50 m-0">
                        <div class="user-content">
                            <i class="feather icon-book text-primary font-medium-5" button title="Jumlah Buku Ilmiah"></i>
                        </div>
                    </div>
                    <h2 class="text-bold-700 mt-1"></h2>
                    <p class="mb-100">Jumlah Buku Ilmiah</p>
                    <br>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-header d-flex flex-column align-items-start pb-0">
                    <div class="avatar bg-rgba-primary p-50 m-0">
                        <div class="user-content">
                            <i class="feather icon-book text-primary font-medium-5" button title="Jumlah Buku Sastra"></i>
                        </div>
                    </div>
                    <h2 class="text-bold-700 mt-1"></h2>
                    <p class="mb-100">Jumlah Buku Sastra</p>
                    <br>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-header d-flex flex-column align-items-start pb-0">
                    <div class="avatar bg-rgba-primary p-50 m-0">
                        <div class="user-content">
                            <i class="feather icon-book text-primary font-medium-5" button title="Jumlah Buku Biografi"></i>
                        </div>
                    </div>
                    <h2 class="text-bold-700 mt-1"></h2>
                    <p class="mb-100">Jumlah Buku Biografi</p>
                    <br>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header d-flex flex-column align-items-start pb-0">
                    <div class="avatar bg-rgba-primary p-50 m-0">
                        <div class="user-content">
                            <i class="feather icon-book text-primary font-medium-5" button title="Jumlah Buku Novel"></i>
                        </div>
                    </div>
                    <h2 class="text-bold-700 mt-1"></h2>
                    <p class="mb-100">Jumlah Novel</p>
                    <br>
                </div>
            </div>
        </div> -->

        <?php if(auth()->user()->name == "Admin"): ?>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header d-flex flex-column align-items-start pb-0">
                    <div class="avatar bg-rgba-primary p-50 m-0">
                        <div class="user-content">
                            <i class="feather icon-layers text-primary font-medium-5" button title="Total User"></i>
                        </div>
                    </div>
                    <h2 class="text-bold-700 mt-1"><?php echo e($user); ?></h2>
                    <p class="mb-100">Jumlah User</p>
                    <br>
                </div>
            </div>
        </div>
        <?php endif; ?>

</div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', [
'title' => 'Dashboard',
'breadcrumbs' => [
'Dashboard' 
],
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\new-perpus1\resources\views/home.blade.php ENDPATH**/ ?>