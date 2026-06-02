<?php

namespace App\Services;

use App\Models\Recommendation;
use App\Models\User;

class RecommendationService
{
    public function getAll()
    {
        return Recommendation::orderBy('id')->get();
    }

    public function getById($id)
    {
        return Recommendation::findOrFail($id);
    }

    public function create(array $data, User $user): Recommendation
    {
        $data['created_by'] = $user->id;
        $data['updated_by'] = $user->id;

        return Recommendation::create($data);
    }

    public function update(Recommendation $recommendation, array $data, User $user): Recommendation
    {
        $data['updated_by'] = $user->id;

        $recommendation->update($data);

        return $recommendation;
    }

    public function delete(Recommendation $recommendation): bool
    {
        return $recommendation->delete();
    }
}
