<?php

namespace App\Livewire\Website\Pages;

use App\Models\Gallery as ModelsGallery;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Gallery extends Component
{
    #[Layout('livewire.website.layouts.website')]
    #[Title('Gallery')]
    public function render()
    {
        $galleries = ModelsGallery::paginate(15);
        return view('livewire.website.pages.gallery', [
            'galleries' => $galleries
        ]);
    }
}
