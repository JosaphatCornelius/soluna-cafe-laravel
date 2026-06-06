<?php

namespace App\Services;

use App\Models\Recommendation;

class RecommendationService extends BaseService
{
    protected function modelClass(): string
    {
        return Recommendation::class;
    }
}
