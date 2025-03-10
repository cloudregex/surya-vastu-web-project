<?php

namespace App\Livewire\Website\Page;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class ContactUs extends Component
{
    #[Layout('livewire.website.layouts.website')]
    #[Title('Contact Us')]
    public function render()
    {
        return view('livewire.website.page.contact-us');
    }
}