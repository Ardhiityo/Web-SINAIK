<?php

namespace App\Http\Controllers\Umkm;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Laravolt\Indonesia\IndonesiaService;
use App\Http\Requests\Umkm\StoreBiodataRequest;
use App\Services\Interfaces\Umkm\UmkmInterface;
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
        $umkm = $this->umkmRepository->getBiodata();
        Log::info(json_encode($umkm, JSON_PRETTY_PRINT));

        return view('pages.umkm.biodata.index', compact('umkm'));
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

        return redirect()->route('umkm.biodata.index')->withSuccess('Biodata berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
