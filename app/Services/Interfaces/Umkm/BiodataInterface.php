<?php

namespace App\Services\Interfaces\Umkm;

interface BiodataInterface
{
    public function getBiodata();
    public function storeBiodata(array $data, $umkmId = null);
    public function getCities();
    public function checkBiodata($umkmId);
}
