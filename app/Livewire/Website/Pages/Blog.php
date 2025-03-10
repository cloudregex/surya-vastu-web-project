<?php

namespace App\Livewire\Website\Pages;

use App\Models\Blog as ModelsBlog;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Blog extends Component
{
    #[Layout('livewire.website.layouts.website')]
    #[Title('Blog')]

    public function render()
    {
        $blogs = ModelsBlog::latest()->paginate(10);
        return view('livewire.website.pages.blog', [
            'blogs' => $blogs
        ]);
    }
}
