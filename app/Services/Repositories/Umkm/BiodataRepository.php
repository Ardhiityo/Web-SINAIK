<?php

namespace App\Services\Repositories\Umkm;

use App\Models\Biodata;
use App\Services\Interfaces\Umkm\BiodataInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Database\Eloquent\Builder;

class BiodataRepository implements BiodataInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getBiodata()
    {
        $user = Auth::user();

        return Biodata::with([
            'businessScale' => fn(Builder $query) => $query->select('id', 'name'),
            'certification' => fn(Builder $query) => $query->select('id', 'name'),
            'umkm' => fn(Builder $query) => $query->with('user:id,name', 'sectorCategories:id,name')->select('id', 'user_id')
        ])->select(
            'id',
            'business_name',
            'business_description',
            'phone_number',
            'city',
            'province',
            'address',
            'founding_year',
            'business_scale_id',
            'certification_id',
            'umkm_id'
        )
            ->where('umkm_id', $user->umkm->id)
            ->first();
    }

    public function storeBiodata(array $data, $umkmId = null)
    {
        try {
            DB::beginTransaction();
            $user = Auth::user();
            if (is_null($umkmId)) {
                $data['umkm_id'] = $user->umkm->id;
            } else {
                $data['umkm_id'] = $umkmId;
            }
            $biodata = Biodata::create($data);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::info($th->getMessage(), ['store biodata']);
        }
    }
}
