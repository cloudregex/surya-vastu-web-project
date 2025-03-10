<?php

namespace App\Livewire\Website\Pages;

use App\Models\Blog;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class BlogDetails extends Component
{
    #[Layout('livewire.website.layouts.website')]
    #[Title('Blog Details')]

    public $blog;
    public $slug;
    public $recentBlogs;

    public function mount($slug)
    {
        $this->slug = $slug;
        $this->blog = Blog::where('blog_slug', $slug)
            ->firstOrFail();
        $this->recentBlogs = Blog::orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
    }

    public function render()
    {
        return view('livewire.website.pages.blog-details');
    }
}
