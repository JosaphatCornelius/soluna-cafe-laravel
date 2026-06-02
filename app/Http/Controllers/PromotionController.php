<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePromotionRequest;
use App\Http\Requests\UpdatePromotionRequest;
use App\Models\Promotion;
use App\Services\PromotionService;

class PromotionController extends Controller
{
    protected PromotionService $promotionService;

    public function __construct(PromotionService $promotionService)
    {
        $this->promotionService = $promotionService;
    }

    public function index()
    {
        $this->authorize('viewAny', Promotion::class);

        $promotions = $this->promotionService->getAll();

        return view('cms.promotions.index', ['promotions' => $promotions]);
    }

    public function create()
    {
        $this->authorize('create', Promotion::class);

        return view('cms.promotions.create');
    }

    public function store(StorePromotionRequest $request)
    {
        $this->authorize('create', Promotion::class);

        $this->promotionService->create($request->validated(), auth()->user());

        return redirect()->route('cms.promotions.index')->with('success', 'Promotion created successfully!');
    }

    public function show(Promotion $promotion)
    {
        $this->authorize('view', $promotion);

        return view('cms.promotions.show', ['promotion' => $promotion]);
    }

    public function edit(Promotion $promotion)
    {
        $this->authorize('update', $promotion);

        return view('cms.promotions.edit', ['promotion' => $promotion]);
    }

    public function update(UpdatePromotionRequest $request, Promotion $promotion)
    {
        $this->authorize('update', $promotion);

        $this->promotionService->update($promotion, $request->validated(), auth()->user());

        return redirect()->route('cms.promotions.index')->with('success', 'Promotion updated successfully!');
    }

    public function destroy(Promotion $promotion)
    {
        $this->authorize('delete', $promotion);

        $this->promotionService->delete($promotion);

        return redirect()->route('cms.promotions.index')->with('success', 'Promotion deleted successfully!');
    }
}
