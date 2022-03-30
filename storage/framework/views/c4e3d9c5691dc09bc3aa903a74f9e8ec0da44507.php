<?php $__env->startSection('content'); ?>
    <div class="row m-0">
        <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
            <img src="<?php echo e(asset('app-assets/images/pages/login.png')); ?>" alt="branding logo">
        </div>
        <div class="col-lg-6 col-12 p-0">
            <div class="card rounded-0 mb-0 px-2">
                <div class="card-header pb-1">
                    <div class="card-title">
                        <h4 class="mb-0">Login</h4>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body pt-1">
                        <form method="POST" action="<?php echo e(route('login')); ?>">
                            <?php echo csrf_field(); ?>
                            <fieldset class="form-label-group position-relative has-icon-left">
                                <input type="email" name="email" class="form-control" id="user-email" value="<?php echo e(old('email')); ?>" placeholder="Email" required>
                                <div class="form-control-position">
                                    <i class="feather icon-user"></i>
                                </div>
                                <label for="user-email">Email</label>
                            </fieldset>

                            <fieldset class="form-label-group position-relative has-icon-left">
                                <input type="password" name="password" class="form-control" id="user-password" placeholder="Password" required>
                                <div class="form-control-position">
                                    <i class="feather icon-lock"></i>
                                </div>
                                <label for="user-password">Password</label>
                            </fieldset>
                            <div class="form-group d-flex justify-content-between align-items-center">
                                <div class="text-left">
                                    <fieldset class="checkbox">
                                        <div class="vs-checkbox-con vs-checkbox-primary">
                                            <input type="checkbox" name="remember">
                                            <span class="vs-checkbox">
                                                <span class="vs-checkbox--check">
                                                    <i class="vs-icon feather icon-check"></i>
                                                </span>
                                            </span>
                                            <span class="">Remember me</span>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <hr>
                            <a class="btn btn-primary" href="<?php echo e(route('menu')); ?>">Kembali</a>
                            <button type="submit" class="btn btn-primary float-right btn-inline">Login</button>
                        </form>
                    </div>
                </div>
                <!-- <div class="container">
                    <a href="<?php echo e('register'); ?>">Registrasi / Daftar</a>
                </div> -->
                <div class="login-footer">
                    <div class="divider">
                        <div class="divider-text">Copyright <?php echo e(date('Y')); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('auth.layout', [
    'title' => 'Login'
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\new-perpus1\resources\views/auth/login.blade.php ENDPATH**/ ?>