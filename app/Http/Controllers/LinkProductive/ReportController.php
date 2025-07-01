<?php

namespace App\Http\Controllers\LinkProductive;

use App\Exports\IncomeExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\LinkProductive\StoreReportRequest;

class ReportController extends Controller
{
    public function index()
    {
        return view('pages.link-productive.report.index');
    }

    public function store(StoreReportRequest $request)
    {
        $data = $request->validated();
        if ($data['format'] === 'pdf') {
            return Excel::download(new IncomeExport, 'incomes.pdf', \Maatwebsite\Excel\Excel::MPDF);
        } else if ($data['format'] === 'excel') {
            return Excel::download(new IncomeExport, 'incomes.xlsx');
        }
    }
}
