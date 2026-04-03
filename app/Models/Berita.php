<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Berita extends Model
{
    /** @use HasFactory<\Database\Factories\BeritaFactory> */
    use HasFactory;

    protected $table = 'beritas';

    protected $fillable = [
        'slug',
        'judul',
        'ringkasan',
        'konten',
        'penulis',
        'tanggal',
        'kategori',
        'kategori_slug',
        'thumbnail',
        'views',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'views'   => 'integer',
    ];

    // Auto-generate slug dari judul
    protected static function booted(): void
    {
        static::creating(function (Berita $berita) {
            if (empty($berita->slug)) {
                $berita->slug = Str::slug($berita->judul);
            }
        });
    }

    // Scope filter kategori
    public function scopeKategori($query, string $slug)
    {
        return $query->where('kategori_slug', $slug);
    }

    // Increment views
    public function incrementViews(): void
    {
        $this->increment('views');
    }
}
