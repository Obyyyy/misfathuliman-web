<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\SlideShow;
use Illuminate\Auth\Access\HandlesAuthorization;

class SlideShowPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:SlideShow');
    }

    public function view(AuthUser $authUser, SlideShow $slideShow): bool
    {
        return $authUser->can('View:SlideShow');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:SlideShow');
    }

    public function update(AuthUser $authUser, SlideShow $slideShow): bool
    {
        return $authUser->can('Update:SlideShow');
    }

    public function delete(AuthUser $authUser, SlideShow $slideShow): bool
    {
        return $authUser->can('Delete:SlideShow');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:SlideShow');
    }

    public function restore(AuthUser $authUser, SlideShow $slideShow): bool
    {
        return $authUser->can('Restore:SlideShow');
    }

    public function forceDelete(AuthUser $authUser, SlideShow $slideShow): bool
    {
        return $authUser->can('ForceDelete:SlideShow');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:SlideShow');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:SlideShow');
    }

    public function replicate(AuthUser $authUser, SlideShow $slideShow): bool
    {
        return $authUser->can('Replicate:SlideShow');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:SlideShow');
    }

}