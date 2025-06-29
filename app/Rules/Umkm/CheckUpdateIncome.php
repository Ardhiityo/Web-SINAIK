<?php

namespace App\Rules\Umkm;

use App\Models\Income;
use App\Models\Umkm;
use Closure;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\ValidationRule;

class CheckUpdateIncome implements ValidationRule
{
    public function __construct(private $date, private Umkm $umkm, private Income $income) {}

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $date = Carbon::parse($this->date);

        $isExists = $this->umkm->incomes()->whereMonth('date',  $date->month)
            ->whereYear('date', $date->year)
            ->where('id', '!=', $this->income->id)
            ->exists();

        if ($isExists) {
            $fail('Report is already exists');
        }
    }
}
