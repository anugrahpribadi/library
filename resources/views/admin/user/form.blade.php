@php
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
@endphp

@extends('layouts.app', $viewData)

@section('content')
{{-- Form Start --}}
@php
if (isset($object)) {
$actionUrl = route('users.update', $object->id);
} else {
$actionUrl = route('users.store');
}
@endphp
<div class="row">
  <div class="{{ isset($object) ? "col-md-8" : "col-md-12" }}">
    <form action="{{ $actionUrl }}" method="POST" enctype="multipart/form-data">

      @if (isset($object))
      {{ method_field('PATCH') }}
      <input type="hidden" name="user_id" value="{{ $object->id }}" />
      @endif

      {{ csrf_field() }}

      <div class="card">
        <div class="card-header">
          <h4 class="card-title">{{ $viewData['title'] }}</h4>
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
                      <input type="text" class="form-control" name="name" value="{{ isset($object) ? $object->name : old('name') }}" placeholder="Name" autofocus>
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
                      <input type="text" class="form-control" name="alamat" value="{{ isset($object) ? $object->alamat : old('alamat') }}" placeholder="Alamat" autofocus>
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
                      <input type="text" class="form-control" name="telepon" value="{{ isset($object) ? $object->telepon : old('telepon') }}" placeholder="telepon" autofocus>
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
                      <input type="email" class="form-control" name="email" value="{{ isset($object) ? $object->email : old('email') }}" placeholder="Email">
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
                    @if (isset($object))
                    <small class="text-info">Kosongkan jika Anda tidak ingin mengubah kata sandi</small>
                    @endif
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
                    @if (isset($object))
                    <small class="text-info">Kosongkan jika Anda tidak ingin mengubah kata sandi</small>
                    @endif
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
                            @foreach ($roles as $role)
                            <div class="col-sm-4">
                                <!-- Default unchecked -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="roles[]" id="role{{ $role->id }}" value="{{ $role->id }}" {{ isset($user) && $user->roles->pluck('name')->contains($role->name) ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="role{{ $role->id }}">{{ $role->name }}</label>
                                </div>
                            </div>
                            @endforeach
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
                          @foreach ($permissions as $permission)
                          <div class="col-sm-12 permissions">
                              <!-- Default unchecked -->
                              <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input parent" name="permissions[]" id="{{ str_slug($permission->name) }}" value="{{ $permission->id }}" {{ isset($user) && $user->permissions->pluck('name')->contains($permission->name) ? 'checked' : '' }}>
                                  <label class="custom-control-label" for="{{ str_slug($permission->name) }}"><strong>{{ $permission->name }}</strong></label>
                              </div>
                              <br>
                              @if ($permission->childs()->count() > 0)
                                  <div class="row mb-2 {{ str_slug($permission->name) }}">
                                      @foreach ($permission->childs as $child)
                                      <div class="col-md-4">
                                          <div class="custom-control custom-checkbox">
                                              <input type="checkbox" class="custom-control-input" name="permissions[]" id="{{ $child->id }}" value="{{ $child->id }}" {{ isset($user) && $user->permissions->pluck('name')->contains($child->name) ? 'checked' : '' }}>
                                              <label class="custom-control-label" for="{{ $child->id }}">{{ $child->name }}</label>
                                          </div>
                                      </div>
                                      @endforeach
                                  </div>
                              @endif
                          </div>
                          <hr>
                          @endforeach
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

{{-- Detail User --}}
  @if (isset($object))
  <div class="col-md-4">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Detail User</h4>
      </div>
      <br>
      <div class="card-body">
        <div class="text-center">
          <img src="" style="max-width: 50%;" class="rounded-circle img-border box-shadow-1">
        </div>
        <br>

        @php
        $details = [
        'name' => 'Nama',
        'email' => 'Email',
        ];
        @endphp

        @foreach ($details as $key => $label)
        <div class="mt-1">
          <h6 class="mb-0">{{ $label }}:</h6>
          <p>{{ !is_null($object->$key) ? $object->$key : '-' }}</p>
        </div>
        @endforeach

      </div>
    </div>
  </div>
  @endif
{{-- Detail User --}}
</div>

@endsection

@push('after_scripts')
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
@endpush
