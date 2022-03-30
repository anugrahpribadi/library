<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaksi extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'kode',
        // 'kode_buku',
        'buku_id',
        'user_id',
        // 'kode_anggota',
        'anggota_id',
        'tgl_pinjam',
        'tgl_hrs_kembali',
        'tgl_pengembalian',
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
            $model->kode = 'TR'.Carbon::now()->format('YmdHms').$model->id;
            $model->save();
        });
    }

    /**
     * Relation to anggota
     *
     * @return BelongsTo
     */
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
        $anggota = $this->anggota()->first(['name']);
        
        if (!is_null($anggota)) {
            return $anggota->name;
        }
        
        return '-';
    }

    // public function user()
    // {
    //     return $this->belongsTo(\App\Model\User::class, 'anggota_id', 'id');
    // }

    // public function getUserNameAttribute()
    // {
    //     // return optional($this->anggota()->first('nama'))->first();
    //     $user = $this->user()->first(['name']);

    //     if (!is_null($user)) {
    //         return $user->name;
    //     }

    //     return '-';
    // }

    // public function getAnggotaNameAttribute()
    // {
    //     return optional($this->anggota()->select('nama'))->get();
    // }

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

    public function denda()
    {
        return $this->hasMany(\App\Denda::class, 'denda_id', 'id');
    }

    /**
     * Get Return Date
     * 
     * @return string
     */
    public function getReturnDateAttribute()
    {
        $now = Carbon::now();
        if ($now->format('Y-m-d') > $this->getAttribute('tgl_hrs_kembali')) {
            return '<div class="chip chip-' . 'danger' . '">
                    <div class="chip-body"><div class="chip-text">' . 
                    $this->getAttribute('tgl_hrs_kembali') . 
                    '</div></div></div>';
        }

        return $this->getAttribute('tgl_hrs_kembali');
    }

    /**
     * Get Judul Buku
     * 
     * 
     */
    // public function getDendaNameAttribute()
    // {
    //     // return optional($this->buku())->first('judul');

    //     $denda = $this->denda()->first(['keterangan']);

    //     if (!is_null($denda)) {
    //         return $denda->keterangan;
    //     }

    //     return '-';
    // }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function getUserNameAttribute()
    {
        // return optional($this->anggota()->first('nama'))->first();
        $user = $this->user()->first(['name']);
        
        if (!is_null($user)) {
            return $user->name;
        }
        
        return '-';
    }

    // public function user()
    // {
    //    return $this->belongsTo(User::class);
    // }

}
