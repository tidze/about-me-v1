<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DialogModal extends Component
{
    public $name;
    public $message;
    public $title;
    public $formName;
    

    public function __construct($name, $title, $message, $formName)
    {
        $this->name = $name;
        $this->message = $message;
        $this->title = $title;
        $this->formName = $formName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        // dd($this->formName);
        return view('components.dialog-modal');
    }
}
