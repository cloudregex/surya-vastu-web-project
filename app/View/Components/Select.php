<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Select extends Component
{
    public string $name;
    public string $label;
    public string $placeholder;
    public $options;  // This will handle the array of options
    public ?string $value;
    public string $optionsid;
    public string $optionsName;
    public int $col;
    public string $className;
    public $dropdownParent;
    public ?bool $shouldLive;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $name,
        string $label,
        string $placeholder = 'Select an option',
        $options = [],
        ?string $value = null,
        string $optionsid = 'value',
        string $optionsName = 'text',
        int $col = 12,
        string $className,
        ?bool $shouldLive = true,
        string $dropdownParent = null,
    ) {
        $this->name = $name;
        $this->label = $label;
        $this->placeholder = $placeholder;
        $this->options = collect($options);  // Ensures options are always a collection
        $this->value = $value;
        $this->optionsid = $optionsid;
        $this->optionsName = $optionsName;
        $this->col = $col;
        $this->className = $className;
        $this->dropdownParent = $dropdownParent;
        $this->shouldLive = $shouldLive;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.select');
    }
}
