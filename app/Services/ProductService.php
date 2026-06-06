<?php

namespace App\Services;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ProductService extends BaseService
{
    protected function modelClass(): string
    {
        return Product::class;
    }

    public function create(array $data, ?User $user = null): Model
    {
        $data = $this->handleImageUpload($data);

        return parent::create($data, $user);
    }

    public function update(Model $model, array $data, ?User $user = null): Model
    {
        $data = $this->handleImageUpload($data, $model);

        return parent::update($model, $data, $user);
    }

    /**
     * Store an uploaded image on the public disk and expose it as a path that
     * the front-end's asset() helper can resolve. Falls back to the optional
     * image_url text field when no file is provided.
     */
    protected function handleImageUpload(array $data, ?Product $existing = null): array
    {
        $file = $data['image'] ?? null;
        unset($data['image']);

        if ($file instanceof UploadedFile) {
            if ($existing && $existing->image_url && str_starts_with($existing->image_url, 'storage/')) {
                Storage::disk('public')->delete(substr($existing->image_url, strlen('storage/')));
            }

            $path = $file->store('products', 'public');
            $data['image_url'] = 'storage/' . $path;
        } elseif (array_key_exists('image_url', $data) && $data['image_url'] === null) {
            unset($data['image_url']);
        }

        return $data;
    }
}
