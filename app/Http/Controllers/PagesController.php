<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Models\Buku;
use App\Models\Anggota;
use App\Kategori;
use App\Models\User;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class PagesController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth')->except('menu');
    // }

    public function index(Request $request)
    {
        // if (!auth()->user()->can('dashboard')) {
        //     abort(403);
        // }

        $bukus = DB::table('bukus')->first();
        $kategoris = DB::table('kategoris')->get();

        $buku = Buku::all();
        $kategori = Kategori::all();

        return view('menu', compact('buku', 'kategori', 'bukus', 'kategoris'));
    }

    public function datatablesIndex()
    {
        return view('Book.index');
    }

    public function beranda()
    {
        $buku = Buku::all()->count();
        $kategori = Kategori::all()->count();

        return view('beranda', compact('buku', 'kategori'));
    }

    public function detail()
    {
        $buku = Buku::all();
        // $katensi = Buku::where('kategori', 'ensiklopedia')->get();
        $katensi = Buku::orderBy('kategori_id', 'asc')->get();

        return view('detailbuku', compact('buku', 'katensi'));
    }

    public function show($id)
    {
        $buku = Buku::findOrFail($id);
        // $katensi = Buku::where('kategori', 'ensiklopedia')->get();
        $katensi = Buku::orderBy('kategori_id', 'asc')->get();


        return view('detailbuku', compact('buku', 'katensi'));
    }

    public function listkategori(Kategori $kategori)
    {
        $kategori = $kategori->buku()->get();
        $kategori = Kategori::all();

        return view('listkategori', ['kategori' => $kategori]);
    }

    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;

        // mengambil data dari table buku sesuai pencarian data
        $buku = DB::table('bukus')
        ->get('buku:kategori_id, judul, penulis')
            ->where('judul', 'like', "%" . $cari . "%")
            ->orWhere('penulis', 'like', "%" . $cari . "%")
    ->orWhereHas('kategoris', function ($q) use ($cari) {
        $q->where('nama', 'LIKE', "%" . $cari . "%");
    })->get();

        // mengirim data buku ke view index
        return view('menu', ['buku' => $buku]);
    }

    // public function info()
    // {
    //     $auth = Auth::user()->id;

    //     $tgl_pinjam = ('tgl_pinjam');
    //     $tgl_hrs_kembali = ('tgl_hrs_kembali');
    //     $pinjam  = strtotime($tgl_pinjam); //Waktu awal
    //     $batas = strtotime($tgl_hrs_kembali); // Waktu sekarang atau akhir

    //     $sisa  = $batas - $pinjam;
    //     $data = Transaksi::with('buku')->where('user_id', $auth)->get();

    //     return view('beranda', $sisa, $data);
    // }

    public function sisa()
    {
        $auth = Auth::user()->id;
        $data = Transaksi::with('buku')->where('user_id', $auth)->get();

        $tgl_pinjam = Transaksi::with('buku')->select('tgl_pinjam')->where('user_id', $auth)->get();
        $tgl_hrs_kembali = Transaksi::with('buku')->select('tgl_hrs_kembali')->where('user_id', $auth)->get();

        $sisa = $tgl_hrs_kembali - $tgl_pinjam;

        return view('beranda', compact('sisa'));
    }

    public function setKategori()
    {
        // $bukus = Buku::all();
        $kategori = $this->request->getVar('kategori');
        $currentPage = $this->request->getVar('menu') ? $this->request->getVar('menu') : 1;
        $buku = $this->Buku->filter($kategori);
        ?>

        <?php foreach($buku as $b) ?>
        <div class="col-md-3" style="max-width: 50rem;">
          <div class="card mb-3 shadow-lg">
            <br>
            if($b->cover_buku != null)
            <img src="{{ \Storage::url($b->cover_buku) }}" style="width: 130px;margin-left: auto;margin-right: auto;height: 170px;" class="card-img-top">
            endif
            <hr>
            <div class="card-body">
              <h6>{{ $b->penulis }}</h6>
              <h4><b>{{ $b->judul }}</b></h4>
              <h6>{{ $b->kategori->nama }}</h6>
              <?php if (Auth::guest()) ?>
              <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#loginModal">
                Detail
              </button>

              <!-- Modal -->
              <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
              else

              <p><a href="/detailbuku/{{$b->id}}" class="btn btn-success">Detail </a></p>
              endif
            </div>
          </div>
        </div>
        endforeach

        <?php

        // return view ('menu', compact('bukus', 'kategoris'));
    }

    // public function kategoriAjax($id)
    // {
    //     if($id == 0){
    //         $bukus = Buku::all();
    //     } else{
    //         $bukus = Buku::where('kategori_id', '=', $id)->get();
    //     }
    //     return $bukus;
    // }
}
