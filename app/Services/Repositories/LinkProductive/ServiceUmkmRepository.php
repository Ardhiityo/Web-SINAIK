<?php

namespace App\Services\Repositories\LinkProductive;

use App\Models\ServiceUmkm;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\Database\Eloquent\Builder;
use App\Services\Interfaces\LinkProductive\ServiceUmkmInterface;

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

    public function storeServiceUmkm($data)
    {
        try {
            DB::beginTransaction();
            ServiceUmkm::create($data);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::info($th->getMessage(), ['store service umkm']);
        }
    }

    public function getServiceUmkmByKeyword($keyword)
    {
        return ServiceUmkm::with([
            'umkm:id,user_id,umkm_status_id',
            'umkm.biodata:id,umkm_id,business_name,phone_number',
            'umkm.user:id,name',
            'umkm.umkmStatus:id,name'
        ])->whereHas('umkm', function ($query) use ($keyword) {
            $query->whereHas('biodata', function ($query) use ($keyword) {
                $query->whereFullText('business_name', $keyword);
            });
        })->select('id', 'umkm_id', 'service_id')->paginate(10);
    }

    public function checkServiceUmkm($umkmId, $serviceId)
    {
        return ServiceUmkm::where('umkm_id', $umkmId)
            ->where('service_id', $serviceId)
            ->exists();
    }
}
