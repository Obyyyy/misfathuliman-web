<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengaturanAbsensi extends Model
{
    protected $table = 'pengaturan_absensis';

    protected $fillable = [
        'batas_hadir',
        'jam_pulang_jumat',
        'jam_pulang_sabtu',
        'jam_pulang_biasa',
    ];

    public static function getPengaturan(): self
    {
        return static::firstOrCreate([], [
            'batas_hadir' => '07:00:00',
            'jam_pulang_jumat' => '10:30:00',
            'jam_pulang_sabtu' => '12:00:00',
            'jam_pulang_biasa' => '13:00:00',
        ]);
    }
}