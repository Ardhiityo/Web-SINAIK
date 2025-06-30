<?php

namespace App\Http\Controllers\LinkProductive;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\LinkProductive\StoreRoleRequest;
use App\Http\Requests\LinkProductive\UpdateRoleRequest;
use App\Services\Interfaces\LinkProductive\RoleInterface;

class RoleController extends Controller
{
    public function __construct(private RoleInterface $roleRepository) {}

    public function index()
    {
        $roles = $this->roleRepository->getRolesPaginate();

        return view('pages.link-productive.role.index', compact('roles'));
    }

    public function create()
    {
        return view('pages.link-productive.role.create');
    }

    public function store(StoreRoleRequest $request)
    {
        $this->roleRepository->storeRole($request->validated());

        return redirect()->route('link-productive.roles.index')->withSuccess('Berhasil disimpan');
    }

    public function edit($id)
    {
        $roles = $this->roleRepository->getRoles();
        $user = $this->roleRepository->getRole($id);

        return view('pages.link-productive.role.edit', compact('roles', 'user'));
    }

    public function update(UpdateRoleRequest $request, $id)
    {
        $this->roleRepository->updateRole($request->validated(), $id);

        return redirect()->route('link-productive.roles.index')->withSuccess('Berhasil diupdate');
    }

    public function destroy($id)
    {
        $this->roleRepository->getRole($id)->delete();

        return redirect()->route('link-productive.roles.index')->withSuccess('Berhasil dihapus');
    }
}
