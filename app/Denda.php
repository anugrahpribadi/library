<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Denda extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id';
    protected $fillable = [
        'kode',
        'transaksi_kode',
        'buku_id', 
        'anggota_id', 
        'keterangan', 
        'nominal',
    ];

    /**
     * Get formatted ID.
     *
     * @return string
     */
    public function getFormattedIdAttribute()
    {
        return '#' . $this->attributes['id'];
    }

    public static function boot()
    {
        parent::boot();

        static::created(function($model) {
            $model->kode = 'B8K'.Carbon::now()->format('YmdHms').$model->id;
            $model->save();
        });
    }

    public function transaksi()
    {
        return $this->belongsTo(\App\Models\Transaksi::class, 'transaksi_id', 'id');
    }

    /**
     * Get Transaksi
     * 
     * @return string
     */
    public function getTransaksiNameAttribute()
    {
        $transaksi = $this->transaksi()->select(['kode']);

        if (!is_null($transaksi)) {
            return $transaksi->kode;
        }

        return '-';
    }

    public function anggota()
    {
        return $this->belongsTo(\App\Models\Anggota::class, 'anggota_id', 'id');
    }

    /**
     * Get Nama Anggota
     * 
     * @return string
     */
    public function getAnggotaNameAttribute()
    {
        // return optional($this->anggota()->first('nama'))->first();
        $anggota = $this->anggota()->first(['nama']);

        if (!is_null($anggota)) {
            return $anggota->nama;
        }

        return '-';
    }
    
    /**
     * Relation to buku
     *
     * @return BelongsTo
     */
    public function buku()
    {
        return $this->belongsTo(\App\Models\Buku::class, 'buku_id', 'id');
    }

    /**
     * Get Judul Buku
     * 
     * @return string
     */
    public function getBukuNameAttribute()
    {
        // return optional($this->buku())->first('judul');

        $buku = $this->buku()->first(['judul']);

        if (!is_null($buku)) {
            return $buku->judul;
        }

        return '-';
    }
}
