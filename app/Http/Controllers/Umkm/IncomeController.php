<?php

namespace App\Http\Controllers\Umkm;

use App\Models\Income;
use App\Http\Controllers\Controller;
use App\Http\Requests\Umkm\StoreIncomeRequest;
use App\Http\Requests\Umkm\UpdateIncomeRequest;
use App\Services\Interfaces\Umkm\IncomeInterface;

class IncomeController extends Controller
{
    public function __construct(
        private IncomeInterface $incomeRepository
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $incomes = $this->incomeRepository->getIncomesPaginate();

        return view('pages.umkm.income.index', compact('incomes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.umkm.income.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIncomeRequest $request)
    {
        $this->incomeRepository->storeIncome($request->validated());

        return redirect()->route('umkm.incomes.index')->with('success', 'Berhasil disimpan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Income $income)
    {
        $this->authorize('update', $income);

        return view('pages.umkm.income.edit', compact('income'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIncomeRequest $request, Income $income)
    {
        $income->update($request->validated());

        return redirect()->route('umkm.incomes.index')->with('success', 'Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Income $income)
    {
        $this->authorize('delete', $income);

        $income->delete();

        return redirect()->route('umkm.incomes.index')->with('success', 'Berhasil dihapus');
    }
}
