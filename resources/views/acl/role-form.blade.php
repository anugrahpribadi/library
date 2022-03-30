@php
if (isset($object)) {
    $viewData = [
        'title' => 'Edit Role',
        'breadcrumbs' => [
            'Dashboard',
            'Role',
            $object->name,
            'Edit'
        ],
    ];
} else {
    $viewData = [
        'title' => 'Tambah Role',
        'breadcrumbs' => [
            'Dashboard',
            'Role',
            'Tambah'
        ],
    ];
}
@endphp

@extends('layouts.app', $viewData)

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">{{ $viewData['title'] }}</h4>
    </div>
    <br>
    <div class="card-body">
            @php
            if (isset($object)) {
                $actionUrl = route('acl.role.update', [
                    'id' => $object->id,
                ]);
            } else {
                $actionUrl = route('acl.role.store');
            }
            
            @endphp
            <form class="form form-horizontal" method="POST" action="{{ $actionUrl }}" enctype="multipart/form-data">
                @csrf
                @if (isset($object))
                {{ method_field('PATCH') }}
                @endif
                <div class="form-body">
                    <div class="row">

                        <div class="col-12">
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <span>Nama Role</span>
                                </div>
                                <div class="col-md-10">
                                    <div class="position-relative has-icon-left">
                                        <input type="text" class="form-control" name="name" value="{{ isset($object) ? $object->name : old('name') }}" placeholder="Nama Role" autofocus>
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
                                    <span>Permission</span>
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
                                                <input type="checkbox" class="custom-control-input parent" name="permissions[]" id="{{ str_slug($permission->name) }}" value="{{ $permission->id }}" {{ isset($object) && $object->permissions->pluck('name')->contains($permission->name) ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="{{ str_slug($permission->name) }}"><strong>{{ $permission->name }}</strong></label>
                                            </div>
                                            <br>
                                            @if ($permission->childs()->count() > 0)
                                                <div class="row mb-2 {{ str_slug($permission->name) }}">
                                                    @foreach ($permission->childs as $child)
                                                    <div class="col-md-4">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" name="permissions[]" id="{{ $child->id }}" value="{{ $child->id }}" {{ isset($object) && $object->permissions->pluck('name')->contains($child->name) ? 'checked' : '' }}>
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
            </form>
    </div>
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
</script>
@endpush