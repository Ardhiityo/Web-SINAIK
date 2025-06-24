<?php

namespace App\Http\Controllers\LinkProductive;

use App\Http\Requests\LinkProductive\UpdateIncomeRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\Umkm\StoreIncomeRequest;
use App\Models\Income;
use App\Models\Umkm;
use App\Services\Interfaces\Umkm\IncomeInterface;

class IncomeController extends Controller
{
    public function __construct(
        private IncomeInterface $incomeRepository
    ) {}

    public function create(Umkm $umkm)
    {
        return view('pages.link-productive.umkm.performance.create', compact('umkm'));
    }

    public function store(StoreIncomeRequest $request, Umkm $umkm)
    {
        $this->incomeRepository->storeIncome($request->validated(), $umkm->id);

        return redirect()->route('link-productive.umkms.performance', ['umkm' => $umkm->id])->withSuccess('Berhasil disimpan');
    }

    public function edit(Umkm $umkm, Income $income)
    {
        return view('pages.link-productive.umkm.performance.edit', compact('income', 'umkm'));
    }

    public function update(UpdateIncomeRequest $request, Umkm $umkm, Income $income)
    {
        $income->update($request->validated());

        return redirect()->route('link-productive.umkms.performance', ['umkm' => $umkm->id])->with('success', 'Berhasil diupdate');
    }

    public function destroy(Umkm $umkm, Income $income)
    {
        $income->delete();

        return redirect()->route('link-productive.umkms.performance', ['umkm' => $umkm->id])->with('success', 'Berhasil dihapus');
    }
}
