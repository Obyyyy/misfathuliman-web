<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'foto',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function profilGuru(): HasOne
    {
        return $this->hasOne(ProfilGuru::class);
    }

    // Helper: URL foto profil, fallback ke avatar inisial
    public function fotoUrl(): string
    {
        if ($this->foto && Storage::disk('public')->exists($this->foto)) {
            return Storage::url($this->foto);
        }
        return 'https://ui-avatars.com/api/?name=' . urlencode($this->name) . '&background=166534&color=fff';
    }

    // Hapus foto lama saat diupdate
    protected static function booted(): void
    {
        static::updating(function ($model) {
            if ($model->isDirty('foto') && $model->getOriginal('foto')) {
                Storage::disk('public')->delete($model->getOriginal('foto'));
            }
        });

        static::deleting(function ($model) {
            if ($model->foto) {
                Storage::disk('public')->delete($model->foto);
            }
        });
    }
}
