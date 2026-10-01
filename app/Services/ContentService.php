<?php

namespace App\Services;

use App\Models\Content;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ContentService extends BaseService
{
    protected function modelClass(): string
    {
        return Content::class;
    }

    /**
     * Get content by slug
     */
    public function getBySlug(string $slug): Content
    {
        return Content::where('slug', $slug)->firstOrFail();
    }

    /**
     * Get content rows whose slug is in the given list, ordered to match it.
     */
    public function getBySlugs(array $slugs): Collection
    {
        if (empty($slugs)) {
            return collect();
        }

        $cases = [];
        $bindings = [];

        foreach ($slugs as $index => $slug) {
            $cases[] = "WHEN slug = ? THEN ?";
            $bindings[] = $slug;
            $bindings[] = $index;
        }

        $caseSql = "CASE " . implode(' ', $cases) . " END";

        return Content::whereIn('slug', $slugs)
            ->orderByRaw($caseSql, $bindings)
            ->get();
    }

    /**
     * Get content rows excluding the given slugs.
     */
    public function getExcludingSlugs(array $slugs): Collection
    {
        return Content::whereNotIn('slug', $slugs)
            ->orderBy($this->orderColumn, $this->orderDirection)
            ->get();
    }

    public function create(array $data, ?User $user = null): Model
    {
        $data['slug'] = $data['slug'] ?? Str::slug($data['title']);

        return parent::create($data, $user);
    }

    public function update(Model $model, array $data, ?User $user = null): Model
    {
        // The slug is a fixed page key referenced from code/routes, so it is
        // never regenerated on update — only the editable fields change.
        unset($data['slug']);

        return parent::update($model, $data, $user);
    }
}
