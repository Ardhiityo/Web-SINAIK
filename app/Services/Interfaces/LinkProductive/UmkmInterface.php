<?php

namespace App\Services\Interfaces\LinkProductive;

interface UmkmInterface
{
    public function getVerifications();
    public function updateVerification($id);
    public function getUmkms();
    public function getUmkmsPaginate();
    public function getUmkmsByKeyword($category, $keyword);
    public function getUmkm($id);
    public function getUmkmPerformancePaginate($id);
    public function getUmkmProductsPaginate($id);
    public function getTotalUmkm();
}
