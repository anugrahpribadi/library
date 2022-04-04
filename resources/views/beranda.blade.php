@extends('layouts.nav', [
'title' => 'Laporan Pengembalian',
'breadcrumbs' => [
'Laporan Pengembalian'
],
])

@section('content')
<!-- 
<div class="row">
    <div class="card">
        <div class="card-header d-flex flex-column align-items-start pb-0">
            <div class="avatar bg-rgba-primary p-50 m-0">
                <div class="user-content">
                    <i class="feather icon-book-open text-primary font-medium-5" button title="Jumlah Buku"></i>
                </div>
            </div>
            <h2 class="text-bold-700 mt-1"> hari lagi!</h2>
            <p class="mb-100">Sisa waktu pengembalian buku</p>
            <br>
        </div>
    </div>
</div> -->

<div class="col-md-3">
    <div class="card">
        <div class="card-header d-flex flex-column align-items-start pb-0">
            <div class="avatar bg-rgba-primary p-50 m-0">
                <div class="user-content">
                    <i class="feather icon-book-open text-primary font-medium-5" button title="Jumlah Buku"></i>
                </div>
            </div>
            <h2 class="text-bold-700 mt-1">{{ $buku }}</h2>
            <p class="mb-100">Total Buku</p>
            <br>
        </div>
    </div>
</div>

<footer class="footer footer-static footer-dark footer-fixed">
    <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25"><strong>Copyright</strong> MyLibrary &copy; {{ date('Y') }}</span>
        <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
    </p>
</footer>
@endsection