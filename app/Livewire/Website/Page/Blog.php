<?php

namespace App\Livewire\Website\Page;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Blog extends Component
{
    #[Layout('livewire.website.layouts.website')]
    #[Title('Blog')]
    public function render()
    {
        return view('livewire.website.page.blog');
    }
}