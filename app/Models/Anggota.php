<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Anggota extends Model
{
    use SoftDeletes;

    // protected $primaryKey = 'id';
    protected $fillable = [
        'kode',
        'name',
        'alamat',
        'telepon',
        'email',
    ];

    protected $primaryKey = 'id';
    
    public function getFormattedIdAttribute()
    {
        return '#' . $this->attributes['id'];
    }

    /**
     * Boot Method.
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();

        static::created(function($model) {
            $model->kode = 'AGP'.Carbon::now()->format('YmdHms').$model->id;
            $model->save();
        });
    }

    /**
     * Relation to transaksi
     *
     * @return BelongsTo
     */
    public function transaksi()
    {
        return $this->hasMany(\App\Models\Transaksi::class);
    }

    public function denda()
    {
        return $this->hasMany(\App\Denda::class, 'denda_id', 'id');
    }

    // public function histori(){
    //     return $this->hasMany('App\Models\Transaksi', 'anggota_id');
    // }
}
