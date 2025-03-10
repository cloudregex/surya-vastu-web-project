<?php

namespace App\Livewire\Website\Page;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class ServicesDetails extends Component
{
    #[Layout('livewire.website.layouts.website')]
    #[Title('Services Details')]
    public function render()
    {
        return view('livewire.website.page.services-details');
    }
}