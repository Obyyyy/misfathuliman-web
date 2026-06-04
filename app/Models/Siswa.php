<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Siswa extends Model
{
    protected $connection = 'subdomain';
    protected $table = 'e_siswa';
    protected $primaryKey = 'siswa_id';

    // Blokir semua operasi tulis dari sisi Laravel
    public static function boot(): void
    {
        parent::boot();

        static::creating(fn() => throw new \Exception('Data siswa bersifat read-only.'));
        static::updating(fn() => throw new \Exception('Data siswa bersifat read-only.'));
        static::deleting(fn() => throw new \Exception('Data siswa bersifat read-only.'));
    }

    public function kelas(): BelongsTo {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'kelas_id');
    }
}