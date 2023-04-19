<?php

namespace App\Http\Requests;

use App\Models\Company;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CompanyUpdateRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'user_id' => ['integer'],
            'email' => ['required', 'email', 'max:255', Rule::unique(Company::class)->ignore($this->user()->company_id)],
            'phone' => ['nullable', 'integer', 'digits:10'],
            'alt_phone' => ['nullable', 'integer', 'digits:10'],
            'address' => ['required', 'string'],
            'pan' => [],
            'vat' => []
        ];
    }
}
