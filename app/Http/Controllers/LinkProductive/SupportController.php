<?php

namespace App\Http\Controllers\LinkProductive;

use App\Http\Controllers\Controller;
use App\Models\Umkm;
use App\Services\Interfaces\LinkProductive\UmkmInterface;

class SupportController extends Controller
{
    public function __construct(
        private UmkmInterface $umkmRepository
    ) {}

    public function index()
    {
        $umkms = $this->umkmRepository->getUmkmsPaginate();

        return view('pages.link-productive.support.index', compact('umkms'));
    }

    public function show(Umkm $umkm)
    {
        return view('pages.link-productive.support.show', compact('umkm'));
    }

    public function store(Umkm $umkm)
    {
        //
    }
}
