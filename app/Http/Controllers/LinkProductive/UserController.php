<?php

namespace App\Http\Controllers\LinkProductive;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\LinkProductive\StoreUserRequest;
use App\Http\Requests\LinkProductive\UpdateUserRequest;
use App\Services\Interfaces\LinkProductive\UserInterface;

class UserController extends Controller
{
    public function __construct(private UserInterface $userRepository) {}

    public function index()
    {
        $users = $this->userRepository->getUmkmAccountsPaginate();

        return view('pages.link-productive.umkm.user.index', compact('users'));
    }

    public function create()
    {
        return view('pages.link-productive.umkm.user.create');
    }

    public function store(StoreUserRequest $request)
    {
        $this->userRepository->storeUmkmAccount($request->validated());

        return redirect()->route('link-productive.users.index')->withSuccess('Berhasil disimpan');
    }

    public function edit(User $user)
    {
        return view('pages.link-productive.umkm.user.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $this->userRepository->updateUmkmAccount($request->validated(), $user);

        return redirect()->route('link-productive.users.index')->withSuccess('Berhasil diupdate');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('link-productive.users.index')->withSuccess('Berhasil dihapus');
    }
}
