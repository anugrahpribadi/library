@extends('layouts.nav')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/info.css') }}">
<link id="favicon" rel="shortcut icon" type="image/png" href="{{ asset('public/img/scan.png') }}">

<div class="co">
    <div class="content">
        <div class="bc">
            <div class="kiri">
                <div class="title">Cara scan User Guide di Handphone Anda:</div>
                    <ol class="_1TxZR">
                        <p class="_1Fl07">1. Buka Aplikasi Scan di telepon Anda</p>
                        <p class="_1Fl07">2. Arahkan telepon Anda ke layar ini untuk memindai kode tersebut</p>
                    </ol>
                </div>
            <div class="kanan">
                <img src="/img/scan.png">
            </div>
        </div>
    </div>
</div>



@endsection