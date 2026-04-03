<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['key', 'value'];

    // Helper untuk ambil nilai setting
    public static function get(string $key, $default = null): mixed
    {
        return static::where('key', $key)->value('value') ?? $default;
    }

    // Helper untuk set nilai setting
    public static function set(string $key, mixed $value): void
    {
        static::updateOrCreate(['key' => $key], ['value' => $value]);
    }
}