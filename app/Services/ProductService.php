<?php

namespace App\Services;

use App\Models\Product;
use App\Models\User;

class ProductService
{
    /**
     * Get all products
     */
    public function getAll()
    {
        return Product::all();
    }

    /**
     * Get product by ID
     */
    public function getById($id)
    {
        return Product::findOrFail($id);
    }

    /**
     * Create new product
     */
    public function create(array $data, User $user): Product
    {
        $data['created_by'] = $user->id;
        $data['updated_by'] = $user->id;

        return Product::create($data);
    }

    /**
     * Update product
     */
    public function update(Product $product, array $data, User $user): Product
    {
        $data['updated_by'] = $user->id;

        $product->update($data);

        return $product;
    }

    /**
     * Delete product
     */
    public function delete(Product $product): bool
    {
        return $product->delete();
    }
}
