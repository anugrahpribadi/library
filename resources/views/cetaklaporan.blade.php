@extends('layouts.app', [
'title' => 'Cetak Laporan Pertanggal',
'breadcrumbs' => [
'Laporan',
'Cetak Laporan Pertanggal'
],
])

@section('content')
<div class="card">
    <div class="card-content">
        <div class="card-body">
            <h2>Cetak Laporan Pertanggal</h2>
            Tanggal Awal
            <div class="input-group mb-3">
                <input type="date" name="tglawal" id="tglawal" class="form-control" required>
            </div>
            Tanggal Akhir
            <div class="input-group mb-3">
                <input type="date" name="tglakhir" id="tglakhir" class="form-control" required>
            </div>
            <div class="input-group mb-3">
            <a href="" onclick="this.href='/cetaklaporanpertanggal/'+ document.getElementById('tglawal').value + '/' + document.getElementById('tglakhir').value " target="_blank" class="btn btn-primary"><span class="fa fa-print"></span> Cetak</a>
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