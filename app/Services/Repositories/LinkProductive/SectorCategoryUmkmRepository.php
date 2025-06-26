<?php


namespace App\Services\Repositories\LinkProductive;

use App\Models\Umkm;
use App\Services\Interfaces\LinkProductive\SectorCategoryUmkmInterface;

class SectorCategoryUmkmRepository implements SectorCategoryUmkmInterface
{
    public function getSectorCategoriesPaginate(Umkm $umkm)
    {
        return $umkm->sectorCategories()->paginate(10);
    }
}
