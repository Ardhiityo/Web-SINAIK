<?php

namespace App\Services\Repositories\LinkProductive;

use App\Models\Umkm;
use App\Models\Support;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Jobs\LinkProductive\SendSupportMessage;
use App\Services\Interfaces\LinkProductive\SupportInterface;
use Illuminate\Contracts\Database\Eloquent\Builder;

class SupportRepository implements SupportInterface
{
    public function getSupports()
    {
        return Support::with([
            'umkm' => fn(Builder $query) => $query->with('biodata:id,business_name,umkm_id', 'user:id,name')->select('id', 'user_id')
        ])
            ->select('id', 'subject', 'message', 'umkm_id')->paginate(10);
    }

    public function storeSupport($data, Umkm $umkm)
    {
        try {
            DB::beginTransaction();
            $support = $umkm->supports()->create($data);
            SendSupportMessage::dispatch($support->subject, $support->message, $umkm->user->name, $umkm->user->email);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::info($th->getMessage(), ['store support']);
        }
    }
}
