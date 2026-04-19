<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\KerjaSama;
use Illuminate\Auth\Access\HandlesAuthorization;

class KerjaSamaPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:KerjaSama');
    }

    public function view(AuthUser $authUser, KerjaSama $kerjaSama): bool
    {
        return $authUser->can('View:KerjaSama');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:KerjaSama');
    }

    public function update(AuthUser $authUser, KerjaSama $kerjaSama): bool
    {
        return $authUser->can('Update:KerjaSama');
    }

    public function delete(AuthUser $authUser, KerjaSama $kerjaSama): bool
    {
        return $authUser->can('Delete:KerjaSama');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:KerjaSama');
    }

    public function restore(AuthUser $authUser, KerjaSama $kerjaSama): bool
    {
        return $authUser->can('Restore:KerjaSama');
    }

    public function forceDelete(AuthUser $authUser, KerjaSama $kerjaSama): bool
    {
        return $authUser->can('ForceDelete:KerjaSama');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:KerjaSama');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:KerjaSama');
    }

    public function replicate(AuthUser $authUser, KerjaSama $kerjaSama): bool
    {
        return $authUser->can('Replicate:KerjaSama');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:KerjaSama');
    }

}