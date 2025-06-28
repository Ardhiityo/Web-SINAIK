<?php

namespace App\Http\Requests\LinkProductive;

use Illuminate\Foundation\Http\FormRequest;

class StoreUmkmStatusRequest extends FormRequest
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
            'name' => ['required', 'unique:umkm_statuses,name', 'min:3', 'max:255']
        ];
    }
}
