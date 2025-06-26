<?php


namespace App\Services\Repositories\LinkProductive;

use App\Models\Umkm;
use App\Models\SectorCategoryUmkm;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Services\Interfaces\LinkProductive\SectorCategoryUmkmInterface;

class SectorCategoryUmkmRepository implements SectorCategoryUmkmInterface
{
    public function getSectorCategoriesPaginate(Umkm $umkm)
    {
        return $umkm->sectorCategories()->paginate(10);
    }

    public function storeSectorCategory($data, $umkmId)
    {
        try {
            DB::beginTransaction();
            $data['umkm_id'] = $umkmId;
            SectorCategoryUmkm::create($data);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::info($th->getMessage(), ['store sector category umkm']);
        }
    }
}
