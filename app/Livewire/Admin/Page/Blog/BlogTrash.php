<?php

namespace App\Livewire\Admin\Page\Blog;

use App\Models\Blog;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class BlogTrash extends Component
{
    use WithPagination;

    #[Title('Trash Blogs')]

    #[Url(history: true)]
    public $perPage = 10;

    #[Url(history: true)]
    public $Search = '';

    #[Url(history: true)]
    public $sortBy = 'created_at';

    #[Url(history: true)]
    public $sortDir = 'DESC';

    public function setSortBy($sortField)
    {
        if ($this->sortBy == $sortField) {
            $this->sortDir = $this->sortDir !== "ASC" ? "ASC" : "DESC";
        }
        $this->sortBy = $sortField;
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedperPage()
    {
        $this->resetPage();
    }

    public function mount()
    {
        // Check if the user has a specific role or permission
        if (!User::find(Auth::id())->can('admin.user.trash')) {
            abort(403); // You can customize this response
        }
    }

    public function render()
    {
        // Fetch trashed blogs
        $blogs = Blog::query()
            ->when($this->Search, function ($query) {
                $query->where('blog_title', 'like', '%' . $this->Search . '%')
                    ->orWhere('blog_user_name', 'like', '%' . $this->Search . '%');
            })
            ->onlyTrashed() // Fetch only trashed records
            ->orderBy($this->sortBy, $this->sortDir)
            ->paginate($this->perPage);

        return view('livewire.admin.page.blog.blog-trash', [
            'blogs' => $blogs
        ]);
    }
}
