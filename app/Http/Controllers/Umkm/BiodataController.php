<?php

namespace App\Http\Controllers\Umkm;

use App\Http\Controllers\Controller;
use App\Services\Interfaces\LinkProductive\BusinessScaleInterface;
use App\Services\Interfaces\LinkProductive\CertificationInterface;
use App\Services\Interfaces\Umkm\UmkmInterface;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        //
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
