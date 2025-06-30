<?php

namespace App\Http\Requests\Umkm;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Rules\Umkm\CheckUpdateIncome;
use Illuminate\Foundation\Http\FormRequest;

class UpdateIncomeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Gate::allows('update', $this->route('income'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'date' => [
                'required',
                'date',
                'before_or_equal:today',
                new CheckUpdateIncome($this->date, Auth::user()->umkm, $this->route('income'))
            ],
            'total_income' => 'required|numeric',
            'total_employee' => 'required|integer|min:0',
        ];
    }
}
