<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasAvatar;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use NotificationChannels\WebPush\HasPushSubscriptions;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements FilamentUser, HasAvatar
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    use HasRoles;
    use HasPushSubscriptions;

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

    public function getFilamentAvatarUrl(): ?string
    {
        return $this->foto ? asset('storage/' . $this->foto) : null;
    }

    public function profilGuru(): HasOne
    {
        return $this->hasOne(ProfilGuru::class, 'user_id', 'id');
    }

    public function absensi(): HasMany
    {
        return $this->hasMany(Absensi::class, 'user_id', 'id');
    }

    public function absensiHariIni(): HasOne
    {
        return $this->hasOne(Absensi::class, 'user_id', 'id')
            ->where('tanggal', today());
    }

    // Relasi dinamis untuk tanggal tertentu (dipakai di widget)
    // public function absensiPadaTanggal(string $tanggal): HasOne
    // {
    //     return $this->hasOne(Absensi::class, 'user_id', 'id')
    //         ->where('tanggal', $tanggal);
    // }

    public function absensiTanggal(): HasOne
    {
        return $this->hasOne(Absensi::class, 'user_id', 'id');
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

    public function canAccessPanel(Panel $panel): bool
    {
        return $this->hasAnyRole(['super_admin', 'admin', 'guru_staf', 'humas']);
    }

    // public function roles()
    // {
    //     return $this->belongsToMany(Role::class);
    //     // or however your roles table is structured
    // }
}