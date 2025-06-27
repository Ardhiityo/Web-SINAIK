<?php

namespace App\Services\Repositories\LinkProductive;

use App\Models\Certification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Services\Interfaces\LinkProductive\CertificationInterface;

class CertificationRepository implements CertificationInterface
{
    public function getCertifications()
    {
        return Certification::select('id', 'name')->get();
    }

    public function getTotalCertification()
    {
        return Certification::count();
    }

    public function getCertificationsPaginate()
    {
        return Certification::select('id', 'name')->paginate(10);
    }

    public function storeCertification(array $data)
    {
        try {
            DB::beginTransaction();
            Certification::create($data);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::info($th->getMessage(), ['store certification']);
        }
    }
}
