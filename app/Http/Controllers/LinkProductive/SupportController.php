<?php

namespace App\Http\Controllers\LinkProductive;

use App\Models\Umkm;
use App\Models\Support;
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

    public function show(Support $support)
    {
        $support->load(['umkm:id,user_id', 'umkm.biodata:id,business_name,umkm_id', 'umkm.user:id,name']);

        return view('pages.link-productive.support.show', compact('support'));
    }

    public function store(StoreSupportRequest $request)
    {
        $this->supportRepository->storeSupport($request->validated());

        return redirect()->route('link-productive.supports.index')->withSuccess('Berhasil terkirim');
    }
}
