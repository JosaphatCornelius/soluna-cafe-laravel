<?php

namespace App\Services;

use App\Models\Promotion;
use App\Models\User;

class PromotionService
{
    public function getAll()
    {
        return Promotion::orderByDesc('created_at')->get();
    }

    public function getById($id)
    {
        return Promotion::findOrFail($id);
    }

    public function create(array $data, User $user): Promotion
    {
        $data['created_by'] = $user->id;
        $data['updated_by'] = $user->id;

        return Promotion::create($data);
    }

    public function update(Promotion $promotion, array $data, User $user): Promotion
    {
        $data['updated_by'] = $user->id;

        $promotion->update($data);

        return $promotion;
    }

    public function delete(Promotion $promotion): bool
    {
        return $promotion->delete();
    }
}
