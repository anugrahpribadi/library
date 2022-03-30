@php
if (isset($object)) {
$viewData = [
'title' => 'Edit denda',
'breadcrumbs' => [
'Denda',
$object->kode,
'Edit',
],
];
} else {
$viewData = [
'title' => ' Denda',
'breadcrumbs' => [
'Denda',
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
$actionUrl = route('denda.update', $object->id);
} else {
$actionUrl = route('denda.store');
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
                                        <span>Kode Transaksi </span>
                                    </div>
                                    <div class="col-md-10">
                                        <select class="form-control select2" name="transaksi_id" required>
                                            @php
                                            $old = isset($object) ? $object->transaksi_id : old('transaksi_id');
                                            @endphp
                                            <option value=""> -- Pilih Transaksi -- </option>
                                            @foreach ($transaksi as $item)
                                            <option value="{{ $item->id }}" {{ $old == $item->id ? 'selected' : '' }}>{{ $item->kode }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <span>Nama Anggota </span>
                                    </div>
                                    <div class="col-md-10">
                                        <select class="form-control select2" name="anggota_id" required>
                                            @php
                                            $old = isset($object) ? $object->anggota_id : old('anggota_id');
                                            @endphp
                                            <option value=""> -- Pilih Anggota -- </option>
                                            @foreach ($anggota as $item)
                                            <option value="{{ $item->id }}" {{ $old == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <span>Buku </span>
                                    </div>
                                    <div class="col-md-10">
                                        <select class="form-control select2" name="buku_id" required>
                                            @php
                                            $old = isset($object) ? $object->buku_id : old('buku_id');
                                            @endphp
                                            <option value=""> -- Pilih Buku -- </option>
                                            @foreach ($buku as $item)
                                            <option value="{{ $item->id }}" {{ $old == $item->id ? 'selected' : '' }}>{{ $item->judul }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group row">
                                    <div class="col-md-2">
                                        <span>Keterangan</span>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="position-relative has-icon-left">
                                            <input type="text" class="form-control" name="keterangan" value="{{ isset($object) ? $object->keterangan : old('keterangan') }}" placeholder="Nomor Handphone Anggota" required>
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
                                        <span>Nominal Denda</span>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="position-relative has-icon-left">
                                            <input type="text" class="form-control" name="nominal" value="{{ isset($object) ? $object->nominal : old('nominal') }}" placeholder="Email Anggota" required>
                                            <div class="form-control-position">
                                                <i class="feather icon-mail"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2"></div>
                            <div class="col-md-10">
                                <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection