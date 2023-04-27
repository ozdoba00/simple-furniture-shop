<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferCategoryRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'root_id' => 'required',
            'name' => 'required',
            'symbol' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'root_id' => 'The root id is required',
            'name.required' => 'The name of category is required',
            'symbol.required' => 'The symbol of category is required'
        ];
    }
}
