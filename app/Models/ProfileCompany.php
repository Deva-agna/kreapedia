<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileCompany extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_perusahaan',
        'alamat',
        'kota',
        'negara',
        'no_wa',
        'email',
        'tiktok',
        'instagram',
        'youtube',
        'facebook',
        'twitter',
        'telegram',
        'gambar',
        'slug',
    ];
}
