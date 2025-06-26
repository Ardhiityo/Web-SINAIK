<?php

namespace App\Services\Repositories\LinkProductive;

use App\Models\Umkm;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Jobs\LinkProductive\SendSupportMessage;
use App\Services\Interfaces\LinkProductive\SupportInterface;

class SupportRepository implements SupportInterface
{
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
