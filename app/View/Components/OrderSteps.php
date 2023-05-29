<?php

namespace App\View\Components;

use Illuminate\View\Component;

class OrderSteps extends Component
{
    public $stage = 1;
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public function __construct($stage)
    {
        $this->stage = $stage;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.order-steps');
    }
}
