<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kategori extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'nama',
        'lokasi',
    ];

    protected $primaryKey = 'id';

    /**
     * Get formatted ID.
     *
     * @return string
     */
    public function getFormattedIdAttribute()
    {
        return '#' . $this->attributes['id'];
    }

    public function buku()
    {
        return $this->hasOne(\App\Models\Buku::class, 'id', 'kategori_id');        
    }
}
