<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Display a listing of products.
     */
    public function index()
    {
        $this->authorize('viewAny', Product::class);

        $products = $this->productService->getAll();

        return view('cms.products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        $this->authorize('create', Product::class);

        return view('cms.products.create');
    }

    /**
     * Store a newly created product in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $this->authorize('create', Product::class);

        $this->productService->create($request->validated(), auth()->user());

        return redirect()->route('cms.products.index')->with('success', 'Product created successfully!');
    }

    /**
     * Display the specified product.
     */
    public function show(Product $product)
    {
        $this->authorize('view', $product);

        return view('cms.products.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified product.
     */
    public function edit(Product $product)
    {
        $this->authorize('update', $product);

        return view('cms.products.edit', ['product' => $product]);
    }

    /**
     * Update the specified product in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $this->authorize('update', $product);

        $this->productService->update($product, $request->validated(), auth()->user());

        return redirect()->route('cms.products.index')->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified product from storage.
     */
    public function destroy(Product $product)
    {
        $this->authorize('delete', $product);

        $this->productService->delete($product);

        return redirect()->route('cms.products.index')->with('success', 'Product deleted successfully!');
    }
}
