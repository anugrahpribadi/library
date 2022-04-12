@extends('layouts.nav')

@section('content')

<br>
<br>

<style type="text/css">
    #scroll-btn {
        display: none;
        position: fixed;
        bottom: 20px;
        right: 30px;
        z-index: 99;
        font-size: 18px;
        border: none;
        outline: none;
        background-color: orangered;
        color: white;
        cursor: pointer;
        padding: 15px 19px;
        border-radius: 100px;
    }

    #scroll-btn:hover {
        background-color: blue;
    }

    .sampel {
        min-height: 2000px;
    }
</style>

<div class="container-md">
    <!-- <a href="{{ route('menu') }}" class="btn btn-primary">Kembali</a> -->
    <h2>Riwayat Peminjaman</h2>
    <div class="dropdown">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Urut Berdasarkan</button>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="{{ url('histori/dataterbaru') }}"><i class="feather icon-chevrons-up"></i>Data Terbaru</a>
            <a class="dropdown-item" href="{{ url('histori/dataterlama') }}"><i class="feather icon-chevrons-down"></i> Data Terlama</a>
        </div>
    </div>
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

<button onclick="topFunction()" id="scroll-btn" title="Top"><i class="feather icon-arrow-up"></i></button>

<script>
    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("scroll-btn").style.display = "block";
        } else {
            document.getElementById("scroll-btn").style.display = "none";
        }
    }

    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>

<footer class="footer footer-static footer-dark footer-fixed">
    <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25"><strong>Copyright</strong> MyLibrary &copy; {{ date('Y') }}</span>
        <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
    </p>
</footer>
@endsection