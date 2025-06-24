<?php

namespace App\Http\Controllers\LinkProductive;

use App\Models\Biodata;
use App\Models\Umkm;
use App\Http\Controllers\Controller;
use App\Http\Requests\Umkm\UpdateBiodataRequest;
use App\Services\Interfaces\LinkProductive\BusinessScaleInterface;
use App\Services\Interfaces\LinkProductive\CertificationInterface;

class BiodataController extends Controller
{
    public function __construct(
        private BusinessScaleInterface $businessScaleRepository,
        private CertificationInterface $certificationRepository
    ) {}

    public function edit(Umkm $umkm)
    {
        $businessScales = $this->businessScaleRepository->getBusinessScales();
        $certifications = $this->certificationRepository->getCertifications();

        $umkm->load('biodata:id,business_name,umkm_id,business_scale_id,business_description,certification_id,city,province,address,phone_number,founding_year');

        return view('pages.link-productive.umkm.biodata.edit', compact('businessScales', 'certifications', 'umkm'));
    }

    public function update(UpdateBiodataRequest $request, Umkm $umkm, Biodata $biodata)
    {
        $biodata->update($request->validated());

        return redirect()->route('link-productive.umkms.show', ['umkm' => $umkm->id])->withSuccess('Berhasil diupdate');
    }
}
