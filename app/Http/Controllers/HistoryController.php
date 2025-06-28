<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\HistoryInterface;

class HistoryController extends Controller
{
    public function __construct(private HistoryInterface $historyRepository) {}

    public function destroy()
    {
        $this->historyRepository->destroyHistories();

        return redirect()->route('profile.edit')->withSuccess('Berhasil dihapus');
    }
}
