@php
if (isset($object)) {
$viewData = [
'title' => 'Edit kategori',
'breadcrumbs' => [
'kategori',
$object->email,
'Edit',
],
];
} else {
$viewData = [
'title' => 'Tambah kategori',
'breadcrumbs' => [
'kategori',
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
$actionUrl = route('kategori.update', $object->id);
} else {
$actionUrl = route('kategori.store');
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
                    <span>Nama Kategori</span>
                  </div>
                  <div class="col-md-10">
                    <div class="position-relative has-icon-left">
                      <input type="text" class="form-control" name="nama" value="{{ isset($object) ? $object->nama : old('nama') }}" placeholder="Nama Kategori" autofocus required>
                      <div class="form-control-position">
                        <i class="feather icon-users"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="form-group row">
                  <div class="col-md-2">
                    <span>Lokasi Kategori</span>
                  </div>
                  <div class="col-md-10">
                    <div class="position-relative has-icon-left">
                    <textarea name="lokasi" class="form-control" placeholder="Lokasi Kategori" required>{{ isset($object) ? $object->lokasi : old('lokasi') }}</textarea>
                      <div class="form-control-position">
                        <i class="feather icon-home"></i>
                      </div>
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
</div>

@endsection