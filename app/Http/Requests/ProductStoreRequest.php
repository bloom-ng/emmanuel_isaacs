<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'image' => ['required', 'max:255', 'string'],
            'image_2' => ['nullable', 'max:255', 'string'],
            'thumbnail' => ['required', 'max:255', 'string'],
            'slug' => ['required', 'max:255', 'string'],
            'weight' => ['required', 'numeric'],
            'height' => ['required', 'numeric'],
            'length' => ['required', 'numeric'],
            'price' => ['required', 'numeric'],
            'sale_price' => ['required', 'numeric'],
            'sale_start' => ['required', 'date'],
            'sale_end' => ['required', 'date'],
            'description' => ['required', 'max:255', 'string'],
            'short_description' => ['required', 'max:255', 'string'],
            'type' => ['required', 'max:255'],
            'shipping_price' => ['required', 'numeric'],
            'download_link' => ['required', 'max:255', 'string'],
        ];
    }
}
