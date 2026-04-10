<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class ProfilGuru extends Model
{
    protected $table = 'profil_guru';

    protected $fillable = [
        'user_id',
        'nip',
        'pendidikan',
        'jabatan',
        'nama_jabatan',
        'no_hp',
        'alamat',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Hapus foto user saat profil dihapus
    protected static function booted(): void
    {
        static::deleting(function ($model) {
            if ($model->user?->foto) {
                Storage::disk('public')->delete($model->user->foto);
            }
        });
    }
}