<?php

namespace App\Livewire\Website\Page;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class BlogDetails extends Component
{
    #[Layout('livewire.website.layouts.website')]
    #[Title('Blog Details')]
    public function render()
    {
        return view('livewire.website.page.blog-details');
    }
}