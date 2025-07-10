<?php

namespace App\Http\Requests;

use App\Rules\LinkProductive\CheckStoreServiceUmkm;
use Illuminate\Foundation\Http\FormRequest;

class StoreServiceUmkmRequest extends FormRequest
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
            'umkm_id' => [
                'required',
                'exists:umkms,id',
                new CheckStoreServiceUmkm($this->umkm_id, $this->service_id)
            ],
            'service_id' => ['required', 'exists:services,id']
        ];
    }
}
