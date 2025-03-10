<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MobileNumberInput extends Component
{
    public string $placeholder;
    public int $col;
    public string $name;
    public ?string $value;
    public string $label;
    /**
     * Create a new component instance.
     */
    public function __construct(
        string $placeholder = 'Enter your phone number',
        int $col = 6,
        string $name,
        ?string $value = null,
        string $label = 'Phone Number'
    ) {
        $this->placeholder = $placeholder;
        $this->col = $col;
        $this->name = $name;
        $this->value = $value;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.mobile-number-input');
    }
}