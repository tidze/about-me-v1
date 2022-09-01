<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BackToHomepage extends Component
{
    public $user_id;
    public $text;
    public $route_name;
    public function render()
    {
        return view('livewire.back-to-homepage');
    }
}
