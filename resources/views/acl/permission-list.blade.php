@extends('layouts.app', [
    'title' => 'Daftar Permission',
    'breadcrumbs' => [
        'Permission',
        'List',
    ]
])

@section('content')
<div class="card">
    <div class="card-content">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover-animation nowrap scroll-horizontal-vertical" id="crudTable">
                    <thead>
                        <tr>
                            <th>Nama Permission</th>
                            <th>Dimiliki oleh Role</th>
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
var datatable = $('#crudTable').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url: '{!! route('acl.permission.data') !!}',
    },
    ordering: false,
    columns: [
        { data: 'name', name: 'name' },
        { data: 'has_role', name: 'has_role' },
    ]
});
</script>
@endpush