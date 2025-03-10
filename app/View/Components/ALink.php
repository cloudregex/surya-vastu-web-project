<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ALink extends Component
{
    public string $href;
    public ?string $class;
    public ?string $name;
    public ?string $color;
    public ?string $icon;
    public string $target;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $href,
        string $target,
        ?string $class = 'btn btn-primary',
        ?string $icon = '',
        ?string $color = 'blue',
        ?string $name = ''
    ) {
        $this->href = $href;
        $this->color = $color;
        $this->class = $class;
        $this->name = $name;
        $this->icon = $icon;
        $this->target = $target;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.a-link');
    }
}