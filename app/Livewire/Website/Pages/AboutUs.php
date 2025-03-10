<?php

namespace App\Livewire\Website\Pages;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class AboutUs extends Component
{
    #[Layout('livewire.website.layouts.website')]
    #[Title('About Us')]

    public function render()
    {
        return view('livewire.website.pages.about-us');
    }
}
