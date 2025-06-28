<?php

namespace App\Http\Controllers\LinkProductive;

use App\Models\UmkmStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\LinkProductive\StoreUmkmStatusRequest;
use App\Http\Requests\LinkProductive\UpdateUmkmStatusRequest;
use App\Services\Interfaces\LinkProductive\UmkmStatusInterface;

class UmkmStatusController extends Controller
{
    public function __construct(private UmkmStatusInterface $umkmStatusRepository) {}

    public function index()
    {
        $umkmStatuses = $this->umkmStatusRepository->getUmkmStatuses();

        return view('pages.link-productive.umkm-status.index', compact('umkmStatuses'));
    }

    public function create()
    {
        return view('pages.link-productive.umkm-status.create');
    }

    public function store(StoreUmkmStatusRequest $request)
    {
        $this->umkmStatusRepository->storeUmkmStatus($request->validated());

        return redirect()->route('link-productive.umkm-statuses.index')->withSuccess('Berhasil disimpan');
    }

    public function edit(UmkmStatus $umkmStatus)
    {
        return view('pages.link-productive.umkm-status.edit', compact('umkmStatus'));
    }

    public function update(UpdateUmkmStatusRequest $request, UmkmStatus $umkmStatus)
    {
        $umkmStatus->update($request->validated());

        return redirect()->route('link-productive.umkm-statuses.index')->withSuccess('Berhasil diupdate');
    }

    public function destroy(UmkmStatus $umkmStatus)
    {
        $umkmStatus->delete();

        return redirect()->route('link-productive.umkm-statuses.index')->withSuccess('Berhasil dihapus');
    }
}
