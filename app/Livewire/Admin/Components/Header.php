<?php

namespace App\Livewire\Admin\Components;

use App\Models\GlobalConstants;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Header extends Component
{
    public function render()
    {
        return view('livewire..admin.components.header');
    }
}