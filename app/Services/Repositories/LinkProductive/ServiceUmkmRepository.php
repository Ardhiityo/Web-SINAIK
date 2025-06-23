<?php

namespace App\Services\Repositories\LinkProductive;

use App\Models\ServiceUmkm;
use App\Services\Interfaces\LinkProductive\ServiceUmkmInterface;
use Illuminate\Contracts\Database\Eloquent\Builder;

class ServiceUmkmRepository implements ServiceUmkmInterface
{
    public function getServiceUmkmsPaginate()
    {
        return ServiceUmkm::with([
            'umkm' => fn(Builder $query) => $query->with(['user:id,name', 'biodata:id,business_name,phone_number,umkm_id'])->select('id', 'user_id'),
        ])
            ->select('id', 'umkm_id', 'service_id', 'register_status')
            ->paginate(10);
    }
}
