<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SelectTwo extends Component
{
    public $placeholder;
    public $col;
    public $name;
    public $value;
    public $label;
    public $options;
    public $optionsid;
    public $optionsName;
    public $className;
    public $dropdownParent;
    public $shouldLive;

    /**
     * Create a new component instance.
     */
    public function __construct($placeholder = 'Select an option', $col = '12', $optionsid, $optionsName, $name, $value = [], $label, $options = [], $className = 'default', $dropdownParent = null, $shouldLive = true)
    {
        $this->placeholder = $placeholder;
        $this->col = $col;
        $this->name = $name;
        $this->value = $value;
        $this->label = $label;
        $this->options = $options;
        $this->optionsid = $optionsid;
        $this->optionsName = $optionsName;
        $this->className = $className;
        $this->dropdownParent = $dropdownParent;
        $this->shouldLive = $shouldLive;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.select-two');
    }
}
