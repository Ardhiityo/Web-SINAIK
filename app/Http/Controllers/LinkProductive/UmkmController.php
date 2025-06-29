<?php

namespace App\Http\Controllers\LinkProductive;

use App\Models\Umkm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Interfaces\LinkProductive\UmkmInterface;

class UmkmController extends Controller
{
    public function __construct(private UmkmInterface $umkmRepository) {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->query('category') && $request->query('keyword')) {
            $category = $request->query('category');
            $keyword = $request->query('keyword');
            $umkms = $this->umkmRepository->getUmkmsByKeyword($category, $keyword);
        } else {
            $umkms = $this->umkmRepository->getUmkmsPaginate();
        }

        return view('pages.link-productive.umkm.index', compact('umkms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.link-productive.umkm.create');
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
    public function show(Umkm $umkm)
    {
        $umkm = $this->umkmRepository->getUmkm($umkm->id);

        return view('pages.link-productive.umkm.show', compact('umkm'));
    }

    public function performance(Umkm $umkm)
    {
        $performances = $this->umkmRepository->getUmkmPerformancePaginate($umkm->id);

        return view('pages.link-productive.umkm.performance.index', compact('performances', 'umkm'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Umkm $umkm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Umkm $umkm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Umkm $umkm)
    {
        //
    }
}
