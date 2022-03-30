<?php

namespace App\Http\Controllers;
 
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class LaporanpeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['table'] = [
            'table_url' => route("transaksi.data"),
            // 'create' => [
            //     'url' => route("transaksi.create"),
            //     'label' => 'Add Transaction',
            // ],
            'columns' => [
                // [
                //     'name' => 'formatted_id',
                //     'label' => 'ID',
                // ],
                [
                    'name' => 'kode_transaksi',
                    'label' => 'Kode Transaksi',
                ],
                [
                    'name' => 'buku_id',
                    'label' => 'Kode Buku',
                ],
                [
                    'name' => 'anggota_id',
                    'label' => 'Kode Anggota',
                ],
                [
                    'name' => 'tgl_pinjam',
                    'label' => 'Tgl Peminjaman',
                ],
                [
                    'name' => 'tgl_hrs_kembali',
                    'label' => 'Batas Waktu Pengembalian'
                ],
            ]
        ];

        return view('laporan.peminjaman', $data);
    }

    public function cetak()
    {
        $data = Transaksi::get();

        return view('laporan.cetak-peminjaman',compact('data'));
    }

    public function getData()
    {
        $query = Transaksi::select([
            'id',
            'kode_transaksi',
            'anggota_id',
            'buku_id',
            'tgl_pinjam',
            'tgl_hrs_kembali',
            
        ]);

        return Datatables::of($query)->addColumn('formatted_id', function ($table) {
            return '<strong>' . $table->formatted_id . '</strong>';
        })->addColumn('action', function ($item) {
            $string = '';

            // $string .= '<a href="' . route('transaksi.edit', $item->id) . '"><button title="Edit" class="btn btn-icon btn-sm btn-success waves-effect waves-light" style="margin-right: 5px;"><i class="fa fa-eye"></i></button></a>';

            $string .= '<button title="Pengembalian" class="btn btn-icon btn-sm btn-primary waves-effect waves-light delete">Dikembalikan</button>';
            $string .= '<form action="' . route('transaksi.destroy', $item->id) . '" method="POST">' . method_field('delete') . csrf_field() . '</form>';
            

            return $string;
        })->rawColumns(['formatted_id', 'action'])->make();
    }

    public function prepareData($request)
    {
        $payload =  $request->only([
            'kode_transaksi',
            'buku_id',
            'anggota_id',
            'tgl_pinjam',
            'tgl_hrs_kembali',
        ]); 

        // dd($payload);

        return $payload;
    }
}
