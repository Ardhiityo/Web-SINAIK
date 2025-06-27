<?php

namespace App\Services\Interfaces\LinkProductive;

interface SectorCategoryInterface
{
    public function getSectorCategories();
    public function getSectorCategoriesPaginate();
    public function storeSectorCategory(array $data);
    public function getTotalSectorCategory();
}
