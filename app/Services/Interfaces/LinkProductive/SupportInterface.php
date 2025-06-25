<?php

namespace App\Services\Interfaces\LinkProductive;

use App\Models\Umkm;

interface SupportInterface
{
    public function storeSupport($data, Umkm $umkm);
}
