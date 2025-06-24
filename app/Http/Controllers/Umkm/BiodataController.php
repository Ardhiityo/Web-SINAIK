<?php

namespace App\Http\Controllers\Umkm;

use App\Models\Biodata;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\Umkm\StoreBiodataRequest;
use App\Services\Interfaces\Umkm\UmkmInterface;
use App\Http\Requests\Umkm\UpdateBiodataRequest;
use App\Services\Interfaces\LinkProductive\BusinessScaleInterface;
use App\Services\Interfaces\LinkProductive\CertificationInterface;

class BiodataController extends Controller
{
    public function __construct(
        private UmkmInterface $umkmRepository,
        private BusinessScaleInterface $businessScaleRepository,
        private CertificationInterface $certificationRepository
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $biodata = $this->umkmRepository->getBiodata();

        return view('pages.umkm.biodata.index', compact('biodata'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $businessScales = $this->businessScaleRepository->getBusinessScales();
        $certifications = $this->certificationRepository->getCertifications();

        return view('pages.umkm.biodata.create', compact('businessScales', 'certifications'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBiodataRequest $request)
    {
        $this->umkmRepository->storeBiodata($request->validated());

        return redirect()->route('umkm.biodatas.index')->withSuccess('Biodata berhasil disimpan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Biodata $biodata)
    {
        $businessScales = $this->businessScaleRepository->getBusinessScales();
        $certifications = $this->certificationRepository->getCertifications();

        return view('pages.umkm.biodata.edit', compact('biodata', 'businessScales', 'certifications'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBiodataRequest $request, Biodata $biodata)
    {
        $biodata->update($request->validated());

        return redirect()->route('umkm.biodatas.index')->withSuccess('Biodata berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Biodata $biodata)
    {
        $biodata->delete();

        return redirect()->route('umkm.biodatas.index')->withSuccess('Biodata berhasil dihapus');
    }
}
