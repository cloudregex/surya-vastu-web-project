<?php

namespace App\View\Components;

use App\Models\AdminUploadLogo;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Favicon extends Component
{
    public $faviconPath;

    public function __construct()
    {
        $this->faviconPath = AdminUploadLogo::where('logo_name', 'toggle_dark')->value('Logo_path');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.favicon');
    }
}
