<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EventTable extends Component
{
    public $listEvent;
    /**
     * Create a new component instance.
     */
    public function __construct($listEvent)
    {
        $this->listEvent = $listEvent;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.event-table');
    }
}
