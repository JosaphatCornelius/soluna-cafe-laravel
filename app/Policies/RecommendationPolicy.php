<?php

namespace App\Policies;

use App\Models\Recommendation;
use App\Models\User;

class RecommendationPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->isAdmin() || $user->isUser();
    }

    public function view(User $user, Recommendation $recommendation): bool
    {
        return $user->isAdmin() || $user->isUser();
    }

    public function create(User $user): bool
    {
        return $user->isAdmin();
    }

    public function update(User $user, Recommendation $recommendation): bool
    {
        return $user->isAdmin();
    }

    public function delete(User $user, Recommendation $recommendation): bool
    {
        return $user->isAdmin();
    }
}
