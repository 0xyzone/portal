<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => ['required'],
            'customer_name' => ['required', 'string', 'max:255'],
            'customer_email' => ['email', 'nullable'],
            'customer_address' => ['required', 'string'],
            'in_out' => ['required', 'string'],
            'phone' => ['required', 'integer', 'digits:10'],
            'alt_phone' => ['integer', 'digits:10'],
            'order_status' => ['required', 'string'],
            'note' => ['string', 'nullable']
        ];
    }
}
