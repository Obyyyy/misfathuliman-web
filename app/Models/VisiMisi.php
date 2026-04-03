<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisiMisi extends Model
{
    /** @use HasFactory<\Database\Factories\VisiMisiFactory> */
    use HasFactory;

    protected $fillable = [
        'jenis',
        'judul',
        'deskripsi',
    ];
}