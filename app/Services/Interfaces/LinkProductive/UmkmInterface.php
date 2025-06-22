<?php

namespace App\Services\Interfaces\LinkProductive;

interface UmkmInterface
{
    public function getVerifications();
    public function updateVerification($id);
}
