<?php

namespace App\Services\Repositories\LinkProductive;

use App\Models\SectorCategory;
use App\Services\Interfaces\LinkProductive\SectorCategoryInterface;

class SectorCategoryRepository implements SectorCategoryInterface
{
    public function getSectorCategories()
    {
        return SectorCategory::select('id', 'name')->get();
    }
}
