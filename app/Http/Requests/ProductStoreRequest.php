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
            'image' => ['required', 'max:500', 'file'],
            'image_2' => ['nullable', 'max:500', 'file'],
            'thumbnail' => ['required', 'max:500', 'file'],
            // 'slug' => ['required', 'max:255', 'string'],
            'weight' => ['required', 'numeric'],
            'height' => ['required', 'numeric'],
            'length' => ['required', 'numeric'],
            'price' => ['required', 'numeric'],
            'sale_price' => ['nullable', 'numeric'],
            'sale_start' => ['nullable', 'date'],
            'sale_end' => ['nullable', 'date'],
            'description' => ['required', 'string'],
            'short_description' => ['nullable', 'max:255', 'string'],
            'type' => ['required', 'max:255'],
            'shipping_price' => ['required', 'numeric'],
            'download_link' => ['nullable', 'max:10000', 'file'],
        ];
    }
}
