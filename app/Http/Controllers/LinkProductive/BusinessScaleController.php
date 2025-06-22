<?php

namespace App\Http\Controllers\LinkProductive;

use App\Models\BusinessScale;
use App\Http\Controllers\Controller;
use App\Http\Requests\LinkProductive\StoreBusinessScaleRequest;
use App\Http\Requests\LinkProductive\UpdateBusinessScaleRequest;
use App\Services\Interfaces\LinkProductive\BusinessScaleInterface;

class BusinessScaleController extends Controller
{
    public function __construct(private BusinessScaleInterface $businessScaleRepository) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $businessScales = $this->businessScaleRepository->getBusinessScalesPaginate();

        return view('pages.link-productive.business-scale.index', compact('businessScales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.link-productive.business-scale.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBusinessScaleRequest $request)
    {
        $this->businessScaleRepository->storeBusinessScale($request->validated());

        return redirect()->route('link-productive.business-scales.index')->with('success', 'Sukses disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(BusinessScale $businessScale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BusinessScale $businessScale)
    {
        return view('pages.link-productive.business-scale.edit', compact('businessScale'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBusinessScaleRequest $request, BusinessScale $businessScale)
    {
        $businessScale->update($request->validated());

        return redirect()->route('link-productive.business-scales.index')->with('success', 'Sukses diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BusinessScale $businessScale)
    {
        $businessScale->delete();

        return redirect()->route('link-productive.business-scales.index')->with('success', 'Sukses dihapus');
    }
}
