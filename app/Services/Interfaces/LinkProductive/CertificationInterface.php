<?php

namespace App\Services\Interfaces\LinkProductive;

interface CertificationInterface
{
    public function getCertifications();
    public function getCertificationsPaginate();
    public function storeCertification(array $data);
}
