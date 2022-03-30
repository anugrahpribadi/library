<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Buku;
use App\Denda;
use App\Models\Anggota;
use App\Models\Transaksi;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['table'] = [
            'create' => [
                'url' => route("denda.create"),
                'label' => 'Denda',
            ],
        ];

        return view('denda.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getData()
    {
        $query = Denda::select([
            'id',
            'kode',
            'transaksi_id',
            'buku_id',
            'anggota_id',
            'keterangan',
            'nominal',
        ]);

        return Datatables::of($query)->addColumn('formatted_id', function ($item) {
            return '<strong>' . $item->formatted_id . '</strong>';
        })->addColumn('transaksi_id', function($item){
            return $item->transaksi_id;
        })->addColumn('anggota_name', function($item){
            return $item->anggota_name;
        })->addColumn('buku_name', function($item){
            return $item->buku_name;
        })->addColumn('action', function ($item) {
            $string = '';

            $string .= '<a href="' . route('anggota.edit', $item->id) . '"><button title="Edit" class="btn btn-icon btn-sm btn-success waves-effect waves-light" style="margin-right: 5px;"><i class="fa fa-edit"></i></button></a>';

            $string .= '<button title="Hapus" class="btn btn-icon btn-sm btn-danger waves-effect waves-light delete"><i class="fa fa-trash"></i></button>';
            $string .= '<form action="' . route('anggota.destroy', $item->id) . '" method="POST">' . method_field('delete') . csrf_field() . '</form>';
            

            return $string;
        })->rawColumns(['formatted_id', 'anggota_name', 'buku_name', 'action'])->make();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['denda'] = Denda::get();

        $data['transaksi'] = Transaksi::with('denda')->select(['id', 'kode'])->get();
        // $data['buku'] = Buku::with('denda')->select(['id', 'judul'])->get();
        // $data['anggota'] = Anggota::with('denda')->select(['id', 'nama'])->get(); 

        return view('denda.form', $data);
    }

    public function store(Request $request)
    {
        $payload = $this->prepareData($request);

        $buku = Buku::create($payload);

        // \DB::transaction(function() use($payload) {
        //     $this->user = User::create($payload);
        // });

        return redirect()->route('Denda.index')->with('status', 'Denda Berhasil Dibuat.');
    }

    // public function edit($id)
    // {
    //     $data['object'] = Denda::findOrFail($id);

    //     $data['transaksi'] = Transaksi::with('denda')->select(['id', 'kode'])->get();
    //     $data['buku'] = Buku::with('denda')->select(['id', 'judul'])->get();
    //     $data['anggota'] = Anggota::with('denda')->select(['id', 'nama'])->get(); 

    //     return view('Denda.form', $data);
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\Buku  $buku
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     $payload = $this->prepareData($request);
    //     $buku = Buku::findOrFail($id);
    //     $buku->update($payload);

    //     return redirect()->route('buku.index')->with('status', 'Book successfully updated.');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     $buku = Buku::findOrFail($id);
    //     $buku->delete();

    //     return redirect()->back()->with('status', 'Book successfully deleted.');
    // }

    public function prepareData($request)
    {
        $payload =  $request->only([
            'kode',
            'transaksi_id',
            'buku_id',
            'anggota_id',
            'keterangan',
            'nominal',
        ]);

        // dd($payload);

        return $payload;
    }
}
