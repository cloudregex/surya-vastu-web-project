<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ToggleButton extends Component
{
    public $click;
    public $value;
    /**
     * Create a new component instance.
     */
    public function __construct($click, $value = false)
    {
        $this->click = $click;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.toggle-button');
    }
}
