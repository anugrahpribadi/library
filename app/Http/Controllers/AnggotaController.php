<?php

namespace App\Http\Controllers;

use App\Anggota as AppAnggota;
use App\cr;
use App\Models\Anggota;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AnggotaController extends Controller
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
        if (!auth()->user()->can('list anggota')) {
            abort(403);
        }

        $data['table'] = [
            'table_url' => route("anggota.data"),
            'create' => [
                'url' => route("anggota.create"),
                'label' => 'Tambah Anggota',
            ],
            'columns' => [
                [
                    'name' => 'formatted_id',
                    'label' => 'ID',
                ],
                [
                    'name' => 'kode',
                    'label' => 'Kode Anggota',
                ],
                [
                    'name' => 'name',
                    'data' => 'user_name',
                    'label' => 'Nama Anggota',
                ],
                [
                    'name' => 'email',
                    'label' => 'Email Anggota',
                ],
                [
                    'name' => 'action',
                    'label' => '#',
                ],
            ]
        ];

        return view('anggota.index', $data);
    }

    public function cetak()
    {
        $data = Anggota::get();

        return view('anggota.cetak-anggota',compact('data'));
    }

    public function getData()
    {
        $query = Anggota::select([
            'id',
            'kode',
            'name',
            'email',
            'created_at'
        ]);

        return Datatables::of($query)->addColumn('formatted_id', function ($table) {
            return '<strong>' . $table->formatted_id . '</strong>';
        })->addColumn('user_name', function($item){
            return $item->user_name;
        })->addColumn('action', function ($item) {
            $string = '';

            $string .= '<a href="' . route('anggota.edit', $item->id) . '"><button title="Edit" class="btn btn-icon btn-sm btn-success waves-effect waves-light" style="margin-right: 5px;"><i class="fa fa-edit"></i></button></a>';

            $string .= '<button title="Hapus" class="btn btn-icon btn-sm btn-danger waves-effect waves-light delete"><i class="fa fa-trash"></i></button>';
            $string .= '<form action="' . route('anggota.destroy', $item->id) . '" method="POST">' . method_field('delete') . csrf_field() . '</form>';
            

            return $string;
        })->rawColumns(['formatted_id', 'user_name', 'action'])->make();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->user()->can('create anggota')) {
            abort(403);
        }

        $data['anggota'] = Anggota::get();
        return view ('anggota.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $payload = $this->prepareData($request);

        $anggota = Anggota::create($payload);

        // \DB::transaction(function() use($payload) {
        //     $this->user = User::create($payload);
        // });

        return redirect()->route('anggota.index')->with('status', 'Member successfully created.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!auth()->user()->can('edit anggota')) {
            abort(403);
        }

        $data['object'] = Anggota::findOrFail($id);

        return view('anggota.form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $payload = $this->prepareData($request);
        $anggota = Anggota::findOrFail($id);
        $anggota->update($payload);

        return redirect()->route('anggota.index')->with('status', 'Member successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!auth()->user()->can('delete anggota')) {
            abort(403);
        }

        $buku = Anggota::findOrFail($id);
        $buku->delete();

        return redirect()->back()->with('status', 'Member successfully deleted.');   
    }

    public function prepareData($request)
    {
        $payload =  $request->only([
            'kode',
            'name',
            'email',
        ]); 

        // dd($payload);

        return $payload;
    }
}
