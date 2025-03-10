<?php

namespace App\Livewire\Website\Pages;

use App\Models\Service;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Services extends Component
{
    #[Layout('livewire.website.layouts.website')]
    #[Title('Services')]
    public function render()
    {
        $services = Service::paginate(15);
        return view('livewire.website.pages.services', compact('services'));
    }
}
