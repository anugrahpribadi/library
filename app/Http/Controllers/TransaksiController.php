<?php

namespace App\Http\Controllers;

use Auth;
use App\cr;
use App\Order;
use Carbon\Carbon;
use App\Models\Buku;
use App\Models\User;
use App\Models\Anggota;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!auth()->user()->can('list transaksi')) {
            abort(403);
        }

        $data['table'] = [
            'table_url' => route("transaksi.data"),
            'create' => [
                'url' => route("transaksi.create"),
                'label' => 'Pinjam Buku',
            ],
            'columns' => [
                // [
                //     'name' => 'formatted_id',
                //     'label' => 'ID',
                // ],
                [
                    'name' => 'kode',
                    'data' => 'kode',
                    'label' => 'Kode Peminjaman',
                ],
                [
                    'name' => 'buku_id',
                    'data' => 'buku_name',
                    'label' => 'Judul Buku',
                ],
                [
                    'name' => 'user_id',
                    'data' => 'user_name',
                    'label' => 'Nama Anggota',
                ],
                [
                    'name' => 'tgl_pinjam',
                    'data' => 'tgl_pinjam',
                    'label' => 'Tgl Peminjaman',
                ],
                [
                    'name' => 'return_date',
                    'data' => 'return_date',
                    'label' => 'Batas Waktu Pengembalian'
                ],
                [
                    'name' => 'action',
                    'data' => 'action',
                    'label' => 'Aksi',
                ],
            ]
        ];

        return view('transaksi.index', $data);
    }

    public function cetak()
    {
        $data = Transaksi::get();

        return view('transaksi.cetak-transaksi', compact('data'));
    }

    public function getData()
    {
        $query = Transaksi::select([
            'id',
            'kode',
            'user_id',
            'buku_id',
            'tgl_pinjam',
            'tgl_hrs_kembali',
            // 'tgl_pengembalian',

        ]);

        return Datatables::of($query)->addColumn('formatted_id', function ($item) {
            return '<strong>' . $item->formatted_id . '</strong>';
        })->addColumn('user_name', function ($item) {
            return $item->user_name;
        })->addColumn('buku_name', function ($item) {
            return $item->buku_name;
        })->addColumn('user_name', function ($item) {
            return $item->user_name;
        })->addColumn('return_date', function ($item) {
            return $item->return_date;
        })->addColumn('action', function ($transaksi) {
            $string = '';

            $string .= '<button title="Pengembalian" class="btn btn-icon btn-sm btn-primary waves-effect waves-light delete">Dikembalikan</button>';
            $string .= '<form action="' . route('transaksi.destroy', $transaksi->id) . '" method="POST">' . method_field('delete') . csrf_field() . '</form>';

            return $string;
        })->rawColumns(['formatted_id', 'user_name', 'return_date', 'user_name', 'buku_name', 'action'])->make();
    }

    public function create()
    {
        if (!auth()->user()->can('create transaksi')) {
            abort(403);
        }

        $data['transaksi'] = Transaksi::get();

        $data['user'] = User::with('transaksi')->select(['id', 'name'])->get();
        $data['buku'] = Buku::with('transaksi')->where('jumlah_buku', '>', 0)->select(['id', 'judul'])->get();

        return view('transaksi.form', $data);
    }

    public function store(Request $request)
    {
        $payload = $this->prepareData($request);

        $buku = Transaksi::create($payload);
        $buku->buku->where('id', $buku->buku_id)
            ->update([
                'jumlah_buku' => ($buku->buku->jumlah_buku - 1),
            ]);

        return redirect()->route('transaksi.index')->with('status', 'Anggota berhasil melakukan transaksi peminjaman buku');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!auth()->user()->can('edit transaksi')) {
            abort(403);
        }

        $data['object'] = Transaksi::findOrFail($id);
        // $data['anggota'] = Transaksi::with('anggota')->get();
        // $data['buku'] = Transaksi::with('buku')->get();

        return view('transaksi.pengembalian', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!auth()->user()->can('delete transaksi')) {
            abort(403);
        }

        $buku = Transaksi::findOrFail($id);
        $buku->delete();
        $buku->buku->where('id', $buku->buku_id)
                        ->update([
                            'jumlah_buku' => ($buku->buku->jumlah_buku + 1),
                        ]);
        
        return redirect()->back()->with('status', 'Buku Telah Di Kembalikan');  
    }

    public function cetakpeminjaman()
    {
        $data = Transaksi::withTrashed()->get();
        return view('laporan/cetak-peminjaman', compact('data'));
    }

    public function pinjam(Request $request)
    {
        if (!auth()->user()->can('list pinjam')) {
            abort(403);
        }

        $data = Transaksi::withTrashed()->get();
        return view('pinjam', compact('data'));
    }

    public function baru()
    {
        $data = Transaksi::withTrashed()->orderBy('tgl_pinjam', 'desc')->get();

        return view('pinjam', compact('data'));
    }

    public function lama()
    {
        $data = Transaksi::withTrashed()->orderBy('tgl_pinjam', 'asc')->get();

        return view('pinjam', compact('data'));
    }

    public function cetakLaporan()
    {
        return view('cetaklaporan');
    }

    public function cetakLaporanPertanggal($tglawal, $tglakhir)
    {
        $data = Transaksi::withTrashed()->whereBetween('tgl_pinjam',[$tglawal, $tglakhir])->get();
        return view('laporan/cetak-peminjaman', compact('data'));
    }

    public function histori()
    {
        $auth = Auth::user()->id;
        $data = Transaksi::withTrashed()->with('buku')->where('user_id', $auth)->get();
        return view('histori', compact('data'));
    }

    public function databaru()
    {
        $auth = Auth::user()->id;
        $data = Transaksi::withTrashed()->with('buku')->where('user_id', $auth)->orderBy('tgl_pinjam', 'desc')->get();

        return view('histori', compact('data'));
    }

    public function datalama()
    {
        $auth = Auth::user()->id;
        $data = Transaksi::withTrashed()->with('buku')->where('user_id', $auth)->orderBy('tgl_pinjam', 'asc')->get();

        return view('histori', compact('data'));
    }

    public function prepareData($request)
    {
        $payload =  $request->only([
            'kode',
            'user_id',
            'buku_id',
            'tgl_pinjam',
            'tgl_hrs_kembali',
            // 'tgl_pengembalian',
        ]);

        // dd($payload);

        return $payload;
    }
}
