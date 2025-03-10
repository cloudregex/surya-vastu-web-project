<?php

namespace App\Livewire\Website\Page;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Index extends Component
{
    #[Layout('livewire.website.layouts.website')]
    #[Title('Home')]
    public function render()
    {
        return view('livewire..website.page.index');
    }
}