<?php

namespace App\Http\Requests\Umkm;

use App\Models\Biodata;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateBiodataRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Gate::allows('update', $this->route('biodata'));
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
            'business_scale_id' => ['required', 'exists:business_scales,id'],
            'province' => ['required'],
            'city' => ['required'],
            'address' => ['required'],
            'phone_number' => ['required', 'min_digits:10'],
            'founding_year' => ['required'],
            'certification_id' => ['required', 'exists:certifications,id']
        ];
    }
}
