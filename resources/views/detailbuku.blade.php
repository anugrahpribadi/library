@extends('layouts.nav')

@section('content')
<br>
<div class="container-md">
  <button onclick="goBack()" class="badge bg-info">Kembali</button>
  <script>
      function goBack() {
          window.history.back();
      }
  </script>
</div>
<br>
<div class="container-md">
  <div class="row">
    <br>
    <div class="card mb-5" style="max-width: 1300px;">
        <div class="row g-0">
          <div class="col-md-4">
            <br>
            <img src="{{ \Storage::url($buku->cover_buku) }}" class="img-fluid rounded-start" alt="...">
          </div>
          	<div class="col-md-8">
            	<div class="card-body">
					<h1 class="card-title">{{$buku->judul}}</h1>
						<p class="card-text"><b> Sinopsis : </b>{{$buku->sinopsis}}</p>
						<hr>
						<h3>Detail Buku</h3>
							<p class="card-text"><b> Penerbit : </b> {{$buku->penerbit}}</p>
							<p class="card-text"><b> Penulis : </b> {{$buku->penulis}}</p>
							<p class="card-text"><b> Kategori : </b> {{$buku->kategori->nama}}</p>
							<p class="card-text"><b> Tahun Terbit : </b> {{$buku->thn_terbit}}</p>
							<p class="card-text"><b> Yang Tersedia di Perpustakaan : </b> {{$buku->jumlah_buku}}</p>
							@if (Auth::guest())
							<p><a href="{{ route('login') }}" class="btn btn-success">Pinjam</a></p>
							@else
							@if (!is_null($buku->baca_buku_url)) 
							<a href="{{$buku->baca_buku_url}}" class="btn btn-success">Download Buku {{$buku->judul}}</a>
							@else
							<!-- Button trigger modal -->
							<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#bacaBuku">
								Baca
							</button>

							<!-- Modal -->
							<div class="modal fade" id="bacaBuku" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">My Library</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											Datanglah Ke Perpustakaan Untuk Meminjam Buku Ini!
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-primary" data-bs-dismiss="modal">Oke</button>
										</div>
									</div>
								</div>
							</div>
							@endif
						@endif
              	</div>
            </div>
        </div>
          <br>
    </div>
  </div>
</div>
@endsection

@push('after_scripts')
<script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
<script>
// AJAX DataTable
// AJAX DataTable
$('#crudTable').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url: '{!! route('buku.data',) !!}',
    },
    ordering: false,
    columns: [
        { data: 'formatted_id', name: 'formatted_id' },
        { data: 'kode', name: 'kode' },
        { data: 'judul', name: 'judul' },
        { data: 'kategori_name', name: 'kategori_id' },
        { data: 'cover_buku_url', name: 'cover_buku_url' },
        { data: 'baca_buku_url', name: 'baca_buku_url' },
        { data: 'jumlah_buku', name: 'jumlah_buku' },
        { data: 'action', name: 'action' },
    ],
});

</script>
@endpush
