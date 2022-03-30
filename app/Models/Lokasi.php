<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    protected $fillable = [
        'ensiklopedia',
        'biografi',
        'sastra',
        'buku_ilmiah',
        'novel',
    ];

    public function getFormattedIdAttribute()
    {
        return '#' . $this->attributes['id'];
    }
}
