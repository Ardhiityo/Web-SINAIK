<?php

namespace App\Rules\LinkProductive;

use App\Models\ServiceUmkm;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CheckStoreServiceUmkm implements ValidationRule
{
    public function __construct(
        private $umkmId,
        private $serviceId
    ) {}

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $exists = ServiceUmkm::where('umkm_id', $this->umkmId)
            ->where('service_id', $this->serviceId)
            ->exists();

        if ($exists) {
            $fail('Sudah terdaftar pada layanan');
        }
    }
}
