<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class KerjaSama extends Model
{
    use HasFactory;

    protected $table = 'kerja_sama';

    protected $fillable = [
        'nama',
        'deskripsi',
        'label',
        'ikon_gambar',
    ];

    protected static function booted()
    {
        static::deleting(function ($model) {
            if ($model->ikon_gambar) {
                Storage::disk('public')->delete($model->ikon_gambar);
            }
        });

        static::updating(function ($model) {
            if ($model->isDirty('ikon_gambar')) {
            $old = $model->getOriginal('ikon_gambar');

                if ($old) {
                    Storage::disk('public')->delete($old);
                }
            }
        });
    }
}