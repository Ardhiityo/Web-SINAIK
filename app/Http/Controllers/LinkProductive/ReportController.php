<?php

namespace App\Http\Controllers\LinkProductive;

use App\Exports\IncomeExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Services\Interfaces\Umkm\BiodataInterface;
use App\Http\Requests\LinkProductive\StoreReportRequest;

class ReportController extends Controller
{
    public function __construct(private BiodataInterface $biodataRepository) {}

    public function index()
    {
        $cities = $this->biodataRepository->getCities();

        return view('pages.link-productive.report.index', compact('cities'));
    }

    public function store(StoreReportRequest $request)
    {
        $data = $request->validated();

        if ($data['format'] === 'pdf') {
            return Excel::download(new IncomeExport(
                $data['start_date'],
                $data['end_date'],
                $data['city']
            ), 'incomes.pdf', \Maatwebsite\Excel\Excel::MPDF);
        } else if ($data['format'] === 'excel') {
            return Excel::download(new IncomeExport(
                $data['start_date'],
                $data['end_date'],
                $data['city']
            ), 'incomes.xlsx');
        }
    }
}
