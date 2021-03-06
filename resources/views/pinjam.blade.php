@extends('layouts.app', [
'title' => 'Laporan Peminjaman',
'breadcrumbs' => [
'Laporan',
'Laporan Peminjaman'
],
])

@section('content')
<div class="card">
    <div class="card-content">
        <div class="card-body">
            <div class="row">
                
                <a href="{{ route('cetaklaporan') }}" class="btn btn-primary"><span class="fa fa-print"></span> Cetak</a>
                <div class="col-md-3">
                    <div class="dropdown">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Urut Berdasarkan</button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ url('laporan/dataterbaru') }}"><i class="feather icon-chevrons-up"></i>Data Terbaru</a>
                            <a class="dropdown-item" href="{{ url('laporan/dataterlama') }}"><i class="feather icon-chevrons-down"></i> Data Terlama</a>
                        </div>
                    </div>
                </div>
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
                    <tbody id="dataTable">
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
                            <td class="badge bg-warning">Belum Dikembalikan!</td>
                            @else
                            <td class="badge bg-success">{{ date('d F Y', strtotime($dataa->deleted_at)) }}</td>
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

@push('after_styles')
<link rel="stylesheet" href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
@endpush

@push('after_scripts')
<script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
<script>
// AJAX DataTable
// AJAX DataTable
$('.dataTable').DataTable({
    processing: true,
    serverSide: true,
    ordering: false,
});
</script>
@endpush
