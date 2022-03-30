@extends('layouts.nav')

@section('content')
<div class="container-md">
    <!-- <a href="{{ route('menu') }}" class="btn btn-primary">Kembali</a> -->
    <h2>Riwayat Peminjaman</h2>
    <br><br>
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Judul Buku</th>
                                <th scope="col">Penulis</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Tanggal Peminjaman</th>
                                <!-- <th scope="col">Status</th> -->
                                <th scope="col">Batas Waktu Peminjaman</th>
                                <th scope="col">Tanggal Pengembalian</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 0;
                            @endphp
                            @foreach ($data as $d)
                            <tr>
                                <th scope="row">{{ ++$no }}</th>
                                <td>{{ $d->buku->judul }}</td>
                                <td>{{ $d->buku->penulis }}</td>
                                <td>{{ $d->buku->kategori->nama }}</td>
                                <td>{{ date('d F Y', strtotime($d->tgl_pinjam)) }}</td>
                                <td>{{ date('d F Y', strtotime($d->tgl_hrs_kembali)) }}</td>
                                @if($d->deleted_at == null) 
                                    <td>Belum Dikembalikan!</td>
                                @else
                                <td>{{ date('d F Y', strtotime($d->deleted_at)) }}</td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection