<?php

namespace App\Services\Repositories;

use App\Models\History;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Services\Interfaces\HistoryInterface;

class HistoryRepository implements HistoryInterface
{
    public function destroyHistories()
    {
        try {
            DB::beginTransaction();
            History::where('user_id', Auth::user()->id)->delete();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::info($th->getMessage());
        }
    }
}
