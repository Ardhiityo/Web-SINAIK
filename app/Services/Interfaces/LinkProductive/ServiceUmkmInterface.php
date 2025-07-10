<?php

namespace App\Services\Interfaces\LinkProductive;

interface ServiceUmkmInterface
{
    public function getServiceUmkmsPaginate();
    public function storeServiceUmkm($data);
    public function checkServiceUmkm($umkmId, $serviceId);
    public function getServiceUmkmByKeyword($keyword);
}
