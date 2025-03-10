<?php

namespace App\Livewire\Admin\Page\Blog;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class BlogIndex extends Component
{
    use WithPagination;
    #[Url(history: true)]
    public $perPage = 10;
    #[Url(history: true)]
    public $Search = '';
    #[Url(history: true)]
    public $sortBy = 'created_at';
    #[Url(history: true)]
    public $sortDir = 'DESC';
    #[Title('Blogs')]
    #[Url(history: true)]
    public $filters = [
        'blog_title' => null,
        'blog_user_name' => null,
    ];

    public function setSortBy($sortField)
    {
        if ($this->sortBy == $sortField) {
            $this->sortDir = $this->sortDir !== "ASC" ? "ASC" : "DESC";
        }
        $this->sortBy = $sortField;
    }
    public function resetFilters($key = null)
    {
        if ($key) {
            $this->filters[$key] = null;
        } else {
            $this->reset([
                'Search',
                'sortBy',
                'sortDir',
            ]);
            foreach ($this->filters as $key => $value) {
                $this->filters[$key] = null;
            }
        }
        $this->dispatch('clearSelect2');
    }
    public function updatedperPage()
    {
        $this->resetPage();
    }
    public function mount()
    {
        // Check if the user has a specific role or permission
        if (!User::find(Auth::id())->can('admin.slider.list')) {
            abort(403);
        }
    }
    public function DeleteUser($encryptedId)
    {
        // Check if the user has a specific role or permission
        if (!User::find(Auth::id())->can('admin.blog.delete')) {
            abort(403);
        }
        // Decrypt the user ID
        $blog = Blog::withTrashed()->find(decryptData($encryptedId));
        return toggleTrash($blog, 'blog');
    }
    public function submitForm()
    {
        $this->resetPage();
    }
    public function render()
    {
        $Blog = Blog::query()
            ->when($this->Search, function ($query) {
                $query->where('blog_title', 'like', '%' . $this->Search . '%')
                    ->orWhere('blog_user_name', 'like', '%' . $this->Search . '%');
            })
            ->when($this->filters['blog_title'], function ($query) {
                $query->where('blog_title', 'like', '%' . $this->filters['blog_title'] . '%');
            })
            ->when($this->filters['blog_user_name'], function ($query) {
                $query->where('blog_user_name', 'like', '%' . $this->filters['blog_user_name'] . '%');
            })
            ->orderBy($this->sortBy, $this->sortDir)
            ->paginate($this->perPage);
        return view('livewire.admin.page.blog.blog-index', compact('Blog'));
    }
}
