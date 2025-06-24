<?php

namespace App\Services\Interfaces\LinkProductive;

interface UmkmInterface
{
    public function getVerifications();
    public function updateVerification($id);
    public function getUmkmsPaginate();
    public function getUmkm($id);
    public function getUmkmPerformancePaginate($id);
    public function getUmkmProductsPaginate($id);
}
