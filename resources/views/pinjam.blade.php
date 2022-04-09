@extends('layouts.app', [
'title' => 'Laporan Peminjaman',
'breadcrumbs' => [
'Laporan Peminjaman'
],
])

@section('content')
<div class="card">
    <div class="card-content">
        <di class="card-body">

        <!-- <div class="col">
                <form action="/laporan/cari" method="GET">
                    <ul class="float-left">
                        <input type="text" class="form-control" id="cari" style="width: 200px;" name="cari" placeholder="Judul atau Penulis" value="{{ old('cari') }}">
                    </ul>
                </form>
                
            </div> -->

            <div class="col-md-3">
            <div class="dropdown">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Urut Berdasarkan</button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ url('laporan/dataterbaru') }}"><i class="feather icon-chevrons-up"></i>Data Terbaru</a>
                            <a class="dropdown-item" href="{{ url('laporan/dataterlama') }}"><i class="feather icon-chevrons-down"></i> Data Terlama</a>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-3">
                <a href="{{ route('cetak-peminjaman') }}" target="_blank" class="btn btn-primary ml-5"><span class="fa fa-print"></span> Cetak</a>
                </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="dataTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kode Transaksi</th>
                            <th scope="col">Judul Buku</th>
                            <th scope="col">Nama Anggota</th>
                            <th scope="col">Tgl Peminjaman</th>
                            <th scope="col">Batas Waktu Peminjaman</th>
                            <th scope="col">Tgl Pengembalian</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 0;
                        @endphp
                        @foreach ($data as $dataa)
                        <tr>
                            <th scope="row">{{ ++$no }}</th>
                            <td>{{ $dataa->kode }}</td>
                            <td>{{ $dataa->buku_name }}</td>
                            <td>{{ $dataa->user_name }}</td>
                            <td>{{ date('d F Y', strtotime($dataa->tgl_pinjam)) }}</td>
                            <td>{{ date('d F Y', strtotime($dataa->tgl_hrs_kembali)) }}</td>
                            @if($dataa->deleted_at == null)
                            <td>Belum Dikembalikan!</td>
                            @else
                            <td>{{ date('d F Y', strtotime($dataa->deleted_at)) }}</td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
