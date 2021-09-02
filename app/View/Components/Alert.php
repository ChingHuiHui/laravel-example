<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    public $message;
    public $type;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($message = '', $type = 'success')
    {
        $this->message = $message;
        $this->type = $type;
    }

    public function typeClass()
    {
        if($this->type === 'error') {
            return 'bg-red-500 text-white';
        }

        return 'bg-green-600 text-white';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
