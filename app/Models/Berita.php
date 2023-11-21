<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori_id',
        'judul',
        'konten',
        'gambar',
        'slug',
        'status',
        'published'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
