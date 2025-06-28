<?php

namespace App\View\Components\Umkm;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use App\Services\Interfaces\HistoryInterface;

class Header extends Component
{
    public $histories;

    /**
     * Create a new component instance.
     */
    public function __construct(HistoryInterface $historyRepository)
    {
        $this->histories = $historyRepository->getHistories();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.umkm.header');
    }
}
