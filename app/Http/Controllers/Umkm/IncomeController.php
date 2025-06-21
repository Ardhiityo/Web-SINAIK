<?php

namespace App\Http\Controllers\Umkm;

use App\Models\Income;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Interfaces\Umkm\UmkmInterface;

class IncomeController extends Controller
{
    public function __construct(private UmkmInterface $umkmRepository) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $incomes = $this->umkmRepository->getIncomes();

        return view('pages.umkm.income.index', compact('incomes'));
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
    public function show(Income $income)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Income $income)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Income $income)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Income $income)
    {
        //
    }
}
