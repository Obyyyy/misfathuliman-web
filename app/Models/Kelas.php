<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kelas extends Model
{
    protected $connection = 'subdomain'; // ← ini saja
    protected $table = 'e_kelas';
    protected $primaryKey = 'kelas_id';

    // Blokir semua operasi tulis dari sisi Laravel
    public static function boot(): void
    {
        parent::boot();

        static::creating(fn() => throw new \Exception('Data siswa bersifat read-only.'));
        static::updating(fn() => throw new \Exception('Data siswa bersifat read-only.'));
        static::deleting(fn() => throw new \Exception('Data siswa bersifat read-only.'));
    }

    public function guru(): BelongsTo {
        return $this->belongsTo(Guru::class, 'guru_id', 'guru_id');
    }

    public function tingkat(): BelongsTo {
        return $this->belongsTo(Tingkatan::class, 'tingkat_id', 'tingkat_id');
    }

    public function siswa(): HasMany {
        return $this->hasMany(Siswa::class, 'kelas_id', 'kelas_id');
    }
}