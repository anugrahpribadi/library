<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Buku;
use App\Kategori;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['table'] = [
            'table_url' => route("kategori.data"),
            'create' => [
                'url' => route("kategori.create"),
                'label' => 'Tambah kategori',
            ],
            'columns' => [
                [
                    'name' => 'formatted_id',
                    'label' => 'ID',
                ],
                [
                    'name' => 'nama',
                    'label' => 'Nama Kategori',
                ],
                [
                    'name' => 'lokasi',
                    'label' => 'lokasi',
                ],
                [
                    'name' => 'action',
                    'label' => 'action',
                ],
            ]
        ];

        return view('Kategori.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getData()
    {
        $query = Kategori::select([
            'id',
            'nama',
            'lokasi',
            // 'buku_id'
        ]);

        return Datatables::of($query)->addColumn('formatted_id', function ($item) {
            return '<strong>' . $item->formatted_id . '</strong>';
        })->addColumn('action', function ($item) {
            $string = '';

            $string .= '<a href="' . route('kategori.edit', $item->id) . '"><button title="Edit" class="btn btn-icon btn-sm btn-success waves-effect waves-light" style="margin-right: 5px;"><i class="fa fa-edit"></i></button></a>';

            $string .= '<button title="Hapus" class="btn btn-icon btn-sm btn-danger waves-effect waves-light delete"><i class="fa fa-trash"></i></button>';
            $string .= '<form action="' . route('kategori.destroy', $item->id) . '" method="POST">' . method_field('delete') . csrf_field() . '</form>';

            return $string;
        })->rawColumns(['formatted_id', 'action'])->make();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['kategori'] = Kategori::get();
        return view('kategori.form', $data);
    }

    public function store(Request $request)
    {
        $payload = $this->prepareData($request);

        $kategori = Kategori::create($payload);
        
        return redirect()->route('kategori.index')->with('status', 'Kategori Berhasil dibuat');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['object'] = Kategori::findOrFail($id);

        return view('kategori.form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $payload = $this->prepareData($request);
        $kategori = Kategori::findOrFail($id);
        $kategori->update($payload);

        return redirect()->route('kategori.index')->with('status', 'Kategori Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect()->back()->with('status', 'Kategori Berhasil dihapus');
    }

    public function listkategori($id)
    {
        $kategori = Kategori::findOrfFail($id);

        return view('listkategori', compact('kategori'));
    }

    public function prepareData($request)
    {
        $payload =  $request->only([
            'nama',
            'lokasi',
        ]);

        // dd($payload);

        return $payload;
    }
}
