<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderStoreRequest extends FormRequest
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
            'user_id' => ['required', 'exists:users,id'],
            'contact_email' => ['required', 'max:255', 'string'],
            'contact_phone' => ['required', 'max:255', 'string'],
            'name' => ['required', 'max:255', 'string'],
            'payment_ref' => ['required', 'max:255', 'string'],
            'transaction_id' => ['required', 'max:255', 'string'],
            'address_line_1' => ['required', 'max:255', 'string'],
            'address_line_2' => ['nullable', 'max:255', 'string'],
            'state' => ['required', 'max:255', 'string'],
            'city' => ['required', 'max:255', 'string'],
            'country' => ['required', 'max:255', 'string'],
            'sub_total' => ['required', 'numeric'],
            'discount' => ['required', 'numeric'],
            'shipping_total' => ['required', 'numeric'],
            'order_status' => ['required', 'max:255'],
            'payment_status' => ['required', 'max:255'],
            'payment_response' => ['required', 'max:255', 'string'],
        ];
    }
}
