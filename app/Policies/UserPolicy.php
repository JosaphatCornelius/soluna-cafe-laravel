<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->isAdmin();
    }

    public function view(User $user, User $target): bool
    {
        return $user->isAdmin();
    }

    public function create(User $user): bool
    {
        return $user->isAdmin();
    }

    public function update(User $user, User $target): bool
    {
        return $user->isAdmin();
    }

    /**
     * An admin may delete other accounts but never their own, so the last
     * admin cannot lock themselves out of the CMS.
     */
    public function delete(User $user, User $target): bool
    {
        return $user->isAdmin() && $user->getKey() !== $target->getKey();
    }
}
