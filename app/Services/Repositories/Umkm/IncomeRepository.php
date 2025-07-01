<?php

namespace App\Services\Repositories\Umkm;

use App\Models\Income;
use App\Services\Interfaces\Umkm\IncomeInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class IncomeRepository implements IncomeInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getIncomesPaginate()
    {
        $user = Auth::user();

        return Income::select(
            'id',
            'date',
            'total_income',
            'total_employee',
        )
            ->where('umkm_id', $user->umkm->id)
            ->paginate(10);
    }

    public function storeIncome(array $data, $umkmId = null)
    {
        try {
            DB::beginTransaction();
            $user = Auth::user();
            if (is_null($umkmId)) {
                $data['umkm_id'] = $user->umkm->id;
            } else {
                $data['umkm_id'] = $umkmId;
            }
            Income::create($data);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::info($th->getMessage(), ['store income']);
        }
    }

    public function getTotalIncomeLatestFirst()
    {
        $user = Auth::user();

        return Income::where('umkm_id', $user->umkm->id)
            ->select('id', 'total_income', 'total_employee')
            ->orderByDesc('date')
            ->first();
    }

    public function getTotalIncomeLatest()
    {
        $user = Auth::user();

        return Income::where('umkm_id', $user->umkm->id)
            ->select('id', 'total_income', 'total_employee', 'date')
            ->orderBy('date')
            ->limit(4)
            ->get();
    }
}
