<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePromotionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'alpha_dash', 'unique:promotions,slug'],
            'description' => ['required', 'string'],
            'image_url' => ['nullable', 'url', 'max:255'],
            'active' => ['nullable', 'boolean'],
        ];
    }
}
