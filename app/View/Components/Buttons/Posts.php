<?php

namespace App\View\Components\Buttons;

use Illuminate\View\Component;

class Posts extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    
    public $userId;
    public function __construct($userId)
    {
        $this->userId=$userId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.buttons.posts');
    }
}
