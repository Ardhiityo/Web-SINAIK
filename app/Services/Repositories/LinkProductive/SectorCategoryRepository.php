<?php

namespace App\Services\Repositories\LinkProductive;

use App\Models\SectorCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Services\Interfaces\LinkProductive\SectorCategoryInterface;

class SectorCategoryRepository implements SectorCategoryInterface
{
    public function getSectorCategories()
    {
        return SectorCategory::select('id', 'name')->get();
    }

    public function getSectorCategoriesPaginate()
    {
        return SectorCategory::select('id', 'name')->paginate(10);
    }

    public function storeSectorCategory(array $data)
    {
        try {
            DB::beginTransaction();
            SectorCategory::create($data);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::info($th->getMessage(), ['create sector category']);
        }
    }

    public function getTotalSectorCategory()
    {
        return SectorCategory::count();
    }
}
