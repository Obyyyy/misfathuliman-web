<?php

namespace App\Models;

use App\Models\Berita;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SlideShow extends Model
{
    protected $table = 'slideshows';

    protected $fillable = [
        'berita_id',
        'urutan',
    ];

    protected $casts = [
        'urutan' => 'integer',
    ];

    public function berita(): BelongsTo
    {
        return $this->belongsTo(Berita::class, 'berita_id');
    }
}
