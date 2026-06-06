<?php

namespace App\Services;

use App\Models\User;
use App\Services\Contracts\CrudServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Base implementation of {@see CrudServiceInterface} shared by every CMS module.
 *
 * Concrete services declare the model they manage via {@see modelClass()} and
 * inherit a complete CRUD implementation, overriding only the behaviour that is
 * unique to them (e.g. slug generation, image uploads). This is the project's
 * main demonstration of inheritance and polymorphism.
 */
abstract class BaseService implements CrudServiceInterface
{
    /** Fully qualified Eloquent model class managed by this service. */
    abstract protected function modelClass(): string;

    /** Default ordering applied by {@see getAll()}. */
    protected string $orderColumn = 'id';

    protected string $orderDirection = 'asc';

    public function getAll(): Collection
    {
        $class = $this->modelClass();

        return $class::orderBy($this->orderColumn, $this->orderDirection)->get();
    }

    public function getById(int|string $id): Model
    {
        $class = $this->modelClass();

        return $class::findOrFail($id);
    }

    public function create(array $data, ?User $user = null): Model
    {
        $class = $this->modelClass();
        $data = $this->stampAuditColumns(new $class(), $data, $user, creating: true);

        return $class::create($data);
    }

    public function update(Model $model, array $data, ?User $user = null): Model
    {
        $data = $this->stampAuditColumns($model, $data, $user, creating: false);
        $model->update($data);

        return $model;
    }

    public function delete(Model $model): bool
    {
        return (bool) $model->delete();
    }

    /**
     * Populate created_by/updated_by when the acting user is known and the
     * managed model actually exposes those columns.
     */
    protected function stampAuditColumns(Model $model, array $data, ?User $user, bool $creating): array
    {
        if (!$user) {
            return $data;
        }

        $fillable = $model->getFillable();

        if ($creating && in_array('created_by', $fillable, true)) {
            $data['created_by'] = $user->id;
        }

        if (in_array('updated_by', $fillable, true)) {
            $data['updated_by'] = $user->id;
        }

        return $data;
    }
}
