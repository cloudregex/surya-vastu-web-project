<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FileUpload extends Component
{
    public $name;
    public $col;
    public $label;
    public $existingFile;
    public $previewWidth;
    public $previewHeight;

    // Constructor to pass properties to the component
    public function __construct($name, $label,  $col = '12', $existingFile = null,  $previewWidth = 200, $previewHeight = 60)
    {
        $this->name = $name;
        $this->label = $label;
        $this->existingFile = $existingFile;
        $this->previewWidth = $previewWidth;
        $this->previewHeight = $previewHeight;
        $this->col = $col;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.file-upload');
    }
}