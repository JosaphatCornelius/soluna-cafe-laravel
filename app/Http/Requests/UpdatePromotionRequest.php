<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePromotionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        // The abstract CRUD controller does not bind the model, so the route
        // parameter is the raw promotion id.
        $promotionId = $this->route('promotion');

        return [
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'alpha_dash', 'unique:promotions,slug,' . $promotionId],
            'description' => ['required', 'string'],
            'tag' => ['nullable', 'string', 'max:255'],
            'cta' => ['nullable', 'string', 'max:255'],
            'image_url' => ['nullable', 'string', 'max:255'],
            'active' => ['nullable', 'boolean'],
        ];
    }
}
