<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'max:255'],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'dob' => ['date'],
            'company_id' => ['integer'],
            'phone' => ['number', 'max:10'],
            'alt-phone' => ['number', 'max:10'],
            'gender' => ['string'],
            'role' => ['integer', Rule::unique(User::class)->ignore($this->user()->id)],
            'username' => [Rule::unique(User::class)->ignore($this->user()->id)]
        ];
    }
}
