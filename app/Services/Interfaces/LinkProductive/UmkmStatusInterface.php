<?php

namespace App\Services\Interfaces\LinkProductive;

interface UmkmStatusInterface
{
    public function getUmkmStatusesPaginate();
    public function getUmkmStatuses();
    public function storeUmkmStatus($data);
}
