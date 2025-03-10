<?php

namespace App\Livewire\Website\Page;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Services extends Component
{
    #[Layout('livewire.website.layouts.website')]
    #[Title('Services')]
    public function render()
    {
        return view('livewire.website.page.services');
    }
}