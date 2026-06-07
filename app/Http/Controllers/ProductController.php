<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Cms\CrudController;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Services\Contracts\CrudServiceInterface;
use App\Services\ProductService;

class ProductController extends CrudController
{
    public function __construct(protected ProductService $productService)
    {
    }

    protected function service(): CrudServiceInterface
    {
        return $this->productService;
    }

    protected function modelClass(): string
    {
        return Product::class;
    }

    protected function resourceName(): string
    {
        return 'products';
    }

    protected function storeRequestClass(): string
    {
        return StoreProductRequest::class;
    }

    protected function updateRequestClass(): string
    {
        return UpdateProductRequest::class;
    }
}
