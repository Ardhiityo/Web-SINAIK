<?php

namespace App\Services\Interfaces\LinkProductive;

interface BusinessScaleInterface
{
    public function getBusinessScales();
    public function getBusinessScalesPaginate();
    public function storeBusinessScale(array $data);
}
