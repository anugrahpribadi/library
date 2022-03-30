<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Buku;
use App\Models\Anggota;
use App\Models\Transaksi;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use PDF;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $anggota = Anggota::all()->count();
        $buku = Buku::all()->count();
        $transaksi = Transaksi::all()->count();
        $total = Transaksi::withTrashed()->count();
        $user = User::all()->count();

        return view('home', compact('buku', 'anggota', 'transaksi', 'user', 'total'));
    }
}
