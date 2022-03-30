<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        table.static {
            position: relative;
            border: 1px solid #543535;
        }
    </style>
    <title>Cetak Data Buku</title>
</head>
<body>
    <div class="form-group">
        <div class="container">
            <div class="row">
                <center><img src="/img/logo.png" style="max-width: 150px;" class="inline"></center>
                <center><img src="/img/logo1.jpeg" style="max-width: 150px;" class="inline"></center>
            </div>
        </div>
        <hr>
        <h3><center>Data Buku</center></h3>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
            <tr>
                <th>No</th>
                <th>Kode Buku</th>
                <th>Judul</th>
                <th>Penerbit</th>
                <th>Penulis</th>
                <th>Kategori</th>
                <th>Tahun Terbit</th>
            </tr>
            @foreach($data as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->kode }}</td>
                <td>{{ $data->judul }}</td>
                <td>{{ $data->penerbit }}</td> 
                <td>{{ $data->penulis }}</td> 
                <td>{{ $data->kategori->nama }}</td>
                <td>{{ $data->thn_terbit }}</td>
            </tr>
            @endforeach
        </table>
    </div>
    <br>
        <br>

    <script type="text/javascript">
    window.print();
    
    </script>

    <div class="container" style="text-align: right;">
        <p>Bandung,<span id="tanggalwaktu"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
        <!-- <p>TTD&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p> -->
        <img src="img/ttd2.jpeg" alt="" style="width: 200px; height: 100px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <script>
            var tw = new Date();
            if (tw.getTimezoneOffset() == 0) (a=tw.getTime() + ( 7 *60*60*1000))
            else (a=tw.getTime());
            tw.setTime(a);
            var tahun= tw.getFullYear ();
            // var hari= tw.getDay ();
            var bulan= tw.getMonth ();
            var tanggal= tw.getDate ();
            // var hariarray=new Array("Minggu,","Senin,","Selasa,","Rabu,","Kamis,","Jum'at,","Sabtu,");
            var bulanarray=new Array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember");
            document.getElementById("tanggalwaktu").innerHTML = tanggal+" "+bulanarray[bulan]+" "+tahun;
        </script>
        <p>Indira Regita Anansyah&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
    </div>

</body>
</html>