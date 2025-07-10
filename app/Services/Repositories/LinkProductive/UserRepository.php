<?php

namespace App\Services\Repositories\LinkProductive;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use App\Services\Interfaces\LinkProductive\UserInterface;

class UserRepository implements UserInterface
{
    public function getUmkmAccountsPaginate()
    {
        return User::role('umkm')
            ->with('umkm:id,is_verified,user_id')
            ->select('id', 'email', 'name')
            ->paginate(10);
    }

    public function storeUmkmAccount($data)
    {
        try {
            DB::beginTransaction();
            $user = User::create($data);
            $user->assignRole('umkm');
            $user->umkm()->create();
            DB::commit();
        } catch (\Throwable $th) {
            Log::info($th->getMessage(), ['store umkm account']);
        }
    }

    public function updateUmkmAccount($data, User $user)
    {
        try {
            DB::beginTransaction();
            is_null($data['password']) ? $data['password'] = $user->password : $data['password'] = Hash::make($data['password']);
            $user->update($data);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::info($th->getMessage(), ['update umkm account']);
        }
    }

    public function getUmkmByKeyword($keyword)
    {
        return User::with('umkm:id,is_verified,user_id')
            ->whereFullText('name', $keyword)
            ->select('id', 'name', 'email')
            ->paginate(10);
    }
}
