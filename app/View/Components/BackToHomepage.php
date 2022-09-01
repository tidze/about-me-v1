<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BackToHomepage extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $text;
    public $userId;
    public $routeName;
    public function __construct($text, $userId, $routeName)
    {
        $this->text = $text;
        $this->userId = $userId;
        $this->routeName = $routeName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.back-to-homepage');
    }
}
