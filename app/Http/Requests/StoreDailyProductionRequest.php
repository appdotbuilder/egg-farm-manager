<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDailyProductionRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'production_date' => 'required|date|unique:daily_productions,production_date',
            'total_eggs' => 'required|integer|min:0',
            'good_eggs' => 'required|integer|min:0|lte:total_eggs',
            'broken_eggs' => 'integer|min:0',
            'small_eggs' => 'integer|min:0',
            'mortality_count' => 'integer|min:0',
            'notes' => 'nullable|string|max:1000',
        ];
    }

    /**
     * Get custom error messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'production_date.required' => 'Production date is required.',
            'production_date.unique' => 'A production record for this date already exists.',
            'total_eggs.required' => 'Total eggs count is required.',
            'good_eggs.lte' => 'Good eggs cannot exceed total eggs.',
        ];
    }
}