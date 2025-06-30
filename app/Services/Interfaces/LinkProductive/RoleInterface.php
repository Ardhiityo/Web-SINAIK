<?php

namespace App\Services\Interfaces\LinkProductive;

interface RoleInterface
{
    public function getRolesPaginate();
    public function getRoles();
    public function storeRole($data);
    public function getRole($id);
    public function updateRole($data, $id);
}
