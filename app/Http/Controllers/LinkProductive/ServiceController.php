<?php

namespace App\Http\Controllers\LinkProductive;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Interfaces\LinkProductive\ServiceInterface;

class ServiceController extends Controller
{
    public function __construct(private ServiceInterface $serviceInterface) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = $this->serviceInterface->getServicesPaginate();

        return view('pages.link-productive.service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        //
    }
}
