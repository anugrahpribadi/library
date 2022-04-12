@extends('layouts.nav')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/info.css') }}">
<link id="favicon" rel="shortcut icon" type="image/png" href="{{ asset('public/img/scan.png') }}">
<br>
<br>
<br>
<br>

<div class="co">
    <div class="content">
        <div class="bc">
            <div class="kiri">
                <br>
                <br>
                <br>
                <div class="title">Cara scan User Guide di Handphone Anda:</div>
                    <ol class="_1TxZR">
                        <li class="_1Fl07">Buka Aplikasi Scan di telepon Anda</li>
                        <li class="_1Fl07">Arahkan telepon Anda ke layar ini untuk memindai kode tersebut</li>
                        <br>
                        <br>
                        <br>
                    </ol>
                </div>
            <div class="kanan">
                <br>
                <br>
                <img src="/img/scan.png">
                <br>
                <br>
                <br>
            </div>
        </div>
    </div>
</div>

<div class="back">
    <div class="logo">
        <div class="l">
            <a class="navbar-brand" href="http://127.0.0.1:8000/menu">
                <img src="/img/logo.png" style="width: 70px; height: 35px;" alt="">
                <p class="navbar-brand" style="font-family: Geneva; color: black;">MyLibrary</p>
            </a>
        </div>
    </div>
</div>

@endsection