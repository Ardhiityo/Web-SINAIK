<?php

namespace App\Http\Controllers\Umkm;

use App\Models\Umkm;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Services\Interfaces\Umkm\UmkmInterface;

class UmkmController extends Controller
{
    public function __construct(
        private UmkmInterface $umkmRepository
    ) {}

    public function index()
    {
        $umkms = $this->umkmRepository->getUmkmsPaginate();

        return view('pages.umkm.umkm.index', compact('umkms'));
    }

    public function show(Umkm $umkm)
    {
        //
    }
}
