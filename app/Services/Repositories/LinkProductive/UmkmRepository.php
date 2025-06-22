<?php

namespace App\Services\Repositories\LinkProductive;

use App\Models\Umkm;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Services\Interfaces\LinkProductive\UmkmInterface;

class UmkmRepository implements UmkmInterface
{
    public function getVerifications()
    {
        return Umkm::with([
            'user:id,name',
            'biodata:id,business_name,umkm_id'
        ])->select('id', 'user_id', 'is_verified')->latest()->paginate(10);
    }

    public function updateVerification($id)
    {
        try {
            DB::beginTransaction();
            $umkm = Umkm::findOrFail($id);
            $umkm->is_verified = !$umkm->is_verified;
            $umkm->save();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::info($th->getMessage(), ['update verification umkm']);
        }
    }

    public function getUmkmsPaginate()
    {
        return Umkm::with([
            'user:id,name',
            'biodata:id,business_name,umkm_id,address'
        ])->select('id', 'user_id', 'is_verified')->latest()->paginate(10);
    }
}
