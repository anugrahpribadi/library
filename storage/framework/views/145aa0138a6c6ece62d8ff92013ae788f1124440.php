<?php
if (isset($object)) {
$viewData = [
'title' => 'Edit User',
'breadcrumbs' => [
'Users',
$object->email,
'Edit',
],
];
} else {
$viewData = [
'title' => 'Tambah User',
'breadcrumbs' => [
'User',
'Tambah',
]
];
}
?>



<?php $__env->startSection('content'); ?>

<?php
if (isset($object)) {
$actionUrl = route('users.update', $object->id);
} else {
$actionUrl = route('users.store');
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
                    <span>Nama</span>
                  </div>
                  <div class="col-md-10">
                    <div class="position-relative has-icon-left">
                      <input type="text" class="form-control" name="name" value="<?php echo e(isset($object) ? $object->name : old('name')); ?>" placeholder="Name" autofocus>
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
                    <span>Alamat</span>
                  </div>
                  <div class="col-md-10">
                    <div class="position-relative has-icon-left">
                      <input type="text" class="form-control" name="alamat" value="<?php echo e(isset($object) ? $object->alamat : old('alamat')); ?>" placeholder="Alamat" autofocus>
                      <div class="form-control-position">
                        <i class="feather icon-home"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="form-group row">
                  <div class="col-md-2">
                    <span>Telepon</span>
                  </div>
                  <div class="col-md-10">
                    <div class="position-relative has-icon-left">
                      <input type="text" class="form-control" name="telepon" value="<?php echo e(isset($object) ? $object->telepon : old('telepon')); ?>" placeholder="telepon" autofocus>
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
                    <span>Email</span>
                  </div>
                  <div class="col-md-10">
                    <div class="position-relative has-icon-left">
                      <input type="email" class="form-control" name="email" value="<?php echo e(isset($object) ? $object->email : old('email')); ?>" placeholder="Email">
                      <div class="form-control-position">
                        <i class="feather icon-mail"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>


              <div class="col-12">
                <div class="form-group row">
                  <div class="col-md-2">
                    <span>Password</span>
                  </div>
                  <div class="col-md-10">
                    <div class="position-relative has-icon-left">
                      <input type="password" class="form-control" name="password" placeholder="Password">
                      <div class="form-control-position">
                        <i class="feather icon-lock"></i>
                      </div>
                    </div>
                    <?php if(isset($object)): ?>
                    <small class="text-info">Kosongkan jika Anda tidak ingin mengubah kata sandi</small>
                    <?php endif; ?>
                  </div>
                </div>
              </div>


              <div class="col-12">
                <div class="form-group row">
                  <div class="col-md-2">
                    <span>Konfirmasi Password</span>
                  </div>
                  <div class="col-md-10">
                    <div class="position-relative has-icon-left">
                      <input type="password" class="form-control" name="password_confirmation" placeholder="Password Confirmation">
                      <div class="form-control-position">
                        <i class="feather icon-lock"></i>
                      </div>
                    </div>
                    <?php if(isset($object)): ?>
                    <small class="text-info">Kosongkan jika Anda tidak ingin mengubah kata sandi</small>
                    <?php endif; ?>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="form-group row">
                    <div class="col-md-2">
                        <span>Roles</span>
                    </div>
                    <div class="col-md-10">
                        <div class="row">
                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-sm-4">
                                <!-- Default unchecked -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="roles[]" id="role<?php echo e($role->id); ?>" value="<?php echo e($role->id); ?>" <?php echo e(isset($user) && $user->roles->pluck('name')->contains($role->name) ? 'checked' : ''); ?>>
                                    <label class="custom-control-label" for="role<?php echo e($role->id); ?>"><?php echo e($role->name); ?></label>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>   
            
            <div class="col-12">
              <div class="form-group row">
                  <div class="col-md-2">
                      <span>Extra Permission</span>
                  </div>
                  <div class="col-md-10">
                      <div class="custom-control custom-checkbox roles">
                          <input type="checkbox" class="custom-control-input" name="permission_all" id="permission_all" value="permission_all">
                          <label class="custom-control-label" for="permission_all">Check All</label>
                      </div>
                      <br>
                      <div class="row">
                          <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <div class="col-sm-12 permissions">
                              <!-- Default unchecked -->
                              <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input parent" name="permissions[]" id="<?php echo e(str_slug($permission->name)); ?>" value="<?php echo e($permission->id); ?>" <?php echo e(isset($user) && $user->permissions->pluck('name')->contains($permission->name) ? 'checked' : ''); ?>>
                                  <label class="custom-control-label" for="<?php echo e(str_slug($permission->name)); ?>"><strong><?php echo e($permission->name); ?></strong></label>
                              </div>
                              <br>
                              <?php if($permission->childs()->count() > 0): ?>
                                  <div class="row mb-2 <?php echo e(str_slug($permission->name)); ?>">
                                      <?php $__currentLoopData = $permission->childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <div class="col-md-4">
                                          <div class="custom-control custom-checkbox">
                                              <input type="checkbox" class="custom-control-input" name="permissions[]" id="<?php echo e($child->id); ?>" value="<?php echo e($child->id); ?>" <?php echo e(isset($user) && $user->permissions->pluck('name')->contains($child->name) ? 'checked' : ''); ?>>
                                              <label class="custom-control-label" for="<?php echo e($child->id); ?>"><?php echo e($child->name); ?></label>
                                          </div>
                                      </div>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </div>
                              <?php endif; ?>
                          </div>
                          <hr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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


  <?php if(isset($object)): ?>
  <div class="col-md-4">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">User Detail</h4>
      </div>
      <br>
      <div class="card-body">
        <div class="text-center">
          <img src="<?php echo e($object->photo_url); ?>" style="max-width: 50%;" class="rounded-circle img-border box-shadow-1">
        </div>
        <br>

        <?php
        $details = [
        'name' => 'Name',
        'email' => 'Email',
        ];
        ?>

        <?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="mt-1">
          <h6 class="mb-0"><?php echo e($label); ?>:</h6>
          <p><?php echo e(!is_null($object->$key) ? $object->$key : '-'); ?></p>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      </div>
    </div>
  </div>
  <?php endif; ?>

</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('after_scripts'); ?>
<script>
  $('#permission_all').change(function() {
    if($(this).is(":checked")) {
        $('.permissions input').not(this).prop('checked', true);
    } else {
        $('.permissions input').not(this).prop('checked', false);
    }       
  });

  $('.parent').change(function() {
    if($(this).is(":checked")) {
        $(this).parent().parent().find('input[type=checkbox]').prop('checked', true);
    } else {
        $(this).parent().parent().find('input[type=checkbox]').prop('checked', false);
    }      
  });

  function checkUserType() {
    if ($("input[name=type]:checked").val() == "public") {
      $("#subsribe-charge").hide();
    } else {
      $("#subsribe-charge").show();
    }
  }
  checkUserType();

  $("input[name=type]").on("change", function() {
    checkUserType();
  });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', $viewData, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\libraryc\resources\views/admin/user/form.blade.php ENDPATH**/ ?>