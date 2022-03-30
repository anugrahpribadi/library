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

        return view('beranda', compact('buku'));
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
            ->where('judul', 'like', "%" . $cari . "%")
            ->orWhere('penulis', 'like', "%" . $cari . "%")
            ->orWhere('kategori_id', 'like', "%" . $cari . "%")
            ->paginate(5);

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

    // public function setKategori()
    // {
    //     $bukus = Buku::all();
    //     $kategoris = Kategori::pluck('nama', 'kategori_id');
    //     // $data['kategoris'] = Kategori::with('buku')->select(['id', 'nama'])->get();

    //     return view ('layouts.nav', compact('bukus', 'kategoris'));
    // }

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