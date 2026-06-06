<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserService extends BaseService
{
    protected function modelClass(): string
    {
        return User::class;
    }

    /**
     * @param  array<string, mixed>  $data
     */
    public function update(Model $model, array $data, ?User $user = null): Model
    {
        // Blank password field means "keep the current password".
        if (empty($data['password'])) {
            unset($data['password']);
        }

        // An admin editing their own account cannot change their own role,
        // preventing a self-demotion that would revoke their access.
        if ($user && $user->getKey() === $model->getKey()) {
            unset($data['role']);
        }

        return parent::update($model, $data, $user);
    }
}
