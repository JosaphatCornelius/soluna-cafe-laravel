<?php

namespace App\Policies;

use App\Models\ContactMessage;
use App\Models\User;

class ContactMessagePolicy
{
    public function viewAny(User $user): bool
    {
        return $user->isAdmin() || $user->isEditor() || $user->isUser();
    }

    public function view(User $user, ContactMessage $contactMessage): bool
    {
        return $user->isAdmin() || $user->isEditor() || $user->isUser();
    }

    public function delete(User $user, ContactMessage $contactMessage): bool
    {
        return $user->isAdmin();
    }
}
