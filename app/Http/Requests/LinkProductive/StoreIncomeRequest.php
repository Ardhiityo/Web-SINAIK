<?php

namespace App\Http\Requests\LinkProductive;

use App\Rules\Umkm\CheckStoreIncome;
use Illuminate\Foundation\Http\FormRequest;

class StoreIncomeRequest extends FormRequest
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
            'date' => ['required', 'date', new CheckStoreIncome($this->date, $this->route('umkm')), 'before_or_equal:today'],
            'total_income' => 'required|integer',
            'total_employee' => 'required|integer|min:0',
        ];
    }
}
