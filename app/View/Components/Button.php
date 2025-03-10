<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    public $color;
    public $name;
    public $class;
    public $title;

    public function __construct($color = 'primary', $name = 'Button', $class = '', $title = 'Button')
    {
        $this->color = $color;
        $this->name = $name;
        $this->class = $class;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button');
    }
}
