<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SummerNote extends Component
{
    public $name;
    public $label;
    public $placeholder;
    public $rows;
    public $icon;
    public $value;
    public $col;

    public function __construct(
        $name,
        $label = '',
        $placeholder = '',
        $rows = 5,
        $icon = null,
        $value = '',
        $col = 12
    ) {
        $this->name = $name;
        $this->label = $label;
        $this->placeholder = $placeholder;
        $this->rows = $rows;
        $this->icon = $icon;
        $this->value = $value;
        $this->col = $col;
    }
    public function render(): View|Closure|string
    {
        return view('components.summer-note');
    }
}
