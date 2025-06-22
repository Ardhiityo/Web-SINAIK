<?php

namespace App\Http\Controllers\LinkProductive;

use App\Http\Controllers\Controller;
use App\Services\Interfaces\LinkProductive\UmkmInterface;

class VerificationController extends Controller
{
    public function __construct(private UmkmInterface $umkmInterface) {}

    public function index()
    {
        $umkms = $this->umkmInterface->getVerifications();

        return view('pages.link-productive.verification.index', compact('umkms'));
    }

    public function update($id)
    {
        $this->umkmInterface->updateVerification($id);

        return redirect()->route('link-productive.verifications.index')->with('success', 'Verifikasi berhasil diupdate');
    }
}
