<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Kontak extends Model
{
    /** @use HasFactory<\Database\Factories\KontakFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'value',
    ];

    protected static function booted(): void
    {
        static::saved(fn() => Cache::forget('kontak_footer'));
        static::deleted(fn() => Cache::forget('kontak_footer'));
    }
}