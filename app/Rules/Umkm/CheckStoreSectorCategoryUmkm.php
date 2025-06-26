<?php

namespace App\Rules\Umkm;

use Closure;
use App\Models\SectorCategoryUmkm;
use Illuminate\Contracts\Validation\ValidationRule;

class CheckStoreSectorCategoryUmkm implements ValidationRule
{
    public function __construct(private $umkmId, private $sectorCategoryId) {}

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $alreadyExists = SectorCategoryUmkm::where('umkm_id', $this->umkmId)
            ->where('sector_category_id', $this->sectorCategoryId)
            ->exists();

        if ($alreadyExists) {
            $fail('Sector category is already exists');
        }
    }
}
