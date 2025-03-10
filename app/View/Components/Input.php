<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    public string $type;
    public string $placeholder;
    public int $col;
    public ?string $icon;
    public string $name;
    public ?string $value;
    public string $label;
    public bool $liveOn;
    public bool $modelOn;
    public bool $modelLiveChange;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $type = 'text',
        string $placeholder = '',
        int $col = 12,
        ?string $icon = null,
        string $name = '',
        ?string $value = null,
        string $label = '',
        bool $liveOn = false,
        bool $modelOn = false,
        bool $modelLiveChange = false
    ) {
        $this->type = $type;
        $this->placeholder = $placeholder;
        $this->col = $col;
        $this->icon = $icon;
        $this->name = $name;
        $this->value = $value;
        $this->label = $label;
        $this->liveOn = $liveOn;
        $this->modelOn = $modelOn;
        $this->modelLiveChange = $modelLiveChange;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input');
    }
}
