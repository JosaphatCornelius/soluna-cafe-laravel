<?php

namespace App\Policies;

use App\Models\Content;
use App\Models\User;

class ContentPolicy
{
    /**
     * Determine whether the user can view any content.
     */
    public function viewAny(User $user): bool
    {
        return $user->isAdmin() || $user->isUser();
    }

    /**
     * Determine whether the user can view the content.
     */
    public function view(User $user, Content $content): bool
    {
        return $user->isAdmin() || $user->isUser();
    }

    /**
     * Determine whether the user can create content.
     */
    public function create(User $user): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can update the content.
     */
    public function update(User $user, Content $content): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can delete the content.
     */
    public function delete(User $user, Content $content): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can restore the content.
     */
    public function restore(User $user, Content $content): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can permanently delete the content.
     */
    public function forceDelete(User $user, Content $content): bool
    {
        return $user->isAdmin();
    }
}
