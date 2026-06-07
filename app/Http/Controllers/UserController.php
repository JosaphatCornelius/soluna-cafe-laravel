<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Cms\CrudController;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Services\Contracts\CrudServiceInterface;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;

class UserController extends CrudController
{
    public function __construct(protected UserService $userService)
    {
    }

    protected function service(): CrudServiceInterface
    {
        return $this->userService;
    }

    protected function modelClass(): string
    {
        return User::class;
    }

    protected function resourceName(): string
    {
        return 'users';
    }

    protected function storeRequestClass(): string
    {
        return StoreUserRequest::class;
    }

    protected function updateRequestClass(): string
    {
        return UpdateUserRequest::class;
    }

    public function destroy(): RedirectResponse
    {
        if ($this->resolveModel()->getKey() === auth()->id()) {
            return redirect()
                ->route('cms.users.index')
                ->with('error', 'You cannot delete your own account.');
        }

        return parent::destroy();
    }
}
