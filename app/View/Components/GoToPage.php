<?php

namespace App\View\Components;

use Illuminate\View\Component;

class GoToPage extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return <<<'blade'
        <div class="border border-primary">
                 The best way to take care of the future is to take care of the present moment. - Thich Nhat Hanh
        </div>
        blade;
    }
}
