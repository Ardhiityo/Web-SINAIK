<?php

namespace App\Http\Requests\LinkProductive;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
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
            'title' => ['required', 'string', 'min:3', 'max:255', 'unique:services,title'],
            'description' => ['required', 'string', 'max:255'],
            'available_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
            'service_category_id' => ['required', 'exists:service_categories,id'],
        ];
    }
}
