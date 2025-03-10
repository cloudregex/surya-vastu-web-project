<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DynamicTable extends Component
{
    public $Search;
    public $sortBy;
    public $sortDir;
    public $array;
    public $arrayThead;
    public $createRoute;
    public $trashRoute;
    public $createButton;
    public $listName;
    public $showActionButtons;
    public $filters;
    public $icon;

    public function __construct($createRoute, $createButton, $listName, $icon,  $sortBy, $sortDir, $array = [], $arrayThead = [],  $trashRoute = '', $showActionButtons = true, $filters = null)
    {
        $this->sortBy = $sortBy;
        $this->sortDir = $sortDir;
        $this->array = $array;
        $this->arrayThead = $arrayThead;
        $this->createRoute = $createRoute;
        $this->createButton = $createButton;
        $this->listName = $listName;
        $this->trashRoute = $trashRoute;
        $this->showActionButtons = $showActionButtons;
        $this->filters = $filters;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dynamic-table');
    }
}