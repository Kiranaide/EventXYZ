<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EventTable extends Component
{
    public $eventData;
    /**
     * Create a new component instance.
     */
    public function __construct($eventData)
    {
        $this->eventData = $eventData;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.event-table');
    }
}
