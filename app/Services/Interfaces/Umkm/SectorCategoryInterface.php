<?php

namespace App\Services\Interfaces\Umkm;

interface SectorCategoryInterface
{
    public function getSectorCategories();
    public function storeSectorCategory(array $data);
    public function getSectorCategoryById($id);
}
