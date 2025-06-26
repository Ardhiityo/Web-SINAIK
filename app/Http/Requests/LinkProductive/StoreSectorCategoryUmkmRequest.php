<?php

namespace App\Http\Requests\LinkProductive;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Umkm\CheckStoreSectorCategoryUmkm;

class StoreSectorCategoryUmkmRequest extends FormRequest
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
            'sector_category_id' => ['required', 'exists:sector_categories,id', new CheckStoreSectorCategoryUmkm(
                $this->route('umkm')->id,
                $this->sector_category_id,
            )]
        ];
    }
}
