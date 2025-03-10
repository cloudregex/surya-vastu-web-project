<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Textarea extends Component
{
    public function __construct(
        public $name,
        public $label,
        public $icon = null,
        public $placeholder = '',
        public $rows = 3,
        public $value = null,
        public $col = 12
    ) {}

    public function render()
    {
        return view('components.textarea');
    }
}
