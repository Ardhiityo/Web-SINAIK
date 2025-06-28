<?php

namespace App\Http\Requests\Umkm;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Umkm\CheckUpdateSectorCategoryUmkm;

class UpdateSectorCategoryUmkmRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Gate::allows('update', $this->route('sector_category_umkm'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'sector_category_id' => ['required', 'exists:sector_categories,id', new CheckUpdateSectorCategoryUmkm(
                Auth::user()->umkm->id,
                $this->sector_category_id,
                $this->route('sector_category_umkm')->id
            )]
        ];
    }
}
