<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'deskripsi',
        'konten',
        'video',
        'visi',
        'misi',
        'slug',
        'kata_pengantar',
    ];
}
