<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DatePick extends Component
{
    public string $placeholder;
    public int $col;
    public string $id;
    public ?string $icon;
    public string $name;
    public ?string $value;
    public string $label;
    public bool $liveOn;
    public bool $required;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $placeholder = '',
        int $col = 12,
        string $id = "12",
        ?string $icon = null,
        string $name = '',
        ?string $value = null,
        string $label = '',
        bool $liveOn = false,
        bool $required = false,
    ) {
        $this->placeholder = $placeholder;
        $this->id = $id;
        $this->col = $col;
        $this->icon = $icon;
        $this->name = $name;
        $this->value = $value;
        $this->label = $label;
        $this->liveOn = $liveOn;
        $this->required = $required;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.date-pick');
    }
}
