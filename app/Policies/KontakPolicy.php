<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Kontak;
use Illuminate\Auth\Access\HandlesAuthorization;

class KontakPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Kontak');
    }

    public function view(AuthUser $authUser, Kontak $kontak): bool
    {
        return $authUser->can('View:Kontak');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Kontak');
    }

    public function update(AuthUser $authUser, Kontak $kontak): bool
    {
        return $authUser->can('Update:Kontak');
    }

    public function delete(AuthUser $authUser, Kontak $kontak): bool
    {
        return $authUser->can('Delete:Kontak');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:Kontak');
    }

    public function restore(AuthUser $authUser, Kontak $kontak): bool
    {
        return $authUser->can('Restore:Kontak');
    }

    public function forceDelete(AuthUser $authUser, Kontak $kontak): bool
    {
        return $authUser->can('ForceDelete:Kontak');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Kontak');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Kontak');
    }

    public function replicate(AuthUser $authUser, Kontak $kontak): bool
    {
        return $authUser->can('Replicate:Kontak');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Kontak');
    }

}