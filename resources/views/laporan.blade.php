@extends('layouts.app', [
'title' => 'Laporan Pengembalian',
'breadcrumbs' => [
'Laporan Pengembalian'
],
])

@section('content')
<div class="card">
    <div class="card-content">
        <div class="card-body">
            <form class="form-inline" action="">
                <!-- <div class="form-group">
                    <label for=""><b>Tanggal awal : </b></label>
                    <input name="tgl_awal" type="date" class="form-control ml-1">
                </div>
                <div class="form-group">
                    <label for=""><b>s/d tanggal : </b></label>
                    <input name="tgl_akhir" type="date" class="form-control ml-1">
                </div> -->
                <!-- <button type="submit" class="btn btn-primary ml-1">Oke</button> -->
                <a href="{{ route('cetak-pengembalian') }}" target="_blank" class="btn btn-primary ml-5"><span class="fa fa-print"></span> Cetak</a>
            </form>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kode Transaksi</th>
                            <th scope="col">Judul Buku</th>
                            <th scope="col">Nama Anggota</th>
                            <th scope="col">Tanggal Peminjaman</th>
                            <th scope="col">Batas Waktu Peminjaman</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 0;
                        @endphp
                        @foreach ($data as $data)
                        <tr>
                            <th scope="row">{{ ++$no }}</th>
                            <td>{{ $data->kode }}</td>
                            <td>{{ $data->buku_name }}</td>
                            <td>{{ $data->user_name }}</td>
                            <td>{{ date('d F Y', strtotime($data->tgl_pinjam)) }}</td>
                            <td>{{ date('d F Y', strtotime($data->tgl_hrs_kembali)) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    $('.dataTable').dataTable({
        processing: true,
        serverSide: false,
        "createdRow": function(row, data, dataTable) {
            if (data.dataa == "") {
                $(row).addClass('redClass');
            }
        }
    })
</script>