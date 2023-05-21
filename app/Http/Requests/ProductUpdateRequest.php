<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'max:255', 'string'],
            'category_id' => ['required', 'max:255'],
            'quantity' => ['required', 'numeric'],
            'image' => ['sometimes', 'max:255', 'string'],
            'image_2' => ['nullable', 'max:255', 'string'],
            'thumbnail' => ['sometimes', 'max:255', 'string'],
            // 'slug' => ['required', 'max:255', 'string'],
            'weight' => ['required', 'numeric'],
            'height' => ['required', 'numeric'],
            'length' => ['required', 'numeric'],
            'price' => ['required', 'numeric'],
            'sale_price' => ['nullable', 'numeric'],
            'sale_start' => ['nullable', 'date'],
            'sale_end' => ['nullable', 'date'],
            'description' => ['required', 'max:255', 'string'],
            'short_description' => ['required', 'max:255', 'string'],
            'type' => ['required', 'max:255'],
            'shipping_price' => ['nullable', 'numeric'],
            'download_link' => ['nullable', 'max:255', 'string'],
        ];
    }
}
