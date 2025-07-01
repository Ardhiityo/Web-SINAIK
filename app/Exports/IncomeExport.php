<?php

namespace App\Exports;

use App\Models\Income;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class IncomeExport implements FromView
{
    public function __construct(private $start_date, private $end_date, private $city) {}

    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $city = $this->city;
        $start_date = $this->start_date;
        $end_date = $this->end_date;

        $incomes = Income::whereHas('umkm', function ($query) use ($city) {
            $query->whereHas('biodata', function ($query) use ($city) {
                $query->where('city', $city);
            });
        })->whereBetween('date', [$start_date, $end_date])
            ->with([
                'umkm:id,umkm_status_id,user_id',
                'umkm.user:id,name',
                'umkm.umkmStatus:id,name',
                'umkm.biodata:id,phone_number,business_name,business_scale_id',
                'umkm.biodata.businessScale:id,name',
            ])
            ->orderBy('date')
            ->select('id', 'date', 'total_income', 'total_employee', 'umkm_id')
            ->get();

        return view('exports.index', compact('incomes', 'start_date', 'end_date', 'city'));
    }
}
