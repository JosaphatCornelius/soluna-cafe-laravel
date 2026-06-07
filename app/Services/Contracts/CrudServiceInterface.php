<?php

namespace App\Services\Contracts;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Shared contract for the CMS data-management services.
 *
 * Defining the CRUD surface as an interface lets controllers depend on the
 * abstraction rather than a concrete service (Dependency Inversion), and lets
 * every concrete service be treated uniformly (Polymorphism).
 */
interface CrudServiceInterface
{
    public function getAll(): Collection;

    public function getById(int|string $id): Model;

    public function create(array $data, ?User $user = null): Model;

    public function update(Model $model, array $data, ?User $user = null): Model;

    public function delete(Model $model): bool;
}
