<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriLiterasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori',
        'slug'
    ];

    public function literasi()
    {
        return $this->hasMany(Literasi::class);
    }
}
