<?php

namespace App\Http\Controllers\LinkProductive;

use App\Models\Umkm;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\LinkProductive\StoreSupportRequest;
use App\Services\Interfaces\LinkProductive\UmkmInterface;
use App\Services\Interfaces\LinkProductive\SupportInterface;

class SupportController extends Controller
{
    public function __construct(
        private UmkmInterface $umkmRepository,
        private SupportInterface $supportRepository
    ) {}

    public function index()
    {
        $supports = $this->supportRepository->getSupports();

        return view('pages.link-productive.support.index', compact('supports'));
    }

    public function create()
    {
        $umkms = $this->umkmRepository->getUmkms();

        return view('pages.link-productive.support.create', compact('umkms'));
    }

    public function show(Umkm $umkm)
    {
        return view('pages.link-productive.support.show', compact('umkm'));
    }

    public function store(StoreSupportRequest $request, Umkm $umkm)
    {
        $this->supportRepository->storeSupport($request->validated(), $umkm);

        return redirect()->route('link-productive.supports.index')->withSuccess('Berhasil terkirim');
    }
}
