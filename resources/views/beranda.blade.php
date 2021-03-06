@extends('layouts.nav', [
'title' => 'Laporan Pengembalian',
'breadcrumbs' => [
'Laporan Pengembalian'
],
])

@section('content')
<br>
<br>
<br>
<div class="container-lg">
    <div class="row">
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

        <div class="col-md-3">
            <div class="card">
                <div class="card-header d-flex flex-column align-items-start pb-0">
                    <div class="avatar bg-rgba-primary p-50 m-0">
                        <div class="user-content">
                            <i class="feather icon-book-open text-primary font-medium-5" button title="Jumlah Buku"></i>
                        </div>
                    </div>
                    <h2 class="text-bold-700 mt-1">{{ $ck }}</h2>
                    <p class="mb-100">Total Kategori</p>
                    <br>
                </div>
            </div>
        </div>
        
        @foreach($kategori as $k)
        <div class="col-md-3">
            <div class="card">
                <div class="card-header d-flex flex-column align-items-start pb-0">
                    <div class="avatar bg-rgba-primary p-50 m-0">
                        <div class="user-content">
                            <i class="feather icon-book-open text-primary font-medium-5" button title="Jumlah Buku"></i>
                        </div>
                    </div>
                    <h2 class="text-bold-700 mt-1">{{ $k->nama }}</h2>
                    <p class="mb-100"></p>
                    <br>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<footer class="footer footer-static footer-dark footer-fixed">
    <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25"><strong>Copyright</strong> MyLibrary &copy; {{ date('Y') }}</span>
        <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
    </p>
</footer>
@endsection