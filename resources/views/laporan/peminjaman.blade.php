@extends('layouts.app', [
'title' => 'Laporan Peminjaman',
'breadcrumbs' => [
'Laporan',
'peminjaman',
'List',
],
])

@section('content')
<div class="card">
    <div class="card-content">
        <div class="card-body">

            @if (auth()->user()->name == "Ketua")
                <a href="{{ route('cetak-peminjaman') }}" target="_blank" class="btn btn-primary"><span class="fa fa-print"></span> Cetak</a>
            @endif
            @if (auth()->user()->name == "Admin")
                <a href="{{ route('cetak-peminjaman') }}" target="_blank" class="btn btn-primary"><span class="fa fa-print"></span> Cetak</a>
            @endif
            <div class="table-responsive">
                <table class="table table-hover-animation nowrap scroll-horizontal-vertical" id="crudTable">
                    <thead>
                        <tr>
                            @foreach($table['columns'] as $column)
                            <th>{{ $column['label'] }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody></tbody>
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
$('#crudTable').DataTable({
    processing: true,
    serverSide: true,
    ajax: '{{ $table['table_url'] }}',
    ordering: false,
    columns: [
        @foreach($table['columns'] as $column) {
            data: '{{ $column['name'] }}',
            name: '{{ $column['name'] }}'
        },
        @endforeach
    ],
    drawCallback: function() {
        // Delete Confirmation
        $(".delete").on("click", function() {
            var form = $(this).parent().find("form");
            Swal.fire({
                title: 'Are you sure?',
                text: "Are you sure to delete this?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!'
            }).then((result) => {
                if (result.value) {
                    form.submit();
                }
            })
        });
    }
});
</script>
@endpush