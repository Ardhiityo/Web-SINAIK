<?php

namespace App\Services\Repositories\Umkm;

use App\Models\ServiceUmkm;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Services\Interfaces\Umkm\ServiceUmkmInterface;

class ServiceUmkmRepository implements ServiceUmkmInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function registeredServiceUmkmCheck($serviceId)
    {
        $user = Auth::user();

        return ServiceUmkm::where('umkm_id', $user->umkm->id)
            ->where('service_id', $serviceId)
            ->exists();
    }

    public function destroyServiceUmkm($serviceId)
    {
        $user = Auth::user();

        try {
            DB::beginTransaction();
            $user->umkm->serviceUmkms()->detach($serviceId);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::info($th->getMessage());
        }
    }

    public function getServiceUmkmPaginate()
    {
        $user = Auth::user();

        return $user->umkm->serviceUmkms()->paginate(10);
    }


    public function storeServiceUmkm($data)
    {
        try {
            DB::beginTransaction();
            $user = Auth::user();
            $serviceUmkm = ServiceUmkm::create([
                'umkm_id' => $user->umkm->id,
                'register_status' => 'process',
                'service_id' => $data['service_id']
            ]);
            DB::commit();
            return $serviceUmkm;
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::info(json_encode($th->getMessage(), JSON_PRETTY_PRINT));
        }
    }
}
