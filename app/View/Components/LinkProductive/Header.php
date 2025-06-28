<?php

namespace App\View\Components\LinkProductive;

use App\Services\Interfaces\HistoryInterface;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

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
        return view('components.link-productive.header');
    }
}
