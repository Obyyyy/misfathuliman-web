<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Berita extends Model
{
    /** @use HasFactory<\Database\Factories\BeritaFactory> */
    use HasFactory;

    protected $table = 'berita';

    protected $fillable = [
        'slug',
        'judul',
        'konten',
        'user_id',
        'tanggal',
        'kategori_id',
        'thumbnail',
        'views',
    ];

    protected $casts = [
        'tanggal'      => 'date',
        'views'        => 'integer',
    ];

    // Auto-generate slug dari judul
    protected static function booted(): void
    {
        static::creating(function (Berita $berita) {
            if (empty($berita->slug)) {
                $berita->slug = Str::slug($berita->judul);
            }
        });

        static::deleting(function ($model) {
            if ($model->thumbnail) {
                Storage::disk('public')->delete($model->thumbnail);
            }
        });

        static::updating(function ($model) {
            if ($model->isDirty('thumbnail')) {
            $old = $model->getOriginal('thumbnail');

                if ($old) {
                    Storage::disk('public')->delete($old);
                }
            }
        });
    }

    // Increment views
    public function incrementViews(): void
    {
        $this->increment('views');
    }

    public function kategoriBerita(): BelongsTo {
        return $this->belongsTo(KategoriBerita::class, 'kategori_id', 'id');
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
