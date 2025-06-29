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
    public function getUmkmsByKeyword($category, $keyword)
    {
        if ($category === 'owner') {
            $umkms = Umkm::with([
                'user:id,name',
                'biodata:id,business_name,umkm_id',
                'sectorCategories:id,name',
                'umkmStatus:id,name'
            ])->select('id', 'user_id', 'is_verified', 'umkm_status_id')
                ->where('is_verified', true)
                ->whereHas('user', function ($query) use ($keyword) {
                    $query->whereFullText('name', $keyword);
                })
                ->latest()->paginate(10);
            if ($umkms->isEmpty()) {
                $umkms = Umkm::with([
                    'user:id,name',
                    'biodata:id,business_name,umkm_id',
                    'sectorCategories:id,name',
                    'umkmStatus:id,name'
                ])->select('id', 'user_id', 'is_verified', 'umkm_status_id')
                    ->where('is_verified', true)
                    ->whereHas('user', function ($query) use ($keyword) {
                        $query->whereLike('name', $keyword);
                    })
                    ->latest()->paginate(10);
            }
            return $umkms;
        } else if ($category === 'umkm') {
            $umkms = Umkm::with([
                'user:id,name',
                'biodata:id,business_name,umkm_id',
                'sectorCategories:id,name',
                'umkmStatus:id,name'
            ])->select('id', 'user_id', 'is_verified', 'umkm_status_id')
                ->where('is_verified', true)
                ->whereHas('biodata', function ($query) use ($keyword) {
                    $query->whereFullText('business_name', $keyword);
                })
                ->latest()->paginate(10);
            if ($umkms->isEmpty()) {
                $umkms = Umkm::with([
                    'user:id,name',
                    'biodata:id,business_name,umkm_id',
                    'sectorCategories:id,name',
                    'umkmStatus:id,name'
                ])->select('id', 'user_id', 'is_verified', 'umkm_status_id')
                    ->where('is_verified', true)
                    ->whereHas('biodata', function ($query) use ($keyword) {
                        $query->whereLike('business_name', $keyword);
                    })
                    ->latest()->paginate(10);
            }
            return $umkms;
        } else if ($category === 'umkm_status') {
            $umkms = Umkm::with([
                'user:id,name',
                'biodata:id,business_name,umkm_id',
                'sectorCategories:id,name',
                'umkmStatus:id,name'
            ])->select('id', 'user_id', 'is_verified', 'umkm_status_id')
                ->where('is_verified', true)
                ->whereHas('umkmStatus', function ($query) use ($keyword) {
                    $query->whereFullText('name', $keyword);
                })
                ->latest()->paginate(10);
            if ($umkms->isEmpty()) {
                $umkms = Umkm::with([
                    'user:id,name',
                    'biodata:id,business_name,umkm_id',
                    'sectorCategories:id,name',
                    'umkmStatus:id,name'
                ])->select('id', 'user_id', 'is_verified', 'umkm_status_id')
                    ->where('is_verified', true)
                    ->whereHas('umkmStatus', function ($query) use ($keyword) {
                        $query->whereLike('name', $keyword);
                    })
                    ->latest()->paginate(10);
            }
            return $umkms;
        } else if ($category === 'province') {
            $umkms = Umkm::with([
                'user:id,name',
                'biodata:id,business_name,umkm_id',
                'sectorCategories:id,name',
                'umkmStatus:id,name'
            ])->select('id', 'user_id', 'is_verified', 'umkm_status_id')
                ->where('is_verified', true)
                ->whereHas('biodata', function ($query) use ($keyword) {
                    $query->whereFullText('province', $keyword);
                })
                ->latest()->paginate(10);
            if ($umkms->isEmpty()) {
                $umkms = Umkm::with([
                    'user:id,name',
                    'biodata:id,business_name,umkm_id',
                    'sectorCategories:id,name',
                    'umkmStatus:id,name'
                ])->select('id', 'user_id', 'is_verified', 'umkm_status_id')
                    ->where('is_verified', true)
                    ->whereHas('biodata', function ($query) use ($keyword) {
                        $query->whereLike('province', $keyword);
                    })
                    ->latest()->paginate(10);
            }
            return $umkms;
        } else if ($category === 'city') {
            $umkms = Umkm::with([
                'user:id,name',
                'biodata:id,business_name,umkm_id',
                'sectorCategories:id,name',
                'umkmStatus:id,name'
            ])->select('id', 'user_id', 'is_verified', 'umkm_status_id')
                ->where('is_verified', true)
                ->whereHas('biodata', function ($query) use ($keyword) {
                    $query->whereFullText('city', $keyword);
                })
                ->latest()->paginate(10);
            if ($umkms->isEmpty()) {
                $umkms = Umkm::with([
                    'user:id,name',
                    'biodata:id,business_name,umkm_id',
                    'sectorCategories:id,name',
                    'umkmStatus:id,name'
                ])->select('id', 'user_id', 'is_verified', 'umkm_status_id')
                    ->where('is_verified', true)
                    ->whereHas('biodata', function ($query) use ($keyword) {
                        $query->whereLike('city', $keyword);
                    })
                    ->latest()->paginate(10);
            }
            return $umkms;
        }
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
