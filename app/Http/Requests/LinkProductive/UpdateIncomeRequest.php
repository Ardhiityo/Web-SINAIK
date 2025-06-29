<?php

namespace App\Http\Requests\LinkProductive;

use App\Rules\Umkm\CheckUpdateIncome;
use Illuminate\Foundation\Http\FormRequest;

class UpdateIncomeRequest extends FormRequest
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
            'date' => ['required', 'date', new CheckUpdateIncome($this->date, $this->route('umkm'), $this->route('income'))],
            'total_income' => ['required', 'integer'],
            'total_employee' => ['required', 'integer', 'min:0'],
        ];
    }
}
