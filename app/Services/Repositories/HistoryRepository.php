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
            Log::info($th->getMessage(), ['destory histories']);
        }
    }

    public function storeHistory($keyword)
    {
        try {
            DB::beginTransaction();
            $user = Auth::user();
            $isExists = History::where('user_id', $user->id)->where('keyword', $keyword)->exists();
            if (!$isExists) {
                History::create([
                    'user_id' => $user->id,
                    'keyword' => $keyword
                ]);
            }
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::info($th->getMessage(), ['store history']);
        }
    }

    public function getHistories()
    {
        return History::where('user_id', Auth::user()->id)
            ->select('id', 'keyword')
            ->limit(3)
            ->get();
    }
}
