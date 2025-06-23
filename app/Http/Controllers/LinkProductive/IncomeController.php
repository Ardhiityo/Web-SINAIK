<?php

namespace App\Http\Controllers\LinkProductive;

use App\Http\Controllers\Controller;
use App\Models\Income;
use App\Models\Umkm;

class IncomeController extends Controller
{
    public function edit(Umkm $umkm, Income $income)
    {
        return view('pages.link-productive.umkm.performance.edit', compact('income', 'umkm'));
    }

    public function destroy(Umkm $umkm, Income $income)
    {
        $income->delete();

        return redirect()->route('link-productive.umkms.performance', ['umkm' => $umkm->id])->with('success', 'Berhasil dihapus');
    }
}
