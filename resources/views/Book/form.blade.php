@php
if (isset($object)) {
$viewData = [
'title' => 'Edit buku',
'breadcrumbs' => [
'Buku',
$object->email,
'Edit',
],
];
} else {
$viewData = [
'title' => 'Tambah Buku',
'breadcrumbs' => [
'Buku',
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
$actionUrl = route('buku.update', $object->id);
} else {
$actionUrl = route('buku.store');
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
                    <span>Judul</span>
                  </div>
                  <div class="col-md-10">
                    <div class="position-relative has-icon-left">
                      <input type="text" class="form-control" name="judul" value="{{ isset($object) ? $object->judul : old('judul') }}" placeholder="Judul" required>
                      <div class="form-control-position">
                        <i class="feather icon-type"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="form-group row">
                  <div class="col-md-2">
                    <span>Penerbit</span>
                  </div>
                  <div class="col-md-10">
                    <div class="position-relative has-icon-left">
                      <input type="text" class="form-control" name="penerbit" value="{{ isset($object) ? $object->penerbit : old('penerbit') }}" placeholder="Nama Penerbit" required>
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
                    <span>Penulis</span>
                  </div>
                  <div class="col-md-10">
                    <div class="position-relative has-icon-left">
                      <input type="text" class="form-control" name="penulis" value="{{ isset($object) ? $object->penulis : old('penulis') }}" placeholder="Nama Penulis" required>
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
                    <span>Sinopsis</span>
                  </div>
                  <div class="col-md-10">
                    <div class="position-relative">
                      <textarea name="sinopsis" class="form-control" placeholder="Sinopsis" required>{{ isset($object) ? $object->sinopsis : old('sinopsis') }}</textarea>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="form-group row">
                  <div class="col-md-2">
                    <span>Kategori Buku </span>
                  </div>
                  <div class="col-md-10">
                    <select class="form-control select2" name="kategori_id">
                    @php
                    $old = isset($object) ? $object->kategori_id : old('kategori_id');
                    @endphp
                      <option value=""> -- Pilih Kategori -- </option>
                      @foreach ($kategori as $item)
                      <option value="{{ $item->id }}" {{ $old == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="form-group row">
                  <div class="col-md-2">
                    <span>Tahun Terbit</span>
                  </div>
                  <div class="col-md-10">
                    <div class="position-relative has-icon-left">
                      <input type="month" class="form-control" name="thn_terbit" value="{{ isset($object) ? $object->thn_terbit : old('thn_terbit') }}" placeholder="YYYY" min="2000" max="2100" required>
                      <div class="form-control-position">
                        <i class="feather icon-calendar"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="form-group row">
                  <div class="col-md-2">
                    <span>Jumlah Buku</span>
                  </div>
                  <div class="col-md-10">
                    <div class="position-relative has-icon-left">
                      <input type="number" class="form-control" name="jumlah_buku" value="{{ isset($object) ? $object->jumlah_buku : old('jumlah_buku') }}" placeholder="Jumlah Buku" required>
                      <div class="form-control-position">
                        <i class="feather icon-calendar"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="form-group row">
                  <div class="col-md-2">
                    <span>Kondisi Buku </span>
                  </div>
                  <div class="col-md-10">
                    <div class="position-relative">
                      <select class="form-control select2" id="kondisi" name="kondisi" required>
                        <option value="" required> -- Pilih Kondisi Buku -- </option>
                        @foreach (config('general.kondisi') as $key => $item)
                        <option value="{{ $key }}" {{isset($object) && $object->kondisi == $key ? 'selected' : ''}}>{{ $item['label'] }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="form-group row">
                  <div class="col-md-2">
                    <span>Cover Buku</span>
                  </div>
                  <div class="col-md-10">
                    <div class="position-relative">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile01" name="cover_buku">
                        <label class="custom-file-label" for="inputGroupFile01">Choose image</label>
                        @if (isset($object) && $object->file_url)
                        <small>Kosongkan jika tidak ingin mengupdate, lihat <a href="{{ $object->cover_buku_url }}" target="_blank">File Sebelumnya <span class="fa fa-external-link"></span></a></small>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="form-group row">
                  <div class="col-md-2">
                    <span>Buku</span>
                  </div>
                  <div class="col-md-10">
                    <div class="position-relative">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile02" name="baca_buku">
                        <label class="custom-file-label" for="inputGroupFile02">Choose File</label>
                        @if (isset($object) && $object->file_url)
                        <small>Kosongkan jika tidak ingin mengupdate, lihat <a href="{{ $object->baca_buku_url }}" target="_blank">File Sebelumnya <span class="fa fa-external-link"></span></a></small>
                        @endif
                      </div>
                      <small>Jangan menambahkan E-Book jika buku tersebut memiliki hak cipta</small>
                    </div>
                  </div>
                </div>
              </div>


              <div class="col-md-2">
              </div>
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