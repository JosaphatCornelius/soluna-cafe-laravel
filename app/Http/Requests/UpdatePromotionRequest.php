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
        $promotionId = $this->route('promotion')?->id;

        return [
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'alpha_dash', 'unique:promotions,slug,' . $promotionId],
            'description' => ['required', 'string'],
            'image_url' => ['nullable', 'url', 'max:255'],
            'active' => ['nullable', 'boolean'],
        ];
    }
}
