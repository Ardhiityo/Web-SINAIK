<?php

namespace App\Services\Repositories\Umkm;

use App\Models\SectorCategoryUmkm;
use App\Services\Interfaces\Umkm\SectorCategoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class SectorCategoryRepository implements SectorCategoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getSectorCategories()
    {
        $user = Auth::user();

        return $user->umkm->sectorCategories()->paginate(10);
    }

    public function storeSectorCategory(array $data)
    {
        try {
            DB::beginTransaction();
            $user = Auth::user();
            $data['umkm_id'] = $user->umkm->id;
            SectorCategoryUmkm::create($data);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::info($th->getMessage(), ['store sector category']);
        }
    }

    public function getSectorCategoryById($id)
    {
        $user = Auth::user();

        return $user->umkm
            ->sectorCategories()
            ->where('sector_categories.id', $id)
            ->firstOrFail();
    }
}
