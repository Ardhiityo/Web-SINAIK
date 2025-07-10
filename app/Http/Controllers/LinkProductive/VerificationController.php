<?php

namespace App\Http\Controllers\LinkProductive;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Interfaces\LinkProductive\UmkmInterface;

class VerificationController extends Controller
{
    public function __construct(
        private UmkmInterface $umkmRepository,
    ) {}

    public function index(Request $request)
    {
        if ($keyword = $request->query('keyword')) {
            $umkms = $this->umkmRepository->getUmkmByKeyword($keyword);
        } else {
            $umkms = $this->umkmRepository->getVerifications();
        }

        return view('pages.link-productive.verification.index', compact('umkms'));
    }

    public function update($id)
    {
        $this->umkmRepository->updateVerification($id);

        return redirect()->route('link-productive.verifications.index')->with('success', 'Sukses diupdate');
    }
}
