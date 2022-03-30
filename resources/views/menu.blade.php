@extends('layouts.nav')

@section('content')
@csrf
  <div class="container-md">
    <!-- <div class="col">
      <a href="#" class="badge bg-success">Bisa Di Download</a>
      <a href="#" class="badge bg-warning">Tidak Bisa Di Download</a>
    </div> -->

    

      <div class="row">
        <br>

        <table id="table" class="display" style="width:100%">

        @foreach($buku as $b)
        <div class="col-md-3" style="max-width: 50rem;">
          <div class="card mb-3 shadow-lg">
            <br>
              @if($b->cover_buku != null)
                <img src="{{ \Storage::url($b->cover_buku) }}" style="width: 130px;margin-left: auto;margin-right: auto;height: 170px;" class="card-img-top">
              @endif
              <hr>
              <div class="card-body">
                <h6>{{ $b->penulis }}</h6>
                <h4><b>{{ $b->judul }}</b></h4>
              @if (Auth::guest())
              <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Detail
              </button>
              
              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">My Library</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Anda Harus Login Terlebih Dahulu Untuk Melihat Detail Buku!
                    </div>
                    <div class="modal-footer">
                      <p><a href="{{ route('login') }}" class="btn btn-warning">Login Sekarang!</a></p>
                    </div>
                  </div>
                </div>
              </div>
              @else
              <!-- <p><a href="{{ route('buku.index') }}" class="btn btn-success">Pinjam / Baca</a></p> -->

              <p><a href="/detailbuku/{{$b->id}}" class="btn btn-success">Detail </a></p>
              @endif
            </div>
          </div>
        </div>
        @endforeach
        </table>
      </div>
    </div>

    <footer class="footer footer-static footer-dark">
        <p class="clearfix blue-grey lighten-2 mb-0"><span
                class="float-md-left d-block d-md-inline-block mt-25"><strong>Copyright</strong> MyLibrary &copy; {{ date('Y') }}</span>
            <button class="btn btn-primary btn-icon scroll-top" type="button"><i
                    class="feather icon-arrow-up"></i></button>
        </p>
    </footer>

    
    <script src="{{ asset('public/assets/js/jquery-3.4.0.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/filter.js') }}"></script>
    
@endsection
