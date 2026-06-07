<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Cms\CrudController;
use App\Http\Requests\StorePromotionRequest;
use App\Http\Requests\UpdatePromotionRequest;
use App\Models\Promotion;
use App\Services\Contracts\CrudServiceInterface;
use App\Services\PromotionService;

class PromotionController extends CrudController
{
    public function __construct(protected PromotionService $promotionService)
    {
    }

    protected function service(): CrudServiceInterface
    {
        return $this->promotionService;
    }

    protected function modelClass(): string
    {
        return Promotion::class;
    }

    protected function resourceName(): string
    {
        return 'promotions';
    }

    protected function storeRequestClass(): string
    {
        return StorePromotionRequest::class;
    }

    protected function updateRequestClass(): string
    {
        return UpdatePromotionRequest::class;
    }
}
