<?php

namespace App\Policies;

use App\Models\Recommendation;
use App\Models\User;

class RecommendationPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->isAdmin() || $user->isEditor();
    }

    public function view(User $user, Recommendation $recommendation): bool
    {
        return $user->isAdmin() || $user->isEditor();
    }

    public function create(User $user): bool
    {
        return $user->isAdmin() || $user->isEditor();
    }

    public function update(User $user, Recommendation $recommendation): bool
    {
        return $user->isAdmin() || $user->isEditor();
    }

    public function delete(User $user, Recommendation $recommendation): bool
    {
        return $user->isAdmin();
    }
}
