<?php

namespace App\Services;

use App\Models\Content;
use App\Models\User;
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
