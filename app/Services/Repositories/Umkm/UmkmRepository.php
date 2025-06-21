<?php

namespace App\Services\Repositories\Umkm;

use App\Models\Biodata;
use App\Models\Umkm;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Services\Interfaces\Umkm\UmkmInterface;
use Illuminate\Contracts\Database\Eloquent\Builder;

class UmkmRepository implements UmkmInterface
{
    public function getBiodata()
    {
        $user = Auth::user();

        return Umkm::with(
            [
                'biodata' => fn(Builder $query) => $query->select(
                    'id',
                    'business_name',
                    'business_description',
                    'phone_number',
                    'city',
                    'province',
                    'address',
                    'founding_year',
                    'business_scale_id',
                    'certification_id'
                ),
                'sectorCategories' => fn(Builder $query) => $query->select(
                    'sector_categories.id',
                    'sector_categories.name'
                ),
                'businessScale' => fn(Builder $query) => $query->select(
                    'id',
                    'name'
                ),
                'certification' => fn(Builder $query) => $query->select(
                    'id',
                    'name'
                ),
            ]
        )
            ->select('id', 'biodata_id', 'umkm_status_id')
            ->where('user_id', $user->id)
            ->firstOrFail();
    }

    public function storeBiodata(array $data)
    {
        try {
            DB::beginTransaction();
            $user = Auth::user();
            $biodata = Biodata::create($data);
            $user->umkm->update([
                'biodata_id' => $biodata->id
            ]);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::info($th->getMessage(), ['store biodata']);
        }
    }
}
