<?php

namespace App\Rules\Umkm;

use Closure;
use Carbon\Carbon;
use App\Models\Umkm;
use Illuminate\Contracts\Validation\ValidationRule;

class CheckStoreIncome implements ValidationRule
{
    public function __construct(private $date, private Umkm $umkm) {}

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $date = Carbon::parse($this->date);

        $isExists = $this->umkm->incomes()->whereMonth('date', $date->month)
            ->whereYear('date', $date->year)
            ->exists();

        if ($isExists) {
            $fail('Report is already exists');
        }
    }
}
