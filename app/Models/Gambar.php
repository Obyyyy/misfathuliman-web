<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Gambar extends Model
{
    protected $table = 'gambar';

    protected $fillable = [
        'jenis',
        'gambar'
    ];

    protected static function booted()
    {
        static::deleting(function ($model) {
            if ($model->gambar) {
                Storage::disk('public')->delete($model->gambar);
            }
        });

        static::updating(function ($model) {
            if ($model->isDirty('gambar')) {
            $old = $model->getOriginal('gambar');

                if ($old) {
                    Storage::disk('public')->delete($old);
                }
            }
        });
    }
}