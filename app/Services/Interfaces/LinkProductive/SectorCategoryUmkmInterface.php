<?php

namespace App\Services\Interfaces\LinkProductive;

use App\Models\Umkm;

interface SectorCategoryUmkmInterface
{
    public function getSectorCategoriesPaginate(Umkm $umkm);
}
