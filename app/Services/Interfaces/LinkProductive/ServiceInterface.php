<?php

namespace App\Services\Interfaces\LinkProductive;

interface ServiceInterface
{
    public function getServicesPaginate();
    public function getServices();
    public function getServicesByKeyword($keyword);
    public function storeService(array $data);
    public function getServicesLatest();
    public function getTotalService();
}
