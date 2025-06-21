<?php

namespace App\Services\Interfaces\Umkm;

interface UmkmInterface
{
    public function getBiodata();
    public function storeBiodata(array $data);
}
