<?php

namespace App\Services\Repositories\LinkProductive;

use App\Models\Umkm;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Services\Interfaces\LinkProductive\UmkmInterface;
use GuzzleHttp\Psr7\Query;
use Illuminate\Contracts\Database\Eloquent\Builder;

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

    public function getUmkm($id)
    {
        return Umkm::with([
            'user' => fn(Builder $query) => $query->select('id', 'name'),
            'biodata' => fn(Builder $query) => $query->with('businessScale:id,name', 'certification:id,name')
                ->select(
                    'id',
                    'business_name',
                    'umkm_id',
                    'business_description',
                    'phone_number',
                    'city',
                    'province',
                    'address',
                    'founding_year',
                    'business_scale_id',
                    'certification_id'
                )
        ])->select('id', 'user_id', 'is_verified')
            ->findOrFail($id);
    }
}
