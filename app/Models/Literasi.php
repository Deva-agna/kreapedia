<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Literasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori_literasi_id',
        'judul',
        'abstrak',
        'keyword',
        'published',
        'nama_file',
        'slug',
    ];

    public function kategoriLiterasi()
    {
        return $this->belongsTo(KategoriLiterasi::class);
    }
}
