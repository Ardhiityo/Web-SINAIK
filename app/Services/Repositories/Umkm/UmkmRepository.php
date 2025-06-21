<?php

namespace App\Services\Repositories\Umkm;

use App\Models\Umkm;
use App\Services\Interfaces\Umkm\UmkmInterface;
use Illuminate\Support\Facades\Auth;
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
                )
            ]
        )
            ->select('id', 'biodata_id', 'umkm_status_id')
            ->where('user_id', $user->id)
            ->firstOrFail();
    }
}
