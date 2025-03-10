<?php

namespace App\Livewire\Website\Pages;

use App\Models\Service;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class ServiceDetails extends Component
{
    #[Layout('livewire.website.layouts.website')]
    #[Title('Service Details')]
    public $service;

    public function mount($slug)
    {
        $this->service = Service::where('service_slug', $slug)->first();
    }

    public function render()
    {
        return view('livewire.website.pages.service-details');
    }
}
