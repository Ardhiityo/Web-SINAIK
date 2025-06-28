<?php

namespace App\Services\Repositories\LinkProductive;

use App\Models\UmkmStatus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Services\Interfaces\LinkProductive\UmkmStatusInterface;

class UmkmStatusRepository implements UmkmStatusInterface
{
    public function getUmkmStatuses()
    {
        return UmkmStatus::select('id', 'name')->paginate(10);
    }

    public function storeUmkmStatus($data)
    {
        try {
            DB::beginTransaction();
            UmkmStatus::create($data);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::info($th->getMessage());
        }
    }
}
