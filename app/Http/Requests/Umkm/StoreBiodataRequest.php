<?php

namespace App\Http\Requests\Umkm;

use Illuminate\Foundation\Http\FormRequest;

class StoreBiodataRequest extends FormRequest
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
            'business_name' => ['required'],
            'business_description' => ['required'],
            'business_scale_id' => ['required'],
            'province' => ['required'],
            'city' => ['required'],
            'address' => ['required'],
            'phone_number' => ['required'],
            'founding_year' => ['required'],
            'certification_id' => ['required'],
        ];
    }
}
