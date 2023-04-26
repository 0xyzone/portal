<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StaffUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->role === 1;
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
            'address' => ['string'],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'dob' => ['date'],
            'phone' => ['nullable', 'integer', 'digits:10'],
            'alt_phone' => ['nullable', 'integer', 'digits:10'],
            'gender' => ['string'],
            'role' => ['integer'],
            'username' => [Rule::unique(User::class)->ignore($this->user()->id), "regex:/^[a-zA-Z0-9]*$/"]
        ];
    }
}
