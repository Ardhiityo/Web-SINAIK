<?php

namespace App\Services\Interfaces\LinkProductive;

use App\Models\User;

interface UserInterface
{
    public function getUmkmAccountsPaginate();
    public function storeUmkmAccount($data);
    public function updateUmkmAccount($data, User $user);
    public function getUmkmByKeyword($keyword);
}
