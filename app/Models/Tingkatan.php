<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tingkatan extends Model
{
    protected $connection = 'subdomain'; // ← ini saja
    protected $table = 'e_tingkat';
    protected $primaryKey = 'tingkat_id';

    public static function boot(): void
    {
        parent::boot();

        static::creating(fn() => throw new \Exception('Data siswa bersifat read-only.'));
        static::updating(fn() => throw new \Exception('Data siswa bersifat read-only.'));
        static::deleting(fn() => throw new \Exception('Data siswa bersifat read-only.'));
    }
}