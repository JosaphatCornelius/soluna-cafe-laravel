<?php

namespace App\Services;

use App\Models\Content;
use App\Models\User;
use Illuminate\Support\Str;

class ContentService
{
    /**
     * Get all content
     */
    public function getAll()
    {
        return Content::all();
    }

    /**
     * Get content by ID
     */
    public function getById($id)
    {
        return Content::findOrFail($id);
    }

    /**
     * Get content by slug
     */
    public function getBySlug($slug)
    {
        return Content::where('slug', $slug)->firstOrFail();
    }

    /**
     * Create new content
     */
    public function create(array $data, User $user): Content
    {
        $data['slug'] = $data['slug'] ?? Str::slug($data['title']);
        $data['created_by'] = $user->id;
        $data['updated_by'] = $user->id;

        return Content::create($data);
    }

    /**
     * Update content
     */
    public function update(Content $content, array $data, User $user): Content
    {
        $data['slug'] = $data['slug'] ?? Str::slug($data['title']);
        $data['updated_by'] = $user->id;

        $content->update($data);

        return $content;
    }

    /**
     * Delete content
     */
    public function delete(Content $content): bool
    {
        return $content->delete();
    }
}
