<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\KategoriBerita;
use Illuminate\Auth\Access\HandlesAuthorization;

class KategoriBeritaPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:KategoriBerita');
    }

    public function view(AuthUser $authUser, KategoriBerita $kategoriBerita): bool
    {
        return $authUser->can('View:KategoriBerita');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:KategoriBerita');
    }

    public function update(AuthUser $authUser, KategoriBerita $kategoriBerita): bool
    {
        return $authUser->can('Update:KategoriBerita');
    }

    public function delete(AuthUser $authUser, KategoriBerita $kategoriBerita): bool
    {
        return $authUser->can('Delete:KategoriBerita');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:KategoriBerita');
    }

    public function restore(AuthUser $authUser, KategoriBerita $kategoriBerita): bool
    {
        return $authUser->can('Restore:KategoriBerita');
    }

    public function forceDelete(AuthUser $authUser, KategoriBerita $kategoriBerita): bool
    {
        return $authUser->can('ForceDelete:KategoriBerita');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:KategoriBerita');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:KategoriBerita');
    }

    public function replicate(AuthUser $authUser, KategoriBerita $kategoriBerita): bool
    {
        return $authUser->can('Replicate:KategoriBerita');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:KategoriBerita');
    }

}