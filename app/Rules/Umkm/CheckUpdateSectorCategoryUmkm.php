<?php

namespace App\Rules\Umkm;

use Closure;
use App\Models\SectorCategoryUmkm;
use Illuminate\Contracts\Validation\ValidationRule;

class CheckUpdateSectorCategoryUmkm implements ValidationRule
{
    public function __construct(private $umkmId, private $sectorCategoryId, private $sectorCategoryUmkmId) {}

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $alreadyExists = SectorCategoryUmkm::where('umkm_id', $this->umkmId)
            ->where('sector_category_id', $this->sectorCategoryId)
            ->where('id', '!=', $this->sectorCategoryUmkmId)
            ->exists();

        if ($alreadyExists) {
            $fail('Sector category is already exists');
        }
    }
}
