<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Buku extends Model
{
    use SoftDeletes;

    public $guarded = ['id'];
    public $timestamps = false;
    
    protected $fillable = [
        'kode',
        'penerbit',
        'penulis',
        'judul',
        'sinopsis',
        'penulis',
        'kategori_id',
        'jumlah_buku',
        'thn_terbit',
        'cover_buku',
        'baca_buku',
        'status',
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

    /**
     * Upload file and save path to database.
     *
     * @param UploadedFile $file
     * 
     * @return void
     */

    public static function boot()
    {
        parent::boot();

        static::created(function($model) {
            $model->kode = 'B8K'.Carbon::now()->format('YmdHms').$model->id;
            $model->save();
        });
    }
    
    public function setCoverBukuAttribute($cover_buku)
    {
        if (is_null($cover_buku)) {
            return;
        }

        $path = 'assets/buku/cover';

        //Delete on update
        if (!is_null($this->getAttribute('cover_buku'))) {
            \Storage::disk(config('app.disk_system'))->delete($this->getAttribute('cover_buku'));
        }

        $this->attributes['cover_buku'] = \Storage::disk(config('app.disk_system'))->put($path, $cover_buku);
    }

    /**
     * Get file URL.
     *
     * @return string
     */
    public function getCoverBukuUrlAttribute()
    {
        if (is_null($this->getAttribute('cover_buku'))) {
            return null;
        }

        return 'http://127.0.0.1:8000/storage/' . $this->getAttribute('cover_buku');
    }

    public function setBacaBukuAttribute($baca_buku)
    {
        if (is_null($baca_buku)) {
            return;
        }

        $path = 'assets/buku/naskah';

        //Delete on update
        if (!is_null($this->getAttribute('baca_buku'))) {
            \Storage::disk(config('app.disk_system'))->delete($this->getAttribute('baca_buku'));
        }

        $this->attributes['baca_buku'] = \Storage::disk(config('app.disk_system'))->put($path, $baca_buku);
    }

    /**
     * Get file URL.
     *
     * @return string
     */
    public function getBacaBukuUrlAttribute()
    {
        if (is_null($this->getAttribute('baca_buku'))) {
            return null;
        }

        return 'http://127.0.0.1:8000/storage/' . $this->getAttribute('baca_buku');
    }

    public function transaksi()
    {
        return $this->hasMany(\App\Models\Transaksi::class);
    }

    public function denda()
    {
        return $this->hasMany(\App\Denda::class);
    }

    public function kategori()
    {
        return $this->belongsTo(\App\Kategori::class, 'kategori_id', 'id');
    }

    /**
     * Get Judul Buku
     * 
     * @return string
     */
    public function getKategoriNameAttribute()
    {
        // return optional($this->kategori())->first('nama');

        $kategori = $this->kategori()->first(['nama']);

        if (!is_null($kategori)) {
            return $kategori->nama;
        }

        return '-';
    }
}
