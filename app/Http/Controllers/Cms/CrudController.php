<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Services\Contracts\CrudServiceInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\View\View;

/**
 * Abstract CMS resource controller implementing the Template Method pattern:
 * the seven resource actions are defined once here and delegate to small hooks
 * that each concrete controller fills in. This removes the near-identical CRUD
 * boilerplate that previously lived in every controller and is the project's
 * controller-layer demonstration of inheritance and polymorphism.
 *
 * Only full-CRUD resources extend this. Edit-only (Content) and read/delete-only
 * (ContactMessage) controllers stay bespoke so the abstraction is never forced
 * onto modules it does not fit (Liskov / Interface Segregation).
 */
abstract class CrudController extends Controller
{
    abstract protected function service(): CrudServiceInterface;

    /** Fully qualified model class, used for authorization gates. */
    abstract protected function modelClass(): string;

    /** Plural resource slug, e.g. "products" (drives view path and route names). */
    abstract protected function resourceName(): string;

    abstract protected function storeRequestClass(): string;

    abstract protected function updateRequestClass(): string;

    public function index(): View
    {
        $this->authorize('viewAny', $this->modelClass());

        return view($this->viewPath('index'), [
            $this->collectionVariable() => $this->service()->getAll(),
        ]);
    }

    public function create(): View
    {
        $this->authorize('create', $this->modelClass());

        return view($this->viewPath('create'));
    }

    public function store(): RedirectResponse
    {
        $this->authorize('create', $this->modelClass());

        $data = $this->validated($this->storeRequestClass());
        $this->service()->create($data, auth()->user());

        return $this->redirectToIndex('created');
    }

    public function show(): View
    {
        $model = $this->resolveModel();
        $this->authorize('view', $model);

        return view($this->viewPath('show'), [$this->itemVariable() => $model]);
    }

    public function edit(): View
    {
        $model = $this->resolveModel();
        $this->authorize('update', $model);

        return view($this->viewPath('edit'), [$this->itemVariable() => $model]);
    }

    public function update(): RedirectResponse
    {
        $model = $this->resolveModel();
        $this->authorize('update', $model);

        $data = $this->validated($this->updateRequestClass());
        $this->service()->update($model, $data, auth()->user());

        return $this->redirectToIndex('updated');
    }

    public function destroy(): RedirectResponse
    {
        $model = $this->resolveModel();
        $this->authorize('delete', $model);

        $this->service()->delete($model);

        return $this->redirectToIndex('deleted');
    }

    /**
     * Resolve the current route's model from its single id parameter, without
     * relying on the parameter being named to match a method argument.
     */
    protected function resolveModel(): Model
    {
        $value = request()->route($this->routeParameter());

        return $value instanceof Model ? $value : $this->service()->getById($value);
    }

    protected function routeParameter(): string
    {
        return Str::singular($this->resourceName());
    }

    /**
     * Resolve the given FormRequest through the container so its rules and
     * authorization run, then return the validated input.
     */
    protected function validated(string $requestClass): array
    {
        return app($requestClass)->validated();
    }

    protected function redirectToIndex(string $action): RedirectResponse
    {
        return redirect()
            ->route("cms.{$this->resourceName()}.index")
            ->with('success', "{$this->entityLabel()} {$action} successfully!");
    }

    protected function viewPath(string $view): string
    {
        return "cms.{$this->resourceName()}.{$view}";
    }

    protected function collectionVariable(): string
    {
        return $this->resourceName();
    }

    protected function itemVariable(): string
    {
        return Str::singular($this->resourceName());
    }

    protected function entityLabel(): string
    {
        return Str::headline(Str::singular($this->resourceName()));
    }
}
