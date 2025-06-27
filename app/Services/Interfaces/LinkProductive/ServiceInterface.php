<?php

namespace App\Services\Interfaces\LinkProductive;

interface ServiceInterface
{
    public function getServicesPaginate();
    public function storeService(array $data);
    public function getServicesLatest();
}
