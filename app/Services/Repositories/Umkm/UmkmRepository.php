<?php

namespace App\Services\Repositories\Umkm;

use App\Models\Umkm;
use App\Services\Interfaces\Umkm\UmkmInterface;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Contracts\Database\Query\Builder as QueryBuilder;

class UmkmRepository implements UmkmInterface
{
    public function getUmkmsPaginate()
    {
        return Umkm::with([
            'user' => fn(Builder $query) => $query->select('id', 'name'),
            'biodata' => fn(QueryBuilder $query) => $query->select('id', 'business_name', 'umkm_id', 'address'),
            'sectorCategories' => fn(Builder $query) => $query->select('sector_categories.id', 'name')
        ])
            ->select('id', 'user_id')
            ->where('is_verified', true)->paginate(10);
    }
}
