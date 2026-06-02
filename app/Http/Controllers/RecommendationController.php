<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRecommendationRequest;
use App\Http\Requests\UpdateRecommendationRequest;
use App\Models\Recommendation;
use App\Services\RecommendationService;

class RecommendationController extends Controller
{
    protected RecommendationService $recommendationService;

    public function __construct(RecommendationService $recommendationService)
    {
        $this->recommendationService = $recommendationService;
    }

    public function index()
    {
        $this->authorize('viewAny', Recommendation::class);

        $recommendations = $this->recommendationService->getAll();

        return view('cms.recommendations.index', ['recommendations' => $recommendations]);
    }

    public function create()
    {
        $this->authorize('create', Recommendation::class);

        return view('cms.recommendations.create');
    }

    public function store(StoreRecommendationRequest $request)
    {
        $this->authorize('create', Recommendation::class);

        $this->recommendationService->create($request->validated(), auth()->user());

        return redirect()->route('cms.recommendations.index')->with('success', 'Recommendation created successfully!');
    }

    public function edit(Recommendation $recommendation)
    {
        $this->authorize('update', $recommendation);

        return view('cms.recommendations.edit', ['recommendation' => $recommendation]);
    }

    public function update(UpdateRecommendationRequest $request, Recommendation $recommendation)
    {
        $this->authorize('update', $recommendation);

        $this->recommendationService->update($recommendation, $request->validated(), auth()->user());

        return redirect()->route('cms.recommendations.index')->with('success', 'Recommendation updated successfully!');
    }

    public function destroy(Recommendation $recommendation)
    {
        $this->authorize('delete', $recommendation);

        $this->recommendationService->delete($recommendation);

        return redirect()->route('cms.recommendations.index')->with('success', 'Recommendation deleted successfully!');
    }
}
