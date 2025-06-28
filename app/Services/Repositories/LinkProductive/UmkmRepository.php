<?php

namespace App\Services\Repositories\LinkProductive;

use App\Models\Umkm;
use App\Models\Income;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\Database\Eloquent\Builder;
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

    public function getUmkms()
    {
        return Umkm::with([
            'user' => fn(Builder $query) => $query->select('id', 'name'),
            'biodata' => fn(Builder $query) => $query->select('id', 'umkm_id', 'business_name'),
        ])->select('id', 'user_id')->get();
    }

    public function getUmkmsPaginate()
    {
        return Umkm::with([
            'user:id,name',
            'biodata:id,business_name,umkm_id',
            'sectorCategories:id,name',
            'umkmStatus:id,name'
        ])->select('id', 'user_id', 'is_verified', 'umkm_status_id')
            ->where('is_verified', true)
            ->latest()->paginate(10);
    }

    public function getUmkm($id)
    {
        return Umkm::with([
            'user' => fn(Builder $query) => $query->select('id', 'name'),
            'umkmStatus' => fn(Builder $query) => $query->select('id', 'name'),
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
        ])->select('id', 'user_id', 'is_verified', 'umkm_status_id')
            ->findOrFail($id);
    }

    public function getUmkmPerformancePaginate($id)
    {
        return Income::select('id', 'date', 'total_employee', 'total_income', 'umkm_id')->where('umkm_id', $id)
            ->paginate(10);
    }

    public function getUmkmProductsPaginate($id)
    {
        return Product::select('id', 'image', 'name', 'price', 'description', 'umkm_id')
            ->where('umkm_id', $id)
            ->paginate(10);
    }

    public function getTotalUmkm()
    {
        return Umkm::where('is_verified', true)->count();
    }
}
