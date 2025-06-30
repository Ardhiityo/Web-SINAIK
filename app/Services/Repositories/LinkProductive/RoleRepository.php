<?php

namespace App\Services\Repositories\LinkProductive;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use App\Services\Interfaces\LinkProductive\RoleInterface;

class RoleRepository implements RoleInterface
{
    public function getRolesPaginate()
    {
        return User::with('roles:id,name')->withoutRole(['umkm', 'admin_lp'])->select('id', 'name', 'email')->paginate(10);
    }

    public function getRoles()
    {
        return User::with('roles:id,name')->withoutRole('umkm')->select('id', 'name', 'email')->get();
    }

    public function updateRole($data, $id)
    {
        try {
            DB::beginTransaction();

            $user = $this->getRole($id);

            is_null($data['password']) ? $data['password'] = $user->password : $data['password'] = Hash::make($data['password']);

            $user->removeRole($user->roles->pluck('name')->first());

            $user->update($data);

            $user->assignRole($data['role']);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::info($th->getMessage(), ['update role']);
        }
    }

    public function getRole($id)
    {
        return User::with('roles:id,name')->select('id', 'name', 'email', 'password')->findOrFail($id);
    }

    public function storeRole($data)
    {
        try {
            DB::beginTransaction();
            User::create($data)->assignRole($data['role']);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::info($th->getMessage(), ['store role']);
        }
    }
}
