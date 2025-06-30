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
}
