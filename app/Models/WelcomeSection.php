<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WelcomeSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'kalimat_pertama',
        'kalimat_kedua',
        'caption',
        'gambar',
        'slug',
    ];
}
