<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Cms\CrudController;
use App\Http\Requests\StoreRecommendationRequest;
use App\Http\Requests\UpdateRecommendationRequest;
use App\Models\Recommendation;
use App\Services\Contracts\CrudServiceInterface;
use App\Services\RecommendationService;

class RecommendationController extends CrudController
{
    public function __construct(protected RecommendationService $recommendationService)
    {
    }

    protected function service(): CrudServiceInterface
    {
        return $this->recommendationService;
    }

    protected function modelClass(): string
    {
        return Recommendation::class;
    }

    protected function resourceName(): string
    {
        return 'recommendations';
    }

    protected function storeRequestClass(): string
    {
        return StoreRecommendationRequest::class;
    }

    protected function updateRequestClass(): string
    {
        return UpdateRecommendationRequest::class;
    }
}
