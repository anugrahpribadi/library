@extends('layouts.app', [
    'title' => 'Kategori',
    'breadcrumbs' => [
        'Kategori',
    ],
]) 

@section('content')
<div class="card">
    <div class="card-content">
        <div class="card-body">
            
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
    
    ordering: false,
    columns: [
       
    ],
    drawCallback: function(){
        // Delete Confirmation
        $(".delete").on("click", function(){
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