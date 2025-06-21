<?php

namespace App\Services\Repositories\LinkProductive;

use App\Models\Certification;
use App\Services\Interfaces\LinkProductive\CertificationInterface;

class CertificationRepository implements CertificationInterface
{
    public function getCertifications()
    {
        return Certification::select('id', 'name')->get();
    }
}
