<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

class Absensi extends Model
{
    protected $table = 'absensi';

    protected $fillable = [
        'user_id',
        'tanggal',
        'waktu_masuk',
        'lat_masuk',
        'lng_masuk',
        'waktu_pulang',
        'lat_pulang',
        'lng_pulang',
        'status',
        'keterangan',
    ];

    protected $casts = [
        'tanggal'     => 'date',
        'lat_masuk'   => 'float',
        'lng_masuk'   => 'float',
        'lat_pulang'  => 'float',
        'lng_pulang'  => 'float',
    ];

    // Relasi ke User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Cek apakah sudah absen masuk hari ini
    public static function sudahAbsenMasuk(int $userId): bool
    {
        return static::where('user_id', $userId)
            ->where('tanggal', today())
            ->whereNotNull('waktu_masuk')
            ->exists();
    }

    // Cek apakah sudah absen pulang hari ini
    public static function sudahAbsenPulang(int $userId): bool
    {
        return static::where('user_id', $userId)
            ->where('tanggal', today())
            ->whereNotNull('waktu_pulang')
            ->exists();
    }

    // Ambil absensi hari ini milik user
    public static function hariIni(int $userId): ?static
    {
        return static::where('user_id', $userId)
            ->where('tanggal', today())
            ->first();
    }

    // Tentukan status otomatis berdasarkan jam masuk
    // Sesuaikan jam batas terlambat di sini
    public static function tentukanStatus(string $waktuMasuk): string
    {
        $masuk     = Carbon::createFromTimeString($waktuMasuk);
        $batasHadir = Carbon::createFromTimeString('07:00:00');

        return $masuk->lte($batasHadir) ? 'hadir' : 'terlambat';
    }
}