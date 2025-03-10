<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardComp extends Component
{
    public $listRoute;
    public $listButtonName;
    public $title;
    public bool $bottomButton;

    public function __construct($title, $listButtonName, $listRoute, bool $bottomButton = true)
    {
        $this->title = $title;
        $this->listButtonName = $listButtonName;
        $this->listRoute = $listRoute;
        $this->bottomButton = $bottomButton;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card-comp');
    }
}