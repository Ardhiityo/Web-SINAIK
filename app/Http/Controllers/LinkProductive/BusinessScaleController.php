<?php

namespace App\Http\Controllers\LinkProductive;

use App\Models\BusinessScale;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LinkProductive\StoreBusinessScaleRequest;
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BusinessScale $businessScale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BusinessScale $businessScale)
    {
        //
    }
}
