<?php

namespace App\Services;

use App\Models\Promotion;

class PromotionService extends BaseService
{
    protected string $orderColumn = 'created_at';

    protected string $orderDirection = 'desc';

    protected function modelClass(): string
    {
        return Promotion::class;
    }
}
