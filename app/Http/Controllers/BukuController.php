<?php

namespace App\Http\Controllers;

use DB;
use App\Kategori;
use App\Models\Buku;
use App\Models\Penerbit;
use App\Models\Penulis;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BukuController extends Controller
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
        if (!auth()->user()->can('list buku')) {
            abort(403);
        }

        $data['table'] = [
            
            'create' => [
                'url' => route("buku.create"),
                'label' => 'Tambah Buku',
            ],

            // 'columns' => [
            //     [
            //         'name' => 'formatted_id',
            //         'label' => 'ID',
            //     ],
            //     [
            //         'name' => 'kode',
            //         'label' => 'Kode Buku',
            //     ],
            //     [
            //         'name' => 'judul',
            //         'label' => 'Judul',
            //     ],
            //     [
            //         'name' => 'cover_buku_url',
            //         'label' => 'Cover Buku',
            //     ],
            //     [
            //         'name' => 'baca_buku_url',
            //         'label' => 'Download Buku',
            //     ],
            //     [
            //         'name' => 'action',
            //         'label' => '#',
            //     ],
            // ]
        ];

        return view('Book.index', $data);
    }

    public function cetak()
    {
        $data = Buku::get();

        return view('Book.cetak-buku', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getData(Request $request)
    {
        $query = Buku::select([
            'id',
            'kategori_id',
            'jumlah_buku',
            'kode',
            'penerbit',
            'penulis',
            'judul',
            'thn_terbit',
            'cover_buku',
            'baca_buku',
            'created_at'
        ]);

        if($request->input('kategori')!=null){
            $data = $data->where('kategori_id',$request->kategori);
        }

        return Datatables::of($query)->addColumn('formatted_id', function ($item) {
            return '<strong>' . $item->formatted_id . '</strong>';
        })->addColumn('kategori_name', function($item){
            return $item->kategori_name;
        })->addColumn('cover_buku_url', function ($item) {
            $string = '';
            if (!is_null($item->cover_buku_url)) {
                $string = 'Lihat Sampul';
                $string .= ' <a href="' . $item->cover_buku_url . '" target="_blank"><span class="fa fa-external-link"></span></a>';
            } else {
                return;
            }
            return $string;
        })->addColumn('baca_buku_url', function ($item) {
            $string = '';
            if (!is_null($item->baca_buku_url)) {
                $string = 'Download Buku';
                $string .= ' <a href="' . $item->baca_buku_url . '"target="_blank"><span class="fa fa-external-link"></span></a>';
            } else {
                // return ;
                $string = '<button class="btn btn-icon btn-sm btn-warning">Buku Hanya Bisa Dipinjam!</button>';
            }
            return $string;
        })->addColumn('action', function ($buku) {
            $string = '';
                $string .= '<a href="' . route('buku.edit', $buku->id) . '"><button title="Edit" class="btn btn-icon btn-sm btn-success waves-effect waves-light" style="margin-right: 5px;"><i class="fa fa-edit"></i></button></a>';

                $string .= '<button title="Hapus" class="btn btn-icon btn-sm btn-danger waves-effect waves-light delete"><i class="fa fa-trash"></i></button>';
                $string .= '<form action="' . route('buku.destroy', $buku->id) . '" method="POST">' . method_field('delete') . csrf_field() . '</form>';

            return $string;
        })->rawColumns(['formatted_id', 'kategori_name', 'cover_buku_url', 'baca_buku_url', 'action'])->make();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->user()->can('create buku')) {
            abort(403);
        }

        $data['buku'] = Buku::get();
        $data['kategori'] = Kategori::with('buku')->select(['id', 'nama'])->get();


        // $data['penerbit'] = Buku::with('penerbit')->all();
        // $data['penulis'] = Buku::with('penulis')->all();

        return view('Book.form', $data);
    }

    public function store(Request $request)
    {
        $payload = $this->prepareData($request);

        $buku = Buku::create($payload);

        // \DB::transaction(function() use($payload) {
        //     $this->user = User::create($payload);
        // });

        return redirect()->route('buku.index')->with('status', 'Book successfully created.');
    }

    // public function show($id)
    // {
    //     $buku = Buku::find($id);
    //     return view('detailbuku',compact('buku'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!auth()->user()->can('edit buku')) {
            abort(403);
        }
        
        $data['object'] = Buku::findOrFail($id);
        $data['kategori'] = Kategori::with('buku')->select(['id', 'nama'])->get();

        return view('Book.form', $data);
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
        $buku = Buku::findOrFail($id);
        $buku->update($payload);

        return redirect()->route('buku.index')->with('status', 'Book successfully updated.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    // public function transaksiedit($id)
    // {
    //     if (!auth()->user()->can('edit buku')) {
    //         abort(403);
    //     }
        
    //     $data['transaksi'] = Buku::findOrFail($id);
    //     $data['kategori'] = Kategori::with('buku')->select(['id', 'nama'])->get();

    //     return view('Book.form', $data);
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\Buku  $buku
    //  * @return \Illuminate\Http\Response
    //  */
    // public function transaksiupdate(Request $request, $id)
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
    public function destroy($id)
    {
        if (!auth()->user()->can('delete buku')) {
            abort(403);
        }
        
        $buku = Buku::findOrFail($id);
        $buku->delete();

        return redirect()->back()->with('status', 'Book successfully deleted.');
    }

    public function listkategori()
    {
        if (!auth()->user()->can('listkategori')) {
            abort(403);
        }

        return view('listkategori');
    }

    public function prepareData($request)
    {
        $payload =  $request->only([
            'kode',
            'penerbit',
            'penulis',
            'judul',
            'sinopsis',
            'kategori_id',
            'jumlah_buku',
            'thn_terbit',
            'cover_buku',
            'baca_buku',
            'kondisi',
        ]);

        // dd($payload);

        return $payload;

        if($request->input('kategori')!=null){
            $data = $data->where('kategori_id',$request->kategori);
        }
    }

    public function imageUploadPost(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        /* Store $imageName name in DATABASE from HERE */

        return back()
            ->with('success', 'You have successfully upload image.')
            ->with('image', $imageName);
    }

    public function BacaUploadPost(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:pdf,txt|max:2048',
        ]);

        // $fileName = time() . '.' . $request->file->extension();

        $request->file->move(public_path('files'));

        /* Store $fileName name in DATABASE from HERE */

        return back()
            ->with('success', 'You have successfully upload File.')
            ->with('file');
    }
}
