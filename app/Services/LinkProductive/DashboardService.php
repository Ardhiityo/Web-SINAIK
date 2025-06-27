<?php

namespace App\Services\LinkProductive;

use App\Services\Interfaces\LinkProductive\CertificationInterface;
use App\Services\Interfaces\LinkProductive\SectorCategoryInterface;
use App\Services\Interfaces\LinkProductive\ServiceInterface;
use App\Services\Interfaces\LinkProductive\UmkmInterface;

class DashboardService
{
    public function __construct(
        private ServiceInterface $serviceRepository,
        private UmkmInterface $umkmRepository,
        private SectorCategoryInterface $sectorCategoryRepository,
        private CertificationInterface $certificationRepository
    ) {}

    public function getTotalPanel()
    {
        $totalService = $this->serviceRepository->getTotalService();
        $totalUmkm = $this->umkmRepository->getTotalUmkm();
        $totalSectorCategory = $this->sectorCategoryRepository->getTotalSectorCategory();
        $totalCertification = $this->certificationRepository->getTotalCertification();

        return compact('totalService', 'totalUmkm', 'totalSectorCategory', 'totalCertification');
    }
}
