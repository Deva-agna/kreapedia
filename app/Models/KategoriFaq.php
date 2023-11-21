<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriFaq extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori',
        'slug'
    ];

    public function faq()
    {
        return $this->hasMany(Faq::class);
    }
}
