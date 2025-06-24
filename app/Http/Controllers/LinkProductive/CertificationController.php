<?php

namespace App\Http\Controllers\LinkProductive;

use App\Models\Certification;
use App\Http\Controllers\Controller;
use App\Http\Requests\LinkProductive\StoreCertificationRequest;
use App\Http\Requests\LinkProductive\UpdateCertificationRequest;
use App\Services\Interfaces\LinkProductive\CertificationInterface;

class CertificationController extends Controller
{
    public function __construct(private CertificationInterface $certificationInterface) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $certifications = $this->certificationInterface->getCertificationsPaginate();

        return view('pages.link-productive.certification.index', compact('certifications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.link-productive.certification.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCertificationRequest $request)
    {
        $this->certificationInterface->storeCertification($request->validated());

        return redirect()->route('link-productive.certifications.index')->with('success', 'Sukses disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Certification $certification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Certification $certification)
    {
        return view('pages.link-productive.certification.edit', compact('certification'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCertificationRequest $request, Certification $certification)
    {
        $certification->update($request->validated());

        return redirect()->route('link-productive.certifications.index')->with('success', 'Sukses diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Certification $certification)
    {
        $certification->delete();

        return redirect()->route('link-productive.certifications.index')->with('success', 'Sukses dihapus');
    }
}
