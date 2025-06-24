<?php

namespace App\Services\Interfaces\Umkm;

interface ServiceUmkmInterface
{
    public function storeServiceUmkm(array $data);
    public function registeredServiceUmkmCheck($serviceId);
    public function destroyServiceUmkm($serviceId);
    public function getServiceUmkmPaginate();
}
