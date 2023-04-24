<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StaffStoreRequest extends FormRequest
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
            'name' => ['string', 'max:255'],
            'avatar' => ["nullable", 'image', "dimensions:ratio=1/1"],
            'email' => ['email', 'max:255', Rule::unique(User::class)],
            'dob' => ['date'],
            'company_id' => ['integer'],
            'phone' => ['nullable', 'integer', 'digits:10'],
            'alt_phone' => ['nullable', 'integer', 'digits:10'],
            'gender' => ['string'],
            'role' => ['integer', Rule::unique(User::class)],
            'username' => [Rule::unique(User::class), "regex:/^[a-zA-Z0-9]*$/"]
        ];
    }
}
